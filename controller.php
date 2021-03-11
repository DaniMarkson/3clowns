<?if($_POST["action"]=="final_edit"):
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
            $text = 'Изменен билет №'.$id;
            $sql = "INSERT INTO log ( `text` ) VALUES ( '$text' )";
            mysqli_query($conn, $sql);
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
elseif($_POST["action"]=="delete"):
    $id = $_POST["id"];
    $mysql = new mysqli('127.0.0.1','mysql','mysql','users');
    $res = $mysql->query("DELETE FROM `tickets` WHERE `id` = '$id'");
    $text = 'Удален билет №'.$id;
    $mysql->query("INSERT INTO log ( `text` ) VALUES ( '$text' )");
    $url = $_POST["url"];
    $filename='upload/'.$_POST["user_id"].'/'.$_POST["id"].'.txt';
    if(file_exists($filename))
    {
        unlink($filename);
    }
    header('Location: '.$url);
elseif($_POST["action"]=="sert_delete"):
    $url = $_POST["url"];
    $err_url = $_POST["err_url"];
    $name = 'upload/'.$_POST["user_id"].'/'.$_POST["id"].'.txt';
    if(unlink($name))
    {
        header('Location: '.$url);
    }
    else
    {
        header('Location: '.$err_url.'?error=3');
    }
elseif($_POST["action"]=="sert_add"):
    if ($_FILES && $_FILES['filename']['error']== UPLOAD_ERR_OK && $_FILES['filename']['type'] == "text/plain")
    {
        $url = $_POST["url"];
        $err_url = $_POST["err_url"];
        $name = 'upload/'.$_POST["user_id"].'/'.$_POST["id"].'.txt';
        if(move_uploaded_file($_FILES['filename']['tmp_name'], $name))
        {
            header('Location: '.$url);
        }
        else
        {
            header('Location: '.$err_url.'?error=1');
        }
    }
endif;?>