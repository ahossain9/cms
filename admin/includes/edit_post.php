<?php
if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id']; 
}
        $query = "SELECT * FROM posts";
        $select_posts_by_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_posts_by_id)){
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_content = $row['post_content'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];

        }
        

    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="post_title">Post Title</label>
            <input type="text" class="form-control" value="<?php echo $post_title; ?>" name="post_title">
        </div>
        <div class="form-group">
        <label for="">Category</label>
            <select name="post_category" id="" class="form-control">
                <?php
                    global $connection;
                    // Select all data from categories
                    $query = "SELECT * FROM categories";
                    // Connect data for getting data from categories
                    $select_categories = mysqli_query($connection, $query);

                    confirmQuery($select_categories);

                    // Fetch the category from categories table by associative array
                    while ($row = mysqli_fetch_assoc($select_categories)) {
                        $cat_id = $row["cat_id"];
                        $cat_title = $row['cat_title'];

                        echo "<option value='{$cat_id}'>{$cat_title}</option>";
                    }
        
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="post_author">Post Author</label>
            <input type="text" class="form-control" value="<?php echo $post_author; ?>" name="post_author">
        </div>
        <div class="form-group">
            <img src="../images/<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>" width="100">
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="post_status">Post Status</label>
            <input type="text" class="form-control" value="<?php echo $post_status; ?>" name="post_status">
        </div>
        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" value="<?php echo $post_tags; ?>" name="post_tags">
        </div>
        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea type="text" class="form-control" name="post_content" cols="30" rows="10"><?php echo $post_content; ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="update_post">Update Post</button>
    </form>
