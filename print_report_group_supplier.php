<?php 
    session_start();
	require 'config.php';
	include $view;
	$lihat = new view($config);
	$toko = $lihat -> toko();
	$nm_member = $_SESSION['admin']['nm_member'];
	$daftar_supplier = $lihat -> supplier();
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
						<p>Telp : <?php echo $toko['tlp'];?></p>
						<p>Tanggal : <?php  echo date("j F Y, G:i");?></p>
						<p>Laporan Data Transaksi</p>
					</center>
					<?php foreach($daftar_supplier as $isi_supplier){
					$hsl = $lihat -> all_report($isi_supplier['supplier']);
					echo "Nama Supplier : ".$isi_supplier['supplier'];
					?>
					<table class="table table-bordered" style="width:100%;">
						<tr>
							<td>No.</td>
							<td>Supplier</td>
							<td>Kode</td>
							<td>Produk</td>
							<td>Qty</td>
							<td>Harga</td>
							<td>Disc</td>
							<td>Subtotal</td>
						</tr>
						<?php $no=1; foreach($hsl as $isi){
							$sub_ttl = $isi['subtotal']
							?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $isi['supplier'];?></td>
							<td><?php echo $isi['id_barang'];?></td>
							<td><?php echo $isi['nama_barang'];?></td>
							<td><?php echo $isi['jumlah'];?></td>
							<td><?php echo $isi['harga_jual'];?></td>
							<td><?php echo $isi['disc'];?></td>
							<td><?php echo number_format($sub_ttl);?>,-</td>
						</tr>
						
						<?php $total +=$isi['subtotal']; $no++; }?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><?php echo number_format($total);?>,-</td>
						</tr>
					</table>
					<?php $grand_total += $total; $total=0; $sub_ttl=0;} ?>
					<div class="pull-right">
						<b>Grand Total : Rp. <?php echo number_format($grand_total);?>,-</b>
						<br/><br/>
						<?php $hasil = $lihat -> jumlah(); ?>
						Pekanbaru <?php echo date('Y-m-d H:i:s');?>
						<br/>
						Print By : Raja
					</div>
					<div class="clearfix"></div>
					<center>
						<p>Laporan Data Transaksi</p>
					</center>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</body>
</html>
