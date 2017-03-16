<html>
<head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
        #output {
            width: 320px;
            border: pink 3px solid;
            display: none
        }
    </style>
</head>
<body>
<form id="imagezone" method="post" action="upload.php" enctype="multipart/form-data">
    <input type="text" value="john" required name="username" placeholder="John Doe"><br/>
    <input type="email" value="some@email.com" required name="email" placeholder="username@emailserver.com"><br/>
    <input type="text" value="i did something" required name="description"><br/>
    <input type="file" required name="userfile" id="userfile" accept="image/*"/><br/>
    <input type="button" value="preview" id="preview" onclick="$('#output').show()">
    <input type="submit">
</form>
<div id=output></div>
<?php
$b=[1,2,3,4];
require('view/tasks.php');
?>
<div id="app">
    {{ message }}
</div>
<script src="js/jquery.min.js"></script>

<script>

</script>
<script src="js/preview.js">
</script>
</body>
</html>
