<?php

  function founded(){
    global $connection;
    global $search;
    if(isset($_POST['submit']))
      $search = $_POST["search"];

    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
    $search_q = mysqli_query($connection, $query);

    return mysqli_num_rows($search_q);
  }
  
?>