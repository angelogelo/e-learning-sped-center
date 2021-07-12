

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addModule"><i class="fas fa-plus-circle nav-icon"></i> | Add Video</button><br><br>
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title"></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <?php
                $video = $connection->query("SELECT * FROM video WHERE disability = '$id'");
                while ($videoRow = $video->fetch_array()) {
                $updateVideo = $videoRow['video'];
              ?>
                <div class="col-md-4">
                  <div class="card card-widget">
                    <div class="card-header">  
                      <div class="user-block">
                        <span>Title: <?php echo $videoRow['title']; ?></span><br>
                        <span>Date: <?php echo date('M d, Y', strtotime($videoRow['created_at'])); ?></span>
                      </div>
                    </div><!-- /.card-header -->   
                    <div class="card-body">
                      <div class="embed-responsive embed-responsive-16by9">
                        <video controls>
                          <source src="../videos/<?php echo $updateVideo; ?>" type="video/mp4">
                        </video>
                      </div>
                    </div><!-- /.card-body -->
                  </div><!-- /.card -->
                </div><!-- /.col -->
                <?php
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content -->