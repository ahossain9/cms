
        <?php
        
        if(isset($_POST['create_post'])){
            $post_author = $_POST['post_author'];
           $post_title = $_POST['post_title'];
            $post_category_id = $_POST['post_category_id'];
            $post_status = $_POST['post_status'];
            $post_image = $_FILES['post_image']['name'];
            $post_image_temp = $_FILES['post_image']['tmp_name'];
            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            $post_comment_count = 4;
            $post_date = date('d-m-y');
        
            move_uploaded_file($post_image_temp, "../images/$post_image");
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="post_title">Post Title</label>
                <input type="text" class="form-control" name="post_title">
            </div>
            <div class="form-group">
                <label for="post_category_id">Post Categoty Id</label>
                <input type="text" class="form-control" name="post_category_id">
            </div>
            <div class="form-group">
                <label for="post_author">Post Author</label>
                <input type="text" class="form-control" name="post_author">
            </div>
            <div class="form-group">
                <label for="post_image">Post Image</label>
                <input type="file" class="form-control" name="post_image">
            </div>
            <div class="form-group">
                <label for="post_status">Post Status</label>
                <input type="text" class="form-control" name="post_status">
            </div>
            <div class="form-group">
                <label for="post_tags">Post Tags</label>
                <input type="text" class="form-control" name="post_tags">
            </div>
            <div class="form-group">
                <label for="post_content">Post Content</label>
                <textarea type="text" class="form-control" name="post_content" cols="30" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="create_post">Submit</button>
        </form>