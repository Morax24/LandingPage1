<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waluya Land - Belajar Kewirausahaan</title>
    <style>

        /* FEATURES GRID - 4 slot sama rata */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}
.feature-slot {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.feature-slot:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.15);
}

/* AKTIVITAS GRID - 6 slot posisi tetap */
.activity-grid {
    display: grid;
    grid-template-areas:
        "big small1 small2"
        "big small3 small4"
        "big small5 small6";
    grid-template-columns: 2fr 1fr 1fr;
    grid-auto-rows: 250px;
    gap: 1.2rem;
}
.activity-slot.large {
    grid-area: big;
}
.activity-slot.small:nth-of-type(2) { grid-area: small1; }
.activity-slot.small:nth-of-type(3) { grid-area: small2; }
.activity-slot.small:nth-of-type(4) { grid-area: small3; }
.activity-slot.small:nth-of-type(5) { grid-area: small4; }
.activity-slot.small:nth-of-type(6) { grid-area: small5; }
.activity-slot.small:nth-of-type(7) { grid-area: small6; }

.slot-media {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
}
.placeholder {
    width: 100%;
    height: 100%;
    background: #eaeaea;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #666;
    font-weight: 600;
    border-radius: 10px;
}
.slot-info {
    padding: 0.8rem 1rem;
}
.slot-info h5 {
    font-weight: 600;
    margin-bottom: 0.3rem;
}
.slot-info p {
    color: #666;
    font-size: 0.9rem;
}
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

        .btn-kickstarter {
            background: #f39c12;
            color: #fff;
            padding: 0.6rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-kickstarter:hover {
            background: #e67e22;
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
            background: #f39c12;
            color: #fff;
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg"></svg>');
            height: 400px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
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
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .stat-card:nth-child(1), .stat-card:nth-child(3) {
            background: #7cb342;
            color: #fff;
        }

        .stat-card:nth-child(2), .stat-card:nth-child(4) {
            background: #f7e92b;
            color: #333;
        }

        .stat-card h3 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .stat-card p {
            font-size: 0.9rem;
        }

        /* Story Section */
        .story-section {
            padding: 4rem 5%;
            background: #d4f1f4;
        }

        .story-badge {
            background: #f7e92b;
            color: #333;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 1rem;
            font-size: 0.85rem;
        }

        .story-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 3rem;
            align-items: center;
            margin-bottom: 3rem;
        }

        .story-image {
            background: #f0f0f0;
            height: 300px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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
            background: #7cb342;
            color: #fff;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        /* Why Learn & Skills Section */
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
            padding: 4rem 5%;
        }

        .skill-card {
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s;
        }

        .skill-card:nth-child(1), .skill-card:nth-child(3) {
            background: #7cb342;
            color: #fff;
        }

        .skill-card:nth-child(2), .skill-card:nth-child(4) {
            background: #f7e92b;
            color: #333;
        }

        .skill-card:hover {
            transform: translateY(-5px);
        }

        /* Pricing Section */
        .pricing-section {
            padding: 4rem 5%;
            background: #fff;
        }

        .pricing-badge {
            background: #f7e92b;
            color: #333;
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
            border-radius: 15px;
            padding: 2.5rem;
            transition: transform 0.3s;
        }

        .pricing-card:first-child {
            background: #7cb342;
            color: #fff;
        }

        .pricing-card:last-child {
            background: #bfbfbf;
            color: #333;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
        }

        .pricing-card h3 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .pricing-card .price {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .pricing-card ul {
            list-style: none;
            margin: 1.5rem 0;
        }

        .pricing-card ul li {
            padding: 0.5rem 0;
        }

        .pricing-card ul li::before {
            content: "• ";
            margin-right: 0.5rem;
        }

        /* Testimonial Section */
        .testimonial-section {
            padding: 4rem 5%;
            background: #d4f1f4;
        }

        .testimonial-badge {
            background: #f7e92b;
            color: #333;
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

        /* FAQ + Contact Section */
        .faq-contact-section {
            padding: 4rem 5%;
            background: #d4f1f4;
        }

        .faq-contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-top: 2rem;
        }

        .faq-contact-form {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
        }

        .faq-contact-form input,
        .faq-contact-form textarea {
            width: 100%;
            border: 1px solid #ddd;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 5px;
        }

        .faq-contact-form textarea {
            min-height: 100px;
            resize: vertical;
        }

        .btn-submit-faq {
            background: #f39c12;
            color: #fff;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }

        .faq-accordion {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .faq-item {
            background: #fff;
            padding: 1.5rem 2rem;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-item::after {
            content: "▼";
            font-size: 1rem;
            transition: transform 0.3s;
        }

        .faq-item.active::after {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
            transition: max-height 0.5s ease-in;
        }

        /* Forum Section */
        .forum-section {
            padding: 4rem 5%;
            background: #d4f1f4;
        }

        .forum-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 2rem;
        }

        .forum-card {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .forum-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .forum-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .forum-footer {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #f0f0f0;
            text-align: center;
        }

        .forum-comment-btn {
            color: #667eea;
            text-decoration: none;
            font-size: 0.85rem;
        }

        /* Newsletter */
        .newsletter {
            background: #f7e92b;
            color: #333;
            padding: 3rem 5%;
            text-align: center;
        }

        .newsletter h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        /* Footer */
        footer {
            background: #f7e92b;
            color: #333;
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
            color: #333;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
        }

        .footer-bottom {
            border-top: 1px solid rgba(0,0,0,0.1);
            padding-top: 2rem;
            text-align: center;
            font-size: 0.9rem;
        }

        /* Error & Alert Styles */
        .error-text {
            color: #e74c3c;
            font-size: 0.85rem;
            display: block;
            margin-top: 0.5rem;
        }

        .alert {
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero, .story-grid, .faq-contact-grid {
                grid-template-columns: 1fr;
            }
            .stats, .skills-grid, .pricing-grid, .testimonial-grid, .forum-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .stats, .skills-grid, .pricing-grid, .testimonial-grid, .forum-grid {
                grid-template-columns: 1fr;
            }
            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <span class="logo-box">■</span>
            <span>WALUYA LAND</span>
        </div>
        <nav>
            <a href="#home">About</a>
            <a href="#pricing">Pricing</a>
            <a href="#testimonial">Testimonial</a>
            <a href="#contact" class="btn-kickstarter">Kontak Kami</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Belajar Kewirausahaan Dengan Bermain</h1>
            <p>Sebuah permainan papan inovatif yang mengubah konsep bisnis yang kompleks menjadi pengalaman belajar yang menarik, interaktif bagi siswa dan profesional.</p>
            <a href="#" class="btn-primary">Dapatkan Sekarang</a>
        </div>
        <div class="hero-image">
            <div class="board-placeholder">
                <img src="/api/placeholder/400/400" alt="Board Game" style="max-width: 100%; border-radius: 20px;">
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="home" class="stats">
        <div class="stat-card">
            <h3>{{ $stats['satisfaction'] ?? '85' }}%</h3>
            <p>Kepuasan user sejauh ini saat bermain</p>
        </div>
        <div class="stat-card">
            <h3>{{ $stats['schools'] ?? '50' }}+</h3>
            <p>Sekolah dan siswa yang sudah menekankannya</p>
        </div>
        <div class="stat-card">
            <h3>{{ $stats['students'] ?? '80' }}%</h3>
            <p>Membantu mereka dari pengalaman baru</p>
        </div>
        <div class="stat-card">
            <h3>{{ $stats['understanding'] ?? '87' }}%</h3>
            <p>Meningkatkan pemahaman pembelajaran</p>
        </div>
    </section>

    <!-- Story Section -->
    <section class="story-section">
        <div class="story-grid">
            <div class="story-image">
                <img src="/api/placeholder/250/300" alt="Box" style="max-width: 100%; border-radius: 10px;">
            </div>
            <div class="story-content">
                <span class="story-badge">Background</span>
                <h2>Cerita di Balik GameBoard</h2>
                <p>Terlatir dari ide para tenaga pendidikan didalam kewirausahaan dalam kehidupan untuk memulai pendidikan kewirausahaan ini lebih menarik, interaktif dan praktis sebagai alat pembelajaran melalui permainan papan kami menyajikan kesempatan antara teori pelajaran dan implementasi di lapangan</p>
            </div>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">💡</div>
                <h3>problem</h3>
                <p>Dapat membantu siswa menyebarkan kebutuhan untuk pembelajaran interaktif dalam pendidikan bisnis.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3>problem</h3>
                <p>Diverifikasi sulit dapat dengan melalukan kerja tim antar industri secara efejtive</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3>problem</h3>
                <p>Dorong para mengambil proyek kewirausahaan dalam membuat konsep bisnis yang kompleks menjadi mudah dipahami dan menyenangkan bagi semua peserta didik</p>
            </div>
        </div>
    </section>

    <!-- Why Learn Section -->
    <section style="padding: 4rem 5%; background: #fff;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center;">
            <div style="background: #f0f0f0; height: 300px; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                <span style="font-size: 4rem;">🎓</span>
            </div>
            <div>
                <h2 style="font-size: 2rem; margin-bottom: 1rem;">Mengapa Belajar Kewirausahaan Melalui Permainan Papan?</h2>
                <div style="margin-bottom: 1.5rem;">
                    <strong style="display: block; margin-bottom: 0.5rem;">① Pengalaman Belajar Interaktif dan Praktis</strong>
                    <p style="color: #666;">Melalui pengalaman keputusan dan presentasi bisnis dengan feedback langsung</p>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <strong style="display: block; margin-bottom: 0.5rem;">② Real-Case Scenario</strong>
                    <p style="color: #666;">Koleksi tantangan berdasarkan situasi bisnis nyata</p>
                </div>
                <div>
                    <strong style="display: block; margin-bottom: 0.5rem;">③ Belajar Kolaboratif</strong>
                    <p style="color: #666;">Bermain dengan strategi tim akan bersama dan bekerja sama dengan orang lain.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" style="padding:4rem 5%; background:#f8f9fa;">
    <h2 class="text-center mb-4">Fitur Unggulan</h2>
    <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:1.5rem;">
        @for ($i = 0; $i < 4; $i++)
            @php $item = $featuresMedia[$i] ?? null; @endphp
            <div class="card shadow-sm" style="border-radius:10px;overflow:hidden;">
                @if($item)
                    @if($item->isImage())
                        <img src="{{ $item->url }}" alt="{{ $item->title }}" style="width:100%;height:250px;object-fit:cover;">
                    @elseif($item->isVideo())
                        <video controls style="width:100%;height:250px;object-fit:cover;">
                            <source src="{{ $item->url }}" type="{{ $item->mime_type }}">
                        </video>
                    @endif
                    <div class="p-3">
                        <h5>{{ $item->title }}</h5>
                        <p class="text-muted">{{ $item->description }}</p>
                    </div>
                @else
                    <div style="height:250px;background:#eee;display:flex;align-items:center;justify-content:center;color:#aaa;">Slot Kosong</div>
                @endif
            </div>
        @endfor
    </div>
</section>

    <!-- Skills Section -->
    <section style="padding: 2rem 0; background: #fff;">
        <h2 class="section-title">Keterampilan yang Akan Anda Dapatkan</h2>
        <p class="section-subtitle">Main keterampilan kewirausahaan yang sukses melalui permainan yang menarik</p>
        <div class="skills-grid">
            <div class="skill-card">
                <div class="feature-icon">🔧</div>
                <h3>Problem Solving</h3>
                <p>Mengidentifikasi masalah dan mencari solusi kreatif dalam berbagai situasi bisnis</p>
            </div>
            <div class="skill-card">
                <div class="feature-icon">🎓</div>
                <h3>Kerjasama</h3>
                <p>Belajar untuk bekerja berbasis skuid untuk mencoba kerjasama interaktif</p>
            </div>
            <div class="skill-card">
                <div class="feature-icon">📊</div>
                <h3>Pengambilan Keputusan</h3>
                <p>Berlatih membuat keputusan keseluruhan yang mempengaruhi layanan</p>
            </div>
            <div class="skill-card">
                <div class="feature-icon">✨</div>
                <h3>Inovasi</h3>
                <p>Dorong aktivitas membuat ide strategi pemasaran yang efektif</p>
            </div>
        </div>
    </section>

    <!-- Aktivitas Terbaru & Tutorial Section -->
    <section id="aktivitas" style="padding:4rem 5%;background:#fff;">
    <h2 class="text-center mb-4">Aktivitas & Tutorial</h2>
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;">
        @for ($i = 0; $i < 6; $i++)
            @php $item = $aktivitasMedia[$i] ?? null; @endphp
            <div class="card shadow-sm" style="border-radius:10px;overflow:hidden;">
                @if($item)
                    @if($item->isImage())
                        <img src="{{ $item->url }}" alt="{{ $item->title }}" style="width:100%;height:200px;object-fit:cover;">
                    @elseif($item->isVideo())
                        <video controls style="width:100%;height:200px;object-fit:cover;">
                            <source src="{{ $item->url }}" type="{{ $item->mime_type }}">
                        </video>
                    @endif
                    <div class="p-3">
                        <h5>{{ $item->title }}</h5>
                        <p class="text-muted">{{ $item->description }}</p>
                    </div>
                @else
                    <div style="height:200px;background:#eee;display:flex;align-items:center;justify-content:center;color:#aaa;">Slot Kosong</div>
                @endif
            </div>
        @endfor
    </div>
</section>




    <!-- Pricing Section -->
    <section id="pricing" class="pricing-section">
        <span class="pricing-badge">Product</span>
        <h2 class="section-title">Main Sekaligus Belajar, Semua Dimulai dari Sini!</h2>
        <p class="section-subtitle">Tingkatkan pemahaman kewirausahaan lewat board game yang seru dan interaktif</p>
        <div class="pricing-grid">
            <div class="pricing-card">
                <h3>Waluya Land</h3>
                <p class="price">Rp 300.000</p>
                <p>Produk yang baru dapatkan belajar seperti:</p>
                <ul>
                    <li>1 set produk waluya land</li>
                    <li>1 kupon potongan harga</li>
                </ul>
                <button class="btn-primary">Dapatkan Sekarang</button>
            </div>
            <div class="pricing-card">
                <h3>Waluya Land</h3>
                <p class="price">Rp 300.000</p>
                <p>Produk yang baru dapatkan belajar seperti:</p>
                <ul>
                    <li>1 set produk waluya land</li>
                    <li>1 kupon potongan harga</li>
                </ul>
                <button class="btn-primary">Dapatkan Sekarang</button>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section id="testimonial" class="testimonial-section">
        <span class="testimonial-badge">Testimoni</span>
        <h2 class="section-title">Apa yang Dikatakan Para Pemain</h2>
        <p class="section-subtitle">Feedback dan manfaat dari siswa</p>
        <div class="testimonial-grid">
            @forelse($testimonials ?? [] as $testimonial)
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">{{ strtoupper(substr($testimonial->name, 0, 1)) }}</div>
                    <div>
                        <h4>{{ $testimonial->name }}</h4>
                        <small style="color: #999;">{{ $testimonial->institution ?? 'Pengguna' }}</small>
                    </div>
                </div>
                <p>"{{ $testimonial->message }}"</p>
                <div style="margin-top: 1rem; text-align: center;">
                    <a href="#contact" class="forum-comment-btn">💬 0 comment</a>
                </div>
            </div>
            @empty
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">S</div>
                    <div>
                        <h4>Sarah Johnson</h4>
                        <small style="color: #999;">Pendidik Kewirausahaan</small>
                    </div>
                </div>
                <p>"Permainan ini telah mengubah cara saya mengajar kewirausahaan. Siswa menjadi lebih tertarik dan memahami konsep dengan jauh lebih baik."</p>
                <div style="margin-top: 1rem; text-align: center;">
                    <a href="#contact" class="forum-comment-btn">💬 0 comment</a>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">M</div>
                    <div>
                        <h4>Michael Chen</h4>
                        <small style="color: #999;">Siswa Pemasaran</small>
                    </div>
                </div>
                <p>"Bermain board game ini membantu saya memahami bagaimana menjadi wirausaha. Game ini menyenangkan dan memberikan insight baru yang bermanfaat."</p>
                <div style="margin-top: 1rem; text-align: center;">
                    <a href="#contact" class="forum-comment-btn">💬 0 comment</a>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">E</div>
                    <div>
                        <h4>Emily Rodriguez</h4>
                        <small style="color: #999;">SMK 15</small>
                    </div>
                </div>
                <p>"Saya berharap saya memiliki permainan ini saat pertama kali belajar bisnis. Permainan ini memecah konsep yang sulit menjadi mudah dipahami dalam dunia nyata dan pembelajaran."</p>
                <div style="margin-top: 1rem; text-align: center;">
                    <a href="#contact" class="forum-comment-btn">💬 0 comment</a>
                </div>
            </div>
            @endforelse
        </div>
    </section>

    <!-- FAQ + Contact Section -->
    <section id="contact" class="faq-contact-section">
        <h2 class="section-title">Frequently Asked Questions</h2>

        <div class="faq-contact-grid">
            <!-- LEFT: Contact Form -->
            <div class="faq-contact-form">
                <p style="margin-bottom: 1.5rem; color: #666;">Punya pertanyaan lain? silahkan cantumkan disini!</p>

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="error-text">{{ $message }}</span>
                    @enderror

                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error-text">{{ $message }}</span>
                    @enderror

                    <input type="text" name="institution" placeholder="Instansi" value="{{ old('institution') }}">
                    @error('institution')
                        <span class="error-text">{{ $message }}</span>
                    @enderror

                    <textarea name="message" placeholder="Pesan/Pertanyaan" required>{{ old('message') }}</textarea>
                    @error('message')
                        <span class="error-text">{{ $message }}</span>
                    @enderror

                    <button type="submit" class="btn-submit-faq">Kirim</button>
                </form>
            </div>

            <!-- RIGHT: FAQ Accordion -->
            <div class="faq-accordion">
                <div class="faq-item" onclick="toggleFaq(this)">
                    <div>
                        <strong>Beriaku untuk siapa saja waluya land ini?</strong>
                        <div class="faq-answer" style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                            Waluya Land dirancang untuk siswa SMA/SMK, mahasiswa, dan siapa saja yang ingin belajar kewirausahaan dengan cara yang menyenangkan dan interaktif. Permainan ini cocok untuk pembelajaran individu maupun kelompok.
                        </div>
                    </div>
                </div>
                <div class="faq-item" onclick="toggleFaq(this)">
                    <div>
                        <strong>Adakah panduan bermain bagi kami?</strong>
                        <div class="faq-answer" style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                            Ya, setiap paket Waluya Land dilengkapi dengan buku panduan lengkap yang menjelaskan aturan permainan, cara bermain, dan tips untuk memaksimalkan pengalaman belajar. Panduan juga tersedia dalam bentuk video tutorial.
                        </div>
                    </div>
                </div>
                <div class="faq-item" onclick="toggleFaq(this)">
                    <div>
                        <strong>Capaian pelajaran apa yang terpenuhi oleh Waluya Land?</strong>
                        <div class="faq-answer" style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                            Waluya Land membantu mencapai kompetensi: (1) Pemahaman konsep kewirausahaan, (2) Kemampuan problem solving, (3) Keterampilan kerja tim, (4) Pengambilan keputusan bisnis, (5) Literasi keuangan, dan (6) Kreativitas dalam berinovasi.
                        </div>
                    </div>
                </div>
                <div class="faq-item" onclick="toggleFaq(this)">
                    <div>
                        <strong>Apa waluya land ini?</strong>
                        <div class="faq-answer" style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                            Waluya Land adalah board game edukatif yang mengajarkan konsep kewirausahaan dan bisnis melalui permainan interaktif. Pemain akan menghadapi berbagai skenario bisnis nyata, membuat keputusan strategis, dan belajar dari setiap langkah yang diambil.
                        </div>
                    </div>
                </div>
                <div class="faq-item" onclick="toggleFaq(this)">
                    <div>
                        <strong>Apakah beriaku untuk semua kurikulum?</strong>
                        <div class="faq-answer" style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                            Ya, Waluya Land dirancang fleksibel dan dapat disesuaikan dengan berbagai kurikulum pendidikan (Kurikulum 2013, Kurikulum Merdeka, dll). Materi pembelajaran dapat diadaptasi sesuai dengan kebutuhan dan capaian pembelajaran yang diinginkan.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Forum Section -->
    <section class="forum-section">
        <span class="testimonial-badge">Testimoni</span>
        <h2 class="section-title">Forum Terbuka untuk Tanya, Saran, dan Insight</h2>
        <p class="section-subtitle">Punya ide, saran, atau pertanyaan untuk kami? ajukan pertanyaan langsung pada tim kami</p>

        <div class="forum-grid">
            @forelse(($testimonials ?? collect())->take(6) as $testimonial)
            <div class="forum-card">
                <div class="forum-header">
                    <div class="forum-avatar">{{ strtoupper(substr($testimonial->name, 0, 1)) }}</div>
                    <div>
                        <h4>{{ $testimonial->name }}</h4>
                        <small style="color: #999;">{{ $testimonial->institution ?? 'Pengguna' }}</small>
                    </div>
                </div>
                <p>"{{ Str::limit($testimonial->message, 150) }}"</p>
                <div class="forum-footer">
                    <a href="#contact" class="forum-comment-btn">💬 0 comment</a>
                </div>
            </div>
            @empty
            <div class="forum-card">
                <div class="forum-header">
                    <div class="forum-avatar">S</div>
                    <div>
                        <h4>Sarah Johnson</h4>
                        <small style="color: #999;">Pendidik Kewirausahaan</small>
                    </div>
                </div>
                <p>"Permainan ini telah mengubah cara saya mengajar kewirausahaan. Siswa menjadi lebih tertarik dan memahami konsep dengan jauh lebih baik."</p>
                <div class="forum-footer">
                    <a href="#contact" class="forum-comment-btn">💬 0 comment</a>
                </div>
            </div>
            <div class="forum-card">
                <div class="forum-header">
                    <div class="forum-avatar">M</div>
                    <div>
                        <h4>Michael Chen</h4>
                        <small style="color: #999;">Siswa Pemasaran</small>
                    </div>
                </div>
                <p>"Bermain board game ini membantu saya memahami bagaimana menjadi wirausaha. Game ini menyenangkan dan memberikan insight baru yang bermanfaat."</p>
                <div class="forum-footer">
                    <a href="#contact" class="forum-comment-btn">💬 0 comment</a>
                </div>
            </div>
            <div class="forum-card">
                <div class="forum-header">
                    <div class="forum-avatar">E</div>
                    <div>
                        <h4>Emily Rodriguez</h4>
                        <small style="color: #999;">SMK 15</small>
                    </div>
                </div>
                <p>"Saya berharap saya memiliki permainan ini saat pertama kali memulai. Permainan ini memecah konsep yang sulit menjadi mudah dipahami."</p>
                <div class="forum-footer">
                    <a href="#contact" class="forum-comment-btn">💬 0 comment</a>
                </div>
            </div>
            <div class="forum-card">
                <div class="forum-header">
                    <div class="forum-avatar">S</div>
                    <div>
                        <h4>Sarah Johnson</h4>
                        <small style="color: #999;">Pendidik Kewirausahaan</small>
                    </div>
                </div>
                <p>"Permainan ini telah mengubah cara saya mengajar kewirausahaan. Siswa menjadi lebih tertarik dan memahami konsep dengan jauh lebih baik."</p>
                <div class="forum-footer">
                    <a href="#contact" class="forum-comment-btn">💬 0 comment</a>
                </div>
            </div>
            <div class="forum-card">
                <div class="forum-header">
                    <div class="forum-avatar">M</div>
                    <div>
                        <h4>Michael Chen</h4>
                        <small style="color: #999;">Siswa Pemasaran</small>
                    </div>
                </div>
                <p>"Bermain board game ini membantu saya memahami bagaimana menjadi wirausaha. Game ini menyenangkan dan memberikan insight baru."</p>
                <div class="forum-footer">
                    <a href="#contact" class="forum-comment-btn">💬 0 comment</a>
                </div>
            </div>
            @endforelse
        </div>

        <div style="text-align: center; margin-top: 3rem;">
            <h3 style="font-size: 1.8rem; margin-bottom: 1rem;">Siap untuk mengubah pengalaman belajar Anda?</h3>
            <p style="color: #666; margin-bottom: 2rem;">Bergabunglah dengan ribuan siswa dan pendidik yang sudah menggunakan GameBoard untuk menguasai keterampilan kewirausahaan</p>
            <a href="https://wa.me/628986908167?text=Halo%20saya%20tertarik%20dengan%20produk%20Waluya%20Land!"
   class="btn-primary"
   style="padding: 1.2rem 3rem;"
   target="_blank">
   Dapatkan Sekarang
</a>

        </div>
    </section>

    <!-- Newsletter
<section class="newsletter">
    <h2>Dapatkan di e-commerce & Komunitas</h2>
    <div class="ecommerce-links">
        <a href="https://shopee.co.id" target="_blank" class="ecommerce-logo">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/shopee.svg"
                 alt="Shopee" style="height: 45px; filter: invert(38%) sepia(86%) saturate(2798%) hue-rotate(354deg) brightness(96%) contrast(93%);">
        </a>
        <a href="https://www.tokopedia.com" target="_blank" class="ecommerce-logo">
            <img src="https://cdn.brandfetch.io/idoruRsDhk/theme/dark/symbol.svg?c=1dxbfHSJFAPEGdCLU4o5B"
                 alt="Tokopedia" style="height: 45px;">
        </a>
    </div>-->
</section>
    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div>
                <h4>📚 Waluya Land</h4>
                <p>Making entrepreneurship education engaging and accessible through innovative board games</p>
            </div>
            <div>
                <h4>Product</h4>
                <a href="#about">Features</a>
                <a href="#pricing">Pricing</a>
            </div>
            <div>
                <h4>Support</h4>
                <a href="#contact">Contact Us</a>
            </div>
            <div>
                <h4>Dapatkan di e-commerce</h4>
                <div style="display: flex; gap: 1rem; margin-top: 0.5rem; font-size: 1.5rem;">
                    <a href="https://shopee.co.id" target="_blank" class="ecommerce-logo">
            <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/shopee.svg"
                 alt="Shopee" style="height: 45px; filter: invert(38%) sepia(86%) saturate(2798%) hue-rotate(354deg) brightness(96%) contrast(93%);">
        </a>
        <a href="https://www.tokopedia.com" target="_blank" class="ecommerce-logo">
            <img src="https://cdn.brandfetch.io/idoruRsDhk/theme/dark/symbol.svg?c=1dxbfHSJFAPEGdCLU4o5B"
                 alt="Tokopedia" style="height: 45px;">
        </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 GameBoard. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // FAQ accordion toggle
        function toggleFaq(element) {
            element.classList.toggle('active');
            const answer = element.querySelector('.faq-answer');

            if (element.classList.contains('active')) {
                answer.style.display = 'block';
            } else {
                answer.style.display = 'none';
            }
        }
    </script>
</body>
</html>
