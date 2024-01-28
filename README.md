![image](https://github.com/MohAlkurdi/newsletter-app/assets/64875290/97f58490-5873-48e2-b959-482147e2d036)

### A web app to manage newsletter

Features:

-   Users can subscribe to the newsletter
-   Admin dashboard to:
    -   See the list of subscriber emails
    -   Create and publish a newsletter
    -   Change the header and description for the landing page
-   Users can unsubscribe form the newsletter

## Installation

Clone the repo locally:

```sh
git clone https://github.com/MohAlkurdi/newsletter-app.git && cd newsletter-app
```

Install PHP dependencies:

```sh
composer install
npm install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

Create filament user

```bash
php artisan make:filament-user
```

Run the dev server

```sh
php artisan serve
```

You're ready to go! Visit
`http://localhost:8000/`

Dashboard At
`http://localhost:8000/admin/login`
