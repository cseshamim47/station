<!DOCTYPE html>
<html>
<title>Add New Book</title>
<body>
<h2>Add Book</h2>
<form  method="POST" action="../controller/AddbookCheck.php"enctype="">
  <fieldset>
  <legend>Book Management</legend>
  
            Bookid: <input type="text" name="Bookid" value="" > <br>
            Bookname: <input type="text" name="Bookname" value="" > <br>
            Author: <input type="text" name="Author" value="" > <br>
            Catagory:    <input type="text" name="Catagory" value="" > <br>
                     <input type="submit" name="submit" value="submit">
  </fieldset>
</form>
</body>
</html>
<?php