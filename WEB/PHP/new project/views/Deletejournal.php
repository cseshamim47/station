<!DOCTYPE html>
<html>
<title>Add New Book</title>
<body>
<h2>Add Book</h2>
<form  method="GET" action="../controller/AddbookCheck.php"enctype="">
  <fieldset>
  <legend>Remove Journal</legend>
  
            Tittle: <input type="text" name="Bookid" value="" > <br>
            Place Of Publication: <input type="text" name="Bookname" value="" > <br>
            Publisher: <input type="text" name="Author" value="" > <br>
            Volume:    <input type="text" name="Catagory" value="" > <br>
            Issue:    <input type="text" name="Catagory" value="" > <br>
            Date:    <input type="text" name="Catagory" value="" > <br>
                     <input type="submit" name="submit" value="submit">
  </fieldset>
</form>
</body>
</html>
<?php