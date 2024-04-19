<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer sınıflarını dahil et
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Gelen verileri filtreleme fonksiyonu
function Filtre($Deger){
    $IslemBir   = trim($Deger); // Boşlukları temizle
    $IslemIki   = strip_tags($IslemBir); // HTML etiketlerini temizle
    $IslemUc    = htmlspecialchars($IslemIki, ENT_QUOTES); // Özel karakterleri dönüştür
    $Sonuc      = $IslemUc; // Sonucu döndür
    return $Sonuc;
}

// Post ile gelen verileri al ve filtrele
$GelenAdSoyad = Filtre($_POST["adsoyad"]);
$GelenEmail = Filtre($_POST["email"]);
$GelenTelefon = Filtre($_POST["telefon"]);
$GelenMesaj = Filtre($_POST["mesaj"]);

// PHPMailer nesnesini oluştur
$mail = new PHPMailer(true);

try {
    // Sunucu ayarlarını yap
    $mail->SMTPDebug = 0; // Hata ayıklama çıktısını kapat (0 kapalı, 2 detaylı)
    $mail->isSMTP(); // SMTP kullanarak gönder
    $mail->Host       = 'smtp.example.com'; // SMTP sunucusunu ayarla
    $mail->SMTPAuth   = true; // SMTP kimlik doğrulamasını etkinleştir
    $mail->Username   = 'user@example.com'; // SMTP kullanıcı adı
    $mail->Password   = 'secret'; // SMTP şifresi
    $mail->SMTPSecure = 'tls'; // TLS şifrelemesini etkinleştir
    $mail->Port       = 465; // Bağlanılacak TCP portunu ayarla (SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS ise 587 kullan)

    // Alıcıları ayarla
    $mail->setFrom('from@example.com', 'Mailer'); // Göndericiyi ayarla
    $mail->addAddress('joe@example.net', 'Joe User'); // Alıcı ekle
    $mail->addAddress('ellen@example.com'); // İsim opsiyonel
    $mail->addReplyTo('info@example.com', 'Information'); // Yanıt adresi ekle
    $mail->addCC('cc@example.com'); // CC ekle
    $mail->addBCC('bcc@example.com'); // BCC ekle

    // İçeriği ayarla
    $mail->isHTML(true); // E-posta formatını HTML olarak ayarla
    $mail->Subject = 'Here is the subject'; // Konuyu ayarla
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>'; // HTML mesaj gövdesini ayarla
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // HTML olmayan posta istemcileri için düz metin gövde

    $mail->send(); // E-postayı gönder
    echo 'Message has been sent'; // Mesaj gönderildiğini bildir
} catch (Exception $e) {
    echo 'Mail Gönderim Hatası<br />Hata Açıklaması :' , $mail->ErrorInfo; // Hata oluşursa bilgilendir
}
?>
