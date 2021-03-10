<?$mysql = new mysqli('127.0.0.1','mysql','mysql','users');
if($_SESSION['user']['city'])
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

$artists = array();
foreach($places as $place)
{
    $plac = $place["id"];
    $result = $mysql->query("SELECT * FROM `artist` WHERE `place_id` = '$plac'");
    while($iterator = $result->fetch_assoc())
    {
        $artists[] = $iterator;
    }
}
$categories = array();
foreach($artists as $artist)
{
    $matches = 0;
    foreach($categories as $category)
    {
        if($category == $artist["category"])
        {
            $matches++;
        }
    }
    if($matches==0)
    {
        $categories[] = $artist["category"];
    }
}
foreach($categories as $category):?>
    <a href="/category/artists/?category=<?=$category?>" <?if($_GET["category"]==$category):?>class="active"<?endif;?>><?=$category?></a>
<?endforeach;?>