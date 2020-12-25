<?php
      if (isset($_POST['btn'])) {
     $name = null; 
     $email = null;
     $message = null;
       
     if (isset($_POST['name']) && !empty($_POST['name'])) {
     	if (preg_match('/^[A-Za-z\s]+$/', $_POST['name'])) {
           $name = $_POST['name'];
     	}else{
     $name_error = 'only alphbets are allowed.';
         }
     }else{
     	$name_error = 'please fill this field';
     }
      if (isset($_POST['email']) && !empty($_POST['email'])) {
      	if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
         $email = $_POST['email'];
     }else{
     	$email_error = 'please enter valid email';
     }
    }
     else{
     	$email_error = 'provide valid email';
     }
      if (isset($_POST['message']) && !empty($_POST['message'])) {
      	if (preg_match('/^[a-z0-9\s]{6,10}+$/', $_POST['message'])) {
      	 $message = $_POST['message'];
      	}else{
    // 	$message_error = 'this field can not be empty';
        }
     }else{
     	$message_error = 'message should be greater than 6 and less than 10';
     }
       $connection = mysqli_connect("localhost","root","","csscontact_form");
       $query = "INSERT INTO form(name,email,message) VALUES ('$name','$email','$message')";

        $query = mysqli_query($connection,$query);
     }
     ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	     <link rel="stylesheet"  href="assets/css/bootstrap.min.css">
       	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.1/css/all.min.css">
	<title>contact form</title>
	<style>
      background {
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 100%;
        opacity: 0.5;
        margin: 0;

    }
    
    </style>
</head>
<body background="asset/image/pic8.jpg">
	<div class="container my-5">
		<div class="row ">
			<div class="col-md-6 offset-md-3">
			     <form method ="post">
			     	<div class = "card-panel #ff5252 red accent-2 ">Contact form</div>
			     	<div class="input-field col s12">
			     		<label class="white-text text-darken-2" >Name</label>
			     		<input type="text" name="name" placeholder="name" class="form-control white-text text-darken-2 <?php if (isset($name_error)) echo 'is-invalid'; ?>"
			     		>
			     		<?php if (isset($name_error)): ?>
					    	   	<div class= "invalid-feedback"><?= $name_error ?></div>
			     			
			     		<?php endif ?>
			     		
			     	</div>
			     	<div class="input-field col s12">
			     		<label class="white-text text-darken-2" >Email</label>
			     		<input type="text" name="email" placeholder="email" class="form-control white-text text-darken-2 <?php if (isset($email_error)) echo 'is-invalid'; ?>"
					        		>
					    <?php if (isset($email_error)): ?> 
					        <div class="invalid-feedback"><?= $email_error?></div>	
					    <?php endif; ?>
			     	</div>
			     	<div class="input-field col s12">
			     		<label class="white-text text-darken-2">Message</label>
			     	    <textarea name="message" cols="30" rows="10" class="materialize-textarea white-text text-darken-2  <?php if (isset($message_error)) echo 'is-invalid'; ?>"
					   >
					   </textarea> 
					    <?php if (isset($message_error)): ?>
					        <div class="invalid-feedback"><?= $message_error?></div>
					    <?php endif; ?>
                    </div>
                    <button type="Submit" name="btn" class="btn #ff5252 red accent-2 text-dark">Submit</button>
			     </form>
			</div>    
		</div>
	</div>
  
</body>
</html>