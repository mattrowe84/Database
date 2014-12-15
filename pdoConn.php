<?PHP
$host = 'students';
$user = 'z1714592';
$password = '19841017';
$db = 'BabyName';

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

$conn = new PDO("mysql:host=$host;dbname=$db",$user,$password);

try {

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

}
catch(PDOException $e) {

    echo 'ERROR: ' . $e->getMessage();

}

?>
