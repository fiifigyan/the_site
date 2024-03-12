<?php
// Database connection variables
$host = "localhost";
$dbname = "appointment";
$username = "root";
$password = "";

// Create a new PDO instance to connect to the database
try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  // Set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// Function to book an appointment
function bookAppointment($date, $slot, $userId) {
  global $conn;

  // Prepare the SQL statement
  $stmt = $conn->prepare("INSERT INTO appointments (appo_date, appo_slot, user_id) VALUES (:date, :slot, :userId)");

  // Bind parameters to the prepared statement
  $stmt->bindParam(':date', $date);
  $stmt->bindParam(':slot', $slot);
  $stmt->bindParam(':userId', $userId);

  // Execute the statement and check for errors
  try {
    $stmt->execute();
    return "Appointment booked successfully!";
  } catch(PDOException $e) {
    return "Error: " . $e->getMessage();
  }
}

// Example usage
// Assume these values come from a form submission
$appoDate = "2024-03-12"; // The appointment date
$appoSlot = "10:00 AM";   // The appointment time slot
$userId = 1;              // The user ID

// Call the function to book the appointment
echo bookAppointment($appoDate, $appoSlot, $userId);
?>