<?php include "includes/admin_header.php"; ?>

<?php 

if(isset($_SESSION['username'])) {
    
    $username = $_SESSION['username'];
    
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    
    $select_user_profile_query = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_array($select_user_profile_query)) {
        
    $user_id = escape($row['user_id']);
    $username = escape($row['username']);
    $user_password = escape($row['user_password']);
    $user_firstname = escape($row['user_firstname']);
    $user_lastname = escape($row['user_lastname']);
    $user_email = escape($row['user_email']);
    $user_image = escape($row['user_image']);
//    $user_role = $row['user_role'];    
        
    }
    
}


?>
  
<?php 

if(isset($_POST['edit_user'])){
    
//    $user_id = $_POST['user_id'];
    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
//    $user_role = $_POST['user_role'];
    
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];
    
    $username = escape($_POST['username']);
    $user_email = escape($_POST['user_email']);
    $user_password = escape($_POST['user_password']);
//    $post_date = date('d-m-y');

    
//    move_uploaded_file($post_image_temp, "../images/$post_image" );
    
    $query = "UPDATE users SET ";
    $query .= "user_firstname ='{$user_firstname}', ";
    $query .= "user_lastname ='{$user_lastname}', ";
//    $query .= "user_role = '{$user_role}', ";
    $query .= "username ='{$username}', ";
    $query .= "user_email ='{$user_email}', ";
    $query .= "user_password ='{$user_password}' ";
    $query .= "WHERE username ='{$username}' ";
    
    $edit_user_query = mysqli_query($connection, $query);
    
    confirmQuery($edit_user_query);
    
    header("Location: users.php");
    
}



?>
   
   
    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    
                    <h1 class="page-header">
                            Add User
                            <small>hi</small>
                        </h1>
                   <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
    </div>
    
        <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
    </div>
    
        <div class="form-group">
<!--         <label for="user_role">Role</label> <br>-->
<!--
        <select name="user_role" id="">
        <option value="subscriber"><?php echo $user_role; ?></option>
        
        <?php 
        
        if($user_role == 'Administrator') {
            
            echo "<option value='Subscriber'>Subscriber</option>";
            
        }   else {
            
            echo "<option value='Administrator'>Administrator</option>";
        } 
        
        ?>
              
        </select>
-->
    </div>
    
        <div class="form-group">
        <label for="username">Username</label>
        <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
    </div>
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
        
    </div>
    
    <div class="form-group">
        <label for="user_password">Password</label>
        <input autocpmlete="off" type="password" class="form-control" name="user_password">
        
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
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
    </div>
</form>     


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>