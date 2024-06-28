# Calculadora API

Este es un proyecto de API de calculadora simple desarrollado en Laravel. La API permite realizar operaciones aritméticas básicas como suma, resta, multiplicación y división.

## Requisitos

- PHP >= 8.0
- Composer
- Laravel >= 10.x

## Instalación

1. Clona el repositorio:
    ```bash
    git clone 
    https://github.com/anabdr/anaMariaCuevas.git
    cd anaMariaCuevas
    ```

2. Instala las dependencias:
    ```bash
    composer install
    ```

3. Configura el archivo `.env`:
    ```bash
    cp .env.example .env
    ```

    Edita el archivo `.env` para configurar la base de datos y otras variables de entorno necesarias.

4. Genera la clave de la aplicación:
    ```bash
    php artisan key:generate
    ```


## Endpoints API

1. Suma
    GET /api/add/{operatorA}/{operatorB}
    Respuesta: {Result : {resultado}}

2. Resta
    GET /api/substract/{operatorA}/{operatorB}
    Respuesta: {Result : {resultado}}

3. Suma
    GET /api/multiply/{operatorA}/{operatorB}
    Respuesta: {Result : {resultado}}

4. Divide
    GET /api/divide/{operatorA}/{operatorB}
    Respuesta: {Result : {resultado}}


## Validacion de operaciones

1. Operación no validad
    GET /api/hola/{operatorA}/{operatorB}
    Respuesta: {"La operación no existe"}


## Comandos

php artisan calculate:operation {operation} {operatorA} {operatorB}

1. Suma
    php artisan calculate:operation add {operatorA} {operatorB}
    Respuesta: El resultado de la operación es: {resultado}

2. Resta
    php artisan calculate:operation substract {operatorA} {operatorB}
    Respuesta: El resultado de la operación es: {resultado}

3. Suma
    php artisan calculate:operation multiply {operatorA} {operatorB}
    Respuesta: El resultado de la operación es: {resultado}

4. Divide
    php artisan calculate:operation divide {operatorA} {operatorB}
    Respuesta: El resultado de la operación es: {resultado}


## Test

php artisan test