<div class="row">
<?php while($displayRent = $sqlBookRent->fetch(PDO::FETCH_OBJ)){?>
<div class="col-sm-4 col-md-4 col-ls-12">
<div class="info-box bg-aqua">
<span class="info-box-icon"><i class="fa fa-book"></i></span>
<div class="info-box-content">
<span class="info-box-text"><?php echo $displayRent->title;?></span>
<div class="progress">
</div>
<span class="progress-description" style="margin-top:20px;line-height:20px;">
<?php echo "Return to ".date("d-m-Y", strtotime($displayRent->returndate));?>                                  
</span>
</div>
</div>
</div>
<?php } ?>
</div>