<?php
    require_once 'database.php';
 
    /**
     * Pada Class Mahasiswa terdapat perintah INSERT, UPDATE, dan DELETE
     */
    class Mahasiswa
    {
        private $conn;
        public function __construct()
	/**
	* _construct(), Perintah untuk memanggil Class Database yang sebelumnya telah dibuat dan dipanggil disini untuk melakukan eksekusi INSERT, UPDATE, DELETE.
    */
        {
            $database   = new Database();
            $db         = $database->dbConnection();
            $this->conn = $db;
        }

 
        public function runQuery($sql)
	/**
	* runQuery($sql), Perintah untuk menjalankan perintah SQL yang nanti akan digunakan.
    */
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

 
        public function insertMhs($nama, $nim, $fakultas)
    /**
    * insertBio, Perintah untuk menambah Mahasiswa
    */
        {
            try {
                $stmt = $this->conn->prepare(
                        "INSERT INTO Mahasiswa(nama,nim,fakultas)
                        VALUES(:nama,:nim,:fakultas)"
                    );
                $stmt->bindParam(':nama', $nama);
                $stmt->bindParam(':nim', $nim);
                $stmt->bindParam(':fakultas', $fakultas);
                $stmt->execute();
 
                return $stmt;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
 
        public function updateMhs($nama, $nim, $fakultas, $imhs)
    /**
    * updateBio, Perintah untuk mengupdate/edit Mahasiswa
    */
        {
            try {
                $stmt = $this->conn->prepare(
                        "UPDATE Mahasiswa
                        SET nama=:nama,
                            nim=:nim,
                            fakultas=:fakultas
                        WHERE id_mhs=:imhs"
                    );
                $stmt->bindParam('nama', $nama);
                $stmt->bindParam('nim', $nim);
                $stmt->bindParam('fakultas', $fakultas);
                $stmt->bindParam('imhs', $imhs);
                $stmt->execute();
 
                return $stmt;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
 
        public function deleteMhs($imhs)
    /**
    * deleteBio, Perintah untuk menghapus Mahasiswa
    */
        {
            if (isset($_GET['delete_imhs'])) {
                $stmt = $this->conn->prepare(
                        "DELETE FROM Mahasiswa WHERE id_mhs=:imhs"
                    );
                $stmt->bindParam('imhs', $_GET['delete_imhs']);
                $stmt->execute();
 
                return $stmt;
            }
        }
 
        public function redirect($url, $statusCode = 303)
	/**
	* redirect(), Perintah hanya digunakan untuk memanggil url yang dituju.
    */
        {
            header('Location: ' . $url, true, $statusCode);
            die();
        }
    }
 ?>