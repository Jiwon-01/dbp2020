<?php
  $link = mysqli_connect('localhost', 'root', 'rootroot', 'world');
  $query = "
  SELECT name, continent, governmentform
  FROM country
  WHERE continent = 'Asia'
  ORDER BY gnp DESC
  LIMIT 20;
  ";
  $result = mysqli_query($link, $query);
  $gov_info = '';
  while ($row = mysqli_fetch_array($result)) {
      $gov_info .= '<tr>';
      $gov_info .= '<td>'.$row['name'].'</td>';
      $gov_info .= '<td>'.$row['continent'].'</td>';
      $gov_info .= '<td>'.$row['governmentform'].'</td>';


      $gov_info .= '</tr>';
  }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>세계 정보 분석</title>
    <style>
        body{
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table{
            width: 80%;
        }
        th,td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>

<body>
    <h2><a href="index.php">세계 정보 분석</a> | 아시아의 정부 형태</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Continent</th>
            <th>Government Form</th>
        </tr>
        <?= $gov_info ?>

    </table>
</body>

</html>
