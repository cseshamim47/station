<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_string = $_POST['search_string'];

        // Connect to your MySQL database (replace with your database credentials)
        $conn = new mysqli("localhost", "root", "", "test",3308);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute a SQL query
        $query = "SELECT * FROM books WHERE CONCAT() LIKE '%" . $search_string . "%'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . htmlspecialchars($row['column_name']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No results found.";
        }

        // Close the database connection
        $conn->close();
    }
    ?>

    <a href="index.html">Back to Search</a>
</body>
</html>
