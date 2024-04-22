<?php
function sprawdzenie($tekst) {
    $tekst = strtolower($tekst);

    $wystapienia = array_fill(0, 26, false);

    for ($i = 0; $i < strlen($tekst); $i++) {
        $znak = $tekst[$i];
        if (ctype_alpha($znak)) {
            $indeks = ord($znak) - ord('a');
            $wystapienia[$indeks] = true;
        }
    }

    // Sprawdź, czy wszystkie litery występują przynajmniej raz
    foreach ($wystapienia as $czyWystapilo) {
        if (!$czyWystapilo) {
            return false;
        }
    }
    return true;
}

$tekst1 = "The quick brown fox jumps over the lazy dog.";

if (sprawdzenie($tekst1)) {
    echo "true";
} else {
    echo "false";
}
?>