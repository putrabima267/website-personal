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
    <title>Konsep Teknologi - EAGLE COMPANY</title>
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
            margin-bottom: 10px;
            border-bottom: 3px solid #ff9800;
            padding-bottom: 10px;
            display: inline-block;
        }

        .breadcrumb {
            margin-bottom: 30px;
            color: #666;
        }

        .breadcrumb a {
            color: #ff9800;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* Article Grid */
        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .article-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .article-header {
            background-color: #ff9800;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .article-icon {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .article-content {
            padding: 25px;
        }

        .article-title {
            font-size: 24px;
            color: #1a1a1a;
            margin-bottom: 15px;
        }

        .article-excerpt {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .read-more {
            color: #ff9800;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: gap 0.3s;
        }

        .read-more:hover {
            gap: 10px;
        }

        /* Intro Section */
        .intro-section {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 40px;
        }

        .intro-section h2 {
            color: #ff9800;
            margin-bottom: 15px;
            font-size: 28px;
        }

        .intro-section p {
            color: #555;
            line-height: 1.8;
            font-size: 16px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            
            .header-container {
                flex-wrap: wrap;
            }
            
            .articles-grid {
                grid-template-columns: 1fr;
            }
            
            .page-title {
                font-size: 28px;
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
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="index.php">Home</a> > <a href="artikel.php">Artikel</a> > Konsep Teknologi
        </div>

        <h1 class="page-title">Konsep Teknologi</h1>

        <!-- Intro Section -->
        <div class="intro-section">
            <h2>Memahami Teknologi Modern untuk Bisnis</h2>
            <p>EAGLE COMPANY berkomitmen untuk menghadirkan pemahaman mendalam tentang konsep-konsep teknologi terkini yang relevan dengan dunia bisnis. Kami percaya bahwa pemahaman yang baik tentang teknologi adalah kunci kesuksesan transformasi digital di era modern.</p>
        </div>

        <!-- Articles Grid -->
        <div class="articles-grid">
            <!-- Article 1 -->
            <article class="article-card">
                <div class="article-header">
                    <i class="fas fa-cloud article-icon"></i>
                </div>
                <div class="article-content">
                    <h3 class="article-title">Cloud Computing untuk Bisnis</h3>
                    <p class="article-excerpt">
                        Pelajari bagaimana teknologi cloud computing dapat mengubah cara perusahaan Anda beroperasi. EAGLE COMPANY membantu Anda memahami konsep dasar cloud, manfaat, dan implementasinya untuk meningkatkan efisiensi operasional.
                    </p>
                    <a href="#" class="read-more">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Article 2 -->
            <article class="article-card">
                <div class="article-header">
                    <i class="fas fa-brain article-icon"></i>
                </div>
                <div class="article-content">
                    <h3 class="article-title">Artificial Intelligence & Machine Learning</h3>
                    <p class="article-excerpt">
                        Eksplorasi mendalam tentang bagaimana AI dan ML dapat diintegrasikan dalam strategi bisnis Anda. EAGLE COMPANY menyediakan wawasan praktis untuk memanfaatkan kecerdasan buatan dalam pengambilan keputusan bisnis.
                    </p>
                    <a href="#" class="read-more">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Article 3 -->
            <article class="article-card">
                <div class="article-header">
                    <i class="fas fa-shield-alt article-icon"></i>
                </div>
                <div class="article-content">
                    <h3 class="article-title">Cybersecurity Fundamentals</h3>
                    <p class="article-excerpt">
                        Memahami dasar-dasar keamanan siber adalah krusial di era digital. EAGLE COMPANY menghadirkan panduan komprehensif tentang cara melindungi aset digital perusahaan Anda dari ancaman cyber.
                    </p>
                    <a href="#" class="read-more">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Article 4 -->
            <article class="article-card">
                <div class="article-header">
                    <i class="fas fa-database article-icon"></i>
                </div>
                <div class="article-content">
                    <h3 class="article-title">Big Data Analytics</h3>
                    <p class="article-excerpt">
                        Transformasi data menjadi insight bisnis yang berharga. EAGLE COMPANY membantu Anda memahami konsep big data dan bagaimana analitik data dapat mendorong pertumbuhan bisnis yang berkelanjutan.
                    </p>
                    <a href="#" class="read-more">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Article 5 -->
            <article class="article-card">
                <div class="article-header">
                    <i class="fas fa-link article-icon"></i>
                </div>
                <div class="article-content">
                    <h3 class="article-title">Blockchain Technology</h3>
                    <p class="article-excerpt">
                        Jelajahi potensi teknologi blockchain beyond cryptocurrency. EAGLE COMPANY memberikan pemahaman tentang bagaimana blockchain dapat meningkatkan transparansi dan keamanan dalam proses bisnis.
                    </p>
                    <a href="#" class="read-more">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Article 6 -->
            <article class="article-card">
                <div class="article-header">
                    <i class="fas fa-wifi article-icon"></i>
                </div>
                <div class="article-content">
                    <h3 class="article-title">Internet of Things (IoT)</h3>
                    <p class="article-excerpt">
                        Memahami ekosistem IoT dan dampaknya terhadap industri. EAGLE COMPANY mengeksplorasi bagaimana perangkat yang terhubung dapat menciptakan nilai baru dan efisiensi operasional untuk bisnis Anda.
                    </p>
                    <a href="#" class="read-more">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>
        </div>
    </div>
</body>
</html>