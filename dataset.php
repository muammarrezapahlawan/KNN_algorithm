<?php  include('section/header.php')?>






<div class="main-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Dataset
                    </div>
                    <div class="card-body">
                        <a href="tambah_dataset.php" class="btn btn-primary mb-2"> + Tambah</a>

                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Umur </th>
                                    <th scope="col">Berat Badan</th>
                                    <th scope="col">Target</th>
                                    <th scope="col">Aksi</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php 
		                include 'koneksi.php';
		                $no = 1;
		                $data = mysqli_query($koneksi,"select * from dataset");
		                while($d = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                    <th scope="row"><?=$no++; ?></th>
                                    <td><?=$d['umur']?></td>
                                    <td><?=$d['berat_badan'];?></td>
                                    <td><?=$d['target'];?></td>
                                    <td></td>

                                </tr>

                            </tbody>
                            <?php } ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  include('section/footer.php')?>