<?$url = "http://api.openweathermap.org/data/2.5/weather";
$options = [
    'id' => 472757,
    'APPID' =>'23066067a4a8002e2e9cb62626b71aab',
    'units' => 'metric',
    'lang' => 'en'
];
$cur = curl_init();
curl_setopt($cur, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cur, CURLOPT_URL, $url.'?'.http_build_query($options));

$response = curl_exec($cur);
$result = json_decode($response, true);
curl_close($cur);
?>
<?include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>

<h1>Погода в Волгограде:</h1>

<table>
<tr>
    <td>Температура</td>
    <td><?=$result['main']['temp']?>&#8451;</td>
</tr>
<tr>
    <td>Ощущается как</td>
    <td><?=$result['main']['feels_like']?>&#8451;</td>
</tr>
<tr>
    <td>Атмосферное давление         </td>
    <td><?=$result['main']['pressure']?> мм рт.ст.</td>
</tr>
<tr>
    <td>Влажность</td>
    <td><?=$result['main']['humidity']?>%</td>
</tr>
<tr>
    <td>Рассвет в:</td>
    <td><?=date('h:i:s', 1615174203)?></td>
</tr>
</table>
(взято с openweathermap.org)
<?include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>