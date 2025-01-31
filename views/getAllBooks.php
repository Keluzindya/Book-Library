<table>
<style>
    /* Styling for the table */
    table {
        width: 100%;
        border-collapse: collapse; /* Ensures borders are collapsed together */
    }
    th, td {
        padding: 12px; /* Adds space inside each cell */
        text-align: left; /* Aligns text to the left in each cell */
        border: 1px solid #ddd; /* Light grey border for each cell */
    }
    th {
        background-color: #f2f2f2; /* Light grey background for header */
        color: #333; /* Dark text color for header */
    }
    tr:nth-child(even) {
        background-color: darkgray; /* Alternate row colors */
    }
    tr:hover {
        background-color: #f1f1f1; /* Change background color when hovering over rows */
    }
</style>
<tr>
    <!-- Table headers -->
    <th>Book Id</th>
    <th>Book Title</th>
    <th>Book Author</th>
    <th>Book Genre</th>
    <th>Book Description</th>
    <th>Book Price</th>
    <th>Book Image</th>
</tr>
<?php
// Check if $data is not empty
if (!empty($data)) {
    // Iterate through the data and display each book
    foreach ($data as $entry) {
        echo "<tr>";
        foreach ($entry as $key => $value) {
            // Check if the key is 'image' to display it as an image
            if ($key === 'image') {
                echo "<td><img src='" . htmlspecialchars($value) . "' alt='Book Image' width='100' height='100'></td>";
            } else {
                // Escape output for security
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
        }
        echo "</tr>";
    }
} else {
    // Display a message if no data is available
    echo "<tr><td colspan='7' style='text-align: center;'>No books found.</td></tr>";
}
?>
</table>
