<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "seoul");
  $query = "
  SELECT stnName, serviceSection, location
  FROM metro
  WHERE availability = '사용가능'
  ";
  $result = mysqli_query($link, $query);
  $av_info = '';
  while ($row = mysqli_fetch_array($result)) {
      $av_info .= '<tr>';
      $av_info .= '<td>'.$row['stnName'].'</td>';
      $av_info .= '<td>'.$row['serviceSection'].'</td>';
      $av_info .= '<td>'.$row['location'].'</td>';

      $av_info .= '</tr>';
  }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>서울 교통약자 이용시설</title>
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
    <h2><a href="index.php">교통약자 이용시설</a> | 사용 가능 역 조회</h2>
    <table border="1">
        <tr>
            <th>stnName</th>
            <th>serviceSection</th>
            <th>location</th>
        </tr>
        <?= $av_info ?>

    </table>
</body>

</html>
