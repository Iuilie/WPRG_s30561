
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab8_3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select, input[type="submit"] {
            padding: 8px;
            margin-bottom: 10px;
        }
        .result {
            background-color: #fff;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Operacje na ciągach znaków</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="text">Wprowadź ciąg znaków:</label>
    <input type="text" id="text" name="text" required>
    <label for="operation">Wybierz operację:</label>
    <select name="operation" id="operation">
        <option value="reverse">Odwrócenie ciągu znaków</option>
        <option value="uppercase">Zamiana wszystkich liter na wielkie</option>
        <option value="lowercase">Zamiana wszystkich liter na małe</option>
        <option value="count">Liczenie liczby znaków</option>
        <option value="trim">Usunięcie białych znaków z początku i końca ciągu</option>
    </select>
    <input type="submit" value="Wykonaj">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $text = $_POST["text"];
            $operation = $_POST["operation"];

            switch ($operation) {
                case "reverse":
                    $result = strrev($text);
                    break;
                case "uppercase":
                    $result = strtoupper($text);
                    break;
                case "lowercase":
                    $result = strtolower($text);
                    break;
                case "count":
                    $result = strlen($text);
                    break;
                case "trim":
                    $result = trim($text);
                    break;
                default:
                    $result = "Wybierz operację";
                    break;
            }

            echo '<div class="result"><strong>Wynik:</strong> ' . $result . '</div>';
}
?>
</div>
</body>
</html>
