<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di GlofGloveSync</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1c1f27;
            /* Dark background color */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #172137;
            padding: 80px;
            width: 700px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        h1 {
            font-size: 2.2rem;
            color: #fff;
            margin-bottom: 15px;
        }

        p {
            font-size: 1rem;
            color: #ddd;
            margin-bottom: 30px;
            text-align: left;
        }

        .button {
            width: 300px !important;
            background-color: #6366F1;
            color: white;
            padding: 12px 24px;
            font-size: 1.1rem;
            font-weight: 700;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #6366D1;
        }

        .button:active {
            transform: translateY(0);
        }

        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Logo Image -->
        <img src="/images/logo.png" alt="GlofGloveSync Logo" class="logo">
        <h1>WELCOME TO GLOFGLOVESYNC</h1>
        <p>GlofGloveSync adalah perusahaan manufaktur yang mengkhususkan
            diri dalam pembuatan sarung tangan golf berkualitas tinggi. Kami
            menggabungkan teknologi modern dengan proses produksi yang
            efisien untuk menciptakan produk yang ergonomis dan tahan lama.
            Setiap sarung tangan dirancang dengan presisi untuk memberikan
            kenyamanan dan performa optimal bagi para pegolf. GlofGloveSync
            berkomitmen menjadi mitra terpercaya dalam menunjang prestasi
            di lapangan golf.</p>
        <a href="{{ route('filament.admin.auth.login') }}" class="button">LOGIN</a>
    </div>
</body>

</html>