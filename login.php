<?php
/* 1. Kui vajutada nuppu, siis form action saadab andmed määratud lehekülje aadressireale, sinna ilmub email=&password=. Kasutades method post saadetakse andmed aadressi reale varjatult. Kas form action saadab andmed ainult siis kui vajutatakse nuppu? Kui vajutada renew, siis uued andmed aadressi reale ei ilmu, järelikult lehe uuendamisel andmeid uuesti ei saadeta*/

/* 2. $_REQUEST võtab aadressireale saabunud andmed ja võimaldab nendega edasi toimetada ( ka siis, kui andmed tegelikult puuduvad: ehk emaili ja passwordi väljad on nuppu vajutades jäetud tühjaks või leht avatakse sisestades aadress (sh email ja password) otse aadressireale. */

/* 3. Kas  nuppu on tegelikult vajutatud võimaldab kontrollida isset funktsioon. "Isset kontrollib elemendi olemasolu", mida see tähendab, kuidas ?*/




// muutujad errorite jaoks
	$email_error = "";
	$password_error = "";
	$create_email_error = "";
	$create_password_error = "";

// muutujad väärtuste jaoks
	$email = "";
	$password = "";
	$create_email = "";
	$create_password = "";
	
if(isset($_POST["login"])){ // 3. Kui POST meetodil on saabunud "login" element. Kuhu saabunud (aadressi reale "login" ju ei ilmu)?:
	
	if(empty($_POST["email"])){
					$email_error = " *Palun sisesta E-post!"; //4. Siin määratud tekst saadetakse  muutujate juurde ""; vahele, kust see läheb htmli sektsiooni ja kuvatakse email välja järel.
				}else{
		$email=($_POST["email"]);	// ei ole vahet kas kasutada $_POST või $_REQUEST. Kas $_POSTi sees on juba $_REQUEST olemas?		
		}
		
	if(empty($_POST["password"])){
					$password_error = " *Palun sisesta salasõna!";
				}else{
				if(strlen($_POST["password"]) < 6 ){ // Kontrollib pikkust
				$password_error = " *Salasõna pikkus peab olema vähemalt 6 sümbolit!";
				}else{
				/////
		}
		}
	  
		if($password_error == "" && $email_error == ""){ //5. Kui errorid jäävad tühjaks, siis anna teade. == is equal, comparison operator. Miks siin lihtsalt = ei kasutata?
					echo "Kasutaja ".$email." logitakse sisse";
				}
				
				
} //if isset login ends

if(isset($_POST["create"])){ // Sama asi create vormi jaoks

	if(empty($_POST["create_email"])){
	  $create_email_error = " *Palun sisesta E-post!";
	}else{
	  $create_email=($_POST["create_email"]);
	  }
  
	if(empty($_POST["create_password"])){
	  $create_password_error = "*Palun sisesta parool!";
    }else{
	  if(strlen($_POST["create_password"]) < 6 ){
	  $create_password_error = " *Parooli pikkus peab olema vähemalt 6 sümbolit!";
	}else{
	  $create_password=($_POST["create_password"]);
	  }
	  }
	  
		if($create_password_error == "" && $create_email_error == ""){
					echo "Olete registreerunud! Teie E-post on ".$create_email." ja parool on ".$create_password;
				}
				
} //if isset create ends
?>

<html>
<head>
<title>Matkapäevik</title>
</head>

<body>

<h2>Sisselogimine</h2>

<form action="login.php" method="post">

	<input type="email" name="email" placeholder="E-post" value="<?php echo $email; ?>"><?php echo $email_error; ?><br><br>
	<input type="password" name="password" placeholder="Parool"><?php echo $password_error; ?><br><br>
	<input type="submit" name="login" value="Sisene">

</form>

	<h2>Registreerumine</h2>
<form action="login.php" method="post">
	
		Sisestage E-post:<br><input type= "email" name="create_email" value="<?php echo $create_email; ?>"><?php echo $create_email_error; ?><br><br>
		Valige parool:<br><input type= "password" name="create_password"><?php echo $create_password_error; ?><br><br>
		<input type="submit" name="create" value= "Loo kasutaja">
</form>
	
	<h4>Idee: luua matkade leht, kuhu kasutajad saavad postitada kui on kusagil toredas loodus-kohas on käidud, kommentaar (nt mis endale meeldis, miks teistele soovitaks, mis tuju tekitas jm mõtteid mis matkal tekkisid) ning lisada iseloomulik pilt (pilte). Ei pea olema mingi suur matk, sobivad ka muljed näiteks mõnest huvitavast Geopeituse otsingust linnaserva metsatukka või paekaldale. </h4>



</body>
</html>




