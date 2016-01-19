<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Korekta i styl</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #srodek {
            background-image: url(grafika/kontakt.png), url(grafika/tlo_blue.png);
            background-repeat: repeat-x, repeat-x;
            background-size: auto, auto 100%;
            color: white;
            padding: 150px 25px 25px 25px;
        }
    </style>
</head>
<body>
    <div id="calosc">
        <header>
            <h1>korekta i styl</h1>
            <nav>
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><a href="omnie.html">o mnie</a></li>
                    <li><a href="redakcja.html">oferta redakcji</a></li>
                    <li><a href="copywriting.html">copywriting</a></li>
                    <li><a href="cennik.html">cennik</a></li>
                    <li><a href="kontakt.php">kontakt</a></li>
                </ul>
            </nav>
        </header>
        <div id="srodek" class="rest">
           <main>
               <div class="shadow">
               <div class="kontakt">
                   <img src="grafika/telefonik_shadow.png" alt=""> <span>608 065 754</span> <img src="grafika/kopertka_shadow.png" alt=""> <span>kontakt@korektaistyl.pl</span>
               </div>
			   <?php
			   require('phpmailer/class.phpmailer.php');
               require('phpmailer/PHPMailerAutoload.php');   
			   if(isset($_GET['send']) && $_POST) {
					$email = new PHPMailer(); 
					$email->From = 'klient@klient.text';
                    $email->addReplyTo($_POST['email'], $_POST['imie']);
					$email->FromName = 'Korekta i styl';
					$email->Subject = 'Kontakt ze strony korektaistyl.pl';
					$email->Body = $_POST['komentarz'];
					$email->AddAddress('milena.witkowska@tlen.pl');
					if($_FILES) {
						$plik = $_FILES['plik']['tmp_name'];
						$nazwaPliku = $_FILES['plik']['name'];
						$email->AddAttachment($plik, $nazwaPliku);
					}
					if($email->Send()) {
					    echo '<div class="sukces">Wiadomość wysłana poprawnie</div>';
					} else {
					    echo '<div class="blad">Błąd podczas wysyłania wiadomości</div>';
					}
			   }
			   ?>
               <form action="?send=1" method="post" enctype="multipart/form-data">
					<p>Imię:</p>
					<input type="text" name="imie">
					<p>Adres email:</p>
					<input type="text" name="email">
                  <p>Prześlij plik tekstowy (opcjonalnie):</p>
                   <input type="file" name="plik">
                   <p>Miejsce na Twój komentarz:</p>
                   <textarea name="komentarz" cols="70" rows="10"></textarea>
                   <p><input type="submit" value="wyślij"></p>
               </form>
               </div>
           </main>
            <footer>
                <p>&copy; 2015 korektaistyl.pl | Wszelkie prawa zastrzeżone</p>
                <p>Projekt i wdrożenie<br><a href="http://webra.com.pl">webra.com.pl</a><a href="http://webra.com.pl"><img src="grafika/logo_webra.png" alt=""></a></p>
            </footer>
        </div>
    </div>
</body>
</html>