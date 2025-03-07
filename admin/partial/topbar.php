<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                 <?php
                        include "koneksi.php" ;

                        $sqla=mysqli_query($koneksi,"select count(nidn) as jum from pendaftaransk where keterangan='Diproses'");
                        $sqlb = mysqli_fetch_array($sqla);

                        $sqlc=mysqli_query($koneksi,"select count(nidn) as jum1 from pendaftaranskpengabdian where keterangan='Diproses'");
                        $sqld = mysqli_fetch_array($sqlc);


                  ?>
                <span class="badge badge-danger badge-counter"><?php
                  $jum=$sqlb['jum'];
                  $jum1=$sqld['jum1'];

                  $jumlah= $jum + $jum1 ;

                 echo $jumlah ; ?></span>
              
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Pemberitahuan
                </h6>
                <?php 
                 $datad = mysqli_query($koneksi,"select * from pendaftaransk where keterangan='Diproses'");
                  while($data = mysqli_fetch_array($datad)){
                  ?>
                <a class="dropdown-item d-flex align-items-center" href="pengajuanskpenelitian.php">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo $data['tanggal'];?> oleh 
                     <?php
                        $nidn=$data['nidn'];

                        $sqla=mysqli_query($koneksi,"select * from dosen where nidn='$nidn'");
                        while($sqlb = mysqli_fetch_array($sqla)){
                        echo $sqlb['nama'] ;
                      } ?></div>
                    <span class="font-weight-bold"><?php echo $data['judul'];?></span>
                  </div>
                </a>
              <?php } ?>
              <?php 
                 $datad = mysqli_query($koneksi,"select * from pendaftaranskpengabdian where keterangan='Diproses'");
                  while($data = mysqli_fetch_array($datad)){
                  ?>
                <a class="dropdown-item d-flex align-items-center" href="pengajuanskpengabdian.php">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo $data['tanggal'];?> oleh 
                     <?php
                        $nidn=$data['nidn'];
                        $sqla=mysqli_query($koneksi,"select * from dosen where nidn='$nidn'");
                        while($sqlb = mysqli_fetch_array($sqla)){
                        echo $sqlb['nama'] ;
                      } ?></div>
                    <span class="font-weight-bold"><?php echo $data['judul'];?></span>
                  </div>
                </a>
              <?php } ?>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo  $_SESSION['nama']; ?></span>
                <img class="img-profile rounded-circle" src="../tempat/<?php echo  $_SESSION['foto']; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>