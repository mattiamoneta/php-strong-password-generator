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
    <body>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-6 mx-auto">
                        <?php 
                            $ret = pswGen($dictionary, $_GET['pswLength'], false, true, true, true);
                            echo $ret;
                        ?>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>