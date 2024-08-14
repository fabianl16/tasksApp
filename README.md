<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Parte 1 Cuestionario de conocimientos

1. ¿Qué es Eloquent en Laravel?
``` 
Un ORM para facilitar la interacción con bases de datos.
```
2. ¿Cuál es el propósito de las migraciones en Laravel?
``` 
Gestionar la estructura de la base de datos.
```
3. ¿Qué comando de Artisan se utiliza para crear un controlador en Laravel?
``` 
php artisan make:controller
```
4. ¿Qué método de Eloquent se usa para obtener el primer resultado de una consulta?

``` 
first();
```
5. ¿Cuál es el propósito de un Seeder en Laravel?
``` 
Llenar la base de datos con datos de prueba.
```
6. ¿Cómo se relacionan las tablas en una relación “muchos a muchos” en Laravel?
``` 
Mediante una tabla intermedia.
```
7. ¿Qué significa “PSR-4” en el contexto de PHP?
``` 
Una especificación de autoloading de clases.
```
8. ¿Cuál es la forma correcta de establecer una relación “uno a uno” en Eloquent?
``` 
$this->hasOne(RelatedModel::class)
```
9. ¿Cuál es la manera más segura de evitar inyecciones SQL en Laravel?
``` 
Validar todas las entradas del usuario.
```
10. ¿Qué función se utiliza para manejar errores y excepciones en Laravel?
``` 
try...catch
```

# Parte 2 Problema de resolución diaria

Instrucciones: Describe detalladamente cómo resolverías el siguiente problema común que podría
encontrarse en el desarrollo.
Problema: Recientemente, un cliente ha informado que el sistema de autenticación de su aplicación web
ha dejado de funcionar después de una actualización. Los usuarios no pueden iniciar sesión y reciben un
mensaje de error genérico. Describe el proceso que seguirías para diagnosticar y resolver este problema.
Incluye los pasos específicos y las herramientas que utilizarías.

## 🟢 Respuesta

1. Revision de logs 
``` 
Accederia a los logs de laravel en carpeta storage y revisaria si hay algun tpo de mensaje que se identifique con algun metodo de inicio de sesion o con el mensaje de error que esta enviando el navegador
```
2. Verificacion de clases, metódos y archivos de autenticacion
``` 
Accederia a los archivos de autenticación como config/auth.php o tambien revisaria si estan correctamente cargados las varibles de entorno en el archivo.env
```
3. Comprobación de la Base de Datos
``` 
Realizaria consultar puras a la BD para revisar si no hay algun problema con las tablas
```
4. Rutas de autenticacion
``` 
Revisaria si las rutas de autenticacion tienen los privilegios correctos o si estan debidamente definidas en el archivo de rutas. ademas de revisar el middleware de laravel en busca de omisiones o funciones alteradas 
```
4. Codigo autenticación 
``` 
Por ultimo validaria cualquier cambio o todo el codigo de la autenticacion, incluyendo controladores, modelos y servicios. reiniciando la cache del proyecto, vistas y rutas
``` 


# Parte 3 prueba tecnica configurar entorno de desarrollo

1. Clonar proyecto 
``` 
git clone 'repositorio remoto'
```
2. Ejecutar composer para instalar para instalar librerias y dependencias 
``` 
composer install 
```
3. Clonar el archivo ``` .env.example ``` y renombrarlo a ``` .env ```
4. Generar php key
``` 
php artisan key:generate
```
5. Generar llave JWT
``` 
php artisan jwt:secret
```
6. Cambiar las variables de entorno para crear un super usuario y la api key para la obtención del clima:
```
SUPER_ADMIN_EMAIL=
SUPER_ADMIN_PASSWORD=
WEATHER_API_KEY=
```
7. Cambiar las variables de la BD
8. Levantar la base de datos, migrar y ejecutar las seed
```
php artisan migrate:fresh --seed
```
9. Levantar: 
``` 
php artisan serve 
``` 

## Endpoints y pruebas

1. Registrar usuario POST
``` 
http://127.0.0.1:8000/api/register
``` 
``` Este endpoint registra un usuario en la BD, es necesario estar autenticado para hacerlo ademas de requerir como obligatorios los siguientes parametros: name, email, password, password_confirmation  ```

