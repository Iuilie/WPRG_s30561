<?php
session_save_path("D:/xampp/tmp");
session_start();

$wizyty_ = 10;


if (isset($_POST['reset'])) {
    setcookie('wizyty', '', time() - 3600); // Usunięcie ciasteczka
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

if(isset($_COOKIE['wizyty'])) {
    $wizyty = $_COOKIE['wizyty'] + 1;
} else {
    $wizyty = 1;
}

setcookie('wizyty', $wizyty, time() );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab10_1</title>
</head>
<body>
<h1>Liczba odwiedzin: <?php echo $wizyty; ?></h1>
<?php
if ($wizyty >= $wizyty_) {
    echo "<p>Osiągnięcie! Odwiedziłeś nas już $wizyty_ razy!</p>";
}
?>
<form method="post">
    <button type="submit" name="reset">Resetuj licznik</button>
</form>
</body>
</html>
