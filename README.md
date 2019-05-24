# Trabajo Final 2019
## Descripción
Trabajo Final de la Carrera Tecnicatura Superior en Desarrollo Web - Universidad Nacional del Comahue

## Integrantes
* Allamilla Luis
* Boisselier Mariano
* Raúl Maximiliano

## Requisitos
* Git
* [Docker](https://get.docker.com/) y [Docker Compose](https://docs.docker.com/compose/install/)
* IDE con soporte para PHP v7.x ([NetBeans](https://netbeans.apache.org/) o similar)

Estructura de los Directorios
-------------------

        app/             contiene la aplicación web

## Preparación del Entorno
Dentro de la carpeta que alojará el proyecto, clonar el repositorio remoto
~~~
$ git clone https://github.com/allamillaluis/TRABAJO-FINAL-2019.git
~~~
Dentro de la carpeta **app**, iniciar la imagen del contenedor Docker
~~~
$ docker-compose up -d
~~~
Instalar las dependencias con Composer
~~~
$ docker-compose exec php composer install
~~~
Ejecutar el Setup Inicial
~~~
$ docker-compose exec php yii app/setup
~~~
(Opcional) Cargar datos de prueba
~~~
docker-compose exec php yii fixture/load '*'
~~~

El sitio será accesible desde [localhost:8000](http://localhost:8000)

Para editar el Codigo, importar el proyecto de NetBeans alojado en la carpeta **app**
