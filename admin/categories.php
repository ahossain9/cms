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
                        <form action="/action_page.php">
                            <div class="form-group">
                                <label for="cat-title">Add Category:</label>
                                <input type="password" class="form-control" name="cat-title" id="pwd">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Add Categories</button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                       <?php

                            // Select all data from categoried
                            $query = "SELECT * FROM categories";
                            // Connect data for getting data from categories
                            $select_categories = mysqli_query($connection, $query);
                        ?>
                      
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Title</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php

                                    // Fetch the category from categories table by associative array
                                    while ($row = mysqli_fetch_assoc($select_categories)) 
                                    {
                                        $cat_id = $row["cat_id"];
                                        $cat_title = $row["cat_title"];

                                        echo "<tr>";
                                        echo "<td>{$cat_id}</td>";
                                        echo "<td>{$cat_title}</td>";
                                        echo "</tr>";
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
