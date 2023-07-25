<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Calculadora - Proyecto de Backend
Este proyecto es una aplicación de backend desarrollada en Laravel, que proporciona servicios para realizar operaciones matemáticas básicas. El objetivo principal es demostrar mis habilidades como programador y mi capacidad para implementar soluciones eficientes siguiendo las especificaciones proporcionadas por la empresa.

## Requisitos del Proyecto
PHP >= 8.1
Laravel >= 10.10
Composer >= 2.1
PHPUnit (opcional para pruebas)

## Instalación
  1. Clonar el repositorio
  2. Ejecutar el comando `composer install` en la raiz del proyecto
  3. Crear una base de datos en MySQL
  4. Copiar el archivo `.env.example` y renombrarlo a `.env`
  5. Configurar las variables de entorno en el archivo `.env` para la conexión a la base de datos
  6. Ejecutar el comando `php artisan migrate`
  7. Ejecutar el comando `php artisan serve`
  8. Acceder a la ruta `http://localhost:8000`

## Uso
La aplicación cuenta con 7 rutas para realizar las operaciones matemáticas básicas. Todas las rutas reciben dos parámetros: `a` y `b`, que son los números a operar. Las rutas son las siguientes:

  1. Suma: `http://localhost:8000/add/{operatorA}/{operatorB}`
  2. Resta: `http://localhost:8000/subtract/{operatorA}/{operatorB}`
  3. Multiplicación: `http://localhost:8000/multiply/{operatorA}/{operatorB}`
  4. División: `http://localhost:8000/divide/{operatorA}/{operatorB}`
  5. Potencia: `http://localhost:8000/power/{operatorA}/{operatorB}`
  6. Porcentaje: `http://localhost:8000/percentage/{operatorA}/{operatorB}`
  7. Promedio: `http://localhost:8000/average/{operatorA}/{operatorB}`

Además de las rutas anteriores, la aplicación cuenta con una ruta para obtener el registro de operaciones realizadas en la BD. La ruta es la siguiente:
  1. Registro de operaciones: `http://localhost:8000/operations`

Comando Artisan
La aplicación también incluye un comando Artisan personalizado llamado operations, que te permite realizar operaciones matemáticas desde la línea de comandos. Para utilizarlo, ejecuta el siguiente comando:

`php artisan operations {operatorA} {operatorB} {operation}`

Si se quiere operar con numeros negativos, se debe seguir la  siguiente sintaxis:
`php artisan operations {operatorA} -- -{operatorB} {operation}`

## Ejemplos
Ejemplo de uso de rutas:
  1. Suma: `http://localhost:8000/add/5/5` => Resultado: 10

Ejemplo de uso de comando artisan:
  1. Suma: `php artisan operations 5 5 add` => Resultado: 10

Ejemplo de uso de comando artisan con negativos:
  1. Suma: `php artisan operations 5 -- -5 add`  => Resultado: 0

## Pruebas
Para ejecutar todas las pruebas unitarias, ejecutar el comando `php artisan test`.
Existen dos grupos de pruebas: `calculator` y `routes`.
Para ejecutar un grupo de pruebas en específico, ejecutar el comando `php artisan test --group {groupName}`.

## Plus
La aplicacion incluye un registro de operaciones realizadas en la BD, que se puede consultar en la ruta `http://localhost:8000/operations`

## Posibles Mejoras
A pesar de que este proyecto cumple con las especificaciones requeridas, siempre hay margen para mejoras y optimizaciones. 
Algunas posibles mejoras que se podrían considerar para futuras versiones incluyen:

  1. **Manejo de Excepciones**: 
  Implementar un manejo más sofisticado de excepciones para proporcionar mensajes de error más descriptivos y amigables para los usuarios.

  2. **Más Operaciones Matemáticas**: 
  Agregar más operaciones matemáticas avanzadas, como cálculo de raíces cuadradas, logaritmos, funciones trigonométricas, cálculo de divisas, etc.

  3. **Internacionalización**: 
  Implementar soporte para múltiples idiomas y monedas, especialmente si la aplicación se utiliza en entornos internacionales.

  4. **Seguridad**: 
  Realizar una auditoría de seguridad para garantizar que la aplicación esté protegida contra posibles vulnerabilidades y ataques, además de implementar un sistema de autenticación y autorización.

  5. **Autenticación y Autorización**: 
  Agregar un sistema de autenticación y autorización para proteger ciertas rutas y operaciones, especialmente si la aplicación se utiliza en un entorno más complejo.

  6. **Cacheo de Resultados**: 
  Implementar un mecanismo de cacheo para almacenar en caché los resultados de operaciones frecuentes y reducir la carga en el servidor.

  7. **Mejora de Pruebas**: 
  Ampliar las pruebas unitarias y agregar pruebas de integración para garantizar el correcto funcionamiento de todas las funcionalidades de la aplicación.

  8. **Interfaz de Usuario**:
  Desarrollar una interfaz de usuario amigable y accesible para que los usuarios puedan realizar operaciones matemáticas de forma visual e intuitiva. Esto permitiría que la aplicación sea más accesible
  para aquellos que no estén familiarizados con el uso de API o comandos de consola.     

## Contacto
Cualquier duda o comentario, favor de contactarme a través de mi correo electrónico: nicolopezdelerma@gmail.com

## Contribuciones
Este proyecto es solo una muestra de mi trabajo y no acepta contribuciones. Si tienes sugerencias o comentarios, no dudes en comunicármelos.

## Notas Finales
Gracias por revisar mi proyecto. Si tienes alguna pregunta o necesitas más información, por favor, no dudes en contactarme. 
¡Espero que esta aplicación demuestre mis habilidades como programador y cumpla con las especificaciones proporcionadas por la empresa!
