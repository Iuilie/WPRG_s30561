<?php
session_save_path("D:/xampp/tmp");
session_start();

if (isset($_POST['głos'])) {
    if (!isset($_COOKIE['zagłosowane'])) {
        setcookie('zagłosowane', 'tak');
        $komunikat = "Dziękujemy za głos!";
    } else {
        $komunikat = "Już zagłosowałeś!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab10_2</title>
</head>
<body>
<h1>Sonda internetowa</h1>
<form method="post">
    <p>Czy twój ulubiony kolor to NIEBIESKI?</p>
    <label><input type="radio" name="vote" value="tak"> Tak</label><br>
    <label><input type="radio" name="vote" value="nie"> Nie</label><br>
    <button type="submit">Głosuj</button>
</form>
<?php
if (isset($komunikat)) {
    echo "<p>$komunikat</p>";
}
?>
</body>
</html>
