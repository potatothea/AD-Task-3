
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title> Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"/>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      background: linear-gradient(135deg, #ffc1e3, #d1caff, #b0f0f3);
      background-size: 300% 300%;
      animation: floatBG 10s ease infinite;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    @keyframes floatBG {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .login-container {
      width: 100%;
      max-width: 400px;
      padding: 20px;
    }

    .login-box {
      background-color: #ffffffcc;
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 40px 30px;
      box-shadow: 0 8px 20px rgba(255, 182, 193, 0.4);
      color: #6d597a;
      transition: all 0.3s ease;
    }

    .login-box:hover {
      transform: scale(1.01);
      box-shadow: 0 12px 30px rgba(255, 182, 193, 0.5);
    }

    .login-box h2 {
      font-size: 28px;
      margin-bottom: 10px;
      text-align: center;
      color: #ff69b4;
    }

    .login-box p {
      text-align: center;
      margin-bottom: 30px;
      color: #a786df;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
      color: #6d597a;
    }

    .input-group input {
      width: 100%;
      padding: 12px 15px;
      border: 2px solid #fbcfe8;
      border-radius: 12px;
      background-color: #fff0f6;
      color: #6d597a;
      transition: border-color 0.3s;
    }

    .input-group input:focus {
      outline: none;
      border-color: #f472b6;
      box-shadow: 0 0 0 3px #fde7f3;
    }

    button {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 12px;
      background: linear-gradient(90deg, #fda4af, #c4b5fd);
      color: white;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(255, 182, 193, 0.4);
      transition: background 0.3s ease;
    }

    button:hover {
      background: linear-gradient(90deg, #fb7185, #a78bfa);
    }

    .links {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
      font-size: 14px;
    }

    .links a {
      color: #b185db;
      text-decoration: none;
      transition: color 0.3s;
    }

    .links a:hover {
      color: #ec4899;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <form class="login-box" method="POST" action="login.php">
      <h2>Welcome Back!</h2>
      <p>Please login to your account</p>
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      <button type="submit">Login</button>
    </form>
    </form>
  </div>
</body>
</html>
