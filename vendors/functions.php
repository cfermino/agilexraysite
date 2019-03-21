<?php

function title2url($str) {
    // $str = EncodeUTF8($str);
    if (is_null($str)) {
        $str="";
    }
   
    $str=strtolower(utf8_encode($str));
    $str=str_replace(" - ","-",$str);
    $str=str_replace("\"","",$str);
    $str=str_replace("'","",$str);
    $str=str_replace("´","",$str);
    $str=str_replace("`","",$str);
    $str=str_replace(" ","-",$str);
    $str=str_replace("/","",$str);
    $str=str_replace("\\","",$str);
    $str=str_replace("+","",$str);
    $str=str_replace(",","-",$str);
    $str=str_replace(".","",$str);
    $str=str_replace("!","",$str);
    $str=str_replace("&","-e-",$str);
    $str=str_replace(";","",$str);
    $str=str_replace(":","",$str);
    $str=str_replace("ã","a",$str);
    $str=str_replace("á","a",$str);
    $str=str_replace("à","a",$str);
    $str=str_replace("â","a",$str);
    $str=str_replace("ä","a",$str);
    $str=str_replace("ç","c",$str);
    $str=str_replace("ê","e",$str);
    $str=str_replace("é","e",$str);
    $str=str_replace("è","e",$str);
    $str=str_replace("ë","e",$str);
    $str=str_replace("í","i",$str);
    $str=str_replace("ì","i",$str);
    $str=str_replace("î","i",$str);
    $str=str_replace("ï","i",$str);
    $str=str_replace("ô","o",$str);
    $str=str_replace("õ","o",$str);
    $str=str_replace("ó","o",$str);
    $str=str_replace("ò","o",$str);
    $str=str_replace("ö","o",$str);
    $str=str_replace("ù","u",$str);
    $str=str_replace("ú","u",$str);
    $str=str_replace("û","u",$str);
    $str=str_replace("ü","u",$str);
    $str=str_replace("(","-",$str);
    $str=str_replace(")","-",$str);
    $str=str_replace("]","-",$str);
    $str=str_replace("[","-",$str);
    $str=str_replace("%","",$str);
    $str=str_replace("}","-",$str);
    $str=str_replace("{","-",$str);
    $str=str_replace("?","",$str);
    $str=str_replace("º","",$str);
    $str=str_replace("ª","",$str);
    $str=str_replace("---","-",$str);
    $str=str_replace("--","-",$str);
    $str=str_replace(" ","",$str);

    return $str;
}


function maturidade($media){

    if(round($media,1) < 1){
        $indice = 'Insatisfatório';
    }elseif(round($media,1) > 1 and round($media,1) < 2){
        $indice = 'Regular';
    }elseif(round($media,1) > 2 and round($media,1) <= 3){
        $indice = 'Intermediário';
    }elseif(round($media,1) > 3 and round($media,1) <= 4){
        $indice = 'Avançado';
    }elseif(round($media,1) >= 4){
        $indice = 'Fluente';
    }
    echo $indice;
}

function corMaturidade($media){

    if(round($media,1) < 1){
        $indice = '#a42716';
    }elseif(round($media,1) > 1 and round($media,1) < 2){
        $indice = '#f79646';
    }elseif(round($media,1) > 2 and round($media,1) <= 3){
        $indice = '#ffc000';
    }elseif(round($media,1) > 3 and round($media,1) <= 4){
        $indice = '#77933c';
    }elseif(round($media,1) >= 5){
        $indice = '#4f81bd';
    }
    echo $indice;
}

?>