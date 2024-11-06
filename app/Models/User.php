<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'firstname',
        'email',
        'phone',
        'avatar',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return asset('storage/' . $this->avatar);
    }

    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return $this->hasRole('super_admin') && $this->hasVerifiedEmail();
    }
    /* public function canAccessFilament(): bool
    {
        return $this->role('super_admin') && $this->hasVerifiedEmail();
    } */
    public function adress()
    {
        return $this->hasMany(Adress::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function deposit()
    {
        return $this->hasMany(Deposit::class);
    }

    public function grower()
    {
        return $this->hasOne(Grower::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
