<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <?php

            // Select all data from categoried
            $query = "SELECT * FROM categories";
            // Connect data for getting data from categories
            $select_categories_sidebar = mysqli_query($connection, $query);

        ?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php

                        // Fetch the category from categories table by associative array
                        while ($row = mysqli_fetch_assoc($select_categories_sidebar)) 
                        {
                            $cat_id = $row["cat_id"];
                            $cat_title = $row["cat_title"];

                            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                        }                                
                    
                    ?>                                
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <?php 
        include("includes/widget.php");
    ?>


</div>