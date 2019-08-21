<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Controle suas contas!</title>
</head>



<body>
    <div class="header">
        <div class="gridcontrol top-content">
            <a class="home laranja" href="../">MyLLs</a>
            <ul class="menu">
                <li class="item">
                    <div class="dropdown">
                        <button class="dropbtn">Account</button>
                        <div class="drop-content">
                            <a href="#">Transactions</a>
                            <a href="/accounts/add.php">Add new</a>
                            <a href="/accounts/index.php">View all</a>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="dropdown">
                        <button class="dropbtn">Card</button>
                        <div class="drop-content">
                            <a href="/entries/index.php">Entries</a>
                            <a href="/cards/add.php">Add new</a>
                            <a href="/cards/all.php">View all</a>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="dropdown">
                        <a href="/categories"><button class="dropbtn">Category</button></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <main>