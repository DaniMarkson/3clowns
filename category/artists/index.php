<?include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>

<?if($_GET["category"]):?>
    <?$title = $_GET["category"];?>
<?else:?>
    <?$title = "Артисты";?>
<?endif;?>

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
$key = 0;
$artists = array();
foreach($places as $place)
{
    $plac = $place["id"];
    if($_GET["category"])
    {
        $result = $mysql->query("SELECT * FROM `artist` WHERE `place_id` = '$plac' AND `category` = '$title'");
    }
    else
    {
        $result = $mysql->query("SELECT * FROM `artist` WHERE `place_id` = '$plac'");
    }
    
    while($iterator = $result->fetch_assoc())
    {
        $artists[$key] = $iterator;
        $artists[$key]["place_name"] = $place["name"];
        $key++;
    }
}?>

<h1><?=$title?></h1>

<?foreach($artists as $artist):?>
    <div class="item">
        <img src="<?=$artist["photo"]?>">
        <div class="description">
            <div class="title"><?=$artist["name"]?></div>
            <div class="text">
                <?=$artist["description"]?>
                <br>
                Площадка: <?=$artist["place_name"]?>
            </div>
        </div> 
    </div>
<?endforeach;?>


<?include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>