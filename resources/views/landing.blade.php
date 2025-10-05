<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>GameBoard - Alat Perencanaan Bisnis Interaktif</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
      scroll-behavior: smooth;
    }

    .dashed-border {
      border: 2px dashed #a855f7;
      border-radius: 12px;
    }

    @media (min-width: 768px) {
      .dashed-border {
        border-width: 3px;
      }
    }

    /* Loading Screen Styles */
    #loadingScreen {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #ffffff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      transition: opacity 0.5s ease-out;
    }

    .loader {
      width: 50px;
      height: 50px;
      border: 5px solid #f3f4f6;
      border-top: 5px solid #8b5cf6;
      border-radius: 50%;
      animation: spin 1s linear infinite;
      margin-bottom: 20px;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .loading-text {
      font-size: 18px;
      color: #4b5563;
      margin-bottom: 10px;
    }

    .loading-progress {
      width: 200px;
      height: 4px;
      background-color: #e5e7eb;
      border-radius: 2px;
      overflow: hidden;
    }

    .loading-progress-bar {
      height: 100%;
      width: 0%;
      background-color: #8b5cf6;
      animation: progress 2s ease-in-out forwards;
    }

    @keyframes progress {
      0% { width: 0%; }
      100% { width: 100%; }
    }

    /* Animasi untuk elemen saat muncul */
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .fade-in.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* Styling untuk card fitur */
    .feature-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Gradient untuk CTA */
    .gradient-bg {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
  </style>
</head>
<body class="bg-gray-50">
  <!-- Loading Screen -->
  <div id="loadingScreen">
    <div class="loader"></div>
    <div class="loading-text">Memuat GameBoard...</div>
    <div class="loading-progress">
      <div class="loading-progress-bar"></div>
    </div>
  </div>

  <!-- Navigation -->
  <nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="text-purple-600 font-bold text-lg lg:text-xl flex items-center">
            <i class="fas fa-chess-board mr-2"></i>
            GameBoard
          </div>
        </div>
        <div class="hidden md:flex items-center space-x-8">
          <a href="#home" class="text-gray-700 hover:text-purple-600 transition font-medium">Beranda</a>
          <a href="#features" class="text-gray-700 hover:text-purple-600 transition font-medium">Fitur</a>
          <a href="#demo" class="text-gray-700 hover:text-purple-600 transition font-medium">Demo</a>
          <a href="#testimonials" class="text-gray-700 hover:text-purple-600 transition font-medium">Testimoni</a>
          <a href="#contact" class="text-gray-700 hover:text-purple-600 transition font-medium">Kontak</a>
          <button class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition font-medium shadow-md" aria-label="Mulai Sekarang">
            Mulai Sekarang
          </button>
        </div>
        <button id="mobileMenuBtn" class="md:hidden text-gray-700 p-2" aria-label="Menu Mobile">
          <i class="fas fa-bars text-xl"></i>
        </button>
      </div>
      <div id="mobileMenu" class="hidden md:hidden pb-4 border-t border-gray-200 mt-2">
        <div class="flex flex-col space-y-3 pt-4">
          <a href="#home" class="text-gray-700 hover:text-purple-600 transition py-2 font-medium">Beranda</a>
          <a href="#features" class="text-gray-700 hover:text-purple-600 transition py-2 font-medium">Fitur</a>
          <a href="#demo" class="text-gray-700 hover:text-purple-600 transition py-2 font-medium">Demo</a>
          <a href="#testimonials" class="text-gray-700 hover:text-purple-600 transition py-2 font-medium">Testimoni</a>
          <a href="#contact" class="text-gray-700 hover:text-purple-600 transition py-2 font-medium">Kontak</a>
          <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition w-full font-medium shadow-md" aria-label="Mulai Sekarang">
            Mulai Sekarang
          </button>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="home" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
    <div class="dashed-border p-8 lg:p-12 text-center bg-white shadow-lg">
      <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6 fade-in">GameBoard - Alat Perencanaan Bisnis Interaktif</h1>
      <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed mb-8 text-lg fade-in">Bantu wujudkan ide bisnis Anda dengan papan game interaktif yang mudah digunakan. Rencanakan, ukur, dan optimalkan strategi bisnis secara menyenangkan dan efektif.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4 fade-in">
        <button class="bg-blue-900 text-white px-8 py-3 rounded-md hover:bg-blue-800 transition font-medium shadow-md" aria-label="Mulai Berencana">
          Mulai Sekarang <i class="fas fa-arrow-right ml-2"></i>
        </button>
        <button class="bg-white text-blue-900 border border-blue-900 px-8 py-3 rounded-md hover:bg-blue-50 transition font-medium" aria-label="Lihat Demo">
          <i class="fas fa-play-circle mr-2"></i> Lihat Demo
        </button>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section id="features" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 bg-white">
    <div class="text-center mb-16 fade-in">
      <h2 class="text-3xl font-bold text-gray-900 mb-4">Fitur Unggulan GameBoard</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">Temukan bagaimana GameBoard dapat membantu Anda merencanakan dan mengelola bisnis dengan cara yang menyenangkan</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Feature 1 -->
      <div class="feature-card bg-gray-50 p-6 rounded-lg border border-gray-200 fade-in">
        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
          <i class="fas fa-chess text-purple-600 text-xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Papan Interaktif</h3>
        <p class="text-gray-600">Kelola proyek bisnis dengan antarmuka seperti papan permainan yang intuitif dan mudah digunakan.</p>
      </div>

      <!-- Feature 2 -->
      <div class="feature-card bg-gray-50 p-6 rounded-lg border border-gray-200 fade-in">
        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
          <i class="fas fa-chart-line text-blue-600 text-xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Analitik Real-time</h3>
        <p class="text-gray-600">Pantau perkembangan bisnis dengan dashboard analitik yang menampilkan data secara real-time.</p>
      </div>

      <!-- Feature 3 -->
      <div class="feature-card bg-gray-50 p-6 rounded-lg border border-gray-200 fade-in">
        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
          <i class="fas fa-users text-green-600 text-xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Kolaborasi Tim</h3>
        <p class="text-gray-600">Bekerja sama dengan tim secara efisien dalam satu platform yang terintegrasi.</p>
      </div>

      <!-- Feature 4 -->
      <div class="feature-card bg-gray-50 p-6 rounded-lg border border-gray-200 fade-in">
        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
          <i class="fas fa-tasks text-yellow-600 text-xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Manajemen Tugas</h3>
        <p class="text-gray-600">Atur dan lacak tugas dengan sistem kartu yang mudah dipindahkan antar status.</p>
      </div>

      <!-- Feature 5 -->
      <div class="feature-card bg-gray-50 p-6 rounded-lg border border-gray-200 fade-in">
        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
          <i class="fas fa-bullseye text-red-600 text-xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Penetapan Target</h3>
        <p class="text-gray-600">Tetapkan tujuan bisnis yang jelas dan lacak pencapaiannya dengan sistem poin.</p>
      </div>

      <!-- Feature 6 -->
      <div class="feature-card bg-gray-50 p-6 rounded-lg border border-gray-200 fade-in">
        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
          <i class="fas fa-trophy text-indigo-600 text-xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Sistem Reward</h3>
        <p class="text-gray-600">Tingkatkan motivasi tim dengan sistem penghargaan yang menyenangkan.</p>
      </div>
    </div>
  </section>

  <!-- Demo/Video Section -->
  <section id="demo" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 bg-gray-50">
    <div class="flex flex-col lg:flex-row items-center gap-12">
      <div class="lg:w-1/2 fade-in">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Lihat GameBoard dalam Aksi</h2>
        <p class="text-gray-600 mb-6">Tonton video demo untuk melihat bagaimana GameBoard dapat mengubah cara Anda merencanakan dan mengelola bisnis.</p>
        <ul class="space-y-3">
          <li class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
            <span class="text-gray-700">Antarmuka yang intuitif dan mudah dipelajari</span>
          </li>
          <li class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
            <span class="text-gray-700">Kolaborasi tim yang efisien</span>
          </li>
          <li class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
            <span class="text-gray-700">Dashboard analitik yang komprehensif</span>
          </li>
        </ul>
      </div>
      <div class="lg:w-1/2 fade-in">
        <div class="bg-gray-200 rounded-lg aspect-video flex items-center justify-center relative overflow-hidden shadow-lg">
          <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-blue-500 opacity-80"></div>
          <button class="bg-white text-purple-600 rounded-full w-20 h-20 flex items-center justify-center z-10 shadow-lg hover:scale-105 transition-transform">
            <i class="fas fa-play text-2xl ml-1"></i>
          </button>
          <div class="absolute bottom-4 left-4 text-white font-medium">Demo GameBoard - 3:45</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 bg-white">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
      <div class="fade-in">
        <div class="text-3xl md:text-4xl font-bold text-purple-600 mb-2">500+</div>
        <div class="text-gray-600">Perusahaan</div>
      </div>
      <div class="fade-in">
        <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">10K+</div>
        <div class="text-gray-600">Pengguna</div>
      </div>
      <div class="fade-in">
        <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">95%</div>
        <div class="text-gray-600">Kepuasan Pengguna</div>
      </div>
      <div class="fade-in">
        <div class="text-3xl md:text-4xl font-bold text-yellow-600 mb-2">40%</div>
        <div class="text-gray-600">Peningkatan Produktivitas</div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section id="testimonials" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 bg-gray-50">
    <div class="text-center mb-16 fade-in">
      <h2 class="text-3xl font-bold text-gray-900 mb-4">Apa Kata Pengguna GameBoard</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">Dengarkan pengalaman langsung dari para pengguna yang telah merasakan manfaat GameBoard</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Testimonial 1 -->
      <div class="bg-white p-6 rounded-lg shadow-md fade-in">
        <div class="flex items-center mb-4">
          <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
            <span class="text-purple-600 font-bold">AS</span>
          </div>
          <div>
            <h4 class="font-semibold text-gray-900">Ahmad Surya</h4>
            <p class="text-gray-500 text-sm">CEO, TechStart Inc.</p>
          </div>
        </div>
        <p class="text-gray-600 italic">"GameBoard telah mengubah cara kami merencanakan strategi bisnis. Tim menjadi lebih termotivasi dan produktif dengan pendekatan gamifikasi."</p>
        <div class="flex text-yellow-400 mt-4">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
      </div>

      <!-- Testimonial 2 -->
      <div class="bg-white p-6 rounded-lg shadow-md fade-in">
        <div class="flex items-center mb-4">
          <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
            <span class="text-blue-600 font-bold">DR</span>
          </div>
          <div>
            <h4 class="font-semibold text-gray-900">Diana Ratna</h4>
            <p class="text-gray-500 text-sm">Manajer Proyek, Inovasi Digital</p>
          </div>
        </div>
        <p class="text-gray-600 italic">"Kolaborasi tim menjadi jauh lebih efektif dengan GameBoard. Sistem reward membuat semua orang termotivasi untuk mencapai target."</p>
        <div class="flex text-yellow-400 mt-4">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
      </div>

      <!-- Testimonial 3 -->
      <div class="bg-white p-6 rounded-lg shadow-md fade-in">
        <div class="flex items-center mb-4">
          <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
            <span class="text-green-600 font-bold">RS</span>
          </div>
          <div>
            <h4 class="font-semibold text-gray-900">Rizki Santoso</h4>
            <p class="text-gray-500 text-sm">Founder, StartupKu</p>
          </div>
        </div>
        <p class="text-gray-600 italic">"Sebagai startup, kami perlu alat yang efisien dan terjangkau. GameBoard memberikan semua yang kami butuhkan dengan harga yang masuk akal."</p>
        <div class="flex text-yellow-400 mt-4">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="gradient-bg text-white py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <h2 class="text-3xl font-bold mb-6 fade-in">Siap Mengubah Cara Anda Merencanakan Bisnis?</h2>
      <p class="text-lg mb-8 max-w-2xl mx-auto opacity-90 fade-in">Bergabunglah dengan ratusan perusahaan yang telah menggunakan GameBoard untuk meningkatkan produktivitas dan kolaborasi tim.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4 fade-in">
        <button class="bg-white text-purple-600 px-8 py-3 rounded-md hover:bg-gray-100 transition font-medium shadow-md" aria-label="Coba Gratis">
          Coba Gratis 14 Hari
        </button>
        <button class="bg-transparent border border-white text-white px-8 py-3 rounded-md hover:bg-white hover:bg-opacity-10 transition font-medium" aria-label="Hubungi Sales">
          Hubungi Sales
        </button>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20 bg-white">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <div class="fade-in">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Hubungi Kami</h2>
        <p class="text-gray-600 mb-8">Punya pertanyaan tentang GameBoard? Tim kami siap membantu Anda.</p>

        <div class="space-y-4">
          <div class="flex items-start">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
              <i class="fas fa-map-marker-alt text-purple-600"></i>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Alamat</h4>
              <p class="text-gray-600">Jl. Teknologi No. 123, Jakarta Selatan</p>
            </div>
          </div>

          <div class="flex items-start">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
              <i class="fas fa-phone text-blue-600"></i>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Telepon</h4>
              <p class="text-gray-600">+62 21 1234 5678</p>
            </div>
          </div>

          <div class="flex items-start">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4">
              <i class="fas fa-envelope text-green-600"></i>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Email</h4>
              <p class="text-gray-600">hello@gameboard.id</p>
            </div>
          </div>
        </div>
      </div>

      <div class="fade-in">
        <form class="bg-gray-50 p-6 rounded-lg border border-gray-200">
          <div class="mb-4">
            <label for="name" class="block text-gray-700 mb-2">Nama Lengkap</label>
            <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" required>
          </div>

          <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email</label>
            <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" required>
          </div>

          <div class="mb-4">
            <label for="message" class="block text-gray-700 mb-2">Pesan</label>
            <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" required></textarea>
          </div>

          <button type="submit" class="bg-purple-600 text-white px-6 py-3 rounded-md hover:bg-purple-700 transition font-medium w-full">
            Kirim Pesan
          </button>
        </form>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="md:col-span-2">
          <div class="text-purple-400 font-bold text-xl flex items-center mb-4">
            <i class="fas fa-chess-board mr-2"></i>
            GameBoard
          </div>
          <p class="text-gray-400 mb-6 max-w-md">GameBoard adalah alat perencanaan bisnis interaktif yang membantu perusahaan merencanakan, mengelola, dan mengoptimalkan strategi bisnis dengan pendekatan gamifikasi.</p>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white transition" aria-label="Facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition" aria-label="Twitter">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition" aria-label="Instagram">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition" aria-label="LinkedIn">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>

        <div>
          <h3 class="font-semibold text-lg mb-4">Tautan Cepat</h3>
          <ul class="space-y-2">
            <li><a href="#home" class="text-gray-400 hover:text-white transition">Beranda</a></li>
            <li><a href="#features" class="text-gray-400 hover:text-white transition">Fitur</a></li>
            <li><a href="#demo" class="text-gray-400 hover:text-white transition">Demo</a></li>
            <li><a href="#testimonials" class="text-gray-400 hover:text-white transition">Testimoni</a></li>
            <li><a href="#contact" class="text-gray-400 hover:text-white transition">Kontak</a></li>
          </ul>
        </div>

        <div>
          <h3 class="font-semibold text-lg mb-4">Legal</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white transition">Kebijakan Privasi</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Syarat & Ketentuan</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition">Kebijakan Cookie</a></li>
          </ul>
        </div>
      </div>

      <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
        <p>&copy; 2023 GameBoard. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <script>
    // Loading Screen
    window.addEventListener('load', function() {
      const loadingScreen = document.getElementById('loadingScreen');
      setTimeout(function() {
        loadingScreen.style.opacity = '0';
        setTimeout(function() {
          loadingScreen.style.display = 'none';
        }, 500);
      }, 1500);
    });

    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuBtn.addEventListener('click', function() {
      mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu when clicking on a link
    const mobileLinks = mobileMenu.querySelectorAll('a');
    mobileLinks.forEach(link => {
      link.addEventListener('click', function() {
        mobileMenu.classList.add('hidden');
      });
    });

    // Scroll animations
    const fadeElements = document.querySelectorAll('.fade-in');

    const fadeInOnScroll = function() {
      fadeElements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;

        if (elementTop < window.innerHeight - elementVisible) {
          element.classList.add('visible');
        }
      });
    };

    window.addEventListener('scroll', fadeInOnScroll);
    // Trigger once on load
    fadeInOnScroll();

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();

        const targetId = this.getAttribute('href');
        if (targetId === '#') return;

        const targetElement = document.querySelector(targetId);
        if (targetElement) {
          window.scrollTo({
            top: targetElement.offsetTop - 80,
            behavior: 'smooth'
          });
        }
      });
    });

    // Form submission
    const contactForm = document.querySelector('form');
    if (contactForm) {
      contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Terima kasih! Pesan Anda telah berhasil dikirim. Tim kami akan segera menghubungi Anda.');
        contactForm.reset();
      });
    }
  </script>
</body>
</html>
