<?php 
// Verbindung zur Datenbank herstellen (Beispiel für MySQL)
$servername = "localhost";
$username = "dein_db_benutzername";
$password = "dein_db_passwort";
$dbname = "deine_datenbank_name";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
if (!$conn) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . mysqli_connect_error());
}

// Benutzername und Passwort aus dem POST-Array abrufen
$username = $_POST['username'];
$password = $_POST['password'];

// SQL-Abfrage zum Überprüfen der Benutzerdaten
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

// Überprüfen, ob ein Datensatz gefunden wurde
if (mysqli_num_rows($result) == 1) {
    // Login erfolgreich
    echo "Login erfolgreich. Willkommen, $username!";
} else {
    // Login fehlgeschlagen
    echo "Ungültige Anmeldedaten. Bitte versuche es erneut.";
}

// Verbindung zur Datenbank schließen
mysqli_close($conn);
?>
