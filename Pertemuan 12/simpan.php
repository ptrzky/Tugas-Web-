<?php

    if (isset($_POST['bsimpan'])) {
        //Include file koneksi, untuk koneksikan ke database
        include 'index.php';
        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ekstensi_diperbolehkan	= array('png','jpg');
            $gambar = $_FILES['tgambar']['tname'];
            $x = explode('.', $gambar);
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['tgambar']['tname'];

            if (!empty($gambar)){
                if (in_array($ekstensi, $ekstensi_diperbolehkan) === true){
    
                    //Mengupload gambar
                    move_uploaded_file($file_tmp, 'gambar/'.$gambar);

                    $sql="insert into gambar (gambar) values ('$gambar')";

                    $simpan=mysqli_query($kon,$sql);

                    if ($simpan) {
                        header("Location:index.php?add=berhasil");
                    }
                    else {
                        header("Location:index.php?add=gagal");
                    }                   
                }
            }else {
                $gambar="bank_default.png";
            }
        }
    }
?>