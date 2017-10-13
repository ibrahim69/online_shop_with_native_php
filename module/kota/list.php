<div id="frame_tambah">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=form"; ?>" class="tombol_action">
		+ Tambah Kota
	</a>
</div>

<?php

	// get data all table category
	$query = mysqli_query( $koneksi, "SELECT * FROM kota" );

	if (mysqli_num_rows($query) == 0 ) {
		echo "<h3> Saat ini belum ada nama kota di dalam tabel kota </h3>";
	} else {
		echo "<table class='table_list'>";

		echo "<tr class='title'>
				<th class='kolom_nomor'> No </th>
				<th class='kiri'> Kota </th>
				<th class='kiri'> Tarif </th>
				<th class='tengah'> Status </th>
				<th class='tengah'> Action </th>
			</tr>";

		$no = 1;

		while ( $row=mysqli_fetch_assoc($query) ) {
		    
		    echo "<tr>
						<td class='kolom_nomor'>$no</td>
						<td class='kiri'>$row[kota]</td>
						<td class='kiri'>".rupiah($row["tarif"])."</td>
						<td class='tengah'>$row[status]</td>
						<td class='tengah'>
							<a href='".BASE_URL."index.php?page=my_profile&module=kota&action=form&kota_id=$row[kota_id]' class='tombol_action'>Edit</a>
						</td>
		    	</tr>";

		  $no++;
		}
		
		echo "</table>";
	}

?>