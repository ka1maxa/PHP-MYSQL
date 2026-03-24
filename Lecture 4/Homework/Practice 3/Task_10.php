<!-- დაწერეთ ფუნქცია რომელიც შეამოწმებს ჩატვირთული url შეიცავს თუ არა რიცხვებს. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check the URL</title>
</head>
<body>
    <form method="POST">
        <label>შეიყვანე შენი URL : </label>
        <input type="text" name="URL">

        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php
function CheckNumberInURL($url)
{
    return preg_match("/[0,9]/", $url);
}

if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $UserInput_url = $_POST["URL"];

        if(CheckNumberInURL($UserInput_url))
            {
                echo "aris ricxvi";
            }
        else
        {
            echo "ar aris";
        }

    }
?>