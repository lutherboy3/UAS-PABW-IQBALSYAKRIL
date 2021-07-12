 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Pelanggan</h3>
						<br/>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Tambah Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['success-edit'])){?>
						<div class="alert alert-success">
							<p>Update Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						<?php 
							if(!empty($_GET['uid'])){
							$sql = "SELECT * FROM pelanggan WHERE kd_pelanggan = ?";
							$row = $config->prepare($sql);
							$row->execute(array($_GET['uid']));
							$edit = $row->fetch();
						?>
						<form method="POST" action="fungsi/edit/edit.php?supplier=edit">
							<table>
								<tr>
									<td style="width:15pc;"><input type="text" class="form-control" value="<?= $edit['supplier'];?>" required name="supplier" placeholder="Masukan supplier Barang Baru">
										<input type="hidden" name="id" value="<?= $edit['id_supplier'];?>">
									</td>
									<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah Data</button></td>
								</tr>
							</table>
						</form>
						<?php }else{?>
						<form method="POST" action="fungsi/tambah/tambah.php?pelanggan=tambah">
							<table>
								<tr>
									<td style="width:15pc;"><input type="text" class="form-control" name="pelanggan" placeholder="Masukan Pelanggan Baru"></td>
									<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button></td>
									<td style="padding-left:10px;">
										
									</td>
								</tr>
								
							</table>
						</form>
						<a href="print_pelanggan.php?nm_member=<?php echo $_SESSION['admin']['nm_member'];?>
										" target="_blank">
										<button class="btn btn-default">
											<i class="fa fa-print"></i> Print Data Pelanggan
										</button></a>
						<?php }?>
						<br/>
						<table class="table table-bordered" id="example1">
							<thead>
								<tr style="background:#DFF0D8;color:#333;">
									<th>No.</th>
									<th>Nama Pelanggan</th>
									<th>Alamat</th>
									<th>Contact</th>
									<!-- <th>Aksi</th> -->
								</tr>
							</thead>
							<tbody>
							<?php 
								$hasil = $lihat -> pelanggan();
								$no=1;
								foreach($hasil as $isi){
							?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $isi['nama_pelanggan'];?></td>
									<td><?php echo $isi['alamat'];?></td>
									<td><?php echo $isi['contact'];?></td>
									<!-- <td>
										<a href="index.php?page=supplier&uid=<?php echo $isi['id_supplier'];?>"><button class="btn btn-warning">Edit</button></a>
										<a href="fungsi/hapus/hapus.php?supplier=hapus&id=<?php echo $isi['id_supplier'];?>" onclick="javascript:return confirm('Hapus Data supplier ?');"><button class="btn btn-danger">Hapus</button></a>
									</td> -->
								</tr>
							<?php $no++; }?>
							</tbody>
						</table>
						<div class="clearfix" style="padding-top:16%;"></div>
				  </div>
              </div>
          </section>
      </section>
	
