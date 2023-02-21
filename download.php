<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "casestudy");

// Generate the SQL queries to retrieve data
$sql = "SELECT * FROM table";

$result = mysqli_query($conn, $sql);

// Generate the SQL file
$filename = "database.sql";
$file = fopen($filename, "w");

while ($row = mysqli_fetch_assoc($result)) {
    $sql = "INSERT INTO table (column1, column2) VALUES ('" . $row['column1'] . "', '" . $row['column2'] . "');";
    fwrite($file, $sql . "\n");
}

fclose($file);

// Output the generated SQL file
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"" . $filename . "\"");

readfile($filename);

// Delete the generated SQL file
unlink($filename);
?>
