<body class="gp-1" id='dashboard'>
    <header>
        <h1>Games Everywhere</h1>
    </header>
    <main class='mg-1'>
        <section class='entries'>
        </section>
        <aside>
            <section>
                <h2 class='center'>Hello, <?php echo $_SESSION['user-name'] ?></h2>
                <a href='./make-post' class='wd-all'>Make post</a>
                <a class='wd-all bg-cyan'>Edit Profile</a>
                <a href='./../src/helpers/close.php' class='wd-all bg-red'>Log Out</a>
            </section>
        </aside>
    </main>
    <script src="./../src/js/dashboard.js" type='module'></script>
</body>
</html>