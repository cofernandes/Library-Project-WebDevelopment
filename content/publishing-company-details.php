<?php require("scripts/publishing-company.php");?>
<div class="row">
	<div class="col-sm-12 col-md-12 col-ls-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Details publishing company</h3>
			</div>

			<form action="#" method="post" role="form">
				<div class="box-body">
					<?php while($displayPublishingCompany = $sqlPublishingCompany->fetch(PDO::FETCH_OBJ)){?>
					<div class="col-sm-6 col-md-6 col-ls-12">
						<div class="form-group">
							<label>Name <span class="text-red">*</span></label>
							<input type="text" class="form-control" name="name" value="<?php echo $displayPublishingCompany->name;?>" placeholder="Name" required="required">
						</div>

						<div class="form-group">
							<label>Address <span class="text-red">*</span></label>
							<input type="text" name="address" class="form-control" value="<?php echo $displayPublishingCompany->address;?>" placeholder="Address" required="required">
						</div>
						<div class="form-group">
							<label>Neighbor hood <span class="text-red">*</span></label>
							<input type="text" name="neighborhood" class="form-control" value="<?php echo $displayPublishingCompany->neighborhood;?>" placeholder="Neighbor hood" required="required">
						</div>
						<div class="form-group">
							<label>Number <span class="text-red">*</span></label>
							<input type="number" name="number" class="form-control" value="<?php echo $displayPublishingCompany->number;?>" placeholder="Number" required="required">
						</div>
					</div>

					<div class="col-sm-6 col-md-6 col-ls-12">

						<div class="form-group">
							<label>City <span class="text-red">*</span></label>
							<input type="text" name="city" class="form-control" value="<?php echo $displayPublishingCompany->city;?>" placeholder="City" required="required">
						</div>
						<div class="form-group">
							<label>Zip Code <span class="text-red">*</span></label>
							<input type="number" name="zipcode" class="form-control" value="<?php echo $displayPublishingCompany->zipcode;?>" placeholder="Zip Code" required="required">
						</div>
						<div class="form-group">
							<label>Cnpj <span class="text-red">*</span></label>
							<input type="text" name="cnpj" class="form-control" value="<?php echo $displayPublishingCompany->cnpj;?>" placeholder="Cnpj" required="required">
						</div>
					</div>
					<?php } ?>
				</div>
					<div class="box-footer col-sm-12 col-md-12 col-ls-12">
						<span class="text-red pull-left">* Required field</span>

						<button type="submit" name="updatePublishingCompany" class="btn btn-primary pull-right">Update</button>
						<a href="/" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</a>
					</div>
			</form>
		</div>
	</div>
</div>