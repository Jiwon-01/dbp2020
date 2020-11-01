<?php
  $link = mysqli_connect('localhost', 'root', 'rootroot', 'world');
  $query = "
  SELECT name, language
  FROM city
  LEFT JOIN countryLanguage on city.countryCode = countryLanguage.countryCode
  ORDER BY population DESC LIMIT 30
  ";
  $result = mysqli_query($link, $query);
  $lang_info = '';
  while ($row = mysqli_fetch_array($result)) {
      $lang_info .= '<tr>';
      $lang_info .= '<td>'.$row['name'].'</td>';
      $lang_info .= '<td>'.$row['language'].'</td>';


      $lang_info .= '</tr>';
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
    <h2><a href="index.php">세계 정보 분석</a> | 언어 정보 조회</h2>
    <table border="1">
        <tr>
            <th>City</th>
            <th>Language</th>
        </tr>
        <?= $lang_info ?>

    </table>
</body>

</html>
