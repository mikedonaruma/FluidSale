<?php $day = date('20y-m-d');
echo '<HTML>';
echo '<title>Daily Sales Module</title>';
echo '<h1>Daily Sales Module</h1>';
echo '<body><i>Please select the desired date</i>';
echo '<form><input type = "date" name="day" value="<?php echo $day;?>"/> ';
echo '<input type="submit"/></form>';

$servername = 'localhost';
$username = 'root';
$password = 'password';
$database = 'FluidSale';
$day = isset($_GET['day']) ? $_GET['day']: '';
$totalSales;
$totalTrans;

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT saleID,dID,mPhone,custFN,mealCost,paymentMethod,timeS FROM Sale WHERE date(timeS)='$day' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "Results for $day:";
	// setup table
	echo"<table><tr><th>Sale ID</th><th>Drawer ID</th><th>Phone Number</th><th>Name</th>
	<th>Cost</th><th>Method</th><th>Time</th>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["saleID"]."</td><td>".$row["dID"]."</td><td>".$row["mPhone"]. 
        "</td><td>".$row["custFN"]."</td><td>".$row["mealCost"]."</td><td>".$row["paymentMethod"].
        "</td><td>".$row['timeS']."</td></tr>";

        //counting
        $totalSales +=$row['mealCost'];
        $totalTrans +=1;
    }
    //close table
    echo "</table>";
    echo 'Total sales: '.$totalSales;
    echo '</br> Total Transactions: '.$totalTrans;
    
} else {
    echo "0 results";
}

$conn->close();
echo '</body></HTML>';
?>
