<?php 
                  // $disability = $connection->query("SELECT * FROM disability");
                  // while ($disabilityRow = $disability->fetch_array()) {
                ?>
                <a class="btn btn-app">
                  <span class="badge bg-success">300</span>
                  <i class="fas fa-user-nurse"></i> <?=$disabilityRow['description'];?>
                </a>
                <?php //} ?>

                <div class="row">
              <div class="col-lg-12">

                

              </div>
            </div>


            <?php  
      if ($disabilityCount < 1) {
    ?>
      
    <?php
      }else {
        $disabilityRow = $disability->fetch_array();
    ?>


    <a href="../files/<?php echo $moduleRow['file']; ?>" data-tooltip="tooltip" title="Click to Download" class="btn btn-outline-warning btn-sm" data-toggle="tooltip"><i class="fa fa-download"></i><?php echo $moduleRow['file']; ?></a>




    <table id="flashTable" class="table table-bordered table-hover text-nowrap table-sm">
              <thead style="background-color: #b2bdb5;">
              <tr>
                <th class="table-plus datatable-nosort" >No</th>
                <th>Title</th>
                <th>Flash Card Images</th>
                <th>Date Created</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $flash = $connection->query("SELECT * FROM flash_cards_file WHERE title_id = '$id'");
                  $number = 1;
                  while ($flashRow = $flash->fetch_array()) {
                ?>
                <tr>
                  <td><?php echo $number++; ?></td>
                  <td><?=$flashCardRow['title'];?></td>
                  <td>
                    <?php  
                        if ($flashRow['files_images'] == "none" || $flashRow['files_images'] == NULL) {
                            ?>
                                <img src="../images/no_image.png" class="img-fluid rounded" style="width: 50px; height: 50px;">
                            <?php
                        }else {
                            ?>
                                <img src="../flash-cards/<?php echo $flashRow['files_images']; ?>" class="img-fluid rounded" style="width: 50px; height: 50px; margin-right: auto; margin-left: auto; display: block;">
                            <?php
                        }
                    ?>
                  </td>
                  <td><?php echo date('M d, Y', strtotime($flashRow['created_at'])); ?></td>
                  <td>

                    <!-- View -->
                    <button data-tooltip="tooltip" title="Click to View" class="btn btn-outline-success btn-sm ViewFlashCard" data-toggle="tooltip" data-placement="top" data-id="<?php echo $flashRow['id']; ?>"><i class="fa fa-eye"></i></button>

                    <!-- Edit -->
                    <button data-tooltip="tooltip" title="Click to Edit" class="btn btn-outline-primary btn-sm editInfo" data-toggle="tooltip" data-placement="top" data-id="<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></button>

                    <!-- Delete -->
                    <button data-tooltip="tooltip" title="Click to Delete" class="btn btn-outline-danger btn-sm deleteInfo" data-toggle="tooltip" data-placement="top" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>

                <div class="modal fade" id="ViewFlashCard<?php echo $flashRow['id']; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-info-circle"></i> Staff's Information</h5>
                      </div>
                      <div class="modal-body">
                        <div class="form-group row">
                          <div class="col-md-6 mx-auto text-center">
                            <img src="../images/staffs/<?php echo $row['picture']; ?>" class="img-fluid rounded">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <p class="h6 font-weight-bold">Employee ID</p>
                            <p class="h6"><?php echo $row['emp_id']; ?></p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <p class="h6 font-weight-bold">Employee name</p>
                            <p class="h6"><?php echo $row['last_name'].", ".$row['first_name']." ".$row['middle_name']; ?></p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <p class="h6 font-weight-bold">Gender</p>
                            <p class="h6"><?php echo $row['gender']; ?></p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <p class="h6 font-weight-bold">Contact no</p>
                            <p class="h6"><?php echo $row['contact_no']; ?></p>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-12">
                            <p class="h6 font-weight-bold">Address</p>
                            <p class="h6"><?php echo $row['address']; ?></p>
                          </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                          <div class="col-md-12">
                            <p class="h6 font-weight-bold">Status : <?php echo ucfirst($row['status']); ?></p>
                            <select name="emp_status" id="emp_status<?php echo $row['id']; ?>" class="custom-select custom-select-sm staffsStatus" data-id="<?php echo $row['id']; ?>">
                              <option value="" disabled="" selected="">Select status</option>
                              <option value="activated">Activated</option>
                              <option value="deactivated">Deactivated</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                  }
                ?>
              </tbody>
            </table>