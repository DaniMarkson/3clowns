<?include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>

<h1>Редактировать билет №<?=$_POST['id']?></h1>
<form action="/edit-delete-tickets.php" method="post">
    <input type="hidden" name="url" value="<?=$_POST['url']?>">
    <input type="hidden" name="err_url" value="<?=$url?>">
    <input type="hidden" name="id" value="<?=$_POST['id']?>">
    <input type="number" name="quests" placeholder="Количество">
    <input type="checkbox" name="age" value="1" id="age"><label for="age">Взрослые</label>
    <button type="submit">Сохранить</button>
</form>
<?if($_GET['error']==1):?>
    <font color="red">Редактирование не сохранилось, попробуйте повторить</font>
<?elseif($_GET['error']==2):?>
    <font color="red">Пожалуйста, укажите количество гостей</font>
<?endif;?>
<?include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>