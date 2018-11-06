<?php 
require("scripts/author.php");
require("scripts/publishing-company.php");
require("scripts/book.php");
?>
<div class="row">
	<div class="col-sm-12 col-md-12 col-ls-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Register new book</h3>
			</div>

			<form action="#" method="post" role="form">
				<div class="box-body">
					<?php while($displayBook = $sqlBook->fetch(PDO::FETCH_OBJ)){?>
					<div class="col-sm-6 col-md-6 col-ls-12">
						<div class="form-group">
							<label>Author <span class="text-red">*</span> <a href="#" class="text-green" data-toggle="modal" data-target="#author">New Author</a></label>
							<select class="form-control"  name="author" required="required">
								<option value="<?php echo $displayBook->idauthor;?>" selected="selected"><?php echo $displayBook->author;?></option>
								<?php while($displayAuthor = $sqlAuthor->fetch(PDO::FETCH_OBJ)){?>
								<option value="<?php echo $displayAuthor->idauthor;?>"><?php echo $displayAuthor->name;?></option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<label>Publishing company <span class="text-red">*</span><a href="#" class="text-green" data-toggle="modal" data-target="#publishingcompany">New publishing company</a></label>
							<select class="form-control" name="publishingcompany" required="required">
								<option value="<?php echo $displayBook->idpublishingcompany;?>" selected="selected"><?php echo $displayBook->publishingcompany;?></option>
								<?php while($displayPublishingCompany= $sqlPublishingCompany->fetch(PDO::FETCH_OBJ)){?>
								<option value="<?php echo $displayPublishingCompany->idpublishingcompany;?>"><?php echo $displayPublishingCompany->name;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Title <span class="text-red">*</span></label>
							<input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo $displayBook->title;?>" required="required">
						</div>

						<div class="form-group">
							<label>Launch date <span class="text-red">*</span></label>
							<input type="date" name="launchdate" class="form-control" placeholder="Launch date" value="<?php echo $displayBook->launchdate;?>"required="required">
						</div>
						<div class="form-group">
							<label>Language <span class="text-red">*</span></label>
							<input type="text" name="language" class="form-control" placeholder="Language" value="<?php echo $displayBook->language;?>"required="required">
						</div>
					</div>

					<div class="col-sm-6 col-md-6 col-ls-12">
						<div class="form-group">
							<label>ISBN <span class="text-red">*</span></label>
							<input type="number" name="isbn" class="form-control" value="<?php echo $displayBook->isbn;?>" placeholder="ISBN" required="required">
						</div>
						<div class="form-group">
							<label>Edition <span class="text-red">*</span></label>
							<input type="number" name="edition" class="form-control" value="<?php echo $displayBook->edition;?>" placeholder="Edition" required="required">
						</div>
						<div class="form-group">
							<label>Page <span class="text-red">*</span></label>
							<input type="number" name="page" class="form-control" value="<?php echo $displayBook->page;?>" placeholder="Page" required="required">
						</div>
						<div class="form-group">
							<label>Genre <span class="text-red">*</span></label>
							<input type="text" name="genre" class="form-control" value="<?php echo $displayBook->genre;?>" placeholder="Genre" required="required">
						</div>
						<div class="form-group">
							<label>Reading time <span class="text-red">*</span></label>
							<input type="number" name="readingtime" class="form-control" value="<?php echo $displayBook->readingtime;?>" placeholder="Reading time" required="required">
						</div>
					</div>


					<?php } ?>
				</div>
					<div class="box-footer">
						<span class="text-red pull-left">* Required field</span>

						<button type="submit" name="updateBook" class="btn btn-primary pull-right">Update Book</button>
						<a href="/" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</a>
					</div>
			</form>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="author" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
  	<form action="#" method="post">
	    <div class="modal-content">
	      <div class="modal-header bg-green">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Register new author</h4>
	      </div>
	      <div class="modal-body">
				<div class="form-group">
					<label>Name author <span class="text-red">*</span></label>
					<input type="text" name="nameAuthor" class="form-control" placeholder="Name author" >
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" name="registerAuthor" class="btn btn-primary">Register</button>
	      </div>
	    </div>
	</form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="publishingcompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  	<form action="#" method="post">
	    <div class="modal-content">
	      <div class="modal-header bg-green">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Register new publishing company</h4>
	      </div>
	      <div class="modal-body">
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

	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" name="registerPublishingCompany" class="btn btn-primary">Register</button>
	      </div>
	      </div>

	    </div>
	</form>
  </div>
</div>