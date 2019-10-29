<?php include "includes/header.php";?>
    <div id="wrapper">
        <?php include "includes/navigation.php";?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                       <?php
                        if(isset($_POST['submit'])){
                            $cat_title = $_POST['cat_title'];
                            
                            if($cat_title == "" || empty($cat_title)){
                                echo "Field should not be empty";
                            }else{
                                $query = "INSERT INTO categories(cat_title)";
                                $query .= "VALUE('{$cat_title}')";
                                
                                $create_category_query = mysqli_query($connection, $query);
                                
                                if(!$create_category_query){
                                    die('QUERY_FAILED' . mysql_error($connection));
                                }
                            }
                        }
                        ?>
                       
                       
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category:</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Add Categories</button>
                        </form>
                           
                        <form action="" method="post">
                            <div class="form-group">
                               <label for="cat_title">Edit Category:</label>
                               <?php
                                if (isset($_GET['edit'])) {
                                    $cat_id_edit = $_GET['edit'];
                                    // Select all data from categories
                                    $query = "SELECT * FROM categories WHERE cat_id = $cat_id_edit";
                                    // Connect data for getting data from categories
                                    $edit_categories = mysqli_query($connection, $query);
                                    // Fetch the category from categories table by associative array
                                    while ($row = mysqli_fetch_assoc($edit_categories)) {
                                        $cat_id_edit = $row["cat_id"];
                                        $cat_title_edit = $row['cat_title'];
                                    ?>
                                        <input type="text" value="<?php if (isset($cat_title_edit)) { echo $cat_title_edit; } ?>" class="form-control" name="cat_title">
                                    <?php }
                                }

                                //Update Categories -->
                                if (isset($_POST['update_category'])) {
                                    $cat_title_update = $_POST['cat_title'];
                                    $query = "UPDATE categories SET cat_title = '{$cat_title_update}' WHERE cat_id = {$cat_id_edit}";
                                    $update_query = mysqli_query($connect, $query);
                                    if (!$update_query) {
                                        die("Query Failed!" . mysqli_error($connect));
                                    }
                                }
                                ?>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" name="update_category">Update Categories</button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Title</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // Select all data from categoried
                                    $query = "SELECT * FROM categories";
                                    // Connect data for getting data from categories
                                    $select_categories = mysqli_query($connection, $query);

                                    // Fetch the category from categories table by associative array
                                    while ($row = mysqli_fetch_assoc($select_categories)) 
                                    {
                                        $cat_id = $row["cat_id"];
                                        $cat_title = $row["cat_title"];

                                        echo "<tr>";
                                        echo "<td>{$cat_id}</td>";
                                        echo "<td>{$cat_title}</td>";
                                        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                        echo "</tr>";
                                    }
                                
                                    if(isset($_GET['delete'])){
                                        $the_cat_id = $_GET['delete'];
                                        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                                        $delete_query = mysqli_query($connection, $query);
                                        
                                        header("Location: categories.php");
                                    }

                                ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/footer.php";?>
