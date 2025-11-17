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

        .board-placeholder img,
        .board-placeholder video {
            width: 100%;
            height: auto;
            display: block;
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

        .story-image img,
        .story-image video {
            width: 100%;
            height: auto;
            display: block;
        }

        .story-content h2 {
            font-size: clamp(1.5rem, 4vw, 2rem);
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
            height: 300px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .why-learn-media img,
        .why-learn-media video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .why-learn-content h2 {
            font-size: clamp(1.5rem, 4vw, 2rem);
            margin-bottom: 1rem;
        }

        .why-learn-item {
            margin-bottom: 1.5rem;
        }

        .why-learn-item strong {
            display: block;
            margin-bottom: 0.5rem;
            font-size: clamp(0.95rem, 2vw, 1.05rem);
        }

        .why-learn-item p {
            color: #666;
            font-size: clamp(0.85rem, 2vw, 0.95rem);
        }

        /* MEDIA GRID */
        .media-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            padding: 4rem 5%;
        }

        .media-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s;
        }

        .media-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }

        .media-wrapper {
            width: 100%;
            background: #f5f5f5;
            overflow: hidden;
        }

        .media-wrapper img,
        .media-wrapper video {
            width: 100%;
            height: auto;
            display: block;
            aspect-ratio: 16/9;
            object-fit: cover;
        }

        .media-content {
            padding: 1.5rem;
        }

        .media-content h5 {
            margin-bottom: 0.5rem;
            font-size: clamp(1rem, 2.5vw, 1.1rem);
        }

        .media-content p {
            color: #666;
            font-size: clamp(0.85rem, 2vw, 0.95rem);
            line-height: 1.6;
        }

        /* SKILLS GRID */
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

        /* ACTIVITY GRID */
        .activity-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            padding: 4rem 5%;
        }

        .activity-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s;
        }

        .activity-card:hover {
            transform: translateY(-5px);
        }

        .activity-wrapper {
            width: 100%;
            background: #f5f5f5;
            overflow: hidden;
        }

        .activity-wrapper img,
        .activity-wrapper video {
            width: 100%;
            height: auto;
            display: block;
            aspect-ratio: 3/2;
            object-fit: cover;
        }

        .activity-content {
            padding: 1.2rem;
        }

        .activity-content h5 {
            margin-bottom: 0.5rem;
            font-size: clamp(0.95rem, 2.5vw, 1rem);
        }

        .activity-content p {
            color: #666;
            font-size: clamp(0.85rem, 2vw, 0.9rem);
            line-height: 1.5;
        }

        /* PLACEHOLDER */
        .placeholder {
            width: 100%;
            aspect-ratio: 16/9;
            background: #eaeaea;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            font-weight: 600;
            font-size: clamp(0.85rem, 2vw, 1rem);
        }

        /* PRICING SECTION */
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
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
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
            font-size: clamp(1.2rem, 3vw, 1.5rem);
        }

        .pricing-card .price {
            font-size: clamp(1.5rem, 4vw, 1.8rem);
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .pricing-card p {
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .pricing-card ul {
            list-style: none;
            margin: 1.5rem 0;
        }

        .pricing-card ul li {
            padding: 0.5rem 0;
            font-size: clamp(0.85rem, 2vw, 0.95rem);
        }

        .pricing-card ul li::before {
            content: "• ";
            margin-right: 0.5rem;
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
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .testimonial-card h4 {
            font-size: clamp(0.95rem, 2.5vw, 1.1rem);
        }

        .testimonial-card p {
            font-size: clamp(0.85rem, 2vw, 0.95rem);
            line-height: 1.6;
        }

        /* FAQ SECTION */
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
        }

        .faq-item strong {
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        .faq-item::after {
            content: "▼";
            float: right;
            transition: transform 0.3s;
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
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
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
            .faq-contact-grid,
            .why-learn-grid {
                grid-template-columns: 1fr;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .features-grid {
                grid-template-columns: 1fr;
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
            .skills-grid,
            .pricing-grid,
            .testimonial-grid,
            .forum-grid,
            .media-grid,
            .activity-grid {
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

            .why-learn-media {
                height: 250px;
            }

            .feature-card,
            .skill-card {
                padding: 1.5rem;
            }

            .pricing-card {
                padding: 2rem;
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

            .faq-contact-grid {
                gap: 2rem;
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

            .media-grid,
            .activity-grid {
                gap: 1.5rem;
            }

            .testimonial-card,
            .forum-card {
                padding: 1.5rem;
}

            .faq-contact-form {
                padding: 1.5rem;
            }

            .pricing-card {
                padding: 1.5rem;
            }

            .modal-content {
                padding: 1.5rem;
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
                @php
                    $heroMedia = $heroMedia ?? null;
                @endphp
                @if ($heroMedia)
                    @if ($heroMedia->isImage())
                        <img src="{{ $heroMedia->file_path }}" alt="{{ $heroMedia->title ?? 'Board Game' }}">
                    @elseif($heroMedia->isVideo())
                        <video controls autoplay muted loop>
                            <source src="{{ $heroMedia->file_path }}" type="{{ $heroMedia->mime_type }}">
                        </video>
                    @endif
                @else
                    <img src="https://via.placeholder.com/800x600/7cb342/ffffff?text=Board+Game" alt="Board Game">
                @endif
            </div>
        </div>
    </section>

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

    <section class="story-section">
        <div class="story-grid">
            <div class="story-image">
                @php $storyMedia = $storyMedia ?? null; @endphp
                @if ($storyMedia)
                    @if ($storyMedia->isImage())
                        <img src="{{ asset($storyMedia->file_path) }}" alt="{{ $storyMedia->title ?? 'Story' }}">
                    @elseif($storyMedia->isVideo())
                        <video controls>
                            <source src="{{ asset($storyMedia->file_path) }}" type="{{ $storyMedia->mime_type }}">
                        </video>
                    @endif
                @else
                    <img src="https://via.placeholder.com/350x350/d4f1f4/333333?text=Story+Image" alt="Story">
                @endif
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
                <p>Dorong para mengambil proyek kewirausahaan dalam membuat konsep bisnis yang kompleks menjadi mudah
                    dipahami dan menyenangkan bagi semua peserta didik</p>
            </div>
        </div>
    </section>

    @foreach ($whyLearnMedias as $index => $media)
        @if ($index == 0)
            <section class="why-learn-section">
                <div class="why-learn-grid">
                    <div class="why-learn-media">
                        @if ($media->isImage())
                            <img src="{{ asset($media->file_path) }}" alt="{{ $media->title ?? 'Why Learn' }}">
                        @elseif($media->isVideo())
                            <video controls>
                                <source src="{{ asset($media->file_path) }}" type="{{ $media->mime_type }}">
                            </video>
                        @endif
                    </div>
                    <div class="why-learn-content">
                        <h2>Mengapa Belajar Kewirausahaan Melalui Permainan Papan?</h2>
                        <div class="why-learn-item">
                            <strong>① Pengalaman Belajar Interaktif dan Praktis</strong>
                            <p>Melalui pengalaman keputusan dan presentasi bisnis dengan feedback langsung</p>
                        </div>
                        <div class="why-learn-item">
                            <strong>② Real-Case Scenario</strong>
                            <p>Koleksi tantangan berdasarkan situasi bisnis nyata</p>
                        </div>
                        <div class="why-learn-item">
                            <strong>③ Belajar Kolaboratif</strong>
                            <p>Bermain dengan strategi tim akan bersama dan bekerja sama dengan orang lain.</p>
                        </div>
                    </div>
                </div>
            </section>
        @elseif($index == 1)
            <section class="why-learn-section">
                <div class="why-learn-grid">
                    <div class="why-learn-media">
                        @if ($media->isImage())
                            <img src="{{ asset($media->file_path) }}" alt="{{ $media->title ?? 'Why Learn' }}">
                        @elseif($media->isVideo())
                            <video controls>
                                <source src="{{ asset($media->file_path) }}" type="{{ $media->mime_type }}">
                            </video>
                        @endif
                    </div>
                    <div class="why-learn-content">
                        <h2>Mengapa Belajar Kewirausahaan Melalui Permainan Papan?</h2>
                        <div class="why-learn-item">
                            <strong>① Pengalaman Belajar Interaktif dan Praktis</strong>
                            <p>Melalui pengalaman keputusan dan presentasi bisnis dengan feedback langsung</p>
                        </div>
                        <div class="why-learn-item">
                            <strong>② Real-Case Scenario</strong>
                            <p>Koleksi tantangan berdasarkan situasi bisnis nyata</p>
                        </div>
                        <div class="why-learn-item">
                            <strong>③ Belajar Kolaboratif</strong>
                            <p>Bermain dengan strategi tim akan bersama dan bekerja sama dengan orang lain.</p>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach

    <section id="features" style="padding:4rem 5%; background:#f8f9fa;">
        <h2 class="section-title">Fitur Unggulan</h2>
        <div class="media-grid">
            @for ($i = 0; $i < 4; $i++)
                @php $item = $featuresMedia[$i] ?? null; @endphp
                <div class="media-card">
                    @if ($item)
                        <div class="media-wrapper">
                            @if ($item->isImage())
                                <img src="{{ $item->file_path }}" alt="{{ $item->title }}">
                            @elseif($item->isVideo())
                                <video controls>
                                    <source src="{{ $item->file_path }}" type="{{ $item->mime_type }}">
                                </video>
                            @endif
                        </div>
                        <div class="media-content">
                            <h5>{{ $item->title }}</h5>
                            <p>{{ $item->description }}</p>
                        </div>
                    @else
                        <div class="media-wrapper">
                            <div class="placeholder">Slot Kosong</div>
                        </div>
                        <div class="media-content">
                            <h5>Slot Fitur {{ $i + 1 }}</h5>
                            <p>Tambahkan fitur di admin panel</p>
                        </div>
                    @endif
                </div>
            @endfor
        </div>
    </section>

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

    <section id="aktivitas" style="padding:4rem 5%;background:#fff;">
        <h2 class="section-title">Aktivitas & Tutorial</h2>
        <div class="activity-grid">
            @for ($i = 0; $i < 6; $i++)
                @php $item = $aktivitasMedia[$i] ?? null; @endphp
                <div class="activity-card">
                    @if ($item)
                        <div class="activity-wrapper">
                            @if ($item->isImage())
                                <img src="{{ $item->file_path }}" alt="{{ $item->title }}">
                            @elseif($item->isVideo())
                                <video controls>
                                    <source src="{{ $item->file_path }}" type="{{ $item->mime_type }}">
                                </video>
                            @endif
                        </div>
                        <div class="activity-content">
                            <h5>{{ $item->title }}</h5>
                            <p>{{ $item->description }}</p>
                        </div>
                    @else
                        <div class="activity-wrapper">
                            <div class="placeholder">Slot Kosong</div>
                        </div>
                        <div class="activity-content">
                            <h5>Slot Aktivitas {{ $i + 1 }}</h5>
                            <p>Tambahkan aktivitas di admin panel</p>
                        </div>
                    @endif
                </div>
            @endfor
        </div>
    </section>

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
                <a href="https://wa.me/628986908167?text=Halo%20saya%20tertarik%20dengan%20produk%20Waluya%20Land!"
                    class="btn-primary" target="_blank">Dapatkan Sekarang</a>
            </div>
            <div class="pricing-card">
                <h3>Waluya Land</h3>
                <p class="price">Rp 300.000</p>
                <p>Produk yang baru dapatkan belajar seperti:</p>
                <ul>
                    <li>1 set produk waluya land</li>
                    <li>1 kupon potongan harga</li>
                </ul>
                <a href="https://wa.me/628986908167?text=Halo%20saya%20tertarik%20dengan%20produk%20Waluya%20Land!"
                    class="btn-primary" target="_blank">Dapatkan Sekarang</a>
            </div>
        </div>
    </section>

    <section id="testimonial" class="testimonial-section">
        <span class="story-badge">Testimoni</span>
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
                    <p>"Permainan ini telah mengubah cara saya mengajar kewirausahaan. Siswa menjadi lebih tertarik dan
                        memahami konsep dengan jauh lebih baik."</p>
                </div>
            @endforelse
        </div>
    </section>

    <section id="contact" class="faq-contact-section">
        <h2 class="section-title">Frequently Asked Questions</h2>
        <div class="faq-contact-grid">
            <div class="faq-contact-form">
                <p style="margin-bottom: 1.5rem; color: #666;">Punya pertanyaan lain? silahkan cantumkan disini!</p>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}"
                        required>
                    @error('name')
                        <span class="error-text">{{ $message }}</span>
                    @enderror

                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error-text">{{ $message }}</span>
                    @enderror

                    <input type="text" name="institution" placeholder="Instansi"
                        value="{{ old('institution') }}">
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
                        <strong>Beriaku untuk siapa saja waluya land ini?</strong>
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
                        <strong>Capaian pelajaran apa yang terpenuhi?</strong>
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
                        <strong>Apakah berlaku untuk semua kurikulum?</strong>
                        <div class="faq-answer"
                            style="display: none; margin-top: 0.5rem; color: #666; font-weight: normal;">
                            Ya, Waluya Land dirancang fleksibel dan dapat disesuaikan dengan berbagai kurikulum
                            pendidikan.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="forum-section">
        <span class="story-badge">Forum</span>
        <h2 class="section-title">Forum Terbuka untuk Tanya, Saran, dan Insight</h2>
        <p class="section-subtitle">Punya ide, saran, atau pertanyaan untuk kami? ajukan pertanyaan langsung pada tim
            kami</p>
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
                    <p>"Permainan ini telah mengubah cara saya mengajar kewirausahaan."</p>
                </div>
            @endforelse
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

        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                showModal('success', 'Pesan Terkirim!', '{{ session('success') }}');
            @endif

            @if (session('error'))
                showModal('error', 'Terjadi Kesalahan', '{{ session('error') }}');
            @endif
        });
    </script>
</body>

</html>
