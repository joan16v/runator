# runator
Runator Test

He decidido usar Symfony, que es el framework que últimamente más he usado.

------------------------------------------------------------------------------------------------
EJERCICIO 1
------------------------------------------------------------------------------------------------

He creado un bundle WeatherBundle para implementar la funcionalidad del ejercicio 1.

Básicamente el código está en el DefaultController del WeatherBundle, en el weatherAction:
https://github.com/joan16v/runator/blob/master/symfony2/src/Runator/WeatherBundle/Controller/DefaultController.php

Si lo instalamos en un directorio "runator", podemos acceder al servicio con la URL:
http://localhost/runator/symfony2/web/app_dev.php/geoweather?date=2015-08-01&hour=05:00:00&lat=39.4621944&lon=-0.3274952

La ruta está creada en el routing.yml:
https://github.com/joan16v/runator/blob/master/symfony2/src/Runator/WeatherBundle/Resources/config/routing.yml

Para la consulta del tiempo no le incluyo parámetros de fecha, hora, ya que según he visto parece que no se puede acceder al histórico de forma gratuita.

Para guardar en base de datos las weather query, he usado MySQL/Doctrine. He creado la entidad Weather:
https://github.com/joan16v/runator/blob/master/symfony2/src/Runator/WeatherBundle/Entity/Weather.php

Y el método saveWeatherQuery en el DefaultController.

------------------------------------------------------------------------------------------------
EJERCICIO 2
------------------------------------------------------------------------------------------------

He creado el bundle FacebookBundle.

Las entidades POST, COMMENT, AD y LIKE que he modelado son:

https://github.com/joan16v/runator/blob/master/symfony2/src/Runator/FacebookBundle/Entity/Post.php

https://github.com/joan16v/runator/blob/master/symfony2/src/Runator/FacebookBundle/Entity/Comment.php

https://github.com/joan16v/runator/blob/master/symfony2/src/Runator/FacebookBundle/Entity/Ad.php

https://github.com/joan16v/runator/blob/master/symfony2/src/Runator/FacebookBundle/Entity/Like.php

La tabla POST tiene los campos id, text, dateTime y idUser.
La tabla COMMENT tiene id, text, dateTime y idPost.
La tabla AD tiene id y urlImage.

La tabla LIKE tiene id, dateTime, idUser, idPost, idComment y idAd. Los campos idPost, idComment y idAd pueden ser NULL, ya queun like solo pertenecerá a uno de los 3 elementos: o el like pertenece a un post, o a un comment o a un ad.