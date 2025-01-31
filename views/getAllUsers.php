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
        <!-- put a headers in the table -->
        <th>User Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email Address</th>
        <th>User Address</th>
        <th>City</th>
        <th>User type</th>


    </tr>
    <?php
    // getting all (list) the users that register in the sing up page of our website
        foreach($data as $entry){ // look through each table entry 
            echo "<tr>";
            foreach($entry as $key=>$value){ // loop through each column with key value pair
                /// don't output the user password and the time stamp
                if($key == "user_password" || $key == "time_stamp"){
                    continue;
                }
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }



    ?>
</table>

