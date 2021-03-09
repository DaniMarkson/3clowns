<?include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>
<?if(!empty($_GET["id"])):?>
    <?$result = getGymnast($_GET["id"]);?>
    <h1><?=$result["name"]?></h1>

    <img src="<?=$result["img"]?>">
    <h3><?=$result["description"]?></h3>
<?else:?>
<h1>Гимнастки</h1>

<?=outGym(3, $url);?>
<?endif;?>

<?include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>