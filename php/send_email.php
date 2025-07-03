<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // API Key EmailJS (ganti dengan milikmu)
    $userID = "YOUR_USER_ID";  // Ganti dengan User ID kamu
    $serviceID = "YOUR_SERVICE_ID";  // Ganti dengan Service ID yang kamu dapatkan dari EmailJS
    $templateID = "YOUR_TEMPLATE_ID";  // Ganti dengan Template ID yang kamu buat di EmailJS

    // URL EmailJS API
    $url = "https://api.emailjs.com/api/v1.0/email/send";

    // Data yang akan dikirimkan ke EmailJS
    $data = [
        'service_id' => $serviceID,
        'template_id' => $templateID,
        'user_id' => $userID,
        'template_params' => [
            'name' => $name,
            'email' => $email,
            'message' => $message
        ]
    ];

    // Mengonversi data menjadi JSON
    $jsonData = json_encode($data);

    // Menggunakan cURL untuk mengirimkan data ke EmailJS
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);

    // Mengeksekusi cURL dan mendapatkan response
    $response = curl_exec($ch);

    // Menangani error jika ada
    if ($response === false) {
        echo "Error: " . curl_error($ch);
    } else {
        echo "Pesan berhasil dikirim!";
    }

    // Menutup koneksi cURL
    curl_close($ch);
}
?>
