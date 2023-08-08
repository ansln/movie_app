<!doctype html>
<html>
    <head>
        <meta charset="uft-8">
        <title>SEARCH DB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');

            ::-webkit-scrollbar-track{
                border-radius: 10px;
            }

            ::-webkit-scrollbar{
                width: 8px;
                height: 8px;
            }

            ::-webkit-scrollbar-thumb{
                border-radius: 10px;
                background-color: #D9CAB3;
            }
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Inter', sans-serif;
                font-weight: 400;
            }
            body{
                background-color: #181D31;
            }
            .nav{
                display: flex;
                width: 100%;
                height: 60px;
                background-color: white;
                padding: 5px;
                align-items: center;
                flex-direction: row;
            }
            .link{
                margin-left: 25px;
                flex-direction: row;
            }
            .link a{
                text-decoration: none;
            }
            .link h3{
                font-weight: 600;
                font-size: 16px;
                color: #212121;
                margin-right: 15px;
            }
            .search-tab{
                display: flex;
                float: right;
                right: 0;
                justify-content: center;
                text-align: center;
                align-items: center;
            }
            .search-box{
                width: fit-content;
                height: fit-content;
                position: relative;
            }
            .input-search{
                height: 50px;
                width: 50px;
                border-style: none;
                padding: 10px;
                font-size: 18px;
                outline: none;
                border-radius: 5px;
                transition: all .5s ease-in-out;
                padding-right: 40px;
                color:#212121;
            }
            .input-search::placeholder{
                font-style: italic;
                color: #9D9D9D;
                font-size: 14px;
                font-weight: 400;
            }
            .btn-search{
                width: 50px;
                height: 50px;
                border-style: none;
                font-size: 20px;
                font-weight: bold;
                outline: none;
                cursor: pointer;
                border-radius: 50%;
                position: absolute;
                right: 0px;
                color: #212121;
                background-color: transparent;
                pointer-events: painted;
            }
            .btn-search img{
                width: 24px;
                height: 24px;
            }
            .btn-search:focus ~ .input-search{
                transition: 0.3s;
                width: 300px;
                border-radius: 0px;
                background-color: transparent;
            }
            .input-search:focus{
                width: 300px;
                border-radius: 0px;
                background-color: transparent;
                transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
            }
        </style>
    </head>
    <body>
        <div class="nav">
            <h1>MOVIE</h1>
            <div class="link">
                <a href=""><h3>Home</h3></a>
                <a href=""><h3>Genre</h3></a>
                <a href=""><h3>Category</h3></a>
            </div>
            <div class="search-tab">
                <form action="find.php" method="get">
                        <div class="search-box">
                            <button class="btn-search"><img src="/app/assets/img/icon/search.png"></button>
                            <input type="text" class="input-search" name="keywords" autocomplete="off" placeholder="Search movies...">
                        </div>
                </form>
            </div>
        </div>
    </body>
</html>