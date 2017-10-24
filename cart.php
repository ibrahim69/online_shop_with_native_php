<?php

	if ($totalBarang == 0) {
		echo "<h3>Saat ini belum ada data di dalam keranjang belanja anda</h3>";
	} else {
		
		$no = 1;

		echo "<table class='table_list'>
					<tr class='title'>
						<th class='tengah'>No </th>
						<th class='kiri'>Image </th>
						<th class='kiri'>Nama Barang </th>
						<th class='tengah'>Qty </th>
						<th class='kanan'>Harga Satuan </th>
						<th class='kanan'>Total </th>
					</tr>";

		$subtotal = 0;

		foreach ($keranjang as $key => $value) {
			$barang_id = $key;

			$nama_barang = $value["nama_barang"];
			$quantity = $value["quantity"];
			$gambar = $value["gambar"];
			$harga = $value["harga"];

			$total = $quantity * $harga;
			$subtotal = $subtotal + $total;

			echo "<tr>
					<td class='tengah'>$no</td>
					<td class='kiri'><img src='".BASE_URL."images/barang/$gambar' height='100px'></td>
					<td class='kiri'>$nama_barang</td>
					<td class='tengah'><input type='text' name='$barang_id' value='$quantity' class='update_quantity'></td>
					<td class='kanan'>".rupiah($harga)."</td>
					<td class='kanan hapus_item'>".rupiah($total)." <a href='".BASE_URL."hapus_item.php?barang_id=$barang_id'>X</a></td>
				</tr>";

		}
			echo "<tr>
					<td colspan='5' class='kanan'><b>Sub Total</b></td>
					<td class='kanan'><b>".rupiah($subtotal)."</b></td>
				</tr>";

			$no++;

		echo "</table>";

		echo "<div id='frame_button_keranjang'>
				<a id='lanjut_belanja' href='".BASE_URL."index.php'>< Lanjut Belanja</a>
				<a id='lanjut_pemesanan' href='".BASE_URL."data-pemesan.html'>Lanjut Pesanan ></a>
			</div>";
	}

?>

<script>

	$(".update_quantity").on("input", function (e) {
		var barang_id = $(this).attr("name");
		var value = $(this).val();

		$.ajax({
			method: "POST",
			url: "update_cart.php",
			data: "barang_id="+ barang_id +"&value="+value
		})

		.done(function (data) {
			location.reload();
		})
	})

</script>