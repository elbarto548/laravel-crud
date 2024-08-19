<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Formulario de registro</title>
</head>

<body>
<h1>Menu</h1>
    <ul>
        @foreach ($menu as $item) 
            <li>{{ $item }}</li>
        @endforeach
    </ul>
    <h1>{{ 'Bienvenido al registro de usuarios' }}</h1>
    <br>
    <form action="">
        <label for="">Nombres</label>
        <input />
        <br>
        <label for="">Apellidos</label>
        <input />
        <br>
        <label for="">Email</label>
        <input />
        <br>
        <button class="btn btn-success">Registrarse</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>