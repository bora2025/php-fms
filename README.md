# Finance Management System

A Laravel-based Finance Management System that integrates with Google Sheets for budget and transaction data.

## Features

- User authentication with Laravel Breeze
- Dashboard with summary cards and recent transactions
- Budget Management page
- Withdrawal form
- Financial Statement view
- REST API endpoints for data access
- Integration with Google Sheets API

## Installation

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure your environment
4. Run `php artisan key:generate`
5. Run `php artisan migrate`
6. Run `php artisan serve`

## API Endpoints

- `GET /api/budget` - Get budget data
- `GET /api/transactions` - Get transactions
- `GET /api/statement` - Get financial statement
- `POST /api/auth/login` - Login
- `POST /api/auth/logout` - Logout

## Google Sheets Integration

The system is configured to read from a Google Sheet. To set up:

1. Create a Google Cloud Project
2. Enable Google Sheets API
3. Create credentials and download the JSON file
4. Place it in `storage/app/google-credentials.json`
5. Set the spreadsheet ID in `.env`

For demo purposes, dummy data is used.

## License

Licensed by Bora Company

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
