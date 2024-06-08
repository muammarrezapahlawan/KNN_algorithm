<?php

include('koneksi.php');

//langkah terakhir menghapus histori perhitungan pada database
	                $sqls = mysqli_query($koneksi, "SELECT * FROM sementara ORDER BY id ASC");
	                $numrows1 = mysqli_num_rows($sqls);
	                for ($i=1; $i <= $numrows1; $i++)
	                {

		                mysqli_query($koneksi, "DELETE FROM sementara WHERE id=$i");
	                }


	            $sql_urut = mysqli_query($koneksi, "SELECT * FROM dataset ORDER BY id ASC");
	            $numrows_urut = mysqli_num_rows($sql_urut);
	                for ($i=1; $i <= $numrows_urut; $i++)
	                {
		                mysqli_query($koneksi, "DELETE FROM urut WHERE id=$i");
	                }

                    header("location:perhitungan.php");

?>