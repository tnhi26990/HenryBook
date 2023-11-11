<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inventory</title>
    </head>
    <body>
        <h1>Branch Inventory</h1>
        <?php
           $branchid = 0;
           $branchid = (int) $_GET['branchid'];
           if ($branchid > 0) {
               require_once('dbtest.php');
               $query = "SELECT * FROM Branch WHERE Branch_Number = $branchid ";
               $r = mysqli_query($dbc,$query);
               if (mysqli_num_rows($r) > 0) {
                   $row = mysqli_fetch_array($r);
                   echo "<p>Branch #: " .$row['Branch_Number']. "<br>";
                   echo "Branch Name: " .$row['Branch_Name']. "<br>";
                   echo "Location: " .$row['Branch_Location']. "<br></p>";
               } else {
                   echo "<p>Branch not on file.</p>";
               }
           echo "<table border='1'>";
           echo "<caption>Current Inventory</caption>";
           echo "<tr>";
           echo "<th>Book Cd</th>";
           echo "<th>Title</th>";
           echo "<th>Quantity</th>";
           echo "</tr>";
           $query2 = "SELECT invent.book_code As BookCd, book_title as Title, Units_on_hand As Qty 
                      FROM invent, book 
                      WHERE book.book_code = invent.book_code and branch_number = $branchid ";
           $r2 = mysqli_query($dbc,$query2);
           while ($row = mysqli_fetch_array($r2)) {
               echo "<tr>";
               echo "<td>" .$row['BookCd']. "</td>";
               echo "<td>" .$row['Title']. "</td>";
               echo "<td>" .$row['Qty']. "</td>";
               echo "</tr>";
           }
           echo "</table>";
           } else {
               echo '<p>No Branch ID found.</p>';
           }
        ?>
    </body>
</html>
