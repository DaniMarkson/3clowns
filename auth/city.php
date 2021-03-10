<?
if($_POST["city"])
{
    $id = $_POST["id"];
    $city = $_POST["city"];

    $mysql = new mysqli('127.0.0.1','mysql','mysql','users');
    $mysql->query("UPDATE username SET city='$city' WHERE id='$id'");
    session_start();
    $_SESSION['user']['city'] = $city;
    header('Location: '.$_POST["url"]);
}
?>