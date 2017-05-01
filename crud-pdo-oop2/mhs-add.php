<?php
    require_once 'app/model/class.mhs.php';
 
    //Untuk Memanggil Kelas Mahasiswa() 
    $auth_bio = new Mahasiswa();
 
    if (isset($_POST['btn-save'])) {
        $nama   = strip_tags($_POST['nama']);
        $nim  = strip_tags($_POST['nim']);
        $fakultas = strip_tags($_POST['fakultas']);
 
        if ($nama == "") {
            $error[]    = "Nama masih kosong!";
        }
        elseif ($nim == "") {
            $error[]    = "NIM harus di isi. Bila tidak punya nomor cukup di isi Nol saja!";
        }
        elseif (strlen($nim) > 14) {
            $error[]    = "NIM anda tidak valid!";
        }
        elseif ($fakultas == "") {
            $error[]    = "Fakultas masih kosong!";
        }
        else {
            try {
                if ($auth_bio->insertMhs($nama,$nim,$fakultas)) {
                    $auth_bio->redirect('mhs-add.php?saved');
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
 
    //Untuk menampilkan view
    include 'app/view/header.php';
    include 'app/view/menu.php';
    include 'app/view/mhs-add.blade.php';
    include 'app/view/footer.php';
 ?>
