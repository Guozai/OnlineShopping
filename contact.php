<?php
session_start();
include_once("modules.php");
topModule('contact');
?>
	<?php
		$errorsCount = 0;
		$nameErr = $emailErr = $phoneErr = "";
		$name = $email = $phone = "";
		$message = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["name"])) {
				$nameErr = "Name is required";
				$errorsCount++;
			} else {
				$name = test_input($_POST["name"]);
				if (!preg_match("/^(?=.*[A-Za-z])([A-Za-z '.-]*)$/",$name)){
					$nameErr = "Only letters along with space ' - . punctuation characters allowed";
					$errorsCount++;
				}
			}
			
			if (empty($_POST["email"])) {
				$emailErr = "Email is required";
				$errorsCount++;
			} else {
				$email = test_input($_POST["email"]);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$emailErr = "Invalid email format";
					$errorsCount++;
				}
			}
			
			if (empty($_POST["phone"])) {
				$phoneErr = "Mobile phone is required";
				$errorsCount++;
			} else {
				$phone = test_input($_POST["phone"]);
				if (!preg_match("/^(\(04\)|04|\+614)([ ]?\d){8}$/",$phone)){
					$phoneErr = "only australia mobile number allowed";
					$errorsCount++;
				}
			}
			if ($_POST["mailing"] == "signed up"){
			
				$mailing = fopen("mailing.txt","a") or die("Can't find the file");
				fwrite($mailing,"\n");
				fwrite($mailing,$name);
				fwrite($mailing,"\t");
				fwrite($mailing,$email);
				fwrite($mailing,"\t");
				fwrite($mailing,$phone);
				fclose($mailing);
			} else {}
			if ($errorsCount <= 0){
				$nameError = $emailError = $phoneError = "";
				header("Location:index.php");
			} else {}
		} else {
			$nameErr = $emailErr = $phoneErr = "";
			$name = $email = $phone = "";
		}
		function test_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
	?>
	<link rel="stylesheet" type="text/css" href="../css/contactstyle.css">
	<main>	
		<div class="contact-title">
			<h1>CONTACT US</h1>
		</div>

		<div class="contact-form">
			<form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<span class="error"><?php echo $nameErr;?></span><br>
				<input type="text" id="name" name="name" pattern="(?=.*[A-Za-z])([A-Za-z '.-]*)" title="only contain alphabetic characters along with the space ' - . punctuation characters" class="form-control" placeholder="Name" required><br>
				<span class="error"><?php echo $emailErr;?></span><br>
				<input type="email" id="email" name="email" class="form-control" placeholder="Email" required><br>
				<span class="error"><?php echo $phoneErr;?></span><br>
				<input type="tel" id="phone" name="phone" pattern="(\(04\)|04|\+614)([ ]?\d){8}" title="only australia mobile number" class="form-control" placeholder="Phone Number" required><br>
				<textarea name="message" class="form-control" placeholder="Write a message"></textarea><br><br>
				<input type="checkbox" id="mailing" name="mailing" value="signed up">Subscribe to our NewsLetter<br><br>
				<input type="checkbox" id="rememberme" onclick="rememberMe()" value="on">Remember me<br><br>
				<input type="submit" name="submit" class="form-control submit" value="Submit"> 
			</form>
		</div>
		<script>
		document.getElementById("name").value = localStorage.getItem("name");
		document.getElementById("phone").value = localStorage.getItem("phone");
		document.getElementById("email").value = localStorage.getItem("email");
		if(localStorage.getItem("rem")=="true"){
			document.getElementById("rememberme").checked = true;
		}
		if(localStorage.getItem("subscription")=="true"){
			document.getElementById("mailing").checked = true;
		}
		
		if (typeof(Storage) !== 'undefined'){
			
			function rememberMe(){
				var checkBox1 = document.getElementById("rememberme");
				var checkBox2 = document.getElementById("mailing");
				if (checkBox1.checked == true){
					localStorage.name=document.getElementById("name").value;
					localStorage.phone=document.getElementById("phone").value;
					localStorage.email=document.getElementById("email").value;
					localStorage.rem="true"
					
					if (checkBox2.checked == true){
						localStorage.subscription="true";
					}
				} else {
					localStorage.clear();
				}
			}
		}	
		</script>
	</main>
    <?php
    endModule();
  ?>












