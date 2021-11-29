![ENASA](public/vendor/adminlte/dist/banner.png "ENASA")


# Instalación

Nota: Para el funcionamiento del proyecto dirigido a ENASA se debe instalar [LARAGON](https://laragon.org/) y para ellos invitamo a seguir la [documentación oficial](https://laragon.org/docs/install.html) é invitamos a consultar el manual ubicado en la raiz del proyecto titulado __Manual de instalacion__.
### 1. Descargar


Descargue y siga las instrucciones anteriores y colóquelos en su servidor. (Este proyecto fue desarrollado en Php y le recomiendo encarecidamente que siga las instruciones del __Manual de instalacion__,para obtener la configuración óptima del servidor y sin errores a través de la instalación).

### 2. Archivos de entorno
Este paquete se suministra con un archivo .env.example en la raíz del proyecto.

Debe cambiar el nombre de este archivo a solo .env

Nota: Asegúrese de que se muestran los archivos ocultos en su sistema.

### 3. Compositor
Las dependencias del proyecto se gestionan a través de la herramienta PHP Composer. El primer paso es instalar las depencencies navegando en su proyecto en terminal y escribiendo este comando:

composer install

### 4. NPM/Hilo
Para instalar los paquetes Javascript para el desarrollo frontend, necesitará el Node Package Managery, opcionalmente, el Yarn Package Manager de Facebook (Recomendado)

Si solo tienes NPM(Viene por defecto al instalar laragon) instalado tienes que ejecutar este comando desde la raíz del proyecto:

    npm install


### 5. Crear base de datos
Debe crear la base de datos en el servidor y en el archivo .env actualizar las siguientes líneas:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=silosenaa
    DB_USERNAME=root
    DB_PASSWORD=

Cambie estas líneas para reflejar la nueva configuración de la base de datos.

### 6. Comandos artesanales
Lo primero que vamos a hacer es establecer la clave que Laravel usará al hacer cifrado.

php artisan key:generate

Debería ver un mensaje verde que indica que su clave se generó correctamente. Así como debería ver reflejada la variable APP_KEY en su archivo .env.

Es hora de ver si las credenciales de su base de datos son correctas.

Vamos a ejecutar las migraciones integradas para crear las tablas de base de datos:

php artisan migrate

Debería ver un mensaje para cada tabla migrada, si no lo hace y ve errores, lo más probable es que sus credenciales no sean correctas.

Ahora vamos a establecer la información de la cuenta de administrador. Para hacer esto, debe navegar a este archivo y cambiar el nombre / correo electrónico / contraseña de la cuenta de administrador.

Puede eliminar los otros usuarios ficticios, pero no elimine la cuenta de administrador o no podrá acceder al backend.

Ahora sellen la base de datos con:

php artisan db:seed

Debería recibir un mensaje para cada archivo sembrado, debería ver la información en las tablas de su base de datos.

### 7. Ejecución de NPM '*'
Ahora que tiene las tablas de base de datos y las filas predeterminadas, debe crear los estilos y scripts.

Estos archivos se generan utilizando Laravel Mix,que es un envoltorio alrededor de muchas herramientas, y funciona fuera de webpack.mix.js en la raíz del proyecto.

Puedes construir con:

npm run <command>

Los comandos disponibles se enumeran en la parte superior del archivo package.json bajo la tecla 'scripts'.

Verá una gran cantidad de información parpadear en la pantalla y luego se le proporcionará una tabla al final que explica lo que se compiló y dónde viven los archivos.

En este punto, debería poder presionar el proyecto en su navegador local y ver el proyecto, así como poder iniciar sesión con el administrador y ver el backend.


### 8. Almacenamiento: enlace
Una vez instalado el proyecto, debe ejecutar este comando para vincular la carpeta de almacenamiento público para las cargas de avatares de usuario:

php artisan storage:link
