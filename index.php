<!DOCTYPE html> 
<html lang="tr"> <!-- HTML belgesinin dili Türkçe -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!-- İçerik tipi ve karakter seti UTF-8 -->
<meta http-equiv="Content-Language" content="tr"> <!-- Belge içeriği Türkçe  -->
<meta charset="utf-8"> <!-- Belge karakter seti UTF-8 -->

    <title>İletişim Formu</title> <!-- Web sayfasının başlığı -->
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- CSS dosyasına bağlantı -->

</head>
<body>
    <div class="container"> <!-- İletişim formunu içeren konteyner -->
        <h2>Bize Ulaşın</h2> <!-- Form başlığı -->
        <form action="sonuc.php" method="post"> <!-- Form verilerinin sonuc.php'ye POST metodu ile gönderilecek -->
            <input type="text" name="adsoyad" placeholder="Adınız Soyadınız" required> <!-- Ad soyad girilmesi için metin alanı -->
            <input type="email" name="email" placeholder="E-posta Adresiniz" required> <!-- E-posta adresi girilmesi için e-posta alanı -->
            <input type="text" name="telefon" placeholder="Telefon Numaranız" required> <!-- Telefon numarası girilmesi için metin alanı -->
            <textarea name="mesaj" rows="5" placeholder="Mesajınız" required></textarea> <!-- Mesaj girilmesi için metin kutusu -->
            <button type="submit">Mesajı Gönder</button> <!-- Formu göndermek için buton -->
        </form>
    </div>
</body>
</html>
