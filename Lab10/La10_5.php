<?php
$upload_dir = 'uploads/';
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];


if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $file_type = mime_content_type($file['tmp_name']);

    if (in_array($file_type, $allowed_types)) {
        $file_path = $upload_dir . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $file_path)) {
            $message = "Plik został przesłany pomyślnie!";
        } else {
            $message = "Wystąpił błąd podczas przesyłania pliku!";
        }
    } else {
        $message = "Nieprawidłowy typ pliku!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab10_5</title>
</head>
<body>
<h1>Prześlij plik</h1>
<form enctype="multipart/form-data" method="post">
    <input type="file" name="file" required><br>
    <button type="submit">Prześlij</button>
</form>
<?php if (isset($message)): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>
</body>
</html>
