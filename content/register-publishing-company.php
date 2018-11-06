<?php require("scripts/publishing-company.php");?>
<div class="row">
	<div class="col-sm-12 col-md-12 col-ls-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Register new publishing company</h3>
			</div>

			<form action="#" method="post" role="form">
				<div class="box-body">

					<div class="col-sm-6 col-md-6 col-ls-12">
						<div class="form-group">
							<label>Name <span class="text-red">*</span></label>
							<input type="text" class="form-control" name="name" placeholder="Name" required="required">
						</div>

						<div class="form-group">
							<label>Address <span class="text-red">*</span></label>
							<input type="text" name="address" class="form-control" placeholder="Address" required="required">
						</div>
						<div class="form-group">
							<label>Neighbor hood <span class="text-red">*</span></label>
							<input type="text" name="neighborhood" class="form-control" placeholder="Neighbor hood" required="required">
						</div>
						<div class="form-group">
							<label>Number <span class="text-red">*</span></label>
							<input type="number" name="number" class="form-control" placeholder="Number" required="required">
						</div>
					</div>

					<div class="col-sm-6 col-md-6 col-ls-12">

						<div class="form-group">
							<label>City <span class="text-red">*</span></label>
							<input type="text" name="city" class="form-control" placeholder="City" required="required">
						</div>
						<div class="form-group">
							<label>Zip Code <span class="text-red">*</span></label>
							<input type="number" name="zipcode" class="form-control" placeholder="Zip Code" required="required">
						</div>
						<div class="form-group">
							<label>Cnpj <span class="text-red">*</span></label>
							<input type="text" name="cnpj" class="form-control" placeholder="Cnpj" required="required">
						</div>
					</div>

				</div>
					<div class="box-footer col-sm-12 col-md-12 col-ls-12">
						<span class="text-red pull-left">* Required field</span>

						<button type="submit" name="registerPublishingCompany" class="btn btn-primary pull-right">Registrer</button>
						<a href="/" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</a>
					</div>
			</form>
		</div>
	</div>
</div>