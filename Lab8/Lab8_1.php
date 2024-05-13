<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST["text"];

    echo "Ciąg dużymi literami: " . strtoupper($text) . "<br>";
    echo "Ciąg małymi literami: " . strtolower($text) . "<br>";
    echo "Pierwsza litera dużą literą: " . ucfirst($text) . "<br>";
    echo "Wszystkie pierwsze litery każdego słowa dużą literą: " . ucwords($text) . "<br>";
}

?>

<form method="post">
    <label for="text">Podaj ciąg znaków:</label><br>
    <input type="text" id="text" name="text"><br>
    <input type="submit" value="Wyślij">
</form>
