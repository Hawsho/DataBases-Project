#!/usr/local/bin/php

<html>
<body>
<h1>Search Application</h1>
<div class="container">
<form id="AppSearch" method="post" action="">
<table class="search_form" style="width:100%; border:none;">
  <tr>
    <td width="18%" class="label">ID</td>
    <td width="60"><label>
      <select name="idNum" id="idNum">
        <option></option>
        <option>123</option>
        <option>234</option>
        <option>345</option>
      </select>
    </label></td>
  </tr>
 
  <tr>
    <td colspan="2" class="label"><label>
    <input type="submit"  name="submit" value="Search">     
    </label>
    </td>
  </tr>
</table>
</form>

</div>

<div id="main"> 
<ul class="listing">
<?php
if($_POST["submit"]=="Search"){
  $ID=$_POST['idNum'];
	
  putenv("ORACLE_HOME=/usr/local/libexec/oracle11g-client");
  $conn = ocilogon("username", "database password", "oracle.cise.ufl.edu:1521/orcl");
  if(!$conn)
  {
    print("ERROR");
  }

  $search=ociparse($conn, 
	"select ID,univName,major,decision
	from Apply
        where ID = '$ID'	
	");

  ociexecute($search);

  print"<h2 id='title'>This Applicant applied</h2>";
  print"<table border='2'>";
  while($array=oci_fetch_row($search))
  {
    print"<tr>";
    print"<td>$array[0]";
    print"<td>$array[1]";
    print"<td>$array[2]";
    print"<td>$array[3]";
    print"</tr>";

  }
  print"</table></br>"; 
}
oci_free_statement($search);
ocilogoff($conn);
?>
</ul>
</div>

</body>
</html>
