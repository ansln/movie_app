<?php
    require_once 'conn.php';

    $mv_featured1 = $db->query("SELECT * FROM users ORDER BY hits DESC LIMIT 6 OFFSET 0");
    $mv_featured2 = $db->query("SELECT * FROM users ORDER BY hits DESC LIMIT 6 OFFSET 6");
    $mv_featured3 = $db->query("SELECT * FROM users ORDER BY hits DESC LIMIT 6 OFFSET 12");
?>
<head>
    <title>MOVIE APP - Featured</title>
    <meta charset="UTF-8">
    <meta name="author" content="ansln">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/movies/style/style.css">
</head>
<body>
    <div class="navbar">
        <nav>
            <div class="title-nav">
                <a href="/app"><h1>MOVIE</h1></a>
            </div>
            <ul>
                <li><a href="">Featured</a></li>
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
    <div class="container">
            <?php
                if($mv_featured1->num_rows){
                    while($r = $mv_featured1->fetch_object()){
                        ?>
                        <?php echo "<a href='/app/movies/view.php?movie=$r->link'><img loading='lazy' src='$r->mov_img'></a>";?>
                            
                        <?php
                        }
                    }
                ?>
    </div>
    <div class="container">
            <?php
                if($mv_featured2->num_rows){
                    while($r = $mv_featured2->fetch_object()){
                        ?>
                        <?php echo "<a href='/app/movies/view.php?movie=$r->link'><img loading='lazy' src='$r->mov_img'></a>";?>
                            
                        <?php
                        }
                    }
                ?>
    </div>
    <div class="container">
            <?php
                if($mv_featured3->num_rows){
                    while($r = $mv_featured3->fetch_object()){
                        ?>
                        <?php echo "<a href='/app/movies/view.php?movie=$r->link'><img loading='lazy' src='$r->mov_img'></a>";?>
                            
                        <?php
                        }
                    }
                ?>
    </div>
</body>
