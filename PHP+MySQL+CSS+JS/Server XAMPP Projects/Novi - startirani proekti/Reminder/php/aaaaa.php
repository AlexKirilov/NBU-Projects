PHP Code:
<?php 
$errors = array(); 
if(isset($_POST['login'])){ 
    $username = preg_replace('/[^A-Za-z]/', '', $_POST['username']); 
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $c_password = $_POST['c_password']; 
     
    if($username == TRUE){ 
        $errors[] = 'Username already exists'; 
    } 
    if($username == ''){ 
        $errors[] = 'Username is blank'; 
    } 
    if($email == ''){ 
        $errors[] = 'Email is blank'; 
    } 
    if($password == '' || $c_password == ''){ 
        $errors[] = 'Passwords are blank'; 
    } 
    if($password != $c_password){ 
        $errors[] = 'Passwords do not match'; 
    } 
    if(count($errors) == 0){ 
        //mysql functions         
                          header('Location: login.php'); 
        die; 
    } 
} 
?>
this would be how the form is.

PHP Code:
<form method="post" action=""> 
        <?php 
        if(count($errors) > 0){ 
            echo '<ul>'; 
            foreach($errors as $e){ 
                echo '<li>' . $e . '</li>'; 
            } 
            echo '</ul>'; 
        } 
        ?> 
        <p>Username <input type="text" name="username" size="20" /></p> 
        <p>Email <input type="text" name="email" size="20" /></p> 
        <p>Password <input type="password" name="password" size="20" /></p> 
        <p>Confirm Password <input type="password" name="c_password" size="20" /></p> 
        <p><input type="submit" name="login" value="Login" /></p> 
</form>