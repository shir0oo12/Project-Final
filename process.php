<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the request is a POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the raw POST data (JSON format)
    $data = json_decode(file_get_contents('php://input'), true);

    // Extract the data from the JSON
    $name = $data['name'];
    $email = $data['email'];

    // Process the data (e.g., save to the database)
    // For this example, we'll just return a success message
    $response = [
        'status' => 'success',
        'message' => "Thank you, $name! We received your email: $email."
    ];

    // Return the response as JSON
    echo json_encode($response);
} else {
    // If the request method isn't POST, return an error
    $response = [
        'status' => 'error',
        'message' => 'Invalid request method.'
    ];
    echo json_encode($response);
}
?>
