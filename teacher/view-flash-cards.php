<?php 

  include 'header.php'; 
  $id = mysqli_real_escape_string($connection, $_GET['id']);
  $flashCard = $connection->query("SELECT * FROM flash_cards_title WHERE id = '$id'");
  $flashCardRow = $flashCard->fetch_array();

  $result = $connection->query("SELECT files_images FROM flash_cards_file WHERE title_id = '$id'");
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> <i class="nav-icon fas fa-clone"></i> <?=$flashCardRow['title'];?></h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content-header -->


<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addFlashCard"><i class="fas fa-plus-circle nav-icon"></i> | Add Flash Cards</button>
        </div><!-- /.col -->
        <div class="col-sm-6 float-sm-right">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#changeCard"><i class="fas fa-edit nav-icon"></i> | Change Flash Cards</button><br><br>
        </div><!-- /.col -->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-body" style="background-color: #b2bdb5;">
            
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php
                  $i = 0;
                  foreach ($result as $row) {
                      $actives = '';
                    if ($i == 0) {
                      $actives = 'active';
                    }
                ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>
                <?php $i++; } ?>
              </ol>

              <div class="carousel-inner">
                <?php
                  $i = 0;
                  foreach ($result as $row) {
                      $actives = '';
                    if ($i == 0) {
                      $actives = 'active';
                    }
                ?>
                <div class="carousel-item <?= $actives; ?>">
                  <img class="d-block" style="width: 500px; height: 100%; text-align: center; display: block; margin-right: auto; margin-left: auto;" src="../flash-cards/<?= $row['files_images'] ?>">
                </div>
                <?php $i++; } ?>
              </div>
              
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            
          </div>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content -->

<div class="modal fade" id="addFlashCard">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fas fa-info-circle"></i> Flash Card's Information
        </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
    <form action="" method="POST" enctype="multipart/form-data" id="addFlashForm">
      <div class="modal-body">
        <div class="row">

          <div class="col-sm-12">
            <div class="form-group">
              <p class="h6">Flash Cards Image</p>
              <div class="custom-file">
                <input type="file" name="file[]" id="file" class="custom-file-input form-control-sm" accept="image/*" multiple required>
                <label class="custom-file-label">Choose File</label>
              </div>
            </div>
          </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

        </div><!--row-->
      </div><!--modal-body-->
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> | Save</button>
      </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="changeCard">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fas fa-info-circle"></i> Flash Card's List
        </h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
        <table id="studentTable" class="table table-bordered table-hover text-nowrap table-sm">
          <thead style="background-color: #b2bdb5;">
          <tr>
            <th class="table-plus datatable-nosort" >No</th>
            <th>Picture</th>            
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
            <?php

              $cards = $connection->query("SELECT * FROM flash_cards_file WHERE title_id = '$id'");
              $number = 1;
              while($cardsRow = $cards->fetch_array()){

            ?>
            <tr>
              <td><?php echo $number++; ?></td>
              <td>
                <?php
                  if ($cardsRow['files_images'] == "none" || $cardsRow['files_images'] == NULL) {
                      ?>
                      <?php
                  }else {
                      ?>
                          <img src="../flash-cards/<?php echo $cardsRow['files_images']; ?>" class="img-fluid rounded" style="width: 50px; height: 50px; margin-right: auto; margin-left: auto; display: block;">
                      <?php
                  }
                ?>
              </td>
              <td>
                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editCards<?php echo $cardsRow['id']; ?>"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Click to Edit"></i></button>
              </td>
            </tr>

            <div class="modal fade" id="editCards<?php echo $cardsRow['id']; ?>">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">
                      <i class="fas fa-info-circle"></i> Flash Card's Information
                    </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <form action="" method="POST" class="editCardsForm" id="editCardsForm<?php echo $cardsRow['id']; ?>" data-id="<?php echo $cardsRow['id']; ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                      
                      <div class="col-sm-12">
                        <div class="form-group">
                          <p class="h6">Flash Cards Image</p>
                          <div class="custom-file">
                            <input type="file" name="file" id="file" class="custom-file-input form-control-sm" accept="image/*">
                            <label class="custom-file-label">Choose File</label>
                          </div>
                        </div>
                      </div>

                    </div><!--modal-body-->
                    <div class="modal-footer justify-content-between">
                      <input type="hidden" name="update_id" value="<?=$cardsRow['id'];?>">
                      <button type="submit" name="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> | Update</button>
                    </div>
                  </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <?php
              }
            ?>
          </tbody>
        </table>
      </div><!--modal-body-->
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include 'footer.php'; ?>

<script type="text/javascript">

  $(document).ready(function(){

    $(document).on('click', '.ViewFlashCard', function(){
      var id = $(this).attr('data-id');
      $('#ViewFlashCard'+id).modal('show');
    });

    $('#addFlashForm').submit(function(e){
      e.preventDefault();
      var formData = new FormData($(this)[0]);

      $.ajax({
        url: "../includes/addFlashCards.php",
        method: "POST",
        dataType: "TEXT",
        contentType: false,
        processData: false,
        data: formData,
        success: function(data){
          //console.log(data);
          if (data == "Failed") {
            swal({
              title: "Failed to add new staff. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "New flash cards has been added.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });


    $(document).on('submit', '.editCardsForm', function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var formData = new FormData($('#editCardsForm'+id)[0]);

      $.ajax({
        url: "../includes/updateFlashCards.php",
        method: "POST",
        dataType: "TEXT",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
          console.log(data);
          if (data == "Failed") {
            swal({
              title: "Failed to update flash cards information. Please try again later.",
              icon: "error"
            });

          }else {
            swal({
              title: "Flash Cards has been successfully updated.",
              icon: "success"
            }).then(function(){
              location.reload();
            });
          }
        }
      })
    });

  });

</script>