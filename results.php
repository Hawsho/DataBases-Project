<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search for Books</title>
    </head>
    <body>
        <h1>Search Results</h1>
<nav>
<ul>
<li><div class="border"><a href="Home.html">Home</a></div></li>
<li><a href="Sign-in.html">Sign in</a></li>
<li><a href="Add a Book.html">Add a Book</a></li>
<li><a href="search.html">Search for Books</a></li>
<li><a href="User Account.html">User Account</a></li>
<li><a href="contact.html">Contact Us</a></li>
</ul>
</nav>
   
        <?php
            $searchtype=$HTTP_POST_VARS['searchtype'];
            $searchterm=$HTTP_POST_VARS['searchterm'];
            $searchterm=trim($searchterm);
            
            if (!$searchtype || !$searchterm){
                echo 'You have not entered any search details.  Please try again.';
                exit;
            }
        

            
            $db = oci_connect($username = cmk, $password = Kremie21, $connection_string = '//oracle.cise.ufl.edu/orcl');
            
            putenv("ORACLE_HOME=/usr/local/libexec/oracle/app/oracle/product/11.2.0/client_1");
            
            if (!$db){
                echo 'Error: Could not connect to database.  Please try again.';
                exit;
            }
            

            $result = oci_parse($db, 'SELECT * FROM Books WHERE ".$searchtype." LIKE '%".$searchterm."%'"' );
            oci_execute($result);
            

            $num_results = oci_num_rows($result);
            
            echo '<p>Number of books found: '.$num_results.'</p>';
            
            for ($i=0; $i<$num_results; $i++){
                $row = oci_fetch_array($result);
                echo '<p><strong>'.($i+1).'. Title: ';
                echo htmlspecialchars(stripslashes($row['Title']));
                echo '</strong><br/>Author: ';
                echo stripslashes($row['Author']);
                echo '<br/>ISBN: ';
                echo stripslashes($row['ISBN']);
                echo '<br/>Year Published: ';
                echo stripslashes($row['Year_Of_Publication']);
                echo '<br/>Publisher: ';
                echo stripslashes($row['Publisher']);
                echo '</p>';
            }
            
            
            
            
            oci_free_statement($result);
            oci_close($db);
        ?>
    </body>
</html>
