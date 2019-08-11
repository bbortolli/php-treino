<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>CRUD Treino</title>
</head>



<body>
    <div class="container-fluid">
        <div class="row top-content">
            <h3 class="laranja">CRUD Treino</h3>
            <ul class="menu">
                <li class="item" onClick="myFunction()">
                    <a id="cliente" href="/clients">CLIENTES</a>
                </li>
                <li class="item">
                    <a href="/products">PRODUTOS</a>
                </li>
                <li class="item">
                    <a href="/categories">CATEGORIAS</a>
                </li>
            </ul>
        </div>
    </div>
    <script>
        function myFunction() {
            document.getElementById("demo").innerHTML = "YOU CLICKED ME!";
        }
    </script>
    <main>