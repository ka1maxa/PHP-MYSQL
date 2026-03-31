<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete File</title>
</head>
<body>
    <form method="POST">
        <label>sheiyvane failis saxeli : </label>
        <input type="text" name="FileName">

        <input type="submit" name="submit">
    </form>
</body>
<?php
if(isset($_POST["submit"]))
{
    function DeleteFile()
    {
        $fileForDelete = $_POST["FileName"];

        if(file_exists($fileForDelete))
        {
            if(is_file($fileForDelete))
            {
                if(unlink($fileForDelete))
                {
                    echo "waishala";
                }
                else
                {
                    echo "ver waishala";
                }
            }
            else
            {
                echo "saqagaldes ver washli";
            }
        }
        else
        {
            echo "faili ar arsebobs";
        }
    }
    DeleteFile();
}
?>
</html>