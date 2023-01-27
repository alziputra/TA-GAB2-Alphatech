<body>
    <!-- area button -->
    <nav class="area-button">
        <button id="btn-lihat" class="btn-primary">Lihat Data</button>
        <button id="btn-refresh" class="btn-secondary" onclick="return setRefresh()">Refresh Data</button>
    </nav>

    <script src="<?php echo base_url("ext/script.js"); ?>"></script>
    
    <!-- ===========================area for entry data kategori=========================== -->
    <main class="area-grid">
        <!-- ===================area nama nama=============== -->
        <section class="item-label1">
            <label id="lbl_nama" for="txt_nama">
                Nama :
            </label>
        </section>
        <section class="item-input1">
            <!-- max length jumlah input yang masu masuk-->
            <input type="text" id="txt_nama" class="text-input">
        </section>
        <section class="item-error1">
            <p id="err_nama" class="error-info">Ini Error</p>
        </section>        

        <!-- ==================area aktif======================= -->
        <section class="item-label2">
            <label id="lbl_aktif" for="cbo_aktif">
                Aktif :
            </label>
        </section>
        <section class="item-input2">
            <select name="" id="cbo_aktif" class="select-input">
                <option value="-">Pilih Status</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </section>
        <section class="item-error2">
            <p id="err_aktif" class="error-info"></p>
        </section>
    </main>

    <!-- ======================area button simpan data====================== -->
    <nav class="area-button" style="margin-top:10px">
        <button id="btn-simpan" class="btn-primary">Simpan Data</button>
    </nav>

    <script>
        // inisialisasi object
        let btn_lihat = document.getElementById("btn-lihat");
        let btn_simpan = document.getElementById("btn-simpan");


        btn_lihat.addEventListener('click', function () {
            // alihkan ke halaman view kategori
            location.href = '<?php echo base_url(); ?>'
        });

        // membuat function refresh
        function setRefresh() {
            location.href = '<?php echo site_url("Kategori/addKategori"); ?>';
        }

        /*==============event untuk btn simpan=====================*/
        btn_simpan.addEventListener('click', function () {
            // inisialisasi object
            // untuk nama
            let lbl_nama = document.getElementById("lbl_nama");
            let txt_nama = document.getElementById("txt_nama");
            let err_nama = document.getElementById("err_nama");
            
            // untuk aktif
            let lbl_aktif = document.getElementById("lbl_aktif");
            let cbo_aktif = document.getElementById("cbo_aktif");
            let err_aktif = document.getElementById("err_aktif");

            // jika nama kosong
            if (txt_nama.value === "") {
                err_nama.style.display = "unset";
                err_nama.innerHTML = "nama Harus Di Isi";
                lbl_nama.style.color = "#FF0000";
                txt_nama.style.borderColor = "#FF0000";
            }
            // jika nama diisi
            else {
                err_nama.style.display = "none";
                err_nama.innerHTML = "";
                lbl_nama.style.color = "unset";
                txt_nama.style.borderColor = "unset";
            }

            // ternary operator
            const aktif = (cbo_aktif.selectedIndex === 0) ?
                [
                    err_aktif.style.display = "unset",
                    err_aktif.innerHTML = "Aktif Harus Di Pilih",
                    lbl_aktif.style.color = "#FF0000",
                    cbo_aktif.style.borderColor = "#FF0000",
                ]
                :
                [
                    err_aktif.style.display = "none",
                    err_aktif.innerHTML = "",
                    lbl_aktif.style.color = "unset",
                    cbo_aktif.style.borderColor = "unset",
                ]

            // jika komponen terisi

            if (err_nama.innerHTML === "" && aktif[1] === "") {
                // panggil method setSave
                setSave(
                    txt_nama.value, cbo_aktif.value
                )
            }
        });

        // arrow function
        const setSave = (nama, aktif) => {
                // buat variabel untuk form 
                // bisa untuk mengupload file
                let form = new FormData();

                // isi / tambah nilai untuk form
                form.append("namakategori", nama);
                form.append("aktifkategori", aktif);

                // proses kirim data ke controller
                fetch('<?php echo site_url("Kategori/setSave"); ?>', {
                    method: "POST",
                    body: form
                })
                .then((response) => response.json()) // response json dari kategori
                .then((result) => alert(result.statusnya))
                .catch((error) => alert("Data Gagal Dikirim!"))
            }
    </script>

</body>

</html>