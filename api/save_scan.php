<?php
// Allow CORS for safety in testing (optional)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: text/plain");

// Get JSON data from frontend
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo "❌ No data received!";
    exit;
}

$regno = $data["regno"] ?? "unknown";
$lat = $data["latitude"] ?? "0";
$lon = $data["longitude"] ?? "0";
$time = date("Y-m-d H:i:s");

// Save in log file
$logFile = __DIR__ . "/location_log.txt";
$entry = "RegNo: $regno | Lat: $lat | Lon: $lon | Time: $time\n";

if (file_put_contents($logFile, $entry, FILE_APPEND)) {
    echo "✅ Location saved successfully!";
} else {
    echo "❌ Failed to save location.";
}
?>
