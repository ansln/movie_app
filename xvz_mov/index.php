<?php
    require_once 'conn.php';

    $mv = $db->query("SELECT * FROM users ORDER BY id DESC LIMIT 5");
    $result = $db->query("SELECT COUNT(*) AS total FROM users");
    $data = mysqli_fetch_assoc($result);
?>
<html>
<head>
    <title>View Film Data</title>
    <meta charset="UTF-8">
    <meta name="author" content="ansln">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="title">
        <h3>ALL FILM DATA</h3>
    </div>
    <div class="desc">
        <p>Format = (<i>id, mov_img, mov_src, name, ot_name, year, synopsis, poster, rated, genre, link, sub, category, hits</i>)</p>
    </div>
    <div class="row-total">
        <div class="total">
            TOTAL FILM: <?php echo $data['total'];?>
        </div>
        <a href="/app/input.php" target="_blank">input data</a>
    </div>
        <div class="container">
            <div class="box">
        <?php
            if($mv->num_rows){
                while($r = $mv->fetch_object()){
                    ?>
                        <div class="row">
                            <div class="id-text">
                                <b><?php echo"$r->id"?></b>
                            </div>
                            <img src="<?php echo"$r->mov_img"?>" loading="lazy">
                            <div class="mov_src">
                                <?php 
                                if ($r->mov_src != '') {
                                    echo "<b style='color:#B4FF9F;'>OK</b>";
                                }else{
                                    echo "X";
                                }
                                ?>
                            </div>
                            <div class="name">
                                <h1><?php echo"$r->name"?></h1>
                            </div>
                            <div class="ot_name">
                                <h1><?php echo"$r->ot_name"?></h1>
                            </div>
                            <div class="year">
                                <h1><?php echo"$r->year"?></h1>
                            </div>
                            <div class="synopsis">
                                <h1><?php echo"$r->synopsis"?></h1>
                            </div>
                            <div class="rated">
                                <h1><?php echo"$r->rated"?></h1>
                            </div>
                            <div class="genre">
                                <h1><?php echo"$r->genre"?></h1>
                            </div>
                            <div class="link">
                                <h1><?php echo"$r->link"?></h1>
                            </div>
                            <div class="sub">
                                <h1><?php echo"$r->sub"?></h1>
                            </div>
                            <div class="category">
                                <h1><?php echo"$r->category"?></h1>
                            </div>
                            <div class="category">
                                <h1><?php echo"$r->hits"?></h1>
                            </div>
                        </div>
                    <?php
                }
            }
        ?>
        </div>
    </div>
</body>
</html>