<?php
// Baza danych - Dane dostępowe
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Połączenia
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// Dane z formularza
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Poprawność wprowadzonych danych
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Nieprawidłowy adres e-mail.";
} else {
    // Zapis użytkownika do bazy danych
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Użytkownik zarejestrowany pomyślnie.";
    } else {
        echo "Błąd podczas rejestracji użytkownika: " . $conn->error;
    }
}

$conn->close();
?>