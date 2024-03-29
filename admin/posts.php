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

                <div class="col-sm-12">
                    <?php 
                        //Check the source if avaible.
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = "";
                        }
                        //Include the page based on condition technique
                        switch ($source) {
                            case 'add_post':
                                include ("includes/add_post.php");
                                break;
                            case 'edit_post':
                                include ("includes/edit_post.php");
                            default:
                                include ("includes/view_all_posts.php");
                                break;
                        }
                        
                    ?> 
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/footer.php";?>
