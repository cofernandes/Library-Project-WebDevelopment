<?php require("scripts/book.php");?>
<div class="row">
    <form action="#" method="post">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Book registered in the system.</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 350px;">
                  <input type="text" name="searchBook" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" name="btnSearchBook" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                  <?php if($profileUser == "root"){?>
                  <div class="input-group-btn">
                    <a href="/register-book" class="btn btn-default" role="button"><i class="fa fa-plus"></i></a>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Author</th>
                  <th>Publishing Company</th>
                  <th>Title</th>
                  <th>Language</th>
                  <th>Edition</th>
                  <th>Page</th>
                  <th>Genre</th>
                </tr>
               <?php 
                if(isset($_POST["btnSearchBook"])){
                  if($tSqlSearchBook <= 0){
                    echo "<div class='alert alert-info'><center>There are no results for your search.</center></div>";
                  }else{
                    while($displayBook = $sqlSearchBook->fetch(PDO::FETCH_OBJ)){
                  ?>
                    <tr>
                      <td><?php echo $displayBook->idbook;?></td>
                      <td><?php echo $displayBook->author;?></td>
                      <?php if($profileUser == "root"){?>
                      <td><a href="/book-details?idbook=<?php echo $displayBook->idbook;?>"><?php echo $displayBook->title;?></a></td>
                      <?php }else{?>
                      <td><?php echo $displayBook->title;?></a>
                      </td>
                      <?php } ?>
                      <td><?php echo $displayBook->publishingcompany;?></td>
                      <td><?php echo $displayBook->language;?></td>
                      <td><?php echo $displayBook->edition;?></td>
                      <td><?php echo $displayBook->page;?></td>
                      <td><?php echo $displayBook->genre;?></td>
                    </tr>

                    <?php }}}else{while($displayBook = $sqlBook->fetch(PDO::FETCH_OBJ)){?>
                    <tr>
                      <td><?php echo $displayBook->idbook;?></td>
                      <?php if($profileUser == "root"){?>
                      <td><a href="/book-details?idbook=<?php echo $displayBook->idbook;?>"><?php echo $displayBook->title;?></a></td>
                      <?php }else{?>
                      <td><?php echo $displayBook->title;?></a>
                      </td>
                      <?php } ?>
                      <td><?php echo $displayBook->author;?></td>
                      <td><?php echo $displayBook->publishingcompany;?></td>
                      <td><?php echo $displayBook->language;?></td>
                      <td><?php echo $displayBook->edition;?></td>
                      <td><?php echo $displayBook->page;?></td>
                      <td><?php echo $displayBook->genre;?></td>
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