<?php

function usunNiepozadaneZnaki($ciag) {
    $niepozadaneZnaki = array("\\", "/", ":", "*", "?", "\"", "<", ">", "|", "+", "-",".");

    $ciag = str_replace($niepozadaneZnaki, "", $ciag);

    return $ciag;
}

if(isset($_POST['ciag'])) {
    $ciag = $_POST['ciag'];

    $ciag = usunNiepozadaneZnaki($ciag);

    echo "Ciąg po usunięciu niepożądanych znaków: " . $ciag;
}
?>

<!DOCTYPE html>
<html lang="an">
<head>
    <title>Lab8_2</title>
</head>
<body>
<form method="post" action="">
    Podaj ciąg liczb:<br>
    <input type="text" name="ciag"><br>
    <input type="submit" value="Usuń niepożądane znaki">
</form>
</body>
</html>
