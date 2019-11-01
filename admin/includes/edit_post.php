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
            <label for="post_category_id">Post Categoty Id</label>
            <input type="text" class="form-control" value="<?php echo $post_category_id; ?>"  name="post_category_id">
        </div>
        <div class="form-group">
            <label for="post_author">Post Author</label>
            <input type="text" class="form-control" value="<?php echo $post_author; ?>" name="post_author">
        </div>
        <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" class="form-control" name="post_image">
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
