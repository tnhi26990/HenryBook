<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HB Branches</title>
    </head>
    <body>
        <script type="text/javascript" src="ajax.js"></script>
        <script type="text/javascript" src="Branch.js"></script>
        <h1>Henry Books Branch Inventory</h1>
        <p>Select a branch and click go to see inventory for that branch</p>
        <br>
        <form id="BranchForm" action="BranchResults.php" method="get">
        <?php
           require_once('dbtest.php');
           $query = "SELECT * FROM Branch ORDER BY Branch_Name";
           $r = mysqli_query($dbc,$query);
           if (mysqli_num_rows($r) > 0) {
               echo '<select id="branchid" name="branchid">';
               while ($row = mysqli_fetch_array($r)) {
                   echo '<option value="' .$row['Branch_Number']. '">'
                           .$row['Branch_Name']. '</option>';
               }
               echo '</select>';
           } else {
               echo "<p>No Branches found!</p>";
           }
        ?>
        <input type="submit" name="go" id="go" value="Go" />
        </form>
        <div id="results"></div>
    </body>
</html>

