<div id="frame_tambah">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=form"; ?>" class="tombol_action">+ Tambah Barang</a>
</div>

<?php

	// get data all table category
	// join between table barang and table kategori --> https://www.w3schools.com/sql/sql_join.asp 
	$query = mysqli_query( $koneksi, "SELECT barang.*, kategori.kategori FROM barang INNER JOIN kategori ON barang.kategori_id=kategori.kategori_id ORDER BY nama_barang ASC" );

	if (mysqli_num_rows($query) == 0 ) {
		echo "<h3> Saat ini belum ada barang di dalam tabel barang </h3>";
	} else {
		echo "<table class='table_list'>";

		echo "<tr class='title'>
				<th class='kolom_nomor'> No </th>
				<th class='kiri'> Barang </th>
				<th class='kiri'> Kategori </th>
				<th class='kiri'> Harga </th>
				<th class='tengah'> Status </th>
				<th class='tengah'> Action </th>
			</tr>";

		$no = 1;

		while ( $row=mysqli_fetch_assoc($query) ) {
		    
		    echo "<tr>
						<td class='kolom_nomor'>$no</td>
						<td class='kiri'>$row[nama_barang]</td>
						<td class='kiri'>$row[kategori]</td>
						<td class='kiri'>".rupiah($row["harga"])."</td>
						<td class='tengah'>$row[status]</td>
						<td class='tengah'>
							<a href='".BASE_URL."index.php?page=my_profile&module=barang&action=form&barang_id=$row[barang_id]' class='tombol_action'>Edit</a>
						</td>
		    	</tr>";

		  $no++;
		}
		
		echo "</table>";
	}

?>