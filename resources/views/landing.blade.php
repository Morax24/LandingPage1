{{-- resources/views/landing.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Board Business - Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .dashed-border {
            border: 3px dashed #a855f7;
            border-radius: 12px;
        }

        /* Loading Screen Styles */
        #loadingScreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        #loadingScreen.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader {
            width: 80px;
            height: 80px;
            border: 8px solid rgba(255, 255, 255, 0.2);
            border-top: 8px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-text {
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 2rem;
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .loading-progress {
            width: 200px;
            height: 4px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 2px;
            margin-top: 1.5rem;
            overflow: hidden;
        }

        .loading-progress-bar {
            height: 100%;
            background: white;
            border-radius: 2px;
            animation: progress 2s ease-in-out;
            transform-origin: left;
        }

        @keyframes progress {
            0% { width: 0%; }
            100% { width: 100%; }
        }
    </style>
</head>
<body class="bg-gray-50">
    {{-- Loading Screen --}}
    <div id="loadingScreen">
        <div class="loader"></div>
        <div class="loading-text">Loading...</div>
        <div class="loading-progress">
            <div class="loading-progress-bar"></div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="text-purple-600 font-bold text-sm sm:text-base md:text-lg lg:text-xl leading-tight">
                    IT Operational Education
                </div>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center space-x-4 lg:space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-purple-600 transition text-sm lg:text-base">Home</a>
                    <a href="#features" class="text-gray-700 hover:text-purple-600 transition text-sm lg:text-base">Features</a>
                    <a href="#contact" class="text-gray-700 hover:text-purple-600 transition text-sm lg:text-base">Contact</a>
                </div>

                {{-- Mobile Menu Button --}}
                <button id="mobileMenuBtn" class="md:hidden text-gray-700 p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <button class="hidden md:block bg-green-500 text-white px-3 md:px-4 lg:px-6 py-2 rounded-md hover:bg-green-600 transition text-xs md:text-sm lg:text-base whitespace-nowrap">
                    Get Started
                </button>
            </div>

            {{-- Mobile Menu --}}
            <div id="mobileMenu" class="hidden md:hidden pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="#home" class="text-gray-700 hover:text-purple-600 transition py-2 text-sm">Home</a>
                    <a href="#features" class="text-gray-700 hover:text-purple-600 transition py-2 text-sm">Features</a>
                    <a href="#contact" class="text-gray-700 hover:text-purple-600 transition py-2 text-sm">Contact</a>
                    <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition text-sm w-full">
                        Get Started
                    </button>
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section id="home" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-16">
        <div class="dashed-border p-6 sm:p-8 lg:p-12 text-center bg-white">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 sm:mb-6">
                Game Board Business
            </h1>
            <p class="text-gray-600 text-sm sm:text-base max-w-4xl mx-auto leading-relaxed mb-6 sm:mb-8 px-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <button class="bg-blue-900 text-white px-6 sm:px-8 py-2.5 sm:py-3 rounded-md hover:bg-blue-800 transition text-sm sm:text-base">
                Get Started
            </button>
        </div>

        {{-- Video Section --}}
        <div class="mt-8 sm:mt-12 rounded-lg aspect-video overflow-hidden relative group" id="videoContainer">
            {{-- Thumbnail --}}
            <div id="videoThumbnail" class="absolute inset-0 bg-gradient-to-br from-yellow-300 via-yellow-400 to-yellow-500 flex items-center justify-center cursor-pointer hover:shadow-xl transition-shadow">
                <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity"></div>
                <div class="bg-white rounded-full p-5 sm:p-6 lg:p-8 shadow-2xl transform group-hover:scale-110 transition-transform z-10" onclick="playVideo()">
                    <svg class="w-12 h-12 sm:w-16 sm:h-16 lg:w-20 lg:h-20 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                    </svg>
                </div>
            </div>

            {{-- Video Player (Hidden by default) --}}
            <div id="videoPlayer" class="hidden w-full h-full">
                {{-- Untuk YouTube --}}
                <iframe id="youtubeFrame" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    {{-- Social Icons --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
        <div class="flex flex-wrap justify-center gap-4 sm:gap-6 lg:gap-8">
            {{-- Facebook --}}
            <a href="#" class="w-12 h-12 sm:w-14 sm:h-14 bg-blue-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-blue-200 hover:scale-110 transition-all">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </a>
            {{-- Instagram --}}
            <a href="#" class="w-12 h-12 sm:w-14 sm:h-14 bg-purple-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-purple-200 hover:scale-110 transition-all">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-purple-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
            {{-- WhatsApp --}}
            <a href="#" class="w-12 h-12 sm:w-14 sm:h-14 bg-green-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-green-200 hover:scale-110 transition-all">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-green-600" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            </a>
            {{-- Twitter --}}
            <a href="#" class="w-12 h-12 sm:w-14 sm:h-14 bg-blue-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-blue-200 hover:scale-110 transition-all">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
            </a>
            {{-- YouTube --}}
            <a href="#" class="w-12 h-12 sm:w-14 sm:h-14 bg-red-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-red-200 hover:scale-110 transition-all">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
            </a>
            {{-- LinkedIn --}}
            <a href="#" class="w-12 h-12 sm:w-14 sm:h-14 bg-blue-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-blue-200 hover:scale-110 transition-all">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 text-blue-700" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
            </a>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="features" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="text-center mb-10 sm:mb-12">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-3 sm:mb-4">Features</h2>
            <p class="text-gray-600 text-sm sm:text-base max-w-3xl mx-auto px-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            {{-- Feature 1 --}}
            <div class="bg-white p-6 sm:p-8 rounded-xl shadow-sm hover:shadow-lg transition-shadow text-center">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-red-50 rounded-full mx-auto mb-4 sm:mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-2 sm:mb-3">Fast Loading</h3>
                <p class="text-gray-600 text-sm sm:text-base mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.
                </p>
                <a href="#" class="text-green-500 font-medium hover:text-green-600 inline-flex items-center text-sm sm:text-base">
                    Learn More
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            {{-- Feature 2 --}}
            <div class="bg-white p-6 sm:p-8 rounded-xl shadow-sm hover:shadow-lg transition-shadow text-center">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-green-50 rounded-full mx-auto mb-4 sm:mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-2 sm:mb-3">Responsive Design</h3>
                <p class="text-gray-600 text-sm sm:text-base mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.
                </p>
                <a href="#" class="text-green-500 font-medium hover:text-green-600 inline-flex items-center text-sm sm:text-base">
                    Learn More
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            {{-- Feature 3 --}}
            <div class="bg-white p-6 sm:p-8 rounded-xl shadow-sm hover:shadow-lg transition-shadow text-center sm:col-span-2 lg:col-span-1">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-blue-50 rounded-full mx-auto mb-4 sm:mb-6 flex items-center justify-center">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-900 mb-2 sm:mb-3">No Code Needed</h3>
                <p class="text-gray-600 text-sm sm:text-base mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt.
                </p>
                <a href="#" class="text-green-500 font-medium hover:text-green-600 inline-flex items-center text-sm sm:text-base">
                    Learn More
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Metrics Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="text-center mb-10 sm:mb-12">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-3 sm:mb-4">
                Our Metrics Tell the Story
            </h2>
            <p class="text-gray-600 text-sm sm:text-base max-w-3xl mx-auto px-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 mb-12 sm:mb-16" id="metricsSection">
            <div class="text-center">
                <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-2">
                    <span class="counter" data-target="100">0</span>+
                </div>
                <p class="text-gray-600 text-sm sm:text-base">Active Users</p>
            </div>
            <div class="text-center">
                <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-2">
                    <span class="counter" data-target="931">0</span>k+
                </div>
                <p class="text-gray-600 text-sm sm:text-base">Total Downloads</p>
            </div>
            <div class="text-center">
                <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-2">
                    <span class="counter" data-target="240">0</span>k+
                </div>
                <p class="text-gray-600 text-sm sm:text-base">Positive Reviews</p>
            </div>
            <div class="text-center">
                <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-2">
                    <span class="counter" data-target="12">0</span>k+
                </div>
                <p class="text-gray-600 text-sm sm:text-base">Happy Customers</p>
            </div>
        </div>

        {{-- Testimonials --}}
        <div class="bg-gradient-to-r from-pink-200 via-pink-250 to-pink-200 rounded-xl sm:rounded-2xl p-8 sm:p-10 lg:p-12">
            <h2 class="text-2xl sm:text-3xl font-bold text-center text-gray-900 mb-3 sm:mb-4">
                Real Stories from Satisfied Customers
            </h2>
            <p class="text-center text-gray-700 mb-8 sm:mb-10 text-sm sm:text-base">
                Stories are powerful way of navigating the world.
            </p>

            {{-- Carousel Container --}}
            <div class="relative">
                <div class="overflow-hidden">
                    <div id="testimonialSlider" class="flex transition-transform duration-500 ease-out">
                        @php
                        $testimonials = [
                            ['name' => 'Lauren M.', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
                            ['name' => 'Nadira', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
                            ['name' => 'Sarah K.', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
                            ['name' => 'Michael R.', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.']
                        ];
                        @endphp
                        @foreach($testimonials as $testimonial)
                        <div class="flex-shrink-0 w-full px-2">
                            <div class="grid md:grid-cols-2 gap-6 sm:gap-8">
                                <div class="bg-white rounded-xl p-6 sm:p-8 shadow-sm">
                                    <div class="flex items-center mb-4 sm:mb-5">
                                        <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gray-300 rounded-full mr-4 flex-shrink-0"></div>
                                        <div>
                                            <div class="font-bold text-gray-900 text-base sm:text-lg">{{ $testimonial['name'] }}</div>
                                            <div class="text-yellow-400 text-lg sm:text-xl">★★★★★</div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                                        {{ $testimonial['text'] }}
                                    </p>
                                </div>

                                @if(isset($testimonials[$loop->index + 1]))
                                <div class="bg-white rounded-xl p-6 sm:p-8 shadow-sm hidden md:block">
                                    <div class="flex items-center mb-4 sm:mb-5">
                                        <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gray-300 rounded-full mr-4 flex-shrink-0"></div>
                                        <div>
                                            <div class="font-bold text-gray-900 text-base sm:text-lg">{{ $testimonials[$loop->index + 1]['name'] }}</div>
                                            <div class="text-yellow-400 text-lg sm:text-xl">★★★★★</div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                                        {{ $testimonials[$loop->index + 1]['text'] }}
                                    </p>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Dots Indicator --}}
                <div class="flex justify-center mt-6 space-x-2">
                    @for($i = 0; $i < count($testimonials); $i++)
                    <button onclick="goToTestimonial({{ $i }})" class="testimonial-dot w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-gray-400 hover:bg-gray-600 transition {{ $i === 0 ? 'bg-gray-800 w-8 sm:w-10' : '' }}"></button>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="text-center mb-10 sm:mb-12">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-3 sm:mb-4">Meet our team</h2>
            <p class="text-gray-600 text-sm sm:text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @php
            $team = [
                ['name' => 'Evelyn S.', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
                ['name' => 'Michaella L.', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
                ['name' => 'Darlene S.', 'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.']
            ];
            @endphp
            @foreach($team as $member)
            <div class="bg-white rounded-xl p-6 sm:p-8 text-center shadow-sm hover:shadow-lg transition-shadow">
                <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gray-300 rounded-full mx-auto mb-4 sm:mb-5"></div>
                <h3 class="font-bold text-gray-900 mb-2 sm:mb-3 text-lg sm:text-xl">{{ $member['name'] }}</h3>
                <p class="text-gray-600 text-sm sm:text-base mb-4 sm:mb-5 leading-relaxed">
                    {{ $member['desc'] }}
                </p>
                <div class="flex justify-center space-x-4 sm:space-x-6">
                    <a href="#" class="text-green-500 hover:text-green-600 transition text-sm sm:text-base">Twitter</a>
                    <a href="#" class="text-green-500 hover:text-green-600 transition text-sm sm:text-base">LinkedIn</a>
                    <a href="#" class="text-green-500 hover:text-green-600 transition text-sm sm:text-base">Dribble</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="bg-gradient-to-r from-pink-200 via-pink-250 to-pink-200 rounded-xl sm:rounded-2xl p-8 sm:p-10 lg:p-12 text-center">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-4 sm:mb-6 px-2">
                Dapatkan Ide Plan Bisnis Anda di GameBoard Bussiness
            </h2>
            <p class="text-gray-700 text-sm sm:text-base mb-6 sm:mb-8 max-w-3xl mx-auto leading-relaxed px-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <button class="bg-green-500 text-white px-6 sm:px-8 py-2.5 sm:py-3 rounded-md hover:bg-green-600 transition mb-8 sm:mb-10 text-sm sm:text-base">
                Get Started
            </button>

            <div class="bg-gradient-to-br from-red-400 via-gray-700 to-blue-500 rounded-xl h-48 sm:h-64 lg:h-80"></div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section id="contact" class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="text-center mb-10 sm:mb-12">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-3 sm:mb-4">Contact Person</h2>
            <p class="text-gray-600 text-sm sm:text-base px-4">
                For questions and other inquiries, Anda dapat kontak kami untuk info lebih lanjut dan pembahasan lainnya.
            </p>
        </div>

        <form class="space-y-4 sm:space-y-6">
            <div class="grid sm:grid-cols-2 gap-4 sm:gap-6">
                <input type="text" placeholder="Nama" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 text-sm sm:text-base">
                <input type="email" placeholder="Email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 text-sm sm:text-base">
            </div>
            <input type="tel" placeholder="No Handphone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 text-sm sm:text-base">
            <input type="text" placeholder="Subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 text-sm sm:text-base">
            <textarea placeholder="Isi Pesan" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 resize-none text-sm sm:text-base"></textarea>

            <div class="text-center">
                <p class="text-sm text-gray-600 mb-4">Contact us in</p>
                <div class="flex justify-center space-x-4 sm:space-x-6 mb-6 sm:mb-8">
                    <a href="#" class="text-gray-600 hover:text-gray-900 transition transform hover:scale-110">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 transition transform hover:scale-110">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/></svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 transition transform hover:scale-110">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 transition transform hover:scale-110">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286z"/></svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 transition transform hover:scale-110">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814z"/></svg>
                    </a>
                </div>
                <button type="submit" class="bg-green-500 text-white px-10 sm:px-12 py-3 rounded-lg hover:bg-green-600 transition text-sm sm:text-base font-medium">
                    Submit
                </button>
            </div>
        </form>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white py-6 sm:py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                <p class="text-gray-400 text-xs sm:text-sm text-center sm:text-left">
                    © 2025 GameBoard Business. All rights reserved.
                </p>
                <div class="flex space-x-4 sm:space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition transform hover:scale-110">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Scripts --}}
    <script>
        // Video Player Function
        function playVideo() {
            const thumbnail = document.getElementById('videoThumbnail');
            const player = document.getElementById('videoPlayer');
            const youtubeFrame = document.getElementById('youtubeFrame');

            const youtubeVideoId = 'zGl2NPd_l5U';

            thumbnail.classList.add('hidden');
            player.classList.remove('hidden');

            youtubeFrame.src = `https://www.youtube.com/embed/${youtubeVideoId}?autoplay=1`;
        }

        // Counter Animation Function
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-target'));
            const duration = 2000; // 2 seconds
            const increment = target / (duration / 16); // 60 FPS
            let current = 0;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current);
                }
            }, 16);
        }

        // Intersection Observer for counter animation trigger
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
        };

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.counter');
                    counters.forEach(counter => {
                        if (counter.textContent === '0') {
                            animateCounter(counter);
                        }
                    });
                }
            });
        }, observerOptions);

        // Testimonial Slider
        let currentTestimonial = 0;
        const totalTestimonials = 4;
        let autoSlideInterval;

        function updateTestimonialSlider() {
            const slider = document.getElementById('testimonialSlider');
            const dots = document.querySelectorAll('.testimonial-dot');

            slider.style.transform = `translateX(-${currentTestimonial * 100}%)`;

            dots.forEach((dot, index) => {
                if (index === currentTestimonial) {
                    dot.classList.add('bg-gray-800', 'w-8', 'sm:w-10');
                    dot.classList.remove('bg-gray-400', 'w-2', 'sm:w-3');
                } else {
                    dot.classList.remove('bg-gray-800', 'w-8', 'sm:w-10');
                    dot.classList.add('bg-gray-400', 'w-2', 'sm:w-3');
                }
            });
        }

        function nextTestimonial() {
            currentTestimonial = (currentTestimonial + 1) % totalTestimonials;
            updateTestimonialSlider();
            resetAutoSlide();
        }

        function prevTestimonial() {
            currentTestimonial = (currentTestimonial - 1 + totalTestimonials) % totalTestimonials;
            updateTestimonialSlider();
            resetAutoSlide();
        }

        function goToTestimonial(index) {
            currentTestimonial = index;
            updateTestimonialSlider();
            resetAutoSlide();
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(() => {
                nextTestimonial();
            }, 5000);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Hide loading screen after 2 seconds
            setTimeout(function() {
                const loadingScreen = document.getElementById('loadingScreen');
                loadingScreen.classList.add('hidden');
            }, 2000);

            // Start testimonial auto-slide
            startAutoSlide();

            // Observe metrics section for counter animation
            const metricsSection = document.getElementById('metricsSection');
            if (metricsSection) {
                counterObserver.observe(metricsSection);
            }

            // Mobile Menu Toggle
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');

            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });

                // Close mobile menu when clicking a link
                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.add('hidden');
                    });
                });
            }
        });

        // Smooth scroll for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Form submission handler
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Form submitted! (This is a demo)');
            });
        }
    </script>
</body>
</html>
