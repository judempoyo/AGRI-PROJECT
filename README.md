# AGRI-PROJECT (Online Sales Platform and Agricultural Stock Tracking)

## Description

This project is an online sales platform dedicated to agricultural products. It allows users to purchase fresh products while providing a stock management system for farmers and sellers. The application is developed using Laravel, a powerful and flexible PHP framework.

## Images
![Capture d'écran 2024-11-05 090140](https://github.com/user-attachments/assets/5122bc14-893b-4067-9334-07f836ab99a8)
![agriproject](https://github.com/user-attachments/assets/f77ca4c3-e340-434f-bc54-e997aa303dd1)


https://github.com/user-attachments/assets/ab0659d8-5d7c-4716-bfd8-c935b1877c8d


## Features

- **User Registration and Login**: Users can create an account and log in to access their information.
- **Product Catalog**: Display of available products for sale with descriptions, prices, and images.
- **Stock Management**: Farmers can manage their stock and track product availability.
- **Shopping Cart**: Users can easily add products to their cart and place orders.
- **Payment System**: Integration of a secure payment system to finalize orders.
- **Order Tracking**: Users can track the status of their orders in real time.

## Prerequisites

- PHP >= 7.3
- Composer
- Laravel >= 8.x
- Database (MySQL or SQLite)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/your-project.git
   cd your-project
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Create a `.env` file from the `.env.example` file:
   ```bash
   cp .env.example .env
   ```

4. Configure your database in the `.env` file.

5. Generate the application key:
   ```bash
   php artisan key:generate
   ```

6. Run migrations:
   ```bash
   php artisan migrate
   ```

7. Start the local server:
   ```bash
   php artisan serve
   ```

## Usage

Access the application via `http://localhost:8000` in your browser.

## Contributing

Contributions are welcome! If you have suggestions or want to fix bugs, feel free to open an issue or submit a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
