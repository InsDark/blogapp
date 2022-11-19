<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Games Everywhere</h1>
        <nav>
            <a href="">Home</a>
            <a href="">Mobas</a>
            <a href="">RPG</a>
            <a href="">Shoother</a>
            <a href="">Racing</a>
            <a href="">About Us</a>
            <a href="">Contact Us</a>
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
            <section>
                <div class="suscribe">
                    <h3>Suscribe Our newsletter</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, eum?</p>
                    <input type="text" name="" id="">
                    <a href="#">Sign Up</a>
                </div>
            </section>
            <section>
                <h3>Register Now</h3>
                <form action="./api/post.php" method="post">
                    <label for="user-name">Name:</label>
                    <input type="text" name="user-name" id="user-name">

                    <label for="user-last-name">Last Name:</label>
                    <input type="text" name="user-last-name" id="user-last-name">

                    <label for="user-email">Email:</label>
                    <input type="email" name="user-email" id="user-email">

                    <label for="user-password">Password:</label>
                    <input type="password" name="user-password" id="user-password">
                    <button type="submitgit ">Register</button>
                </form>
            </section>
        </aside>
    </main>
    <script src="./src/js/app.js"></script>
</body>
</html>