<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/style.css">
    <title>Games Reader</title>
</head>
<body>
    <header>
        <h1> <a href='./../'>Games Everywhere</a></h1>
        <nav class='categories-container'>
        </nav>
    </header>
    <main>
        <section class='post'>

        </section>
        <aside>
        <?php if(isset($_SESSION['login']) == false): ?>
            <section>
                <form class='login-form' method="post">
                    <h3 class='center'>Login Now</h3>

                    <label for="user-email">Email:</label>
                    <input type="email" name="user-email" id="login-email">

                    <label for="user-password">Password:</label>
                    <input type="password" name="user-password" id="login-password">
                    <button class='wd-all' type="submit ">Login</button>
                </form>
            </section>
            <section>
                <h3>Register Now</h3>
                <form class='register-form' method='post'>
                    <label for="user-name">Name:</label>
                    <input type="text" name="user-name" id="user-name">

                    <label for="user-last-name">Last Name:</label>
                    <input type="text" name="user-last-name" id="user-last-name">

                    <label for="user-email">Email:</label>
                    <input type="email" name="user-email" id="user-email">

                    <label for="user-password">Password:</label>
                    <input type="password" name="user-password" id="user-password">
                    <button class='wd-all' type="submit ">Register</button>
                </form>
            </section>
        <?php endif; ?>
        <?php if(isset($_SESSION['login']) == true) : ?>
            <section>
                <h3>Wha't up <?php echo $_SESSION['user-name']?>?</h3>
                <a class='wd-all' href="./dashboard/">Dashboard</a>
                <a class='wd-all bg-red' href="./src/helpers/close.php">Log Out</a>
            </section>
        <?php endif; ?>
        </aside>
    </main>
    <script src="./../src/js/reader.js" type='module'></script>
</body>
</html>