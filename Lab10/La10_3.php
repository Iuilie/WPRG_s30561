<?php
session_save_path("D:/xampp/tmp");
session_start();

$poprawny_login = 'login';
$poprawne_hasło = 'hasło';

if (isset($_POST['login'])) {
    $nazwa_użytkownika = $_POST['username'];
    $hasło = $_POST['password'];

    if ($nazwa_użytkownika === $poprawny_login && $hasło === $poprawne_hasło) {
        $_SESSION['zalogowany'] = true;
    } else {
        $komunikat_błędu = "Niepoprawny login lub hasło!";
    }
}

if (isset($_GET['wyloguj'])) {
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab10_3</title>
</head>
<body>
<?php if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']): ?>
    <h1>Witaj, <?php echo $poprawny_login; ?>!</h1>
    <a href="?wyloguj">Wyloguj</a>
<?php else: ?>
    <h1>Logowanie</h1>
    <form method="post">
        <label for="username">Nazwa użytkownika:</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Hasło:</label>
        <input type="password" name="password" id="password" required><br>
        <button type="submit" name="login">Zaloguj</button>
    </form>
    <?php if (isset($komunikat_błędu)): ?>
        <p><?php echo $komunikat_błędu; ?></p>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>
