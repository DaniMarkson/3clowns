<?include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>

<h1>Регистрация</h1>

<?if($_GET['error']==1):?>
    <font color="red">Пожалуйста заполните все поля</font>
<?elseif($_GET['error']==2):?>
    <font color="red">Пользователь с таким логином уже существует</font>
<?elseif($_GET['error']==3):?>
    <font color="red">Пароль должен быть от 3 до 10 символов</font>
<?endif;?>

<form action="reg.php" method="post" name="registration">
    <input type="hidden" name="url" value="<?=$_POST['url']?$_POST['url']:$url?>">
    <input type="hidden" name="err_url" value="<?=$url?>">
    <input type="text" name="login" placeholder="Логин">
    <input type="password" name="password" placeholder="Пароль">
    <input type="text" name="name" placeholder="Ваше имя">
    <button type="submit">Зарегистрироваться</button>
</form>

<?include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>
