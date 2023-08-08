<?php
    require_once 'conn.php';

    if(isset($_POST["submit"])){
        $mov_img = $_POST["mov_img"];
        $mov_src = $_POST["mov_src"];
        $name = $_POST["name"];
        $ot_name = $_POST["ot_name"];
        $year = $_POST["year"];
        $synopsis = $_POST["synopsis"];
        $poster = $_POST["poster"];
        $rated = $_POST["rated"];
        $genre = $_POST["genre"];
        $link = $_POST["link"];
        $sub = $_POST["sub"];
        $category = $_POST["category"];
        
        $query = "INSERT INTO users VALUES(NULL, '$mov_img', '$mov_src', '$name', '$ot_name', '$year', '$synopsis', '$poster', '$rated', '$genre', '$link', '$sub', 'Movies', '0')";

        $msg = "<font face='Verdana'>
        <b>check your data!<br> 
        if it has a sign ('), then you have to add a sign (') again.<br>
        example: he's -> he''s</b><br><br>
        <b><i>Here's a description of the error: </i></b></font>";

        mysqli_query($db, $query) or die($msg . mysqli_error($db));

        echo "<script>alert('your data input successfully!');window.location='input.php';</script>";
    }
?>
<html>
    <head>
        <title>Input Film Data</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            color: white;
        }
        
        body{
            background-color: #181D31;
        }
        .container{
            display: flex;
            flex-direction: column;
            margin: 25px;
        }
        .title{
            width: 250px;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 5px;
            text-align: center;
            border-radius: 3px;
        }
        .title h3{
            font-size: 18px;
            font-weight: 800;
        }
        .column{
            display: flex;
            flex-direction: column;
            margin: 25px;
        }
        .row{
            display: flex;
            flex-direction: row;
        }
        .btn-submit{
            margin: 25px 0 0 0;
            color: white;
            background-color: #D9CAB3;
            width: 250px;
            height: 35px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-submit:hover{
            background-color: white;
            color: #D9CAB3;
        }
        label{
            margin-bottom: 10px;
            font-weight: 600;
        }
        input{
            padding: 5px;
            width: 250px;
            height: 25px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            color: black;
        }
        input:focus{
            outline: #181D31;
            border: none;
        }
        ::placeholder{
            font-style: italic;
            color: white;
        }
        .row-title{
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        .row-title a{
            margin-left: 25px;
            text-decoration: none;
            padding: 5px;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            font-size: 12px;
            font-weight: 400;
        }
        .row-title a:hover{
            color: #D9CAB3;
        }
    </style>
    </head>
    <body>
        <div class="container">
            <div class="row-title">
                <div class="title">
                    <h3>INPUT FILM DATA</h3>
                </div>
                <a href="/app/xvz_mov/" target="_blank">view all</a>
            </div>
            <form class="row" action="" method="post" autocomplete="off">
                <div class="column">
                    <label>mov_img</label>
                    <input type="text" name="mov_img" required value="">
                    <label>mov_src</label>
                    <input id="no" type="text" name="mov_src" style="background-color:#8D8DAA;" value="" placeholder="not available" readonly>
                    <label>name</label>
                    <input type="text" name="name" required value="">
                    <label>ot_name</label>
                    <input type="text" name="ot_name" value="">
                    <label>year</label>
                    <input type="text" name="year" required value="">
                    <label>synopsis</label>
                    <input type="text" name="synopsis" style="height:100px" required value="">
                </div>

                <div class="column">
                    <label>poster</label>
                    <input type="text" name="poster" required value="">
                    <label>rated</label>
                    <input type="text" name="rated" required value="">
                    <label>genre</label>
                    <input type="text" name="genre" required value="">
                    <label>link</label>
                    <input type="text" name="link" required value="">
                    <label>sub</label>
                    <input type="text" name="sub" style="background-color:#8D8DAA;" value="" placeholder="not available" readonly>
                    <label>category</label>
                    <input id="no" type="text" name="category" style="background-color:#8D8DAA;" value="" placeholder="not available" readonly>
                    <button class="btn-submit" type="submit" name="submit">Submit</button>
                </div>
            </form>  
        </div>
    </body>
</html>