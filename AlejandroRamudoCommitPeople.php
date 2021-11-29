<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit people</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'people':
        $query = 'INSERT INTO
            people
                (people_fullname, people_isactor, people_isdirector)
            VALUES
                ("' . $_POST['people_name'] . '",
                 ' . $_POST['is_actor'] . ',
                 ' . $_POST['is_director'] . ')';
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'people':
        $query = 'UPDATE people SET
                people_fullname = "' . $_POST['people_name'] . '",
                people_isactor = ' . $_POST['is_actor'] . ',
                people_isdirector = ' . $_POST['is_director'] . '
            WHERE
                people_id = ' . $_POST['people_id'];
        break;
    }
    break;
}

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
  <form action="admin.php">
	<input type="submit" value="Volver">
  </form>
 </body>
</html>