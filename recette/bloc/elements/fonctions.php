<?php
    function affichage ($recet){
        if(array_key_exists('auth', $recet) && $recet['auth'] == 1){
            return true;
        } elseif(array_key_exists('auth', $recet) && $recet['auth'] == 0){
            return false;
        }else{
            echo 'erreur de vérification de l\'authorisation';
        }
    }

?>