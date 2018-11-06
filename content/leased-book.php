<?php require("scripts/book.php");?>
<div class="row">
    <form action="#" method="post">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Book registered in the system.</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 350px;">
                  <input type="text" name="searchRentedBook" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" name="btnSearchRentedBook" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>User</th>
                  <th>Title</th>
                  <th>Rent Date</th>
                  <th>Return Date</th>
                  <th>Action</th>
                </tr>
               <?php 
                if(isset($_POST["btnSearchRentedBook"])){
                  if($tSqlSearchRentedBook <= 0){
                    echo "<div class='alert alert-info'><center>There are no results for your search.</center></div>";
                  }else{
                    while($displayBook = $sqlSearchRentedBook->fetch(PDO::FETCH_OBJ)){
                  ?>
                    <tr>
                      <td><?php echo $displayBook->name;?></td>
                      <td><?php echo $displayBook->title;?></td>
                      <td><?php echo $displayBook->rentdate;?></td>
                      <td><?php echo $displayBook->returndate;?></td>
                      <td><a href="/leased-book?idrentals=<?php echo $displayBook->idrentals;?>" class="btn btn-primary" role="button">Delivere</a></td>
                    </tr>

                    <?php }}}else{while($displayBook = $sqlRentBook->fetch(PDO::FETCH_OBJ)){?>
                    <tr>
                      <td><?php echo $displayBook->name;?></td>
                      <td><?php echo $displayBook->title;?></td>
                      <td><?php echo $displayBook->rentdate;?></td>
                      <td><?php echo $displayBook->returndate;?></td>
                      <td><a href="/leased-book?idrentals=<?php echo $displayBook->idrentals;?>" class="btn btn-primary" role="button">Delivere</a></td>
                    </tr>
                <?php }}?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </form>
      </div>