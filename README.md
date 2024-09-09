<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).






# Integración de Pasarelas de Pago en Laravel

Este proyecto integra dos pasarelas de pago utilizando Laravel: OpenPay y Mercado Pago. Ambas pasarelas permiten a los usuarios realizar pagos a través de diferentes métodos, como tarjeta de crédito y débito, y se integran en el flujo de trabajo de la aplicación con Laravel.

## Requisitos Previos

Antes de comenzar, asegúrate de tener lo siguiente instalado:

- PHP >= 8.0
- Composer
- Laravel >= 8.x
- OpenPay SDK para PHP
- Mercado Pago SDK para PHP
- Cuentas de OpenPay y Mercado Pago (sandbox o producción)

Estructura del Proyecto
Este proyecto sigue las buenas prácticas de Laravel, manteniendo una estructura clara y modularizada. Se implementaron principios de SOLID y patrones de arquitectura para garantizar un código limpio y escalable.

Controllers: Los controladores se encargan de gestionar las solicitudes HTTP y coordinar la lógica de negocio.
Views: Las vistas se encargan de la presentación de la interfaz de usuario.
Pasarelas de Pago Integradas

1. Pasarela de Pago OpenPay
1.1 Pasarela de Pago Directo
Esta pasarela permite realizar un pago con tarjeta de crédito o débito directamente sin redireccionar al usuario a otra página. El flujo es el siguiente:

El usuario completa un formulario con los datos de la tarjeta y el pago.
La aplicación procesa el pago usando la API de OpenPay.
El usuario recibe una confirmación del pago directamente en la misma página.
Rutas involucradas:

/openpayment - Muestra el formulario de pago.
/charge - Procesa el pago con la pasarela directa.
Controlador: PaymentController.php

1.2 Pasarela de Pago con Redirección (Redirect Charge)
Esta pasarela redirige al usuario a una página de OpenPay para completar el pago. Después de que el usuario complete el pago, es redirigido nuevamente a tu aplicación con un ID de transacción para que puedas verificar el estado del pago.

Rutas involucradas:

/openpayment - Muestra el formulario de pago.
/charge - Procesa el pago inicial y redirige al usuario a OpenPay.
/charge/callback - Recibe la respuesta de OpenPay después de que el usuario completa el pago.
Controlador: PaymentController.php

2. Pasarela de Pago Mercado Pago
La integración con Mercado Pago permite procesar pagos con tarjeta de crédito, débito, y otros métodos ofrecidos por la plataforma. Los usuarios pueden completar el pago en la misma página de la aplicación sin necesidad de redireccionar a una página externa.

2.1 Flujo de Pago con Mercado Pago
El usuario completa un formulario con los datos de la tarjeta y el pago.
La aplicación procesa el pago usando la API de Mercado Pago.
Se muestra un mensaje de confirmación de pago o un mensaje de error, según el resultado de la transacción.
Rutas involucradas:

/mercadopago/payment - Muestra el formulario de pago.
/mercadopago/charge - Procesa el pago y muestra el resultado.
Controlador: MercadoPagoController.php

Manejo de Errores
El código está preparado para manejar diferentes tipos de errores que puedan ocurrir durante el proceso de pago en ambas pasarelas:

Errores de OpenPay: OpenpayApiTransactionError, OpenpayApiRequestError, OpenpayApiConnectionError, etc.
Errores de Mercado Pago: Manejo de excepciones proporcionadas por el SDK de Mercado Pago.
En caso de error, se devuelve un mensaje adecuado al usuario y se loguea el error para fines de depuración.

Pruebas
Para realizar pruebas con OpenPay y Mercado Pago, puedes utilizar los entornos de sandbox que te permiten realizar transacciones simuladas sin utilizar dinero real. Asegúrate de configurar tus credenciales de sandbox en el archivo .env.

