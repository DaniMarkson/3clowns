<?
$res = array();
if(!empty($_POST["quests"]))
{
    $age=($_POST["age"])?1:0;
    $user_id=$_POST["user_id"];
    $name=$_POST['name'];
    $quests=$_POST['quests'];
    $conn = mysqli_connect('127.0.0.1','mysql','mysql','users');

    $sql = "INSERT INTO tickets (id, user_id, name, age, quests) VALUES (NULL, '$user_id', '$name', '$age', '$quests')";

    if (mysqli_query($conn, $sql)) {
        setcookie("handler", 'Билет оформлен!', time()+60);
        $res = 'Билет оформлен!';
    } else {
        setcookie("handler", 'Попробуйте повторить заявку!', time()+60);
        $res = 'Попробуйте повторить заявку!';
    }
    mysqli_close($conn);
    
}
else
{
    setcookie("handler", 'Заполните поле!', time()+60);
    $res = 'Заполните поле!';
}
echo json_encode($res);
?>