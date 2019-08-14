<?php 

//===== DATABASE HELPER FUNCTIONS =====//

function stmtConnection(){
    global $connection;
    return mysqli_stmt_init($connection);
}

function redirect($location){
    header("Location:" . $location);
    exit;
}

function query($query){
    global $connection;
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    return $result;
}

function fetchRecords($result){
    return mysqli_fetch_array($result);
}

function count_records($result){
    return mysqli_num_rows($result);
}

//===== END DATABASE HELPERS =====//


//===== GENERAL HELPERS =====//

function get_user_name(){
    return isset($_SESSION['username']) ? $_SESSION['username'] : null;
}

//===== END GENERAL HELPERS =====//


//===== AUTHENTICATION HELPERS =====//

function is_admin() {
    if(isLoggedIn()){
        $result = query("SELECT user_role FROM users WHERE user_id=".$_SESSION['user_id']."");
        $row = fetchRecords($result);
        if($row['user_role'] == 'Administrator'){
            return true;
        }else {
            return false;
        }
    }
    return false;
}

//===== END AUTHENTICATION HELPERS =====//


//===== USER SPECIFIC HELPERS=====//

function is_the_logged_in_user_owner($post_id){
    $result = query("SELECT user_id FROM posts WHERE post_id={$post_id} AND user_id=".loggedInUserId()."");
    return count_records($result) >= 1 ? true : false;
}

function get_all_user_posts(){
    return query("SELECT * FROM posts WHERE user_id=".loggedInUserId()."");
}

function get_all_posts_user_comments(){
    return query("SELECT * FROM posts
    INNER JOIN comments ON posts.post_id = comments.comment_post_id
    WHERE user_id=".loggedInUserId()."");
}

function get_all_user_categories(){
    return query("SELECT * FROM categories WHERE user_id=".loggedInUserId()."");
}

function get_all_user_published_posts(){
    return query("SELECT * FROM posts WHERE user_id=".loggedInUserId()." AND post_status_id='2'");
}

function get_all_user_draft_posts(){
    return query("SELECT * FROM posts WHERE user_id=".loggedInUserId()." AND post_status_id='1'");
}


function get_all_user_approved_posts_comments(){
    return query("SELECT * FROM posts
    INNER JOIN comments ON posts.post_id = comments.comment_post_id
    WHERE user_id=".loggedInUserId()." AND comment_status='approved'");
}


function get_all_user_unapproved_posts_comments(){
    return query("SELECT * FROM posts
    INNER JOIN comments ON posts.post_id = comments.comment_post_id
    WHERE user_id=".loggedInUserId()." AND comment_status='unapproved'");
}


//===== END USER SPECIFIC HELPERS=====//

function imagePlaceholder($image = ''){
    
    if(!$image){
        
        return 'image_2.jpg';
        
    } else {
        
        return $image;
    }
    
}




function currentUser(){
    
    if(isset($_SESSION['username'])){
        
        return $_SESSION['username'];
        
    }
    
    return false;
}


function ifItIsMethod($method=null){
    
    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
        
        return true;
    }
    
    return false;
}


function isLoggedIn(){   
    if(isset($_SESSION['user_role'])){       
      return true;  
    }   
      return false;
}



function loggedInUserId(){
    if(isLoggedIn()){
        $result = query("SELECT * FROM users WHERE username='" . $_SESSION['username'] ."'");
        confirmQuery($result);
        $user = mysqli_fetch_array($result);
        return mysqli_num_rows($result) >= 1 ? $user['user_id'] : false;
    }
    return false;

}



function userLikedThisPost($post_id){
    $result = query("SELECT * FROM likes WHERE user_id=" .loggedInUserId() . " AND post_id={$post_id}");
    confirmQuery($result);
    return mysqli_num_rows($result) >= 1 ? true : false;
}


function getPostLikes($post_id){
    
    $result = query("SELECT * FROM likes WHERE post_id=$post_id");
    confirmQuery($result);
    echo mysqli_num_rows($result);
    
}



function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){
    if(isLoggedIn()){       
        redirect($redirectLocation);
    }   
}


function escape($string) {

    global $connection;
    
   return mysqli_real_escape_string($connection, trim($string));
    
}



function confirmQuery($result) {
    
        global $connection;
    
        if(!$result) {
        
        die("QUERY HAS FAILED" . mysqli_error($connection));
    }
    
   
}

function insert_categories() {
    global $connection;
    
if(isset($_POST['submit'])) {

$cat_title = $_POST['cat_title'];

if($cat_title == "" || empty($cat_title)) {
echo "This field should not be empty";
} else {

$stmt = mysqli_prepare($connection, "INSERT INTO categories(cat_title) VALUES(?) ");
mysqli_stmt_bind_param($stmt, 's', $cat_title);
mysqli_stmt_execute($stmt);



if(!$stmt) {

die('QUERY FAILED' . mysqli_error($connection));
}

}

mysqli_stmt_close($stmt);
}    
     
    
}


// Find All Categories Query
function findAllCategories() {
    
    global $connection;
    
$query = "SELECT * FROM categories";                   
$select_categories = mysqli_query($connection, $query);                                
                                
while($row = mysqli_fetch_assoc($select_categories)) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
    
echo "<tr>";
echo "<td>{$cat_id}</td>";
echo "<td>{$cat_title}</td>";
echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
echo "</tr>";
}
    
}

  
// Delete Query    
    
