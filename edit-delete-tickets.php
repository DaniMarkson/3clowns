<?if (!empty($_POST['act'])):
    $id = $_POST["id"];
    $mysql = new mysqli('127.0.0.1','mysql','mysql','users');
    $res = $mysql->query("DELETE FROM `tickets` WHERE `id` = '$id'");
    $url = $_POST["url"];
    $filename='upload/'.$_POST["user_id"].'/'.$_POST["id"].'.txt';
    if(file_exists($filename))
    {
        unlink($filename);
    }
    header('Location: '.$url);
else:
    if(!empty($_POST["quests"]))
    {
        $success = false;
        $age=($_POST["age"])?1:0;
        $quests=$_POST['quests'];
        $id = $_POST["id"];
        $url = $_POST["url"];
        $err_url = $_POST["err_url"];
        $conn = mysqli_connect('127.0.0.1','mysql','mysql','users');
        $sql = "UPDATE tickets SET age='$age', quests='$quests' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            $success = true;
        }
        mysqli_close($conn);
        if ($success) {
            header('Location: '.$url);
        } else {
            header('Location: '.$err_url.'?error=1');
        }
    }
    else
    {
        header('Location: '.$_POST["err_url"].'?error=2');
    }
endif;?>