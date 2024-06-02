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
        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#query3" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Query 3</button>
        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#query4" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Query 4</button>
        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#query5" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Query 5</button>
        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#query6" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Query 6</button>
        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#query7" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Query 7</button>
        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#query8" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Query 8</button>
        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#query9" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Query 9</button>
        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#query10" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Query 10</button>
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

        <!--QUERY 3-->
        <div class="tab-pane fade" id="query3" role="tabpanel" tabindex="0" style="margin-left: 20px;">
            <h3>
                Query 3: Menampilkan Harga Sewa dan Rental ID untuk<br>
                Setiap Sewa yang Telah Selesai
            </h3>
            <p>
                Query: <br>
                <b>
                    SELECT rental.rental_id, rental_rate.count FROM rental_rate <br>
                    JOIN rental ON rental_rate.rental_id = rental.rental_id WHERE rental.to_date IS NOT NULL;
                </b>
            </p>
            <br>
            <p>Table:</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Rental ID</th>
                        <th scope="col">Harga Sewa</th>
                    </tr>
                    <?php
                        include("connection/koneksi.php");
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT rental.rental_id, rental_rate.count FROM rental_rate
                        JOIN rental ON rental_rate.rental_id = rental.rental_id WHERE rental.to_date IS NOT NULL");
                        while($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $d['rental_id']; ?></td>
                                <td><?php echo $d['count']; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </thead>
            </table>
        </div>

        <!--QUERY 4-->
        <div class="tab-pane fade" id="query4" role="tabpanel" tabindex="0" style="margin-left: 20px;">
            <h3>Query 4: Menampilkan Nama Belakang Semua Manajer</h3>
            <p>
                Query: <br>
                <b>
                    SELECT last_name FROM employee, person <br>
                    WHERE emtype = 'M' AND employee.dlicense = person.dlicense;
                </b>
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
                        $data = mysqli_query($koneksi, "SELECT last_name FROM employee, person
                        WHERE emtype = 'M' AND employee.dlicense = person.dlicense");
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

        <!--QUERY 5-->
        <div class="tab-pane fade" id="query5" role="tabpanel" tabindex="0" style="margin-left: 20px;">
            <h3>Query 5: Menampilkan Nama Depan dan Nama Belakang <br>
                Semua Pelanggan
            </h3>
            <p>
                Query: <br>
                <b>
                    SELECT first_name, last_name FROM customer, person <br>
                    WHERE customer.dlicense = person.dlicense;
                </b>
            </p>
            <br>
            <p>Table:</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                    </tr>
                    <?php
                        include("connection/koneksi.php");
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT first_name, last_name FROM customer, person
                        WHERE customer.dlicense = person.dlicense");
                        while($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $d['first_name']; ?></td>
                                <td><?php echo $d['last_name']; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </thead>
            </table>
        </div>

        <!--QUERY 6-->
        <div class="tab-pane fade" id="query6" role="tabpanel" tabindex="0" style="margin-left: 20px;">
            <h3>
                Query 6: Apakah Salah Satu Karyawan Perusahaan <br>
                Juga Pelanggan Kami?
            </h3>
            <p>
                Query: <br>
                <b>
                    SELECT * FROM employee, customer
                    WHERE employee.dlicense = customer.dlicense;
                </b>
            </p>
            <br>
            <p>Table:</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Driver's License</th>
                        <th scope="col">Work Location</th>
                        <th scope="col">Employee Type</th>
                        <th scope="col">President</th>
                        <th scope="col">Vice President</th>
                    </tr>
                    <?php
                        include("connection/koneksi.php");
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * FROM employee, customer
                        WHERE employee.dlicense = customer.dlicense;");
                        while($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $d['dlicense']; ?></td>
                                <td><?php echo $d['work_loc']; ?></td>
                                <td><?php echo $d['emtype']; ?></td>
                                <td><?php echo $d['is_pres']; ?></td>
                                <td><?php echo $d['is_vpres']; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </thead>
            </table>
        </div>

        <!--QUERY 7-->
        <div class="tab-pane fade" id="query7" role="tabpanel" tabindex="0" style="margin-left: 20px;">
            <h3>
                Query 7: Apakah President Perusahaan Bekerja di Kantor Pusat?
            </h3>
            <p>
                Query: <br>
                <b>
                    SELECT * FROM employee, address <br>
                    WHERE is_pres = 'Y' AND work_loc = address_id AND address.is_hq = 'Y'; 
                </b>
            </p>
            <br>
            <p>Table:</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">License</th>
                        <th scope="col">Location</th>
                        <th scope="col">Emp. Type</th>
                        <th scope="col">Pres</th>
                        <th scope="col">V Pres</th>
                        <th scope="col">Address ID</th>
                        <th scope="col">St. Num.</th>
                        <th scope="col">St. Name</th>
                        <th scope="col">City</th>
                        <th scope="col">Province</th>
                        <th scope="col">P. Code</th>
                        <th scope="col">HQ</th>
                    </tr>
                    <?php
                        include("connection/koneksi.php");
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * FROM employee, address
                        WHERE is_pres = 'Y' AND work_loc = address_id AND address.is_hq = 'Y'");
                        while($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $d['dlicense']; ?></td>
                                <td><?php echo $d['work_loc']; ?></td>
                                <td><?php echo $d['emtype']; ?></td>
                                <td><?php echo $d['is_pres']; ?></td>
                                <td><?php echo $d['is_vpres']; ?></td>
                                <td><?php echo $d['address_id']; ?></td>
                                <td><?php echo $d['street_num']; ?></td>
                                <td><?php echo $d['street_name']; ?></td>
                                <td><?php echo $d['city']; ?></td>
                                <td><?php echo $d['province']; ?></td>
                                <td><?php echo $d['pcode']; ?></td>
                                <td><?php echo $d['is_hq']; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </thead>
            </table>
        </div>

        <!--QUERY 8-->
        <div class="tab-pane fade" id="query8" role="tabpanel" tabindex="0" style="margin-left: 20px;">
            <h3>
                Query 8: Menampilkan Rental ID Semua Penyewaan <br>
                dengan Waktu Terpendek
            </h3>
            <p>
                Query: <br>
                <b>
                    SELECT rental_id FROM rental WHERE to_date IS NOT NULL AND DATEDIFF(to_date, from_date) IN <br>
                    (SELECT MIN(DATEDIFF(to_date, from_date)) FROM rental WHERE to_date IS NOT NULL);
                </b>
            </p>
            <br>
            <p>Table:</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Rental ID</th>
                    </tr>
                    <?php
                        include("connection/koneksi.php");
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT rental_id FROM rental WHERE to_date IS NOT NULL AND DATEDIFF(to_date, from_date) IN
                        (SELECT MIN(DATEDIFF(to_date, from_date)) FROM rental WHERE to_date IS NOT NULL)");
                        while($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $d['rental_id']; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </thead>
            </table>
        </div>

        <!--QUERY 9-->
        <div class="tab-pane fade" id="query9" role="tabpanel" tabindex="0" style="margin-left: 20px;">
            <h3>
                Query 9: Menemukan Nilai Sewa Termurah dengan Menggunakan <br>
                Query No. 3 sebagai Inner Query
            </h3>
            <p>
                Query: <br>
                <b>
                    SELECT MIN(charge) AS min_charge FROM (
                    SELECT SUM(charge) AS charge, rental_id FROM <br>
                    (SELECT rental.rental_id, rental_rate.count AS charge FROM rental_rate <br>
                    JOIN rental ON rental_rate.rental_id = rental.rental_id
                    WHERE rental.to_date IS NOT NULL) <br>
                    AS T GROUP BY rental_id) AS T1;
                </b>
            </p>
            <br>
            <p>Table:</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Rental ID</th>
                    </tr>
                    <?php
                        include("connection/koneksi.php");
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT MIN(charge) AS min_charge FROM (
                            SELECT SUM(charge) AS charge, rental_id
                            FROM (SELECT rental.rental_id, rental_rate.count AS charge
                            FROM rental_rate
                            JOIN rental ON rental_rate.rental_id = rental.rental_id
                            WHERE rental.to_date IS NOT NULL) AS T GROUP BY rental_id) AS T1");
                        while($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $d['min_charge']; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </thead>
            </table>
        </div>

        <!--QUERY 10-->
        <div class="tab-pane fade" id="query10" role="tabpanel" tabindex="0" style="margin-left: 20px;">
            <h3>
                Query 10: Menampilkan Data Pembuat Mobil <br>
                yang Mobilnya Belum Pernah Disewa
            </h3>
            <p>
                Query: <br>
                <b>
                    SELECT DISTINCT make FROM car EXCEPT SELECT DISTINCT make <br>
                    FROM car, rental WHERE car.car_id = rental.car_id;
                </b>
            </p>
            <br>
            <p>Table:</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Car Brand</th>
                    </tr>
                    <?php
                        include("connection/koneksi.php");
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT DISTINCT make FROM car EXCEPT SELECT DISTINCT make
                        FROM car, rental WHERE car.car_id = rental.car_id;");
                        while($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $d['make']; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </thead>
            </table>
        </div>

        <!-- <div class="tab-pane fade" id="query11" role="tabpanel" tabindex="0" style="margin-left: 20px;"></div>
        <div class="tab-pane fade" id="query12" role="tabpanel" tabindex="0" style="margin-left: 20px;"></div>
        <div class="tab-pane fade" id="query-tables" role="tabpanel" tabindex="0" style="margin-left: 20px;"> -->
            
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

    #query3 h3 {
        border-bottom: 0.5px solid lightgrey;
        padding-bottom: 20px;
    }

    #query4 h3 {
        border-bottom: 0.5px solid lightgrey;
        padding-bottom: 20px;
    }

    #query5 h3 {
        border-bottom: 0.5px solid lightgrey;
        padding-bottom: 20px;
    }

    #query6 h3 {
        border-bottom: 0.5px solid lightgrey;
        padding-bottom: 20px;
    }

    #query7 h3 {
        border-bottom: 0.5px solid lightgrey;
        padding-bottom: 20px;
    }

    #query8 h3 {
        border-bottom: 0.5px solid lightgrey;
        padding-bottom: 20px;
    }

    #query9 h3 {
        border-bottom: 0.5px solid lightgrey;
        padding-bottom: 20px;
    }

    #query10 h3 {
        border-bottom: 0.5px solid lightgrey;
        padding-bottom: 20px;
    }

    #query-tables h3 {
        border-bottom: 0.5px solid lightgrey;
        padding-bottom: 20px;
    }
</style>

</html>