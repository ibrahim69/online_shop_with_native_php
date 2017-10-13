<?php

    if ($user_id == false ) {
        $_SESSION["proses_pesanan"] = true;

        header("location: ".BASE_URL."index.php?page=login");
        exit;
    }
 ?>

<div id="frame_data_pengiriman">
	<h3 class='label_data_pengiriman'> Alamat pengiriman barang </h3>

	<div id="frame_from_pengiriman_barang">
		<form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="post">
			<div class="element_form">
		      <label>Nama Penerima</label>
		      <span><input type="text" name="nama_penerima"></span>
		    </div>

		    <div class="element_form">
		      <label>Nomor Telepon</label>
		      <span><input type="text" name="nomor_telepon"></span>
		    </div>

			<div class="element_form">
		      <label>Alamat Pengiriman</label>
		      <span><textarea name="alamat"></textarea></span>
		    </div>

		    <div class="element_form">
		      <label>Kota</label>
		      <span>
		      	<select name="kota">
			      	<?php
			      		$query = mysqli_query($koneksi, "SELECT * FROM kota ORDER BY kota ASC");

			      		while ($row=mysqli_fetch_assoc($query)) {
			      		    echo "<option value='$row[kota_id]'>$row[kota] (".rupiah($row['tarif']).")</option>";
			      		}
			      	?>
		      	</select>
		      </span>
		    </div>

		    <div class="element_form">
		      <span><input type="submit" value="submit"></span>
		    </div>

		</form>
	</div>
</div>

<div id="frame_data_detail">
	<h3 class='label_data_pengiriman'>Detail Order</h3>

	<div id="frame_detail_order">

		<table class="table_list">
			<tr>
				<th class="kiri">Nama Barang</th>
				<th class="tengah">Qty</th>
				<th class="kanan">Total</th>
			</tr>

			<?php

				$subtotal = 0;

				foreach ($keranjang as $key => $value) {
					
					$barang_id = $key;

					$nama_barang = $value['nama_barang'];
					$harga = $value['harga'];
					$quantity = $value['quantity'];

					$total = $quantity * $harga;
					$subtotal = $subtotal + $total;

					echo "<tr>
							<td class='kiri'>$nama_barang</td>
							<td class='tengah'>$quantity</td>
							<td class='kanan'>".rupiah($total)."</td>
						</tr>";
				}

				echo "<tr>
							<td colspan='2' class='kanan'><b>Sub Total</b></td>
							<td class='kanan'><b>".rupiah($subtotal)."</b></td>
						</tr>";
			?>
		</table>

	</div>

</div>