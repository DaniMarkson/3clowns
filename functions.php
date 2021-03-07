<?
function getGymnasts(int $sum)
{
    $gumnasts = array();
    $mysql = new mysqli('127.0.0.1','mysql','mysql','users');
    $result = $mysql->query("SELECT * FROM `gymnasts`");
    while($gym = $result->fetch_assoc())
    {
        $gymnasts[] = $gym;
    }
    foreach($gymnasts as $index => $gym)
    {
        $gymnasts[$index]['img'] = '/gym'.$index.'.jpg';
    }
    $index=0;
    while(count($gymnasts)<$sum)
    {
        $gymnasts[]=$gymnasts[$index];
        $index++;
    }
    if(count($gymnasts)>$sum)
    {
        $temp = array();
        for($i=0; $i<$sum; $i++)
        {
            $temp[] = $gymnasts[$i];
        }
        $gymnasts=$temp;
    }
return $gymnasts;
}

function outGym(int $sum, int $inPage, string $url)
{
    $arrayGym = getGymnasts($sum);
    $result = array();
    $ret = "";
    if(empty($_GET["page"]))
    {
        $page = 1;
    }
    else
    {
        $page = $_GET['page'];
    }
    $index = $inPage * ($page-1);
    for($i=$index; ($i<$index+$inPage)&&($i<$sum); $i++)
    {
        $result[] = $arrayGym[$i];
    }
    foreach($result as $item)
    {
        $ret .= '<div class="item"><img src="'.$item['img'].'">
        <div class="description">
            <div class="title">'.$item['name'].'</div>
            <div class="text">'.$item['description'].'</div>
        </div> 
    </div>';
    }
    $ret.= '<div class="nav">';
    if($page>1)
    {
        $ret.= '<a href="'.$url.'">Начало</a>';
        $ret.= '<a href="'.$url.'?page='.($page-1).'">Предыдущая</a>';
    }
    $value = $sum;
    $pages = 0;
    $active='';
    if($value%$inPage>0)
    {
        while($value%$inPage>0)
        {
            $value--;
        }
        $pages = $value/$inPage + 1;
    }
    else
    {
        $pages = $value/$inPage;
    }
    for($i=0; $i<$pages; $i++)
    {
        if(($i+1) == $page)
        {
            $active = ' class="active"';
        }
        $ret .= '<a href="'.$url.'?page='.($i+1).'"'.$active.'>'.($i+1).'</a>';
    }
    if($page<$pages)
    {
        $ret.= '<a href="'.$url.'?page='.($page+1).'">Следующая</a>';
        $ret.= '<a href="'.$url.'?page='.$pages.'">Конец</a>';
    }
    $ret.= '</div>';
     return $ret;
}

function getTickets($id)
{
    $url = $_SERVER['REQUEST_URI'];
    $tickets = array();
    $mysql = new mysqli('127.0.0.1','mysql','mysql','users');
    if ($id == "admin")
    {
        $res = $mysql->query("SELECT * FROM `tickets`");
    }
    else
    {
        $res = $mysql->query("SELECT * FROM `tickets` WHERE `user_id` = '$id'");
    }
    while($ticket = $res->fetch_assoc())
    {
        $tickets[] = $ticket;
    }
    $result='';
    foreach($tickets as $tick)
    {
        $tick["age"] = $tick["age"]==1?'Взрослые':'Дети';
        $result.='<tr>';
        foreach($tick as $key => $t)
        {
            if($id != "admin" || $key != "name")
            {
                $result .= '<td>'.$t.'</td>';
            }
            else
            {
                $result .= '<td><a href="/user.php?profile='.$tick["user_id"].'">'.$t.'</a></td>';
            }
        }
        if ($id != "admin")
        {
            $result .= '<td><form action="/edit-tickets.php" method="post">
            <input type="hidden" name="url" value="'.$url.'">
            <input type="hidden" name="id" value="'.$tick["id"].'">
            <button type="submit">Редактировать</button>
            </form></td>';
            $result .= '<td><form action="/edit-delete-tickets.php" method="post">
            <input type="hidden" name="url" value="'.$url.'">
            <input type="hidden" name="id" value="'.$tick["id"].'">
            <input type="hidden" name="user_id" value="'.$tick["user_id"].'">
            <input type="hidden" name="act" value="delete">
            <button type="submit">Удалить</button>
            </form></td>';
            $result .= '<td><form action="/sertificate.php" method="post">
            <input type="hidden" name="url" value="'.$url.'">
            <input type="hidden" name="id" value="'.$tick["id"].'">
            <input type="hidden" name="user_id" value="'.$tick["user_id"].'">
            <button type="submit">Сертификат</button>
            </form></td>';
        }
        $result .='</tr>';
    }
    echo $result;
}
?>