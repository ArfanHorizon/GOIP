    <?php
    include '../control/koneksi.php';
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                <?php $sql = mysqli_query($koneksi, "SELECT COUNT(nama) AS total FROM user"); ?>
                <?php while ($a = mysqli_fetch_array($sql)) { ?>
                  <div class="count"><?php echo $a['total']; ?></div>
                <?php } ?>
              </h3>

              <p>Data User</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a id="info_user" style="cursor: pointer;" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                <?php $sql = mysqli_query($koneksi, "SELECT COUNT(tujuan) AS total FROM tujuan"); ?>
                <?php while ($a = mysqli_fetch_array($sql)) { ?>
                  <div class="count"><?php echo $a['total']; ?></div>
                <?php } ?>
              </h3>

              <p>Data Tujuan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a id="info_tujuan" style="cursor: pointer;" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
                <?php $sql = mysqli_query($koneksi, "SELECT COUNT(id_pengiriman) AS total FROM pengiriman"); ?>
                <?php while ($a = mysqli_fetch_array($sql)) { ?>
                  <div class="count"><?php echo $a['total']; ?></div>
                <?php } ?>
              </h3>

              <p>Data pengiriman</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a id="indo_pengiriman" style="cursor: pointer;" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->