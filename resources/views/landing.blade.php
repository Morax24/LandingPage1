<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameBoard Business - Learn IT Operations Through Play</title>
    <meta name="description" content="Master IT operations and business strategy through interactive board game simulations. Hands-on learning for IT professionals and students.">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
        }
    </style>
</head>
<body class="bg-gray-50">
    {{-- Navigation --}}
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">GB</span>
                    </div>
                    <span class="text-purple-600 font-bold text-sm sm:text-base md:text-lg">GameBoard Business</span>
                </div>

                {{-- Desktop Menu --}}
                <div class="hidden md:flex items-center space-x-6 lg:space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-purple-600 transition">Home</a>
                    <a href="#features" class="text-gray-700 hover:text-purple-600 transition">Features</a>
                    <a href="#how-it-works" class="text-gray-700 hover:text-purple-600 transition">How It Works</a>
                    <a href="#contact" class="text-gray-700 hover:text-purple-600 transition">Contact</a>
                </div>

                {{-- Mobile Menu Button --}}
                <button id="mobileMenuBtn" class="md:hidden text-gray-700 p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <button class="hidden md:block bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition">
                    Start Learning
                </button>
            </div>

            {{-- Mobile Menu --}}
            <div id="mobileMenu" class="hidden md:hidden pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="#home" class="text-gray-700 hover:text-purple-600 transition py-2">Home</a>
                    <a href="#features" class="text-gray-700 hover:text-purple-600 transition py-2">Features</a>
                    <a href="#how-it-works" class="text-gray-700 hover:text-purple-600 transition py-2">How It Works</a>
                    <a href="#contact" class="text-gray-700 hover:text-purple-600 transition py-2">Contact</a>
                    <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition w-full">
                        Start Learning
                    </button>
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section id="home" class="hero-gradient text-white py-16 sm:py-20 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold mb-6">
                    Master IT Operations<br>Through Interactive Learning
                </h1>
                <p class="text-lg sm:text-xl max-w-3xl mx-auto mb-8 text-purple-100">
                    Learn complex IT infrastructure, DevOps, and business operations through engaging board game simulations. No boring lectures—just hands-on strategic gameplay.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <button class="bg-white text-purple-600 px-8 py-3 rounded-lg hover:bg-gray-100 transition font-semibold w-full sm:w-auto">
                        Try Free Demo
                    </button>
                    <button class="bg-purple-700 text-white px-8 py-3 rounded-lg hover:bg-purple-800 transition border-2 border-purple-400 w-full sm:w-auto">
                        Watch How It Works
                    </button>
                </div>
            </div>

            {{-- Video Section --}}
            <div class="mt-12 rounded-xl overflow-hidden shadow-2xl max-w-4xl mx-auto">
                <div id="videoContainer" class="aspect-video relative group">
                    <div id="videoThumbnail" class="absolute inset-0 bg-gradient-to-br from-purple-900 to-indigo-900 flex items-center justify-center cursor-pointer">
                        <div class="absolute inset-0 bg-black opacity-20"></div>
                        <div class="text-center z-10">
                            <div class="bg-white rounded-full p-6 inline-block mb-4 transform group-hover:scale-110 transition-transform shadow-xl" onclick="playVideo()">
                                <svg class="w-16 h-16 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                                </svg>
                            </div>
                            <p class="text-white text-lg font-semibold">Watch 2-Minute Demo</p>
                        </div>
                    </div>
                    <div id="videoPlayer" class="hidden w-full h-full">
                        <iframe id="youtubeFrame" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="bg-white py-12 border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold text-purple-600 mb-2">500+</div>
                    <p class="text-gray-600">Active Students</p>
                </div>
                <div>
                    <div class="text-4xl font-bold text-purple-600 mb-2">15+</div>
                    <p class="text-gray-600">Scenario Modules</p>
                </div>
                <div>
                    <div class="text-4xl font-bold text-purple-600 mb-2">95%</div>
                    <p class="text-gray-600">Completion Rate</p>
                </div>
                <div>
                    <div class="text-4xl font-bold text-purple-600 mb-2">4.8/5</div>
                    <p class="text-gray-600">Average Rating</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="features" class="py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Why Choose GameBoard?</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Traditional IT training is boring. We make learning engaging through game-based scenarios that mirror real-world challenges.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-sm card-hover">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Real-World Scenarios</h3>
                    <p class="text-gray-600">
                        Simulate actual IT incidents, infrastructure planning, and crisis management based on industry case studies.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm card-hover">
                    <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Team Collaboration</h3>
                    <p class="text-gray-600">
                        Play with teammates to solve complex problems, just like real IT operations require cross-functional teamwork.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm card-hover">
                    <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Progress Tracking</h3>
                    <p class="text-gray-600">
                        Monitor your skill development with detailed analytics and performance metrics after each session.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm card-hover">
                    <div class="w-16 h-16 bg-yellow-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Adaptive Difficulty</h3>
                    <p class="text-gray-600">
                        Scenarios automatically adjust complexity based on your skill level, ensuring optimal learning pace.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm card-hover">
                    <div class="w-16 h-16 bg-red-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Flexible Learning</h3>
                    <p class="text-gray-600">
                        Learn at your own pace with sessions ranging from 30-minute quick plays to 2-hour deep dives.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm card-hover">
                    <div class="w-16 h-16 bg-indigo-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Industry Certification</h3>
                    <p class="text-gray-600">
                        Earn certificates recognized by IT companies upon completing advanced scenario modules.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- How It Works --}}
    <section id="how-it-works" class="bg-gray-100 py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">How It Works</h2>
                <p class="text-gray-600 text-lg">Get started in three simple steps</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-600 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-6">1</div>
                    <h3 class="text-xl font-bold mb-3">Choose Your Scenario</h3>
                    <p class="text-gray-600">Select from scenarios covering cloud migration, incident response, capacity planning, and more.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-600 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-6">2</div>
                    <h3 class="text-xl font-bold mb-3">Play & Make Decisions</h3>
                    <p class="text-gray-600">Navigate through challenges, allocate resources, and solve problems just like real IT operations.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-600 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-6">3</div>
                    <h3 class="text-xl font-bold mb-3">Review & Learn</h3>
                    <p class="text-gray-600">Get detailed feedback on your decisions, learn from mistakes, and improve your skills.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">What Students Say</h2>
                <p class="text-gray-600 text-lg">Real feedback from IT professionals and students</p>
            </div>

            <div class="relative">
                <div class="overflow-hidden">
                    <div id="testimonialSlider" class="flex transition-transform duration-500 ease-out">
                        <div class="flex-shrink-0 w-full px-2">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="bg-white rounded-xl p-8 shadow-sm">
                                    <div class="flex items-center mb-4">
                                        <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-bold text-xl mr-4">AM</div>
                                        <div>
                                            <div class="font-bold text-gray-900">Arif Maulana</div>
                                            <div class="text-sm text-gray-500">DevOps Engineer</div>
                                            <div class="text-yellow-400 text-lg">★★★★★</div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 leading-relaxed">
                                        "This platform completely changed how I understand infrastructure planning. The incident response scenarios are incredibly realistic and helped me prepare for real production issues."
                                    </p>
                                </div>

                                <div class="bg-white rounded-xl p-8 shadow-sm">
                                    <div class="flex items-center mb-4">
                                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold text-xl mr-4">SR</div>
                                        <div>
                                            <div class="font-bold text-gray-900">Siti Rahmawati</div>
                                            <div class="text-sm text-gray-500">IT Student, Universitas Indonesia</div>
                                            <div class="text-yellow-400 text-lg">★★★★★</div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 leading-relaxed">
                                        "Finally, IT learning that doesn't feel like memorizing. The game format makes complex concepts easy to understand. I landed my first internship thanks to skills I learned here."
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex-shrink-0 w-full px-2">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="bg-white rounded-xl p-8 shadow-sm">
                                    <div class="flex items-center mb-4">
                                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold text-xl mr-4">BW</div>
                                        <div>
                                            <div class="font-bold text-gray-900">Budi Wibowo</div>
                                            <div class="text-sm text-gray-500">System Administrator</div>
                                            <div class="text-yellow-400 text-lg">★★★★★</div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 leading-relaxed">
                                        "The cloud migration scenarios are spot-on. I used strategies I learned here to successfully lead my company's AWS migration project. Worth every rupiah!"
                                    </p>
                                </div>

                                <div class="bg-white rounded-xl p-8 shadow-sm">
                                    <div class="flex items-center mb-4">
                                        <div class="w-14 h-14 bg-pink-100 rounded-full flex items-center justify-center text-pink-600 font-bold text-xl mr-4">DN</div>
                                        <div>
                                            <div class="font-bold text-gray-900">Dina Nurhaliza</div>
                                            <div class="text-sm text-gray-500">IT Manager</div>
                                            <div class="text-yellow-400 text-lg">★★★★★</div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 leading-relaxed">
                                        "We use GameBoard for training our junior engineers. The team collaboration features are excellent, and the progress tracking helps us identify skill gaps quickly."
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-8 space-x-2">
                    <button onclick="goToTestimonial(0)" class="testimonial-dot w-3 h-3 rounded-full bg-gray-800 w-10"></button>
                    <button onclick="goToTestimonial(1)" class="testimonial-dot w-3 h-3 rounded-full bg-gray-400"></button>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="hero-gradient text-white py-16 sm:py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold mb-6">
                Ready to Transform Your IT Skills?
            </h2>
            <p class="text-xl mb-8 text-purple-100">
                Join 500+ professionals and students who are mastering IT operations through interactive gameplay. Start your free trial today—no credit card required.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-white text-purple-600 px-8 py-4 rounded-lg hover:bg-gray-100 transition font-semibold text-lg">
                    Start Free Trial
                </button>
                <button class="bg-purple-700 text-white px-8 py-4 rounded-lg hover:bg-purple-800 transition border-2 border-purple-400 font-semibold text-lg">
                    Schedule Demo
                </button>
            </div>
            <p class="mt-6 text-purple-200 text-sm">14-day free trial • No credit card • Cancel anytime</p>
        </div>
    </section>

    {{-- Contact Section --}}
    <section id="contact" class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Get In Touch</h2>
                <p class="text-gray-600 text-lg">
                    Have questions? We'd love to hear from you. Send us a message and we'll respond within 24 hours.
                </p>
            </div>

            <form class="bg-white rounded-xl shadow-sm p-8 space-y-6">
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                        <input type="text" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="John Doe">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                        <input type="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="john@example.com">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                    <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="+62 812 3456 7890">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subject *</label>
                    <input type="text" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="What can we help you with?">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                    <textarea required rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 resize-none" placeholder="Tell us more about your inquiry..."></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-purple-600 text-white px-10 py-3 rounded-lg hover:bg-purple-700 transition font-semibold text-lg">
                        Send Message
                    </button>
                    <p class="text-sm text-gray-500 mt-4">We'll get back to you within 24 hours</p>
                </div>
            </form>

            <div class="mt-12 text-center">
                <p class="text-gray-600 mb-4 font-medium">Or reach us directly:</p>
                <div class="flex flex-wrap justify-center gap-6 text-gray-700">
                    <a href="mailto:info@gameboardbusiness.com" class="flex items-center hover:text-purple-600 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        info@gameboardbusiness.com
                    </a>
                    <a href="https://wa.me/628123456789" class="flex items-center hover:text-purple-600 transition">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        +62 812 3456 7890
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold">GB</span>
                        </div>
                        <span class="font-bold text-lg">GameBoard Business</span>
                    </div>
                    <p class="text-gray-400 text-sm">
                        Master IT operations through interactive board game simulations.
                    </p>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Product</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-white transition">Features</a></li>
                        <li><a href="#" class="hover:text-white transition">Scenarios</a></li>
                        <li><a href="#" class="hover:text-white transition">Pricing</a></li>
                        <li><a href="#" class="hover:text-white transition">Enterprise</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Company</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Connect With Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm text-center md:text-left mb-4 md:mb-0">
                    © 2025 GameBoard Business. All rights reserved.
                </p>
                <div class="flex space-x-6 text-sm text-gray-400">
                    <a href="#" class="hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition">Terms of Service</a>
                    <a href="#" class="hover:text-white transition">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Scripts --}}
    <script>
        // Video Player
        function playVideo() {
            const thumbnail = document.getElementById('videoThumbnail');
            const player = document.getElementById('videoPlayer');
            const youtubeFrame = document.getElementById('youtubeFrame');
            const youtubeVideoId = 'dQw4w9WgXcQ'; // Ganti dengan video ID Anda

            thumbnail.classList.add('hidden');
            player.classList.remove('hidden');
            youtubeFrame.src = `https://www.youtube.com/embed/${youtubeVideoId}?autoplay=1`;
        }

        // Testimonial Slider
        let currentTestimonial = 0;
        const totalTestimonials = 2;
        let autoSlideInterval;

        function updateTestimonialSlider() {
            const slider = document.getElementById('testimonialSlider');
            const dots = document.querySelectorAll('.testimonial-dot');

            slider.style.transform = `translateX(-${currentTestimonial * 100}%)`;

            dots.forEach((dot, index) => {
                if (index === currentTestimonial) {
                    dot.classList.add('bg-gray-800', 'w-10');
                    dot.classList.remove('bg-gray-400', 'w-3');
                } else {
                    dot.classList.remove('bg-gray-800', 'w-10');
                    dot.classList.add('bg-gray-400', 'w-3');
                }
            });
        }

        function nextTestimonial() {
            currentTestimonial = (currentTestimonial + 1) % totalTestimonials;
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

        document.addEventListener('DOMContentLoaded', function() {
            startAutoSlide();

            // Mobile Menu Toggle
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');

            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });

                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.add('hidden');
                    });
                });
            }
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Form submission
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Thank you for your message! We will get back to you within 24 hours.');
                form.reset();
            });
        }
    </script>
</body>
</html>
