<?php
    session_start();
    $password = null;

    if(!isset($_SESSION['password'])){
        header ('Location: index.php');
    }else{
        $password = $_SESSION['password'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>

     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
    <body class="bg-dark" data-bs-theme="dark">
        <main>
            <div class="container">
                <div class="row py-5">
                    <div class="col-6 mx-auto">
                        <h3 class="mb-3">La tua password: </h3>
                        <div class="alert alert-success" role="alert">
                            <?php echo $password; ?>
                        </div>
                        <a class="btn btn-success" href="index.php">< Indietro</a>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>