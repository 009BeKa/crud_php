<?php include "header.php"; ?>
<?php include "dbcon.php"; ?>

<?php
    if (isset($_GET['id'])) {
    $id = $_GET['id'];
  
    $query  = "SELECT * FROM `students` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if (! $result) {
    die("Query Failed: " . mysqli_error($connection));
    } else {
    $row = mysqli_fetch_assoc($result);
    }
    }

?>
<?php
 if(isset($_POST['update_students'])){

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    $query = "UPDATE `students` SET `first_name` = '$fname', 
    `last_name` = '$lname'  , `age` = '$age' WHERE `id` = '$idnew'";

     $result = mysqli_query($connection, $query);

    if (! $result) {
    die("Query Failed: " . mysqli_error($connection));
    }else{
        header('location:index.php?update_msg=You have successfully updated the data!!');
    }

 }

?>


<form action="update_page1.php?id = <?php echo $id; ?>&id_new=<?php echo $id; ?>" method = "post">
<div class="mb-3">
<label for="f_name" class="form-label">
First Name
</label>
<input type="text" id="f_name"
name="f_name" class="form-control" value="<?php echo $row['first_name'] ?>">
</div>
<div class="mb-3">
<label for="l_name" class="form-label">
Last Name
</label>
<input type="text" id="l_name"
name="l_name" class="form-control" value = "<?php echo $row['last_name'] ?>">
</div>
<div class="mb-3">
<label for="age" class="form-label">
 Age
</label>
<input type="number" id="age"
     name="age" class="form-control"
    min="1" value = "<?php echo $row['age'] ?>">
</div>
<button type="submit" class="btn btn-success" name="update_students">UPDATE</button>
</form>



<?php include "footer.php"; ?>
