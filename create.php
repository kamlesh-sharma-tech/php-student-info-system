<?php include "db_con.php"?>
<?php include "includes/header.php"?>

<div class="container my-5">
  <div class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header bg-dark text-white text-center">
          <h4>Add new Student</h4>
        </div>
        <?php 
            if(isset($_SESSION['error']) && $_SESSION['error'] != ''){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
        <div class="card-body">
          <form action="code.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label>First Name</label>
              <input
                type="text"
                name="first_name"
                class="form-control"
                placeholder="Enter first name"
                required
              />
            </div>
            <div class="mb-3">
              <label>Last Name</label>
              <input
                type="text"
                name="last_name"
                class="form-control"
                placeholder="Enter last name"
                required
              />
            </div>
            <div class="mb-3">
              <label>Email Address</label>
              <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Enter email"
                required
              />
            </div>
            <div class="mb-3">
              <label>Password</label>
              <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Enter password"
                required
              />
            </div>
            <div class="mb-3">
              <label>Contact</label>
              <input
                type="text"
                name="contact"
                class="form-control"
                placeholder="Enter contact number"
                required
              />
            </div>
            <div class="mb-3">
              <label>Student Image</label>
              <input type="file" name="stud_img" accept="image/*" class="form-control" />
            </div>
            <button type="submit" name="submit_btn" class="btn btn-primary">
              Submit
            </button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "includes/footer.php"?>
