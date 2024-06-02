<?php
    include("connection/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
        <!--HEADER-->
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none" style="margin-left: 15px;">
                    <img class="bi me-2" src="assets/car-favicon.png" width="50" height="42" alt="">
                    <span class="fs-4" style="margin-left: 20px;">Rejakmal's Car Rental</span>
                </a>
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="#" class="nav-link header" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link header">Features</a></li>
                    <li class="nav-item"><a href="#" class="nav-link header">Pricing</a></li>
                    <li class="nav-item"><a href="#" class="nav-link header">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link header">About</a></li>
                </ul>
            </header>
        </div>
        
        <!--NAVBAR DAN CONTENT-->
        <div class="d-flex align-items-start">
            <!--SIDEBAR MENU-->
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#query1" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Query 1</button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#query2" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Query 2</button>
                <!-- <button class="nav-link" data-bs-toggle="pill" data-bs-target="#query11" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Query 11</button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#query12" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Query 12</button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tables" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Display Tables</button> -->
            </div>

            <!--CONTENT DISPLAY TABLE-->
            <div class="tab-content" id="v-pills-tabContent">

                <!--QUERY 1-->
                <div class="tab-pane fade show active" id="query1" role="tabpanel" tabindex="0" style="margin-left: 20px;">
                    <h3>
                        Query 1: Menampilkan Nama Belakang Semua Pelanggan <br>
                        yang Sekarang Menyewa Mobil dari Perusahaan
                    </h3>
                    <p>
                        Query: <br>
                        <b>SELECT last_name FROM customer, person, rental</b>
                        <b>WHERE customer.dlicense = rental.dlicense</b> <br>
                        <b>AND customer.dlicense = person.dlicense</b>
                        <b>AND to_date IS NULL;</b> <br>
                    </p>
                    <br>
                    <p>Table:</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Last Name</th>
                            </tr>
                            <?php
                                include("connection/koneksi.php");
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT last_name FROM customer, person, rental
                                WHERE customer.dlicense = rental.dlicense AND customer.dlicense = person.dlicense
                                AND to_date IS NULL");
                                while($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $d['last_name']; ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </thead>
                    </table>
                </div>

                <!--QUERY 2-->
                <div class="tab-pane fade" id="query2" role="tabpanel" tabindex="0" style="margin-left: 20px;">
                    <h3>
                        Query 2: Menampilkan Pembuat dan Warna Semua Mobil<br>
                        yang Saat Ini Disewakan
                    </h3>
                    <p>
                        Query: <br>
                        <b>SELECT make, color FROM car, rental</b>
                        <b>WHERE car.car_id = rental.car_id AND to_date IS NULL;</b>
                    </p>
                    <br>
                    <p>Table:</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Make</th>
                                <th scope="col">Color</th>
                            </tr>
                            <?php
                                include("connection/koneksi.php");
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT make, color FROM car, rental
                                WHERE car.car_id = rental.car_id AND to_date IS NULL");
                                while($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $d['make']; ?></td>
                                        <td><?php echo $d['color']; ?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </thead>
                    </table>
                </div>               
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>
            document.querySelectorAll('.nav-link').forEach(function (element) {
                element.addEventListener('click', function () {
                    // Menampilkan tab yang sesuai dengan tombol yang diklik
                    var targetTab = document.querySelector(this.getAttribute('data-bs-target'));
                    var activeTabs = document.querySelectorAll('.tab-pane.show.active');
                    activeTabs.forEach(function (tab) {
                        tab.classList.remove('active', 'show');
                    });
                    targetTab.classList.add('active', 'show');
                });
            });
        </script>
    </body>

    <style>
        .d-flex.align-items-start {
            margin-left: 80px;
        }

        .nav-pills .nav-link.header {
            color: #164863;
        }

        .nav-pills .nav-link {
            color: #164863;
        }

        .nav-pills .nav-link:hover {
            background-color: #164863;
            color: white;
        }

        .nav-pills .nav-link:hover {
            background-color: #164863;
            color: white;
        }

        #query1 h3 {
            border-bottom: 0.5px solid lightgrey;
            padding-bottom: 20px;
        }

        #query2 h3 {
            border-bottom: 0.5px solid lightgrey;
            padding-bottom: 20px;
        }

        #query-tables h3 {
            border-bottom: 0.5px solid lightgrey;
            padding-bottom: 20px;
        }
    </style>

</html>