<?
if($_POST["act"]=="delete")
{
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
}
elseif ($_FILES && $_FILES['filename']['error']== UPLOAD_ERR_OK && $_FILES['filename']['type'] == "text/plain")
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
else
{
    header('Location: '.$err_url.'?error=2');
}
?>