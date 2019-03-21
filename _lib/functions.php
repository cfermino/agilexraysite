<?php
function title2url($str) {
    // $str = EncodeUTF8($str);
    if (is_null($str)) {
        $str="";
    }
    $str = utf8_encode($str);
    $str=strtolower($str);
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

    if(round($media) < 1){
        $indice = 'Insatisfatório';
    }elseif(round($media) > 1 and round($media) < 2){
        $indice = 'Regular';
    }elseif(round($media) > 2 and round($media) <= 3){
        $indice = 'Intermediário';
    }elseif(round($media) > 3 and round($media) <= 4){
        $indice = 'Avançado';
    }elseif(round($media) > 4 and round($media)  >= 5){
        $indice = 'Fluente';
    }
    echo $indice;
}

function corMaturidade($media){
    
    if(round($media) < 1){
        $indice = '#a42716';
    }elseif(round($media) > 1 and round($media) < 2){
        $indice = '#f79646';
    }elseif(round($media) > 2 and round($media) <= 3){
        $indice = '#ffc000';
    }elseif(round($media) > 3 and round($media) <= 4){
        $indice = '#77933c';
    }elseif(round($media) >= 4 and round($media)  >= 5){
        $indice = '#4f81bd';
    }
    echo $indice;
    
    
}

function gerar_senha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){
    $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
    $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
    $nu = "0123456789"; // $nu contem os números
    $si = "!@#$%¨&*()_+="; // $si contem os símbolos
   
    if ($maiusculas){
          // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
          $senha .= str_shuffle($ma);
    }
   
      if ($minusculas){
          // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
          $senha .= str_shuffle($mi);
      }
   
      if ($numeros){
          // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
          $senha .= str_shuffle($nu);
      }
   
      if ($simbolos){
          // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
          $senha .= str_shuffle($si);
      }
   
      // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
      return substr(str_shuffle($senha),0,$tamanho);
  }
?>