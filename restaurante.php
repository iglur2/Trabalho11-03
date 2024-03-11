<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo gorjeta</title>
    <style>
body {
    font-family: Arial, sans-serif;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
}

form {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    background-color: #e1e1e1;
    border-radius: 10px;
    padding: 10px;
}

label {
    margin-bottom: 10px;
    font-weight: bold;
}

input, select {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
}

input[type="submit"] {
    padding: 10px;
    background-color: #000000;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

input[type="submit"]:hover {
    background-color: #408080;
}
    </style>
</head>
<body>
    <form method = 'post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="totalValue" > Insira o valor da conta </label>
        <input type="number" id="totalValue" name="totalValue" required placeholder="R$ 0,00">
        <select name="tipPercent" id="tipPercent">
            <option value="0.05" selected> 5%</option>
            <option value="0.10" selected> 10%</option>
            <option value="0.15" selected> 15%</option>
        </select>
        <input type="submit" name="submit" value="calcular">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $orderValue = $_POST['totalValue'];
                $tipValue = $_POST['tipPercent'];

                $finalValue = ($orderValue * $tipValue) + $orderValue;

                    echo "O total a pagar é de R$ " . $finalValue;
                    echo "<p>Valor da Gorjeta: ";
                    if ($tipValue == 0.10) {
                        echo "R$ 10.00";
                    } elseif ($tipValue == 0.05) {
                        echo "R$ 5,00";
                    } elseif ($tipValue == 0.15) {
                        echo "R$ 15,00";
                    }
                echo "</p>";
    }
    
    ?>
    </form>
    

    
</body>
</html>