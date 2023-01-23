<?php include "includes/header.php"?>
<?php include "db_con.php"?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header sticky-top z-index-100 bg-light">
                        <h4 class="d-flex justify-content-around">
                            Student Info System
                            <div>
                            <a href="index.php" class="btn btn-dark">Home</a>
                            <a href="javascript:void(0)" class="delete_all_btn_ajax btn btn-danger float-end">Delete All</a>
                            <a href="create.php" class="btn btn-primary float-end mx-3">Add/Register</a>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                    
                        <?php 
                        
                            $sql = "SELECT * FROM students";
                            $query = mysqli_query($con,$sql);

                            if(mysqli_num_rows($query) > 0)
                                {   

                        ?>
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Student Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=0;
                                while($row = mysqli_fetch_array($query))
                                    {
                                        $i++;
                            ?>
                            <tr>
                            <th scope="row"><?php echo $i?></th>
                            <td><?php echo $row['fname']?></td>
                            <td><?php echo $row['lname']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['password']?></td>
                            <td><?php echo $row['contact']?></td>
                            <td><img src="<?php echo 'upload-images/'.$row['image']?>" alt="Image" width="100" height="100" style="display:flex;margin:auto;"></td>
                            <td> <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-info">Update</a></td>
                            <td>
                                <input type="hidden" class="delete_id_value" value="<?php echo $row['id'];?>">
                                <input type="hidden" class="delete_stud_img" value="<?php echo $row['image'];?>">
                                <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">Delete</a>
                            </td> 
                            </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                        <?php 
                                }
                                else{
                                    echo "<img src='images/emptyData.png' style='display:flex;height:250px;margin:auto;' draggable='false'>";
                                }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include "includes/footer.php"?>