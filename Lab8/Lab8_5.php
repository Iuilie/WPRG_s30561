
<html lang="en">
<head>
    <title>Lab8_5</title>
</head>
<body>
<form method="post">
    <label>Podaj liczbę zmiennoprzecinkową: </label>
    <input type="text" name="number" required>
    <button type="submit">Sprawdź</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $liczba = $_POST["number"];

    if (!is_numeric($liczba)) {
        echo "Podany ciąg nie jest liczbą zmiennoprzecinkową\n";
        exit;
    }

    if (strpos($liczba, '.') === false) {
        echo "Podana liczba nie zawiera części dziesiętnej\n";
        exit;
    }

    $czesci = explode('.', $liczba);

    echo "Ilość cyfr po przecinku: " . strlen($czesci[1])."\n";
}?>

</body>
</html>