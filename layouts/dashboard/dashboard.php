<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: index.html");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #fbc2eb, #a6c1ee);
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .dashboard {
      background: white;
      padding: 30px 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      width: 350px;
      text-align: center;
    }
    .dashboard h2 {
      margin-bottom: 20px;
    }
    .dashboard .info {
      margin: 15px 0;
      text-align: left;
    }
    .dashboard .info p {
      margin: 10px 0;
      font-size: 16px;
    }
    .dashboard .info span {
      font-weight: bold;
      color: #ff69b4;
    }
    .btn-logout {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background: #ff99cc;
      color: white;
      text-decoration: none;
      border-radius: 10px;
    }
    .btn-logout:hover {
      background: #ff7eb3;
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <h2>User Dashboard</h2>
    <div class="info">
      <p>👤 Username: <span><?= htmlspecialchars($_SESSION['username']) ?></span></p>
      <p>🛡️ Role: <span><?= htmlspecialchars($_SESSION['role']) ?></span></p>
    </div>
    <a href="logout.php" class="btn-logout">Logout</a>
  </div>
</body>
</html>
