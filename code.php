<?php include "db_con.php" ?>
<?php 
    //Code to insert the data into the database
    if(isset($_POST['submit_btn'])){
        
        $fname = addslashes($_POST['first_name']);
        $lname = addslashes($_POST['last_name']);
        $email = addslashes($_POST['email']);
        $password = md5($_POST['password']);
        $contact = $_POST['contact'];
        $image_name = $_FILES["stud_img"]["name"];
        $tmp_name = $_FILES["stud_img"]["tmp_name"];
        // $folder = "images/".$image_name;

        $query = mysqli_query($con, "SELECT * FROM students WHERE email='$email' AND contact='$contact' ");

        if(empty($fname)){
            $_SESSION['error'] = "First name is required!";
            header("Location:create.php");
        }else if(empty($lname)){
            $_SESSION['error'] = "Last name is required!";
            header("Location:create.php");
        }else if(empty($email)){
            $_SESSION['error'] = "Email address is required!";
            header("Location:create.php");
        }else if(empty($password)){
            $_SESSION['error'] = "Password is required!";
            header("Location:create.php");
        }else if(empty($contact)){
            $_SESSION['error'] = "Phone number is required!";
            header("Location:create.php");
        }else if(file_exists('upload-images/' . $_FILES['stud_img']['name'])){
            $filename = $_FILES['stud_img']['name'];
            $_SESSION['status'] = "Image already exists ".$filename;
            header("Location:create.php");
        }
        else if(mysqli_num_rows($query) > 0){
            $_SESSION['error'] = "Email or contact already exists ".$email;
            header("Location:create.php");
        }
        else{
                $sql = "INSERT INTO students (fname,lname,email,password,contact,image) VALUES('$fname','$lname','$email','$password','$contact','$image_name')";
                $query = mysqli_query($con,$sql);
                
                if($query){
                    move_uploaded_file($tmp_name,'upload-images/'.$image_name);
                    $_SESSION['status'] = "Student Registered successfully!";
                    $_SESSION['status_code'] = "success";
                    header("Location:index.php");
                }else{
                    $_SESSION['status'] = "Student not registered, Something went wrong!";
                    $_SESSION['status_code'] = "error";
                    header("Location:create.php");
                }
            }
}
       
    //Code to update the data in the database
    if(isset($_POST['update_btn'])){
        $id = $_POST['update_id'];
        $fname = addslashes($_POST['first_name']);
        $lname =addslashes($_POST['last_name']);
        $email =addslashes($_POST['email']);
        $password = md5($_POST['password']);
        $contact =addslashes($_POST['contact']);
        if(empty($fname)){
            echo '<alert>Full Name is required</alert>';
        }else if(empty($lname)){
            echo '<alert>Last Name is required</alert>';
        }else if(empty($email)){
            echo '<alert>Email is required</alert>';
        }else if(empty($password)){
            echo '<alert>Password is required</alert>';
        }else if(empty($contact)){
            echo '<alert>Contact is required</alert>';
        }else{
            $sql = "UPDATE students SET fname='$fname',lname='$lname',email='$email',password='$password',contact='$contact' WHERE id='$id'";
            $query = mysqli_query($con,$sql);
        
        if($query){
            $_SESSION['status'] = "Student Updated successfully!";
            $_SESSION['status_code'] = "success";
            header("Location:index.php");
        }else{
            $_SESSION['status'] = "Not Updated successfully!";
            $_SESSION['status_code'] = "error";
            header("Location:create.php");
        }
    }
    }

    //Code to delete the data from the database
    if(isset($_POST['delete_btn_set'])){
        $id = $_POST['delete_id'];
        $stud_img = $_POST['delete_img'];

        $sql = "DELETE FROM students WHERE id='$id'";
        $query = mysqli_query($con,$sql);
        if($query){
            unlink("upload-images/".$stud_img);
            $_SESSION['status'] = "Deleted successfully!";
            $_SESSION['status_code'] = "success";
            header("Location:index.php");
        }else{
            $_SESSION['status'] = "Not Deleted!";
            $_SESSION['status_code'] = "error";
            header("Location:index.php");
        }
    }

    //Code to delete all data from database
    if(isset($_POST['delete_all_btn_set'])){
        $sql = "DELETE from students";
        $query = mysqli_query($con,$sql);
        $dir_name = "upload-images/";
        // $images = glob($dir_name.*);
        
        if($query){
            // foreach($images as $image) {
            //     unlink("upload-images/".$image);
            // }
            $_SESSION['status'] = "All Records Deleted Successfully!";
            $_SESSION['status_code'] = "success";
            header("Location:index.php");
        }
        else{
            $_SESSION['status'] = "All Records Not Deleted Successfully!";
            $_SESSION['status_code'] = "error";
            header("Location:index.php");
        }
    }

?>