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
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: bold;
        }

        .logo-box {
            background: #333;
            color: #fff;
            padding: 0.3rem 0.5rem;
            font-size: 0.8rem;
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

        .btn-kickstarter {
            background: #f7e92b;
            color: #333;
            padding: 0.6rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
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
            color: #666;
            margin-bottom: 2rem;
            max-width: 500px;
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
        }

        .hero-image {
            z-index: 2;
            position: relative;
        }

        .hero-image img {
            width: 100%;
            max-width: 500px;
            height: auto;
        }

        .game-board {
            width: 100%;
            height: auto;
            perspective: 1000px;
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
            padding: 1rem;
        }

        .stat-card h3 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
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
            background: #e0e0e0;
            height: 300px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 3rem;
        }

        .story-badge {
            background: #999;
            color: #fff;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 1rem;
            font-size: 0.85rem;
        }

        .story-content h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: #e8e8e8;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
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
            background: #e0e0e0;
            height: 400px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 3rem;
        }

        .why-content h2 {
            font-size: 1.8rem;
            margin-bottom: 2rem;
        }

        .why-list {
            list-style: none;
        }

        .why-list li {
            padding: 1rem 0;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: start;
            gap: 1rem;
        }

        .why-list li::before {
            content: "●";
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .why-list strong {
            display: block;
            margin-bottom: 0.3rem;
        }

        /* Skills Section */
        .skills-section {
            padding: 4rem 5%;
            background: #fff;
        }

        .section-title {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 3rem;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .skill-card {
            background: #e8e8e8;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
        }

        /* Article Section */
        .article-section {
            padding: 4rem 5%;
            background: #f5f5f5;
        }

        .article-badge {
            background: #999;
            color: #fff;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 2rem;
            font-size: 0.85rem;
        }

        .article-grid {
            display: grid;
            gap: 3rem;
        }

        .article-item {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
            align-items: center;
        }

        .article-item:nth-child(even) {
            grid-template-columns: 2fr 1fr;
        }

        .article-item:nth-child(even) .article-image {
            order: 2;
        }

        .article-image {
            background: #e0e0e0;
            height: 250px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 2rem;
        }

        .article-content h3 {
            margin-bottom: 1rem;
        }

        .article-content p {
            color: #666;
            line-height: 1.8;
        }

        .btn-learn-more {
            background: #000;
            color: #fff;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 2rem;
            display: inline-block;
        }

        /* Activity Section */
        .activity-section {
            padding: 4rem 5%;
            background: #a8a8a8;
            text-align: center;
        }

        .activity-section h2 {
            color: #fff;
            margin-bottom: 0.5rem;
        }

        .activity-section p {
            color: #ddd;
            margin-bottom: 3rem;
        }

        .activity-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, 200px);
            gap: 1rem;
        }

        .activity-item {
            background: #e0e0e0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 1.2rem;
        }

        .activity-item.large {
            grid-row: span 2;
        }

        .activity-item:first-child {
            grid-column: span 2;
            grid-row: span 2;
        }

        /* Wisataya Section */
        .wisataya-section {
            padding: 4rem 5%;
            background: #d4f1f4;
        }

        .wisataya-badge {
            background: #999;
            color: #fff;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 1rem;
            font-size: 0.85rem;
        }

        .wisataya-title {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .wisataya-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 3rem;
        }

        .wisataya-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }

        .wisataya-card {
            background: #e8e8e8;
            padding: 2rem;
            border-radius: 10px;
        }

        .wisataya-card h3 {
            margin-bottom: 0.5rem;
        }

        .wisataya-card .price {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .wisataya-card ul {
            list-style: none;
            margin: 1rem 0;
        }

        .wisataya-card ul li {
            padding: 0.3rem 0;
            color: #666;
        }

        .wisataya-card ul li::before {
            content: "• ";
            margin-right: 0.5rem;
        }

        .wisataya-card .btn-primary {
            margin-top: 1rem;
        }

        /* Testimonial Section */
        .testimonial-section {
            padding: 4rem 5%;
            background: #f5f5f5;
        }

        .testimonial-badge {
            background: #999;
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
            border: 1px solid #ddd;
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
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .testimonial-card h4 {
            font-size: 1rem;
        }

        .testimonial-card p {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .testimonial-link {
            color: #667eea;
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            margin-top: 1rem;
        }

        /* FAQ Section */
        .faq-section {
            padding: 4rem 5%;
            background: #f0f0f0;
        }

        .faq-title {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 2rem;
        }

        .faq-item {
            background: #d8d8d8;
            padding: 1.2rem 2rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.3s;
        }

        .faq-item:hover {
            background: #c8c8c8;
        }

        .faq-item::after {
            content: "−";
            font-size: 1.5rem;
            color: #999;
        }

        /* Forum Section */
        .forum-section {
            padding: 4rem 5%;
            background: #d4f1f4;
        }

        .forum-badge {
            background: #999;
            color: #fff;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 1rem;
            font-size: 0.85rem;
        }

        .forum-title {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .forum-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 2rem;
        }

        .forum-form {
            background: #e8e8e8;
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 3rem;
        }

        .forum-form p {
            text-align: center;
            color: #666;
            margin-bottom: 1.5rem;
        }

        .form-group {
            background: #fff;
            padding: 0.3rem 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            border: none;
            padding: 0.8rem;
            font-family: inherit;
            outline: none;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-submit {
            text-align: right;
        }

        .btn-submit {
            background: #999;
            color: #fff;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Newsletter */
        .newsletter {
            background: #666;
            color: #fff;
            padding: 3rem 5%;
            text-align: center;
        }

        .newsletter h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .newsletter p {
            margin-bottom: 2rem;
            color: #ddd;
        }

        .newsletter-form {
            display: flex;
            gap: 1rem;
            justify-content: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter-form button {
            background: #fff;
            color: #333;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .newsletter-form button:last-child {
            background: transparent;
            border: 2px solid #fff;
            color: #fff;
        }

        /* Footer */
        footer {
            background: #333;
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

        .footer-content a {
            color: #aaa;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
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
            border-top: 1px solid #555;
            padding-top: 2rem;
            text-align: center;
            color: #aaa;
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

            .article-item {
                grid-template-columns: 1fr !important;
            }

            .article-item:nth-child(even) {
                grid-template-columns: 1fr;
            }

            .article-item:nth-child(even) .article-image {
                order: 0;
            }

            .activity-grid {
                grid-template-columns: repeat(2, 1fr);
                grid-template-rows: repeat(3, 200px);
            }

            .activity-item:first-child {
                grid-column: span 2;
                grid-row: span 1;
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

            .stats {
                grid-template-columns: repeat(2, 1fr);
                padding: 2rem 4%;
                gap: 1.5rem;
            }

            .stat-card h3 {
                font-size: 1.5rem;
            }

            .features-grid, .skills-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .wisataya-grid, .testimonial-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .story-section, .why-learn, .skills-section, .article-section,
            .activity-section, .wisataya-section, .testimonial-section,
            .faq-section, .forum-section {
                padding: 3rem 4%;
            }

            .story-image, .why-image, .article-image {
                height: 200px;
            }

            .activity-grid {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(6, 150px);
            }

            .activity-item:first-child {
                grid-column: span 1;
                grid-row: span 1;
            }

            .newsletter-form {
                flex-direction: column;
                gap: 1rem;
            }

            .newsletter-form button {
                width: 100%;
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
                gap: 1rem;
            }

            .stat-card {
                padding: 0.8rem;
            }

            .story-section, .why-learn, .skills-section, .article-section,
            .activity-section, .wisataya-section, .testimonial-section,
            .faq-section, .forum-section {
                padding: 2rem 4%;
            }

            .feature-card, .skill-card, .wisataya-card, .testimonial-card {
                padding: 1.5rem;
            }

            .story-image, .why-image, .article-image {
                height: 150px;
                font-size: 2rem;
            }

            .activity-grid {
                grid-template-rows: repeat(6, 120px);
            }

            .board-placeholder {
                height: 200px;
            }

            .faq-item {
                padding: 1rem 1.5rem;
                font-size: 0.9rem;
            }

            .forum-form {
                padding: 1.5rem;
            }

            .newsletter {
                padding: 2rem 4%;
            }

            footer {
                padding: 2rem 4%;
            }

            .hero::before {
                width: 150px;
                height: 150px;
                top: -50px;
                right: -50px;
            }

            .hero::after {
                width: 300px;
                height: 150px;
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
            <a href="#story">About</a>
            <a href="#wisataya">Pricing</a>
            <a href="#testimonial">Testimonial</a>
            <a href="#forum" class="btn-kickstarter">Kickstarter</a>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Belajar Kewirausahaan Dengan Bermain</h1>
            <p>Sebuah permainan papan inovatif yang mengubah bimbingan teknis yang komplek menjadi pengalaman belajar yang menarik dan interaktif yang dapat dipraktekkan.</p>
            <a href="#" class="btn-primary">Membeli Sekarang</a>
        </div>
        <div class="hero-image">
            <div class="board-placeholder">
                <span style="font-size: 4rem;">🎲</span>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="stat-card">
            <h3>85%</h3>
            <p>Kesuksesan Anak ekspositori yang berpengalaman</p>
        </div>
        <div class="stat-card">
            <h3>50+</h3>
            <p>Sekolah dari pulau yang sudah memiliki Zambia</p>
        </div>
        <div class="stat-card">
            <h3>80%</h3>
            <p>Memberikan bimbingan dan pengetahuan kepada siswa</p>
        </div>
        <div class="stat-card">
            <h3>87%</h3>
            <p>Mengadaptasi pembelajaran pembelajaran</p>
        </div>
    </section>

    <section class="story-section">
        <div class="story-grid">
            <div class="story-image">📖</div>
            <div class="story-content">
                <span class="story-badge">HighLight</span>
                <h2>Cerita di Balik GameBoard</h2>
                <p>Teubari ajari ini para bersama pembahasan di subang kewirausahaan - dan kehidupan untuk memulai emindahkan kewirausahaan melalui bidang yang yang membuat memproduksi apapun kami mengawakannya mengubah tulus lingkungan dan kepelajaan tetapi terpernyatan di hipermedia</p>
            </div>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">💡</div>
                <h3>Inovatif</h3>
                <p>Inovasi positif yang mengawinkan dan membuat langkah yang bertenaga untuk bisuk lebih dari perusahaan</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3>Kolaboratif</h3>
                <p>Pembelajaran berhasil sudah terpernyatan di Sukungan dengan sukuan berbayar menjatuhan eksiperiis kita</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🏆</div>
                <h3>Tepat</h3>
                <p>Pembelajaran memperkuat yang sudah emengantukan eksiperiis kita dan dapat berkelanjutan penuh sukses</p>
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
                            <span style="color: #666;">Melalui permainan para belajar membawa kebutuhan eksiperiis kita dengan berjajar dengan praktis dan untuk tahun dari sistem</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <strong>Real Case Scenario</strong>
                            <span style="color: #666;">Belajar membuat membahasa keputusan eksokel dengan bahwa bisnis nyata</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <strong>Belajar Kolaboratif</strong>
                            <span style="color: #666;">Bermulahan sebuah kota keliah batasan sudah emmanga dan bahasa bisaya yang dan setiap menjalankan</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="skills-section">
        <h2 class="section-title">Keterampilan yang Akan Anda Dapatkan</h2>
        <p style="text-align: center; color: #666; margin-bottom: 3rem;">Sebuah keterampilan yang bisa eksiperiis mereka sudah pertukaran yang mudah</p>
        <div class="skills-grid">
            <div class="skill-card">
                <div class="feature-icon">💼</div>
                <h3>Problem Solving</h3>
                <p>Lorem diambil dari bidang dan membuat program strategis kita eksiperiis</p>
            </div>
            <div class="skill-card">
                <div class="feature-icon">📊</div>
                <h3>Kewirausahaan</h3>
                <p>Bekerja buka embangun dalam kita sudah program strategis kita eksiperiis dan dapat berkelanjutan</p>
            </div>
            <div class="skill-card">
                <div class="feature-icon">💰</div>
                <h3>Pengetahuan Keuangan</h3>
                <p>Pembelajaran yang sudah eksiperiis kita dan dapat berkelanjutan embangun dalam penuh sukses</p>
            </div>
            <div class="skill-card">
                <div class="feature-icon">🎨</div>
                <h3>Inovasi</h3>
                <p>Untuk menjalankan program berkelanjutan eksiperiis untuk belajar dengan bisaya</p>
            </div>
        </div>
    </section>

    <section class="article-section">
        <span class="article-badge">Features</span>
        <div class="article-grid">
            <div class="article-item">
                <div class="article-image">Video</div>
                <div class="article-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>

            <div class="article-item">
                <div class="article-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div class="article-image">Image</div>
            </div>

            <div class="article-item">
                <div class="article-image">Image</div>
                <div class="article-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>

            <div class="article-item">
                <div class="article-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <div class="article-image">Image</div>
            </div>
        </div>
        <button class="btn-learn-more">Dapatkan Sekarang</button>
    </section>

    <section class="activity-section">
        <h2>Aktivitas Terbaru & Tutorial</h2>
        <p>Kumpulan aktivitas terlengkap GameBoard & tingkatkan skill mengajarkannya</p>
        <div class="activity-grid">
            <div class="activity-item">Video</div>
            <div class="activity-item">Image</div>
            <div class="activity-item">Image</div>
            <div class="activity-item">Image</div>
            <div class="activity-item">Image</div>
            <div class="activity-item">Image</div>
        </div>
    </section>

    <section class="wisataya-section">
        <span class="wisataya-badge">Bundling</span>
        <h2 class="wisataya-title">Main Sekaligus Belajar, Semua Dimulai dari Sini</h2>
        <p class="wisataya-subtitle">Tingginya pengalaman kewirausahaan lewat board game yang sesuai kebutuhanmu!</p>
        <div class="wisataya-grid">
            <div class="wisataya-card">
                <div class="feature-icon">🏝️</div>
                <h3>Waluya Land</h3>
                <p class="price">Rp 300.000</p>
                <p>Permainan bahasa dan lengkapi bisnis aplikasi</p>
                <ul>
                    <li>1 set permainan waluya land</li>
                    <li>Buku panduan</li>
                </ul>
                <button class="btn-primary">Dapatkan Sekarang</button>
            </div>
            <div class="wisataya-card">
                <div class="feature-icon">🏢</div>
                <h3>Waluya Land Bundling</h3>
                <p class="price">Rp 300.000</p>
                <p>Permainan bahasa dibawakan bisnis aplikasi</p>
                <ul>
                    <li>1 set permainan waluya land</li>
                    <li>Buku panduan</li>
                </ul>
                <button class="btn-primary">Dapatkan Sekarang</button>
            </div>
        </div>
    </section>

    <section class="testimonial-section">
        <span class="testimonial-badge">Testimonial</span>
        <h2 class="section-title">Apa yang Dikatakan Para Pemain</h2>
        <p style="text-align: center; color: #666; margin-bottom: 2rem;">Feedback dari pendidikan akan semua</p>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">👤</div>
                    <div>
                        <h4>Sarah Johanes</h4>
                        <small style="color: #999;">Guru</small>
                    </div>
                </div>
                <p>"Permainan ini telah membuka mata saya terhadap pembelajaran yang menyenangkan. Siswa menjadi lebih antusias dan mudah memahami konsep kewirausahaan dengan cara yang praktis."</p>
                <a href="#" class="testimonial-link">Selanjutnya →</a>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">👤</div>
                    <div>
                        <h4>Michael Chen</h4>
                        <small style="color: #999;">Mahasiswa</small>
                    </div>
                </div>
                <p>"Metode belajar paling asik mendalami cara memulai dan mengelola bisnis pariwisata. Setiap putaran permainan memberikan insight baru yang bermanfaat."</p>
                <a href="#" class="testimonial-link">Selanjutnya →</a>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">👤</div>
                    <div>
                        <h4>Indy Budiarti</h4>
                        <small style="color: #999;">Entrepreneur</small>
                    </div>
                </div>
                <p>"Saya bukan saja bermain melainkan juga belajar strategi bisnis yang bisa diterapkan langsung. Game ini cocok untuk siapa saja yang ingin memulai usaha."</p>
                <a href="#" class="testimonial-link">Selanjutnya →</a>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <h2 class="faq-title">Frequently Asked Questions</h2>
        <div class="faq-item">
            <span>Berkat untuk apa wuluya land ini?</span>
        </div>
        <div class="faq-item">
            <span>Adakah panduan bermain bagi kami?</span>
        </div>
        <div class="faq-item">
            <span>Contoh pertanyaan yang ditanyakan oleh Waluya Land ?</span>
        </div>
        <div class="faq-item">
            <span>Apa manusia level ini?</span>
        </div>
        <div class="faq-item">
            <span>Apakah tersedia untuk semua kalangan?</span>
        </div>
    </section>

    <section class="forum-section">
        <span class="forum-badge">Discussian</span>
        <h2 class="forum-title">Forum Terbuka untuk Tanya, Saran, dan Insight</h2>
        <p class="forum-subtitle">Punya bila, situasi, atau pertanyaan untuk? Jelaskan pertanyaan langsung pada kami</p>

        <div class="forum-form">
            <p>Punya pertanyaan lain? Jelaskan pertanyaan disini</p>
            <div class="form-group">
                <input type="text" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Instansi">
            </div>
            <div class="form-group">
                <textarea placeholder="Pesan/Pertanyaan"></textarea>
            </div>
            <div class="form-submit">
                <button class="btn-submit">Kirim</button>
            </div>
        </div>

        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">👤</div>
                    <div>
                        <h4>Sarah Johanes</h4>
                        <small style="color: #999;">Guru</small>
                    </div>
                </div>
                <p>Saya sangat puas dengan layanan kami Lorem ipsum dolor sit amet consectetur adipiscing elit. Semua kursus bisa mengikuti bimtek bersama dengan para siswa lain.</p>
                <a href="#" class="testimonial-link">Selanjutnya →</a>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">👤</div>
                    <div>
                        <h4>Michael Chen</h4>
                        <small style="color: #999;">Mahasiswa</small>
                    </div>
                </div>
                <p>Platform inovasi sangat Lorem ipsum dolor sit amet consectetur adipiscing elit. Semua kursus pula bisa mengikuti bimtek bersama dengan.</p>
                <a href="#" class="testimonial-link">Selanjutnya →</a>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">👤</div>
                    <div>
                        <h4>Indy Budiarti</h4>
                        <small style="color: #999;">Entrepreneur</small>
                    </div>
                </div>
                <p>Sangat teratur dan mudah Lorem ipsum dolor sit amet consectetur adipiscing elit. Semua kursus bisa mengikuti bimtek bersama dengan para siswa lain.</p>
                <a href="#" class="testimonial-link">Selanjutnya →</a>
            </div>
        </div>
    </section>

    <section class="newsletter">
        <h2>Siap untuk mengubah pengalaman belajar Anda?</h2>
        <p>Bergabung dengan ratusan siswa dan pendidik yang sudah menggunakan GameBoard untuk meningkatkan keterampilan mereka dengan kami.</p>
        <div class="newsletter-form">
            <button>Dapatkan Sekarang</button>
            <button>Kontak Kami</button>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div>
                <h4>📚 Waluya Land</h4>
                <p>Malaya persembahkan edukasi hebatnya dan memukalkan melalui dasar dan petunjuk yang sudah mengetahui keterampilan mereka dengan kami.</p>
            </div>
            <div>
                <h4>Product</h4>
                <a href="#">Features</a>
                <a href="#">Pricing</a>
            </div>
            <div>
                <h4>Support</h4>
                <a href="#">Contact Us</a>
            </div>
            <div>
                <h4>Organisasi E-Commerce</h4>
                <div class="footer-flags">
                    <span>🇮🇩</span>
                    <span>🇵🇹</span>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 GameBoard.Inc. All rights reserved.</p>
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
    </script>
</body>
</html>
