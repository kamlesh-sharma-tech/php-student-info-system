<script
  src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/sweetalert.js"></script>
    <script src="pace/pace.min.js"></script>

      <?php
        if(isset($_SESSION['status']) && $_SESSION['status'] != '')
        {
          ?>
            <script>
              swal({
                  title: "<?php echo $_SESSION['status'];?>",
                  // text: "You clicked the button!",
                  icon: "<?php echo $_SESSION['status_code'];?>",
              });
      </script>
          <?php
            unset($_SESSION['status']);
        }
      ?>

      <script>
        $(document).ready(function () {
          $(".delete_btn_ajax").click(function (e) { 
            e.preventDefault();
           
            var deleteId = $(this).closest("tr").find('.delete_id_value').val();
            var deleteImage = $(this).closest("tr").find('.delete_stud_img').val();
            swal({
                  title: "Are you sure you want to delete this data?",
                  text: "Once deleted, you will not be able to recover this Data!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    $.ajax({
                      type: "POST",
                      url: "code.php",
                      data: {
                        "delete_btn_set":1,
                        "delete_id":deleteId,
                        "delete_img":deleteImage,
                      },
                      success: function (response) {
                        swal("Data Deleted Successfully!",{
                          icon:"success",
                        }).then((result) =>{
                          location.reload();
                        });
                      }
                    });
                  } 
            });

          });


          $(".delete_all_btn_ajax").click(function (e) { 
            e.preventDefault();
           
            swal({
                  title: "Are you sure you want to delete all data?",
                  text: "Once deleted, you will not be able to recover all data!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    $.ajax({
                      type: "POST",
                      url: "code.php",
                      data: {
                        "delete_all_btn_set":1,
                      },
                      success: function (response) {
                        swal("All Data Deleted Successfully!",{
                          icon:"success",
                        }).then((result) =>{
                          location.reload();
                        });
                      }
                    });
                  } 
            });

          });


        });
      </script>

  </body>
</html>