<?if(empty($_POST["action"])):?>
    Оформить билет:
    <form class="ticket" method="post" name = "ticket">
        <input type="hidden" name="user_id" value="<?=$_SESSION['user']['id']?>">
        <input type="hidden" name="name" value="<?=$_SESSION['user']['name']?>">
        <input type="number" name="quests" placeholder="Количество">
        <input type="checkbox" name="age" value="1" id="age"><label for="age">Взрослые</label>
        <button type="submit">Оформить</button>
    </form>
    <div class="res"></div>
<?elseif($_POST["action"]=="edit"):?>
    <h1>Редактировать билет №<?=$_POST['id']?></h1>
    <form method="post">
        <input type="hidden" name="url" value="<?=$_POST['url']?>">
        <input type="hidden" name="action" value="final_edit">
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
    <?endif;
elseif($_POST["action"]=="sertificate"):
    $check = "Добавить";
    $filename=$_SERVER["DOCUMENT_ROOT"].'/upload/'.$_POST["user_id"].'/'.$_POST["id"].'.txt';
    if(file_exists($filename))
    {
        $check="Изменить";
    }?>
    
    <h1><?=$check?> сертификат в билет №<?=$_POST['id']?></h1>
    
    <form method="post" name="upload" action="/sert.php" enctype='multipart/form-data'>
        <input type="hidden" name="action" value="sert_add">
        <input type="hidden" name="url" value="<?=$_POST['url']?>">
        <input type="hidden" name="err_url" value="<?=$url?>">
        <input type="hidden" name="id" value="<?=$_POST['id']?>">
        <input type="hidden" name="user_id" value="<?=$_POST['user_id']?>">
        Выберите файл: <input type='file' name='filename' /><br /><br />
        <input type='submit' value='Загрузить' />
    </form>
    
    <?if($check=="Изменить"):?>

        <h1>Удалить сертификат из билета №<?=$_POST['id']?></h1>
        <form method="post" action="/sert.php" name="delete">
            <input type="hidden" name="url" value="<?=$_POST['url']?>">
            <input type="hidden" name="err_url" value="<?=$url?>">
            <input type="hidden" name="id" value="<?=$_POST['id']?>">
            <input type="hidden" name="user_id" value="<?=$_POST['user_id']?>">
            <input type="hidden" name="action" value="sert_delete">
            <input type='submit' value='Удалить' />
        </form>
    
    <?endif;
endif;