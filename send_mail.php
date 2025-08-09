<?php
// formdan gelen verileri al
$adsoyad = $_POST['adsoyad'];
$email = $_POST['email'];
$mesaj = $_POST['mesaj'];

// Alıcı e-posta adresi ve konu
$alici_mail = "sizin_eposta_adresiniz@gmail.com"; // Burayı kendi e-posta adresinizle değiştirin
$konu = "Web Sitenizden Yeni Mesaj Var";

// E-posta başlıkları
$basliklar = "From: " . $adsoyad . " <" . $email . ">\r\n";
$basliklar .= "Reply-To: " . $email . "\r\n";
$basliklar .= "MIME-Version: 1.0\r\n";
$basliklar .= "Content-Type: text/html; charset=UTF-8\r\n";

// E-posta içeriği
$eposta_icerigi = "
<html>
<head>
    <title>Web Sitenizden Gelen Mesaj</title>
</head>
<body>
    <p><strong>Ad Soyad:</strong> " . htmlspecialchars($adsoyad) . "</p>
    <p><strong>E-posta:</strong> " . htmlspecialchars($email) . "</p>
    <p><strong>Mesaj:</strong></p>
    <p>" . nl2br(htmlspecialchars($mesaj)) . "</p>
</body>
</html>
";

// E-postayı gönder
if (mail($alici_mail, $konu, $eposta_icerigi, $basliklar)) {
    // Başarılıysa, kullanıcıyı teşekkür sayfasına yönlendir
    header("Location: thank_you.html");
} else {
    // Başarısız olursa hata mesajı göster
    echo "Hata! Mesajınız gönderilemedi.";
}
?>