<?php require("scripts/publishing-company.php");?>
<div class="row">
    <form action="#" method="post">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Publishing Company registered in the system.</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 350px;">
                  <input type="text" name="searchPublishingCompany" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" name="btnSearchPublishingCompany" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                  <div class="input-group-btn">
                    <a href="/register-book" class="btn btn-default" role="button"><i class="fa fa-plus"></i></a>
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
                  <th>Neighbor Hood</th>
                  <th>Number</th>
                  <th>City</th>
                  <th>Zip Code</th>
                  <th>CNPJ</th>
                </tr>
               <?php 
                if(isset($_POST["btnSearchPublishingCompany"])){
                  if($tSqlSearchPublishingCompany <= 0){
                    echo "<div class='alert alert-info'><center>There are no results for your search.</center></div>";
                  }else{
                    while($displayPublishingCompany = $sqlSearchPublishingCompany->fetch(PDO::FETCH_OBJ)){
                  ?>
                    <tr>
                      <td><?php echo $displayPublishingCompany->idpublishingcompany;?></td>
                      <td><a href="/publishing-company-details?idpublishingcompany=<?php echo $displayPublishingCompany->idpublishingcompany;?>"><?php echo $displayPublishingCompany->name;?></a></td>
                      <td><?php echo $displayPublishingCompany->neighborhood;?></td>
                      <td><?php echo $displayPublishingCompany->number;?></td>
                      <td><?php echo $displayPublishingCompany->city;?></td>
                      <td><?php echo $displayPublishingCompany->zipcode;?></td>
                      <td><?php echo $displayPublishingCompany->cnpj;?></td>
                    </tr>

                    <?php }}}else{while($displayPublishingCompany = $sqlPublishingCompany->fetch(PDO::FETCH_OBJ)){?>
                    <tr>
                      <td><?php echo $displayPublishingCompany->idpublishingcompany;?></td>
                      <td><a href="/publishing-company-details?idpublishingcompany=<?php echo $displayPublishingCompany->idpublishingcompany;?>"><?php echo $displayPublishingCompany->name;?></a></td>
                      <td><?php echo $displayPublishingCompany->neighborhood;?></td>
                      <td><?php echo $displayPublishingCompany->number;?></td>
                      <td><?php echo $displayPublishingCompany->city;?></td>
                      <td><?php echo $displayPublishingCompany->zipcode;?></td>
                      <td><?php echo $displayPublishingCompany->cnpj;?></td>
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