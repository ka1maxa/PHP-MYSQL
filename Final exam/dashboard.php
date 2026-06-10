<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user']))
    {
        header('Location: login.php');
        exit();
    }
else
    {
        echo "hi " . $_SESSION['user'];
        echo "hi " . $_SESSION['role'];
    }
?>
<body>
    <button><a href="logout.php">gasvla</a></button>
</body>

<!-- delete -->
<?php
if(isset($_GET['drop']))
    {
        $id = (int)$_GET['drop'];
        $query = "UPDATE users SET deleted_at = NOW() WHERE id=$id";
        mysqli_query($connect,$query);

        header('Location: dashboard.php');
        exit();
    }
?>

<!-- edit form -->
<?php
if(isset($_POST['id'],$_POST['user'],$_POST['role']))
    {
        $id = (int)$_POST['id'];
        $username = trim($_POST['user']);
        $role = trim($_POST['role']);

        $query = "UPDATE users SET username = '$username', role = '$role' WHERE id=$id";
        mysqli_query($connect,$query);

        header('Location: dashboard.php');
        exit();
    }

if(isset($_GET['id']))
    {
        $id = (int)$_GET['id'];
        $select_by_id = "SELECT * FROM users WHERE id=$id";
        $res = mysqli_query($connect,$select_by_id);
        $row_by_role =mysqli_fetch_assoc($res);
?>
<form method='POST'>
    <h2>EDIT FORM</h2>

    <input type="hidden" name='id' value='<?= $row_by_role['id']?>'>

    <label>user : </label>
    <input type="text" name='user' value='<?= $row_by_role['username']?>'><br><br>

    <label>role : </label>
    <input type="text" name='role' value='<?= $row_by_role['role']?>'><br><br>

    <input type="submit" name='submit' value='EDIT'>
</form>
<?php
    }
?>
<div>
    <a href="dashboard.php">home</a>
</div>

<!-- gamosatani -->
<?php
$query = "SELECT * FROM users where deleted_at is NULL";
$res_query = mysqli_query($connect,$query);
$row_by_id = mysqli_fetch_all($res_query);
?>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>user</th>
            <th>password</th>
            <th>role</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        <?php
          foreach($row_by_id as $row)
            {
        ?>
    <tr>
        <td><?= $row[0] ?></td>
        <td><?= $row[1] ?></td>
        <td><?= $row[2] ?></td>
        <td><?= $row[3] ?></td>
        <td><a href="?id=<?= $row[0]?>">EDIT</a></td>
        <td><a href="?drop=<?= $row[0]?>">DROP</a></td>
    </tr>
        <?php
            }
        ?>
    </table>
    <br><br><br><br><br><br><br><hr>
</body>


<!-- insert -->
<?php
if(isset($_POST['subNewusers']))
    {
        $newUserName = trim($_POST['newUser']);
        $newUserPass = trim($_POST['newUserPassword']);
        $newUserRole = trim($_POST['newUserRole']);
        
        //files
        $filename = $_FILES['userFile']['name'];
        $fileLoc  = $_FILES['userFile']['tmp_name'];
        $dir = "files/" . $filename;
        move_uploaded_file($fileLoc, $dir);

        $query = "INSERT INTO users (username, password,role,file)
                              VALUES('$newUserName','$newUserPass','$newUserRole','$filename')";

        mysqli_query($connect,$query);

        header("Location: dashboard.php");
        exit();

    }
?>
<form method='POST' enctype="multipart/form-data" >
    <label>sheiyvane axali useris saxeli : </label>
    <input type="text" name='newUser' required><br><br>

    <label>sheiyvane axali paroli : </label>
    <input type="password" name='newUserPassword' required><br><br>

    <label>sheiyvane role : </label>
    <input type="text" name='newUserRole' required><br><br><br>

    <label>sheiyvane file satestod : </label>
    <input type="file" name='userFile' accept='.png'><br><br><br>

    <input type="submit" value="SUBMIT" name='subNewusers'>
</form>
