<?php
use Webazon\Prng\Prng;
echo '<div style="width: 320px;height: 48px;margin: 0 auto;border: 2px grey solid;padding: 4px;font-size: 16px;text-align:center;"><div style="color:blue;text-align:center;">KISS-PRNG</div><div style="color: black;text-align:center;">webazon/prng</div></div><br /><hr /><br />';


require '../vendor/autoload.php';

$prng = new Webazon\Prng\Prng();
$res = $prng -> KissEncrypt('Здесь данные');
echo $res.'<br /><br />';
$res = $prng -> KissDecrypt($res);
echo $res.'<br /><br />';
?>