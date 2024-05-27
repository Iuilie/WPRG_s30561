<?php
session_save_path("D:/xampp/tmp");
session_start();

$plik_danych = 'użytkownicy.txt';

function zarejestruj_użytkownika($imię, $nazwisko, $email, $hasło) {
    global $plik_danych;
    $dane_użytkownika = [
        'imię' => $imię,
        'nazwisko' => $nazwisko,
        'email' => $email,
        'hasło' => password_hash($hasło, PASSWORD_DEFAULT)
    ];
    $użytkownicy = file_exists($plik_danych) ? json_decode(file_get_contents($plik_danych), true) : [];
    foreach ($użytkownicy as $użytkownik) {
        if ($użytkownik['email'] === $email) {
            return "Email jest już zarejestrowany!";
        }
    }
    $użytkownicy[] = $dane_użytkownika;
    file_put_contents($plik_danych, json_encode($użytkownicy));
    return "Rejestracja zakończona sukcesem!";
}

function zaloguj_użytkownika($email, $hasło) {
    global $plik_danych;
    if (!file_exists($plik_danych)) {
        return "Niepoprawny email lub hasło!";
    }
    $użytkownicy = json_decode(file_get_contents($plik_danych), true);
    foreach ($użytkownicy as $użytkownik) {
        if ($użytkownik['email'] === $email && password_verify($hasło, $użytkownik['hasło'])) {
            $_SESSION['zalogowany'] = true;
            $_SESSION['email'] = $email;
            return true;
        }
    }
    return "Niepoprawny email lub hasło!";
}

if (isset($_POST['register'])) {
    $imię = $_POST['firstname'];
    $nazwisko = $_POST['lastname'];
    $email = $_POST['email'];
    $hasło = $_POST['password'];
    $komunikat_rejestracji = zarejestruj_użytkownika($imię, $nazwisko, $email, $hasło);
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $hasło = $_POST['password'];
    $komunikat_logowania = zaloguj_użytkownika($email, $hasło);
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab10_4</title>
</head>
<body>
<?php if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']): ?>
    <h1>Witaj, <?php echo $_SESSION['email']; ?>!</h1>
    <a href="?logout">Wyloguj</a>
<?php else: ?>
    <h1>Rejestracja</h1>
    <form method="post">
        <label for="firstname">Imię:</label>
        <input type="text" name="firstname" id="firstname" required><br>
        <label for="lastname">Nazwisko:</label>
        <input type="text" name="lastname" id="lastname" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Hasło (Wymagane: litery od A-Z, znaki interpunkcyjne i liczby):</label>
        <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{6,}"><br>
        <button type="submit" name="register">Zarejestruj</button>
    </form>
    <?php if (isset($komunikat_rejestracji)): ?>
        <p><?php echo $komunikat_rejestracji; ?></p>
    <?php endif; ?>

    <h1>Logowanie</h1>
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Hasło:</label>
        <input type="password" name="password" id="password" required><br>
        <button type="submit" name="login">Zaloguj</button>
    </form>
    <?php if (isset($komunikat_logowania)): ?>
        <p><?php echo $komunikat_logowania; ?></p>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>
