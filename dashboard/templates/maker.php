<?php require'./../src/helpers/loger.php'?>

</head>
<body class="gp-1" id='maker'>
    <header>
        <h1><a href="./../">Games Everywhere</a></h1>
    </header>
    <main class='mg-1'>
        <section id='post-maker'>
            <form method='post'>
                <label for="post-title">Post Title:</label>
                <input name="post-title" type="text">
                
                <div class='post-details'>
                    <label for="post-image">Post Image:</label>
                    <input type='file' name="post-image">
                    
                    <label for="post-category">Post Category:</label>
                    <select name="post-category" id="">
                        <option value="0" class='center'>--Choose A Category--</option>
                        <?php require './../src/helpers/db.php';
                        
                        $db = connectDB();
                        $query = 'SELECT category_id, category_name from categories';
                        $sth = $db->prepare($query);
                        $sth->execute();
                        $res = $db->query($query)->fetchAll();
                        if($res):
                            foreach($res as $category):?>
                                <option value="<?php echo $category['category_id']?>"><?php echo $category['category_name']?></option>
                            <?php endforeach; endif;?>
                        
                    </select>
                </div>
                    
                    <label for="post-content">Post Content:</label>
                    <textarea name="post-content" id="post-content" cols="30"></textarea>
                    

                <button type='submit'>Publish Post</button>
            </form>
        </section>
        <aside>
            <section>
                <h2 class='center'>Hello, <?php echo $_SESSION['user-name'] ?></h2>
                <a href='./' class='wd-all'>Dashboard</a>
                <a href='./edit-profile' class='wd-all bg-cyan'>Edit Profile</a>
                <a href='./../src/helpers/close.php' class='wd-all bg-red'>Log Out</a>
            </section>
        </aside>
    </main>
    <script src="./../src/js/maker.js" type='module'></script>
</body>
</html>