<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
            <h1 class="page-header">Manajemen Data Mahasiswa</h1>
            <ol class="breadcrumb">
                <li class="active">Halaman Awal</li>
            </ol>
        </div>
    </div>
 
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php
                    if (isset($_GET['saved'])) {
                        ?>
                        <div class="alert alert-success">
                            <i class="glyphicons glyphicons-log-in"></i>&nbsp;Data Berhasil Disimpan!
                        </div>
                        <?php
                    }
                    elseif (isset($_GET['deleted'])) {
                       ?>
                        <div class="alert alert-warning">
                            Data Berhasil di Hapus :)
                        </div>
                        <?php
                   }
                ?>
            </div>
 
            <div class="col-md-4">
                <button class="btn btn-primary" type="button" onclick="location.href='mhs-add.php'"><span class="glyphicon glyphicon-plus-sign"></span>Tambah Data Mahasiswa</button>
            </div>
            <div class="page-header"></div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="data" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr bgcolor="grey">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Fakultas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <tr>
                                <?php for ($i=0; $i < count($result); $i++) {
                                    echo "<td>".$no++."</td>";
                                    echo $result[$i]."</tr>";
                                } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
 
<br>
