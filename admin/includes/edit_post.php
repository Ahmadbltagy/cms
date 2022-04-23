<?php 
  if(isset($_GET["edit"]) ){
    $row = updatePostData($_GET["edit"]);
    global $post_title, $post_author, $post_cat;
    foreach($row as $data){
      $post_title     = $data['post_title'];
      $post_author    = $data['post_author'];
      $post_cat       = $data['post_cat_id'];
      $post_user      = $data['post_user'];
      $post_status    = $data['post_status'];
      $post_img       = $data['post_img'];
      $post_tags      = $data['post_tags'];
      $post_content   = $data['post_content'];
  
    }
    if(isset($_POST['update_post'])){
      
      $title      = $_POST["title"];
      $author     = $_POST["author"];
      $cat_id     = $_POST["post_category"];
      $status     = $_POST["post_status"];
      $img        = $_FILES["image"]["name"];
      $img_tmp    = $_FILES["image"]["tmp_name"];
      $tags       = $_POST["post_tags"];
      $content    = $_POST["post_content"];  
      move_uploaded_file($img_tmp, "../images/$img");
      
      updatePost($title, $author, $status , $img , $tags, $content, $_GET['edit']);
   
    }
  }
  
?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $post_title?>"/>
  </div>

  <div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author" value="<?php echo $post_author?>"/>
  </div>

  <div class="form-group">
    <label for="category">Category</label>
    <select name="post_category" id="">
      <option value="<?php echo $post_cat?>"><?php echo $post_cat?></option>
    </select>
  </div>

  <div class="form-group">
    <label for="users">Users</label>
    <select name="post_user" id="" value="<?php echo $post_user?>"></select>
  </div>

  <!-- <div class="form-group">
         <label for="title">Post Author</label>
          <input type="text" class="form-control" name="author">
      </div> -->

  <div class="form-group">
    <select name="post_status" id="">
      <option value="draft">Post Status</option>
      <option value="published">Published</option>
      <option value="draft">Draft</option>
    </select>
  </div>

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image" />
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags"  value="<?php echo $post_tags?>"/>
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea
      class="form-control"
      name="post_content"
      id=""
      cols="30"
      rows="10"
    ><?php echo $post_content;?></textarea>
  </div>

  <div class="form-group">
    <input
      class="btn btn-primary"
      type="submit"
      name="update_post"
      value="Update Post"
    />
  </div>
</form>
