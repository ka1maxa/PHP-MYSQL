<?php
    if(isset($_POST["submit"]))
    {
        $connection = mysqli_connect("localhost", "root", "", "blog_20266_1");
        $role = $_POST['role'];
        if($role == "")
        {
            echo "<p style='color:red;'>fails saxeli daarqvi !!</p>";
            exit;
        }
        else
        {
            $instert = "insert into roles (role) values ('$role')";
            mysqli_query($connection, $instert);
            header("Location: db_test_1.php");
        }
    }
?>
<body>
    <form method="POST">
        <label>sheiyvane role</label>
        <input type="text" name="role">
        <input type="submit" name="submit">
    </form>
</body>
<?php
    $connection = mysqli_connect("localhost", "root", "", "blog_20266_1");
    // echo "<pre>";
    // print_r($connection);
    // echo "</pre>";

    //select
    $select_role_query = "SELECT * FROM roles";

    $roles_result = mysqli_query($connection, $select_role_query);
      
    // echo "<pre>";
    // print_r($roles_result);
    // echo "</pre>";

    $data_of_roles_query = mysqli_fetch_all($roles_result);

    // result LAMAZAD
    echo "<table style='border: 1px solid black; border-collapse: collapse;'>";
    foreach($data_of_roles_query as $role)
    {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 5px;'>ID: " . $role[0] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>Name: " . $role[1] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>Create_at: " . $role[2] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>Update_at: " . $role[3] . "</td>";
        echo "<td style='border: 1px solid black; padding: 5px;'>Deleted_at: " . $role[4] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

?>
