<?php 
	require 'config.php';
	include $view;
	$lihat = new view($config);
	$toko = $lihat -> toko();
	$hsl = $lihat -> supplier_report();
?>
<html>
	<head>
		<title>.</title>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
	</head>
	<body>
		<script>window.print();</script>
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<center>
						<p><?php echo $toko['nama_toko'];?></p>
						<p><?php echo $toko['alamat_toko'];?></p>
						<p>Tanggal : <?php  echo date("j F Y, G:i");?></p>
						<p>Laporan Data Supplier</p>
					</center>
					<table class="table table-bordered" style="width:100%;">
						<tr>
							<td>No.</td>
							<td>Kode Supplier</td>
							<td>Nama Supplier</td>
							<td>Alamat</td>
							<td>Contact</td>
						</tr>
						<?php $no=1; foreach($hsl as $isi){?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $isi['id_supplier'];?></td>
							<td><?php echo $isi['supplier'];?></td>
							<td><?php echo $isi['alamat'];?></td>
							<td><?php echo $isi['contact'];?></td>
						</tr>
						<?php $no++; }?>
					</table>
					<div class="pull-right">
						<?php $hasil = $lihat -> jumlah(); ?>
						Pekanbaru <?php echo date('Y-m-d H:i:s');?>
						<br/>
						Print By : Raja
					</div>
					<div class="clearfix"></div>
					<center>
						<p>Laporan Data Supplier</p>
					</center>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>
