<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menerima dan memfilter input dari form
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validasi input
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Pengaturan penerima email dan subjek
        $to = "kasky1111@gmail.com"; // Ganti dengan alamat email Anda
        $subject = "New Hire Request from $name";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        // Kirim email
        if (mail($to, $subject, $body, $headers)) {
            echo "<script>alert('Pesan Anda berhasil dikirim!'); window.location.href='index.html#contact';</script>";
        } else {
            echo "<script>alert('Maaf, pesan gagal dikirim. Coba lagi nanti.'); window.location.href='index.html#contact';</script>";
        }
    } else {
        echo "<script>alert('Silakan lengkapi semua field dengan benar.'); window.location.href='index.html#contact';</script>";
    }
} else {
    echo "<script>alert('Invalid Request.'); window.location.href='index.html#contact';</script>";
}
?>
