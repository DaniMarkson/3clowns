<?include ($_SERVER['DOCUMENT_ROOT'].'/header.php'); ?>

<?if(!empty($_SESSION['user']) && $_SESSION['user']['login'] == "admin"):?>
    
    <h1>Забронированные места</h1>
    <table border="1" cellspacing="5" cellpadding="5" width="600">
        <tr>
            <td>Номер билета</td>
            <td>ID пользователя</td>
            <td>Имя</td>
            <td>Возрастная категория</td>
            <td>Количество гостей</td>
        </tr>
        <?getTickets("admin")?>
    </table>

<?else:?>
    К сожалению, у Вас не хватает прав для просмотра данной страницы. Пожалуйста, авторизуйтесь.
<?endif;?>

<?include ($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>