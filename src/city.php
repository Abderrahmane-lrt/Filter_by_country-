<?php
require '../config/connect.php';

$query = 'SELECT * FROM country';
$stmt = $con->prepare( $query );
$stmt->execute();
$countries = $stmt->fetchAll( PDO::FETCH_ASSOC );

$message_success = '';
if ( isset( $_POST[ 'submit' ] ) ) {
    $country_id = $_POST[ 'country_id' ];
    $city_name = $_POST[ 'city' ];
    $query = "INSERT INTO city VALUES (null, '$city_name', '$country_id')";
    $con->exec( $query );
    $message_success = "<h1 class='message' id='boxMessage'>Added successfully</h1>";

}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='output.css'>
    <title>City </title>
    <style>
        .container video {
            z-index: -1;
            position: absolute;
        }

        .form {
            position: relative;
            border-radius: 10px;
        }

        .cover {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.279);
            inset: 0 0 0 0;
            backdrop-filter: blur(5px);
            z-index: -1;
            border-radius: 10px;

        }

        .hero {
            display: flex;
            justify-content: center;
            height: 80vh;
            align-items: center;
        }

        .form .message {
            color: white;
            padding: 5px;
            font-size: 2em;
            background-color: green;
            margin-top: 25px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php $page = 'city' ?>
    <?php include 'menu.php' ?>

    <div class='container'>
        <div>
            <video loop autoplay playsinline muted>
                <source src='../vid/city.mp4' type='video/mp4'>
                the video doesn't work
            </video>
        </div>

        <div class="hero">
            <div class="form h-100 w-140  ">
                <form action="" method="post">
                    <div class="cover"></div>
                    <h1 class="text-4xl text-center text-blue-400 font-bold font-mono bg-white rounded-xl">Add city</h1>
                    <input type="text" name="city"
                        class="border-3 border-blue-400 bg-white  mt-10 outline-none ml-18 w-100 rounded-2xl py-2 placeholder:pl-2 placeholder-blue-500"
                        placeholder="City">
                    <select name="country_id"
                        class="border-3 border-blue-400 bg-white  mt-10 outline-none ml-18 w-100 rounded-2xl py-2 text-blue-500">
                        <option value="-1">select country</option>
                        <?php foreach ($countries as $country) : ?>
                        <option value=" <?= $country['id'] ?> ">
                            <?= $country['country_name' ] ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                    <button type='submit' name='submit'
                        class='bg-indigo-500 px-30 rounded-xl ml-30 py-2 mt-15 text-white font-bold cursor-pointer'>add
                        city</button>
                    <?=$message_success ?>
                </form>
            </div>
        </div>
    </div>
    <script src='script.js'></script>
</body>

</html>