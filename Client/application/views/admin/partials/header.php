<head>
    <title>Online Food Order</title>
    <!-- import font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- import file "style.css" -->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css") ?>" />
</head>

<body>
    <!-- Menu Section Starts -->
    <nav class="area-navbar text-center">
        <div class="wrapper">
            <ul>
                <li><a href="<?=site_url('dashboard/index')?>">Dashboard</a></li>
                <li><a href="<?=site_url('kategori/index')?>">Kategori</a></li>
                <li><a href="<?=site_url('Hidangan/index')?>">Menu Hidangan</a></li>
                <li><a href="<?=site_url()?>">Pesanan</a></li>
                <li><a href="<?=site_url()?>">Kelola Admin</a></li>
                <li><a href="<?=site_url()?>">Logout</a></li>
            </ul>
        </div>
    </nav>
    <!-- Menu Section Ends -->