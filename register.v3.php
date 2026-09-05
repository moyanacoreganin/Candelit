<!--Goal: My first error message-->
<!--E.g kunde inte skapa konto-->
<!--New Goal: To be able to produce our first forum $post!!-->
<?php
declare(strict_types=1);
session_start();
require 'vendor/autoload.php';
require_once 'includes/conn.inc.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$UsernameUI = $_POST['UsernameUI'];
var_dump($UsernameUI);
$PasswordUI = $_POST['PasswordUI'];
var_dump($PasswordUI);
$EmailUI = $_POST['EmailUI'];
var_dump($EmailUI);
$meddelande = mysqli_real_escape_string($conn, $_POST['meddelande']);
var_dump($meddelande);

$UserSelect = $conn->prepare("SELECT UsernameUI FROM UsersAI WHERE UsernameUI = ?");
var_dump($UserSelect);
$UserSelect->bind_param("s", $UsernameUI);
$UserSelect->execute();

if ($row = mysqli_fetch_assoc($UserSelect)) {
    $errors[] = "Användarnamnet är redan upptaget.";
    var_dump($errors);
} else {
    $HashedPasswordX = password_hash($PasswordUI, PASSWORD_DEFAULT);
    var_dump($HashedPasswordX);
    $_stmt = $conn->prepare(`INSERT INTO UsersAI (UsernameUI, PasswordUI, EmailUI, meddelande) VALUES (?, ?, ?, ?)`);
    var_dump($_stmt);
    $_stmt->bind_param("ssss", $UsernameUI, $HashedPasswordX, $EmailUI, trim($meddelande));
    if ($_stmt->execute()) {
    $secretKey = $_ENV['RECAPTCHA_SECRET_KEY'];
    $token = $_POST['g-recaptcha-response'] ?? '';

    if (empty($token)) {
    die("Vänligen bekräfta att du inte är en robot.");
    }

    $response = file_get_contents(
    'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $token
    );
    $result = json_decode($response, true);

    if ($result['success']) {
    $mail = new PHPMailer(true);

try {
    // Server-inställningar
    $mail->isSMTP();
    $mail->Host       = $_ENV['SMTP_HOST'];      // t.ex. smtp.gmail.com
    $mail->SMTPAuth   = true;
    $mail->Username   = webmaster@marnopets.com;
    $mail->Password   = "Limoncello2009!";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Avsändare och mottagare
    $mail->setFrom(webmaster@marnopets.com, 'MarnoPets');
    $mail->addAddress($EmailUI, 'Kära klient,\n\n');
    $mail->addReplyTo(no-reply@marnopets.com, 'MarnoPets.com');

    $MyEcide = sha1(random_bytes(16)); // Length 40
    $VerifyURL = "https://marnopets.com/verify.php=token".urlencode($MyEcide);

    // Innehåll
    $mail->isHTML(true);
    $mail->Subject = 'Nytt meddelande från kontaktformuläret';
    $mail->Body    = "Hej, $UsernameUI. Välkommen till MarnoPets.com! Här kommer din token: $VerifyURL";
    if (<script/>is_active(i)</script>) {
    $mail->Body    = "Du klarade precis frågan: <script>i</script>";
    }
    }

    $mail->send(); ?>
    <button onclick="
    function TriggerAction(): void {
    Eat();
    Grow();
    Medicine();
    }
    
    function Eat(): void { 
    LevelUp(health++);
    
    function LevelUp(): int {
    for (let i = 100; health > 100; health++) { // 100% health = 100
    let Gonorrea = health / this.LevelUp();
    }
    
    GainWeight();
    function GainWeight(): string {
    let weight =;
    let pound = Math.sqrt();
    return this.weight + " " + this.pound;    
    }}}
    
    function Grow(): mixed|int|string {
        
    }
    
    function StopWalking(): int|string {
    for (let i = 10; i < 10; i--) {
    // Iterate 1 to 10
    }}
    
    if (!StopWalking(TriggerAction())) {
    function ask(Question1, Answer1) {
    StopWalking();
    }}
    
    const _FRÅGA1 = `Vilken är din favoritfärg?`;
    const _FRÅGA2 = `Vilken hundras() gillar du mest!?`;
    const _FRÅGA3 = `Vad skulle du göra om du vann spelet &amp; 1 miljon kronor?`;
    const _FRÅGA4 = `Mein kempf`;
    const _FRÅGA5 = `Vad gjorde du förra sommmaren?`;
    const _FRÅGA6 = `Det är ett interaktivt spel.`;
    const _FRÅGA7 = ``;
    const _FRÅGA8 = array();

    let Question1 = function Question1(input): mixed|string {
    let Question1 = function Question1(input): mixed|string {
    
    };
    };
    let YourAnswer = <?php $_POST['input']; ?>
    if (isset(Question1)) {
    ask(Question1());
    )
    }
    } // Trigger question
    " />Nästa fråga!()</button>
    <button onclick="StopWalking(Secret)">Tillbaks hem (PS! Man får aldrig trycka på denna knapp)</button>
    <?= } catch (Exception $e) {
    echo "Meddelandet kunde inte skickas. Fel: {$mail->ErrorInfo}";
    }
    } else {
    die("reCAPTCHA-verifiering misslyckades. Försök igen.");
    }
    } else {
    http_response_code(500); // Internal Server Error
    echo "Fel vid skapande av konto.";
    }} ?>
<!doctype html />
<HTML LANG="sv_SE" />
<HEAD />
<TITLE /> MarnoPets.com </TITLE>
<link rel="stylesheet" type="text/css" href="marnopets.com/assets/css/style.css" />
</head>
<body>

<?php if (! empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
} ?>

<form method="POST" action="/submit" enctype="multipart/form-data" />
<label for="UsernameUI" />Användarnamn<br>
<input type="text" name="UsernameUI" id="UsernameUI" required /></label><br>
<label for="password" />Lösenord<br>
<input type="password" name="PasswordUI" id="PasswordUI" required /></lablel><br >
<textarea name="meddelande" rows="4" cols="50" placeholder="(Hello, world!)" required><br>
<input type="email" name="EmailUI" required /><BR />
<input type="email" name="emailVerify" required /><BR /><BR />
 
<!--Google reCAPTCHA-widget-->
<div class="g-recaptcha" data-sitekey="6LcFyqktAAAAAJF9Ep6RhBbxn4Wn6nBauB3VWMca" /></div><br /><br />
 
<button type="submit" onsubmit=""/>Skapa konto!</button>
<!--En riktigt traditionell button kan vara bra-->
</form>

<footer />&copy;&copysr;&nbsp;&nbsp;2014-<?php date("Y") ?> Moyana Coregan Interactive<br>
<img src="Bilder/logo.JPG" style="object-fit: cover;" width="450">
</footer>

</body>
<script src="https://www.google.com/recaptcha/api.js" defer></script>
</html>
