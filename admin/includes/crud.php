<?php 
  function create($cat_title){  
    global $connection;
    
    $query = "INSERT INTO categories(cat_title) VALUES ('$cat_title');";
    mysqli_query($connection, $query);
    
  }
  
  function read($tableName){
    global $connection;
    $arr = array();
    $query = "SELECT * FROM {$tableName}";
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


  //Posts Crud
  function addPost($title, $author, $status , $img , $tags, $content){
   global $connection;
   $query = "INSERT INTO posts(post_title, post_author, post_status, post_img, post_tags, post_content)";
   $query .= " VALUES ('$title', '$author', '$status', '$img' , '$tags', '$content')";
   mysqli_query($connection, $query); 
  }

  function deletePost($post_id){
    global $connection;
    $query = "DELETE FROM posts WHERE post_id='{$post_id}'";
    mysqli_query($connection, $query);
  }