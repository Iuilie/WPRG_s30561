<!DOCTYPE html>
<html lang="an">
<head>
    <meta charset="UTF-8">
    <title>Simple Calculator</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
        }

        .calculator {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid;
            border-radius: 5px;
            background-color: #222;
            width: 300px;
        }

        input[type="number"],
        select {
            margin-bottom: 10px;
            padding: 8px;
            width: calc(100% - 16px);
            border: 1px solid;
            border-radius: 4px;
            background-color: #333;
            color: white;
        }

        button {
            background-color: lightgray;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: lightgray;
        }

        input[type="text"] {
            margin-top: 10px;
            padding: 8px;
            width: calc(100% - 16px);
            border: 1px solid lightgray;
            border-radius: 4px;
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
<div class="calculator">
    <h2>Simple Calculator</h2>
    <form action="" method="post">
        <input type="number" name="num1" placeholder="Enter number">
        <input type="number" name="num2" placeholder="Enter number">
        <select name="operator">
            <option value="add">Addition (+)</option>
            <option value="subtract">Subtraction (-)</option>
            <option value="multiply">Multiplication (*)</option>
            <option value="divide">Division (/)</option>
        </select>
        <button type="submit" name="calculate">Calculate</button>
        <input type="text" name="result" placeholder="Result" readonly>
    </form>
</div>

<div class="calculator">
    <h2>Advanced Calculator</h2>
    <form action="" method="post">
        <input type="number" name="num3" placeholder="Enter number">
        <input type="number" name="num4" placeholder="Enter number">
        <select name="operator_advanced">
            <option value="cos">Cosine</option>
            <option value="sin">Sine</option>
            <option value="tan">Tangent</option>
            <option value="binToDec">Binary to Decimal</option>
            <option value="decToBin">Decimal to Binary</option>
            <option value="decToHex">Decimal to Hexadecimal</option>
            <option value="hexToDec">Hexadecimal to Decimal</option>
        </select>
        <button type="submit" name="calculate_advanced">Calculate</button>
        <input type="text" name="result_advanced" placeholder="Result" readonly>
    </form>
</div>

<?php
if(isset($_POST['calculate'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];

    switch($operator) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            if($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Cannot divide by zero!";
            }
            break;
        default:
            $result = "Invalid operator";
    }

    echo '<script>document.getElementsByName("result")[0].value = "' . $result . '";</script>';
}

if(isset($_POST['calculate_advanced'])) {
    $num3 = $_POST['num3'];
    $num4 = $_POST['num4'];
    $operator_advanced = $_POST['operator_advanced'];

    switch($operator_advanced) {
        case 'cos':
            $result_advanced = cos(deg2rad($num3));
            break;
        case 'sin':
            $result_advanced = sin(deg2rad($num3));
            break;
        case 'tan':
            $result_advanced = tan(deg2rad($num3));
            break;
        case 'binToDec':
            $result_advanced = bindec($num3);
            break;
        case 'decToBin':
            $result_advanced = decbin($num3);
            break;
        case 'decToHex':
            $result_advanced = dechex($num3);
            break;
        case 'hexToDec':
            $result_advanced = hexdec($num3);
            break;
        default:
            $result_advanced = "Invalid operator";
    }

    echo '<script>document.getElementsByName("result_advanced")[0].value = "' . $result_advanced . '";</script>';
}
?>

</body>
</html>
