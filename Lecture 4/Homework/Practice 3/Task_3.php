<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
    if (!isset($_POST['damcavi_kodi'])) {
        $damcavi_kodi = rand(10000, 99999);
    } else {
        $damcavi_kodi = (int)$_POST['damcavi_kodi'];
    }

    if (isset($_POST['submit_form'])) {
        $userCode = (int)$_POST['kodi'];

        if ($userCode === $damcavi_kodi) {
            echo "kodi sworia!";
        } else {
            echo "kodi arasworia, scadet xelaxla.";
        }
    }
?> 
<body>
    <form method="post">
        <?php echo $damcavi_kodi; ?>

        <input type="hidden" name="damcavi_kodi" value="<?php echo $damcavi_kodi; ?>">

        <p>sheiyvanet kodi:</p>
        <input type="number" name="kodi" min="10000" max="99999">

        <button type="submit" name="submit_form">Submit</button>
    </form> 
</body>
</html>