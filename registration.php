<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <style>
        body {
            background-image: url();
            background-size: cover;
            background-repeat: no-repeat;
        }
        .content {
            text-align: center;
            border-radius: 10px;
            border: 2px solid rgba(255, 255, 255, 0.44);
            margin: 150px auto;
            padding: 20px;
            width: 400px;
            background-color: rgba(0, 0, 0, 0.6);
        }
        label, f {
            font-size: 15pt;
            color: rgb(199, 223, 192);
        }
        h1 {
            text-shadow: 2px 2px 5px aliceblue;
            color: aquamarine;
            font-size: 35pt;
            text-align: center;
        }
        input[type="text"], input[type="password"], input[type="email"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: aquamarine;
            font-size: 15pt;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: lightseagreen;
        }
        p {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
<h1><strong>Registration Page</strong></h1>
<div class="content">
    <form method="post" action="registration.php">
        <label for="username"><f>Username</f></label><br />
        <input type="text" id="username" name="username" required /><br />

        <label for="email"><f>Email</f></label><br />
        <input type="email" id="email" name="email" required /><br />

        <label for="password"><f>Password</f></label><br />
        <input type="password" id="password" name="password" required /><br />

        <input type="submit" name="register" value="Register" /><br />
    </form>

    <?php
    // MySQL PDO connection setup
    $host = "localhost";
    $dbname = "connexion";
    $username = "root";  // Replace with your MySQL username
    $password = "";      // Replace with your MySQL password

    try {
        // Create PDO connection
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register'])) {
        $user = trim($_POST['username']);
        $email = trim($_POST['email']);
        $pass = trim($_POST['password']);
        $error = "";

        // Basic validation
        if (empty($user) || empty($email) || empty($pass)) {
            $error = "All fields are required.";
        }

        if (!$error) {
            // Insert user into the database using prepared statement
            try {
                $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $stmt->execute([$user, $email, $pass]);

                // Redirect to success page after successful registration
                header("Location: success.php");
                exit();
            } catch (PDOException $e) {
                $error = "Error: " . $e->getMessage();
            }
        }

        // Display any error messages
        if ($error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
    ?>
</div>
</body>
</html>
