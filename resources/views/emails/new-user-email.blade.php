<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Bienvenido al sistema {{$user->name}}, por favor verifique su usuario utilizando el codigo de verificación.
    <br>
    Código de verificación: <b> {{$user->auth_code}} </b>
    <a href="192.168.1.39/users/verification?email={{$user->email}}&auth_code={{$user->auth_code}}">Verificar Usuario</a>
</body>
</html>