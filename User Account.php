//<?php include "base.php"; ?> 
<!DOCTYPE html>

<html lang="en">
<head>
<title>Rate My Book/User Account</title>
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
<li><a href="contact.html">Contact Us</a></li>
    </ul>
  </nav>
  <div id="content"> 
  <br>
 	<h3 class="font">Note: "we can add a commit her which uses a link below e.g. Google"</h3>
	<a href="http://google.com" target=”_blank”>Google Search</a>
    <br><br>
	
	<form id=Standard>
	<fieldset>
		<legend>User Information</legend>
		<ol>
                    
			<li>
			<label for=Username>Username</label>
			<input id=ID name=Username type=text placeholder="e.g. fName.lName" required>
			</li>
			<li>
			<label for=Password>Password</label>
			<input id=Password name=Password type=text placeholder="No #$%^&*!@()[]{} Allowed" required>
			</li>
			<li>
			<label for=Confirm >Confirm Password</label>
			<input id=Confirm name=Confirm type=text placeholder="re-write your Password" required>
			</li>
			<li>
			<label for=Age>Age</label>
			<input id=Age name=Age type=number min=1 max=120 placeholder="e.g. 23" required>
			</li>
                        <?php
                        $Username = $_REQUEST['Username'];
                        $Password = $_REQUEST['Password'];
                        $Confirm = $_REQUEST['Confirm'];
                        $Age = $_REQUEST['Age'];
                        ?>
                         <?php   
                        $cookie_name = "Username";
                        $cookie_value = $_REQUEST['username'];
                        $time = time();
                        setcookie($cookie_name,$cookie_value, time() + (86400 * 14)); //cookie lasts for 14 days

                        ?>
                        <?php
                        if(!isset($_COOKIE[$cookie_name])) {
                            echo "Cookie named '" . $cookie_name . "' is not set!";
                        }else {
                        echo "Cookie '" . $cookie_name . "' is set!<br>";
                        echo "Value is: " . $_COOKIE[$cookie_name];
                        }
                        ?> 
		</ol>
	</fieldset>
	<fieldset>
		<legend>Location Details</legend>
                <ol>
                        <li>
                        <label for=City>City</label>
			<input id=City name=City type=text placeholder="e.g. Gainesville" required>
                        </li>
                        <li>
			<label for=State>State</label>
                        <input id=State name=State type=text placeholder="e.g. Florida" required>
                        </li>
                        <?php
                        $Location = "$_REQUEST[City], $_REQUEST[State]";
                        //$fieldThree = "$_REQUEST[fieldOne]$_REQUEST[fieldTwo]";
                        ?>
                </ol>
	</fieldset>
	
	<button type=submit>CREATE ACCOUNT</button>
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
    
    $query = 'SELECT COUNT(*) AS NUMBER_OF_ROWS FROM users';
    $stmt = oci_parse($connection, $query);
    oci_define_by_name($stmt, 'NUMBER_OF_ROWS',$number_of_rows);
    oci_execute($stmt);
    oci_fetch($stmt);
    $User_ID = ($number_of_rows + 1);
    //echo $number_of_rows;
    //echo $User_ID;
    
    $sql = "INSERT INTO USERS (USER_ID, LOCATION, AGE)
             VALUES(:User_ID,:Location,:Age)";
    
    $result = oci_parse($connection,$sql);
    
    oci_bind_by_name($result, ':User_ID', $User_ID);
    oci_bind_by_name($result, ':Location', $Location);
    oci_bind_by_name($result, ':Age', $Age);
              
    oci_execute($result);
    
    $sql2 = "INSERT INTO ACCOUNT (USER_ID, USERNAME, PASSWORD)
             VALUES(:User_ID,:Username, :Password)";
    
    $result2 = oci_parse($connection,$sql2);
    
    oci_bind_by_name($result2, ':Username', $Username);
    oci_bind_by_name($result2, ':User_ID', $User_ID);
    oci_bind_by_name($result2, ':Password', $Password);
    
    oci_execute($result2);
    }
    oci_close($connection);
    ?>
</form>
   
    

<img class="Box" src="account.jpg" alt="Rating System">

	<figcaption>
<h1 class="Box1"> The Best books' rating system </h1>
	</figcaption>

  </div>

  <footer>Copyright &copy; 2014 Issa Malke. All rights Reserved.
  <div class="hypLinks"><a href="Home.html">Home</a>&nbsp;<a href="Sign-in.html">Sign in</a>&nbsp;<a href="Add a Book.html">Add a Book</a>&nbsp;<a href="Find Book.html">Find Book</a>&nbsp;<a href="User Account.html">User Account</a>&nbsp;<a href="contact.html">Contact Us</a></div>
  </footer>

 </div>
</body>
</html>
