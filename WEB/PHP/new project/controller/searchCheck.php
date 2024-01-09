<?php
require_once('../models/userModel.php');

if (isset($_POST['submit']) && isset($_POST['search'])) {
    $search_query = $_POST['search'];

    // Call a function to retrieve search results based on the search query
    $filtered_viewbook = getFilteredResults($search_query);
} else {
    // Default behavior (no search query provided)
    $filtered_viewbook = $viewbook;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Database</title>
</head>
<body>
    <h2>Book Catalog</h2>
    
    <!-- The search form remains the same as in the previous code -->
    <form method="post" action="../controller/searchCheck.php">
        <input type="text" placeholder="Search" name="search">
        <button type="submit" name="submit">Search</button>
    </form>
    
    <table border="1" cellspacing="0" align="center" cellpadding="5">
        <tr>
            <td>Book ID</td>
            <td>Book Name</td>
            <td>Author</td>
            <td>Category</td>
        </tr>

        <?php for ($i = 0; $i < count($filtered_viewbook); $i++) { ?>
            <tr>
                <td><?= $filtered_viewbook[$i]['Book_ID'] ?></td>
                <td><?= $filtered_viewbook[$i]['Book_Name'] ?></td>
                <td><?= $filtered_viewbook[$i]['Author'] ?></td>
                <td><?= $filtered_viewbook[$i]['Category'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
