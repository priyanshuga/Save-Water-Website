<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: sans-serif;
            color: white;
            width: 100%;
            height: 100%;
            background-image: url(background.png);
            background-size: cover;
        }

        .form {
            margin-left: auto;
            margin-right: auto;
            border: 1px solid;
            padding: 10px;
            box-shadow: 5px 10px black;
            width: 400px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 2px solid red;
        }
    </style>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php
    include "dbConn.php"; // Using database connection file here

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $insert = mysqli_query($db, "INSERT INTO `contact`(`name`, `email`,`subject`,`message`) VALUES ('$name','$email','$subject','$message')");

        if (!$insert) {
            echo '<script language="javascript">';
            echo 'alert("Error in the Database")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Records successfully sent")';
            echo '</script>';
        }
    }

    mysqli_close($db); // Close connection
    ?>
    <div class="side-bar">
        <a href="index.html"><img src="menu.png" class="menu" /></a>
        <div class="social-links">
            <img src="fb.png" alt="facebook" />
            <img src="ig.png" alt="instagram" />
            <img src="tw.png" alt="twitter" />
        </div>
        <div class="useful-links">
            <img src="share.png" alt="share" />
            <img src="info.png" alt="info" />
        </div>
    </div>
    <h1 style="text-align: center">Contact Us</h1>
    <div class="form">
        <form method="POST">
            <input type="text" name="name" placeholder="Enter Your Full Name" Required>
            <br />
            <br />
            <input type="email" name="email" placeholder="Enter Your Email" Required>
            <br />
            <br />
            <input type="text" name="subject" placeholder="Enter Subject" Required>
            <br />
            <br />
            <textarea name="message" placeholder="Enter Your Message" rows="4" cols="45" Required></textarea>
            <br />
            <br />
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>