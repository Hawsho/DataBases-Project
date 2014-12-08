<!DOCTYPE html>
<html lang="en">
<head>
<title>Rate My Book/Sign in</title>
<meta name="description" content="books' Rating System">
<meta name="keywords" content="on-line books' rating system, books' rating">
<meta name="author" content="Issa Malke">
<meta charset="utf-8">
<link href="Rate My Book.css" rel="stylesheet" media="screen">
</head>
<body>
<div id="wrapper">
	<div class="header">
	<h1 class="shadow"> Rate My Book </h1>
    <h2>experts in books' rating</h2>
	</div>
  <nav>
    <ul>
      <li><div class="border"><a href="index1.php">Home</a></div></li>
<li><a href="sign-in.php">Sign in</a></li>
<li><a href="addabook.php">Add a Book</a></li>
<li><a href="findbook.php">Search for Books</a></li>
<li><a href="useraccount.php">User Account</a></li>
    </ul>
  </nav>
  <div id="content"> 
  
 	<h3 class="font">Please sign-in in order to Add/Rate a Book!</h3>
    <br>
	<form id=Standard>
	<fieldset>
		<legend>User Sign In</legend>
		<ol>
			<li>
			<label for=Username>Username</label>
			<input id=Username name=Username type=text required>
			</li>
			<li>
			<label for=Password>Password</label>
			<input id=Password name=Password type=text required>
			</li>
                        <?php
                        $Username = $_REQUEST['Username'];
                        $Password = $_REQUEST['Password'];
                        ?>
		</ol>
		<br>
		<button type=submit>Sign In</button>
	</fieldset>
	
	</div>
	
	</div>
	
	</div>
	
</form>
	<?php   
        $connection = oci_connect($username = 'cmk',
                          $password = 'Kremie21',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
        if (!$connection)
        {
        $e = oci_error(); // For oci_connect errors pass no handle
        echo "if not connection<br>";
        echo htmlentities($e['message']);
        }
        else{
        echo"connected yeahh!<br>";
       
       
        
        echo $Username;
        echo $Password;
        //$query= 'SELECT COUNT(*) AS isaccount FROM account WHERE username= :Username'; 
        //$query= "SELECT COUNT(*) AS isaccount FROM Account WHERE username='".$Username."'"; 
        //$query= 'SELECT COUNT(*) AS isaccount FROM Account WHERE username= :Username AND password= :Password';
        $query = "SELECT COUNT(*) AS NUM FROM account WHERE username= '$Username' AND password = '$Password'";
        $stmt = oci_parse($connection,$query);
        //oci_bind_by_name($stmt, ':Username', $Username);
        oci_define_by_name($stmt, 'NUM',$account);
        
        //$result = oci_parse($connection,$sql);
        
        
        
        
        oci_execute($stmt);
        oci_fetch($stmt);
        echo $account;
        //echo ($count);
        
        if($account == 1){
                                    
            $_SESSION["Username"];
            $_SESSION["Password"];
                     
           
            header("Location: http://localhost/addabook.php");
        }
        else{
            echo "Wrong username or password";
           // echo $Username;
           // echo $Password;
        }
        }
        oci_close($connection);
        ?> 
    
<img class="Box" src="Rating.jpg" alt="Rate a Book">

  </div>
  <footer>Copyright &copy; 2014 Issa Malke. All rights Reserved.
  <div class="hypLinks"><a href="Home.html">Home</a>&nbsp;<a href="Sign-in.html">Sign in</a>&nbsp;<a href="Add a Book.html">Add a Book</a>&nbsp;<a href="Find Book.html">Find Book</a>&nbsp;<a href="User Account.html">User Account</a>&nbsp;</div>
  </footer>
 </div>
</body>
</html>
