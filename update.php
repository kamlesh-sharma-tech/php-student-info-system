<?php include "includes/header.php"?>
<?php include "db_con.php"?>

<?php

    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id='$id'";
    $query = mysqli_query($con,$sql);

    if(mysqli_num_rows($query) > 0)
    {
        while($row = mysqli_fetch_array($query))
           
        {

?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-dark text-white text-center sticky-top z-index-100">
                    <h4>Update Student Data</h4>
                </div>
                <div class="card-body">
                <form action="code.php" method="POST">
                    <input type="hidden" name="update_id" value="<?php echo $row['id'];?>">
            <div class="mb-3">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" value="<?php echo $row['fname']; ?>">
            </div>
            <div class="mb-3">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="<?php echo $row['lname'];?>">
            </div>
            <div class="mb-3">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $row['password'];?>">
            </div>
            <div class="mb-3">
                <label>Contact</label>
                <input type="text" name="contact" class="form-control" value="<?php echo $row['contact'];?>">
            </div>
            <div class="mb-3">
              <label>Student Image</label>
              <input type="file" name="stud_img" accept="image/*" class="form-control" />
              <img src="<?php echo 'upload-images/'.$row['image']?>" alt="Image" width="100" height="100" class="image-responsive mt-2" />
            </div>
            <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    }
    }
    else{
        echo 'No record found';
    }

?>


<?php include "includes/footer.php"?>