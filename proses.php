<?php  include('section/header.php')?>

<div class="main-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Proses Klasifikasi
                    </div>
                    <div class="card-body">


                        <?php include('koneksi.php');

$b_x = $_POST['x'];
$b_y = $_POST['y'];

if (empty($b_x) or empty($b_y))
{
	echo "<script>
				alert('Ada yang belum anda isi');
				window.location = 'javascript:history.go(-1)'; 
		</script>";
}
else
{

    
	//Membaca jumlah baris data pada database
	$sql = mysqli_query($koneksi, "SELECT * FROM dataset ORDER BY id ASC");
	$numrows = mysqli_num_rows($sql);

	//Menentukan nilai K
	/*$k=0.3 * $numrows;
	$k=round($k);
	$r=$k % 2;
	if($r!=0)
	{
		$k=$k+1;
	}
	else
	{
		$k=$k;
	}*/

	$k=5; 

	echo "<b>Nilai K adalah sebesar $k </b><br>";
    echo "Data Baru untuk umur = <b>$b_x </b> dan Berat Badan= <b>$b_y</b> <hr>";

    



                        
    //Perhitungan dengan KNN
	for ($i=1; $i <= $numrows; $i++)
	{	
		$sql1 = mysqli_query($koneksi,"SELECT * FROM dataset Where id = $i");
		while($data = mysqli_fetch_array($sql1))
		{
			//Pengurangan(KNN)
			$v1 = $b_x - $data['umur'];
			$v2 = $b_y - $data['berat_badan'];

            

			
			//Pengkuadratan(KNN)
			$hit1 = (pow($v1,2)) + (pow($v2,2));
			
			//Pengakaran(KNN)
			$hit2 = number_format(sqrt($hit1),2);

            

        
            

            
			
			//Penyimpanan perhitungan ke database sementara
		mysqli_query($koneksi, "INSERT INTO sementara (id,jarak,umur,bb,sts) VALUES ('$i','$hit2','$data[umur]','$data[berat_badan]','$data[target]')");
		}	

    } 
?>

                        <table class="table table-striped table-hover">
                            <h2> Perhitungan Jarak "Euclidean Distance"</h2>
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Jarak </th>
                                    <th scope="col">Umur</th>
                                    <th scope="col">Berat Badan</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>

                            <?php
    $tampildata=mysqli_query($koneksi,"SELECT * FROM sementara");
    $no=1;
    while($tampi=mysqli_fetch_array($tampildata))
    {  ?>



                            <tbody>
                                <tr>
                                    <th scope="row"><?=$no++?></th>
                                    <td><?=$tampi['jarak'];?></td>
                                    <td><?=$tampi['umur']?></td>
                                    <td><?=$tampi['bb']?></td>
                                    <td><?=$tampi['sts']?></td>

                                </tr>

                            </tbody>



                            <?php } ?>

                        </table>


                        <?php

//data yang sudah d sorting dari data pertama sampai data nilai K
	//$sql3 = mysqli_query($koneksi,"SELECT * FROM  sementara ORDER BY  sementara.jarak ASC LIMIT 0 , $k");
    $sql3 = mysqli_query($koneksi,"SELECT * FROM  `sementara` ORDER BY  `sementara`.`jarak` ASC LIMIT 0 , $k  ");
	$x=1;
    $no=1;
	while($data = mysqli_fetch_array($sql3)) 
		{
            
			//memasukkan data yang sudah di sorting mulai dari pertama sampai data nilai k ke dalam database sementara
			mysqli_query($koneksi,"INSERT INTO urut (id,
										jarak,
										umur,
										bb,
										sts)
								VALUES ('$x',
										'$data[jarak]',
										'$data[umur]',
										'$data[bb]',
										'$data[sts]')");
								$x=$x+1;
		} 



                        // $sqlrtes = mysqli_query($koneksi,"SELECT * FROM urut ORDER BY id ASC LIMIT 0, 1");
                        // while($datates = mysqli_fetch_array($sqlrtes))
                        // { 
                    
                        //mencari hasil
                        $sqlrx = mysqli_query($koneksi, "SELECT * FROM urut ORDER BY id ASC ");
                        //$hasil_nam = mysql_fetch_array($sql_nam);
                            ?>

                        <table class="table table-striped table-hover">
                            <h2> Nilai K = <?=$k ?> Tetangga Terdekat</h2>
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Jarak </th>
                                    <th scope="col">Umur</th>
                                    <th scope="col">Berat Badan</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>


                            <?php
                        $no=1;
                        while($datax = mysqli_fetch_array($sqlrx))
                        { ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?=$no++?></th>
                                    <td><?=$datax['jarak'];?></td>
                                    <td><?=$datax['umur']?></td>
                                    <td><?=$datax['bb']?></td>
                                    <td><?=$datax['sts']?></td>

                                </tr>

                            </tbody>

                            <?php } 
                            
                            if($datax['jarak']=='0')
                                {
                                    // $Status = $datax['sts'];
                                    // $x = $datax['umur'];
                                    // $y = $datax['bb'];

                                    echo "<br>Data Baru Terklasifikasi sebagai Kelas <b>Unggulan</b> ";
                                    
                                 }
                                    else
                                 {
                                    // $Status = $datax['sts'];
                                    // $x = $datax['umur'];
                                    // $y = $datax['bb'];

                                    echo "<br>Data Baru Terklasifikasi sebagai Kelas <b>Reguler</b>";
                                    
                                 }
                            
                             ?>
                        </table>

                        <a href="bersih.php" class="btn btn-primary">Hapus</a>

                        <?php
                            
                            
                            
                            
                           
                    // }

                   

             }




                        ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  include('section/footer.php')?>