<?

ini_set('max_execution_time', 900);

if(!empty($_GET["q"]))
{
    $search_in = array('html', 'htm');
    $search_dir = '.';
    $countWords = 15;
    $files[] = "/index.php";
    $files1 = scandir($_SERVER['DOCUMENT_ROOT'] . "/category/clowns");
    foreach($files1 as $file)
    {
        if(is_dir($file)&&$file!='.'&&$file!='..')
        {
            $files[] = scandir($_SERVER['DOCUMENT_ROOT'] . $file);
        }
        elseif($file!='.'&&$file!='..'&&$file!="left-menu.php")
        {
            $files[] = "/category/clowns/".$file;
        }
    }
    $files2 = scandir($_SERVER['DOCUMENT_ROOT'] . "/place");
    foreach($files2 as $file)
    {
        if(is_dir($file)&&$file!='.'&&$file!='..')
        {
            $files[] = scandir($_SERVER['DOCUMENT_ROOT'] . $file);
        }
        elseif($file!='.'&&$file!='..'&&$file!="left-menu.php")
        {
            $files[] = "/place/".$file;
        }
    }
    $files3 = scandir($_SERVER['DOCUMENT_ROOT'] . "/category/gymnasts");
    foreach($files3 as $file)
    {
        if(is_dir($file)&&$file!='.'&&$file!='..')
        {
            $files[] = scandir($_SERVER['DOCUMENT_ROOT'] . $file);
        }
        elseif($file!='.'&&$file!='..'&&$file!="left-menu.php")
        {
            $files[] = "/category/gymnasts/".$file;
        }
    }
    
    $search_results = array();
    foreach($files as $file){
        $content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $file);
        $contents = mb_strtolower($content);
        if (strpos($contents, mb_strtolower($_GET["q"])) !== false)
        {
            $result["link"] = $file;
            $start_title = strrpos($content, '<h1>');
            $fin_title = strrpos($content, '</h1>');
            $result["title"] = strip_tags(substr($content, $start_title, ($fin_title-$start_title)));
            $start_description = strrpos($content, '</h1>');
            $result["description"] = strip_tags(substr($content, $start_description, 150)) . '...';
            $search_results[] = $result;
            
        }
    }
}
?>
<?include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>

<h1>Поиск <?=$_GET["q"]?"по запросу " . $_GET["q"]:""?></h1>

<form name="search" method="get" action="<?=$url?>">
    <input type="search" name="q" size="150" placeholder="Введите фразу для поиска">
    <button type="submit">Найти</button>
</form>

<?if(!empty($_GET["q"]) && $_GET["q"]){
    $result = array();
    $query = $_GET["q"];
    $mysql = new mysqli('127.0.0.1','mysql','mysql','users');
    $search = $mysql->query("SELECT * FROM `gymnasts` WHERE `name` LIKE '%$query%' OR `description` LIKE '%$query%'");
    while($res = $search->fetch_assoc())
    {
        $result[] = $res;
    }
    if(count($result)>0||count($search_results)>0)
    {
        if(count($result)>0)
        {    
            foreach($result as $item)
            {
                echo '<h2><a href="/category/gymnasts/?id='.$item['id'].'">'.$item["name"].'</a></h2>';
                echo '<p>'.$item["description"].'</p>';
            }
        }
        if(count($search_results)>0)
        {    
            foreach($search_results as $item)
            {
                echo '<h2><a href="'.$item["link"].'">'.$item["title"].'</a></h2>';
                echo '<p>'.$item["description"].'</p>';
            }
        }
    }
    else
    {
        echo "По Вашему запросу ничего не обнаружено!";
    }
}
elseif(!empty($_GET) && !$_GET["q"])
{
    echo "Пустой запрос!";
}
?>
<?include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>
