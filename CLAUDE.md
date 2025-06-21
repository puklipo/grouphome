# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Development Commands

### Setup
```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run build
```

### Local Development with Sail
```bash
./vendor/bin/sail up -d
./vendor/bin/sail art migrate:fresh --seed
./vendor/bin/sail art gh:import
```

### Code Quality
```bash
./vendor/bin/pint  # Laravel Pint for code formatting
./vendor/bin/phpunit  # Run tests
```

### Asset Building
```bash
npm run dev  # Development build with Vite
npm run build  # Production build
```

## Architecture Overview

This is a Laravel 12 application for グループホーム (Group Home) guide service that helps users find group homes in Japan.

### Core Models
- **Home**: Main entity representing group homes with spatial data (lat/lng), photos, facilities, costs
- **Pref**: Prefecture data for location hierarchy  
- **Contact**: User inquiries about homes
- **User**: Authentication with Laravel Jetstream
- **OperatorRequest**: Requests from home operators

### Key Features
- **Spatial Search**: Uses `matanyadaev/laravel-eloquent-spatial` for location-based queries
- **Livewire Components**: Interactive forms and search functionality
- **Laravel Folio**: File-based routing for some pages
- **Photo Management**: Image uploads and storage
- **Import System**: CSV import for bulk home data (`gh:import` command)
- **Mail System**: Contact forms and notifications

### Directory Structure
- `app/Models/`: Eloquent models with spatial support
- `app/Livewire/`: Interactive components for forms and search
- `app/Http/Controllers/`: Traditional controllers for core routes
- `resources/views/livewire/`: Livewire component views
- `config/grouphome.php`: App-specific configuration
- `database/migrations/`: Schema with spatial columns

### Deployment
- Uses Laravel Vapor for AWS deployment
- Configuration in `vapor.yml`
- Automated deployments via GitHub Actions

### Custom Commands
- `gh:import`: Import group home data from CSV files
- Custom delete command for data cleanup

### Testing
Tests are located in `tests/Feature/GH/` and cover major functionality including imports, search, and operator features.