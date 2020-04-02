<?php
    include('functions.php');

    // Check the request params as they come in
    if (isset($_GET["add_user"])) {
        //echo "post new user";
        $result = addUser($pdo);
    }

    echo json_encode($result);

    // Could add other if statements here for a UMS system like adding or patching a user
    // Refer to pan's example file