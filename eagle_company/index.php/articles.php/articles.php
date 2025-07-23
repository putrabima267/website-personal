<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel - EAGLE COMPANY</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Header Styles */
        .header {
            background-color: #1a1a1a;
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
            color: #ff9800;
        }

        .logo i {
            margin-right: 10px;
            font-size: 30px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
            font-weight: 500;
        }

        .nav-menu a:hover {
            color: #ff9800;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .welcome-text {
            color: #ff9800;
        }

        .logout-btn {
            background-color: #ff9800;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #e68900;
        }

        /* Main Content */
        .main-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-title {
            font-size: 36px;
            color: #1a1a1a;
            margin-bottom: 30px;
            text-align: center;
        }

        .article-categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .category-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .category-icon {
            font-size: 48px;
            color: #ff9800;
            margin-bottom: 20px;
        }

        .category-title {
            font-size: 24px;
            color: #1a1a1a;
            margin-bottom: 15px;
        }

        .category-description {
            color: #666;
            line-height: 1.6;
        }

        .article-count {
            color: #ff9800;
            font-weight: bold;
            margin-top: 15px;
        }

        /* Intro Section */
        .intro-section {
            background: white;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 40px;
        }

        .intro-section p {
            color: #555;
            font-size: 18px;
            line-height: 1.8;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            
            .header-container {
                flex-wrap: wrap;
            }
            
            .page-title {
                font-size: 28px;
            }
            
            .article-categories {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <i class="fas fa-shield-alt"></i>
                <span>EAGLE COMPANY</span>
            </div>
            
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="visi-misi.php">Visi dan Misi</a></li>
                    <li><a href="produk-jasa.php">Produk & Jasa</a></li>
                    <li><a href="kontak.php">Kontak</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="artikel.php">Artikel</a></li>
                </ul>
            </nav>
            
            <div class="user-info">
                <span class="welcome-text">Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-container">
        <h1 class="page-title">Pusat Pengetahuan & Artikel</h1>
        
        <!-- Intro Section -->
        <div class="intro-section">
            <p>
                Selamat datang di pusat pengetahuan EAGLE COMPANY. Temukan berbagai artikel, tips, dan informasi terkini 
                seputar teknologi, bisnis, dan transformasi digital yang dapat membantu mengembangkan bisnis Anda.
            </p>
        </div>

        <!-- Article Categories -->
        <div class="article-categories">
            <!-- Konsep Teknologi -->
            <a href="konsep-teknologi.php" class="category-card">
                <i class="fas fa-microchip category-icon"></i>
                <h2 class="category-title">Konsep Teknologi</h2>
                <p class="category-description">
                    Pelajari konsep-konsep teknologi modern yang relevan dengan dunia bisnis, 
                    dari cloud computing hingga artificial intelligence.
                </p>
                <p class="article-count">6 Artikel Tersedia</p>
            </a>

            <!-- Informasi Terkini -->
            <a href="informasi-terkini.php" class="category-card">
                <i class="fas fa-newspaper category-icon"></i>
                <h2 class="category-title">Informasi Terkini</h2>
                <p class="category-description">
                    Update terbaru seputar perkembangan teknologi, tren industri, 
                    dan berita dari EAGLE COMPANY.
                </p>
                <p class="article-count">5 Artikel Terbaru</p>
            </a>

            <!-- Tips & Trik -->
            <a href="tips-trik.php" class="category-card">
                <i class="fas fa-lightbulb category-icon"></i>
                <h2 class="category-title">Tips & Trik</h2>
                <p class="category-description">
                    Panduan praktis dan tips berguna untuk mengoptimalkan penggunaan 
                    teknologi dalam operasional bisnis Anda.
                </p>
                <p class="article-count">9 Tips Praktis</p>
            </a>
        </div>
    </div>
</body>
</html>