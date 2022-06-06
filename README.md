# 
# Cuatro en línea en PHP

Este es un proyecto de la materia Adaptación al Ambiente de Trabajo, de la especialidad Informática. Nuestro objetivo es que pueda jugar al cuatro en línea. ¡Aquí sabrá cómo!

## ¿Qué necesito?  

Para empezar, deberás instalar:  

* **Docker**. [Aquí](https://www.docker.com/get-started/) está la documentación.
* **DDEV**. [Aquí](https://ddev.readthedocs.io/en/stable/) está la documentación.
* **GIT**. [Aquí](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git) está la documentación.

## Siga estos pasos

### Clonar el repositorio
1. Para empezar, cree una carpeta en donde guardar el proyecto.

2. Utilice `cd` para moverse al directorio creado anteriormente.

3. Clone este repositorio: `git clone https://github.com/eugelotudx/cuatroenlinea`. Con `ls -la`, verá todo el contenido descargado.

4. Cambiése al directorio `cuatroenlinea` que ha descargado.

5. Ahora, deberá configurar DDEV

### Configurar DDEV

6. Con `ddev config`, podrá cambiar la configuración 
DDEV. Primero, inserte el nombre del proyecto deseado, o presione `Enter` si desea que sea "**cuatroenlinea**". Deje en blanco el segundo campo solicitado, así, el proyecto se guardará en el directorio actual. En el tercer campo deberá indicar el tipo del proyecto: **laravel**.

7. Para poder utilizar el proyecto, deberá tener un composer. Para adquirirlo, ejecute el siguiente comando:
`ddev composer install`

8. Utilice `ddev php artisan key:generate` para crear un par de llaves de autenticación.

9. Añada contenido al archivo **.env** mediante `cp .env.example .env`

### Abrir el proyecto

10. Ejecute `ddev start` y luego `ddev launch`. Debería ver una imagen como la siguiente

![Página de inicio de Laravel](/imagenes/laravel.PNG)

11. Para jugar, deberá usar una url como la siguiente: `https://cuatroenlinea.ddev.site/jugar/` y añadirle un número con dígitos entre el 1 al 7. Por ejemplo: `https://cuatroenlinea.ddev.site/jugar/177665454`. Esta última debería mostrar la siguiente vista  

![Vista del juego cuatro en línea](/imagenes/cuatroenlinea.png)

### Cerrar el proyecto
Para cerrar el proyecto, ejecute `ddev poweroff`


## ¡Disfrute!