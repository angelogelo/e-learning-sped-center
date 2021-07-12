  
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
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
</script>

<script type="text/javascript">

    function updateUserStatus(){
      jQuery.ajax({
        url:'updateUserStatus.php',
        success:function(){
          
        }
      });
    }
    
    setInterval(function(){
     updateUserStatus();
    },1000);
    
</script>
