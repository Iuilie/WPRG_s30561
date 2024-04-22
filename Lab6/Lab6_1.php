<?php

function liczbaPierwsza($liczba) {
    if ($liczba <= 1) {
        return false;
    }
    for ($i = 2; $i * $i <= $liczba; $i++) {
        if ($liczba % $i == 0) {
            return false;
        }
    }
    return true;
}

function wypiszLiczby($start, $koniec) {
    for ($i = $start; $i <= $koniec; $i++) {
        if (liczbaPierwsza($i)) {
            echo $i . " ";
        }
    }
}
wypiszLiczby(1, 100);
?>