<?php require'./../src/php/loger.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../src/css/style.css">
    <link rel="stylesheet" href="./../src/css/dashboard.css">
    <title>Games Everywhere - Dashboard</title>
</head>
<body class="gp-1 hg-vh">
    <header>
        <h1>Games Everywhere</h1>
    </header>
    <main class='mg-1'>
        <section>
            <div class="entries">

            </div>
        </section>
        <aside>
            <section>
                <h2 class='center'>Hello, <?php echo $_SESSION['user-name'] ?></h2>
                <a href='./maker.php' class='wd-all'>Make post</a>
                <a class='wd-all bg-cyan'>Edit Profile</a>
                <a href='./../src/php/close.php' class='wd-all bg-red'>Log Out</a>
            </section>
        </aside>
    </main>
    <script src="./../src/js/dashboard.js" type='module'></script>
</body>
</html>