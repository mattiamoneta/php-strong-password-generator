<?php

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