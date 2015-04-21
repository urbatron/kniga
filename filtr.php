<?php header("Content-Type: text/html; charset=utf-8");
function bas($w){

try{
$DBH = new PDO("mysql:host=localhost;dbname=php;","root","");
}catch(Exception $e){
echo iconv("windows-1251","utf-8",$e->getMessage());
return;
}

$DBH->exec('SET NAMES utf8');
$STH = $DBH->prepare($w);
$STH->execute();
$q = $STH->fetchAll(PDO::FETCH_ASSOC);
return $q;
}
$sub =2;
if(@$_SERVER['REQUEST_METHOD']=="POST" and @$_POST['submit2']=="2"){
$sub = $_POST['num'];
setcookie('sub',$sub);
}elseif(isset($_COOKIE['sub'])){
	
	$sub= $_COOKIE['sub'];
}
//Добавление в базу данных
if(@$_SERVER['REQUEST_METHOD']=="POST" and @$_POST['submit1']=="1"){
$name = $_POST['name'];
$tel = $_POST['tel'];
$message = $_POST['message'];
$w = "INSERT INTO contacti (name,tel,description) VALUES ('$name','$tel','$message')";
bas($w);
}
//Удаление из бызы
if(@$_SERVER['REQUEST_METHOD']=="GET" and isset($_GET['delete'])){
$id = $_GET['delete'];
$w = "DELETE FROM contacti WHERE id=$id";
bas($w);
header("Location:".$_SERVER['HTTP_REFERER']);
}
$q = bas("SELECT * FROM contacti");



$change = array_chunk($q,$sub);
if (isset($_GET['pagin'])==0 or empty($_GET['pagin'])){
$n = 0;
}elseif($_GET['pagin']>count($change)){
	$nr = count($change);
	$nr--;
	$n = $nr;
	}else{
	$n = $_GET['pagin'];
	$n--;
}



echo "<table class='table table-bordered'>";
echo"<caption>Вся информация из базы данных</caption>";
echo"<tr><th>Имя</th><th>Телефон</th><th>Информация</th><th></th></tr>";
foreach ($change[$n] as $value){
echo"<tr><td>".$value['name']."</td><td>".$value['tel']."</td><td>".$value['description']."</td><td><a style='color:red' href='index.php?delete=".$value['id']."'>Delete</a></td></tr>";
}
echo "</table>";


$pag = count($change);
echo"<ul class='pagin'>";
if (isset($_GET['pagin'])==0 or empty($_GET['pagin'])){
$l = 1;
}elseif($_GET['pagin']>count($change)){
	$nr = count($change);
	$nr--;
	$l = $nr;

}else{
	$l = $_GET['pagin'];

}
for ($i = 1; $i<=$pag; $i++){
	if ($i==$l){
		$style =" background:red";
	}else{
		$style =" background: white";
	}
echo"<li style='".$style."' ><a href='index.php?pagin=".$i."'>".$i."</a></li>";
}
echo"</ul>";

?>