## Response

  ```json
{
    "user": {
        "name": "Fabian Loaeza",
        "email": "floaeza@bbinco.com",
        "id": 6
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vdGFza3NhcHAudGVzdC9hcGkvcmVnaXN0ZXIiLCJpYXQiOjE3MjM2NDk1NjgsImV4cCI6MTcyMzY1MzE2OCwibmJmIjoxNzIzNjQ5NTY4LCJqdGkiOiJuNmliREZkRXRXbnQ4QmJmIiwic3ViIjoiNiIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.HdH5FSd_YRMizAMthznBdeVnHXs9GBdXYtL2NMUszpw"
}
```
 
2. Login POST
``` 
http://127.0.0.1:8000/api/login
``` 
``` Este endpoint inicia sesión de un usuario ya registrado en la BD, requiere los siguientes parametros obligatorios: email, password ```

## Response
  ```json
{
    "user": {
        "id": 5,
        "name": "Super Admin",
        "email": "floaeza@gmail.com",
        "email_verified_at": null
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vdGFza3NhcHAudGVzdC9hcGkvbG9naW4iLCJpYXQiOjE3MjM2NDgxMTYsImV4cCI6MTcyMzY1MTcxNiwibmJmIjoxNzIzNjQ4MTE2LCJqdGkiOiJ4R21jTlp3UTgzOGNiQTNyIiwic3ViIjoiNSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.G8rJYmTGDYSD3grWjF7x2Rzc9RlwQztcbfaG5KHCeI4"
}
```

3. Tareas por usuario autenticado GET
``` 
http://127.0.0.1:8000/api/tasks
``` 

``` Este endpoint regresa todas las tareas del usuario autenticado es necesario estar autenticada (mandar el bearer token)```

## Response

```json
    {
        "id": 1,
        "user_id": 5,
        "title": "example",
        "description": "example",
        "status": "pending",
        "due_date": null,
        "created_at": "2024-08-14T08:52:04.000000Z",
        "updated_at": "2024-08-14T08:52:04.000000Z"
    }
```

4. Creacion de una nueva tarea POST
``` 
http://127.0.0.1:8000/api/tasks
``` 
``` Este endpoint crea una tarea y regresa la misma en forma JSON, parametros obligatorios : title, description, status```

## Response

```json
{
    "title": "example2",
    "description": "example2",
    "status": "pending",
    "user_id": 5,
    "updated_at": "2024-08-14T15:10:05.000000Z",
    "created_at": "2024-08-14T15:10:05.000000Z",
    "id": 2
}
```

5. Actualización de una tarea existente PUT
``` 
http://127.0.0.1:8000/api/tasks/{id}
``` 
``` Este endpoint actualiza una tarea por id  segun la propiedad mandada en la solicitud ```

## Response

```json
{
    "id": 2,
    "user_id": 5,
    "title": "batman",
    "description": "example2",
    "status": "pending",
    "due_date": null,
    "created_at": "2024-08-14T15:10:05.000000Z",
    "updated_at": "2024-08-14T15:25:15.000000Z"
}
```
6. Eliminar una tarea existente DELETE
``` 
http://127.0.0.1:8000/api/tasks/{id}
``` 
``` Este endpoint elimina una tarea segun el id en la url ```

## Response

```
retorna 204 
```
4. Consulta de apiWeather
``` 
http://127.0.0.1:8000/api/weather
``` 
``` Este consulta la api de OpenWeather y da como respuesta el pronostico del clima segun la latitud y longitud enviadas, lat y lon son obligatorias```

## Response

```json
{
    "coord": {
        "lon": 44.34,
        "lat": 10.99
    },
    "weather": [
        {
            "id": 800,
            "main": "Clear",
            "description": "clear sky",
            "icon": "01n"
        }
    ],
    "base": "stations",
    "main": {
        "temp": 303.41,
        "feels_like": 308.32,
        "temp_min": 303.41,
        "temp_max": 303.41,
        "pressure": 1004,
        "humidity": 68,
        "sea_level": 1004,
        "grnd_level": 1004
    },
    "visibility": 10000,
    "wind": {
        "speed": 8.92,
        "deg": 289,
        "gust": 13.76
    },
    "clouds": {
        "all": 5
    },
    "dt": 1723651314,
    "sys": {
        "country": "SO",
        "sunrise": 1723603955,
        "sunset": 1723648933
    },
    "timezone": 10800,
    "id": 54746,
    "name": "Lughaye",
    "cod": 200
}
```