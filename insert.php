<?php
$link = mysqli_connect("localhost", "root", "rootroot", "dbp");
$query = "
  INSERT INTO movie (
    title,
    description,
    created
    ) Value (
      'movie',
      '2020',
      now()
    )
";
//echo $query;
$result = mysqli_query($link, $query);
if($result == false) {
  echo mysqli_error($link);
}

 ?>
