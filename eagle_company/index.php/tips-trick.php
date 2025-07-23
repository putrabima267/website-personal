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
    <title>Tips & Trik - EAGLE COMPANY</title>
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

        /* Tips Categories */
        .tips-categories {
            display: flex;
            gap: 15px;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .category-btn {
            padding: 10px 25px;
            background: white;
            border: 2px solid #ff9800;
            border-radius: 25px;
            color: #ff9800;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .category-btn:hover,
        .category-btn.active {
            background: #ff9800;
            color: white;
        }

        /* Tips Grid */
        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .tip-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .tip-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .tip-number {
            background: #ff9800;
            color: white;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .tip-content {
            padding: 25px;
        }

        .tip-title {
            font-size: 22px;
            color: #1a1a1a;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .tip-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .tip-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .tip-tag {
            background: #f0f0f0;
            color: #666;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
        }

        .learn-more {
            color: #ff9800;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: gap 0.3s;
        }

        .learn-more:hover {
            gap: 10px;
        }

        /* Featured Tip */
        .featured-tip {
            background: linear-gradient(135deg, #ff9800, #e68900);
            color: white;
            padding: 40px;
            border-radius: 10px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .featured-tip::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(0.8); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }

        .featured-content {
            position: relative;
            z-index: 1;
        }

        .featured-label {
            background: rgba(255,255,255,0.2);
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .featured-title {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .featured-description {
            font-size: 18px;
            line-height: 1.6;
            opacity: 0.95;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            
            .header-container {
                flex-wrap: wrap;
            }
            
            .tips-grid {
                grid-template-columns: 1fr;
            }
            
            .page-title {
                font-size: 28px;
            }
            
            .featured-title {
                font-size: 26px;
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
            <a href="index.php">Home</a> > <a href="artikel.php">Artikel</a> > Tips & Trik
        </div>

        <h1 class="page-title">Tips & Trik</h1>

        <!-- Featured Tip -->
        <div class="featured-tip">
            <div class="featured-content">
                <span class="featured-label">Tips Unggulan Minggu Ini</span>
                <h2 class="featured-title">5 Strategi Jitu Meningkatkan Produktivitas Tim dengan Tools Digital</h2>
                <p class="featured-description">
                    EAGLE COMPANY membagikan insight eksklusif tentang bagaimana memanfaatkan teknologi untuk meningkatkan kolaborasi tim dan produktivitas hingga 60%. Temukan tools yang tepat untuk bisnis Anda.
                </p>
            </div>
        </div>

        <!-- Categories -->
        <div class="tips-categories">
            <a href="#" class="category-btn active">Semua Tips</a>
            <a href="#" class="category-btn">Produktivitas</a>
            <a href="#" class="category-btn">Keamanan</a>
            <a href="#" class="category-btn">Digital Marketing</a>
            <a href="#" class="category-btn">Development</a>
            <a href="#" class="category-btn">Leadership</a>
        </div>

        <!-- Tips Grid -->
        <div class="tips-grid">
            <!-- Tip 1 -->
            <article class="tip-card">
                <div class="tip-number">
                    <i class="fas fa-lightbulb"></i>
                    Tips #01
                </div>
                <div class="tip-content">
                    <h3 class="tip-title">Mengoptimalkan Meeting Online untuk Hasil Maksimal</h3>
                    <p class="tip-description">
                        EAGLE COMPANY berbagi cara efektif mengelola meeting virtual. Dari persiapan agenda yang jelas hingga penggunaan fitur kolaborasi, tingkatkan efektivitas meeting Anda hingga 80%.
                    </p>
                    <div class="tip-tags">
                        <span class="tip-tag">Produktivitas</span>
                        <span class="tip-tag">Remote Work</span>
                        <span class="tip-tag">Kolaborasi</span>
                    </div>
                    <a href="#" class="learn-more">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Tip 2 -->
            <article class="tip-card">
                <div class="tip-number">
                    <i class="fas fa-shield-alt"></i>
                    Tips #02
                </div>
                <div class="tip-content">
                    <h3 class="tip-title">Lindungi Data Bisnis dari Serangan Phishing</h3>
                    <p class="tip-description">
                        Pelajari teknik terbaru yang digunakan EAGLE COMPANY untuk mengidentifikasi dan mencegah serangan phishing. Dapatkan checklist lengkap untuk melindungi email dan data sensitif perusahaan.
                    </p>
                    <div class="tip-tags">
                        <span class="tip-tag">Cybersecurity</span>
                        <span class="tip-tag">Email Security</span>
                        <span class="tip-tag">Best Practice</span>
                    </div>
                    <a href="#" class="learn-more">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Tip 3 -->
            <article class="tip-card">
                <div class="tip-number">
                    <i class="fas fa-chart-line"></i>
                    Tips #03
                </div>
                <div class="tip-content">
                    <h3 class="tip-title">Meningkatkan ROI Digital Marketing dengan Analytics</h3>
                    <p class="tip-description">
                        EAGLE COMPANY mengungkap rahasia menggunakan data analytics untuk mengoptimalkan campaign marketing. Temukan cara mengukur dan meningkatkan ROI secara signifikan.
                    </p>
                    <div class="tip-tags">
                        <span class="tip-tag">Digital Marketing</span>
                        <span class="tip-tag">Analytics</span>
                        <span class="tip-tag">ROI</span>
                    </div>
                    <a href="#" class="learn-more">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Tip 4 -->
            <article class="tip-card">
                <div class="tip-number">
                    <i class="fas fa-code"></i>
                    Tips #04
                </div>
                <div class="tip-content">
                    <h3 class="tip-title">Best Practice CI/CD untuk Development Team</h3>
                    <p class="tip-description">
                        Implementasi CI/CD yang efektif dari EAGLE COMPANY. Pelajari cara mengotomatisasi deployment, meningkatkan code quality, dan mempercepat time-to-market produk digital Anda.
                    </p>
                    <div class="tip-tags">
                        <span class="tip-tag">DevOps</span>
                        <span class="tip-tag">Automation</span>
                        <span class="tip-tag">Development</span>
                    </div>
                    <a href="#" class="learn-more">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Tip 5 -->
            <article class="tip-card">
                <div class="tip-number">
                    <i class="fas fa-users"></i>
                    Tips #05
                </div>
                <div class="tip-content">
                    <h3 class="tip-title">Membangun Culture Innovation di Perusahaan</h3>
                    <p class="tip-description">
                        EAGLE COMPANY berbagi strategi menciptakan budaya inovasi yang sustainable. Dari mindset hingga framework praktis, transformasi tim Anda menjadi innovation powerhouse.
                    </p>
                    <div class="tip-tags">
                        <span class="tip-tag">Leadership</span>
                        <span class="tip-tag">Innovation</span>
                        <span class="tip-tag">Culture</span>
                    </div>
                    <a href="#" class="learn-more">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Tip 6 -->
            <article class="tip-card">
                <div class="tip-number">
                    <i class="fas fa-mobile-alt"></i>
                    Tips #06
                </div>
                <div class="tip-content">
                    <h3 class="tip-title">Mobile-First Strategy untuk Business Growth</h3>
                    <p class="tip-description">
                        Eksplorasi pendekatan mobile-first dari EAGLE COMPANY. Pahami mengapa mobile experience krusial dan bagaimana mengoptimalkan bisnis Anda untuk era mobile dominance.
                    </p>
                    <div class="tip-tags">
                        <span class="tip-tag">Mobile Strategy</span>
                        <span class="tip-tag">UX Design</span>
                        <span class="tip-tag">Growth</span>
                    </div>
                    <a href="#" class="learn-more">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Tip 7 -->
            <article class="tip-card">
                <div class="tip-number">
                    <i class="fas fa-database"></i>
                    Tips #07
                </div>
                <div class="tip-content">
                    <h3 class="tip-title">Data Backup Strategy yang Bulletproof</h3>
                    <p class="tip-description">
                        EAGLE COMPANY menyajikan panduan lengkap strategi backup data. Dari 3-2-1 rule hingga disaster recovery plan, pastikan data bisnis Anda selalu aman dan recoverable.
                    </p>
                    <div class="tip-tags">
                        <span class="tip-tag">Data Security</span>
                        <span class="tip-tag">Backup</span>
                        <span class="tip-tag">Business Continuity</span>
                    </div>
                    <a href="#" class="learn-more">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Tip 8 -->
            <article class="tip-card">
                <div class="tip-number">
                    <i class="fas fa-rocket"></i>
                    Tips #08
                </div>
                <div class="tip-content">
                    <h3 class="tip-title">Scaling Business dengan Cloud Infrastructure</h3>
                    <p class="tip-description">
                        Strategi scaling efektif dari EAGLE COMPANY. Manfaatkan cloud infrastructure untuk pertumbuhan bisnis yang sustainable, cost-effective, dan highly available.
                    </p>
                    <div class="tip-tags">
                        <span class="tip-tag">Cloud Computing</span>
                        <span class="tip-tag">Scalability</span>
                        <span class="tip-tag">Infrastructure</span>
                    </div>
                    <a href="#" class="learn-more">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <!-- Tip 9 -->
            <article class="tip-card">
                <div class="tip-number">
                    <i class="fas fa-brain"></i>
                    Tips #09
                </div>
                <div class="tip-content">
                    <h3 class="tip-title">AI Tools untuk Meningkatkan Customer Service</h3>
                    <p class="tip-description">
                        EAGLE COMPANY menghadirkan panduan implementasi AI untuk customer service. Dari chatbot hingga predictive analytics, tingkatkan customer satisfaction hingga 90%.
                    </p>
                    <div class="tip-tags">
                        <span class="tip-tag">AI & ML</span>
                        <span class="tip-tag">Customer Service</span>
                        <span class="tip-tag">Automation</span>
                    </div>
                    <a href="#" class="learn-more">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </article>
        </div>
    </div>
</body>
</html>