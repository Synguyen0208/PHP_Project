<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="h">
        <input type="submit">
    </form>
    <div align="bottom" style="background-color:red;width:100px; height: <?php echo $_POST['h']?>px">
ff
    </div>
</body>
</html>