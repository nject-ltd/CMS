<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <?php //include "admin/functions.php"; ?>
 
<?php 


if(isset($_POST['submit'])) {
    
    $to = "admin@nject.co.uk";
    $subject = wordwrap($_POST['subject'], 70);
    $body = $_POST['body'];
    $header = "From" .$_POST['email'];
    
    
mail($to, $subject, $body, $header);
    
  
//    if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password)) {
//        
//    
//    $firstname = mysqli_real_escape_string($connection, $firstname);
//    $lastname = mysqli_real_escape_string($connection, $lastname);
//    $username = mysqli_real_escape_string($connection, $username);
//    $email = mysqli_real_escape_string($connection, $email);
//    $password = mysqli_real_escape_string($connection, $password);
//        
//    $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12) ); 
    
    
//    $query = "SELECT randSalt FROM users";
//    $select_randsalt_query = mysqli_query($connection, $query);
//    
//    if(!$select_randsalt_query) {
//        
//        die("QUERY FAILED" . mysqli_error($connection));
//    }
    
//    $row = mysqli_fetch_array($select_randsalt_query);
//        
//    $salt = $row['randSalt'];   
//    $password = crypt($password, $salt);
    
    
//    $query = "INSERT INTO users (user_firstname, user_lastname, username, user_email, user_password, user_role) ";
//    $query .= "VALUES('{$firstname}', '{$lastname}', '{$username}', '{$email}', '{$password}', 'Subscriber')";
//    $register_user_query = mysqli_query($connection, $query);
//    
//    if(!$register_user_query) {
//        
//      die("QUERY FAILED" . mysqli_error($connection) . ' ' . mysqli_errno($connection)); } 
//       
//     
//      $message = "Your Registration has been submitted";  
//        
//        
//      
//    } else {
//        
//        $message = "Fields cannot be left empty";
//        
//    }
//    
//    
//} else {
//    
//    $message = "";
//    
}

?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                      <h6 class="text-center"><?php //echo $message; ?></h6>
                       <div class="form-group">
                            <label for="firstname" class="sr-only">First Name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter First Name">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter a valid email address">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            
                            <textarea type="text" name="body" id="body" class="form-control" placeholder="Enter Message">
                            </textarea>
                            
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
