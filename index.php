<?php
    require_once 'conn.php';

    $featured = $db->query("SELECT * FROM users ORDER BY id DESC LIMIT 10");
    $comedymovie = $db->query("SELECT * FROM users WHERE genre LIKE '%comedy%'");
    $mv1 = $db->query("SELECT * FROM users LIMIT 6 OFFSET 0");
    $mv2 = $db->query("SELECT * FROM users LIMIT 6 OFFSET 6");
    $hits = $db->query("SELECT * FROM users ORDER BY hits DESC LIMIT 6");
?>
<html>
<head>
    <title>MOVIE APP</title>
    <meta charset="UTF-8">
    <meta name="author" content="ansln">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="navbar">
        <nav>
            <div class="title-nav">
                <a href=""><h1>MOVIE</h1></a>
            </div>
            <ul>
                <li><a href="movies/featured">Featured</a></li>
                <li><a href="">Movies</a>
                    <ul>
                        <li><a href="">Most Watched</a></li>
                        <li><a href="">Marvel Movies</a></li>
                        <li><a href="/app/movies/">Browse All</a></li>
                    </ul>
                </li>
                <li><a href="">TV Series</a>
                    <ul>
                        <li><a href="">Most Watched</a></li>
                        <li><a href="">Browse All</a></li>
                    </ul>
                </li>
                <li><a href="">Genre</a></li>
                <li><a href="">Request/Problem</a></li>
            </ul>
            <div class="search-box">
                <form action="/app/find.php" method="get">
                <div class="form__group ">
                    <input type="input" class="form__field" placeholder="Find movies" name="keywords" id="name" autocomplete="off">
                </div>
                </form>
            </div>
        </nav>
    </div>
    <!-- FIRST CONTENT [FEATURED MOVIES]-->
    <div class="ct-1">
        <div class="wrap">
            <div class="head-c1">
                <h3>Our Latest Movies</h3>
            </div>
            <div class="container">
                <?php
                    if($featured->num_rows){
                        while($r = $featured->fetch_object()){
                    ?>
                        <div class="card">
                            <div class="glry">
                                <div class="ok1"><?php echo "<img src='$r->poster' loading='lazy'>";?></div>
                                <div class="ok2"><?php echo "<img src='$r->poster' loading='lazy'>";?></div>
                                <div class="ok3"><?php echo "<img src='$r->poster' loading='lazy'>";?></div>
                                <div class="ok4"><?php echo "<img src='$r->poster' loading='lazy'>";?></div>
                            </div>
                            <div class="box">
                                <?php echo "<h3>$r->name ($r->year)</h3>";?>
                                <div class="box-cp">
                                    <?php echo "
                                        <b>$r->rated</b>
                                        <p>$r->genre</p>
                                    ";?>   
                                </div>
                                <?php echo "<p>$r->synopsis</p>";?>
                                <?php echo "<a href='movies/view.php?movie=$r->link' target='_blank'><button class='btn-watch'>Watch Movies</button></a>";?>
                            </div>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    
    <!-- SECOND CONTENT [ALL MOVIES]-->
    <div class="ct-2">
        <div class="wrap-ct2">
            <div class="head-ct2">
                <h3>All Movies</h3>
                <div class="ct2-btn"><a href="movies/"><button>Browse all</button></a></div>
            </div>
            <div class="row-2">
                <?php
                        if($mv1->num_rows){
                            while($r = $mv1->fetch_object()){
                        ?>
                            <div class="card-ct2">
                                <div class="imgbox-ct2"><?php echo "<a href='movies/view.php?movie=$r->link' target='_blank'><img src='$r->mov_img' loading='lazy'></a>";?></div>
                                <?php echo "<a href='movies/view.php?movie=$r->link' target='_blank'><h3>$r->name ($r->year)</h3></a>";?>
                                <div class="title-ct2">
                                    <?php echo "
                                        <b>$r->rated</b>
                                        <p>$r->year</p>
                                    ";?>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    ?>
            </div>
            <div class="row-2">
                <?php
                        if($mv2->num_rows){
                            while($r = $mv2->fetch_object()){
                        ?>
                            <div class="card-ct2">
                                <div class="imgbox-ct2"><?php echo "<a href='movies/view.php?movie=$r->link' target='_blank'><img src='$r->mov_img' loading='lazy'></a>";?></div>
                                <?php echo "<a href='movies/view.php?movie=$r->link' target='_blank'><h3>$r->name ($r->year)</h3></a>";?>
                                <div class="title-ct2">
                                    <?php echo "
                                        <b>$r->rated</b>
                                        <p>$r->year</p>
                                    ";?>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    ?>
            </div>

        </div>
    </div>

    <script type="text/javascript" src="js/app.js"></script>
</body>