function deleteCategories() {
    
    global $connection;    
                              
                                
if(isset($_GET['delete'])) {
    
    $the_cat_id = $_GET['delete'];
    
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: categories.php");
    
}    
    
    
}

function users_online() {
    
    if(isset($_GET['onlineusers'])) {
          
    global $connection;
        
    
    if(!$connection) {
        
        session_start();
        include("../includes/db.php");
       
$session = session_id();
$time = time();
$time_out_in_seconds = 05;
$time_out = $time - $time_out_in_seconds;

$query = "SELECT * FROM users_online WHERE session = '$session'";
$send_query = mysqli_query($connection, $query);
$count = mysqli_num_rows($send_query);
        
if($count == NULL) {
    
    mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session', '$time')");
    
} else {
    
    mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
    
}
        
$users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > $time_out");
echo $count_user = mysqli_num_rows($users_online_query);       
        
        
    }

 

} // Get Request
    
}

users_online();
 



function username_exists($username){
    
    global $connection;
    
    $query = "SELECT username FROM users WHERE username = '$username'";
    
    $result = mysqli_query($connection, $query);
    
    confirmQuery($result);
    
    if(mysqli_num_rows($result) > 0) {
        
        return true;
        
    } else {
        
        return false;
        
    }
    
}




function email_exists($email){
    
    global $connection;
    
    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    
    $result = mysqli_query($connection, $query);
    
    confirmQuery($result);
    
    if(mysqli_num_rows($result) > 0) {
        
        return true;
        
    } else {
        
        return false;
        
    }
    
}


function register_user($firstname, $lastname, $username, $email, $password){
    
    global $connection;
    
        
    
    $firstname = mysqli_real_escape_string($connection, $firstname);
    $lastname = mysqli_real_escape_string($connection, $lastname);
    $username = mysqli_real_escape_string($connection, $username);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
        
    $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12) ); 
        
    
    $query = "INSERT INTO users (user_firstname, user_lastname, username, user_email, user_password, user_role) ";
    $query .= "VALUES('{$firstname}', '{$lastname}', '{$username}', '{$email}', '{$password}', 'Subscriber') ";
    $register_user_query = mysqli_query($connection, $query);
    
    confirmQuery($register_user_query);
       
     
//      $message = "Your Registration has been submitted";  
        
        
      
} 
    




function login_user($username, $password){
    
    global $connection;
    
//$username = trim($username);
//$password = trim($password);
    
    $username = trim($username);
    $password = trim($password);
    
    
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);
    
    if(!$select_user_query) {
        
        die("QUERY FAILED" . mysqli_error($connection));
    }
    
    
    while($row = mysqli_fetch_array($select_user_query)) {
        
        $db_user_id = $row['user_id'];
        $db_username = $row['username']; 
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
        
        
    if (password_verify($password, $db_user_password)) {
        
        if (session_status() == PHP_SESSION_NONE) session_start();
        
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
    
        //header("Location: ../admin");
         redirect("/cms/admin");
        
    } else {
        
        //header("Location: ../index.php");
         return false;
    }    
    
}
    
    return true;
    }

        




    
    
    
?>