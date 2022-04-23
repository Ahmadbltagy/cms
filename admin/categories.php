<?php include "includes/header.php"; ?>
<?php include "includes/crud.php" ?>

<div id="wrapper">
  <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin 
                            <small>Auhtor</small>
                        </h1>
                        <?php 
                          if( isset($_POST["submit"])){
                            $cat_title = $_POST["cat-title"];
                            if($cat_title == " " || empty($cat_title) )
                              echo "<h1>This field is required</h1>";
                            else
                              create($cat_title);
                          }
                          if( isset($_GET['delete']) ){
                            $cat_id = $_GET['delete'];
                            delete($cat_id);
                          }
                          
                          if( isset($_POST["update"]) ){
                            $cat_id = $_GET["edit"];
                            $cat_title = $_POST['cat-title'];
                            update($cat_id, $cat_title);
                          }
                          
                        ?>                      
                        <div class="col-xs-6">
                          <form action="" method="post">
                            <div class="form-group">
                              <label for="cat-title">Add Category</label>
                              <input type="text" name="cat-title" class="form-control">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                          </form>
                        </div>

                     


                        
                        <div class="col-xs-6">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Category title</th>
                                <th colspan=2 style="text-align: center;">Options</th>
                              </tr>
                            </thead>

                              <?php 
                                $data = read("categories");
                                foreach($data as $row){
                                  $cat_id    =  $row["cat_id"];
                                  $cat_title =  $row["cat_title"];

                                  echo "<tr>";
                                  echo "<td> {$cat_id} </td>";
                                  echo "<td> {$cat_title} </td>";
                                  echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a> </td>";
                                  echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a> </td>";
                                  echo "</tr>"; 
                                }          
                              ?>
                            
                          </table>
                        </div>

                        <div class="col-xs-6" style="display:<?php echo isset($_GET['edit'])? 'block' : 'none';?>" >
                          <form action="" method="post">
                            <div class="form-group">
                              <label for="cat-title">Edit Category</label>
                              <input  type="text" name="cat-title" class="form-control" value="<?php 
                                if(isset($_GET['edit']) ){
                                  $cat_id = $_GET['edit'];
                                  echo specificRow($cat_id);
                                }
                                ?>">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="update" value="Update Category">
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/footer.php" ?>