<?php require("scripts/user.php");?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-ls-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Display user</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="#" method="post" >
            
              <div class="box-body">
              	<?php while($displayUser = $sqlUser->fetch(PDO::FETCH_OBJ)){?>
                <div class="cols-sm-6 col-md-6 col-ls-12">

                <div class="form-group col-sm-12 col-md-12 col-ls-12">
                  <label f>Nome</label>
                  <input type="text" class="form-control" name="nameUser" placeholder="Name" value="<?php echo $displayUser->name;?>">
                </div>

                <div class="form-group col-sm-12 col-md-12 col-ls-12">
                  <label f>Email</label>
                  <input type="email" class="form-control" name="emailUser" placeholder="Email" value="<?php echo $displayUser->email;?>">
                </div>

                <div class="form-group col-sm-12 col-md-12 col-ls-12">
                  <label f>Status</label>
                  <select class="form-control" name="status">
                    <option value="<?php echo $displayUser->status;?>"><?php $status = $displayUser->status; if($status=="A"){echo "Active";}else{echo "block";}?></option>
                    <option value="A">Active</option>
                    <option value="B">Block</option>
                  </select>
                </div>


                <div class="form-group col-sm-12 col-md-12 col-ls-12">
                  <label >Type user</label>
                  <select name="typeuser" class="form-control">
                    <option value="<?php echo $displayUser->profile;?>" selected><?php echo $displayUser->profile;?></option>
                    <option value="client">Client</option>
                    <option value="root">Root</option>                    
                  </select>
                </div>


                </div>


                <div class="cols-sm-6 col-md-6 col-ls-12">
                  <div class="form-group col-sm-12 col-md-12 col-ls-12">
                    <label >Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" >
                  </div>
                  <div class="form-group col-sm-12 col-md-12 col-ls-12">
                    <label >Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="Password">
                  </div>
                </div>






                <?php } ?>
              </div>
              <!-- /.box-body -->

              <div class="box-footer ">
              	<span class="text-red pull-left">* Required field</span>
                <button type="submit" name="updateUser" class="btn btn-primary pull-right">Update</button>
                <a href="/" class="btn btn-default pull-right" role="button" style="margin-right:10px;">Cancel</a>
                
              </div>
            </form>
          </div>
    
        </div>
    </div>