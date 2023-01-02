<?php

function verificaCamposEmBranco($dadosPost){
    $arrayCampos = array();
    foreach($dadosPost as $campo => $itensPost){
     if(empty($itensPost)){
         array_push($arrayCampos, $campo);
     }
    }
    return $arrayCampos;
}
?>

