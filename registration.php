<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php //include "admin/functions.php"; ?>
<?php 

require __DIR__ . '/vendor/autoload.php'; 

$dotenv = \Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$options = array(
    'cluster' => 'eu',
    'useTLS' => true
  );


$pusher = new Pusher\Pusher(getenv('APP_KEY'), getenv('APP_SECRET'), getenv('APP_ID'), $options);    // 'key','secret','app-key', 'options'

//$pusher = new Pusher\Pusher(getenv('fe0aa22cd2c1c89ff8f8'), getenv('f73fe7ad72a0c4ca7856'), getenv('783482'), $options);

?>
 
<?php 

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    $error = [
        
        'firstname'=> '',  
        'lastname'=> '',
        'username'=> '',
        'email'=> '',
        'password'=> ''
        
        
    ];
    
//    if(strlen($username) < 4){
//        
//        $error['username'] = 'Username must be bigger than 3 charactures';
//        
//    }
    
    if(empty($username)) {
        
        $error['username'] = 'Username cannot be empty';
        
    }
    
    if(username_exists($username)){
        
        $error['username'] = 'Username already exists';
        
    }
//    
//    
//    
//    if($email = '') {
//        
//        $error['email'] = 'Email cannot be empty';
//        
//    }
//    
//    if(email_exists($email)){
//        
//        $error['email'] = 'Email already exists. <a href="index.php">Login?</a>';
//        
//    }
//    
//    
//    
//    if($password = '') {
//        
//        $error['password'] = 'Password cannot be empty';
//        
//    }
    
    
    foreach($error as $key => $value) {
        
        if(empty($value)) {
            
          unset($error[$key]);  
            
//            login_user($username, $password);
            
        }
        
    }
    
    if(empty($error)){
        
       register_user($firstname, $lastname, $username, $email, $password); 
        
        $data['message'] = $username;
        
    
         $pusher->trigger('notifications', 'new_user', $data);  //'my-channel name', 'my-event name', 'data'    
          login_user($username,$password);
      }
    
    
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
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                      
                       <div class="form-group">
                            <label for="firstname" class="sr-only">First Name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter First Name" autocomplete="on" value="<?php echo isset($firstname) ? $firstname : '' ?>">
                            
                            <p><?php echo isset($error['firstname']) ? $error['firstname'] : '' ?></p>
                            
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Last Name" autocomplete="on" value="<?php echo isset($lastname) ? $lastname : '' ?>">
                            
                            <p><?php echo isset($error['lastname']) ? $error['lastname'] : '' ?></p>
                            
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" autocomplete="on" value="<?php echo isset($username) ? $username : '' ?>">
                            
                            <p><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                            
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>">
                            
                            <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                            
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            
                            <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                            
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
