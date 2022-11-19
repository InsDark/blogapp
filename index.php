<?php 
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style.css">
    <title>Games Everywhere</title>
</head>
<body>
    <header>
        <h1>Games Everywhere</h1>
        <nav class='categories-container'>
        </nav>
    </header>
    <main>
        <section class="entries">
            <div class="blog-item">
                <h2>Lorem ipsum dolor sit amet consectetur.</h2>

                    <img></img>
                    <h3>Kono Dio Da</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis blanditiis totam cumque asperiores odio deleniti suscipit. Distinctio officiis ducimus odit. Fugiat quod dolores a non incidunt consequuntur aut ipsum laborum.</p>
                    <a href="">Read More</a>

            </div>
            <div class="blog-item">
                <h2>Lorem ipsum dolor sit amet consectetur.</h2>
                <img></img>
                    <h3>Kono Dio Da</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis blanditiis totam cumque asperiores odio deleniti suscipit. Distinctio officiis ducimus odit. Fugiat quod dolores a non incidunt consequuntur aut ipsum laborum.</p>
                    <a href="">Read More</a>

            </div>
            <div class="blog-item">
                <h2>Lorem ipsum dolor sit amet consectetur.</h2>
                <img></img>
                    <h3>Kono Dio Da</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis blanditiis totam cumque asperiores odio deleniti suscipit. Distinctio officiis ducimus odit. Fugiat quod dolores a non incidunt consequuntur aut ipsum laborum.</p>
                    <a href="">Read More</a>
            </div>
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
                <form class='login-form' method='post'>
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
                <a class='wd-all bg-red' href="./src/php/close.php">Log Out</a>
            </section>
        <?php endif; ?>
        </aside>
    </main>
    <script src="./src/js/app.js" type='module'></script>
</body>
</html>