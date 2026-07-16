make a clone form the repository
composer install
npm install
make the connection with DB take reference (credencials) from .env.example file
then migrate the table 
php artisan migrate
then php atrisan serve
npm run dev
make a table for sumer admin
php artisan make:migration create_admins_table

# Multi Tenant SaaS Application

## Project Overview

This project is a Multi Tenant SaaS application built using Laravel where a Super Admin can manage multiple companies (tenants).

Each tenant has isolated data using PostgreSQL schema based multi tenancy architecture.


## Features

### Super Admin

- Login authentication
- Create companies
- Manage tenant status
- Activate/Deactivate companies


### Tenant Admin

- Separate tenant login
- Tenant dashboard
- Create tasks
- View tasks
- Update tasks
- Delete tasks


## Multi Tenancy Architecture

The application uses PostgreSQL schema based tenancy.

Each company gets its own schema dynamically.

Example:
