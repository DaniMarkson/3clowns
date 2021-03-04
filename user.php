<?include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>

<h1>Личный кабинет</h1>
<div class="item">
    <img src="/user.png">
    <div class="description">
        <div class="title">Пользователь: <?=$_SESSION['user']['login']?></div>
        <div class="text">Имя: <?=$_SESSION['user']['name']?></div>
    </div> 
</div>

<?include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>