<?php #this is the default php file for looking up Baby Names

    $page_title = 'BabyNames';
    require ('./pdoConn.php');


    echo '<h1>Years the Name Appears</h1>';

    //creates entry box
    echo 'Enter Name:<br>';
    echo '<form action="txtent.php" method="post">';


    //Enter button
    echo '<input type="text" name="nm" id="nm">';
    echo '<br><input type="submit" name="submit" value="Enter"><br>';
    echo '</form>';

    //return results from button click
    if ($_SERVER[REQUEST_METHOD] == 'POST')
    {
        $flit = $_POST[nm]; 
        echo '<br><br>';
        $sql2 = "SELECT DISTINCT year FROM BabyName
                 WHERE name = ?";
        $stmt = $conn->prepare($sql2);
        $stmt->execute(array($flit));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($rows as $r)
        {
            echo $r[year].' '.$r[''].' <br>';
        } 
     }
?>
</body>
</html>
