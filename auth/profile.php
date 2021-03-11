<?include ($_SERVER['DOCUMENT_ROOT'].'/controller.php');?>
<?include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>


<?if(!empty($_SESSION['user'])):?>

    <h1>Личный кабинет<?=$user?" пользователя ".$user['login']:""?></h1>

    <div class="item">
        <img src="/user.png">
        <div class="description">
            <div class="title">Пользователь: <?=$user?$user['login']:$_SESSION['user']['login']?></div>
            <div class="text">
                Имя: <?=$user?$user['name']:$_SESSION['user']['name']?><br>
                Адрес: г. <?=$_SESSION['user']['city']==1?"Волгоград":"Москва"?>
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
<?include ($_SERVER['DOCUMENT_ROOT'].'/controller_without_headers.php');?>
<?else:?>
    Пожалуйста, авторизуйтесь на сайте
<?endif;?>

<?include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>