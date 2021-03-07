<?include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>
<?if($_GET['error']==1):?>
    <font color="red">Редактирование не сохранилось, попробуйте повторить</font>
<?elseif($_GET['error']==2):?>
    <font color="red">Плохой файл</font>
<?elseif($_GET['error']==3):?>
    <font color="red">Удаление не получилось</font>
<?endif;?>
<?if(!empty($_POST)):?>

    <?$check = "Добавить";?>
    <?$filename='upload/'.$_POST["user_id"].'/'.$_POST["id"].'.txt';?>
    <?if(file_exists($filename))
    {
        $check="Изменить";
    }?>
    
    <h1><?=$check?> сертификат в билет №<?=$_POST['id']?></h1>
    
    <form method="post" name="upload" action="sert.php" enctype='multipart/form-data'>
        <input type="hidden" name="url" value="<?=$_POST['url']?>">
        <input type="hidden" name="err_url" value="<?=$url?>">
        <input type="hidden" name="id" value="<?=$_POST['id']?>">
        <input type="hidden" name="user_id" value="<?=$_POST['user_id']?>">
        Выберите файл: <input type='file' name='filename' /><br /><br />
        <input type='submit' value='Загрузить' />
    </form>
    
    <?if($check=="Изменить"):?>

        <h1>Удалить сертификат из билета №<?=$_POST['id']?></h1>
        <form method="post" name="delete" action="sert.php">
            <input type="hidden" name="url" value="<?=$_POST['url']?>">
            <input type="hidden" name="err_url" value="<?=$url?>">
            <input type="hidden" name="id" value="<?=$_POST['id']?>">
            <input type="hidden" name="user_id" value="<?=$_POST['user_id']?>">
            <input type="hidden" name="act" value="delete">
            <input type='submit' value='Удалить' />
        </form>
    
    <?endif;?>

<?endif;?>

<?include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>