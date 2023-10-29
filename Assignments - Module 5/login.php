<?php
$warning = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];


  $userData = json_decode(file_get_contents('registration_data.json'), true);

  if (is_array($userData)) {
      foreach ($userData as $user) {
          if ($username === $user['username'] && $password === $user['password']) {
              
              setcookie('username', $username, time() + 3600);
              setcookie('role', $user['role'], time() + 3600); 
              header('Location: dashboard.php');
              $warning = "";
              exit();
          }

          else if($username === "admin" && $password === "admin"){
            header('Location: admin_dashboard.php');
            exit();
          }
      }
  }
  $warning = "Invalid login credentials. Please try again." ;
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>

    <!-- Tailwind CSS CDN -->
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css"
      rel="stylesheet"
    />

  </head>
  <body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
      <h2 class="text-2xl font-semibold mb-6">Login</h2>
      <form method="POST" action="./login.php">

        <div class="mb-4">
          <label for="username" class="block text-gray-600 font-medium"
            >Username</label
          >
          <input
            type="text"
            id="username"
            name="username"
            class="w-full border rounded-lg py-2 px-3"
            placeholder="Your username"
            required
          />
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-600 font-medium"
            >Password</label
          >
          <input
            type="password"
            id="password"
            name="password"
            class="w-full border rounded-lg py-2 px-3"
            placeholder="Your password"
            required
          />
        </div>

        <button
          type="submit"
          class="bg-blue-500 text-white py-2 px-4 rounded-lg w-full hover:bg-blue-600"
          Name="login"
        >
          Login
        </button>

      </form>

      <div class="">
        <p> Don't have an account ? <a href="./registration.php"> Register now </a> </p>
      </div>

      <div>
        <p class="text-red-500"> <?php echo $warning ?> </p>
      </div>

    </div>

  </body>
</html>





