<?php 
require("scripts/user.php");
require("scripts/rent.php");
?>
<div class="row">
	<div class="col-sm-4 col-md-4 col-ls-12">
	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Summary of rental</h3>
            </div>
            <form action="#" method="post" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Rent user</label>
        				<select class="form-control" name="nameUserRent">
        					<option selected="selected" value="0">----Select user----</option>
        					<?php while($displayUser = $sqlUser->fetch(PDO::FETCH_OBJ)){?>					
        					<option value="<?php echo $displayUser->iduser;?>"><?php echo $displayUser->name;?></option>
        					<?php } ?>
        				</select>
                </div>
                <hr />
                <?php while($displayRent = $sqlRentBook->fetch(PDO::FETCH_OBJ)){?>

                <div class="info-box bg-aqua">
                            <span class="info-box-icon"><i class="fa fa-book"></i></span>

                            <div class="info-box-content">
                              <span class="info-box-text"><?php echo $displayRent->title;?></span>
                              
                              <div class="progress">
                              </div>
                              <span class="progress-description" style="margin-top:20px;line-height:20px;">
                                <a href="/rentbook?remove=<?php echo $displayRent->idrentals;?>" class="info-box-number pull-left" style="margin-right:5px;"><span class="fa fa-trash text-red"></span></a>
                                <?php echo "Return to ".date("d-m-Y", strtotime($displayRent->returndate));?>                                  
                              </span>
                              
                            </div>
                            <!-- /.info-box-content -->
                          </div>


                <?php } ?>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="rentBook" class="btn btn-primary">Rent</button>
              </div>
            </form>
          </div>
     </div>
     <div class="col-sm-8 col-md-8 col-ls-12">
    <form action="#" method="post">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Rent book</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 300px;">
                  <input type="text" name="searchBook" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" name="btnSearchBookRent" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<?php if(isset($_POST["btnSearchBookRent"])){
                if($tSqlSearchBook <= 0){
                  echo "<div class='alert alert-info'><center>There are no results for your search.</center></div>";
                }else{
                  while($displayBook = $sqlSearchBook->fetch(PDO::FETCH_OBJ)){
                ?>
            <div class="col-sm-6 col-md-6 col-ls-12">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3 class="display-inline"><?php echo $displayBook->title;?></h3>
                  <p><?php echo $displayBook->readingtime;?> Days for reading</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="/rentbook?idbookrent=<?php echo $displayBook->idbook;?>&readingtime=<?php echo $displayBook->readingtime;?>" class="small-box-footer">Rent <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
                <?php }}}else{
                while($displayBook = $sqlBook->fetch(PDO::FETCH_OBJ)){ ?>
		        <div class="col-sm-6 col-md-6 col-ls-12">
		          <!-- small box -->
		          <div class="small-box bg-aqua">
		            <div class="inner">
		              <h3 class="display-inline"><?php echo $displayBook->title;?></h3>
		              <p><?php echo $displayBook->readingtime;?> Days for reading</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-book"></i>
		            </div>
		            <a href="/rentbook?idbookrent=<?php echo $displayBook->idbook;?>&readingtime=<?php echo $displayBook->readingtime;?>" class="small-box-footer">Rent <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		        </div>
		        <?php } }?>

            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </form>
     </div>
</div>