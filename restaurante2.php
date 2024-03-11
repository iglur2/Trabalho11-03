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
    <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="totalValue"> Insira o valor da conta </label>
        <input type="number" id="totalValue" name="totalValue" required placeholder="R$ 0,00">
        <label for="tipPercent"> Selecione o valor da gorjeta</label>
        <select name="tipPercent" id="tipPercent">
            <option value="0.05" selected> 5%</option>
            <option value="0.10"> 10%</option>
            <option value="0.15"> 15%</option>
        </select>
        <label for="area"> Selecione a area</label>
        <select name="area" id="area">
            <option value="1.0" selected>Sem cover</option>
            <option value="1.1"> Com cover</option>
            <option value="1.2"> Area Vip</option>
        </select>
        <input type="submit" name="submit" value="calcular">
        
        
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $orderValue = $_POST['totalValue'];
                $tipValue = $_POST['tipPercent'];
                $area = $_POST['area'];
            

                $finalValue = (($orderValue * $tipValue) + $orderValue) * $area;

                $AreaValue = ($finalValue - $orderValue) - ($orderValue * $tipValue);

                echo "<p>O total a pagar é de R$ " . $finalValue . "<br></p>";
                echo "<p>Valor da Gorjeta: ";
                if ($tipValue == 0.10) {
                    echo "R$ " . ($orderValue * $tipValue);
                } elseif ($tipValue == 0.05) {
                    echo "R$ " . ($orderValue * $tipValue);
                } elseif ($tipValue == 0.15) {
                    echo "R$ " . ($orderValue * $tipValue);
                }
                echo "</p>";
                echo "<p>Area: ";
                if ($area == 1.0) {
                    echo "Sem Cover";
                } elseif ($area == 1.1) {
                    echo "Com Cover";
                } elseif ($area == 1.2) {
                    echo "Area VIP";
                }
                echo "</p>";

                echo "<p>Valor do cover: R$ " . $AreaValue . ".</p>";
            }


        ?>
    </form>
</body>
</html>