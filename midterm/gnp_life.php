<?php
  $link = mysqli_connect('localhost', 'root', 'rootroot', 'world');
  $query = "
  SELECT name, gnp, lifeexpectancy
  FROM country
  ORDER BY gnp DESC
  LIMIT 30;
  ";
  $result = mysqli_query($link, $query);
  $gnp_info = '';
  while ($row = mysqli_fetch_array($result)) {
      $gnp_info .= '<tr>';
      $gnp_info .= '<td>'.$row['name'].'</td>';
      $gnp_info .= '<td>'.$row['gnp'].'</td>';
      $gnp_info .= '<td>'.$row['lifeexpectancy'].'</td>';


      $gnp_info .= '</tr>';
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
    <h2><a href="index.php">세계 정보 분석</a> | GNP와 기대수명의 상관 관계</h2>
    <table border="1">
        <tr>
            <th>Country</th>
            <th>GNP</th>
            <th>Life Expectancy</th>
        </tr>
        <?= $gnp_info ?>

    </table>
</body>

</html>
