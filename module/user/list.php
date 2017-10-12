<?php

	// get data all table category
	// join between table barang and table kategori --> https://www.w3schools.com/sql/sql_join.asp 
	$query = mysqli_query( $koneksi, "SELECT * FROM user" );

	if (mysqli_num_rows($query) == 0 ) {
		echo "<h3> Saat ini belum ada user di dalam tabel user </h3>";
	} else {
		echo "<table class='table_list'>";

		echo "<tr class='title'>
				<th class='kolom_nomor'> No </th>
				<th class='kiri'> Nama </th>
				<th class='kiri'> Email </th>
				<th class='kiri'> Phone </th>
				<th class='kiri'> Level </th>
				<th class='tengah'> Status </th>
				<th class='tengah'> Action </th>
			</tr>";

		$no = 1;

		while ( $row=mysqli_fetch_assoc($query) ) {
		    
		    echo "<tr>
						<td class='kolom_nomor'>$no</td>
						<td class='kiri'>$row[nama]</td>
						<td class='kiri'>$row[email]</td>
						<td class='kiri'>$row[phone]</td>
						<td class='kiri'>$row[level]</td>
						<td class='tengah'>$row[status]</td>
						<td class='tengah'>
							<a href='".BASE_URL."index.php?page=my_profile&module=user&action=form&user_id=$row[user_id]' class='tombol_action'>Edit</a>
						</td>
		    	</tr>";

		  $no++;
		}
		
		echo "</table>";
	}

?>