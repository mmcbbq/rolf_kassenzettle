<?php

var_dump($_POST);
// Variablenempfang
$artikel = $_POST['artikel'] ?? ['', '', ''];
$einzelpreis = $_POST['einzelpreis'] ?? ['', '', ''];
$artikel = $_POST['artikel'] ?? ['', '', ''];
$anzahl = $_POST['anzahl'] ?? ['', '', ''];

$mwst = $_POST["mwst"];

function berechnePreise(array $post): array
{
    $preise = [];
    foreach ($post['einzelpreis'] as $index=>$einzel) {
        $preise[] = $einzel * $post['anzahl'][$index];
    }
    return $preise;
}

function berechneSumme(array $post): float
{
    $gsumme = 0;
    foreach (berechnePreise($post) as $item) {
        $gsumme += $item;
    }
    return $gsumme;
}

function mwst_7(array $post): float
{
    $mwst7 = 0;
    $preise = berechnePreise($post);
    foreach ($preise as $index => $item) {
        if ($post['mwst'][$index] == 7) {
            $mwst7 += ($item) * (7) / 107;
        }
    }
    return $mwst7;;
}


function mwst_19(array $post): float
{
    $mwst19 = 0;
    $preise = berechnePreise($post);
    foreach ($preise as $index => $item) {
        if ($post['mwst'][$index] == 19) {
            $mwst19 += ($item) * (19) / 119;
        }
    }
    return $mwst19;;
}

function summemwst(array $post, int $mwstsatz = 7): float
{
    $summe = 0;
    $preise = berechnePreise($post);
    foreach ($preise as $index => $item) {
        if ($post['mwst'][$index] == $mwstsatz) {
            $summe += ($item) * ($mwstsatz) / (100 + $mwstsatz);
        }
    }
    return $summe;
}






$gesamtsumme = berechneSumme($_POST);
$preis = berechnePreise($_POST);
$siebenPro = mwst_7($_POST);
$neunzehnPro = summemwst($_POST, 19);




$vonBerechnung = true;
include 'kassenzettel.php';
