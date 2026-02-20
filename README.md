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

## Deployment

### Railway (Recommended)

1. Go to [Railway.app](https://railway.app) and sign up/login
2. Click "New Project" → "Deploy from GitHub repo"
3. Connect your GitHub account and select `bora2025/php-fms`
4. Railway will automatically detect Laravel and deploy it
5. Set environment variables in Railway dashboard:
   - `APP_KEY` (generate with `php artisan key:generate`)
   - `APP_ENV=production`
   - `DB_CONNECTION=sqlite`
   - `GOOGLE_SHEETS_SPREADSHEET_ID=1b8-rRFi2ArA6Vf-xPrYA_1csd6n7lJIK21dJ6F_Cr9Y`

### Heroku

1. Install Heroku CLI
2. Login: `heroku login`
3. Create app: `heroku create your-app-name`
4. Set buildpacks:
   ```
   heroku buildpacks:set heroku/php
   heroku buildpacks:add heroku/nodejs
   ```
5. Push to Heroku: `git push heroku master`
6. Run migrations: `heroku run php artisan migrate`
7. Set environment variables: `heroku config:set APP_KEY=...`

### Manual Deployment

For VPS or shared hosting:
1. Upload files to server
2. Set up web server (Apache/Nginx) to point to `public/` directory
3. Ensure PHP 8.3+ and required extensions
4. Set proper permissions for `storage/` and `bootstrap/cache/`
5. Run `composer install --optimize-autoloader --no-dev`
6. Run `php artisan config:cache` and `php artisan route:cache`

## License

Licensed by Bora Company

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
