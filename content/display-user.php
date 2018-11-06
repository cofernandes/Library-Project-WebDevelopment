<?php require("scripts/user.php"); ?>

<div class="row">
    <form action="#" method="post">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users registered in the system.</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <input type="text" name="searchUser" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" name="btnSearchUser" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>

                  <div class="input-group-btn">
                    <a href="/register-user" class="btn btn-default" role="button"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Profile</th>
                </tr>
                <?php 
                if(isset($_POST["btnSearchUser"])){
                  if($tSqlSearchUser <= 0){
                    echo "<div class='alert alert-info'><center>There are no results for your search.</center></div>";
                  }else{while($displayUser = $sqlSearchUser->fetch(PDO::FETCH_OBJ)){?>
                <tr>
                  <td><?php echo $displayUser->iduser;?></td>
                  <td><a href="/user-details?iduser=<?php echo $displayUser->iduser;?>"><?php echo $displayUser->name;?></a></td>
                  <td><?php echo $displayUser->email;?></td>
                  <td><?php $status = $displayUser->status; if($status=="A"){echo "Active";}else{echo "Block";}?></td>
                  <td><?php echo $displayUser->profile;?></td>
                </tr>
                <?php }}}else{ while($displayUser = $sqlUser->fetch(PDO::FETCH_OBJ)){?>
                <tr>
                  <td><?php echo $displayUser->iduser;?></td>
                  <td><a href="/user-details?iduser=<?php echo $displayUser->iduser;?>"><?php echo $displayUser->name;?></a></td>
                  <td><?php echo $displayUser->email;?></td>
                  <td><?php $status = $displayUser->status; if($status=="A"){echo "Active";}else{echo "Block";}?></td>
                  <td><?php echo $displayUser->profile;?></td>
                </tr>
                <?php } }?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </form>
  </div>