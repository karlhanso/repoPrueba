

## Readme - Prueba 

Requisitos para correr este proyecto - Prueba tecnica ptopay

- Php 7.0.3
- Apache 2.0
- Mysql 5.6
- composer
- SoapClient

Para activar el  Cliente SOAP. Se debe buscar en el php.ini la siguiente linea y descomentarla
extension=php_soap.dll

Una vez hecho este paso, se debe reiniciar el apache y verificar con un phpinfo() .La seccion SOAP
se deberar mostrar las libreria soap cargada. En este caso debe aparecer SoapClient enabled.

Para linux se debe instarlar la libreria por linea de comandos, dependiendo su distribucion.
Ejemplo
-  para Ubuntu: sudo apt-get install php7.0-soap

Una vez actividada esta extencion se puede clonar el repositorio, de la siguiente manera

- git clone https://github.com/karlhanso/repoPrueba.git

Con el proyecto ya ubicado, dentro del servidor web. Se debe configurar las variables de entorno, en un achivo .env que viene dentro de proyecto, el cual debe contener las credenciales acordes y informacion el webservice. Este archivo no esta disponible en este repositorio dadas las condiciones de seguridad.

Ya teniendo, nuestro proyecto con nuestro archivo .env y la base de datos en la cual van a quedar nuestros registros. Se procede entonces a correr las migraciones, de la siguiente manera

- php artisan migrate

Una vez con nuestras migraciones ya ejecutadas. Se debe obtener la lista de bancos.Para hacer esto se debe crear una tarea programada en windows. La cual debe de correr de manera diaria. Esta ejecutara el siguiente comando. Se deja un manual corto de como hacerlo   

- php artisan schedule:run
- Como usar el programador de tareas de windows, para laravel: https://quantizd.com/how-to-use-laravel-task-scheduler-on-windows-10/


Una vez ejecutado este comando para obtener la lista de bancos. Se puede abrir el proyecto dentro del navegador de la sigiente forma localhost/nombreproyecto/public/inicial . Esto nos llevara a la ventana principal, en la cual podemos entrar los datos de la transacion.

Llenados estos datos. se le debe dar enviar, luego la pagina redirigue automaticamente a la pagina de pse del banco de pruebas. En la cual 
se debe aprovar la transaccion, mediante las credenciales registradas en pse. Al terminar la aprovacion de la transsacion en pse. Se redirigue a nuestro aplicativo, donde aparecen las transacciones hechas y su estado.