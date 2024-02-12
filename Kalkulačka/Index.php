<?php
// Proměné
$num1 = '';
$num2 = '';
$operation = '';
$result = '';

// kontrola jestli bylo submitnuto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Zaznamená input
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operation = $_POST["operation"];

    // Výpočet operací
    switch ($operation) {
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
            // Nemůžem dělit 0
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = 'Cannot divide by zero';
            }
            break;
        default:
            $result = 'Invalid operation';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
</head>
<body>

<h2>PHP Calculator</h2>

<!-- Zachycuje input a provádí kalkulace -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="num1">Number 1:</label>
    <input type="number" id="num1" name="num1" value="<?php echo htmlspecialchars($num1); ?>" required>
    <br><br>
    <label for="operation">Operation:</label>
    <select id="operation" name="operation" required>
        <option value="add">Addition</option>
        <option value="subtract">Subtraction</option>
        <option value="multiply">Multiplication</option>
        <option value="divide">Division</option>
    </select>
    <br><br>
    <label for="num2">Number 2:</label>
    <input type="number" id="num2" name="num2" value="<?php echo htmlspecialchars($num2); ?>" required>
    <br><br>
    <input type="submit" value="Calculate">
</form>

<!-- Výsledek -->
<?php if ($result !== ''): ?>
    <h3>Result: <?php echo $result; ?></h3>
<?php endif; ?>

</body>
</html>
