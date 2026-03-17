<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label>შეიყვანე X: </label>
        <input type="number" name="X" min="10" max="100" required>
        <input type="submit" value="SUBMIT">
    <table border="3">
            <?php for($i = 0; $i < 4; $i++): ?>
                <tr>
                    <?php for($j = 0; $j < 4; $j++): ?>
                        <td>
                            <?php echo $matrica[$i][$j] ?>
                        </td>
                    <?php endfor ?>
                </tr>
            <?php endfor; ?>
        </table>
    </form>
</body>
</html>