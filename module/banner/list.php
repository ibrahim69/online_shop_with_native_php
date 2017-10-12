<div id="frame_tambah">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=banner&action=form"; ?>" class="tombol_action">+ Tambah Banner</a>
</div>

<?php

	// get data all table category
	// join between table barang and table kategori --> https://www.w3schools.com/sql/sql_join.asp 
	$query = mysqli_query( $koneksi, "SELECT * FROM banner" );

	if (mysqli_num_rows($query) == 0 ) {
		echo "<h3> Saat ini belum ada banner di dalam tabel banner </h3>";
	} else {
		echo "<table class='table_list'>";

		echo "<tr class='title'>
				<th class='kolom_nomor'> No </th>
				<th class='kiri'> Banner </th>
				<th class='kiri'> Link </th>
				<th class='tengah'> Status </th>
				<th class='tengah'> Action </th>
			</tr>";

		$no = 1;

		while ( $row=mysqli_fetch_assoc($query) ) {
		    
		    echo "<tr>
						<td class='kolom_nomor'>$no</td>
						<td class='kiri'>$row[banner]</td>
						<td class='kiri'>
							<a href='".BASE_URL."index.php?page=detail&barang=$row[link]'>$row[link]</a>
						</td>
						<td class='tengah'>$row[status]</td>
						<td class='tengah'>
							<a href='".BASE_URL."index.php?page=my_profile&module=banner&action=form&banner_id=$row[banner_id]' class='tombol_action'>Edit</a>
						</td>
		    	</tr>";

		  $no++;
		}
		
		echo "</table>";
	}

?>