<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <title>Registered Users</title>
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
            margin: 50px auto;
            padding: 20px;
            width: 600px;
            background-color: rgba(0, 0, 0, 0.6);
        }
        h1 {
            text-shadow: 2px 2px 5px aliceblue;
            color: aquamarine;
            font-size: 35pt;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            color: rgb(199, 223, 192);
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ccc;
        }
        th {
            background-color: #333;
        }
        td {
            background-color: rgba(255, 255, 255, 0.4);
        }
    </style>
</head>
<body>
<h1><strong>All Registered Users</strong></h1>
<div class="content">
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

    // Fetch all registered users from the database
    try {
        $stmt = $pdo->query("SELECT id, username, email FROM users");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($users) > 0) {
            echo "<table><tr><th>ID</th><th>Username</th><th>Email</th></tr>";
            foreach ($users as $user) {
                echo "<tr><td>" . $user['id'] . "</td><td>" . $user['username'] . "</td><td>" . $user['email'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No users registered yet.</p>";
        }
    } catch (PDOException $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
    ?>
</div>
</body>
</html>
