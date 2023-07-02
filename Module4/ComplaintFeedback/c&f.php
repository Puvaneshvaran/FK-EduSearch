<!-- new complaint/feedback.php -->
<!-- Interface of insert data. -->
<html>
<head>
<style>

body{
 font-size: 20px;
}

.button {
  background-color: #CC7722;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 3px 2px;
  cursor: pointer;
}
</style>
<title>Complaint/Feedback</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<center>
<body bgcolor="#FFFFFF" text="#000000">
 <form method="post" action="insert.php">
  <br>
  <br>
 User Name  :
<input type="text" name="username" size="50" style="border:2px solid orange;" >
<br>
</br>

<form method="POST">
Type of Complaint:
<td>  
                        
				  
				  <td>
				  <select style="border:2px solid orange;" name=type_complaint onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['id'] ?>')">  
                               
					  <option value="Unsatisfied Expert's Feedback">Unsatisfied Expert's Feedback</option>  
                                <option value="Wrongly Assigned Research Area">Wrongly Assigned Research Area</option>  
                                <option value="Answer Not Specific">Answer Not Specific</option>  
                                <option value="Others">Others</option>  
                           </select>  
					</tr>
<?php 
					?>
      </table>  
<br>
<br>
Complaint : <br>
<textarea name="complaint" cols="100" rows="8" style="border:2px solid orange;"></textarea>
<br>
</br>
<br>

<input type="submit" class="button" value="SUBMIT">
<input type="reset" class="button" value="RESET">
<br>
</form>
<hr>
<div align="center"> 
<a href="index.php" class="button">BACK</a>  </div>
</body>
</center>
</html>