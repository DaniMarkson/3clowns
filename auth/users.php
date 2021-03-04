<?
if(!empty($_POST))
{
    $login = $_POST["login"];
    $password = $_POST["password"];
    $mysql = new mysqli('127.0.0.1','mysql','mysql','users');

    $result = $mysql->query("SELECT * FROM `username` WHERE `login` = '$login'");
    $user = $result->fetch_assoc();

    if (!empty($user)) {
        if($user['password'] == $password)
        {
            session_start();
            $_SESSION['user'] = [
                "id" => $user['id'],
                "login" => $user['login'],
                "name" => $user['name'],
            ];
            header('Location: '.$_POST["url"]);
        }
        else
        {
            header('Location: '.$_POST["url"]."?pass=bad");
        }
    }
    else
    {
        header('Location: '.$_POST["url"]."?log=bad");
    }

}
?>