<?php
$connection = new mysqli("localhost", "root", "", "crudseries", 3307);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Initialize counters
$counts = [
    "React" => 0,
    "Hono Framework" => 0,
    "Laravel" => 0
];

// Get all entries from seriescrud table
$sql = "SELECT multipleData FROM seriescrud";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $technologies = explode(", ", $row["multipleData"]);
        foreach ($technologies as $tech) {
            if (array_key_exists($tech, $counts)) {
                $counts[$tech]++;
            }
        }
    }
}

$connection->close();


$dataPoints = [];
foreach ($counts as $tech => $count) {
    $dataPoints[] = ["label" => $tech, "y" => $count];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Technology Usage Chart</title>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Most Used Technologies by Users"
                },
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "#,##0 Users",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>
</body>

</html>