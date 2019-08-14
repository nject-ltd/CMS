<?php 

if(isset($_GET['p_id'])){
    
   $the_post_id = $_GET['p_id'];
    
}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id";                   
$select_posts_by_id = mysqli_query($connection, $query);                                
                                
while($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = escape($row['post_id']);
    $post_user = escape($row['post_user']);
    $post_title = escape($row['post_title']);
    $post_category_id = escape($row['post_category_id']);
    $post_status = escape($row['post_status_id']);
    $post_image = escape($row['post_image']);
    $post_content = escape($row['post_content']);
    $post_tags = escape($row['post_tags']);
    $post_comment_count = escape($row['post_comment_count']);
    $post_date = escape($row['post_date']);

}

//$query = "SELECT * FROM status WHERE stat_id = $the_post_id";                   
//$select_posts_by_id = mysqli_query($connection, $query);                                
//                                
//while($row = mysqli_fetch_assoc($select_posts_by_id)) {
//    $post_id = escape($row['post_id']);
//    $post_user = escape($row['post_user']);
//}


if(isset($_POST['update_post'])) {
    
    $post_user = escape($_POST['post_user']);
    $post_title = escape($_POST['post_title']);
    $post_category_id = escape($_POST['post_category']);
    $post_status = escape($_POST['post_status_id']);    
    $post_image = escape($_FILES['image']['name']);
    $post_image_temp = escape($_FILES['image']['tmp_name']);   
    $post_tags = escape($_POST['post_tags']);
    $post_content = escape($_POST['post_content']); 
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    if(empty($post_image)) {

    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    $select_image = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_image)) {

        $post_image = escape($row['post_image']);

    }

}
    
    $query = "UPDATE posts SET ";
    $query .= "post_title ='{$post_title}', ";
    $query .= "post_category_id ='{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_user ='{$post_user}', ";
    $query .= "post_status_id ='{$post_status}', ";
    $query .= "post_tags ='{$post_tags}', ";
    $query .= "post_content ='{$post_content}', ";
    $query .= "post_image ='{$post_image}', ";
    $query .= "user_id ='{$_SESSION['user_id']}' ";
    $query .= "WHERE post_id ='{$the_post_id}' ";
    
    $update_post = mysqli_query($connection, $query);
    
    confirmQuery($update_post);
    
    header("Location: posts.php");
    

}

?> 
  
  
  
  
  <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
    <label for="current_category">Current Category</label>
    
        <!-- <label for="post_category">Post Category Id</label><br> -->
        <input value="<?php
$query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";                   
$select_categories = mysqli_query($connection, $query);             
confirmQuery($select_categories);                               
while($row = mysqli_fetch_assoc($select_categories )) {
$cat_id = escape($row['cat_id']);
$cat_title = escape($row['cat_title']);
echo "{$cat_title}";
}
?>"
name="current_category" id="" class="form-control" readonly>   
</div>
    
       <div class="form-group">
          <label for="post_category">Would you like to change current category?</label><br>
          <select name="post_category" id=""> 
<?php

$query = "SELECT * FROM categories";                   
$select_categories = mysqli_query($connection, $query);  
            
confirmQuery($select_categories);
                                
while($row = mysqli_fetch_assoc($select_categories )) {
$cat_id = escape($row['cat_id']);
$cat_title = escape($row['cat_title']);
    
echo "<option value='$cat_id'>{$cat_title}</option>";

}
?>     
           </select>     
       </div>
       
       
        <div class="form-group">
        <label for="users">Post User</label><br> 
        <input name="post_user" id="" value="<?php echo "{$post_user}"; ?>" class="form-control" readonly>  
   <!-- Uncomment this to show a list of ALL usernames
<?php

//$user_query = "SELECT * FROM users";                   
//$select_users = mysqli_query($connection, $user_query);  
//            
//confirmQuery($select_users);
//                                
//while($row = mysqli_fetch_assoc($select_users )) {
//$user_id = escape($row['user_id']);
//$username = escape($row['username']);
//    
//echo "<option value='{$username}'>{$username}</option>";

//}
?>
-->     
    </div>
   
    <label for="post_status">Post Status</label>
    <div class="form-group">
        <!-- <label for="post_category">Post Category Id</label><br> -->
        <select name="post_status_id" id="">

<?php //echo "<option value='{$stat_title}'>{$stat_title}</option>"; ?>

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
    
    <div class="form-group">
        <img width="100px;" src="../images/<?php echo $post_image; ?>" alt="">
        <input type="file" name="image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?>
        </textarea>
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>
</form>