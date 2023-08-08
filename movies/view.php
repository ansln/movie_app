<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="ansln" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style/view.css" />
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css" />
    <style>.plyr__poster{background-size: cover;transition: 0.2s;filter: opacity(80%);}.plyr__poster:hover{transition: 0.3s;filter: opacity(100%);}</style>
</head>
<body>
    <div class="navbar">
        <nav>
            <div class="title-nav">
                <a href="/app"><h1>MOVIE</h1></a>
            </div>
            <ul>
                <li><a href="/app/movies/featured/">Featured</a></li>
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

    <?php
    require_once 'conn.php';

    if(isset($_GET['movie'])){
        $keywords = $db->real_escape_string($_GET['movie']);
        $xss = "<script>"; $xss2 = "<img"; $xss3 = "<p>"; $xss4 = "script";

        if(strpos($keywords, $xss) !== false || strpos($keywords, $xss2) !== false || strpos($keywords, $xss3) !== false || strpos($keywords, $xss4) !== false){
            echo "<i><b>not found</b></i>";
            exit();
            $db -> close();
        }
        
        $query = $db->query("SELECT * FROM users WHERE link LIKE '{$keywords}'");
        $upquery = $db->query("UPDATE users SET hits=hits+1 WHERE link LIKE '{$keywords}'");
    ?>
        
        <?php
            if($query->num_rows){
                while($r = $query->fetch_object()){
        ?>
                    <title><?php echo"$r->name ($r->year)"?></title>
                    <div class="ct-video">
                        <video id="player" playsinline controls data-poster="<?php echo"$r->poster" ?>">
                        <source src="<?php echo"$r->mov_src" ?>" type="video/mp4" size="1080"/>
                        <track kind="captions" label="Indonesia" srclang="id" src="<?php echo"$r->sub" ?>" default/>
                        </video>
                    </div>

                    <div class="ct-box">
                        <div class="max-width">
                            <div class="title-ct-box"><h1><?php echo"$r->name" ?></h1></div>
                            <div class="row">
                                <div class="genre"><?php echo"$r->genre" ?></div>
                                <div class="year"><?php echo"$r->year" ?></div>
                                <div class="rated"><b><?php echo"$r->rated" ?></b></div>
                            </div>
                            <p><?php echo"$r->synopsis" ?></p>
                        </div>
                    </div>
                    <?php
                    }
                }
            }
        ?>

        <div class="bound-h"></div>

        <!-- START OF CONTENT SIMILAR MOVIES -->
        <?php
        if(isset($_GET['movie'])){
            $keywords = $db->real_escape_string($_GET['movie']);

            $split =  $db->query("SELECT 
            SPLIT_STR(id, ' ', 1) AS id1, 
            SPLIT_STR(genre, ', ', 1) AS genre1, 
            SPLIT_STR(genre, ', ', 2) AS genre2, 
            SPLIT_STR(genre, ', ', 3) AS genre3, 
            SPLIT_STR(name, ' ', 1) AS name1, 
            SPLIT_STR(name, ' ', 2) AS name2, 
            SPLIT_STR(name, ' ', 3) AS name3 
            FROM users WHERE link LIKE '{$keywords}%'");
        ?>
        <?php
            if($split->num_rows){
                while($r = $split->fetch_object()){
        ?>
                    <div class="ct-1">
                        <div class="wrap">
                            <div class="head-c1">
                                <h3>Recommendations</h3>
                                <?php // echo"$r->name1 $r->name2 $r->name3" ?>
                            </div>
                                <div class="container">
                                
                                    <?php
                                    $simi = $db->query("SELECT * FROM users 
                                    WHERE genre LIKE '%{$r->genre1}%' 
                                    AND NOT id = '{$r->id1}' 
                                    AND NOT name LIKE '%the gigolo%' 
                                    AND NOT name LIKE '%365 days%' 
                                    ORDER BY RAND() LIMIT 15");

                                    if ($simi->num_rows) {
                                        while ($sm = $simi->fetch_object()) {
                                            echo "<div class='box'>
                                            <a href='view.php?movie=$sm->link'><img src='$sm->mov_img'></a>
                                            </div>";
                                        }
                                    }

                                    ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                }
            }
        ?>
        <!-- END OF CONTENT SIMILAR MOVIES -->
        
    <script src="https://cdn.plyr.io/3.7.2/plyr.js"></script>
    <script type="text/javascript" src="app.js"></script>
</body>
</html>