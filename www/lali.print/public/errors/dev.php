<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ощибка</title>
</head>
<body>
<table border="1" bordercolor="Red">
    <caption><h1>Произлшла ощибка </h1></caption>
    <tr><td><p>Cod </p><td><b><?= $errno ?></b></td></td></tr>
    <tr> <td><p>Text </p></td><td><b><?= $errstr ?></b></td></tr>
    <tr><td><p>File </p></td><td><b><?= $errfile ?></b></td></tr>
    <tr><td><p>Row </p></td><td><b><?= $errline ?></b></td></tr>
    <tr>

    </tr>

</table>
</body>
</html>