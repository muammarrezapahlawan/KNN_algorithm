<?php  include('section/header.php')?>
<div class="main-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Form Dataset
                    </div>
                    <div class="card-body">

                        <!DOCTYPE html>
                        <html lang="en">

                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Bootstrap 5 Form</title>
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
                                rel="stylesheet">
                        </head>

                        <body>
                            <div class="container mt-1">

                                <form>
                                    <div class="mb-3">

                                        <input type="text" class="form-control" id="umur"
                                            placeholder="Masukan umur balita">
                                    </div>
                                    <div class="mb-3">

                                        <input type="text" class="form-control" id="namabalita"
                                            placeholder="Masukan nama balita">
                                    </div>
                                    <div class="mb-3">



                                        <input type="text" class="form-control" id="beratbalita"
                                            placeholder="Masukan Berat Balita">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Proses</button>
                                </form>
                            </div>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
                            </script>
                        </body>

                        </html>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  include('section/footer.php')?>