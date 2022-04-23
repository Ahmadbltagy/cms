<?php 
  if(isset($_POST["create_post"]) ){
    $title      = $_POST["title"];
    $author     = $_POST["author"];
    $cat_id     = $_POST["post_category"];
    $status     = $_POST["post_status"];
    $img        = $_FILES["image"]["name"];
    $tags       = $_POST["post_tags"];
    $content    = $_POST["post_content"];
    
    addPost($title, $author, $status , $img , $tags, $content );
  }
?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title" />
  </div>

  <div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author" />
  </div>

  <div class="form-group">
    <label for="category">Category</label>
    <select name="post_category" id="">
      <option value="1">1</option>
    </select>
  </div>

  <div class="form-group">
    <label for="users">Users</label>
    <select name="post_user" id=""></select>
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
    <input type="text" class="form-control" name="post_tags" />
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea
      class="form-control"
      name="post_content"
      id=""
      cols="30"
      rows="10"
    ></textarea>
  </div>

  <div class="form-group">
    <input
      class="btn btn-primary"
      type="submit"
      name="create_post"
      value="Publish Post"
    />
  </div>
</form>
