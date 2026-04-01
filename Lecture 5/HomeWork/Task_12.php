<!-- დაწერეთ ფუნქცია, რომელიც ფორმიდან მიღებული ფაილის სახელისა და ტექსტის მიხედვით შექმნის ფაილს მითითებულ
საქაღალდეში. შემდეგ იმავე პროგრამამ უნდა შეძლოს ამ ფაილის შიგთავსის რედაქტირება: თუ ფაილი უკვე არსებობს, ძველი
ტექსტი არ წაიშალოს, არამედ ახალ ტექსტს დაემატოს ახალი სტრიქონიდან. ბოლოს გამოიტანეთ ფაილის სრული შიგთავსი. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check folder and file</title>
</head>
<body>
    <form method="POST">
        <label>Sheiyvane folderis saxeli : </label>
        <input type="text" name="folderName"> <br><br><br>

        <label>sheiyvane files saxeli : </label>
        <input type="text" name="fileName"> <br><br><br>

        <input type="submit" name="submit">
    </form>
</body>
<?php
if(isset($_POST["submit"]))
    {
        function CheckFolderAndFile()
        {
            $folderName = trim($_POST["folderName"]);
            $fileName = trim($_POST["fileName"]);

            if($folderName == "")
                {
                    echo "sheiyvane folderis saxeli" . "\n";
                }
            if($fileName == "")
                {
                    echo "sheiyvane failis saxeli" . "\n";
                }
            if(!file_exists($folderName))
                {
                    if(mkdir($folderName))
                        {
                            echo "folderi sheiqmna";
                        }
                }
            else
                {
                    if(!file_exists($fileName))
                        {
                            $file = fopen($fileName, "w");
                            fwrite($file, "Faili sheiqmna");
                            fclose($file);

                            $file = scandir($folderName);
                            foreach($file as $f)
                                {
                                    echo $f .  "\n";
                                }
                        }
                    else
                        {
                            
                            $file = fopen($fileName, "a");
                            fwrite($file, "Faili sheiqmna" . "\n");
                            fclose($file);

                            $file = fopen($fileName, "r");
                            $res = fread($file, filesize($fileName));
                            fclose($file);

                            echo $res;

                        }
                }
        }
        CheckFolderAndFile();
    }
?>
</html>