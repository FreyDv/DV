<!doctype html>
<!--шаблон https://newtone-demo.myinsales.ru/-->
<html lang="en">
<head>

    <meta charset="UTF-8">
    <?= $this->getMeta(); ?>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" media="all" />
</head>
<body>
 <?=$content;?>
 <?php
 use RedBeanPHP\R;
 $logs = R::getDatabaseAdapter()
     ->getDatabase()
     ->getLogger();
 debug( $logs->grep( 'SELECT' ),'access to DB');

 ?>
 <script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>