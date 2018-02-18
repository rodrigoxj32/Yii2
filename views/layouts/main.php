<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
          integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
          crossorigin=""/>
    <style>

        #map { height: 500px; width: 900px}
    </style>

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>

<script>
    var map = L.map('map', {
        layers: [
            L.tileLayer('https://api.mapbox.com/styles/v1/goseta/cj9hlgmjna0fn2rlgisg1n1no/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZ29zZXRhIiwiYSI6ImNqOGc1ajQzZDBjNGMycXJ3ZXBqaHNlNjgifQ.Z9M_JYdDVfwABKH6jGbRFQ', {
                id: 'mapbox.streets'
            })
        ],
        center: [13.7008617, -89.2288614],
        zoom: 13
    });


    $.get('/site/get-range',  function(res) {



        var array = JSON.parse("[" + res + "]");

        array[0].forEach(function (value) {
            var latlngs = [[13.57505933072751,-89.29078893530648],[13.57765512872909,-89.27750946914372],[13.59250392451492,-89.25720417517661],[13.6164145752801,-89.27719416980679],[13.63221845079416,-89.26696816208403],[13.65045683453148,-89.22326371207942],[13.63924564038607,-89.19267659790637],[13.64904615274604,-89.14836725723816],[13.66885887351888,-89.1745184189775],[13.69811777816281,-89.18812131083962],[13.73384721180194,-89.20268045836178],[13.742776896582,-89.23773598769641],[13.68378935848226,-89.31959889692199],[13.58258178341583,-89.30298380801179],[13.57505933072751,-89.29078893530648]];
            var polygon = L.polygon(value, {color: 'red'}).addTo(map);
        })


        //console.log((latlngs));
    });


</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

