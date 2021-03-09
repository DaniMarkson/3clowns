<?if(!empty($_POST["login"]) && !empty($_POST["password"]) && !empty($_POST["name"]))
{
    $login = $_POST["login"];
    $password = $_POST["password"];
    $name = $_POST["name"];

    $mysql = new mysqli('127.0.0.1','mysql','mysql','users');

    $result = $mysql->query("SELECT * FROM `username` WHERE `login` = '$login'");
    $existUser = $result->fetch_assoc();
    if(!empty($existUser))
    {
        header('Location: ' . $_POST['err_url'] . '?error=2');
    }
    else
    {
        if(strlen($password)<3 || strlen($password)>10)
        {
            header('Location: ' . $_POST['err_url'] . '?error=3');
        }
        else
        {
            $mysql->query("INSERT INTO username (id, login, password, name) VALUES (NULL, '$login', '$password', '$name')");
            $result = $mysql->query("SELECT * FROM `username` WHERE `login` = '$login'");
            $user = $result->fetch_assoc();
            if (!empty($user)) {
                session_start();
                $_SESSION['user'] = [
                    "id" => $user['id'],
                    "login" => $user['login'],
                    "name" => $user['name'],
                ];
                header('Location: '.$_POST["url"]);
            }
            header('Location: '.$_POST["url"]);
        }
    }
}
else
{
    header('Location: ' . $_POST['err_url'] . '?error=1');
}