<?php
if(isset($_POST['create_user'])){
    
//    $user_id = $_POST['user_id'];
    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $user_role = escape($_POST['user_role']);
    
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];
    
    $username = escape($_POST['username']);
    $user_email = escape($_POST['user_email']);
    $user_password = escape($_POST['user_password']);
//    $post_date = date('d-m-y');

    
//    move_uploaded_file($post_image_temp, "../images/$post_image" );
    $user_password = password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 10) );
    
    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
    
    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') ";
    
    $create_user_query = mysqli_query($connection, $query);
    
    confirmQuery($create_user_query);
    
//    echo "User Created: " . " " . "<a href='users.php>View Users</a>' ";
    
    header("Location: users.php");
    
}

?>
  

  
  <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    
        <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    
        <div class="form-group">
         <label for="user_role">Role</label> <br>
        <select name="user_role" id="">
        <option value="subscriber">Select Option</option>
        <option value="Administrator">Administrator</option> 
        <option value="Subscriber">Subscriber</option>          
        </select>
    </div>
    
        <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
        
    </div>
    
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
        
    </div>
    

    
<!--
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    
-->
   
<!--
       <label for="post_status">Post Status</label>
    <div class="form-group">
         <label for="post_category">Post Category Id</label><br> 
        <select name="post_status_id" id="">
<?php

$query = "SELECT * FROM status";                   
$select_status = mysqli_query($connection, $query);  
            
confirmQuery($select_status);
                                
while($row = mysqli_fetch_assoc($select_status )) {
$stat_id = escape($row['stat_id']);
$stat_title = escape($row['stat_title']);
    
echo "<option value='$stat_id'>{$stat_title}</option>";
    
    

}
            
?>
          
        </select><br>
        </div>
-->
   
<!--
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>
-->
    

    
    
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>
</form>