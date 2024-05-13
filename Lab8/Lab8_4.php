<?php
function countVowels($string) {
    $vowels = 'aeiouAEIOU';
    $vowelCount = 0;

    for ($i = 0; $i < strlen($string); $i++) {
        if (strpos($vowels, $string[$i]) !== false) {
            $vowelCount++;
        }
    }

    return $vowelCount;
}

if (isset($_POST['submit'])) {
    $inputString = $_POST['inputString'];
    echo "Ilość samogłosek w ciągu '$inputString' wynosi: " . countVowels($inputString);
}
?>

<!DOCTYPE html>
<html lang="an">
<head>
    <title>Lab8_4</title>
</head>
<body>
<form method="post" action="">
    <label>Wprowadź ciąg znaków:</label><br>
    <input type="text" name="inputString"><br>
    <input type="submit" name="submit" value="Oblicz"><br>
</form>
</body>
</html>
