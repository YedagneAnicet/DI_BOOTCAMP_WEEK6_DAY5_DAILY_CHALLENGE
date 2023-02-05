<?php

// Function read file
function readFichier($nomFile)
{
    $file = fopen($nomFile, 'r');
    if($file) {
        $contenu = "";
        $cp = 0;
        while(($line = fgets($file)) != false) {
            $cp++;
            $rand = rand();
            $md = $rand % $cp;

            if($md == 0) {
                $contenu = $line;
            }
        }

        if (feof($file)) {
            fclose($file);
        } else {
            return null;
        }
        return  $contenu;
    }
}

function getWord($result)
{
    $tabMot = explode(" ", $result);
    $nbWord = count($tabMot);
    $randIndex = rand(0, $nbWord);
    $word = $tabMot[$randIndex];
    echo $result.PHP_EOL;
    return $word;
}

function drawDash($word, $pos, $letter)
{
    $nbChar = strlen($word);
    $dash = str_repeat("_", $nbChar);
    $tab = [];
    if($pos != "") {
        $tab = explode('_', $dash);
        $tab[$pos] = $letter;

    }
    return array_merge($tab);
}

function getInputUser($word) 
{
    $letter = trim(readline("Veuillez saisir une lettre: "));
    $checkLetter = str_contains($word, $letter);
    $posLetter = 0;
    $contenu = '';
    if ($checkLetter) {
        $posLetter = strpos($word, $letter);
        $contenu = drawDash($word, $posLetter, $letter);
        
    } 
    echo $contenu.PHP_EOL;   
}



$lineRecup = readFichier("listmot.txt");
$word = getWord($lineRecup);
getInputUser($word);
PHP_EOL;

