<?php
function hizmetGetir()
{
    $url = "https://astrologin-service.herokuapp.com/api/v1/hizmet";
    $options = array(
        'http' => array(
            'method'  => 'GET',
            'header' =>  "Content-Type: application/json\r\n"
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
    return $response->results;
}
$hizmetler = hizmetGetir();

?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <base href="localhost" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrologin | Hizmetlerimiz</title>
    <?php include("import.php"); ?>
</head>
<style>
    .hizmetlerimiz-link {
        margin-bottom: -2px;
        border-bottom: 2px solid #6EB33C;
        transition: all .1s ease;
    }
</style>

<body>
    <?php include("navbar.php"); ?>
    <div class="w-100" style="position: relative;">
        <img style="width: 100%;" src="asset/background/hizmet.png"></img>
        <h1 class="beyaz" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%)">HİZMETLERİMİZ</h1>
    </div>
    <section class="container mt-5">
        <div class="row">

            <?php
            for ($i = 0; $i < count($hizmetler); $i++) {
                $hizmet = $hizmetler[$i];
            ?>
                <div class="col-sm-12 d-flex justify-content-center">
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-sm-10 col-12">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo ($hizmet->name); ?></h5>
                                    <p class="card-text"><?php echo substr($hizmet->description, 0, 150); ?>....</p>
                                    <a class="cizgi-kaldir" href="hizmetlerimiz/<?php echo $hizmet->referans ?>">
                                        <p class="card-text"><small class="text-muted">Daha fazlası</small></p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-2 col-4">
                                <img src="asset/card/card<?php echo $i + 1 ?>.png" class="img-fluid rounded-end w-100 h-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </section>
    <?php include("footer.php"); ?>
</body>

</html>