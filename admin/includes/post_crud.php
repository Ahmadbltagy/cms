<?php 
function read(){
  global $connection;
  $posts = array();

  $query = "SELECT * FROM posts";
  $read_q = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($read_q))
    array_push($posts, $row);
  return $posts;
}