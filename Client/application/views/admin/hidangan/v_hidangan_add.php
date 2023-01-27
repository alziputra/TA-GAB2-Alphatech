<body>
    <!-- area button -->
    <nav class="area-button">
        <button id="btn-lihat" class="btn-primary">Lihat Data</button>
        <button id="btn-refresh" class="btn-secondary" onclick="return setRefresh()">Refresh Data</button>
    </nav>

    <script src="<?php echo base_url("ext/script.js"); ?>"></script>
    
    <!-- ===========================area for entry data hidangan=========================== -->
    <main class="area-grid">
        <!-- ===================area nama menu=============== -->
        <section class="item-label1">
            <label id="lbl_menu" for="txt_menu">
                Menu :
            </label>
        </section>
        <section class="item-input1">
            <!-- max length jumlah input yang masu masuk-->
            <input type="text" id="txt_menu" class="text-input">
        </section>
        <section class="item-error1">
            <p id="err_menu" class="error-info">Ini Error</p>
        </section>

        <!-- =================area deskripsi==================-->
        <section class="item-label2">
            <label id="lbl_deskripsi" for="txt_menu">
                Deskripsi :
            </label>
        </section>
        <section class="item-input2">
            <!-- max length jumlah input yang masu masuk-->
            <input type="text" id="txt_deskripsi" class="text-input">
        </section>
        <section class="item-error2">
            <p id="err_deskripsi" class="error-info">Ini Error</p>
        </section>

        <!-- ==================area harga===================== -->
        <section class="item-label3">
            <label id="lbl_harga" for="txt_harga">
                Harga :
            </label>
        </section>
        <section class="item-input3">
            <input type="text" id="txt_harga" class="text-input" onkeypress="return setNumber(event)>
        </section>
        <section class="item-error3">
            <p id="err_harga" class="error-info"></p>
        </section>

        <!-- ==================area aktif======================= -->
        <section class="item-label4">
            <label id="lbl_aktif" for="cbo_aktif">
                Aktif :
            </label>
        </section>
        <section class="item-input4">
            <select name="" id="cbo_aktif" class="select-input">
                <option value="-">Pilih Status</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </section>
        <section class="item-error4">
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
            // alihkan ke halaman view hidangan
            location.href = '<?php echo base_url(); ?>'
        });

        // membuat function refresh
        function setRefresh() {
            location.href = '<?php echo site_url("Hidangan/addHidangan"); ?>';
        }

        /*==============event untuk btn simpan=====================*/
        btn_simpan.addEventListener('click', function () {
            // inisialisasi object
            // untuk menu
            let lbl_menu = document.getElementById("lbl_menu");
            let txt_menu = document.getElementById("txt_menu");
            let err_menu = document.getElementById("err_menu");
            // untuk deskripsi
            let lbl_deskripsi = document.getElementById("lbl_deskripsi");
            let txt_deskripsi = document.getElementById("txt_deskripsi");
            let err_deskripsi = document.getElementById("err_deskripsi");
            // untuk harga
            let lbl_harga = document.getElementById("lbl_harga");
            let txt_harga = document.getElementById("txt_harga");
            let err_harga = document.getElementById("err_harga");
            // untuk aktif
            let lbl_aktif = document.getElementById("lbl_aktif");
            let cbo_aktif = document.getElementById("cbo_aktif");
            let err_aktif = document.getElementById("err_aktif");

            // jika menu kosong
            if (txt_menu.value === "") {
                err_menu.style.display = "unset";
                err_menu.innerHTML = "Menu Harus Di Isi";
                lbl_menu.style.color = "#FF0000";
                txt_menu.style.borderColor = "#FF0000";
            }
            // jika menu diisi
            else {
                err_menu.style.display = "none";
                err_menu.innerHTML = "";
                lbl_menu.style.color = "unset";
                txt_menu.style.borderColor = "unset";
            }

            // ternary operator
            const deskripsi = (txt_deskripsi.value === "") ?
                [
                    err_deskripsi.style.display = "unset",
                    err_deskripsi.innerHTML = "Deskripsi Harus Di Isi",
                    lbl_deskripsi.style.color = "#FF0000",
                    txt_deskripsi.style.borderColor = "#FF0000",
                ]
                :
                [
                    err_deskripsi.style.display = "none",
                    err_deskripsi.innerHTML = "",
                    lbl_deskripsi.style.color = "unset",
                    txt_deskripsi.style.borderColor = "unset",
                ]
            const harga = (txt_harga.value === "") ?
                [
                    err_harga.style.display = "unset",
                    err_harga.innerHTML = "Harga Harus Di Isi",
                    lbl_harga.style.color = "#FF0000",
                    txt_harga.style.borderColor = "#FF0000",
                ]
                :
                [
                    err_harga.style.display = "none",
                    err_harga.innerHTML = "",
                    lbl_harga.style.color = "unset",
                    txt_harga.style.borderColor = "unset",
                ]

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

            if (err_menu.innerHTML === "" && deskripsi[1] === "" && harga[1] === "" && aktif[1] === "") {
                // panggil method setSave
                setSave(
                    txt_menu.value, txt_deskripsi.value, txt_harga.value, cbo_aktif.value
                )
            }
        });

        // arrow function
        const setSave = (menu, deskripsi, harga, aktif) => {
                // buat variabel untuk form 
                // bisa untuk mengupload file
                let form = new FormData();

                // isi / tambah nilai untuk form
                form.append("menuhidangan", menu);
                form.append("deskhidangan", deskripsi);
                form.append("hargahidangan", harga);
                form.append("aktifhidangan", aktif);

                // proses kirim data ke controller
                fetch('<?php echo site_url("Hidangan/setSave"); ?>', {
                    method: "POST",
                    body: form
                })
                .then((response) => response.json()) // response json dari hidangan
                .then((result) => alert(result.statusnya))
                .catch((error) => alert("Data Gagal Dikirim!"))
            }
    </script>

</body>

</html>