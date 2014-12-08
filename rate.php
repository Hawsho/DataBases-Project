<!DOCTYPE html>
<html lang="en">
<head>
<title>Rate My Book/Add a Book</title>
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
      <li><div class="border"><a href="Home.html">Home</a></div></li>
	  <li><a href="Sign-in.html">Sign in</a></li>
      <li><a href="Add a Book.html">Add a Book</a></li>
       <li><a href="Find Book.html">Find Book</a></li>
      <li><a href="User Account.html">User Account</a></li>
    </ul>
  </nav>
  <div id="content"> 
 
 <div class="article"><span class="font">Note: </span>Type in the ISBN of the book you wish to rate.  Please also enter your username.<br>
	The default value for rating a book is 1.<br>Books can be rated on a scale of 1 to 10.
 </div>
 <br><br><br><br>
	<form id=Standard>
	<fieldset>
		<legend>Book Details</legend>
		<ol>
			<li>
			<label for=ISBN>ISBN</label>
			<input id=ISBN name=ISBN type=text required>
			</li>

		</ol>
	</fieldset>
	<fieldset>
		<legend>Rating</legend>
		<ol>
			<li>
			<label for="Rate">Rating</label> 
			(1 - 10)
			<input type="range" name="Rate" id="Rate" min="1" max="10">
			</li>
			<li>
			<label for=Username>Username</label>
			<input id=Username name=Username type=text required>
			</li>
		
			</li>
		</ol>
 <?php
$ISBN = $_REQUEST['ISBN'];
$Rating = $_REQUEST['Rating'];
$Username = $_REQUEST['Username'];
?>
		<br>
		<button type=submit>Rate Book</button>
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

$sql = "SELECT USER_ID FROM Account WHERE :Username";

$results = oci_parse($connection, $sql);
oci_bind_by_name($result, ':Username, $Username);
oci_execute($result);	

$sql2 = "INSERT INTO RATINGS (USER_ID, ISBN, BOOK_RATING)
VALUES(:user_id, :ISBN, :Rate)";
$result2 = oci_parse($connection,$sql2);
oci_bind_by_name($result2, ':User_ID',$user_id);
oci_bind_by_name($result2, ':ISBN',$ISBN);
oci_bind_by_name($result2, ':Rate',$Rate);
oci_execute($result2);
}
oci_close($connection);
?>

</form>
	
//<img class="Box2" src="Add.jpg" alt="Add a Book">

  </div>
  <footer>Copyright &copy; 2014 Issa Malke. All rights Reserved.
  <div class="hypLinks"><a href="Home.html">Home</a>&nbsp;<a href="Sign-in.html">Sign in</a>&nbsp;<a href="Add a Book.html">Add a Book</a>&nbsp;<a href="Find Book.html">Find Book</a>&nbsp;<a href="User Account.html">User Account</a>&nbsp;</div>
  </footer>
 </div>
</body>
</html>

