<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFINITE</title>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');
    
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            font-family: 'Inter', sans-serif;
            color: #F7F7F7;
            outline: none;
            text-decoration: none;
        }
        body{
            background-color: #181820;
        }
        #search{
            border: none;
            padding: 10px;
            background-color: #181820;
        }
    </style>
</head>
<body>
    <input type="text" name="search" id="search">
    <div id="result"></div>
    <script>
        $(document).ready(function () {
            $('#search').keyup(function () {
                $('#result').html('');
                var searchFields = $('#search').val();
                var expression = new RegExp(searchFields, "i");
                var base = 'https://api.themoviedb.org/3/search/multi?api_key=163962a279803a92056c16769d0c37d3&language=id-ID&page=1&include_adult=true&query=' + searchFields;
                $.getJSON(base, function(data){
                    $.each(data, function(key, value){
                        $('#result').html(value);
                        console.log(value.results);
                    });
                })
            });
        });
    </script>
</body>
</html>