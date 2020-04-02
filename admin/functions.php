<?php
    include('connect.php');

    function getAllUsers($conn) {
        $query = 'SELECT * FROM users';

        $getAllUsers = $conn->prepare($query);
        $getAllUsers->execute();

        $users = $getAllUsers->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }
    //TODO => add the insert query and parse thru the post array for entries
    // to build out the values and params
    
    function addUser($conn) {
        // var_dump($_POST);

        $newUserQuery = $conn->prepare("INSERT INTO user (first_name, last_name, password, role) VALUES (:fname, :lname, :pword, :myrole)");

        $newUserResult = $newUserQuery->execute(array(
            ':fname' => $_POST['first_name'],
            ':lname' => $_POST['last_name'],
            ':pword' => $_POST['password'],
            ':myrole' => $_POST['role']
        ));

        if ($newUserResult) {
            // success
            //echo 'added user';
            return array('result' => $newUserResult);
        } else {
            // failure
            // echo 'could not add user';
            return array('result' => false);
        }

        // TO DO => we can just return $newUserResult and handle success or failure on the client side
        // depending on what gets returned as 'result'
    }

    function deleteUser($conn, $userID) {
        $query = "DELETE FROM users WHERE id=:uID";

        $removeUser = $conn->prepare($query);
        $count = $removeUser->execute(array(':uID' => $userID));

        // This will just return a boolean for success or failure - true ($count)
        // or a message if it's false (can't delete)
        if ($count > 0) {
            return $count;
        } else {
            return "couldn't delete user";
        }
    }