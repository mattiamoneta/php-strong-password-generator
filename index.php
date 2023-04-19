<?php 

    $dictionary = [
        'alphabet' => ['A','B','C','D','E',
                        'F','G','H','I','J',
                        'K','L','M','N','O',
                        'P','Q','R','S','T',
                        'U','V','W','X','Y',
                        'Z'],
        'symbols' => ['@','£','€','%','#','§']

    ];

    /**
     * Funzione per la generazione di password casuali
     */

    function pswGen($dictionary, $length, $repete, $letters, $symbols, $numbers){

        if($letters == false && $numbers == false && $symbols == false){
            $letters = true;
        }

        $retVal = "";
        $lastChar = null;
       
        for($i = 0; $i < $length; $i++){

            $char = null;
            

            #Ripeti finchè il tipo di carattere non è tra quelli ammessi
            do{
                # Genero numero random per decidere se lettera, numero o simbolo.
                $charType = rand(0,2);

                switch ($charType){
                    #Simboli
                    case 0:
                        #Se sono ammessi simboli
                        if($symbols == true){
                            #Se i caratteri possono essere ripetuti
                            if($repete == false){
                                do{
                                    $char = $dictionary['symbols'][rand(0,count($dictionary['symbols']))];
                                } while ($char == $lastChar);
                            } else {
                                $char = $dictionary['symbols'][rand(0,count($dictionary['symbols']))];
                            }
                            $noMatch = false;
                        } else {
                            $noMatch = true;
                        }
                        break;

                    #Lettere
                    case 1:
                       #Se sono ammesse lettere
                       if($letters == true){
                        #Se i caratteri possono essere ripetuti
                        if($repete == false){
                            do{
                                $char = $dictionary['alphabet'][rand(0,count($dictionary['alphabet']))];
                           } while ($char == $lastChar);
                        } else {
                            $char = $dictionary['alphabet'][rand(0,count($dictionary['alphabet']))];
                        }

                        $noMatch = false;
                       } else {
                        $noMatch = true;
                    }
                    break;

                    #Numeri
                    case 2:
                        #Se sono ammessi numeri
                        if($numbers == true){

                           #Se i caratteri possono essere ripetuti
                           if($repete == false){
                            do{
                                $char = rand(0,9);
                            } while ($char == $lastChar);
                           }else{
                            $char = rand(0,9);
                           }

                            $noMatch = false;

                        } else {
                            $noMatch = true;
                    }
                    break;
                }
            }while ($noMatch == true);

            $lastChar = $char;
            $retVal .= $char;

        }

        return $retVal;

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Password Gen</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
    <body class="bg-dark" data-bs-theme="dark">
        <div class="container">
            <div class="row py-5">
                <div class="col mx-auto text-center">
                    <h1 class="display-4">Strong Password Generator</h1>
                    <h3>Genera una password sicura</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-8 mx-auto">
                <?php if(!empty($_GET['pswLength'])){ ?>
                    <div class="alert alert-light" role="alert">
                        <?php echo pswGen($dictionary, $_GET['pswLength'], $_GET['radioRepete'] == '1' ? true:false , isset($_GET['checkLetters']) ? true: false,isset($_GET['checkSymbols']) ? true: false,isset($_GET['checkNumbers']) ? true: false) ?>
                    </div>
                <?php }?>
                </div>
            </div>

            <div class="row">
                <div class="col-8 mx-auto">
                <div class="card bg-light" data-bs-theme="light">
                    <form action="index.php" method="GET">
                        <div class="card-body">
                           <div class="row">
                           <div class="col-5">
                                    <label for="pswLength" class="form-label d-block mb-3">Lunghezza Password:</label>
                                    <label for="radioRepete" class="form-label d-block">Ripeti caratteri:</label>
                            </div>
                            <div class="col-7">
                                    <!-- Lunghezza -->
                                    <input type="number" name="pswLength" id="pswLength" class="form-control mb-3">

                                    <!-- Ripetizione -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radioRepete" id="radioRepeteYes" value="1">
                                        <label class="form-check-label" for="radioRepeteYes">
                                            Si
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="radioRepete" id="radioRepeteNo" value="0" checked>
                                        <label class="form-check-label" for="radioRepeteNo">
                                            No
                                        </label>
                                    </div>

                                    <!-- Simboli, numeri,lettere -->
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="1" id="checkLetters" name="checkLetters">
                                        <label class="form-check-label" for="checkLetters">
                                            Lettere (A-Z)
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="1" id="checkNumbers" name="checkNumbers">
                                        <label class="form-check-label" for="checkNumbers">
                                            Numeri (0-9)
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" value="1" id="checkSymbols" name="checkSymbols">
                                        <label class="form-check-label" for="checkSymbols">
                                            Simboli (!"£$%&/#@")
                                        </label>
                                    </div>


                                    <button type="submit" class="btn btn-success mt-4">Genera</button>
                                    <button type="reset" class="btn btn-light  mt-4">Reset</button>
                            </div>
                           </div>
                        </div>

                    </form>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>