<?php 
    if (isset($_POST['add_post'])) {

        $post_title = $_POST['title'];
        $post_category_id = $_POST['post_category'];
        $post_author = $_POST['author'];
        $post_status = $_POST['post_status'] ;

        $post_image = $_FILES['image']['name'];
        $post_image_tmp = $_FILES['image']['tmp_name'];
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date("d-m-y");

        // The uploaded image is moved to the images folder
        move_uploaded_file($post_image_tmp,"../images/$post_image");

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";

        $create_post_query = mysqli_query($connect, $query);

        confirmQuery($create_post_query);
    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="">Category</label>
        <select name="post_category" id="" class="form-control">
            <?php
            // Select all data from categories
            $query = "SELECT * FROM categories";
            // Connect data for getting data from categories
            $select_categories = mysqli_query($connect, $query);

            confirmQuery($select_categories);

            // Fetch the category from categories table by associative array
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row["cat_id"];
                $cat_title = $row['cat_title'];

                echo "
                        <option value='{$cat_id}'>{$cat_title}</option>
                    ";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" name="post_status" class="form-control">
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="add_post" value="Add Post">
    </div>
</form>