<?include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>
<?if(!empty($_SESSION['user'])):?>
<h1>Личный кабинет</h1>
<div class="item">
    <img src="/user.png">
    <div class="description">
        <div class="title">Пользователь: <?=$_SESSION['user']['login']?></div>
        <div class="text">Имя: <?=$_SESSION['user']['name']?></div>
    </div> 
</div>
<hr>
<table border="1" cellspacing="5" cellpadding="2" width="600">
    <tr>
        <td>Номер билета</td>
        <td>ID пользователя</td>
        <td>Имя</td>
        <td>Возрастная категория</td>
        <td>Количество гостей</td>
    </tr>
    <?getTickets($_SESSION['user']['id'])?>
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
<?endif;?>
<?include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>