<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waluya Land - Belajar Kewirausahaan</title>
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

        /* PERBAIKAN UNTUK GAMBAR - UKURAN ASLI */
        .image-original {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        .hero-image-original {
            width: 100%;
            height: auto;
            max-height: none;
            display: block;
            object-fit: cover;
        }

        .product-image-original {
            width: 100%;
            height: auto;
            max-height: none;
            display: block;
            object-fit: cover;
        }

        .grid-image-original {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        .feature-image-original {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        img,
        video {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* HEADER */
        header {
            background: #d4f1f4;
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
            background: none;
            border: none;
            padding: 5px;
            z-index: 1001;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: #333;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s;
        }

        nav a:hover {
            color: #666;
        }

        .btn-kickstarter {
            background: #f39c12;
            color: #fff;
            padding: 0.6rem 1.5rem;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-kickstarter:hover {
            background: #e67e22;
        }

        /* HERO SECTION */
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
            font-size: clamp(1.8rem, 5vw, 2.8rem);
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero p {
            color: #555;
            margin-bottom: 2rem;
            line-height: 1.8;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .btn-primary {
            background: #f39c12;
            color: #fff;
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
            transition: transform 0.3s;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .hero-image {
            z-index: 2;
            position: relative;
        }

        .board-placeholder {
            width: 100%;
            background: #f0f0f0;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* STATS SECTION */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            padding: 3rem 5%;
            background: #f5f5f5;
        }

        .stat-card {
            text-align: center;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .stat-card:nth-child(1),
        .stat-card:nth-child(3) {
            background: #7cb342;
            color: #fff;
        }

        .stat-card:nth-child(2),
        .stat-card:nth-child(4) {
            background: #f7e92b;
            color: #333;
        }

        .stat-card h3 {
            font-size: clamp(2rem, 5vw, 2.5rem);
            margin-bottom: 0.5rem;
        }

        .stat-card p {
            font-size: clamp(0.85rem, 2vw, 1rem);
        }

        /* STORY SECTION */
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
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .story-content h2 {
            font-size: clamp(1.5rem, 4vw, 2rem);
            margin-bottom: 1rem;
        }

        .story-content h3 {
            font-size: clamp(1.3rem, 3.5vw, 1.8rem);
            margin-bottom: 1rem;
        }

        .story-content p {
            color: #666;
            line-height: 1.8;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        /* FEATURES GRID */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
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
            font-size: clamp(2rem, 5vw, 2.5rem);
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            font-size: clamp(1.1rem, 3vw, 1.3rem);
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            font-size: clamp(0.85rem, 2vw, 0.95rem);
        }

        /* SECTION STYLES */
        .section-title {
            text-align: center;
            font-size: clamp(1.5rem, 4vw, 2rem);
            margin-bottom: 1rem;
        }

        .section-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 3rem;
            font-size: clamp(0.9rem, 2vw, 1rem);
            padding: 0 1rem;
        }

        /* WHY LEARN SECTIONS */
        .why-learn-section {
            padding: 4rem 5%;
            background: #fff;
        }

        .why-learn-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .why-learn-media {
            background: #f0f0f0;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .why-learn-content h2 {
            font-size: clamp(1.5rem, 4vw, 2rem);
            margin-bottom: 1rem;
        }

        .why-learn-item {
            margin-bottom: 2rem;
            padding: 1.5rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            border-left: 4px solid #7cb342;
        }

        .why-learn-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .why-learn-item strong {
            display: block;
            margin-bottom: 0.8rem;
            font-size: 1.1rem;
            color: #7cb342;
        }

        .why-learn-item p {
            color: #666;
            line-height: 1.6;
            margin: 0;
        }

        /* KETERAMPILAN YANG AKAN DIDAPATKAN - DARI CODE 1 */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            padding: 4rem 5%;
        }

        .skill-card {
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s;
        }

        .skill-card:nth-child(1),
        .skill-card:nth-child(3) {
            background: #7cb342;
            color: #fff;
        }

        .skill-card:nth-child(2),
        .skill-card:nth-child(4) {
            background: #f7e92b;
            color: #333;
        }

        .skill-card:hover {
            transform: translateY(-5px);
        }

        .skill-card h3 {
            font-size: clamp(1.1rem, 3vw, 1.3rem);
            margin-bottom: 0.5rem;
        }

        .skill-card p {
            font-size: clamp(0.85rem, 2vw, 0.95rem);
        }

        /* PLACEHOLDER */
        .placeholder {
            width: 100%;
            height: 100%;
            background: #eaeaea;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            font-weight: 600;
            font-size: clamp(0.85rem, 2vw, 1rem);
        }

        /* NEW FEATURES GRID - ZIGZAG LAYOUT */
        .features-zigzag {
            display: flex;
            flex-direction: column;
            gap: 3rem;
            margin-top: 2rem;
        }

        .feature-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            align-items: center;
        }

        .feature-media-box {
            background: #f0f0f0;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature-text-box {
            padding: 2rem;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 15px;
        }

        .feature-text-box h3 {
            font-size: clamp(1.2rem, 3vw, 1.5rem);
            margin-bottom: 1rem;
            color: #333;
        }

        .feature-text-box p {
            color: #666;
            line-height: 1.8;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        /* Desktop Layout - Zigzag */
        @media (min-width: 768px) {
            .feature-row {
                grid-template-columns: 1fr 1fr;
                gap: 3rem;
            }

            .feature-row:nth-child(even) .feature-media-box {
                order: 2;
            }

            .feature-row:nth-child(even) .feature-text-box {
                order: 1;
            }
        }

        /* NEW GRID LAYOUT FOR AKTIVITAS */
        .grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            grid-template-rows: repeat(6, 1fr);
            gap: 8px;
            margin-top: 2rem;
        }

        .item {
            background-color: #f0f0f0;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .mobile-only {
            display: block;
        }

        .desktop-only {
            display: none;
        }

        .item-0 {
            grid-column: 1 / span 4;
            grid-row: 1 / span 4;
        }

        .item-1 {
            grid-column: 5 / span 2;
            grid-row: 1 / span 2;
        }

        .item-2 {
            grid-column: 5 / span 2;
            grid-row: 3 / span 2;
        }

        .item-3 {
            grid-column: 1 / span 2;
            grid-row: 5 / span 2;
        }

        .item-4 {
            grid-column: 3 / span 2;
            grid-row: 5 / span 2;
        }

        .item-5 {
            grid-column: 5 / span 2;
            grid-row: 5 / span 2;
        }

        /* PERBAIKAN PRICING SECTION */
        .pricing-section {
            padding: 4rem 5%;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
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
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .pricing-card {
            border-radius: 15px;
            padding: 2.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .pricing-card:first-child {
            background: linear-gradient(135deg, #7cb342 0%, #689f38 100%);
            color: #fff;
        }

        .pricing-card:last-child {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            color: #333;
            border: 2px solid #e9ecef;
        }

        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .pricing-card h3 {
            margin-bottom: 1rem;
            font-size: clamp(1.2rem, 3vw, 1.5rem);
        }

        .pricing-card .price {
            font-size: clamp(1.8rem, 4vw, 2.2rem);
            font-weight: bold;
            margin: 1rem 0;
            color: inherit;
        }

        .pricing-card p {
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .pricing-card ul {
            list-style: none;
            margin: 1.5rem 0;
            flex-grow: 1;
        }

        .pricing-card ul li {
            padding: 0.5rem 0;
            font-size: clamp(0.85rem, 2vw, 0.95rem);
            position: relative;
            padding-left: 1.5rem;
        }

        .pricing-card:first-child ul li::before {
            content: "✓ ";
            position: absolute;
            left: 0;
            color: #fff;
            font-weight: bold;
        }

        .pricing-card:last-child ul li::before {
            content: "✓ ";
            position: absolute;
            left: 0;
            color: #7cb342;
            font-weight: bold;
        }

        /* Container untuk gambar produk */
        .product-image-container {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            min-height: 200px;
        }

        /* TESTIMONIAL SECTION */
        .testimonial-section {
            padding: 4rem 5%;
            background: #d4f1f4;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .testimonial-card {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
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
            background: linear-gradient(135deg, #7cb342 0%, #689f38 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            font-weight: bold;
            color: white;
            flex-shrink: 0;
        }

        .testimonial-card h4 {
            font-size: clamp(0.95rem, 2.5vw, 1.1rem);
        }

        .testimonial-card p {
            font-size: clamp(0.85rem, 2vw, 0.95rem);
            line-height: 1.6;
        }

        /* FAQ SECTION - UPDATED */
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
            font-size: clamp(0.85rem, 2vw, 1rem);
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
            font-size: clamp(0.9rem, 2vw, 1rem);
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
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            background: #f8f9fa;
        }

        .faq-item strong {
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .faq-item::after {
            content: "▼";
            float: right;
            transition: transform 0.3s;
            font-size: 0.8rem;
        }

        .faq-item.active::after {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            font-size: clamp(0.85rem, 2vw, 0.95rem);
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
        }

        /* Mobile Layout - Tampil di bawah 768px */
        .faq-contact-mobile {
            display: block;
        }

        .faq-contact-desktop {
            display: none;
        }

        .faq-contact-form-mobile {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            margin-top: 2rem;
        }

        .faq-contact-form-mobile input,
        .faq-contact-form-mobile textarea {
            width: 100%;
            border: 1px solid #ddd;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            font-size: clamp(0.85rem, 2vw, 1rem);
        }

        .faq-contact-form-mobile textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* FORUM SECTION */
        .forum-section {
            padding: 4rem 5%;
            background: #d4f1f4;
        }

        .forum-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .forum-card {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
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
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            font-weight: bold;
            color: white;
            flex-shrink: 0;
        }

        .forum-card h4 {
            font-size: clamp(0.95rem, 2.5vw, 1.1rem);
        }

        .forum-card p {
            font-size: clamp(0.85rem, 2vw, 0.95rem);
            line-height: 1.6;
        }

        .forum-cta {
            text-align: center;
            margin-top: 3rem;
        }

        .forum-cta h3 {
            font-size: clamp(1.3rem, 4vw, 1.8rem);
            margin-bottom: 1rem;
        }

        .forum-cta p {
            color: #666;
            margin-bottom: 2rem;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        /* FOOTER */
        footer {
            background: #f7e92b;
            color: #333;
            padding: 3rem 5%;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-content h4 {
            margin-bottom: 1rem;
            font-size: clamp(1rem, 2.5vw, 1.2rem);
        }

        .footer-content p {
            font-size: clamp(0.85rem, 2vw, 0.95rem);
        }

        .footer-content a {
            color: #333;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            font-size: clamp(0.85rem, 2vw, 0.95rem);
        }

        .footer-bottom {
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            padding-top: 2rem;
            text-align: center;
            font-size: clamp(0.8rem, 2vw, 0.9rem);
        }

        /* MODAL */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-content {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .modal-icon {
            font-size: clamp(3rem, 8vw, 4rem);
            margin-bottom: 1rem;
        }

        .modal-icon.success {
            color: #28a745;
        }

        .modal-icon.error {
            color: #dc3545;
        }

        .modal-title {
            font-size: clamp(1.2rem, 4vw, 1.5rem);
            margin-bottom: 0.5rem;
        }

        .modal-message {
            color: #666;
            margin-bottom: 1.5rem;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .modal-btn {
            background: #f39c12;
            color: #fff;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .error-text {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .hero,
            .story-grid,
            .why-learn-grid {
                grid-template-columns: 1fr;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .skills-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 1rem 3%;
            }

            .hamburger {
                display: flex;
            }

            nav {
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: #d4f1f4;
                flex-direction: column;
                gap: 0;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            nav.active {
                max-height: 500px;
            }

            nav a {
                padding: 1rem 5%;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
                width: 100%;
            }

            .hero {
                padding: 2rem 3% 4rem;
                gap: 2rem;
            }

            .stats,
            .pricing-grid,
            .testimonial-grid,
            .forum-grid,
            .skills-grid {
                grid-template-columns: 1fr;
                padding: 2rem 3%;
            }

            .story-section,
            .why-learn-section,
            .faq-contact-section,
            .forum-section,
            .pricing-section,
            .testimonial-section {
                padding: 2rem 3%;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }

            .feature-card,
            .skill-card {
                padding: 1.5rem;
            }

            .pricing-card {
                padding: 2rem;
                margin-bottom: 1rem;
            }

            .pricing-card:hover {
                transform: translateY(-5px);
            }

            .faq-item {
                padding: 1rem 1.5rem;
            }

            .story-grid {
                gap: 2rem;
            }

            .why-learn-grid {
                gap: 2rem;
            }

            /* Grid responsive untuk mobile */
            .grid {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(6, auto);
                gap: 12px;
            }

            .item-0,
            .item-1,
            .item-2,
            .item-3,
            .item-4,
            .item-5 {
                grid-column: 1 / span 1;
                grid-row: auto;
            }

            .item-0 { grid-row: 1 / span 1; }
            .item-1 { grid-row: 2 / span 1; }
            .item-2 { grid-row: 3 / span 1; }
            .item-3 { grid-row: 4 / span 1; }
            .item-4 { grid-row: 5 / span 1; }
            .item-5 { grid-row: 6 / span 1; }

            /* Desktop Layout - Tampil di atas 768px */
            .faq-contact-mobile {
                display: none;
            }

            .faq-contact-desktop {
                display: block;
            }
        }

        @media (min-width: 768px) {
            .grid {
                grid-template-columns: repeat(6, 1fr);
                grid-template-rows: repeat(6, 1fr);
                gap: 16px;
            }

            .mobile-only {
                display: none;
            }

            .desktop-only {
                display: block;
            }

            .item-0 {
                grid-column: 1 / span 4;
                grid-row: 1 / span 4;
            }

            .item-1 {
                grid-column: 5 / span 2;
                grid-row: 1 / span 2;
            }

            .item-2 {
                grid-column: 5 / span 2;
                grid-row: 3 / span 2;
            }

            .item-3 {
                grid-column: 1 / span 2;
                grid-row: 5 / span 2;
            }

            .item-4 {
                grid-column: 3 / span 2;
                grid-row: 5 / span 2;
            }

            .item-5 {
                grid-column: 5 / span 2;
                grid-row: 5 / span 2;
            }

            /* Mobile Layout - Tampil di bawah 768px */
            .faq-contact-mobile {
                display: none;
            }

            .faq-contact-desktop {
                display: block;
            }
        }

        @media (max-width: 480px) {
            header {
                padding: 0.8rem 3%;
            }

            .logo {
                font-size: 1rem;
            }

            .hero {
                padding: 1.5rem 3% 3rem;
            }

            .stats {
                gap: 1rem;
                padding: 2rem 3%;
            }

            .stat-card {
                padding: 1rem;
            }

            .story-section,
            .why-learn-section {
                padding: 2rem 3%;
            }

            .features-grid {
                gap: 1rem;
            }

            .feature-card {
                padding: 1.5rem;
            }

            .testimonial-card,
            .forum-card {
                padding: 1.5rem;
            }

            .faq-contact-form,
            .faq-contact-form-mobile {
                padding: 1.5rem;
            }

            .pricing-card {
                padding: 1.5rem;
            }

            .modal-content {
                padding: 1.5rem;
            }

            /* Mobile Layout - Tampil di bawah 768px */
            .faq-contact-mobile {
                display: block;
            }

            .faq-contact-desktop {
                display: none;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <span class="logo-box">■</span>
            <span>WALUYA LAND</span>
        </div>
        <button class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <nav id="navMenu">
            <a href="#home">About</a>
            <a href="#pricing">Pricing</a>
            <a href="#testimonial">Testimonial</a>
            <a href="#contact" class="btn-kickstarter">Kontak Kami</a>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Belajar Kewirausahaan Dengan Bermain</h1>
            <p>Sebuah permainan papan inovatif yang mengubah konsep bisnis yang kompleks menjadi pengalaman belajar yang
                menarik, interaktif bagi siswa dan profesional.</p>
            <a href="#pricing" class="btn-primary">Dapatkan Sekarang</a>
        </div>
        <div class="hero-image">
            <div class="board-placeholder">
                <!-- Hero Media - Menggunakan data dari database -->
                <?php
                // Simulasi data dari database
                $heroMedia = [
                    'file_path' => 'media/1763390552_drifting-di-bunderan-hi-tantangan-besar-untuk-garasi-drift-dan-fitra-eri.mp4',
                    'type' => 'video',
                    'title' => 'Drifting di Bunderan HI'
                ];
                ?>
                <?php if ($heroMedia && $heroMedia['type'] === 'video'): ?>
                    <video controls autoplay muted loop class="hero-image-original">
                        <source src="<?php echo $heroMedia['file_path']; ?>" type="video/mp4">
                        Browser Anda tidak mendukung video.
                    </video>
                <?php else: ?>
                    <img src="https://via.placeholder.com/800x600/7cb342/ffffff?text=Waluya+Land+Board+Game"
                         alt="Waluya Land Board Game" class="hero-image-original">
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section id="home" class="stats">
        <div class="stat-card">
            <h3>85%</h3>
            <p>Kepuasan user sejauh ini saat bermain</p>
        </div>
        <div class="stat-card">
            <h3>50+</h3>
            <p>Sekolah dan siswa yang sudah menekankannya</p>
        </div>
        <div class="stat-card">
            <h3>80%</h3>
            <p>Membantu mereka dari pengalaman baru</p>
        </div>
        <div class="stat-card">
            <h3>87%</h3>
            <p>Meningkatkan pemahaman pembelajaran</p>
        </div>
    </section>

    <section class="story-section">
        <div class="story-grid">
            <div class="story-image">
                <!-- Story Media -->
                <?php
                $storyMedia = [
                    'file_path' => 'media/1763435257_screenshot-2024-12-21-213113.png',
                    'type' => 'image',
                    'title' => 'Cerita Waluya Land'
                ];
                ?>
                <?php if ($storyMedia && $storyMedia['type'] === 'image'): ?>
                    <img src="<?php echo $storyMedia['file_path']; ?>"
                         alt="<?php echo $storyMedia['title']; ?>" class="image-original">
                <?php else: ?>
                    <img src="https://via.placeholder.com/350x350/d4f1f4/333333?text=Story+Image"
                         alt="Story" class="image-original">
                <?php endif; ?>
            </div>
            <div class="story-content">
                <span class="story-badge">Background</span>
                <h2>Cerita di Balik GameBoard</h2>
                <p>Terlatir dari ide para tenaga pendidikan didalam kewirausahaan dalam kehidupan untuk memulai
                    pendidikan kewirausahaan ini lebih menarik, interaktif dan praktis sebagai alat pembelajaran melalui
                    permainan papan kami menyajikan kesempatan antara teori pelajaran dan implementasi di lapangan</p>
            </div>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">💡</div>
                <h3>Problem Solving</h3>
                <p>Dapat membantu siswa menyebarkan kebutuhan untuk pembelajaran interaktif dalam pendidikan bisnis.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3>Kolaborasi</h3>
                <p>Mendorong kerja tim antar industri secara efektif</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3>Pengalaman Praktis</h3>
                <p>Dorong para mengambil proyek kewirausahaan dalam membuat konsep bisnis yang kompleks menjadi mudah
                    dipahami dan menyenangkan bagi semua peserta didik</p>
            </div>
        </div>
    </section>

    <!-- BAGIAN MENGAPA BELAJAR KEWIRAUSAHAAN YANG DIPERBAIKI -->
    <section class="why-learn-section">
        <div class="why-learn-grid">
            <div class="why-learn-media">
                <!-- Why Learn Media -->
                <?php
                $whyLearnMedia = [
                    'file_path' => 'media/1763435325_screenshot-2025-08-26-195732.png',
                    'type' => 'image',
                    'title' => 'Belajar Kewirausahaan'
                ];
                ?>
                <?php if ($whyLearnMedia && $whyLearnMedia['type'] === 'image'): ?>
                    <img src="<?php echo $whyLearnMedia['file_path']; ?>"
                         alt="Belajar Kewirausahaan" class="image-original">
                <?php else: ?>
                    <img src="https://via.placeholder.com/600x400/d4f1f4/333333?text=Belajar+Kewirausahaan"
                         alt="Belajar Kewirausahaan" class="image-original">
                <?php endif; ?>
            </div>
            <div class="why-learn-content">
                <h2>Mengapa Belajar Kewirausahaan Melalui Permainan Papan?</h2>

                <div class="why-learn-item">
                    <strong>① Pengalaman Belajar Interaktif dan Praktis</strong>
                    <p>Melatih pengambilan keputusan dan presentasi bisnis dengan feedback langsung</p>
                </div>

                <div class="why-learn-item">
                    <strong>② Real-Case Skenario</strong>
                    <p>Hadapi tantangan berdasarkan situasi bisnis nyata</p>
                </div>

                <div class="why-learn-item">
                    <strong>③ Belajar Kolaboratif</strong>
                    <p>Kembangkan strategi dan komunikasi sambil bersinergi dan bekerja sama dengan orang lain</p>
                </div>
            </div>
        </div>
    </section>

    <!-- BAGIAN KETERAMPILAN YANG AKAN DIDAPATKAN - DARI CODE 1 -->
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

    <!-- BAGIAN FITUR UNGGULAN DENGAN LAYOUT ZIGZAG -->
    <section id="features" style="padding:4rem 5%; background:#d4f1f4;">
        <span class="story-badge">Features</span>
        <h2 class="section-title">Fitur Unggulan</h2>

        <div class="features-zigzag">
            <?php
            // Data fitur dari database
            $featuresMedia = [
                [
                    'file_path' => 'media/1763420472_game.png',
                    'type' => 'image',
                    'title' => 'Game Interaktif',
                    'description' => 'Pengalaman belajar yang menyenangkan melalui permainan papan interaktif'
                ],
                [
                    'file_path' => 'media/1763428970_puzzle.png',
                    'type' => 'image',
                    'title' => 'Puzzle Bisnis',
                    'description' => 'Memecahkan tantangan bisnis melalui puzzle yang menarik'
                ],
                [
                    'file_path' => 'media/1763551047_drifting-di-bunderan-hi-tantangan-besar-untuk-garasi-drift-dan-fitra-eri.mp4',
                    'type' => 'video',
                    'title' => 'Simulasi Bisnis',
                    'description' => 'Video simulasi situasi bisnis nyata untuk pembelajaran praktis'
                ],
                [
                    'file_path' => 'media/1763647456_screenshot-2024-10-27-201427.png',
                    'type' => 'image',
                    'title' => 'Analisis Pasar',
                    'description' => 'Belajar menganalisis pasar dan peluang bisnis'
                ]
            ];
            ?>

            <?php foreach($featuresMedia as $index => $item): ?>
                <div class="feature-row">
                    <div class="feature-media-box">
                        <?php if ($item['type'] === 'video'): ?>
                            <video controls class="feature-image-original">
                                <source src="<?php echo $item['file_path']; ?>" type="video/mp4">
                                Browser Anda tidak mendukung video.
                            </video>
                        <?php else: ?>
                            <img src="<?php echo $item['file_path']; ?>"
                                 alt="<?php echo $item['title']; ?>" class="feature-image-original">
                        <?php endif; ?>
                    </div>
                    <div class="feature-text-box">
                        <h3><?php echo $item['title']; ?></h3>
                        <p><?php echo $item['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div style="text-align: center; margin-top: 3rem;">
            <a href="#pricing" class="btn-primary">Dapatkan Sekarang</a>
        </div>
    </section>

    <!-- BAGIAN AKTIVITAS DENGAN GRID LAYOUT BARU -->
    <section id="aktivitas" style="padding:4rem 5%;background:#fff;">
        <h2 class="section-title">Aktivitas Terbaru & Tutorial</h2>
        <p class="section-subtitle">Kumpulan aktivitas bermain GameBoard & bagaimana kita menggunakannya</p>

        <div class="grid">
            <?php
            // Data aktivitas dari database
            $aktivitasMedia = [
                [
                    'file_path' => 'media/1763520501_screenshot-2025-11-18-152818.png',
                    'type' => 'image',
                    'title' => 'Aktivitas 1'
                ],
                [
                    'file_path' => 'media/1763551717_screenshot-2025-06-24-185842.png',
                    'type' => 'image',
                    'title' => 'Aktivitas 2'
                ],
                [
                    'file_path' => 'media/1763642965_discover-15-virtual-background-zoom-and-zoom-background-design-ideas-education-resume-alumni-background-design-marketing-department-and-more.mp4',
                    'type' => 'video',
                    'title' => 'Aktivitas 3'
                ],
                [
                    'file_path' => 'media/1763643016_screenshot-2024-09-22-093910.png',
                    'type' => 'image',
                    'title' => 'Aktivitas 4'
                ],
                [
                    'file_path' => 'media/1763643039_screenshot-2025-06-27-103131.png',
                    'type' => 'image',
                    'title' => 'Aktivitas 5'
                ],
                [
                    'file_path' => 'media/1763868738_grid-layout.png',
                    'type' => 'image',
                    'title' => 'Aktivitas 6'
                ]
            ];
            ?>

            <?php foreach($aktivitasMedia as $index => $item): ?>
                <div class="item item-<?php echo $index; ?>">
                    <?php if ($item['type'] === 'video'): ?>
                        <video controls class="grid-image-original">
                            <source src="<?php echo $item['file_path']; ?>" type="video/mp4">
                            Browser Anda tidak mendukung video.
                        </video>
                    <?php else: ?>
                        <img src="<?php echo $item['file_path']; ?>"
                             alt="<?php echo $item['title']; ?>" class="grid-image-original">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="pricing" class="pricing-section">
        <span class="pricing-badge">Product</span>
        <h2 class="section-title">Main Sekaligus Belajar, Semua Dimulai dari Sini!</h2>
        <p class="section-subtitle">Tingkatkan pemahaman kewirausahaan lewat board game yang seru dan interaktif</p>

        <div class="pricing-grid">
            <!-- Product Card 1 -->
            <div class="pricing-card">
                <div class="product-image-container">
                    <?php
                    $productImage1 = [
                        'file_path' => 'media/1763420472_game.png',
                        'title' => 'Waluya Land'
                    ];
                    ?>
                    <?php if ($productImage1): ?>
                        <img src="<?php echo $productImage1['file_path']; ?>"
                             alt="<?php echo $productImage1['title']; ?>"
                             class="product-image-original">
                    <?php else: ?>
                        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #999;">
                            <div style="text-align: center;">
                                <div style="font-size: 3rem; margin-bottom: 0.5rem;">🎲</div>
                                <p>Waluya Land</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <h3>Waluya Land</h3>
                <div class="price">Rp 300.000</div>
                <p style="margin-bottom: 1rem;">Produk yang kamu dapatkan berisi:</p>
                <ul>
                    <li>1 set produk waluya land lengkap</li>
                    <li>1 kupon potongan harga</li>
                    <li>Buku panduan bermain</li>
                    <li>Akses tutorial online</li>
                </ul>
                <a href="https://wa.me/628986908167?text=Halo%20saya%20tertarik%20dengan%20produk%20Waluya%20Land!"
                   class="btn-primary"
                   style="display: block; text-align: center; margin-top: 1.5rem;"
                   target="_blank">Dapatkan Sekarang</a>
            </div>

            <!-- Product Card 2 -->
            <div class="pricing-card">
                <div class="product-image-container">
                    <?php
                    $productImage2 = [
                        'file_path' => 'media/1763428970_puzzle.png',
                        'title' => 'Waluya Land Premium'
                    ];
                    ?>
                    <?php if ($productImage2): ?>
                        <img src="<?php echo $productImage2['file_path']; ?>"
                             alt="<?php echo $productImage2['title']; ?>"
                             class="product-image-original">
                    <?php else: ?>
                        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: #666;">
                            <div style="text-align: center;">
                                <div style="font-size: 3rem; margin-bottom: 0.5rem;">⭐</div>
                                <p>Coming Soon</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <h3>Waluya Land Premium</h3>
                <div class="price">Rp 450.000</div>
                <p style="margin-bottom: 1rem;">Produk premium dengan fitur tambahan:</p>
                <ul>
                    <li>1 set produk waluya land premium</li>
                    <li>Kupon potongan harga 15%</li>
                    <li>Buku panduan lengkap</li>
                    <li>Akses workshop online</li>
                    <li>Konsultasi gratis</li>
                </ul>
                <a href="https://wa.me/628986908167?text=Halo%20saya%20tertarik%20dengan%20produk%20Waluya%20Land%20Premium!"
                   class="btn-primary"
                   style="display: block; text-align: center; margin-top: 1.5rem; background: #666;"
                   target="_blank">Pre-Order Sekarang</a>
            </div>
        </div>
    </section>

    <!-- BAGIAN TESTIMONIAL YANG DIPERBAIKI - MENAMPILKAN SEMUA USER -->
    <section id="testimonial" class="testimonial-section">
        <span class="story-badge">Testimoni</span>
        <h2 class="section-title">Apa yang Dikatakan Para Pemain</h2>
        <p class="section-subtitle">Feedback dan manfaat dari siswa</p>
        <div class="testimonial-grid">
            <?php
            // Data testimonial dari database - SEMUA DATA
            $testimonials = [
                ['name' => 'Yoga', 'email' => 'yoga@gmail.com', 'institution' => 'SMK', 'message' => 'Mantap rekomen'],
                ['name' => 'bowo', 'email' => 'bowo@gmail.com', 'institution' => 'abcd', 'message' => 'Rekomen budget pelajar'],
                ['name' => 'iqi lucu', 'email' => 'iqi@mail.com', 'institution' => 'SMAN', 'message' => 'AMAZING WOWW'],
                ['name' => 'IKI', 'email' => 'reno@gmail.com', 'institution' => 'SMAN', 'message' => 'MANTAP MANTP'],
                ['name' => 'reno', 'email' => 'reno@gmail.com', 'institution' => 'smp', 'message' => 'weaslidvcgegfkgkgf'],
                ['name' => 'BALIILL', 'email' => 'bot@gmail.com', 'institution' => 'negara', 'message' => 'asuuuuuuuuuuu'],
                ['name' => 'Minuman', 'email' => 'moraxx@gmail.com', 'institution' => 'pmr', 'message' => 'qwertkfkfkhghgj'],
                ['name' => 'yoga', 'email' => 'sasfsaf@gmail.com', 'institution' => 'DINAS', 'message' => 'sfgfhgjmhghfgdfsda?']
            ];
            ?>
            <?php foreach($testimonials as $testimonial): ?>
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">
                            <?php
                            // Ambil inisial dari nama
                            $names = explode(' ', $testimonial['name']);
                            $initials = '';
                            foreach($names as $n) {
                                $initials .= strtoupper(substr($n, 0, 1));
                            }
                            echo substr($initials, 0, 2); // Maksimal 2 huruf
                            ?>
                        </div>
                        <div>
                            <h4><?php echo htmlspecialchars($testimonial['name']); ?></h4>
                            <small style="color: #999;">
                                <?php echo htmlspecialchars($testimonial['institution'] ?? 'Pengguna'); ?>
                            </small>
                        </div>
                    </div>
                    <p>"<?php echo htmlspecialchars($testimonial['message']); ?>"</p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- BAGIAN FAQ DENGAN LAYOUT RESPONSIF -->
    <section id="contact" class="faq-contact-section">
        <h2 class="section-title">Frequently Asked Questions</h2>

        <!-- Mobile Layout (satu kolom) -->
        <div class="faq-contact-mobile">
            <div class="faq-accordion">
                <div class="faq-item" onclick="toggleFaq(this)">
                    <div>
                        <strong>Berlaku untuk siapa saja waluya land ini?</strong>
                        <div class="faq-answer"
                            style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                            Waluya Land dirancang untuk siswa SMA/SMK, mahasiswa, dan siapa saja yang ingin belajar
                            kewirausahaan dengan cara yang menyenangkan dan interaktif.
                        </div>
                    </div>
                </div>
                <div class="faq-item" onclick="toggleFaq(this)">
                    <div>
                        <strong>Adakah panduan bermain bagi kami?</strong>
                        <div class="faq-answer"
                            style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                            Ya, setiap paket Waluya Land dilengkapi dengan buku panduan lengkap yang menjelaskan aturan
                            permainan dan cara bermain.
                        </div>
                    </div>
                </div>
                <div class="faq-item" onclick="toggleFaq(this)">
                    <div>
                        <strong>Capaian pelajaran apa yang terpenuhi oleh Waluya Land?</strong>
                        <div class="faq-answer"
                            style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                            Waluya Land membantu mencapai kompetensi pemahaman kewirausahaan, problem solving, kerja
                            tim, dan pengambilan keputusan bisnis.
                        </div>
                    </div>
                </div>
                <div class="faq-item" onclick="toggleFaq(this)">
                    <div>
                        <strong>Apa waluya land ini?</strong>
                        <div class="faq-answer"
                            style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                            Waluya Land adalah board game edukatif yang mengajarkan konsep kewirausahaan dan bisnis
                            melalui permainan interaktif.
                        </div>
                    </div>
                </div>
                <div class="faq-item" onclick="toggleFaq(this)">
                    <div>
                        <strong>Apakah berlaku untuk semua kejuruan?</strong>
                        <div class="faq-answer"
                            style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                            Ya, Waluya Land dirancang fleksibel dan dapat disesuaikan dengan berbagai kurikulum
                            pendidikan dan kejuruan.
                        </div>
                    </div>
                </div>
            </div>

            <div class="faq-contact-form-mobile">
                <p style="margin-bottom: 1.5rem; color: #666; text-align: center;">Punya pertanyaan lain? silahkan cantumkan disini</p>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                    @error('name')
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
        </div>

        <!-- Desktop Layout (2 kolom - tetap seperti sebelumnya) -->
        <div class="faq-contact-desktop">
            <div class="faq-contact-grid">
                <div class="faq-contact-form">
                    <p style="margin-bottom: 1.5rem; color: #666;">Punya pertanyaan lain? silahkan cantumkan disini!</p>
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
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

                <div class="faq-accordion">
                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div>
                            <strong>Berlaku untuk siapa saja waluya land ini?</strong>
                            <div class="faq-answer"
                                style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                                Waluya Land dirancang untuk siswa SMA/SMK, mahasiswa, dan siapa saja yang ingin belajar
                                kewirausahaan dengan cara yang menyenangkan dan interaktif.
                            </div>
                        </div>
                    </div>
                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div>
                            <strong>Adakah panduan bermain bagi kami?</strong>
                            <div class="faq-answer"
                                style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                                Ya, setiap paket Waluya Land dilengkapi dengan buku panduan lengkap yang menjelaskan aturan
                                permainan dan cara bermain.
                            </div>
                        </div>
                    </div>
                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div>
                            <strong>Capaian pelajaran apa yang terpenuhi oleh Waluya Land?</strong>
                            <div class="faq-answer"
                                style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                                Waluya Land membantu mencapai kompetensi pemahaman kewirausahaan, problem solving, kerja
                                tim, dan pengambilan keputusan bisnis.
                            </div>
                        </div>
                    </div>
                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div>
                            <strong>Apa waluya land ini?</strong>
                            <div class="faq-answer"
                                style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                                Waluya Land adalah board game edukatif yang mengajarkan konsep kewirausahaan dan bisnis
                                melalui permainan interaktif.
                            </div>
                        </div>
                    </div>
                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div>
                            <strong>Apakah berlaku untuk semua kejuruan?</strong>
                            <div class="faq-answer"
                                style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                                Ya, Waluya Land dirancang fleksibel dan dapat disesuaikan dengan berbagai kurikulum
                                pendidikan dan kejuruan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BAGIAN FORUM YANG DIPERBAIKI - MENAMPILKAN SEMUA USER -->
    <section class="forum-section">
        <span class="story-badge">Forum</span>
        <h2 class="section-title">Forum Terbuka untuk Tanya, Saran, dan Insight</h2>
        <p class="section-subtitle">Punya ide, saran, atau pertanyaan untuk kami? ajukan pertanyaan langsung pada tim
            kami</p>
        <div class="forum-grid">
            <?php
            // Untuk forum, kita bisa menampilkan semua data atau data tertentu
            // Contoh: tampilkan 6 data pertama untuk forum
            $forumPosts = array_slice($testimonials, 0, 6);
            ?>
            <?php foreach($forumPosts as $post): ?>
                <div class="forum-card">
                    <div class="forum-header">
                        <div class="forum-avatar">
                            <?php
                            $names = explode(' ', $post['name']);
                            $initials = '';
                            foreach($names as $n) {
                                $initials .= strtoupper(substr($n, 0, 1));
                            }
                            echo substr($initials, 0, 2);
                            ?>
                        </div>
                        <div>
                            <h4><?php echo htmlspecialchars($post['name']); ?></h4>
                            <small style="color: #999;">
                                <?php echo htmlspecialchars($post['institution'] ?? 'Pengguna'); ?>
                            </small>
                            <br>
                            <small style="color: #999;">
                                <?php echo htmlspecialchars($post['email']); ?>
                            </small>
                        </div>
                    </div>
                    <p>"<?php echo htmlspecialchars($post['message']); ?>"</p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="forum-cta">
            <h3>Siap untuk mengubah pengalaman belajar Anda?</h3>
            <p>Bergabunglah dengan ribuan siswa dan pendidik yang sudah menggunakan Waluya Land</p>
            <a href="https://wa.me/628986908167?text=Halo%20saya%20tertarik%20dengan%20produk%20Waluya%20Land!"
                class="btn-primary" style="padding: 1.2rem 3rem;" target="_blank">Dapatkan Sekarang</a>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div>
                <h4>📚 Waluya Land</h4>
                <p>Making entrepreneurship education engaging and accessible through innovative board games</p>
            </div>
            <div>
                <h4>Product</h4>
                <a href="#features">Features</a>
                <a href="#pricing">Pricing</a>
            </div>
            <div>
                <h4>Support</h4>
                <a href="#contact">Contact Us</a>
                <a href="#testimonial">Testimonials</a>
            </div>
            <div>
                <h4>Dapatkan di e-commerce</h4>
                <div style="display: flex; gap: 1rem; margin-top: 0.5rem;">
                    <a href="https://shopee.co.id" target="_blank">
                        <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/shopee.svg"
                            alt="Shopee"
                            style="height: 35px; filter: invert(38%) sepia(86%) saturate(2798%) hue-rotate(354deg) brightness(96%) contrast(93%);">
                    </a>
                    <a href="https://www.tokopedia.com" target="_blank">
                        <img src="https://cdn.brandfetch.io/idoruRsDhk/theme/dark/symbol.svg?c=1dxbfHSJFAPEGdCLU4o5B"
                            alt="Tokopedia" style="height: 35px;">
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 Waluya Land. All rights reserved.</p>
        </div>
    </footer>

    <div class="modal-overlay" id="notificationModal">
        <div class="modal-content">
            <div class="modal-icon success" id="modalIcon">✓</div>
            <h3 class="modal-title" id="modalTitle">Pesan Terkirim!</h3>
            <p class="modal-message" id="modalMessage">Terima kasih telah menghubungi kami.</p>
            <button class="modal-btn" onclick="closeModal()">OK</button>
        </div>
    </div>

    <script>
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navMenu');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        function toggleFaq(element) {
            element.classList.toggle('active');
            const answer = element.querySelector('.faq-answer');
            if (element.classList.contains('active')) {
                answer.style.display = 'block';
            } else {
                answer.style.display = 'none';
            }
        }

        function showModal(type, title, message) {
            const modal = document.getElementById('notificationModal');
            const icon = document.getElementById('modalIcon');
            const modalTitle = document.getElementById('modalTitle');
            const modalMessage = document.getElementById('modalMessage');

            modalTitle.textContent = title;
            modalMessage.textContent = message;

            if (type === 'success') {
                icon.textContent = '✓';
                icon.className = 'modal-icon success';
            } else if (type === 'error') {
                icon.textContent = '✕';
                icon.className = 'modal-icon error';
            }

            modal.classList.add('show');
        }

        function closeModal() {
            document.getElementById('notificationModal').classList.remove('show');
        }

        document.getElementById('notificationModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Handle broken images
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('img');
            images.forEach(img => {
                img.addEventListener('error', function() {
                    // Replace broken images with placeholder
                    if (this.classList.contains('product-image-original')) {
                        this.src = 'https://via.placeholder.com/800x600/7cb342/ffffff?text=Waluya+Land';
                    } else {
                        this.src = 'https://via.placeholder.com/800x600/d4f1f4/333333?text=Image+Not+Found';
                    }
                });
            });

            // Force image reload if they fail to load
            setTimeout(() => {
                images.forEach(img => {
                    if (!img.complete || img.naturalHeight === 0) {
                        const originalSrc = img.src;
                        img.src = '';
                        img.src = originalSrc;
                    }
                });
            }, 1000);
        });
    </script>
</body>
</html>
