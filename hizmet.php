<?php

$hizmet = 'ask-ve-iliski';
if (isset($_GET['hizmet'])) {
    $hizmet = $_GET['hizmet'];
}

?>
<?php
$url = $_SERVER['REQUEST_URI'];
function hizmetGetir($hizmet)
{
    $url = "https://astrologin-service.herokuapp.com/api/v1/hizmet/filter";
    $data = [
        "referans" => $hizmet
    ];
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'header' =>  "Content-Type: application/json\r\n",
            'content' => json_encode($data),
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    return $response->results;
}
$hizmetler = hizmetGetir($hizmet);

?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrologin | <?php echo ($hizmetler->name); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<style>
    .hizmetlerimiz-link {
        margin-bottom: -2px;
        border-bottom: 2px solid #6EB33C;
        transition: all .1s ease;
    }
</style>

<body>
    <?php include("navbar_hizmet.php"); ?>
    <div class="w-100" style="position: relative;">
        <img style="width: 100%;" src="../asset/background/astrologlar.png"></img>
        <img style="width: 50%; position: absolute; top: 75%; left: 50%; transform: translate(-50%, -50%)" src="../asset/title.png"></img>
    </div>
    <h1 class="text-center"><?php echo ($hizmetler->name); ?></h1>
    <div class="container my-5">
        <p class="text-center" style="font-size: larger;"><?php echo ($hizmetler->description); ?></p>
    </div>

    <div class="container my-5 text-center">
        <div style="position: relative;">
            <img class="w-75" src="../asset/background/Group40.png" alt="">
            <img style="width: 10%; position: absolute; top: 93%; left: 65%; transform: translate(-50%, -50%)" src="asset/katman2.png" alt="">
        </div>

    </div>

    <div class="text-center">
        <p style="font-size: 2.8rem;">Astrologlar</p>
    </div>

    <section class="mx-3 d-flex mb-5">
        <div id="astrolog-divi" class="text-center mx-1" style="position: relative; width: 30vh;">
            <img class="" style="object-fit: cover; width: 100%; height: 100%; border-radius: 25px;" src="https://firebasestorage.googleapis.com/v0/b/yuyyu-horoscope-match-4c042.appspot.com/o/UserPhotos%2Faakman3716%2FImage0.jpg?alt=media&token=3f4edf51-f5cf-4621-bcd4-5770e4777425" alt="people" />
            <div style="position: absolute; top: 10%; left: 10%; transform: translate(-50%, -50%); display: flex;">
                <i class="bi bi-star"></i>
                <p class="ms-1">5.0</p>
            </div>

            <div class="">
                <h5>Astrolog Adı</h5>
            </div>
        </div>
    </section>
    <?php include("footer.php"); ?>
</body>

</html>