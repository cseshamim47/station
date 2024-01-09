<?php
require_once('db.php');


function getFilteredResults($search_query)
{
    $conn = getConnection(); // Replace with your database connection logic

    // Modify the SQL query to search for records based on the search query
    $search_param = '%' . $search_query . '%';
    $stmt = $conn->prepare("SELECT * FROM catagory WHERE author LIKE ?");
    $stmt->bind_param("s", $search_param);
    $stmt->execute();

    $result = $stmt->get_result();

    $filtered_viewbook = array();
    while ($row = $result->fetch_assoc()) {
        $filtered_viewbook[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $filtered_viewbook;
}


function login($id, $password)
{

    $con = getConnection();
    $sql = "select * from reg_info where id='{$id}' and password='{$password}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($users, $row);
        }
        $user = $users[0];
        print_r($user[0]);

        session_start();
        $_SESSION['user'] = ['id' => $user['id'], 'name' => $user['name'], 'password' => $user['password'], 'type' => $user['user_type']];

        $_SESSION['auth'] = "true";
        if ($user['type'] == 'admin') {
            header('location: ../views/admin_home.php');
        } else {
            header('location: ../views/user_home.php');
        }
    } else {

        // return false;
    }
}


function register($id, $name, $password,$email,$gender,$dob, $type)
{


    $con = getConnection() ;


    $sql = "select * from reg_info where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        print_r("User already exists");
    } else {
        $sql = "insert into reg_info (id,name,password,email,gender,dob,type) values ('{$id}','{$name}','{$password}','{$email}','{$gender}','{$dob}','{$type}')";
        $result = mysqli_query($con, $sql);


        if ($result) {
            header('location: ../views/login.php');
        } else {

            echo "Error!";
        }
    }
}



function getUser($id)
{
    session_start();
    if (isset($_SESSION['auth']) && $_SESSION['user']) {
        $id = $_SESSION['user']['id'];
    }
    $con = getConnection();
    $sql = "select * from users where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($users, $row);
        }
        $user = $users[0];
        print_r($user[0]);

        session_start();
        $_SESSION['user'] = ['id' => $user['id'], 'name' => $user['name'], 'password' => $user['password'], 'type' => $user['user_type']];

        $_SESSION['auth'] = "true";
        if ($user['type'] == 'admin') {
            header('location: ../views/admin_home.php');
        } else {
            header('location: ../views/user_home.php');
        }
    } else {

        return false;
    }
}

function getAllUser()
{
    $con = getConnection();
    $sql = "select * from users";
    $result = mysqli_query($con, $sql);
    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($users, $row);
    }

    return $users;
}

function updatepassword($id, $password)
{
    session_start();
    if (isset($_SESSION['auth']) && $_SESSION['user']) {
        $id = $_SESSION['user']['id'];
    }
    $con = getConnection();
    $sql = "UPDATE users
    SET password='{$password}'
    WHERE id='{$id}';";
}











function Update($updatebooks)
{
  $con= getConnection();
  $sql= "UPDATE catagory
  SET Book_Name = '{$updatebooks['Book_Name']}', 
      Author= '{$updatebooks['Author']}', 
       Catagory= '{$updatebooks['Catagory']}', 
  WHERE Book_ID = '{$updatebooks['Book_ID']}'";
  
  $result= mysqli_query($con,$sql);

  return $result;
}

    function getviewbook(){
       $con = getConnection();
       $sql = "select * from catagory";
      $result = mysqli_query($con, $sql);
       $users = [];

    while($row = mysqli_fetch_assoc($result)){
    //$users = $row;
       array_push($users, $row);
 }  

    return $users;

     }function AddBook($bookInfo){
         $con = getConnection();
         $sql = "insert into catagory values('','{$bookInfo['Book_Name']}','{$bookInfo['Author']}', '{$bookInfo['Catagory']}')";
        $status = mysqli_query($con, $sql);
        return $status;
     }
     function DeleteUsers($Book_ID){
         $con = getConnection();
         $sql = "DELETE FROM catagory WHERE Book_ID='$Book_ID';";
         $status = mysqli_query($con, $sql);
        return $status;
      }

        function search($Book_ID){
         $con = getConnection();
         $sql = "SELECT * FROM catagory WHERE CONCAT(Book_ID, Book_Name, Author, Catagory) LIKE '%$Book_ID%'";
         $status = mysqli_query($con, $sql);
        return $status;
      }

      function getNotification(){
             $con = getConnection();
             $sql = "select * from notitication_alerts ";
             $result = mysqli_query($con, $sql);
            $users = [];

       while($row = mysqli_fetch_assoc($result)){
  //$users = $row;
        array_push($users, $row);
      }

        return $users;
      }
    function Notify($bookInfo,$user_id){
        $con = getConnection();
        $sql = "insert into $user_id values('','{$bookInfo['Notification_Data']}')";
        $status = mysqli_query($con, $sql);
        return $status;




   }

   