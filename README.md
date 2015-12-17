# runator
Runator Test

He decidido usar Symfony, que es el framework que últimamente más he usado.

He creado un bundle WeatherBundle para implementar la funcionalidad del ejercicio 1.

Básicamente el código está en el DefaultController del WeatherBundle, en el weatherAction:
https://github.com/joan16v/runator/blob/master/symfony2/src/Runator/WeatherBundle/Controller/DefaultController.php

Si lo instalamos en un directorio "runator", podemos acceder al servicio con la URL:
http://localhost/runator/symfony2/web/app_dev.php/geoweather?date=2015-08-01&hour=05:00:00&lat=39.4621944&lon=-0.3274952

La ruta está creada en el routing.yml:
https://github.com/joan16v/runator/blob/master/symfony2/src/Runator/WeatherBundle/Resources/config/routing.yml

Para la consulta del tiempo no le incluyo parámetros de fecha, hora, ya que según he visto parece que no se puede acceder al histórico de forma gratuita.