<table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>images</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th colspan=2>Options</th>
              </tr>
            </thead>
            
            <tbody>
              <?php 
                $data = read("posts");
                foreach($data as $row){
                  $id          = $row["post_id"];
                  $author      = $row["post_author"];
                  $title       = $row["post_title"];
                  $category    = $row["post_cat_id"];
                  $status      = $row["post_status"];
                  $images      = $row["post_img"];
                  $tags        = $row["post_tags"];
                  $comments    = $row["post_comment_count"];
                  $date        = $row["post_date"];

                  echo "<tr>";
                  echo "<td> $id </td>";
                  echo "<td> $author </td>";
                  echo "<td> $title </td>";
                  echo "<td> $category </td>";
                  echo "<td> $status </td>";
                  echo "<td><img class=\"img-responsive\" src=\"../images/$images\" width=300 height=100> </td>";
                  echo "<td> $tags </td>";
                  echo "<td> $comments </td>";
                  echo "<td> $date </td>";
                  echo "<td> <a href=\"posts.php?source=edit_post&edit={$id}\">Edit </a></td>";
                  echo "<td><a href=\"posts.php?source=view_all_posts&delete={$id}\">Delete</a></td>";
                  echo "</tr>";
                }

                if(isset($_GET['delete']))
                  deletePost($_GET['delete']);
            ?>
            </tbody>
          </table>