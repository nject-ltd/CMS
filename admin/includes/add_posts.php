<?php
if(isset($_POST['create_post'])){
    
    $post_title = escape($_POST['post_title']);
    $post_user = escape($_POST['post_user']);
    $post_category_id = escape($_POST['post_category']);
    $post_status_id = escape($_POST['post_status_id']);
    
    $post_image = escape($_FILES['image']['name']);
    $post_image_temp = escape($_FILES['image']['tmp_name']);
    
    $post_tags = escape($_POST['post_tags']);
    $post_content = escape($_POST['post_content']);
    $post_date = date('d-m-y');
    $user_id = escape($_POST['user_id']);

    
    move_uploaded_file($post_image_temp, "../images/$post_image" );
    
    $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date, post_image, post_content, post_tags, post_status_id, user_id) ";
    
    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status_id}','{$user_id})";
    
    $create_post_query = mysqli_query($connection, $query);
    
    confirmQuery($create_post_query);
    
    header("Location: posts.php");
    
}

?>
  

  
  <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
    
    <div class="form-group">
        <label for="post_category">Post Category Id</label><br> 
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
        <label for="users">Post Users</label><br> 
        <select name="post_user" id="">
<?php

$user_query = "SELECT * FROM users";                   
$select_users = mysqli_query($connection, $user_query);  
            
confirmQuery($select_users);
                                
while($row = mysqli_fetch_assoc($select_users )) {
$user_id = escape($row['user_id']);
$username = escape($row['username']);
    
echo "<option value='{$username}'>{$username}</option>";

}
?>
           
        </select>
    </div>    
        
            
                
                        
<!--
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
-->
    
<!--
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    
-->
   
       <label for="post_status">Post Status</label>
    <div class="form-group">
        <!-- <label for="post_category">Post Category Id</label><br> -->
        <select name="post_status_id" id="">
<?php

$query = "SELECT * FROM status";                   
$select_status = mysqli_query($connection, $query);  
            
confirmQuery($select_status);
                                
while($row = mysqli_fetch_assoc($select_status )) {
$stat_id = $row['stat_id'];
$stat_title = $row['stat_title'];
    
echo "<option value='$stat_id'>{$stat_title}</option>";
    
    

}
            
?>
          
        </select><br>
        </div>
   
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="body" cols="30" rows="10">
        </textarea>
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
</form>