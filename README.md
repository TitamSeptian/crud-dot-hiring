## Pendahuluan

Pada aplikasi ini ditujukan untuk mengerjakan soal pada DOT Hiring

## Tentang

Pada aplikasi ini saya menggunakan

-   [Fortify](https://laravel.com/docs/9.x/fortify)
-   [tailwindcss](https://tailwindcss.com/docs/)
-   [jquery](https://jquery.com/)
-   [Laravel 9.x](https://laravel.com/docs/9.x)

## Cara install

1. clone [repo ini](https://github.com/TitamSeptian/crud-dot-hiring)
2. lakukan command install dependency

```
composer install
```

```
npm install
```

3. copy file .env.example menjadi .env
4. lakukan command untuk membuat app_key

```
php artisan key:generate
```

5. set-up .env isi credentials db yang ada di komputer
   lakukan command ini untuk membuat table table
6. lakukan command untuk membuat table

```
php artisan migrate
```

7. command untuk membuat data faker

```
php artisan db:seed
```

8. cara menjalankan di local

```
npm run dev
```

```
php artisan serv
```
