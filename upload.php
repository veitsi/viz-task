<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>task added</title>
</head>
<body>
<p>here you can see all tasks</p>
<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=beejee", "beejee", "12345678");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("set names utf8");
}
catch(PDOException $e) {
    echo $e->getMessage();
}
$stmt=$db->prepare("INSERT INTO `tasks` (`ext`, `username`, `email`, `description`) VALUES (?, ?, ?, ?);");
$result=$stmt->execute(['111',$_POST['username'],$_POST['email'],$_POST['description']]);
var_dump($db->lastInsertId());

$stmt = $db->query('SELECT * from tasks');
$rows = $stmt->fetchAll();
require ('view/tasks.php');

class SimpleImage
{

    var $image;
    var $image_type;

    function load($filename)
    {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if ($this->image_type == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif ($this->image_type == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($filename);
        } elseif ($this->image_type == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($filename);
        }
    }

    function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 75, $permissions = null)
    {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image, $filename, $compression);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image, $filename);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image, $filename);
        }
        if ($permissions != null) {
            chmod($filename, $permissions);
        }
    }

    function output($image_type = IMAGETYPE_JPEG)
    {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image);
        }
    }

    function getWidth()
    {
        return imagesx($this->image);
    }

    function getHeight()
    {
        return imagesy($this->image);
    }

    function resizeToHeight($height)
    {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width, $height);
    }

    function resizeToWidth($width)
    {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width, $height);
    }

    function scale($scale)
    {
        $width = $this->getWidth() * $scale / 100;
        $height = $this->getheight() * $scale / 100;
        $this->resize($width, $height);
    }

    function resize($width, $height)
    {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
}

$params = (getimagesize($_FILES['userfile']['tmp_name']));
echo $params[0], ':', $params[1];
$mime = $_FILES['userfile']['type'];
$type = explode("/", $mime)[1];
echo "img type $type<br>";
$image = new SimpleImage();
$image->load($_FILES['userfile']['tmp_name']);
if ($params[1] / $params[0] < 0.75) {
    $image->resizeToWidth(320);
} else {
    $image->resizeToHeight(240);
}
$image->save('image1.' . $type);

echo $_FILES['userfile']['tmp_name'], $_FILES['userfile']['name'];
$target_dir = "uploads/";

?>
</body>
</html>
