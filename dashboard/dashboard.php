<?php 
if(!isset($_SESSION)){
    session_start();
}
if(!$_SESSION){
    header('Location: ./../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../src/css/style.css">
    <title>Games Everywhere - Dashboard</title>
</head>
<body>
    <header>
        <h1>Games Everywhere</h1>
    </header>
    <main>
        <section>

        </section>
        <aside class='bg-dark'>
            <!-- <section> -->
                <h2>Hello World!</h2>
                <h3>My Entries</h3>
                <h3>My Entries</h3>
            <!-- </section> -->
        </aside>
    </main>
    <!-- <script src="./src/js/app.js" type='module'></script> -->
</body>
</html>