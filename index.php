
<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>

<div class="box1">
    <h2>ALL MEMBERS</h2>

    <button class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal">
        ADD PLAYERS
    </button>
</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $query = "SELECT * FROM `students`";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed: " . mysqli_error($connection));
        }else{
            while ($row = mysqli_fetch_assoc($result)) {
        
    
        
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><a href="update_page1.php? id=<?php echo $row['id']; ?>" class= "btn btn-success">Update</a></td>
                <td><a href="delete_page.php? id=<?php echo $row['id']; ?>" class= "btn btn-danger">Delete</a></td>
            </tr>
        <?php 
        }
        } ?>
    </tbody>
</table>

<?php
if (isset($_GET['message'])) {
    echo "<h5>" .$_GET['message'] . "</h5>";
}
?>

<?php
if (isset($_GET['insert_msg'])) {
    echo "<h5>". $_GET['insert_msg'] . "</h5>";
}
?>
<?php
if (isset($_GET['update_msg'])) {
    echo "<h5>". $_GET['update_msg'] . "</h5>";
}
?>

<?php

if (isset($_GET['delete_msg'])) {
    echo "<h5>". $_GET['delete_msg'] . "</h5>";
}
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    ADD PLAYERS
                </h1>

                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <form action="insert_data.php" method="POST">

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="f_name" class="form-label">
                            First Name
                        </label>
                        <input type="text" id="f_name"
                               name="f_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="l_name" class="form-label">
                            Last Name
                        </label>
                        <input type="text" id="l_name"
                               name="l_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">
                            Age
                        </label>
                        <input type="number" id="age"
                               name="age" class="form-control"
                               min="1" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Close
                    </button>

                    <button type="submit" class="btn btn-success"
                            name="add_students">
                        ADD
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php include("footer.php"); ?>
