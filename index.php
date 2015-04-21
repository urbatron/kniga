<!Doctype HTML>
<html>
<head>
<meta charset="utf-8">
<link href="css/style.css" type="text/css" rel="stylesheet">
<title></title>
</head>
<body>
<div class="wrapper"><!-- WRAPPER-->
 
<form class="contact_form" action="" method="post" name="contact_form">
    <ul>
        <li>
             <h2>Форма добавления друзей, родственников и коллег</h2>
             
        </li>
        <li>
            <label for="name">Имя: </label>
            <input type="text"  placeholder="Сергей" required name="name" />
        </li>
        <li>
            <label for="tel">Телефон: </label>
            <input type="tel" name="tel" placeholder="556-25-64" required />
            <span class="form_hint">без кода города</span>
        </li>
        <li>
            <label for="message">Описание: </label>
            <textarea name="message" cols="40" rows="6" required ></textarea>
        </li>
        <li>
        	<button class="submit" type="submit" name="submit1" value="1">Отправить</button>
        </li>
    </ul>
</form>

<form class="contact_form" action="" method="post" name="contact_form">
    <ul style="background: yellow">
        <li>
            <label for="name">Выводить по: </label>
            <input type="number" min="0" required name="num" />
        </li>
        <li>
        	<button class="submit" type="submit" name = "submit2" value='2'>Отправить</button>
        </li>
    </ul>
</form>




<?php include 'filtr.php' ?>






</div><!--END WRAPPER-->
</body>
</html>