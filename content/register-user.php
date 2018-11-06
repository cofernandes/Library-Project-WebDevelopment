<?php require("scripts/user.php");?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-ls-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Register user</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="#" method="post" >
              <div class="box-body">
                <div class="form-group col-sm-3 col-md-3 col-ls-12">
                  <label>Name</label>
                  <input type="text" class="form-control" name="nameUser" placeholder="Name">
                </div>
                <div class="form-group col-sm-3 col-md-3 col-ls-12">
                  <label>Email</label>
                  <input type="email" class="form-control" name="emailUser" placeholder="Email">
                </div>
                <div class="form-group col-sm-2 col-md-2 col-ls-12">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group col-sm-2 col-md-2 col-ls-12">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control" name="cpassword" placeholder="Password">
                </div>
                <div class="form-group col-sm-2 col-md-2 col-ls-12">
                  <label>Type user</label>
                  <select name="typeuser" class="form-control">
                  	<option value="client">Client</option>
                  	<option value="root">Root</option>                  	
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer ">
              	<span class="text-red pull-left">* Required field</span>
                <button type="submit" name="registerUser" class="btn btn-primary pull-right">Register</button>
                <a href="/" class="btn btn-default pull-right" role="button" style="margin-right:10px;">Cancel</a>
                
              </div>
            </form>
          </div>
    
        </div>
    </div>