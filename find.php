<head>
    <meta charset="UTF-8">
    <meta name="author" content="ansln">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/search.css">
</head>
<body>
<div class="width-max">
    <div class="wrap">
        <div class="btn-back">
            <a href="/app"><button>GO BACK</button></a><br>
        </div>

    <?php
    require_once 'conn.php';

    if(isset($_GET['keywords'])){
        $keywords = $db->escape_string($_GET['keywords']);
        $xss = "<script>";$xss2 = "<img"; $xss3 = "<p>"; $xss4 = "script";

        // if(strlen($keywords)<5){
        //     echo "enter at least 5 characters";
        //     exit();
        // }

        if(strpos($keywords, $xss) !== false || strpos($keywords, $xss2) !== false || strpos($keywords, $xss3) !== false || strpos($keywords, $xss4) !== false){
            echo "<i><b>not found</b></i>";
            exit();
            $db -> close();
        }if($keywords!=''){ //QUERY FOR POPULAR SEARCH
            $sql=$db->query("UPDATE users SET hits=hits+1 WHERE name LIKE '{$keywords}' OR ot_name LIKE '{$keywords}'");
        }
        
        $query = $db->query("
        SELECT * FROM users 
        WHERE name LIKE '{$keywords}%' 
        OR ot_name LIKE '{$keywords}%' 
        OR name LIKE '%{$keywords}%' 
        ORDER BY RAND() LIMIT 10");
        $result = $db->query("SELECT COUNT(*) AS total FROM users");
        $data = mysqli_fetch_assoc($result);
    ?>

        <div class="result-count">
                <div class="head-result"><b>Results found: <?php echo $keywords ?></b></div>
                <div class="desc-result">Found <?php echo $query->num_rows;?> results of <?php echo $data['total'];?> movies</div>
        </div>

        
        <div class="page">
        <?php
            if($query->num_rows){
                while($r = $query->fetch_object()){
        ?>
        <title>MOVIE APP - Find <?php echo"$r->name"?></title>
            <div class="container">
                <?php echo "<a href='movies/view.php?movie=$r->link'><img loading='lazy' src='$r->mov_img'></a>";?>
                <div class="clmn">
                    <?php echo "
                        <div class='movie-title'><a href='movies/view.php?movie=$r->link'><h3>$r->name ($r->year)</h3></a></div>
                        <p>$r->synopsis</p>
                    ";?>

                    <?php echo "
                        <div class='child-ct'>
                            <div class='rated-ct'>$r->rated</div>
                            <div class='genre-ct'>$r->genre</div>
                        </div>
                    ";?>  
                </div>
            </div>
                <?php
                }
            }
        }
        ?>
        </div>
    </div>
</div>
</body>
</html>