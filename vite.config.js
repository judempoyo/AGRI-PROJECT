import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';




export default defineConfig({
    /* server: {
        host: '192.168.179.53',
        port: '80',
    
    }, */
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh:[
                ...refreshPaths,
                'app/Livewire/**'
            ],
        }),
    ],
});
