<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "seoul");
  $query = "
  SELECT stnNum, stnName, serviceSection
  FROM metro
  WHERE serviceSection = ''
  ";
  $result = mysqli_query($link, $query);
  $admin_info = '';
  while ($row = mysqli_fetch_array($result)) {
      $admin_info .= '<tr>';
      $admin_info .= '<td>'.$row['stnNum'].'</td>';
      $admin_info .= '<td>'.$row['stnName'].'</td>';
      $admin_info .= '<td>'.$row['serviceSection'].'</td>';

      $admin_info .= '</tr>';
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
    <h2><a href="index.php">교통약자 이용시설</a> | 추가 정보 필요</h2>
    <table border="1">
        <tr>
            <th>stnNum</th>
            <th>stnName</th>
            <th>serviceSection</th>
        </tr>
        <?= $admin_info ?>

    </table>
</body>

</html>
