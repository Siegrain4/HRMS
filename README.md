## Tutorial Instalasi

clone project terlebih dahulu

Jalankan
`composer install`

Buat .env dan rubah nama database dengan databse anda
`cp .env.example .env`

Generate key
`php artisan key:generate`

Install laravel ui (disini saya menggunakan bootstrap)
`composer require laravel/ui`
lalu
`php artisan ui bootstrap --auth`

lalu jalankan
`npm install && npm run dev`
untuk build semua file javascript dan css

Migrasi database
`php artisan migrate`

Jalankan Server
`php artisan serve`

## Flowchart


![flowchart drawio](https://github.com/Siegrain4/HRMS/assets/57306527/de692b13-bebf-4d78-9083-e326cf8f7e7a)

## Mockup


![New Wireframe 1](https://github.com/Siegrain4/HRMS/assets/57306527/04a405a0-5aeb-4032-b2f1-8126928388ae)


