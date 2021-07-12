  
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar" style="background-color: #82EEDD;">
    <!-- Control sidebar content goes here -->
    <?php
      $active = $connection->query("SELECT * FROM login_details WHERE last_activity > DATE_SUB(NOW(), INTERVAL 5 SECOND)");
    ?>
    <!-- <h6 id="getOnline" style="text-align: center; margin-top: 10px;">Active (<?php// echo $active->num_rows; ?>)</h6> -->
    <!-- <hr> -->
    <div class="p-3" id="media">
      <?php

        $disability = $connection->query("SELECT * FROM disability WHERE assign_teacher = '".$teacherRow['teacher_id']."'");
        while($disabilityRow = $disability->fetch_array()){

        $student = $connection->query("SELECT * FROM student WHERE disability = '".$disabilityRow['id']."'");
        while($studentRow = $student->fetch_array()){

        $loginUser = $connection->query("SELECT * FROM login_details WHERE user_id = '".$studentRow['lrn']."'");
        $loginUserRow = $loginUser->fetch_array();

        $time=time();
        $online = "";
        $class="text-danger";
          if($loginUserRow['last_login'] > $time){
          $status='Online';
          $class="text-success";
        }

      ?>
      <div class="media">
        <?php  
            if ($studentRow['picture'] == "none" || $studentRow['picture'] == NULL) {
                ?>
                    <img src="../images/no_image.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <?php
            }else {
                ?>
                    <img src="../images/student/<?php echo $studentRow['picture']; ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <?php
            }
        ?>
        <div class="media-body">
          <h3 class="dropdown-item-title">
            <?php echo $studentRow['fullname'];?>
            <span class="float-right text-sm <?php echo $class ?>"><i class="fas fa-circle"></i></span>
          </h3>
          <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?php echo diffForHumansOnline($loginUserRow['last_activity']); ?></p>
        </div>
      </div>
      <div class="dropdown-divider"></div>
      <?php } } ?>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>USmile: An E-Learning System for Child With Special Needs</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Sweetalert -->
<script src="../assets/sweetalert/sweetalert.min.js"></script>
</body>
</html>

<script>
  $(document).ready(function() {

        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });

        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
              $('#picture_display').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#picture").change(function(){
          $('#picture_display').show();
          readURL(this);
        });

        $('#logoutButton').click(function(){
          var type = $(this).attr('data-type');
          if (type == "admin") {
            return window.location.replace('../includes/logout.php');

          }else {
            return window.location.replace('../includes/logout.php');
          }
        });

    });

  function getOnlineUser(){
    jQuery.ajax({
      url:'../includes/getOnlineUser.php',
      success:function(result){
        jQuery('#media').html(result);
      }
    });
  }
  
  setInterval(function(){
    getOnlineUser();
  },1000);

</script>