# 📘 DWES02 - Tarea de Evaluación

## Página de Gestión de Vehículos

### 📝 Descripción general

Desarrollarás una web tipo SSR para una empresa de gestión de vehículos. Esta dispondrá de dos funcionalidades:

- Recuperar los datos de un vehículo introduciendo su ID.
- Dar de alta temporalmente un vehículo nuevo a partir de los datos introducidos a través de la interfaz gráfica.

> [!NOTE]
> 
> En esta tarea utilizaremos un fichero PHP como fuente de datos en lugar de una base de datos real.

### 🎯 Objetivos de aprendizaje

- Entender los principios de programación básicos e intermedios.
- Desarrollar código empleando POO.
- Trabajar con estructuras de datos.
- Conocer y desarrollar la arquitectura MVC.

### 🛠️ Ejercicios

#### Ejercicio 1: Arquitectura

- Crea una arquitectura MVC e incluye los ficheros que te facilito en el apartado de *recursos* en los directorios que correspondan.

- Al iniciar la aplicación se debe cargar el formulario de `index.html`, y este llamará al *front-controller* `index.php`.

- Configura los formularios de `index.html` para que tanto las peticiones `GET` como las peticiones `POST` sean enviadas al *front-controller* `index.php`.

> [!IMPORTANT]
> El *front-controller* determinará el método HTTP utilizado en la petición:
> 
> - Si recibe una petición `GET`, llamará al método `getById()` del controlador.
> 
> - Si recibe una petición `POST`, llamará al método `store()` del controlador.

- La aplicación empleará *namespaces* y el fichero `autoload.php` generado mediante *Composer* para gestionar la carga automática de clases.

- Crea un modelo de datos basado en tres clases. Utilizando la herencia, representa los diferentes tipos de vehículos:
  
  - `Vehiculo`
    - id `int`
    - marca `string`
    - modelo `string`
    - anio `int`
    - tipo `string`
  - `Moto`
    - sidecar `bool`
  - `Coche`
    - puertas `int`

#### Ejercicio 2: Recuperar un vehículo mediante su ID

- Cuando se introduzca un ID en la interfaz y se pulse *Buscar*, se llamará al método `getById()` del controlador, que realizará lo siguiente:
  
  - Llamar al método `leerVehiculos()`, que:
    - Accederá a la ruta donde se encuentra el fichero `vehiculos_bbdd.php`.
    - Parseará los diferentes vehículos a objetos de tipo `Coche` o `Moto`, según el atributo `tipo`.
    - Devolverá un array de objetos con todos los vehículos.
  - Comparará el ID recibido con el de los vehículos del array y devolverá el vehículo cuyo `id` coincida.
  - Si no existe ningún vehículo con el ID recibido, devolverá `null` y se mostrará en la interfaz un mensaje indicando que no se ha encontrado ningún vehículo.
  - Se mostrarán los datos del vehículo en una nueva interfaz `vehiculo_get.php`.

#### Ejercicio 3: Procesar un nuevo vehículo

- Cuando se introduzca un vehículo en la interfaz y se pulse *Guardar*, se llamará al método `store()` del controlador, que realizará lo siguiente:
  - Usando el método `leerVehiculos()` del ejercicio anterior, leerá todos los vehículos de `vehiculos_bbdd.php`.
  - Creará un objeto `Coche` o `Moto`, según corresponda, con los datos introducidos a través de la interfaz.
  - Añadirá el nuevo objeto al array de vehículos.
  - Mostrará todos los vehículos en una interfaz `vehiculo_post.php`.

> [!TIP]
> 
> - Te facilito un fichero `vehiculos_prueba.txt` con diferentes vehículos de prueba para que puedas copiar y pegar en la caja de texto de la interfaz gráfica.
> 
> - Ten en cuenta que cada línea representa un vehículo independiente, por lo que debes copiar y pegar un único vehículo cada vez.

> [!IMPORTANT]
> 
> Los vehículos enviados desde el formulario están en formato JSON. Cuando recibas el texto en el *front-controller*, utiliza `json_decode()` para convertirlo en un array asociativo antes de trabajar con sus datos.
> 
> Aquí tienes un [ejemplo](https://www.w3schools.com/Php/func_json_decode.asp).
