<?php

// Check the query is failed or not
function confirmQuery($result) {
    // Connect with DB globally inside each function
    global $connect;

    if (!$result) {
        die("Query Failed! " . mysqli_error($connect));
    }        
}
