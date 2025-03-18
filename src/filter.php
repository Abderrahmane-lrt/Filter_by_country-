<?php 
require "../config/connect.php";

// جلب قائمة الدول
$query = "SELECT * FROM country";
$stmt = $con->prepare($query);
$stmt->execute();
$countries = $stmt->fetchAll(PDO::FETCH_ASSOC);



if (isset($_POST['filter_country']) ) {
    $country_id = $_POST['filter_country'];
    $query = "SELECT city.city_name FROM city WHERE country_id = $country_id";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <title>Filter by Country</title>
    <style>
        .container video {
            z-index: -1;
            position: absolute;
        }

        section {
            display: flex;
            justify-content: center;
        }
        .filtre {
            position: relative;
            margin-top: 80px;
        }
        .cover {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.279);
            inset: 0 0 0 0;
            backdrop-filter: blur(5px);
            z-index: -1;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php $page = 'filter'; ?>
    <?php include "menu.php"; ?>

    <div class="container">
        <div>
            <video loop autoplay playsinline muted>
                <source src='../vid/city.mp4' type='video/mp4'>
                The video doesn't work
            </video>
        </div>
        <section>
            <div class="filtre h-80 w-150">
                <form action="" method="post">
                    <div class="cover"></div>
                    <h1 class="text-4xl text-center text-blue-400 font-bold font-mono bg-white rounded-xl">Filter By Country</h1>
                    
                
                    <select name="filter_country" onchange="this.form.submit()" class="border-3 border-blue-400 bg-white mt-10 outline-none ml-18 w-100 rounded-2xl py-2 text-blue-500">
                        <option value="-1">Select country</option>
                        <?php foreach ($countries as $country) : ?>
                            <option value="<?= $country['id']; ?>" <?= (isset($_POST['filter_country']) && $_POST['filter_country'] == $country['id']) ? 'selected' : ''; ?>>
                                <?= $country['country_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <select name="filter_city" class="border-3 border-blue-400 bg-white mt-10 outline-none ml-18 w-100 rounded-2xl py-2 text-blue-500">
                        <option value="-1">Select city</option>
                        <?php foreach ($cities as $city) : ?>
                            <option value="<?= $city['city_name']; ?>">
                                <?= $city['city_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
