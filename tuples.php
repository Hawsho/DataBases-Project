<!DOCTYPE html>
<html lang="en">
<head>
<title>Tuples</title>
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
<li><a href="tuples.php">Tuples</a></li>
    </ul>
  </nav>
  <div id="content"> 
 
 <div class="article"><span class="font">Note: </span>We have four tables: Books, Ratings, Users, and Account.<br>
     Please select one of the four and type your selection in the text field.
	
 </div>
 <br><br><br><br>
	<form id=Standard>
	<fieldset>
		<legend>Tuples</legend>
		<ol>
			<li>
			<label for=TableName>Table Name</label>
			<input id=TableName name=TableName type=text required>
			</li>

                        <?php
                         $ISBN = $_REQUEST['TableName'];
                        ?>
		</ol>
	</fieldset>
	<fieldset>
		<button type=submit>Show me the tuples!</button>
	</fieldset>
	</div>
	
	</div>
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
        
        $query = "SELECT COUNT(*) FROM :TableName";
        
        $result = oci_parse($connection, $query);
        
        oci_bind_by_name($result, ':TableName',$ISBN);

        
        oci_execute($result);

 
        }
        oci_close($connection);
    ?>	
</form>
    
 

  </div>
  <footer>Copyright &copy; 2014 Issa Malke. All rights Reserved.
  <div class="hypLinks"><a href="Home.html">Home</a>&nbsp;<a href="Sign-in.html">Sign in</a>&nbsp;<a href="Add a Book.html">Add a Book</a>&nbsp;<a href="Find Book.html">Find Book</a>&nbsp;<a href="User Account.html">User Account</a>&nbsp;<a href="contact.html">Contact Us</a></div>
  </footer>
 </div>
</body>
</html>

