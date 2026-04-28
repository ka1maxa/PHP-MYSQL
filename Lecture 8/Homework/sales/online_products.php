<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label>sheiyvane category_ID : </label>
        <input type="number" name="categoryId">
        <br><br>
        <label>sheiyvane Product Name : </label>
        <input type="text" name="productName">
        <br><br>
        <label>sheiyvane content : </label>
        <input type="text" name="content">
        <br><br>
        <label>shemoitane foto : </label>
        <input type="file" name="img" accept=".png, .gif, .jpg">
        <br><br>
        <input type="submit" name="post" value="POST">
    </form>
    <br><br><br><br>
    <form method="GET">
        <input type="submit" name="get" value="GET">
    </form>
</body>

<?php
if(isset($_POST["post"]))
{
    $connection = mysqli_connect("localhost", "root", "", "online_sales");

    $category_ID = trim($_POST["categoryId"]);
    $product_name = trim($_POST["productName"]);
    $content = trim($_POST["content"]);

    $img_name = $_FILES["img"]["name"];
    $tmp_name = $_FILES["img"]["tmp_name"];


    $ext = pathinfo($img_name, PATHINFO_EXTENSION);

    if($category_ID == "" || $product_name == "" || $content == "" || $img_name == "")
    {
        echo "sheiyvane yvela monacemi";
    }
    else
    {
        if($ext == "png" || $ext == "gif" || $ext == "jpg")
        {
            $img_data = file_get_contents($tmp_name);
            $img_data = mysqli_real_escape_string($connection, $img_data);

            $insert = "INSERT INTO products(category_id,name,content,image)
                       VALUES('$category_ID','$product_name','$content','$img_data')";

            mysqli_query($connection,$insert);

            header("Location: online_products.php");
        }
        else
        {
            echo "araswori formatia";
        }
    }
}
if(isset($_GET["get"]))
{
    $connection = mysqli_connect("localhost", "root", "", "online_sales");
    $result = mysqli_query($connection, "SELECT * FROM products");
    $rows = mysqli_fetch_all($result);

    echo "<table style='border: 1px solid black; border-collapse: collapse;'>";
    echo "<tr>
            <th style='border: 1px solid black; padding: 5px;'>ID</th>
            <th style='border: 1px solid black; padding: 5px;'>Category_ID</th>
            <th style='border: 1px solid black; padding: 5px;'>Name</th>
            <th style='border: 1px solid black; padding: 5px;'>Content</th>
            <th style='border: 1px solid black; padding: 5px;'>Image</th>
          </tr>";

    foreach($rows as $r)
    {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 5px;'>".$r[0]."</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>".$r[1]."</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>".$r[2]."</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>".$r[3]."</td>";

        
        $img = base64_encode($r[4]);
        echo "<td style='border: 1px solid black; padding: 5px;'>
                <img src='data:image/jpeg;base64,$img' width='100'>
              </td>";

        echo "</tr>";
    }

    echo "</table>";
}

?>

</html>