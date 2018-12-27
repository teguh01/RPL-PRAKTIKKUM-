<?php require_once("auth.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat datang </title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">

            <div class="card">
                <div class="card-body text-center">

                    <img class="img img-responsive rounded-circle mb-3" width="160" src="img/<?php echo $_SESSION['user']['photo'] ?>" />
                    
                    <h3><?php echo  $_SESSION["user"]["name"] ?></h3>
                    <p><?php echo $_SESSION["user"]["email"] ?></p>

                    <p><a href="logout.php">Logout</a></p>
                    <p><a href="home.php">Home</a></p>
                </div>
            </div>

            
        </div>


        <div class="col-md-8">

            
            <div class="card mb-3">
                <div class="card-body">
                Anda telah memasuki akun ULship 
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                Aplkasi ini berguna untuk pemesanan tiket kapal sabang- banda dan banda sabang
                :D
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                Support kami ya teman- teman 
                </div>
            </div>
            
            
        </div>
    
    </div>
</div>

</body>
</html>