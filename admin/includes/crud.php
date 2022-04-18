<?php 
  function create($cat_title){  
    global $connection;
    
    $query = "INSERT INTO categories(cat_title) VALUES ('$cat_title');";
    mysqli_query($connection, $query);
    
  }
  
  function read(){
    global $connection;
    $arr = array()  ;
    $query = "SELECT * FROM categories";
    $read_q = mysqli_query($connection, $query);
    
    while ($row = mysqli_fetch_assoc($read_q))
      array_push($arr, $row);
    return $arr; 
  }

  function update($cat_id, $cat_title){
    global $connection;
    $query = "UPDATE categories SET cat_title='{$cat_title}' WHERE cat_id='{$cat_id}'";
    mysqli_query($connection, $query);
  }

  function delete($cat_id){
    global $connection;
    $query = "DELETE FROM categories WHERE cat_id='$cat_id'";
    mysqli_query($connection, $query);
  }

  function specificRow($cat_id){
    global $connection;
    $query = "SELECT * FROM categories where cat_id='{$cat_id}'";
    $read_q = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($read_q))
      return $cat_title = $row['cat_title'];
    
  }