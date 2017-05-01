<?php
    require_once 'app/model/class.mhs.php';
 
    //Untuk Memanggil Kelas Mahasiswa()
    $auth_bio = new Mahasiswa();
 
    //Mengambil id_mhs untuk menampilkan semua data di form Edit
    if (isset($_GET['edit_imhs']) && !empty($_GET['edit_imhs'])) {
        $imhs       = $_GET['edit_imhs'];
        $stmt_edit  = $auth_bio->runQuery("SELECT * FROM mahasiswa WHERE id_mhs=:imhs");
        $stmt_edit->execute(array(':imhs'=>$imhs));
        $edit_row   = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    }
    else {
        $auth_bio->redirect('index.php');
    }
 
    //Mengeksekusi data untuk di update
    if (isset($_POST['btn-update'])) {
        $nama   = $_POST['nama'];
        $nim  = $_POST['nim'];
        $fakultas = $_POST['fakultas'];
 
        if ($nama == "") {
            $error[]    = "Nama masih kosong!";
        }
        elseif ($nim == "") {
            $error[]    = "Telepon masih kosong!";
        }
        elseif (strlen($nim) > 14) {
            $error[]    = "Nomor telepon tidak valid!";
        }
        elseif ($fakultas == "") {
            $error[]    = "fakultas masih kosong!";
        }
        else {
            try {
                if ($auth_bio->updateMhs($nama, $nim, $fakultas, $imhs)) {
                    $auth_bio->redirect('index.php?saved');
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
 
 
    //Untuk menampilkan view
    include 'app/view/header.php';
    include 'app/view/menu.php';
    include 'app/view/mhs-edit.blade.php';
    include 'app/view/footer.php';
 ?>
