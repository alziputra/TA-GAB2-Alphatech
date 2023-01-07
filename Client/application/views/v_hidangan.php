<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View | Hidangan</title>

    <!-- import font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- import file "style.css" -->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css") ?>" />


</head>

<body>
    <!-- BUAT AREA MENU -->
    <nav class="area-menu">
        <button id="btn_tambah" class="btn-primary">Add Data</button>
        <button id="btn_refresh" class="btn-secondary">Refresh Data</button>
    </nav>

    <!-- buat area table -->
    <table>
        <thead>
            <tr>
                <!-- judul tabel -->
                <th style="width: 5%" ;>No.</th>
                <th style="width: 10%" ;>Nama</th>
                <th style="width: 50%" ;>Harga</th>
                <th style="width: 15%" ;>Foto</th>
                <th style="width: 10%" ;>Aktif</th>
                <th style="width: 10%" ;>Aksi</th>
            </tr>
        </thead>

        <!-- isi tabel -->
        <tbody>
            <!-- proses looping data -->
            <?php
            // set nilai awal no
            $no = 1;
            foreach ($tampil->hidangan as $result) {
            ?>
                <tr>
                    <td class="text-center"> <?php echo $no; ?></td>
                    <td class="text-center"> <?php echo $result->nama_hidangan; ?></td>
                    <td class="text-center"> <?php echo $result->harga_hidangan; ?></td>
                    <td class="text-center"> <?php echo $result->foto_hidangan; ?></td>
                    <td class="text-center"> <?php echo $result->aktif_hidangan; ?></td>
                    <td class="text-center">
                        <nav class="area-aksi">
                            <button class="btn-ubah" id="btn_ubah" title="Ubah Data"><i class="fa-regular fa-pen-to-square"></i></button>

                            <button class="btn-hapus" id="btn_hapus" title="Hapus Data"><i class="fa-solid fa-trash-can"></i></button>
                        </nav>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>

    <!-- import font awesome (js)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



</body>

</html>