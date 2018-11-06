
<?php if($profileUser == "root"){?>
 <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Reserved books</span>
              <span class="info-box-number"><?php echo $tSqlReservedBook;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Leased books</span>
              <span class="info-box-number"><?php echo $tSqlLeasedBook;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-hourglass-end"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Delayed deliveries</span>
              <span class="info-box-number"><?php echo $tSqlDelayedDeliveries;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Deliveries on time</span>
              <span class="info-box-number"><?php echo $tSqlDeliveriesOnTime;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

<?php }else{?>
<div class="row">
  <a href="/display-book-rent">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Rent books</span>
          <span class="info-box-number"><?php echo $tSqlBookRent;?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  </a>
</div>
<?php } ?>