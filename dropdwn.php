<html>
<body>
<?php #php file for looking up Baby Names by year drop down

    $page_title = 'Distinct names in Year';
    require ('./pdoConn.php');
    $sql = "SELECT DISTINCT year from BabyName";

    echo '<h1> Number of Distinct Names in year by Gender </h1>';

    //This section creates the form
    echo 'Select a year: <br>';
    echo '<form action="dropdwn.php" method="post">';
    echo '<select name= "yr">';

    foreach($conn->query($sql) as $row)
    {
        //Populates dropdown with distinct years
        echo '<option value ="'. $row['year'].' ">'. $row['year']. '</option>';
    }    echo '</select>';

    //Creates submit values
    echo '<br><input type="submit" name="submit" value="List"><br>';
    echo '</form>';

    //Runs when the submit button is clicked
    if ($_SERVER[REQUEST_METHOD] == 'POST')
    {
        $flit = $_POST[yr];

	echo '<br><br>';

	$sql2 = "SELECT gender, COUNT(name) AS 'Number of Babies' FROM BabyName
                 WHERE year = ? GROUP BY gender";

	$stmt = $conn->prepare($sql2);

	$stmt->execute(array($flit));

	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($rows as $r)
        {
            echo $r[gender].' '.$r['Number of Babies'].' <br>';
        } 
     } 
?>
</body>
</html>
