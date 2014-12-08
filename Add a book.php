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
       <li><div class="border"><a href="index1.php">Home</a></div></li>
<li><a href="sign-in.php">Sign in</a></li>
<li><a href="addabook.php">Add a Book</a></li>
<li><a href="findbook.php">Search for Books</a></li>
<li><a href="useraccount.php">User Account</a></li>
<li><a href="contact.html">Contact Us</a></li>
    </ul>
  </nav>
  <div id="content"> 
 
 <div class="article"><span class="font">Note: </span>All fields are required to add a book.<br>
	The default value for rating a book is 1.<br>Books can be rated on a scale of 1 to 10.
 </div>
 <br><br><br><br>
	<form id=Standard>
	<fieldset>
		<legend>Books' Details</legend>
		<ol>
			<li>
			<label for=ISBN>ISBN</label>
			<input id=ISBN name=ISBN type=text required>
			</li>
			<li>
			<label for=Title>Title</label>
			<input id=Title name=Title type=text required>
			</li>
			<li>
			<label for=Author>Author</label>
			<input id=Author name=Author type=text >
			</li>
			<li>
			<label for=Year>Publication Year</label>
			<input id=Year name=Year type=text >
			</li>
			<li>
			<label for=Publisher>Publisher</label>
			<input id=Publisher name=Publisher type=text >
			</li>
                        <?php
                         $ISBN = $_REQUEST['ISBN'];
                         $Title = $_REQUEST['Title'];
                         $Author = $_REQUEST['Author'];
                         $Year = $_REQUEST['Year'];
                         $Publisher = $_REQUEST['Publisher'];
                         $Rate = $_REQUEST['Rate'];
                         $user_id = $_REQUEST['User_ID'];
                        ?>
		</ol>
	</fieldset>
	<fieldset>
		<legend>Rating</legend>
		<ol>
			<li>
			
			
			<label for="Rate">Book's Rate</label> 
			(1 - 10)
			<input type="range" name="Rate" id="Rate" min="1" max="10">
			
		
			</li>
		</ol>
		<br>
		<button type=submit>Add Book</button>
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
     
        $sql = "INSERT INTO books (ISBN, Title, Author, Year, Publisher)
               VALUES(:ISBN, :Title, :Author,:Year, :Publisher ,NULL,NULL,NULL)";
        
        $result = oci_parse($connection,$sql);
        
        oci_bind_by_name($result, ':ISBN',$ISBN);
        oci_bind_by_name($result, ':Title',$Title);
        oci_bind_by_name($result, ':Author',$Author);
        oci_bind_by_name($result, ':Year',$Year);
        oci_bind_by_name($result, ':Publisher',$Publisher);
        
        oci_execute($result);
        //$user_id = mysql_query( "SELECT user_id FROM Account c, User u WHERE c.username == u.username");
    
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
    
 
<img class="Box2" src="Add.jpg" alt="Add a Book">

  </div>
  <footer>Copyright &copy; 2014 Issa Malke. All rights Reserved.
  <div class="hypLinks"><a href="Home.html">Home</a>&nbsp;<a href="Sign-in.html">Sign in</a>&nbsp;<a href="Add a Book.html">Add a Book</a>&nbsp;<a href="Find Book.html">Find Book</a>&nbsp;<a href="User Account.html">User Account</a>&nbsp;<a href="contact.html">Contact Us</a></div>
  </footer>
 </div>
</body>
</html>














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
       <li><div class="border"><a href="index1.php">Home</a></div></li>
<li><a href="sign-in.php">Sign in</a></li>
<li><a href="addabook.php">Add a Book</a></li>
<li><a href="findbook.php">Search for Books</a></li>
<li><a href="useraccount.php">User Account</a></li>
<li><a href="contact.html">Contact Us</a></li>
    </ul>
  </nav>
  <div id="content"> 
 
 <div class="article"><span class="font">Note: </span>All fields are required to add a book.<br>
	The default value for rating a book is 1.<br>Books can be rated on a scale of 1 to 10.
 </div>
 <br><br><br><br>
	<form id=Standard>
	<fieldset>
		<legend>Books' Details</legend>
		<ol>
			<li>
			<label for=ISBN>ISBN</label>
			<input id=ISBN name=ISBN type=text required>
			</li>
			<li>
			<label for=Title>Title</label>
			<input id=Title name=Title type=text required>
			</li>
			<li>
			<label for=Author>Author</label>
			<input id=Author name=Author type=text >
			</li>
			<li>
			<label for=Year>Publication Year</label>
			<input id=Year name=Year type=text >
			</li>
			<li>
			<label for=Publisher>Publisher</label>
			<input id=Publisher name=Publisher type=text >
			</li>
		</ol>
	</fieldset>
	<fieldset>
		<legend>Rating</legend>
		<ol>
			<li>
			
			
			<label for="Rate">Book's Rate</label> 
			(1 - 10)
			<input type="range" name="Rate" id="Rate" min="1" max="10">
			
		
			</li>
		</ol>
		<br>
		<button type=submit>Add Book</button>
	</fieldset>
	</div>
	
	</div>
	
</form>
     <?php
    if ($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }
    $sql = "INSERT INTO book (ISBN, Title, Author, Year, Publisher, Rate)
             VALUES('$_REQUEST(ISBN)', '$_REQUEST(Title)', '$_REQUEST(Author)','$_REQUEST(Year)', '$_REQUEST(Publisher)', '$_REQUEST(Rate)'";

    if ($connection->query($sql) === TRUE){
        echo "New record created";
    }else{
        echo "Error: " .$sql ."<br>" . $connection->error;
    }
    
    $connection->close();
    ?>	
<img class="Box2" src="Add.jpg" alt="Add a Book">

  </div>
  <footer>Copyright &copy; 2014 Issa Malke. All rights Reserved.
  <div class="hypLinks"><a href="Home.html">Home</a>&nbsp;<a href="Sign-in.html">Sign in</a>&nbsp;<a href="Add a Book.html">Add a Book</a>&nbsp;<a href="Find Book.html">Find Book</a>&nbsp;<a href="User Account.html">User Account</a>&nbsp;<a href="contact.html">Contact Us</a></div>
  </footer>
 </div>
</body>
</html>
