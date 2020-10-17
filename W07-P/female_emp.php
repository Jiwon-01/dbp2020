<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');
  $query = "
            SELECT first_name, last_name, gender, salary, from_date, to_date
            FROM salaries 
            LEFT JOIN employees on salaries.emp_no = employees.emp_no
            WHERE gender = 'F'
            ORDER BY salary DESC LIMIT 10
            ";

  $result = mysqli_query($link, $query);  
  $emp_info = '';
  while($row = mysqli_fetch_array($result)) {
    $emp_info .= '<tr>';
    $emp_info .= '<td>'.$row['first_name'].'</td>';
    $emp_info .= '<td>'.$row['last_name'].'</td>';
    $emp_info .= '<td>'.$row['gender'].'</td>';
    $emp_info .= '<td>'.$row['salary'].'</td>';
    $emp_info .= '<td>'.$row['from_date'].'</td>';
    $emp_info .= '<td>'.$row['to_date'].'</td>';    
    $emp_info .= '</tr>';
  }  
  
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>직원 관리 시스템</title>
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
    <h2><a href="index.php">직원 관리 시스템</a> | 여성 개발자 연봉 순위</h2>
    <table border="1">
        <tr>
            <th>first_name</th>
            <th>last_name</th>
            <th>gender</th>
            <th>salary</th>
            <th>from_date</th>
            <th>to_date</th>
        </tr>
        <?= $emp_info ?>

    </table>
</body>

</html>