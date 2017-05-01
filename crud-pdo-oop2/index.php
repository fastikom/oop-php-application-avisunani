<?php
    require_once 'app/model/class.mhs.php';
 
    $auth_bio   = new Mahasiswa();
 
    //Untuk Menampilkan Data pada Tabel
    $stmt = $auth_bio->runQuery("SELECT * FROM mahasiswa");
    $stmt->execute();
 
    $result = null;
    if ($stmt->rowCount() == 0) {
    }
    else {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[]   = "<td>".$row['nama']."</td><td>".$row['nim']."</td><td>".$row['fakultas']."</td><td>
                                                                   <a class='btn btn-info' href='mhs-edit.php?edit_imhs=".$row['id_mhs']."'><span class='glyphicon glyphicon-edit'></span> Edit</a>
                                                                   <a class='btn btn-danger' href='?delete_imhs=".$row['id_mhs']."'><span class='glyphicon glyphicon-remove-circle'></span> Delete</a>
                                                               </td>";
        }
    }
 
    //Eksekusi Untuk Menghapus Data
    if (isset($_GET['delete_imhs'])) {
        try {
            if ($auth_bio->deleteMhs($imhs)) {
                $auth_bio->redirect('index.php?deleted');
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
     
    //Untuk Menampilkan View (Sebelumnya telah dibuat)
    include 'app/view/header.php';
    include 'app/view/menu.php';
    include 'app/view/index.php';
    include 'app/view/footer.php';
 ?>
