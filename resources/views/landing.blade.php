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
        }

        header {
            background: #fff;
            padding: 1rem 5%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            padding: 4rem 5%;
            align-items: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            color: #666;
            margin-bottom: 2rem;
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
        }

        .hero-image {
            background: #ddd;
            height: 300px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #999;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            padding: 3rem 5%;
            background: #f5f5f5;
        }

        .stat-card {
            text-align: center;
        }

        .stat-card h3 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .stat-card p {
            color: #666;
            font-size: 0.9rem;
        }

        .section {
            padding: 4rem 5%;
        }

        .section-title {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 3rem;
        }

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
        }

        .card-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .card h3 {
            margin-bottom: 1rem;
        }

        .card p {
            color: #666;
            font-size: 0.9rem;
        }

        .cerita-section {
            background: #fff;
            padding: 3rem 5%;
        }

        .cerita-card {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
            margin-bottom: 2rem;
            align-items: center;
        }

        .cerita-image {
            background: #ddd;
            height: 200px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #999;
        }

        .benefit-list {
            list-style: none;
            padding: 2rem 0;
        }

        .benefit-list li {
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
        }

        .benefit-list li:before {
            content: "●";
            margin-right: 1rem;
            color: #000;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin: 3rem 0;
        }

        .content-image {
            background: #ddd;
            height: 250px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #999;
        }

        .wisataya-section {
            background: #f5f5f5;
            padding: 3rem 5%;
        }

        .wisataya-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-top: 2rem;
        }

        .wisataya-card {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
        }

        .wisataya-card h4 {
            margin-bottom: 0.5rem;
        }

        .wisataya-card .price {
            color: #666;
            margin-bottom: 1rem;
        }

        .testimonials {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
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
            background: #ddd;
            border-radius: 50%;
            margin-bottom: 1rem;
        }

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
        }

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
        }

        .newsletter {
            background: #666;
            color: #fff;
            padding: 3rem 5%;
            text-align: center;
        }

        .newsletter h2 {
            margin-bottom: 2rem;
        }

        .newsletter-form {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .newsletter-form input {
            padding: 1rem;
            border: none;
            border-radius: 5px;
            min-width: 250px;
        }

        .btn-secondary {
            background: transparent;
            border: 2px solid #fff;
            color: #fff;
            padding: 1rem 2rem;
            border-radius: 5px;
            cursor: pointer;
        }

        footer {
            background: #333;
            color: #fff;
            padding: 3rem 5%;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
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
        }

        .footer-bottom {
            border-top: 1px solid #555;
            padding-top: 2rem;
            text-align: center;
            color: #aaa;
        }

        .parent {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(5, 1fr);
            gap: 8px;
            height: 600px;
            width: 100%;
        }

        .activity-card {
            background: #ddd;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #666;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .activity-card:hover {
            transform: scale(1.02);
        }

        .card-label {
            background: rgba(255, 255, 255, 0.9);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-weight: bold;
        }

        .div1 {
            grid-column: span 3 / span 3;
            grid-row: span 3 / span 3;
        }

        .div2 {
            grid-row: span 3 / span 3;
            grid-column-start: 4;
        }

        .div4 {
            grid-column: span 2 / span 2;
            grid-row: span 2 / span 2;
            grid-column-start: 1;
            grid-row-start: 4;
        }

        .div5 {
            grid-column: span 2 / span 2;
            grid-row: span 2 / span 2;
            grid-column-start: 3;
            grid-row-start: 4;
        }

        .div6 {
            grid-row: span 2 / span 2;
            grid-column-start: 5;
            grid-row-start: 1;
        }

        .div7 {
            grid-row: span 3 / span 3;
            grid-column-start: 5;
            grid-row-start: 3;
        }

        @media (max-width: 768px) {
            .hero, .content-grid, .testimonials, .footer-content {
                grid-template-columns: 1fr;
            }

            .stats, .cards-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .wisataya-grid {
                grid-template-columns: 1fr;
            }

            nav {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">📚 Belajar Land</div>
        <nav>
            <a href="#home">Home</a>
            <a href="#artikel">Artikel</a>
            <a href="#learning">Learning</a>
            <a href="#" class="btn-masuk">Masuk</a>
        </nav>
    </header>

    <section class="hero">
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

    <section class="section">
        <div class="content-grid">
            <div class="content-image">📸</div>
            <div>
                <h3>Nama</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
        </div>

        <div class="content-grid">
            <div>
                <h3>Nama</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="content-image">📸</div>
        </div>

        <div class="content-grid">
            <div class="content-image">📸</div>
            <div>
                <h3>Nama</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
        </div>

        <a href="#" class="btn-primary">Pelajari Lainnya</a>
    </section>

    <section class="section">
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
        <h2 class="section-title">Mari Selesaikan Bersatu, Gemini Dimulai dari Sini</h2>
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
        <h2 class="section-title">Apa yang Dikatakan Para Pemaian</h2>
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
            <span>FORUM</span>
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
</body>
</html>
