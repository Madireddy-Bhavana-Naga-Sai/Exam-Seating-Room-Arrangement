<?php

$host = 'localhost'; 
$dbname = 'Login'; 
$username = 'postgres'; 
$password = 'Bhavana@20'; 

try {
    
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
   
    echo "Connected to PostgreSQL database successfully!";
} catch (PDOException $e) {
    
    die("Connection failed: " . $e->getMessage());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "INSERT INTO Login (username, password) VALUES (?, ?)";

    try {
       
        $stmt = $pdo->prepare($sql);

        
        $stmt->execute([$username, $password]);
        
        
        echo "User registered successfully!";
    } catch (PDOException $e) {
        /
        echo "Error: " . $e->getMessage();
    }
}
?>
