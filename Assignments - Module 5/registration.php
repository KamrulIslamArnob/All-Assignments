<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['password_confirmation'];
    $role = '';

    if ($username && $email && $password && $password === $passwordConfirmation) {
  
        $registrationData = array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'role' => $role
        );

      
        $existingData = [];
        if (file_exists('registration_data.json')) {
            $jsonContent = file_get_contents('registration_data.json');
            $existingData = json_decode($jsonContent, true);
        }

       
        $existingData[] = $registrationData;

      
        file_put_contents('registration_data.json', json_encode($existingData, JSON_PRETTY_PRINT));

        echo "Registration successful. You can now login.";
        header('Location: login.php');
        exit();
    } else {
        echo "Invalid registration data. Please check your input.";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Page</title>

   
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet" />

</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold mb-6">Register</h2>

        <form method="POST" action="./registration.php">

            <div class="mb-4">
                <label for="username" class="block text-gray-600 font-medium">Username</label>
                <input type="text" id="username" name="username" class="w-full border rounded-lg py-2 px-3"
                    placeholder="Your username" required />
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-medium">Email</label>
                <input type="email" id="email" name="email" class="w-full border rounded-lg py-2 px-3"
                    placeholder="Your email" required />
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-600 font-medium">Password</label>
                <input type="password" id="password" name="password" class="w-full border rounded-lg py-2 px-3"
                    placeholder="Your password" required />
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-600 font-medium">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full border rounded-lg py-2 px-3" placeholder="Confirm password" required />
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg w-full hover:bg-blue-600"
                Name="register">
                Register
            </button>

        </form>
    </div>
</body>

</html>