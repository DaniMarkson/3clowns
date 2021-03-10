<?include ($_SERVER['DOCUMENT_ROOT'].'/header.php');?>

<?$mysql = new mysqli('127.0.0.1','mysql','mysql','users');?>
<?if($_SESSION['user']['city'])
{
    $city = $_SESSION['user']['city'];
    $result = $mysql->query("SELECT * FROM `place` WHERE `city_id` = '$city'");
}
else
{
    $result = $mysql->query("SELECT * FROM `place`");
}
$places  = array();
while($iterator = $result->fetch_assoc())
{
    $places[] = $iterator;
}
foreach($places as $key => $place)
{
    $id = $place["id"];
    $result = $mysql->query("SELECT * FROM `menu` WHERE `place_id` = '$id'");
    while($iterator = $result->fetch_assoc())
    {
        $places[$key]["menu"] = $iterator["main_dish"];
    }
}
echo "<h1>Цирковые площадки</h1>";
foreach($places as $place):?>
    <div class="item">
        <img src="<?=$place["photo"]?>">
        <div class="description">
            <div class="title"><?=$place['name']?></div>
            <div class="text">
                <?=$place['description']?>
                <br>
                Меню буфета: <?=$place['menu']?>
                <br>
                Адрес: г. <?=$place['city_id']==1?"Волгоград":"Москва"?>, <?=$place['address']?>
                <br>
                Телефон: <?=$place['contacts']?>
            </div>
        </div> 
    </div>
<?endforeach;?>

<?include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>