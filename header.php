<?session_start();?>
<?include($_SERVER['DOCUMENT_ROOT'].'/functions.php');?>

<?if($_POST["logout"] == "yes"):
    unset($_SESSION['user']);
endif;?>
<?$url = $_SERVER['REQUEST_URI'];
if($_SESSION['user'])
{
    newPage($url, $_SESSION['user']["login"]);
}
$url = explode('?', $url);
$url = $url[0];
?>
<?if($_GET["log"] == "bad"):?>
    <script>
        alert("Логина нет в системе!");
    </script>
<?elseif($_GET["pass"] == "bad"):?>
    <script>
        alert("Неверный пароль!");
    </script>
<?endif;?>

<!doctype html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles.css">
    <title>Три Клоуна</title>
</head>

<body>
    <header>
        <div>
            <div class="main-text">
                <div class="main-title">ТРИ КЛОУНА</div>
                <div class="main-description">"Три клоуна" - первый цирк, не имеющий конферансье. Интерактивная программа проходит под рассказ трёх сменяющих друг друга клоунов</div>
            </div>
            <div class="main-logo">
                <?if($url != "/"):?>
                    <a href="/">
                        <img src="/icon.png" alt="">
                    </a>
                <?else:?>
                    <img src="/icon.png" alt="">
                <?endif;?>
            </div>
            <div class="auth">
                <?if(empty($_SESSION['user'])):?>
                    <form method="post" action="/auth/users.php">
                        <input type="hidden" name="url" value="<?=$url?>">
                        <input type="text" name="login" size="15" placeholder="Логин">
                        <input type="password" name="password" size="15" placeholder="Пароль">
                        <button type="submit">Авторизоваться</button>
                    </form>
                    <form method="post" action="/auth/registration.php">
                        <input type="hidden" name="url" value="<?=$url?>">
                        <button type="submit">Регистрация</button>
                    </form>
                <?else:?>
                    Здравствуйте, <a href="/auth/profile.php"><?=$_SESSION['user']['name']?></a>
                    <br>
                    <?if($_SESSION['user']['city']):?>
                        Ваш город: <?=$_SESSION['user']['city']==1?"Волгоград":"Москва"?>
                    <?else:?>
                        <form method="post" action="/auth/city.php">
                        <input type="hidden" name="id" value="<?=$_SESSION['user']['id']?>">
                        <input type="hidden" name="url" value="<?=$url?>">
                        <select name="city" size="2" multiple>
                            <option selected value="1">Волгоград</option>
                            <option value="2">Москва</option>
                        </select>
                        <button type="submit">Выбрать</button>
                    </form>
                    <?endif;?>
                    <form method="post" action="<?=$url?>">
                        <input type="hidden" name="logout" value="yes">
                        <button type="submit">Выйти</button>
                    </form>
                <?endif;?>
            </div>
            
            <div class="menu">
                <a href="/category/">
                    <div class="item">Категории артистов</div>
                </a>
                <a href="/place/">
                    <div class="item">Цирковые площадки</div>
                </a>
                <!-- <a href="/search/">
                    <div class="item">Поиск</div>
                </a> -->
                <?if(!empty($_SESSION['user'])):?>
                    <a href="/auth/weather.php">
                        <div class="item">Сегодняшняя погода</div>
                    </a>
                <?endif;?>
                <?if($_SESSION['user'] && $_SESSION['user']['login'] == "admin"):?>
                    <a href="/tickets.php">
                        <div class="item">Брони</div>
                    </a>
                <?endif;?>
            </div>
            
        </div>
    </header>
    <div class="page">
        <?
        if (file_exists("left-menu.php")):?>
            <div class="left-menu">
                <?include "left-menu.php";?>
            </div>
        <?endif;?>
        <div class="content">