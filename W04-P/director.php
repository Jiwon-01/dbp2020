<?php
$link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');

$query = "SELECT * FROM director";
$result = mysqli_query($link, $query);
$director_info = '';

while ($row = mysqli_fetch_array($result)) {
    $filtered = array(
    'id' => htmlspecialchars($row['id']),
    'name' => htmlspecialchars($row['name']),
    'profile' => htmlspecialchars($row['profile'])
  );
    $director_info .= '<tr>';
    $director_info .= '<td>'.$filtered['id'].'</td>';
    $director_info .= '<td>'.$filtered['name'].'</td>';
    $director_info .= '<td>'.$filtered['profile'].'</td>';
    $director_info .= '<td><a href="director.php?id='.$filtered['id'].'">update</a></td>';
    $director_info .= '
    <td>
      <form action="process_delete_director.php" method="post">
        <input type="hidden" name="id" value="'.$filtered['id'].'">
        <input type="submit" value="delete">
        </form>
    </td>';
    $director_info .= '</tr>';
};

$escaped = array(
  'name' => '',
  'profile' => ''
);

$form_action = 'process_create_director.php';
$label_submit = 'Create director';
$form_id = '';

if (isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
    settype($filtered_id, 'integer');
    $query = "SELECT * FROM director WHERE id = {$filtered_id}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $escaped['name'] = htmlspecialchars($row['name']);
    $escaped['profile'] = htmlspecialchars($row['profile']);

    $form_action = 'process_update_director.php';
    $label_submit = 'Update director';
    $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8">
  <title>MOVIES</title>
</head>
<body>
  <h1><a href="index.php">MOVIES</a></h1>
  <p><a href="index.php">movie</a></p>

  <table border="1">
    <tr>
      <th>id</th>
      <th>name</th>
      <th>profile</th>
      <th>update</th>
      <th>delete</th>
    </tr>
    <?= $director_info ?>
  </table>
  <br>
    <form action="<?= $form_action ?>" method="post">
      <?= $form_id ?>
    <label for="fname">name:</label><br>
    <input type="text" id="name" name="name" placeholder="name"
     value="<?=$escaped['name']?>"><br>
    <label for="lname">profile:</label><br>
    <input type="text" id="profile" name="profile" placeholder="profile"
    value="<?=$escaped['profile']?>"><br><br>
    <input type="submit" value="<?= $label_submit ?>">
  </form>
</body>
</html>
