<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Kewirausahaan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        /* Header */
        header {
            background: #fff;
            padding: 1rem 5%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 1.2rem;
            font-weight: bold;
        }

        nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #666;
        }

        .btn-masuk {
            background: #000;
            color: #fff;
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 4px;
        }

        .menu-toggle span {
            width: 25px;
            height: 3px;
            background: #333;
            transition: 0.3s;
        }

        /* Hero Section */
        .hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            padding: 4rem 5%;
            align-items: center;
        }

        .hero h1 {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero p {
            color: #666;
            margin-bottom: 2rem;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .btn-primary {
            background: #000;
            color: #fff;
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background: #333;
        }

        .hero-image {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 300px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
        }

        /* Stats Section */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            padding: 3rem 5%;
            background: #f5f5f5;
        }

        .stat-card {
            text-align: center;
            padding: 1rem;
        }

        .stat-card h3 {
            font-size: clamp(1.5rem, 3vw, 2rem);
            margin-bottom: 0.5rem;
            color: #000;
        }

        .stat-card p {
            color: #666;
            font-size: clamp(0.85rem, 1.5vw, 0.9rem);
        }

        /* Section Styles */
        .section {
            padding: 4rem 5%;
        }

        .section-title {
            font-size: clamp(1.5rem, 3vw, 2rem);
            text-align: center;
            margin-bottom: 3rem;
            line-height: 1.3;
        }

        /* Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .card {
            background: #f5f5f5;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .card-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .card h3 {
            margin-bottom: 1rem;
            font-size: clamp(1.1rem, 2vw, 1.3rem);
        }

        .card p {
            color: #666;
            font-size: clamp(0.85rem, 1.5vw, 0.9rem);
        }

        /* Cerita Section */
        .cerita-section {
            background: #fff;
            padding: 3rem 5%;
        }

        .cerita-card {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
            align-items: center;
        }

        .cerita-image {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            height: 200px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }

        /* Benefit List */
        .benefit-list {
            list-style: none;
            padding: 2rem 0;
            max-width: 800px;
            margin: 0 auto;
        }

        .benefit-list li {
            padding: 1.5rem;
            border-bottom: 1px solid #eee;
            transition: background 0.3s;
        }

        .benefit-list li:hover {
            background: #f9f9f9;
        }

        .benefit-list li:before {
            content: "●";
            margin-right: 1rem;
            color: #000;
            font-size: 1.2rem;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin: 3rem 0;
            align-items: center;
        }

        .content-image {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            height: 250px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }

        /* Activity Grid */
        .parent {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(5, 1fr);
            gap: 8px;
            height: 600px;
            width: 100%;
        }

        .activity-card {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #333;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s;
            cursor: pointer;
        }

        .activity-card:hover {
            transform: scale(1.05);
        }

        .card-label {
            background: rgba(255, 255, 255, 0.9);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-weight: bold;
        }

        .div1 { grid-area: 1 / 1 / 4 / 4; }
        .div2 { grid-area: 1 / 4 / 4 / 5; }
        .div4 { grid-area: 4 / 1 / 6 / 3; }
        .div5 { grid-area: 4 / 3 / 6 / 5; }
        .div6 { grid-area: 1 / 5 / 3 / 6; }
        .div7 { grid-area: 3 / 5 / 6 / 6; }

        /* Wisataya Section */
        .wisataya-section {
            background: #f5f5f5;
            padding: 3rem 5%;
        }

        .wisataya-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .wisataya-card {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .wisataya-card:hover {
            transform: translateY(-5px);
        }

        .wisataya-card h4 {
            margin-bottom: 0.5rem;
        }

        .wisataya-card .price {
            color: #666;
            margin-bottom: 1rem;
            font-size: 1.2rem;
            font-weight: bold;
        }

        /* Testimonials */
        .testimonials {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .testimonial-card {
            background: #f5f5f5;
            padding: 2rem;
            border-radius: 10px;
        }

        .testimonial-card .avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            margin-bottom: 1rem;
        }

        /* FAQ Section */
        .faq-section {
            background: #fff;
            padding: 3rem 5%;
        }

        .faq-item {
            background: #f5f5f5;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .faq-item:hover {
            background: #e8e8e8;
        }

        /* Forum Section */
        .forum-section {
            padding: 3rem 5%;
        }

        .forum-category {
            background: #f5f5f5;
            padding: 1rem 2rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .forum-category:hover {
            background: #e8e8e8;
        }

        /* Newsletter */
        .newsletter {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            padding: 3rem 5%;
            text-align: center;
        }

        .newsletter h2 {
            margin-bottom: 1rem;
            font-size: clamp(1.5rem, 3vw, 2rem);
        }

        .newsletter p {
            margin-bottom: 2rem;
        }

        .newsletter-form {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter-form input {
            padding: 1rem;
            border: none;
            border-radius: 5px;
            flex: 1;
            min-width: 250px;
        }

        .btn-secondary {
            background: transparent;
            border: 2px solid #fff;
            color: #fff;
            padding: 1rem 2rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        .btn-secondary:hover {
            background: #fff;
            color: #667eea;
        }

        /* Footer */
        footer {
            background: #333;
            color: #fff;
            padding: 3rem 5%;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-content h4 {
            margin-bottom: 1rem;
        }

        .footer-content a {
            color: #aaa;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s;
        }

        .footer-content a:hover {
            color: #fff;
        }

        .footer-bottom {
            border-top: 1px solid #555;
            padding-top: 2rem;
            text-align: center;
            color: #aaa;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero, .content-grid, .cerita-card {
                grid-template-columns: 1fr;
            }

            .parent {
                height: 400px;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 1rem 4%;
            }

            .menu-toggle {
                display: flex;
            }

            nav {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #fff;
                flex-direction: column;
                gap: 0;
                padding: 1rem 0;
                box-shadow: 0 5px 10px rgba(0,0,0,0.1);
                display: none;
            }

            nav.active {
                display: flex;
            }

            nav a {
                padding: 1rem 4%;
                width: 100%;
                border-bottom: 1px solid #f0f0f0;
            }

            .hero, .content-grid, .cerita-card {
                gap: 2rem;
            }

            .section {
                padding: 3rem 4%;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }

            .cards-grid {
                grid-template-columns: 1fr;
            }

            .parent {
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: repeat(6, 1fr);
                height: 500px;
            }

            .div1 { grid-area: 1 / 1 / 3 / 3; }
            .div2 { grid-area: 3 / 1 / 5 / 2; }
            .div4 { grid-area: 3 / 2 / 5 / 3; }
            .div5 { grid-area: 5 / 1 / 7 / 2; }
            .div6 { grid-area: 5 / 2 / 6 / 3; }
            .div7 { grid-area: 6 / 2 / 7 / 3; }

            .newsletter-form {
                flex-direction: column;
                align-items: stretch;
            }

            .newsletter-form input,
            .newsletter-form button {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .section {
                padding: 2rem 4%;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .hero-image, .cerita-image, .content-image {
                height: 200px;
            }

            .parent {
                height: 400px;
            }

            .card, .wisataya-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">📚 Belajar Land</div>
        <div class="menu-toggle" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav id="mainNav">
            <a href="#home">Home</a>
            <a href="#artikel">Artikel</a>
            <a href="#learning">Learning</a>
            <a href="#" class="btn-masuk">Masuk</a>
        </nav>
    </header>

    <section class="hero" id="home">
        <div>
            <h1>Belajar Kewirausahaan Dengan Bermain</h1>
            <p>Mari ikut dalam game bersama dengan pemain di seluruh dunia untuk meningkatkan kreatifitas kewirausahaan kamu dalam industri pariwisata indonesia.</p>
            <a href="#" class="btn-primary">Pelajari Sekarang</a>
        </div>
        <div class="hero-image">🎮</div>
    </section>

    <section class="stats">
        <div class="stat-card">
            <h3>45%</h3>
            <p>Pembelajaran oleh ahli professional yang berpengalaman</p>
        </div>
        <div class="stat-card">
            <h3>80+</h3>
            <p>Memiliki materi yang lengkap dan mudah dipahami</p>
        </div>
        <div class="stat-card">
            <h3>80%</h3>
            <p>Belajar dengan lebih seru dan menyenangkan</p>
        </div>
        <div class="stat-card">
            <h3>35%</h3>
            <p>Sertifikat yang diakui kementrian pariwisata</p>
        </div>
    </section>

    <section class="cerita-section">
        <div class="cerita-card">
            <div class="cerita-image">📖</div>
            <div>
                <h2>Cerita di Balik Zambiboard</h2>
                <p>Lorem Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="cards-grid">
            <div class="card">
                <div class="card-icon">💡</div>
                <h3>Mudah</h3>
                <p>Materi yang mudah dipahami untuk pemula</p>
            </div>
            <div class="card">
                <div class="card-icon">🎯</div>
                <h3>Aplikatif</h3>
                <p>Dapat langsung dipraktekkan dalam kehidupan nyata</p>
            </div>
            <div class="card">
                <div class="card-icon">🏆</div>
                <h3>Tepat</h3>
                <p>Sesuai dengan kebutuhan industri saat ini</p>
            </div>
        </div>
    </section>

    <section class="section">
        <h2 class="section-title">Mengapa Belajar Kewirausahaan Melalui Permainan Papan?</h2>
        <ul class="benefit-list">
            <li>
                <strong>Membantu Belajar Aplikatif</strong><br>
                <span style="color: #666;">Pembelajaran melalui permainan membantu siswa memahami konsep dengan lebih baik</span>
            </li>
            <li>
                <strong>Tidak Bikin Jenuh</strong><br>
                <span style="color: #666;">Metode belajar yang menyenangkan dan tidak membosankan</span>
            </li>
            <li>
                <strong>Melatih Kemampuan Adaptasi</strong><br>
                <span style="color: #666;">Meningkatkan kemampuan beradaptasi dengan situasi bisnis yang berbeda</span>
            </li>
        </ul>
    </section>

    <section class="section">
        <h2 class="section-title">Kemampuan yang Akan Anda Dapatkan</h2>
        <div class="cards-grid">
            <div class="card">
                <div class="card-icon">💼</div>
                <h3>Pengetahuan Wirausaha</h3>
                <p>Memahami dasar-dasar kewirausahaan</p>
            </div>
            <div class="card">
                <div class="card-icon">📊</div>
                <h3>Manajemen</h3>
                <p>Kemampuan mengelola bisnis dengan baik</p>
            </div>
            <div class="card">
                <div class="card-icon">🎨</div>
                <h3>Kreativitas Inovatif</h3>
                <p>Mengembangkan ide-ide kreatif dan inovatif</p>
            </div>
            <div class="card">
                <div class="card-icon">💰</div>
                <h3>Analisis Keuangan</h3>
                <p>Memahami dan mengelola keuangan bisnis</p>
            </div>
        </div>
    </section>

    <section class="section" id="artikel">
        <div class="content-grid">
            <div class="content-image">📸</div>
            <div>
                <h3>Artikel Terbaru</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>

        <div class="content-grid">
            <div>
                <h3>Tutorial Lengkap</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="content-image">📸</div>
        </div>

        <div class="content-grid">
            <div class="content-image">📸</div>
            <div>
                <h3>Panduan Praktis</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>

        <a href="#" class="btn-primary">Pelajari Lainnya</a>
    </section>

    <section class="section" id="learning">
        <h2 class="section-title">Aktivitas Terbaru & Tutorial</h2>
        <p style="text-align: center; color: #666; margin-bottom: 2rem;">Berbagi pengetahuan dan keterampilan dengan instruktur berpengalaman!</p>
        <div class="parent">
            <div class="div1 activity-card">
                <span class="card-label">Tutorial</span>
            </div>
            <div class="div2 activity-card">
                <span class="card-label">Artikel</span>
            </div>
            <div class="div4 activity-card">
                <span class="card-label">Video</span>
            </div>
            <div class="div5 activity-card">
                <span class="card-label">Panduan</span>
            </div>
            <div class="div6 activity-card">
                <span class="card-label">Tips</span>
            </div>
            <div class="div7 activity-card">
                <span class="card-label">Kursus</span>
            </div>
        </div>
    </section>

    <section class="wisataya-section">
        <h2 class="section-title">Mari Selesaikan Bersama, Dimulai dari Sini</h2>
        <p style="text-align: center; color: #666; margin-bottom: 2rem;">Kami menawarkan berbagai pilihan wisata untuk Anda</p>
        <div class="wisataya-grid">
            <div class="wisataya-card">
                <div class="card-icon">🏝️</div>
                <h4>Wisataya Land</h4>
                <p class="price">Rp 250.000</p>
                <p>Pengalaman wisata yang tak terlupakan dengan pemandangan indah</p>
                <a href="#" class="btn-primary">Selengkapnya</a>
            </div>
            <div class="wisataya-card">
                <div class="card-icon">🏢</div>
                <h4>Wisataya Building</h4>
                <p class="price">Rp 350.000</p>
                <p>Jelajahi gedung-gedung bersejarah dengan pemandu profesional</p>
                <a href="#" class="btn-primary">Selengkapnya</a>
            </div>
        </div>
    </section>

    <section class="section">
        <h2 class="section-title">Apa yang Dikatakan Para Pemain</h2>
        <div class="testimonials">
            <div class="testimonial-card">
                <div class="avatar"></div>
                <h4>Nama Pelanggan</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pengalaman yang sangat menyenangkan!</p>
            </div>
            <div class="testimonial-card">
                <div class="avatar"></div>
                <h4>Nama Pelanggan</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sangat membantu dalam belajar!</p>
            </div>
            <div class="testimonial-card">
                <div class="avatar"></div>
                <h4>Nama Pelanggan</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Materi yang mudah dipahami!</p>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <h2 class="section-title">Frequently Asked Questions</h2>
        <div class="faq-item">
            <strong>Dimana cara dapat melakukan user login?</strong>
        </div>
        <div class="faq-item">
            <strong>Apakah saya dapat memiliki akses selamanya?</strong>
        </div>
        <div class="faq-item">
            <strong>Lalu bagaimana cara saya membuat akun untuk akses ini?</strong>
        </div>
        <div class="faq-item">
            <strong>Apa keuntungan saya?</strong>
        </div>
        <div class="faq-item">
            <strong>Apakah saya bisa memilih level dari akses ini?</strong>
        </div>
    </section>

    <section class="forum-section">
        <h2 class="section-title">Forum Terbuka untuk Tanya, Saran, dan Insight</h2>
        <p style="text-align: center; color: #666; margin-bottom: 2rem;">Forum ini terbuka untuk semua member yang sudah terdaftar</p>
        <div class="forum-category">
            <span>Tanya seputaran kelas dengan pengajar</span>
            <span>→</span>
        </div>
        <div class="forum-category">
            <span>Forum Diskusi Umum</span>
            <span>→</span>
        </div>
        <div class="forum-category">
            <span>Tempat berdiskusi</span>
            <span>→</span>
        </div>

        <div class="testimonials" style="margin-top: 3rem;">
            <div class="testimonial-card">
                <div class="avatar"></div>
                <h4>Nama Pelanggan</h4>
                <p>Testimoni dari pengguna yang puas dengan layanan kami</p>
            </div>
            <div class="testimonial-card">
                <div class="avatar"></div>
                <h4>Nama Pelanggan</h4>
                <p>Pengalaman belajar yang menyenangkan dan bermanfaat</p>
            </div>
            <div class="testimonial-card">
                <div class="avatar"></div>
                <h4>Nama Pelanggan</h4>
                <p>Materi yang lengkap dan mudah dipahami untuk pemula</p>
            </div>
        </div>
    </section>

    <section class="newsletter">
        <h2>Siap untuk mengajarkan pengetahuan belajar Anda?</h2>
        <p>Bergabung dengan ratusan pelanggan yang sudah mengembangkan keterampilan mereka dengan kami.</p>
        <div class="newsletter-form">
            <input type="email" placeholder="Masukkan email Anda">
            <button class="btn-primary">Email saya</button>
            <button class="btn-secondary">Hubungi kami</button>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div>
                <h4>📚 Belajar Land</h4>
                <p>Platform pembelajaran kewirausahaan terbaik di Indonesia untuk mengembangkan kemampuan bisnis Anda.</p>
            </div>
            <div>
                <h4>Produk</h4>
                <a href="#">Kursus</a>
                <a href="#">Tutorial</a>
                <a href="#">Sertifikat</a>
            </div>
            <div>
                <h4>Support</h4>
                <a href="#">FAQ</a>
                <a href="#">Kontak</a>
                <a href="#">Bantuan</a>
            </div>
        </div>
        <div class="footer-content">
            <div>
                <h4>Developer</h4>
                <a href="#">API</a>
                <a href="#">Dokumentasi</a>
            </div>
            <div>
                <h4>Ikuti Kami di Social</h4>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">Twitter</a>
            </div>
            <div></div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 BelajarLand.Inc. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            const nav = document.getElementById('mainNav');
            nav.classList.toggle('active');
        }

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const nav = document.getElementById('mainNav');
            const menuToggle = document.querySelector('.menu-toggle');

            if (!nav.contains(event.target) && !menuToggle.contains(event.target)) {
                nav.classList.remove('active');
            }
        });

        // Close menu when clicking a link
        document.querySelectorAll('nav a').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('mainNav').classList.remove('active');
            });
        });
    </script>
</body>
</html>
