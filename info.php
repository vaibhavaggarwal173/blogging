<?php
require_once "database.php";
$type=$_GET['type'];
if($type=='open')
{
    $name=$_GET['name'];
    $query="select * from people where name='$name';";
    try{
        $db=new PDO($dns,$user,$pass);
        $statement=$db->prepare($query);
        $statement->execute();
        $result=$statement->fetch();
?>
<html>
<head>
<title>
<?php echo($result['name']);?>
</title>
<style>
img{
    height:400px;
    width:400px;
    margin:30px;
    float:left;
}
h1{
    text-align:center;
    margin-top:1%;
    float:center;
    padding-top:3%;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<img src="<?php echo($result['image']);?>">
<h1><?php echo($result['name']);?></h1>
<p><?php echo($result['info']);?></p>
<footer style="text-transform: capitalize;">BY- <?php echo($result['username']);?></footer>
</body>
</html>
<?php        
    }
    catch(Execption $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>