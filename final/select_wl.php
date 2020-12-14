<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "seoul");
  $query = "
  SELECT stnName, serviceSection, location, availability
  FROM metro
  WHERE note = 'WL'
  ";
  $result = mysqli_query($link, $query);
  $wl_info = '';
  while ($row = mysqli_fetch_array($result)) {
      $wl_info .= '<tr>';
      $wl_info .= '<td>'.$row['stnName'].'</td>';
      $wl_info .= '<td>'.$row['serviceSection'].'</td>';
      $wl_info .= '<td>'.$row['location'].'</td>';
      $wl_info .= '<td>'.$row['availability'].'</td>';

      $wl_info .= '</tr>';
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
    <h2><a href="index.php">교통약자 이용시설</a> | 휠체어 리프트 조회</h2>
    <table border="1">
        <tr>
            <th>stnName</th>
            <th>serviceSection</th>
            <th>location</th>
            <th>availability</th>
        </tr>
        <?= $wl_info ?>

    </table>
</body>

</html>
