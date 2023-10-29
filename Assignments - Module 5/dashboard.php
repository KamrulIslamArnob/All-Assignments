<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Welcome Page</title>
</head>
<body class="bg-gray-200 min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-bold mb-4">Welcome</h1>
        <?php
        if (isset($_COOKIE['username'])) {
            $username = $_COOKIE['username'];
            echo '<p class="text-gray-600">Hello, <span class="text-blue-600 font-semibold">' . $username . '</span>!</p>';
        } else {
            echo '<p class="text-gray-600">Hello, <span class="text-blue-600 font-semibold">John Doe</span>!</p>';
        }
        ?>
        <a href="login.php" class="text-blue-600 underline mt-4">Logout</a>
    </div>
</body>
</html>
