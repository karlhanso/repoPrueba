
## Readme 
## Prueba técnica ptopay
Requisitos de software para correr este proyecto
- Php 7.0.3
- Apache 2.0
- Mysql 5.6
- composer
- SoapClient

Para activar el Cliente SOAP. Se debe buscar en el archivo php.ini la siguiente línea 
- extension=php_soap.dll
luego se debe descomentar

Una vez hecho este paso, se debe reiniciar el apache y verificar con un phpinfo() .La sección SOAP
se deberá mostrar las librería soap cargada. En este caso debe aparecer SoapClient enabled.

Para linux se debe instalar la librería por línea de comandos, dependiendo su distribución.
Ejemplo
-  para Ubuntu: sudo apt-get install php7.0-soap

Una vez activada esta extensión se debe clonar el repositorio, de la siguiente manera

- git clone https://github.com/karlhanso/repoPrueba.git

Con el proyecto ya ubicado, dentro del servidor web. Se debe configurar las variables de entorno, en un archivo  .env que viene dentro de proyecto, el cual debe contener las credenciales acordes y información el webservice. Este archivo no está disponible en este repositorio dadas las condiciones de seguridad del gitignore

Ya teniendo, nuestro proyecto con nuestro archivo .env y la base de datos en la cual van a quedar nuestros registros. Se procede entonces a correr las migraciones, de la siguiente manera

- php artisan migrate

Una vez con nuestras migraciones ya ejecutadas. Se debe obtener la lista de bancos. Para hacer esto se debe crear una tarea programada en windows o un cron job en linux. La cual debe de correr de manera diaria. Esta ejecutara el siguiente comando. Se deja un manual corto de cómo hacerlo   

- php artisan schedule:run
- Como usar el programador de tareas de windows, para laravel: https://quantizd.com/how-to-use-laravel-task-scheduler-on-windows-10/

Una vez ejecutado este comando para obtener la lista de bancos. Se puede abrir el proyecto dentro del navegador de la siguiente forma localhost/nombreproyecto/public/inicial . Esto nos llevara a la ventana principal, en la cual podemos entrar los datos de la transacción.

Llenados estos datos. se le debe dar enviar, luego la página redirige automáticamente a la página de pse del banco de pruebas. En la cual 
se debe aprobar la transacción, mediante las credenciales registradas en pse. Al terminar la aprobación de la transacción. Se redirige a nuestro aplicativo, donde aparecen las transacciones hechas y su estado.

El proyecto cuenta, con dos tablas. La primera "my_transactions" registra el aprovisionamiento, la segunda compra registra el estado de la transacción.

Para Ejecutar la pruebas unitarias. Se debe ejecutar el siguiente comando dentro del proyecto
- php ./vendor/phpunit/phpunit/phpunit
