<?php require("scripts/author.php");?>
<div class="row">
    <form action="#" method="post">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Author registered in the system.</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 350px;">
                  <input type="text" name="searchAuthor" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" name="btnSearchAuthor" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                  <div class="input-group-btn">
                    <a href="/register-author" class="btn btn-default" role="button"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>User</th>
                </tr>
                <?php 
                if(isset($_POST["btnSearchAuthor"])){
                  if($tSqlSearchAuthor <= 0){
                    echo "<div class='alert alert-info'><center>There are no results for your search.</center></div>";
                  }else{
                    while($displayAuthor = $sqlSearchAuthor->fetch(PDO::FETCH_OBJ)){
                  ?>
                    <tr>
                      <td><?php echo $displayAuthor->idauthor;?></td>
                      <td><a href="/author-details?idauthor=<?php echo $displayAuthor->idauthor;?>"><?php echo $displayAuthor->name;?></a></td>
                    </tr>

                    <?php }}}else{while($displayAuthor = $sqlAuthor->fetch(PDO::FETCH_OBJ)){?>
                <tr>
                  <td><?php echo $displayAuthor->idauthor;?></td>
                  <td><a href="/author-details?idauthor=<?php echo $displayAuthor->idauthor;?>"><?php echo $displayAuthor->name;?></a></td>
                </tr>
                <?php }} ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </form>
      </div>