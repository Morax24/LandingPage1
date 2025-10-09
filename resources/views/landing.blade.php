<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malaya Land - Belajar Kewirausahaan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        /* Header */
        header {
            background: #d4f1f4;
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .logo-box {
            background: #333;
            color: #fff;
            padding: 0.3rem 0.5rem;
            font-size: 0.8rem;
            border-radius: 3px;
        }

        nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: #333;
            transition: all 0.3s;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        nav a:hover {
            color: #666;
        }

        nav a.active {
            background: #f7e92b;
            color: #333;
            font-weight: bold;
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
            border-radius: 2px;
        }

        .btn-kickstarter {
            background: transparent;
            color: #333;
            padding: 0.6rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #333;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-kickstarter:hover {
            background: #333;
            color: #fff;
        }

        .btn-kickstarter.active {
            background: #f7e92b;
            color: #333;
            border-color: #f7e92b;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(to bottom, #d4f1f4 0%, #d4f1f4 60%, #a8d5a8 100%);
            padding: 4rem 5% 8rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -100px;
            width: 400px;
            height: 200px;
            background: #a8d5a8;
            border-radius: 50%;
            opacity: 0.5;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: #f7e92b;
            border-radius: 50%;
            z-index: 1;
            opacity: 0.3;
        }

        .hero-content {
            z-index: 2;
            position: relative;
        }

        .hero h1 {
            font-size: clamp(2rem, 4vw, 2.8rem);
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero p {
            color: #555;
            margin-bottom: 2rem;
            max-width: 500px;
            line-height: 1.8;
        }

        .btn-primary {
            background: #f7e92b;
            color: #333;
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .hero-image {
            z-index: 2;
            position: relative;
        }

        .board-placeholder {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 400px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: rotateX(20deg) rotateY(-10deg);
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }

        /* Stats Section */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            padding: 3rem 5%;
            background: #f5f5f5;
        }

        .stat-card {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .stat-card h3 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            color: #667eea;
        }

        .stat-card p {
            color: #666;
            font-size: 0.9rem;
        }

        /* Story Section */
        .story-section {
            padding: 4rem 5%;
            background: #fff;
        }

        .story-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 3rem;
            align-items: center;
            margin-bottom: 3rem;
        }

        .story-image {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            height: 300px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 4rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .story-badge {
            background: #667eea;
            color: #fff;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 1rem;
            font-size: 0.85rem;
        }

        .story-content h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .story-content p {
            color: #666;
            line-height: 1.8;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: #f9f9f9;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        /* Why Learn Section */
        .why-learn {
            padding: 4rem 5%;
            background: #f9f9f9;
        }

        .why-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 3rem;
            align-items: start;
        }

        .why-image {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 400px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 4rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .why-content h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .why-list {
            list-style: none;
        }

        .why-list li {
            padding: 1.5rem 0;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: start;
            gap: 1rem;
        }

        .why-list li:last-child {
            border-bottom: none;
        }

        .why-list li::before {
            content: "●";
            font-size: 1.5rem;
            flex-shrink: 0;
            color: #667eea;
        }

        .why-list strong {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        /* Skills Section */
        .skills-section {
            padding: 4rem 5%;
            background: #fff;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 3rem;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .skill-card {
            background: #f9f9f9;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .skill-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        /* Pricing Section */
        .pricing-section {
            padding: 4rem 5%;
            background: #d4f1f4;
        }

        .pricing-badge {
            background: #667eea;
            color: #fff;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 1rem;
            font-size: 0.85rem;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-top: 2rem;
        }

        .pricing-card {
            background: #fff;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
        }

        .pricing-card h3 {
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
        }

        .pricing-card .price {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #667eea;
        }

        .pricing-card ul {
            list-style: none;
            margin: 1.5rem 0;
        }

        .pricing-card ul li {
            padding: 0.5rem 0;
            color: #666;
        }

        .pricing-card ul li::before {
            content: "✓ ";
            margin-right: 0.5rem;
            color: #667eea;
            font-weight: bold;
        }

        /* Testimonial Section */
        .testimonial-section {
            padding: 4rem 5%;
            background: #f5f5f5;
        }

        .testimonial-badge {
            background: #667eea;
            color: #fff;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 1rem;
            font-size: 0.85rem;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 2rem;
        }

        .testimonial-card {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
        }

        .testimonial-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .testimonial-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .testimonial-card h4 {
            font-size: 1rem;
        }

        .testimonial-card p {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        /* FAQ Section */
        .faq-section {
            padding: 4rem 5%;
            background: #fff;
        }

        .faq-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .faq-item {
            background: #f9f9f9;
            padding: 1.5rem 2rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.3s;
        }

        .faq-item:hover {
            background: #f0f0f0;
        }

        .faq-item::after {
            content: "+";
            font-size: 1.5rem;
            color: #667eea;
        }

        /* Contact Section */
        .contact-section {
            padding: 4rem 5%;
            background: #f9f9f9;
        }

        .contact-badge {
            background: #667eea;
            color: #fff;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 1rem;
            font-size: 0.85rem;
        }

        .contact-form {
            background: #fff;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            max-width: 600px;
            margin: 2rem auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            border: 1px solid #ddd;
            padding: 1rem;
            font-family: inherit;
            outline: none;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #667eea;
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-submit {
            text-align: center;
        }

        .btn-submit {
            background: #667eea;
            color: #fff;
            padding: 1rem 3rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background: #5568d3;
        }

        /* Newsletter */
        .newsletter {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            padding: 4rem 5%;
            text-align: center;
        }

        .newsletter h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .newsletter p {
            margin-bottom: 2rem;
            color: rgba(255,255,255,0.9);
        }

        .newsletter-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .newsletter-buttons button {
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.3s;
        }

        .newsletter-buttons button:first-child {
            background: #fff;
            color: #333;
        }

        .newsletter-buttons button:last-child {
            background: transparent;
            border: 2px solid #fff;
            color: #fff;
        }

        .newsletter-buttons button:hover {
            transform: translateY(-2px);
        }

        /* Footer */
        footer {
            background: #2c3e50;
            color: #fff;
            padding: 3rem 5%;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-content h4 {
            margin-bottom: 1rem;
        }

        .footer-content p {
            color: #bdc3c7;
            line-height: 1.8;
        }

        .footer-content a {
            color: #bdc3c7;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s;
        }

        .footer-content a:hover {
            color: #fff;
        }

        .footer-flags {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .footer-flags span {
            font-size: 1.5rem;
        }

        .footer-bottom {
            border-top: 1px solid #34495e;
            padding-top: 2rem;
            text-align: center;
            color: #bdc3c7;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .skills-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .testimonial-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 1024px) {
            .hero, .story-grid, .why-grid {
                grid-template-columns: 1fr;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .board-placeholder {
                height: 300px;
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
                background: #d4f1f4;
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
                border-bottom: 1px solid rgba(0,0,0,0.05);
            }

            .hero {
                padding: 3rem 4% 5rem;
            }

            .features-grid, .skills-grid, .pricing-grid, .testimonial-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .board-placeholder {
                height: 250px;
                transform: rotateX(10deg) rotateY(-5deg);
            }

            .section-title {
                font-size: 1.5rem;
            }

            .hero::before {
                width: 200px;
                height: 200px;
            }
        }

        @media (max-width: 480px) {
            .hero {
                padding: 2rem 4% 4rem;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .board-placeholder {
                height: 200px;
            }

            .newsletter-buttons {
                flex-direction: column;
            }

            .newsletter-buttons button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <span class="logo-box">📚</span>
            <span>MALAYA LAND</span>
        </div>
        <div class="menu-toggle" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav id="mainNav">
            <a href="#home" class="nav-link active">About</a>
            <a href="#pricing" class="nav-link">Pricing</a>
            <a href="#testimonial" class="nav-link">Testimonial</a>
            <a href="#contact" class="btn-kickstarter nav-link">Contact</a>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Belajar Kewirausahaan Dengan Bermain</h1>
            <p>Sebuah permainan papan inovatif yang mengubah pembelajaran kewirausahaan menjadi pengalaman yang menarik, interaktif, dan dapat dipraktekkan.</p>
            <a href="#pricing" class="btn-primary">Dapatkan Sekarang</a>
        </div>
        <div class="hero-image">
            <div class="board-placeholder">
                <span style="font-size: 4rem;">🎲</span>
            </div>
        </div>
    </section>

    <section id="home" class="stats">
        <div class="stat-card">
            <h3>85%</h3>
            <p>Tingkat kepuasan pengguna</p>
        </div>
        <div class="stat-card">
            <h3>50+</h3>
            <p>Sekolah mitra di seluruh Indonesia</p>
        </div>
        <div class="stat-card">
            <h3>1000+</h3>
            <p>Siswa telah belajar</p>
        </div>
        <div class="stat-card">
            <h3>87%</h3>
            <p>Peningkatan pemahaman materi</p>
        </div>
    </section>

    <section id="about" class="story-section">
        <div class="story-grid">
            <div class="story-image">📖</div>
            <div class="story-content">
                <span class="story-badge">Highlight</span>
                <h2>Cerita di Balik GameBoard</h2>
                <p>Malaya Land diciptakan untuk menjawab tantangan pembelajaran kewirausahaan yang seringkali terasa teoritis dan membosankan. Kami percaya bahwa belajar melalui permainan dapat membuat konsep bisnis lebih mudah dipahami dan diingat. Dengan pendekatan yang interaktif dan menyenangkan, kami menghadirkan pengalaman belajar yang berbeda.</p>
            </div>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">💡</div>
                <h3>Inovatif</h3>
                <p>Metode pembelajaran yang menggabungkan teori dan praktik dalam satu pengalaman bermain yang menyenangkan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3>Kolaboratif</h3>
                <p>Mendorong kerja sama tim dan komunikasi efektif dalam menyelesaikan tantangan bisnis</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🏆</div>
                <h3>Aplikatif</h3>
                <p>Setiap permainan dirancang berdasarkan studi kasus nyata dari dunia bisnis dan pariwisata</p>
            </div>
        </div>
    </section>

    <section class="why-learn">
        <div class="why-grid">
            <div class="why-image">
                <span>🎓</span>
            </div>
            <div class="why-content">
                <h2>Mengapa Belajar Kewirausahaan Melalui Permainan Papan?</h2>
                <ul class="why-list">
                    <li>
                        <div>
                            <strong>Pengalaman Belajar Interaktif dan Praktis</strong>
                            <span style="color: #666;">Melalui permainan, siswa dapat langsung mempraktikkan konsep bisnis dalam situasi yang menyerupai dunia nyata, membuat pembelajaran lebih bermakna</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <strong>Real Case Scenario</strong>
                            <span style="color: #666;">Belajar membuat keputusan bisnis berdasarkan studi kasus nyata dari industri pariwisata dan kewirausahaan</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <strong>Belajar Kolaboratif</strong>
                            <span style="color: #666;">Bermain bersama teman mengajarkan pentingnya kerja sama, komunikasi, dan strategi bersama dalam mencapai tujuan bisnis</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="skills-section">
        <h2 class="section-title">Keterampilan yang Akan Anda Dapatkan</h2>
        <p class="section-subtitle">Kompetensi penting untuk sukses di dunia bisnis</p>
        <div class="skills-grid">
            <div class="skill-card">
                <div class="feature-icon">💼</div>
                <h3>Problem Solving</h3>
                <p>Mengidentifikasi masalah dan mencari solusi kreatif dalam berbagai situasi bisnis</p>
            </div>
            <div class="skill-card">
                <div class="feature-icon">📊</div>
                <h3>Kewirausahaan</h3>
                <p>Memahami dasar-dasar memulai dan mengelola bisnis dari perencanaan hingga eksekusi</p>
            </div>
            <div class="skill-card">
                <div class="feature-icon">💰</div>
                <h3>Literasi Keuangan</h3>
                <p>Mengelola anggaran, investasi, dan membuat keputusan finansial yang tepat</p>
            </div>
            <div class="skill-card">
                <div class="feature-icon">🎨</div>
                <h3>Berpikir Kreatif</h3>
                <p>Mengembangkan ide-ide inovatif dan strategi pemasaran yang efektif</p>
            </div>
        </div>
    </section>

    <section id="pricing" class="pricing-section">
        <span class="pricing-badge">Pricing</span>
        <h2 class="section-title">Mulai Belajar Sekarang</h2>
        <p class="section-subtitle">Pilih paket yang sesuai dengan kebutuhan Anda</p>
        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="feature-icon">🏝️</div>
                <h3>Malaya Land</h3>
                <p class="price">Rp 300.000</p>
                <p>Paket dasar untuk memulai perjalanan kewirausahaan Anda</p>
                <ul>
                    <li>1 set permainan Malaya Land</li>
                    <li>Buku panduan lengkap</li>
                    <li>Akses komunitas online</li>
                </ul>
                <button class="btn-primary">Dapatkan Sekarang</button>
            </div>
            <div class="pricing-card">
                <div class="feature-icon">🏢</div>
                <h3>Malaya Land Pro</h3>
                <p class="price">Rp 500.000</p>
                <p>Paket lengkap untuk institusi dan kelompok belajar</p>
                <ul>
                    <li>1 set permainan Malaya Land</li>
                    <li>Buku panduan lengkap</li>
                    <li>Akses komunitas online</li>
                    <li>Materi pembelajaran tambahan</li>
                    <li>Sertifikat digital</li>
                </ul>
                <button class="btn-primary">Dapatkan Sekarang</button>
            </div>
        </div>
    </section>

    <section id="testimonial" class="testimonial-section">
        <span class="testimonial-badge">Testimonial</span>
        <h2 class="section-title">Apa yang Dikatakan Para Pengguna</h2>
        <p class="section-subtitle">Pengalaman nyata dari pendidik dan pelajar</p>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">👩</div>
                    <div>
                        <h4>Sarah Johanes</h4>
                        <small style="color: #999;">Guru SMK</small>
                    </div>
                </div>
                <p>"Permainan ini telah membuka mata saya terhadap pembelajaran yang menyenangkan. Siswa menjadi lebih antusias dan mudah memahami konsep kewirausahaan dengan cara yang praktis."</p>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">👨</div>
                    <div>
                        <h4>Michael Chen</h4>
                        <small style="color: #999;">Mahasiswa</small>
                    </div>
                </div>
                <p>"Metode belajar paling asik untuk mendalami cara memulai dan mengelola bisnis pariwisata. Setiap putaran permainan memberikan insight baru yang bermanfaat."</p>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">👩</div>
                    <div>
                        <h4>Indy Budiarti</h4>
                        <small style="color: #999;">Entrepreneur</small>
                    </div>
                </div>
                <p>"Saya bukan saja bermain melainkan juga belajar strategi bisnis yang bisa diterapkan langsung. Game ini cocok untuk siapa saja yang ingin memulai usaha."</p>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <h2 class="faq-title">Pertanyaan yang Sering Diajukan</h2>
        <div class="faq-item">
            <span>Untuk siapa Malaya Land ini dirancang?</span>
        </div>
        <div class="faq-item">
            <span>Apakah ada panduan bermain yang disediakan?</span>
        </div>
        <div class="faq-item">
            <span>Berapa lama waktu yang dibutuhkan untuk satu sesi permainan?</span>
        </div>
        <div class="faq-item">
            <span>Berapa jumlah pemain yang ideal?</span>
        </div>
        <div class="faq-item">
            <span>Apakah cocok untuk semua tingkat pendidikan?</span>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <span class="contact-badge">Contact Us</span>
        <h2 class="section-title">Hubungi Kami</h2>
        <p class="section-subtitle">Punya pertanyaan? Kami siap membantu Anda</p>

        <div class="contact-form">
            <div class="form-group">
                <input type="text" placeholder="Nama Lengkap" required>
            </div>
            <div class="form-group">
                <input type="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="text" placeholder="Instansi / Sekolah">
            </div>
            <div class="form-group">
                <textarea placeholder="Pesan atau Pertanyaan Anda" required></textarea>
            </div>
            <div class="form-submit">
                <button class="btn-submit">Kirim Pesan</button>
            </div>
        </div>
    </section>

    <section class="newsletter">
        <h2>Siap untuk Mengubah Pengalaman Belajar Anda?</h2>
        <p>Bergabunglah dengan ratusan siswa dan pendidik yang telah menggunakan Malaya Land untuk meningkatkan pemahaman kewirausahaan mereka.</p>
        <div class="newsletter-buttons">
            <button onclick="location.href='#pricing'">Dapatkan Sekarang</button>
            <button onclick="location.href='#contact'">Hubungi Kami</button>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div>
                <h4>📚 Malaya Land</h4>
                <p>Malaya Land menghadirkan metode pembelajaran kewirausahaan yang inovatif melalui permainan papan edukatif. Kami berkomitmen untuk membuat pendidikan lebih menarik dan aplikatif.</p>
            </div>
            <div>
                <h4>Produk</h4>
                <a href="#about">Tentang Kami</a>
                <a href="#pricing">Harga</a>
            </div>
            <div>
                <h4>Dukungan</h4>
                <a href="#contact">Hubungi Kami</a>
                <a href="#faq">FAQ</a>
            </div>
            <div>
                <h4>Lokasi</h4>
                <p style="color: #bdc3c7; font-size: 0.9rem;">Indonesia</p>
                <div class="footer-flags">
                    <span>🇮🇩</span>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 Malaya Land. All rights reserved.</p>
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

            if (nav && menuToggle && !nav.contains(event.target) && !menuToggle.contains(event.target)) {
                nav.classList.remove('active');
            }
        });

        // Close menu when clicking a link
        document.querySelectorAll('#mainNav a').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('mainNav').classList.remove('active');
            });
        });

        // Smooth scroll offset for fixed header
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerOffset = 80;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active menu indicator based on scroll position
        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link');

        function updateActiveMenu() {
            let current = '';
            const scrollPosition = window.pageYOffset + 150;

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                const sectionId = section.getAttribute('id');

                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    current = sectionId;
                }
            });

            // Remove all active classes
            navLinks.forEach(link => {
                link.classList.remove('active');
            });

            // Add active class to current section link
            navLinks.forEach(link => {
                const href = link.getAttribute('href').substring(1);
                if (href === current) {
                    link.classList.add('active');
                }
            });

            // Default to home/about if at top
            if (scrollPosition < 100) {
                navLinks[0].classList.add('active');
            }
        }

        // Listen to scroll events
        window.addEventListener('scroll', updateActiveMenu);

        // Initial call
        updateActiveMenu();
    </script>
</body>
</html>
