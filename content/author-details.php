<?php require("scripts/author.php");?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-ls-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Author details</h3>
            </div>
            <?php while($displayAuthor = $sqlAuthor->fetch(PDO::FETCH_OBJ)){?>
            <form action="#" method="post" >
              <div class="box-body col-sm-12 col-md-12 col-ls-12">
                <div class="form-group col-sm-3 col-md-3 col-ls-12">
                  <label>Name <span class="text-red">*</span></label>
                  <input type="text" class="form-control" name="nameAuthor" value="<?php echo $displayAuthor->name;?>">
                </div>
              </div>
              <div class="box-footer ">
              	<span class="text-red pull-left">* Required field</span>
                <button type="submit" name="updateAuthor" class="btn btn-primary pull-right">Register</button>
                <a href="/" class="btn btn-default pull-right" role="button" style="margin-right:10px;">Cancel</a>
              </div>
            </form>
            <?php } ?>
          </div>
    
        </div>
    </div>