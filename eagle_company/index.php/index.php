<?php
// Check if config.php exists
if (!file_exists('config.php')) {
    die('<h2>Error: config.php tidak ditemukan!</h2>
    <p>Pastikan file config.php ada di folder yang sama dengan index.php</p>
    <p>Path saat ini: ' . __DIR__ . '</p>');
}
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EAGLE COMPANY - Excellence Above All</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Header Styles */
        header {
            background-color: #1a1a2e;
            color: white;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .eagle-logo {
            width: 60px;
            height: 60px;
            background: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMzAiIGN5PSIzMCIgcj0iMzAiIGZpbGw9IiMxNjIxM2UiLz4KPHBhdGggZD0iTTMwIDEwQzMwIDEwIDIwIDE1IDIwIDI1QzIwIDM1IDMwIDQwIDMwIDQwQzMwIDQwIDQwIDM1IDQwIDI1QzQwIDE1IDMwIDEwIDMwIDEwWiIgZmlsbD0iI2YzOWMxMiIvPgo8cGF0aCBkPSJNMzAgMjBDMzAgMjAgMjUgMjIgMjUgMjVDMjUgMjggMzAgMzAgMzAgMzBDMzAgMzAgMzUgMjggMzUgMjVDMzUgMjIgMzAgMjAgMzAgMjBaIiBmaWxsPSIjMWExYTJlIi8+Cjwvc3ZnPg==') no-repeat center;
            background-size: contain;
        }

        .company-name {
            font-size: 28px;
            font-weight: bold;
            color: #f39c12;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        /* Navigation */
        nav ul {
            list-style: none;
            display: flex;
            gap: 30px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            cursor: pointer;
        }

        nav a:hover {
            color: #f39c12;
        }

        /* User Section */
        .user-section {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .user-info {
            display: <?php echo isLoggedIn() ? 'flex' : 'none'; ?>;
            align-items: center;
            gap: 10px;
            color: #f39c12;
        }

        .btn {
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-login {
            background-color: #f39c12;
            color: white;
        }

        .btn-login:hover {
            background-color: #e67e22;
        }

        .btn-signup {
            background-color: transparent;
            color: #f39c12;
            border: 2px solid #f39c12;
        }

        .btn-signup:hover {
            background-color: #f39c12;
            color: white;
        }

        /* Main Content */
        main {
            max-width: 1200px;
            margin: 120px auto 40px;
            padding: 0 20px;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: white;
            padding: 80px 40px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '🦅';
            position: absolute;
            font-size: 200px;
            opacity: 0.1;
            top: -50px;
            right: -50px;
            transform: rotate(-15deg);
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: #f39c12;
        }

        .hero p {
            font-size: 20px;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Section Styles */
        .section {
            background: white;
            padding: 40px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: none;
        }

        .section.active {
            display: block;
        }

        .section h2 {
            color: #1a1a2e;
            font-size: 32px;
            margin-bottom: 25px;
            border-bottom: 3px solid #f39c12;
            padding-bottom: 10px;
            display: inline-block;
        }

        .section h3 {
            color: #16213e;
            font-size: 24px;
            margin: 20px 0 15px 0;
        }

        /* About Us Section */
        .about-content {
            line-height: 1.8;
            text-align: justify;
        }

        /* Vision Mission */
        .vision-mission {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-top: 20px;
        }

        .vision-box, .mission-box {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            border-left: 4px solid #f39c12;
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .service-card {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            transition: transform 0.3s;
            border: 2px solid transparent;
        }

        .service-card:hover {
            transform: translateY(-5px);
            border-color: #f39c12;
        }

        .service-card h4 {
            color: #1a1a2e;
            margin-bottom: 10px;
        }

        /* Gallery */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .gallery-item {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            transition: transform 0.3s;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        /* Clients */
        .clients-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .client-card {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .client-card:hover {
            background: #e9ecef;
            transform: translateY(-3px);
        }

        /* Contact Info */
        .contact-info {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .contact-info p {
            margin: 10px 0;
            font-size: 18px;
        }

        .contact-info strong {
            color: #1a1a2e;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 40px;
            width: 90%;
            max-width: 400px;
            border-radius: 10px;
            position: relative;
        }

        .close {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 30px;
            cursor: pointer;
            color: #999;
        }

        .close:hover {
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #f39c12;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #f39c12;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #e67e22;
        }

        /* Dropdown Menu */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #2c2c44;
            min-width: 200px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            top: 100%;
            margin-top: 10px;
            border-radius: 5px;
        }

        .dropdown-content a {
            color: white !important;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #3c3c54;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Footer */
        footer {
            background-color: #1a1a2e;
            color: white;
            text-align: center;
            padding: 30px 0;
            margin-top: 50px;
        }

        /* Alert Messages */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            display: none;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 20px;
            }

            nav ul {
                flex-wrap: wrap;
                justify-content: center;
            }

            .vision-mission {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 36px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-content">
            <div class="logo-section">
                <div class="eagle-logo"></div>
                <div class="company-name">EAGLE COMPANY</div>
            </div>
            
            <nav>
                <ul>
                    <li><a href="#" onclick="showSection('home')">Home</a></li>
                    <li><a href="#" onclick="showSection('profile')">Profile</a></li>
                    <li><a href="#" onclick="showSection('visi-misi')">Visi dan Misi</a></li>
                    <li><a href="#" onclick="showSection('produk')">Produk & Jasa</a></li>
                    <li><a href="#" onclick="showSection('kontak')">Kontak</a></li>
                    <li><a href="#" onclick="showSection('about')">About Us</a></li>
                    <li class="dropdown">
                        <a href="Artikel.php" class="dropbtn">Artikel ▼</a>
                        <div class="dropdown-content">
                            <a href="konsep-teknologi.php">Konsep Teknologi</a>
                            <a href="informasi-terkini.php">Informasi Terkini</a>
                            <a href="tips-trick.php">Tips & Trik</a>
                        </div>
                    </li>
                </ul>
            </nav>
            
            <div class="user-section">
                <?php if (isLoggedIn()): ?>
                    <div class="user-info">
                        <span>Selamat datang, <?php echo $_SESSION['full_name']; ?>!</span>
                        <a href="logout.php" class="btn btn-login">Logout</a>
                    </div>
                <?php else: ?>
                    <button class="btn btn-login" onclick="openLoginModal()">Sign In</button>
                    <button class="btn btn-signup" onclick="openSignupModal()">Sign Up</button>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Home Section -->
        <div id="home" class="section active">
            <div class="hero">
                <h1>EAGLE COMPANY</h1>
                <p>Merentangkan Sayap Menuju Kesuksesan Bersama</p>
                <p style="margin-top: 20px;">Kami adalah mitra terpercaya Anda dalam menghadirkan solusi bisnis inovatif dan berkualitas tinggi. Dengan visi yang tajam dan dedikasi yang kuat, kami siap membawa bisnis Anda terbang lebih tinggi.</p>
            </div>

            <div class="section" style="display: block; margin-top: 30px;">
                <h2>Selamat Datang di EAGLE COMPANY</h2>
                <div class="about-content">
                    <p>EAGLE COMPANY adalah perusahaan yang bergerak di bidang konsultan bisnis dan teknologi informasi. Kami hadir untuk memberikan solusi terbaik bagi perusahaan Anda dalam menghadapi tantangan bisnis di era digital.</p>
                    
                    <p style="margin-top: 15px;">Dengan pengalaman lebih dari 7 tahun, kami telah membantu ratusan perusahaan dalam mentransformasi bisnis mereka menjadi lebih efisien dan produktif. Tim profesional kami siap memberikan layanan terbaik untuk kesuksesan bisnis Anda.</p>
                </div>
            </div>
        </div>

        <!-- Profile Section -->
        <div id="profile" class="section">
            <h2>Profile Perusahaan</h2>
            <div class="about-content">
                <h3>Sejarah EAGLE COMPANY</h3>
                <p>EAGLE COMPANY didirikan pada tahun 2018 oleh sekelompok profesional muda yang memiliki visi untuk menghadirkan solusi bisnis yang inovatif dan berkelanjutan. Berawal dari kantor kecil di Jakarta dengan hanya 5 orang tim, kini kami telah berkembang menjadi perusahaan konsultan terkemuka dengan lebih dari 100 profesional berpengalaman.</p>
                
                <p style="margin-top: 15px;">Perjalanan kami dimulai dengan fokus pada konsultasi manajemen bisnis untuk UKM. Seiring berjalannya waktu, kami memperluas layanan ke bidang teknologi informasi, transformasi digital, dan pengembangan sumber daya manusia. Pada tahun 2020, kami membuka cabang di Surabaya dan Medan untuk melayani klien di seluruh Indonesia.</p>
                
                <h3 style="margin-top: 30px;">Pencapaian & Pengalaman</h3>
                <p>Selama 7 tahun beroperasi, EAGLE COMPANY telah:</p>
                <ul style="margin-left: 20px; margin-top: 10px;">
                    <li>Melayani lebih dari 500 klien dari berbagai industri</li>
                    <li>Menyelesaikan 1000+ proyek konsultasi bisnis</li>
                    <li>Meraih sertifikasi ISO 9001:2015 untuk manajemen mutu</li>
                    <li>Menjadi mitra resmi Microsoft dan Oracle</li>
                    <li>Menerima penghargaan "Best Business Consultant 2023" dari Indonesia Business Award</li>
                </ul>
                
                <h3 style="margin-top: 30px;">Kelebihan Perusahaan</h3>
                <p>EAGLE COMPANY memiliki beberapa keunggulan yang membedakan kami dari kompetitor:</p>
                <div class="services-grid" style="margin-top: 15px;">
                    <div class="service-card">
                        <h4>Tim Profesional Berpengalaman</h4>
                        <p>Didukung oleh konsultan bersertifikat internasional dengan pengalaman rata-rata 10 tahun di industri.</p>
                    </div>
                    <div class="service-card">
                        <h4>Solusi Terintegrasi</h4>
                        <p>Menyediakan solusi end-to-end dari perencanaan strategis hingga implementasi dan monitoring.</p>
                    </div>
                    <div class="service-card">
                        <h4>Teknologi Terkini</h4>
                        <p>Menggunakan tools dan metodologi terbaru untuk memberikan hasil optimal bagi klien.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visi Misi Section -->
        <div id="visi-misi" class="section">
            <h2>Visi & Misi</h2>
            <div class="vision-mission">
                <div class="vision-box">
                    <h3>VISI</h3>
                    <p>"Menjadi perusahaan konsultan bisnis dan teknologi terdepan di Asia Tenggara yang menghadirkan solusi inovatif dan berkelanjutan untuk transformasi bisnis di era digital, dengan komitmen terhadap excellence, integritas, dan kepuasan klien."</p>
                </div>
                <div class="mission-box">
                    <h3>MISI</h3>
                    <ol style="margin-left: 20px;">
                        <li style="margin-bottom: 10px;">Menyediakan layanan konsultasi bisnis dan teknologi berkualitas tinggi yang disesuaikan dengan kebutuhan spesifik setiap klien.</li>
                        <li style="margin-bottom: 10px;">Mengembangkan solusi inovatif yang membantu klien meningkatkan efisiensi operasional dan daya saing bisnis.</li>
                        <li style="margin-bottom: 10px;">Membangun kemitraan jangka panjang dengan klien melalui pendekatan kolaboratif dan hasil yang terukur.</li>
                        <li style="margin-bottom: 10px;">Investasi berkelanjutan dalam pengembangan SDM untuk memastikan tim kami selalu update dengan perkembangan teknologi dan best practices industri.</li>
                        <li>Berkontribusi positif terhadap pertumbuhan ekonomi Indonesia melalui pemberdayaan bisnis lokal dan transfer knowledge.</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Produk & Jasa Section -->
        <div id="produk" class="section">
            <h2>Produk & Jasa Perusahaan</h2>
            <p style="margin-bottom: 30px;">EAGLE COMPANY menawarkan berbagai layanan profesional untuk membantu bisnis Anda berkembang:</p>
            
            <div class="services-grid">
                <div class="service-card">
                    <h4>📊 Konsultasi Strategi Bisnis</h4>
                    <p>Membantu perusahaan merancang strategi bisnis yang efektif, analisis pasar, dan perencanaan pertumbuhan jangka panjang. Kami menggunakan framework terkini untuk memastikan strategi Anda relevan dengan dinamika pasar.</p>
                </div>
                
                <div class="service-card">
                    <h4>💻 Transformasi Digital</h4>
                    <p>Mendampingi perusahaan dalam proses digitalisasi, mulai dari assessment kesiapan digital, roadmap transformasi, hingga implementasi teknologi. Solusi kami mencakup ERP, CRM, dan sistem terintegrasi lainnya.</p>
                </div>
                
                <div class="service-card">
                    <h4>🎯 Optimasi Proses Bisnis</h4>
                    <p>Mengidentifikasi dan memperbaiki ineffisiensi dalam proses bisnis Anda. Kami menggunakan metodologi Lean Six Sigma untuk meningkatkan produktivitas dan mengurangi waste.</p>
                </div>
                
                <div class="service-card">
                    <h4>👥 Pengembangan SDM</h4>
                    <p>Program pelatihan dan pengembangan karyawan yang disesuaikan dengan kebutuhan perusahaan. Meliputi leadership development, technical skills, dan soft skills training.</p>
                </div>
                
                <div class="service-card">
                    <h4>📈 Business Intelligence & Analytics</h4>
                    <p>Implementasi sistem BI untuk membantu pengambilan keputusan berbasis data. Kami menyediakan dashboard real-time dan analisis prediktif untuk bisnis Anda.</p>
                </div>
                
                <div class="service-card">
                    <h4>🔒 IT Security Consulting</h4>
                    <p>Layanan konsultasi keamanan IT komprehensif, termasuk security assessment, penetration testing, dan implementasi security framework sesuai standar internasional.</p>
                </div>
            </div>
            
            <h3 style="margin-top: 40px;">Event & Kegiatan Perusahaan</h3>
            <p>EAGLE COMPANY secara rutin mengadakan berbagai kegiatan untuk klien dan masyarakat umum:</p>
            <ul style="margin-left: 20px; margin-top: 15px; line-height: 1.8;">
                <li><strong>Executive Leadership Forum</strong> - Pertemuan bulanan untuk C-level executives membahas tren bisnis terkini</li>
                <li><strong>Digital Transformation Workshop</strong> - Workshop praktis tentang implementasi teknologi digital</li>
                <li><strong>Business Excellence Seminar</strong> - Seminar tahunan dengan pembicara internasional</li>
                <li><strong>EAGLE Business Summit</strong> - Konferensi tahunan yang menghadirkan thought leaders dari berbagai industri</li>
                <li><strong>CSR Program "Eagle Cares"</strong> - Program tanggung jawab sosial untuk UMKM dan startup</li>
            </ul>
            
            <h3 style="margin-top: 40px;">Gallery Kegiatan</h3>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cmVjdCB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iIzFhMWEyZSIvPgogIDx0ZXh0IHg9IjE1MCIgeT0iMTAwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSIjZjM5YzEyIiBmb250LXNpemU9IjgwIj7wn6aFPC90ZXh0PgogIDx0ZXh0IHg9IjE1MCIgeT0iMTMwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSJ3aGl0ZSIgZm9udC1zaXplPSIxNCI+RWFnbGUgU3VtbWl0IDIwMjQ8L3RleHQ+Cjwvc3ZnPg==" alt="Eagle Summit">
                    <p><strong>Eagle Business Summit 2024</strong><br>Konferensi tahunan dengan 500+ peserta</p>
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cmVjdCB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iIzE2MjEzZSIvPgogIDx0ZXh0IHg9IjE1MCIgeT0iMTAwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSIjZjM5YzEyIiBmb250LXNpemU9IjgwIj7wn5K8PC90ZXh0PgogIDx0ZXh0IHg9IjE1MCIgeT0iMTMwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSJ3aGl0ZSIgZm9udC1zaXplPSIxNCI+RGlnaXRhbCBXb3Jrc2hvcDwvdGV4dD4KPC9zdmc+" alt="Digital Workshop">
                    <p><strong>Digital Transformation Workshop</strong><br>Pelatihan praktis untuk tim IT</p>
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cmVjdCB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iIzBmM2E2MCIvPgogIDx0ZXh0IHg9IjE1MCIgeT0iMTAwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSIjZjM5YzEyIiBmb250LXNpemU9IjgwIj7wn46vPC90ZXh0PgogIDx0ZXh0IHg9IjE1MCIgeT0iMTMwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSJ3aGl0ZSIgZm9udC1zaXplPSIxNCI+TGVhZGVyc2hpcCBGb3J1bTwvdGV4dD4KPC9zdmc+" alt="Leadership Forum">
                    <p><strong>Executive Leadership Forum</strong><br>Diskusi bulanan para pemimpin</p>
                </div>
                <div class="gallery-item">
                    <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICA8cmVjdCB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iIzJjMmM0NCIvPgogIDx0ZXh0IHg9IjE1MCIgeT0iMTAwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSIjZjM5YzEyIiBmb250LXNpemU9IjgwIj7wn6SPPC90ZXh0PgogIDx0ZXh0IHg9IjE1MCIgeT0iMTMwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSJ3aGl0ZSIgZm9udC1zaXplPSIxNCI+RWFnbGUgQ2FyZXMgQ1NSPC90ZXh0Pgo8L3N2Zz4=" alt="CSR Program">
                    <p><strong>Eagle Cares</strong><br>Program CSR untuk UMKM</p>
                </div>
            </div>
            
            <h3 style="margin-top: 40px;">Daftar Klien</h3>
            <p>Kami bangga telah dipercaya oleh berbagai perusahaan terkemuka di Indonesia:</p>
            <div class="clients-grid">
                <div class="client-card">
                    <h4>PT. Garuda Indonesia</h4>
                    <p>Maskapai Penerbangan Nasional</p>
                    <small>Klien sejak 2020</small>
                </div>
                <div class="client-card">
                    <h4>Bank Mandiri</h4>
                    <p>Perbankan</p>
                    <small>Klien sejak 2019</small>
                </div>
                <div class="client-card">
                    <h4>Pertamina</h4>
                    <p>Energi & Migas</p>
                    <small>Klien sejak 2021</small>
                </div>
                <div class="client-card">
                    <h4>Telkom Indonesia</h4>
                    <p>Telekomunikasi</p>
                    <small>Klien sejak 2018</small>
                </div>
                <div class="client-card">
                    <h4>Astra International</h4>
                    <p>Otomotif & Jasa</p>
                    <small>Klien sejak 2022</small>
                </div>
                <div class="client-card">
                    <h4>Unilever Indonesia</h4>
                    <p>Consumer Goods</p>
                    <small>Klien sejak 2020</small>
                </div>
            </div>
        </div>

        <!-- Kontak Section -->
        <div id="kontak" class="section">
            <h2>Kontak Kami</h2>
            <div class="contact-info">
                <p><strong>Alamat:</strong> Jl. Kapten Muslim No. 45, Medan 20123, Sumatera Utara</p>
                <p><strong>No. Telepon:</strong> (+62) 897-8735-030</p>
                <p><strong>Email:</strong> Eaglecompany@gmail.com</p>
                <p><strong>Jam Operasional:</strong> Senin - Jumat, 08:00 - 17:00 WIB</p>
                <p><strong>Website:</strong> www.eaglecompany.co.id</p>
                
                <h3 style="margin-top: 30px;">Kantor Cabang:</h3>
                <ul style="margin-left: 20px; margin-top: 10px;">
                    <li><strong>Jakarta:</strong> Jl. Sudirman Kav. 52-53, Jakarta 12190</li>
                    <li><strong>Surabaya:</strong> Jl. Basuki Rahmat 123, Surabaya 60271</li>
                </ul>
            </div>
        </div>

        <!-- About Us Section -->
        <div id="about" class="section">
            <h2>Tentang Kami</h2>
            <div class="about-content">
                <p>EAGLE COMPANY adalah perusahaan konsultan bisnis dan teknologi yang didirikan dengan visi untuk membantu perusahaan-perusahaan di Indonesia mencapai potensi maksimal mereka. Nama "EAGLE" dipilih sebagai simbol dari ketajaman visi, kekuatan, dan kemampuan untuk melihat peluang dari perspektif yang lebih luas.</p>
                
                <p style="margin-top: 15px;">Seperti burung elang yang terbang tinggi dan memiliki penglihatan tajam, kami membantu klien melihat gambaran besar bisnis mereka dan mengidentifikasi peluang-peluang yang mungkin terlewatkan. Dengan sayap yang kuat, kami mendampingi klien untuk mencapai target bisnis yang ambisius namun realistis.</p>
                
                <h3>Nilai-Nilai Perusahaan</h3>
                <div class="services-grid" style="margin-top: 15px;">
                    <div class="service-card">
                        <h4>🎯 Excellence</h4>
                        <p>Komitmen untuk selalu memberikan hasil terbaik dalam setiap proyek yang kami tangani.</p>
                    </div>
                    <div class="service-card">
                        <h4>🤝 Integrity</h4>
                        <p>Menjunjung tinggi etika bisnis dan transparansi dalam setiap interaksi dengan klien.</p>
                    </div>
                    <div class="service-card">
                        <h4>💡 Innovation</h4>
                        <p>Terus berinovasi dan mengadopsi teknologi terbaru untuk solusi yang lebih efektif.</p>
                    </div>
                    <div class="service-card">
                        <h4>🌱 Growth</h4>
                        <p>Mendorong pertumbuhan berkelanjutan baik untuk klien maupun tim internal kami.</p>
                    </div>
                </div>
                
                <h3 style="margin-top: 30px;">Tim Kepemimpinan</h3>
                <p>EAGLE COMPANY dipimpin oleh para profesional berpengalaman dengan track record yang terbukti di industri konsultan:</p>
                <ul style="margin-left: 20px; margin-top: 10px; line-height: 1.8;">
                    <li><strong>Direktur Utama:</strong> Dr. Ahmad Wijaya, MBA - 20 tahun pengalaman di McKinsey & Company</li>
                    <li><strong>Direktur Operasional:</strong> Ir. Sarah Kusuma, MM - Ex-COO Accenture Indonesia</li>
                    <li><strong>Direktur Teknologi:</strong> William Tanoto, M.Sc - Ex-CTO Microsoft Indonesia</li>
                    <li><strong>Direktur Keuangan:</strong> Dra. Maria Santoso, CPA - 15 tahun di PwC Indonesia</li>
                </ul>
                
                <p style="margin-top: 20px;">Dengan dukungan lebih dari 100 konsultan profesional yang tersebar di 3 kota besar, EAGLE COMPANY siap menjadi mitra strategis Anda dalam menghadapi tantangan bisnis di era modern ini.</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 EAGLE COMPANY - Excellence Above All. All rights reserved.</p>
        <p style="margin-top: 10px;">Designed with passion by WAHYU BIMA PUTRA</p>
    </footer>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeLoginModal()">&times;</span>
            <h2 style="text-align: center; margin-bottom: 30px; color: #1a1a2e;">Sign In</h2>
            <div id="loginAlert" class="alert"></div>
            <form id="loginForm">
                <div class="form-group">
                    <label>Username atau Email</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="btn-submit">Sign In</button>
            </form>
        </div>
    </div>

    <!-- Signup Modal -->
    <div id="signupModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeSignupModal()">&times;</span>
            <h2 style="text-align: center; margin-bottom: 30px; color: #1a1a2e;">Sign Up</h2>
            <div id="signupAlert" class="alert"></div>
            <form id="signupForm">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="full_name" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="btn-submit">Sign Up</button>
            </form>
        </div>
    </div>

    <script>
        // Show/Hide Sections
        function showSection(sectionId) {
            // Hide all sections
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.classList.remove('active');
            });
            
            // Show selected section
            const targetSection = document.getElementById(sectionId);
            if (targetSection) {
                targetSection.classList.add('active');
            }
        }

        // Modal Functions
        function openLoginModal() {
            document.getElementById('loginModal').style.display = 'block';
        }

        function closeLoginModal() {
            document.getElementById('loginModal').style.display = 'none';
            document.getElementById('loginAlert').style.display = 'none';
        }

        function openSignupModal() {
            document.getElementById('signupModal').style.display = 'block';
        }

        function closeSignupModal() {
            document.getElementById('signupModal').style.display = 'none';
            document.getElementById('signupAlert').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const loginModal = document.getElementById('loginModal');
            const signupModal = document.getElementById('signupModal');
            if (event.target == loginModal) {
                closeLoginModal();
            }
            if (event.target == signupModal) {
                closeSignupModal();
            }
        }

        // Login Form Handler
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            try {
                const response = await fetch('login.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                const alertDiv = document.getElementById('loginAlert');
                
                if (result.success) {
                    alertDiv.className = 'alert alert-success';
                    alertDiv.textContent = result.message;
                    alertDiv.style.display = 'block';
                    
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    alertDiv.className = 'alert alert-error';
                    alertDiv.textContent = result.message;
                    alertDiv.style.display = 'block';
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });

        // Signup Form Handler
        document.getElementById('signupForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            try {
                const response = await fetch('register.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                const alertDiv = document.getElementById('signupAlert');
                
                if (result.success) {
                    alertDiv.className = 'alert alert-success';
                    alertDiv.textContent = result.message;
                    alertDiv.style.display = 'block';
                    
                    setTimeout(() => {
                        closeSignupModal();
                        openLoginModal();
                    }, 2000);
                } else {
                    alertDiv.className = 'alert alert-error';
                    alertDiv.textContent = result.message;
                    alertDiv.style.display = 'block';
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    </script>
</body>
</html>