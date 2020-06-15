<?php
include_once "header.php";
include_once "footer.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'/PHPMailer/src/Exception.php';
require __DIR__.'/PHPMailer/src/PHPMailer.php';
require __DIR__.'/PHPMailer/src/SMTP.php';
 
$mailer = new PHPMailer(TRUE);
//thanks https://www.inmotionhosting.com/support/email/send-email-from-a-page/using-phpmailer-to-send-mail-through-php



// handle incoming variables
$confirmation=false;
if(sizeof($_POST)>0){
	$sender = $_POST['sender_address'];
	$txt = $_POST['message'];
	$to = "ned.eisenberg@gmail.com";
	$subject = "Message from " . $sender;
	
	$confirmation=true;
	
	try {
   // $mailer->SMTPDebug = 4;
    $mailer->isSMTP();

   // if ($developmentMode) {
    $mailer->SMTPOptions = [
        'ssl'=> [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        ]
    ];
    //}

	
    $mailer->Host = 'mail.edmundeisenberg.org';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'robot@edmundeisenberg.org';
    $mailer->Password = '*private*';
    $mailer->SMTPSecure = 'ssl';
    $mailer->Port = 465;
    

   	$mailer->setFrom('robot@edmundeisenberg.org', 'robot');
    $mailer->addAddress('ned.eisenberg@gmail.com', 'Edmund');

    $mailer->isHTML(false);
    $mailer->Subject = "Message from " . $sender;
    $mailer->Body = $txt;

    $mailer->send();
    $mailer->ClearAllRecipients();
    //echo "MAIL HAS BEEN SENT SUCCESSFULLY";
    //send confirmation

} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}
	
}
?>

<script>
//check if email is valid
//confirmation exit button
</script>


<style>
.section h1 {
	text-decoration:none;
}

li {
	margin: 1vh 0;
}

.confirmation {
	margin:4px;
	text-align:center;
}
</style>
<html>
	<body>
		<?php
		getHeader();
		if($confirmation){
			echo "<div class='confirmation'>Message Sent!</div>";
		}
		?>
		<div class="section">
			<div class='clear'>
				<div>
					<span style="width:34%;">			
						<h2>Send me a message!</h2>
						<form action='contact.php' method='post'>
							<h5>Your e-mail: &nbsp;<input name='sender_address'></h5>
							<textarea placeholder='Please write your message here!' name='message'></textarea>
							<br>
							<br>
							<input type="submit" value='SEND'></input>
						</form>
					</span>
					<span style="display:table-cell;line-height:100%;verticle-align:middle;width:30%;">
					<h1 class='desktop-only'>-or-</h1>
					</span>
					<span style="width:34%;">
						<h2>Follow me!</h2>
						<br>
						<a href="https://twitter.com/egakaned" target='_blank'>
							<img class='social-icon' src='assets/Twitter_Logo_WhiteOnBlue.png'>
						</a>
						<!-- 
<h1>
						<ul>
							<li><a target='_blank' href='https://twitter.com/edmund_augury'>Twitter</a></li>
							<li><a target='_blank' href='www.linkedin.com/in/edmundeisenberg'>LinkedIn</a></li>
							<li><a target='_blank' href='https://www.instagram.com/edmund_eisenberg/'>Instagram</a></li>
							<li><a target='_blank' href=''https://github.com/edmundeisenberg/>GitHub</a></li>
						</ul>
						</h1>
 -->
					</span>
				</div>
			</div>
		</div>
		<?php getFooter() ?>
	</body>
</html>