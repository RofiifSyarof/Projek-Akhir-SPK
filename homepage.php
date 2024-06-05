<?php
$developers = [
    ["name" => "Reza Akmal Syauqi", "image" => "developer1.png"],
    ["name" => "Azhar Aji Darmawan", "image" => "path/to/developer2.png"],
    ["name" => "Muhammad Rofiff Syarof N.A.", "image" => "path/to/developer3.png"],
    ["name" => "Muhammad Efflin R.L", "image" => "path/to/developer4.png"],
];

$supervisor = ["name" => "Ramadhana Setiyawan S.Pd., M.Cs.", "image" => "supervisor.png"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Foundation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>ABC Foundation</h2>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#input-data">Input Data</a></li>
                <li><a href="#process">Process</a></li>
            </ul>
        </div>
        <div class="main-content">
            <header>
                <h1>ABC Scholarship Official Website</h1>
            </header>
            <section id="home">
                <div class="developers">
                    <h2>Meet Our Developers:</h2>
                    <?php foreach ($developers as $developer): ?>
                    <div class="developer-card">
                        <img src="<?php echo $developer['image']; ?>" alt="<?php echo $developer['name']; ?>">
                        <h3><?php echo $developer['name']; ?></h3>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="supervisor">
                    <h2>Meet Our Supervisor:</h2>
                    <div class="supervisor-card">
                        <img src="<?php echo $supervisor['image']; ?>" alt="<?php echo $supervisor['name']; ?>">
                        <h3><?php echo $supervisor['name']; ?></h3>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
