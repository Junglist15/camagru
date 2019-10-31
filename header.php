<!DOCTYPE html>
<html>

<HEAD>
    <TITLE></TITLE>
    <style>
    <?php include "style.css"; ?>
    </style>
    <LINK rel="stylesheet" media="all"  href="include/style.css">
</HEAD>

<body>
    <HEADER>
        <nav>
            <a href="#">
                <img src="" alt="">
            </a>
            <ul>
                <li><a href="index.php">Naat</li>
                <li><a href="#">Vag</li>
                <li><a href="#">Bum</li>
                <li><a href="#">Peen</li>
            </ul>
            <div>
                <form action="includes/login.inc.php" method="post">
                    <input type="text" name="mailuid" placeholder="Username/email...">
                    <input type="password" name="pwd" placeholder="Password...">
                    <button type="submit" name="login-submit">Login</button>
                </form>
                <a href="signup.php">Signup</a>
                <form action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button>
                </form>
            </div>
        </nav>
    </HEADER>
</body>
</html>