# Test laravel

El test fue desarrollado con laravel y vue

## Antes de comenzar

Para ejecutar debes instalar `PHP` y `Composer`. Esto varía dependiendo de tu sistema operativo.

## Comenzar

* Clona el proyecto

```bash
git clone https://github.com/Abraham15rivas/test-laravel-18-12-2021.git
```

* Ve a la raíz del proyecto

```bash test-laravel-18-12-2021
cd 
```

## Preparar entorno

* Cambia a la rama `develop`

```bash
git checkout develop
```

* Sincroniza con rama remota

```bash
git pull origin develop
```

* Copiar `.env.example` a `.env`

```bash
cp .env.example .env
```

* Actualiza variables de entorno entregadas en archivo `.env`

## Instalar bibliotecas

* Instalar dependencias con `composer` para el backend

```bash
composer install
```

* Instalar dependencias con `npm` para el frontend "vue"

```bash
npm install
```

## Migraciones

* Migra las tablas a tu base de datos local (revisar `.env`) y ejecutar los seed

```bash
php artisan migrate --seed
```

## Test Unit

* Para probar tres funcionalidades

```bash
php artisan test
```

## Compilar archivos de vue

```bash
npm run dev
```

## Levantar proyecto
* Ejecutar proyecto

```bash
php artisan serve
```

* En un navegador ir a

```
http://localhost:8000
```

## Logearse

* Una vez ejecutandose el proyecto en el navegador se debe iniciar session con el siguiente usuario admin@test.com, password secret123, cuya credenciales se cargan en los seed