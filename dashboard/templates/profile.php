<?php require './../src/helpers/loger.php';
    require './../src/helpers/db.php';
    $userID = $_SESSION['user-id']; 
    $db = connectDB();
    $query = 'SELECT user_name, user_last_name, user_email from users where user_id = ' . $userID;
    $res = $db->query($query)->fetchObject();

    $userName = $res->{'user_name'};
    $userLastName = $res->{'user_last_name'};
    $userEmail = $res->{'user_email'};

?>
<body class="gp-1" id='dashboard'>
    <header>
        <h1><a href="./../">Games Everywhere</a></h1>
    </header>
    <main class='mg-1'>
    <section id='post-maker'>
            <form method='post' id='<?php echo $userID; ?>'>
                <label for="user-name">User Name:</label>
                <input name="user-name" type="text" value="<?php echo $userName?>">
                
                <label for="user-last-name">User Last Name:</label>
                <input name="user-last-name" type="text" value="<?php echo $userLastName?>">

                <label for="user-email">User Email:</label>
                <input name="user-email" type="email" value="<?php echo $userEmail?>">

                <label for="user-password">New Password:</label>
                <input name="user-password" type="password" placeholder="Enter your new password (optional)">
                
                <button type='submit'>Update Profile</button>
            </form>
        </section>
        <aside>
            <section>
                <h2 class='center'>Hello, <?php echo $_SESSION['user-name'] ?></h2>
                <a href='./' class='wd-all bg-cyan'>Dashboard</a>
                <a href='./make-post' class='wd-all'>Make post</a>
                <a href='./../src/helpers/close.php' class='wd-all bg-red'>Log Out</a>
            </section>
        </aside>
    </main>
    <script src="./../src/js/user.js" type='module'></script>
</body>
</html>