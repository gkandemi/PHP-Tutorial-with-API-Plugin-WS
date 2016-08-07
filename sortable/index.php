<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sıralama</title>

    <style>

        .sortable{
            margin: 0px;
            padding: 0px;
            width: 300px;
            list-style: none;
        }

        .sortable li{
            background-color: #f0f0f0;
            padding: 5px 10px;
            margin-bottom: 3px;
            border: 1px dashed #666;

        }

    </style>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    <script>
        $(document).ready(function () {

            $( ".sortable" ).sortable();

            $(".sortable").on("sortupdate", function (event, ui) {


                var data = $(this).sortable("serialize");

                var url = "http://localhost/siralama/sort.php";

                $.post(url,{data:data},function(response){
                })

            })

        })
    </script>

</head>
<body>

<?php

try{
    $db = new PDO("mysql:host=localhost;dbname=sortable;charset=utf8","root","");
}catch(PDOException $e){
    echo $e->getMessage();
}

$rows = $db->query("SELECT * from items ORDER BY rank ASC", PDO::FETCH_ASSOC);

?>

<ul class="sortable">
    <?php foreach ($rows as $row){ ?>
        <li id="rank-<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></li>
    <?php } ?>
</ul>

</body>
</html>