<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
    <form method ="post">
        <p>1. 3 + 5 = ?</p>
        <input type="radio" value="a" name="q1">1 <br>
        <input type="radio" value="b" name="q1">9 <br>
        <input type="radio" value="c" name="q1">8 <br>
        <input type="radio" value="d" name="q1">5 <br>

        <p>2. მზე მწვანეა ?</p>
        <input type="radio" value="a" name="q2">კი <br>
        <input type="radio" value="b" name="q2">არა <br>

        <p>3. რომელი თეგი გამოიყენება ფორმის შესაქმნელად?</p>
        <input type="radio" value="a" name="q3">div <br>
        <input type="radio" value="b" name="q3">form <br> 
        <input type="radio" value="c" name="q3">span <br>
        <input type="radio" value="d" name="q3">p <br>

        <p>4. რომელ პროგრამულ ენას ვსწავლობთ ახლა? </p>
        <input type="text" name="q4"> <br>

        <p>5. 5 + 5 = ?</p>
        <input type="text" name="q5"> <br> <br>
        
        <input type="submit" name="submit" value="დასრულება">
    </form>
</body>
</html>
<?php

$score = 0;
if(isset($_POST["submit"])) {
    if($_POST["q1"] == "c") 
    {
        $score++;
    }
    if($_POST["q2"] == "b")
    {
        $score++;
    }
    if($_POST["q3"] == "b")
    {
        $score++;
    }
    if(strtolower($_POST["q4"]) == "php")
    {
        $score++;
    }
    if($_POST["q5"] == 10)
    {
        $score++;
    }
}
echo "თქვენი ქულა: $score/5"; 
?>
