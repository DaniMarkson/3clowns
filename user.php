<?include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>
<?
if($_SESSION['user']['login']=="admin" && $_GET['profile'])
{
    $id = $_GET['profile'];
    $mysql = new mysqli('127.0.0.1','mysql','mysql','users');
    $result = $mysql->query("SELECT * FROM `username` WHERE `id` = '$id'");
    $user = $result->fetch_assoc();
}
?>
<?if(!empty($_SESSION['user'])):?>

    <h1>Личный кабинет<?=$user?" пользователя ".$user['login']:""?></h1>
    
    <div class="item">
        <img src="/user.png">
        <div class="description">
            <div class="title">Пользователь: <?=$user?$user['login']:$_SESSION['user']['login']?></div>
            <div class="text">
                Имя: <?=$user?$user['name']:$_SESSION['user']['name']?><br>
                Адрес: 
            </div>
        </div> 
    </div>
    <hr>
    <table border="1" cellspacing="5" cellpadding="5" width="600">
        <tr>
            <td>Номер билета</td>
            <td>ID пользователя</td>
            <td>Имя</td>
            <td>Возрастная категория</td>
            <td>Количество гостей</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?if($user)
        {
            getTickets($id);
        }
        else
        {
            getTickets($_SESSION['user']['id']);
        }?>
    </table>
    Оформить билет:
    <form class="ticket" method="post">
        <input type="hidden" name="user_id" value="<?=$_SESSION['user']['id']?>">
        <input type="hidden" name="name" value="<?=$_SESSION['user']['name']?>">
        <input type="number" name="quests" placeholder="Количество">
        <input type="checkbox" name="age" value="1" id="age"><label for="age">Взрослые</label>
        <button type="submit">Оформить</button>
    </form>
    <div class="res"><?=$_COOKIE['handler']?></div>
<?else:?>
    Пожалуйста, авторизуйтесь на сайте
<?endif;?>
<?include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>