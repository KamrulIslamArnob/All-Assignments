<?php
$jsonFile = 'registration_data.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = json_decode(file_get_contents('php://input'), true);

    if ($postData !== null) {
        // Read the existing JSON data
        $jsonData = json_decode(file_get_contents($jsonFile), true);

        if ($jsonData === null) {
            $jsonData = [];
        }

        if (isset($postData['action']) && $postData['action'] === 'addUser') {
            // Add a new user
            $newUser = [
                'username' => $postData['username'],
                'email' => $postData['email'],
                'role' => $postData['role'],
            ];

            $jsonData[] = $newUser;
        } elseif (isset($postData['action']) && $postData['action'] === 'updateRole') {
            // Update user role
            $username = $postData['username'];
            $newRole = $postData['role'];

            // Find and update the user's role in the JSON data
            foreach ($jsonData as &$user) {
                if ($user['username'] === $username) {
                    $user['role'] = $newRole;
                    break;
                }
            }
        }

        // Save the updated JSON data back to the file
        $result = file_put_contents($jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT));

        if ($result === false) {
            echo json_encode(['error' => 'Failed to write to JSON file']);
        } else {
            echo json_encode(['success' => true]);
        }
    } else {
        echo json_encode(['error' => 'Invalid data provided']);
    }
}
?>