<?php
$connect = mysqli_connect("localhost", "root", "", "blog_2026");

$select_roles_query = "SELECT * FROM roles";
$roles_result = mysqli_query($connect, $select_roles_query);
$data_of_roles_result = mysqli_fetch_all($roles_result);
?>

<style>
table{
    border: solid 1px black;
    border-collapse: collapse;
    margin: auto;
}

table td, th {
    border: solid 1px black;
    padding: 8px;
}

form{
    width: 300px;
    border: solid 1px black;
    margin: auto;
    padding: 10px;
}
</style>

<?php
if(isset($_POST['role'], $_POST['id']))
{
    $role = trim($_POST['role']);
    $id = $_POST['id']; 

    if($id > 0)
    {
        $update_role = "UPDATE roles SET role='$role' WHERE id=$id";
        mysqli_query($connect, $update_role);
    }

    header("Location: blog_update.php");
    exit();
}
if(isset($_GET['id']))
{
    $id = (int) $_GET['id'];

    $select_role = "SELECT * FROM roles WHERE id=$id";
    $result = mysqli_query($connect,$select_role);
    $row_role_by_id = mysqli_fetch_assoc($result);
?>
<form method="post">
    <h3>Update Form</h3>    
    Role:
    <input type="text" name="role" value="<?=$row_role_by_id['role']?>">
    <input type="hidden" name="id" value="<?=$row_role_by_id['id']?>">
    <br><br>
    <button type="submit" name="update">Edit Role</button>
</form>
<?php
}
?>

<hr><hr>

<div>
    <a href="blog_update.php">HOME</a>
</div>

<table>
<tr>
    <th>ID</th>
    <th>NAME</th>
    <th>Created_at</th>
    <th>Updated_at</th>
    <th>Deleted_at</th>
    <th>Update</th>
    <th>Drop</th>
</tr>
<?php foreach($data_of_roles_result as $row){ ?>
<tr>
    <td><?= $row[0]?></td>
    <td><?= $row[1]?></td>
    <td><?= $row[2]?></td>
    <td><?= $row[3]?></td>
    <td><?= $row[4]?></td>
    <td><a href="?id=<?= $row[0] ?>">Edit</a></td>
    <td><a href="?drop=<?= $row[0] ?>">DROP</a></td>
</tr>
<?php } ?>

</table>
<hr><hr>