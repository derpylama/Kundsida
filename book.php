<?php

if (empty($_POST["time"]) or empty($_POST["first"]) 
or empty($_POST["last"]) or empty($_POST["email"]) or empty($_POST["phone"]) or empty($_POST["date"])) {
    header("Location: t-bokning.html");
}

if (empty($_POST["extra"])) {
    $extra = "";
}else {
    $extra = $_POST["extra"];
}

$time = $_POST["time"];
$date = $_POST["date"];
$first = $_POST["first"];
$last = $_POST["last"];
$email = $_POST["email"];
$phone = $_POST["phone"];

$mysqli = new mysqli("localhost", "root", "", "spajaw");
$mysqli -> set_charset("utf8");
if ($mysqli == false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Try to find an account through the database, use prepared statements to avoid SQL-injections
// (An account where the user's Username and Password match)
$stmt = $mysqli -> prepare("SELECT * FROM bookings WHERE time=? AND date=?");
$stmt -> bind_param("ss", $time, $date);
$stmt -> execute();


$results = $stmt -> get_result() -> fetch_assoc();

$page = $_GET["page"];
if (!empty($results)) {
    header("Location: ".$page."?fail=1");
    die();
}


$sql = "INSERT INTO bookings (extra, time, date, first, last, email, phone) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli -> prepare($sql);
$stmt -> bind_param("sssssss", $extra, $time, $date, $first, $last, $email, $phone);
$stmt -> execute();

$stmt -> close();

// UUID,- price, time, date, first, last, eGET, phone

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/booking.css" />
</head>
<body>
    <header>
        <a href="Index.html"><img src="images/spa&jaw.png" alt="logo"></a>
        <nav>
            <p>Njutbar tandvård hos Spa and Jaw</p>
            <ul class="horizontal-list" id="links">
                <li><a href="index.html">Hem & information</a></li>
                <li><a href="tjanster.html">Tjänster & priser</a></li>
                <li><a href="t-bokning.php">Bokning & tider</a></li>
            </ul>
        </nav>
    </header>
    <h1>Tid bokad</h1>
</body>
</html>