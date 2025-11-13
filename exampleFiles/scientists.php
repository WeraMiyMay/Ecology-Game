<!DOCTYPE html>
<html lang="ru" class="<?php echo isset($_SESSION['theme']) ? $_SESSION['theme'] : 'light'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ученые - Экологика</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            light: '#4ade80', // light green
                            DEFAULT: '#22c55e', // medium green
                            dark: '#16a34a', // dark green
                        },
                        secondary: {
                            light: '#7dd3fc', // light blue
                            DEFAULT: '#0ea5e9', // medium blue
                            dark: '#0284c7', // dark blue
                        },
                        background: {
                            light: '#f0f9ff', // light blue bg
                            dark: '#0f172a', // dark blue bg
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 1.5s ease-in-out',
                        'slide-up': 'slideUp 1s ease-out',
                        'slide-down': 'slideDown 1s ease-out',
                        'slide-left': 'slideLeft 1s ease-out',
                        'slide-right': 'slideRight 1s ease-out',
                        'scale-up': 'scaleUp 0.5s ease-out',
                        'scale-in': 'scaleIn 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)',
                        'bounce-slow': 'bounce 3s infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                        'spin-slow': 'spin 8s linear infinite',
                        'bounce-in': 'bounceIn 0.75s ease-in-out',
                        'flip-in': 'flipIn 0.75s ease-in-out',
                        'jello': 'jello 1s ease-in-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(50px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideDown: {
                            '0%': { transform: 'translateY(-50px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideLeft: {
                            '0%': { transform: 'translateX(50px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        slideRight: {
                            '0%': { transform: 'translateX(-50px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        scaleUp: {
                            '0%': { transform: 'scale(0.8)', opacity: '0' },
                            '100%': { transform: 'scale(1)', opacity: '1' },
                        },
                        scaleIn: {
                            '0%': { transform: 'scale(0)', opacity: '0' },
                            '100%': { transform: 'scale(1)', opacity: '1' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' },
                        },
                        bounceIn: {
                            '0%': { transform: 'scale(0.3)', opacity: '0' },
                            '50%': { transform: 'scale(1.05)', opacity: '0.8' },
                            '70%': { transform: 'scale(0.9)', opacity: '1' },
                            '100%': { transform: 'scale(1)', opacity: '1' },
                        },
                        flipIn: {
                            '0%': { transform: 'perspective(400px) rotateX(90deg)', opacity: '0' },
                            '40%': { transform: 'perspective(400px) rotateX(-10deg)', opacity: '1' },
                            '70%': { transform: 'perspective(400px) rotateX(10deg)', opacity: '1' },
                            '100%': { transform: 'perspective(400px) rotateX(0deg)', opacity: '1' },
                        },
                        jello: {
                            '0%, 11.1%, 100%': { transform: 'none' },
                            '22.2%': { transform: 'skewX(-12.5deg) skewY(-12.5deg)' },
                            '33.3%': { transform: 'skewX(6.25deg) skewY(6.25deg)' },
                            '44.4%': { transform: 'skewX(-3.125deg) skewY(-3.125deg)' },
                            '55.5%': { transform: 'skewX(1.5625deg) skewY(1.5625deg)' },
                            '66.6%': { transform: 'skewX(-0.78125deg) skewY(-0.78125deg)' },
                            '77.7%': { transform: 'skewX(0.390625deg) skewY(0.390625deg)' },
                            '88.8%': { transform: 'skewX(-0.1953125deg) skewY(-0.1953125deg)' },
                        },
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            transition: background-color 0.5s ease;
            scroll-behavior: smooth;
        }
        
        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--bg-color);
            z-index: 9999;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: opacity 0.8s ease, visibility 0.8s ease;
        }
        
        #loading-screen.loaded {
            opacity: 0;
            visibility: hidden;
        }
        
        .loading-item {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        
        .loading-item.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .leaf {
            position: absolute;
            width: 25px;
            height: 25px;
            background-color: #4ade80;
            opacity: 0.7;
            border-radius: 30% 70% 60% 40% / 30% 30% 70% 70%;
            animation: falling 5s linear infinite;
        }
        
        @keyframes falling {
            0% {
                transform: translateY(-100px) rotate(0deg) scale(0.8);
                opacity: 0;
            }
            10% {
                opacity: 0.8;
            }
            90% {
                opacity: 0.8;
            }
            100% {
                transform: translateY(100vh) rotate(360deg) scale(1.2);
                opacity: 0;
            }
        }
        
        #canvas-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        
        .menu-button {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .menu-button::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: currentColor;
            transition: width 0.3s ease;
        }
        
        .menu-button:hover::after {
            width: 100%;
        }
        
        .logo-text {
            background: linear-gradient(90deg, #16a34a, #7dd3fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }
        
        .dark .logo-text {
            background: linear-gradient(90deg, #4ade80, #0ea5e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        :root {
            --bg-color: #f0f9ff;
            --text-color: #1e293b;
        }
        
        .dark {
            --bg-color: #0f172a;
            --text-color: #f1f5f9;
        }
        
        /* For theme transition */
        .theme-transition {
            transition: background-color 0.5s ease, color 0.5s ease;
        }
        
        /* Glass effect */
        .glass {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .dark .glass {
            background: rgba(15, 23, 42, 0.25);
        }
        
        /* Mobile menu */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        
        .mobile-menu.active {
            transform: translateX(0);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        .dark ::-webkit-scrollbar-track {
            background: #1e293b;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }
        
        /* Scientist card styles */
        .scientist-card {
            transition: all 0.3s ease;
            border-radius: 1rem;
            overflow: hidden;
            position: relative;
            height: 100%;
        }
        
        .scientist-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .scientist-image {
            aspect-ratio: 1/1;
            object-fit: cover;
            width: 100%;
            transition: transform 0.5s ease;
        }
        
        .scientist-card:hover .scientist-image {
            transform: scale(1.05);
        }
        
        .locked-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            transition: opacity 0.3s ease;
        }
        
        .scientist-card:hover .locked-overlay {
            opacity: 0.9;
        }
        
        .scientist-placeholder {
            filter: blur(8px);
            opacity: 0.7;
        }
        
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            overflow-y: auto;
            padding: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .modal.active {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            opacity: 1;
            backdrop-filter: blur(4px);
        }
        
        .modal-content {
            background-color: white;
            border-radius: 1rem;
            overflow: hidden;
            width: 100%;
            max-width: 600px;
            margin: 40px auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(20px);
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        
        .dark .modal-content {
            background-color: #1e293b;
            color: #f1f5f9;
        }
        
        .modal.active .modal-content {
            transform: translateY(0);
            opacity: 1;
        }
        
        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 36px;
            height: 36px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #1e293b;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .dark .modal-close {
            background-color: rgba(15, 23, 42, 0.8);
            color: #f1f5f9;
        }
        
        .modal-close:hover {
            transform: rotate(90deg);
        }
        
        /* Progress indicator */
        .progress-container {
            width: 100%;
            background-color: #e2e8f0;
            border-radius: 9999px;
            height: 8px;
            overflow: hidden;
        }
        
        .dark .progress-container {
            background-color: #334155;
        }
        
        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #16a34a, #0ea5e9);
            border-radius: 9999px;
            transition: width 1s ease;
        }
        
        /* Achievement badges */
        .achievement-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #16a34a;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 0.8rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }
        
        /* Profile page specific styles */
        .tab-container {
            overflow: hidden;
        }
        
        .tab-button {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .tab-button::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: currentColor;
            transition: width 0.3s ease;
        }
        
        .tab-button.active::after {
            width: 100%;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* Added styles for search result highlight */
        .highlight {
            background-color: rgba(34, 197, 94, 0.2);
            border-radius: 2px;
            padding: 0 2px;
        }
        
        /* Added animation for no results */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.5s ease forwards;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-gray-800 dark:text-gray-100 theme-transition">
    <!-- Loading Screen -->
    <div id="loading-screen">
        <div class="w-24 h-24 mb-4 relative loading-item" id="loading-spinner">
            <div class="absolute w-full h-full rounded-full border-4 border-t-primary-light border-r-primary border-b-primary-dark border-l-secondary animate-spin"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary-dark animate-pulse-slow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
            </div>
        </div>
        <h2 class="text-2xl font-bold mb-2 loading-item" id="loading-title">Загрузка Экологики</h2>
        <p class="text-sm loading-item" id="loading-text">Подготовка к научному путешествию...</p>
        <div class="mt-4 w-64 h-2 bg-gray-200 dark:bg-gray-700 rounded-full loading-item" id="loading-progress-container">
            <div id="loading-progress" class="h-full bg-gradient-to-r from-primary to-secondary rounded-full w-0"></div>
        </div>
    </div>

    <!-- 3D Background Container -->
    <div id="canvas-container"></div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed top-0 right-0 h-full w-4/5 max-w-xs bg-white dark:bg-gray-800 z-50 shadow-2xl mobile-menu flex flex-col">
        <div class="flex justify-between items-center p-4 border-b border-gray-200 dark:border-gray-700">
            <div class="text-2xl font-bold logo-text animate-pulse-slow">Экологика</div>
            <button id="close-menu" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300 hover:rotate-90">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col p-4 space-y-4">
            <a href="profile.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item">Профиль</a>
            <a href="achievements.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item">Достижения</a>
            <a href="scientists.php" class="py-2 px-4 bg-green-100 dark:bg-green-800/30 text-primary dark:text-primary-light rounded transition-all duration-300 mobile-menu-item">Ученые</a>
            <a href="rating.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item">Статистика</a>
            <a href="choice.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item">Играть</a>
        </div>
        <div class="mt-auto p-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500 dark:text-gray-400">Переключить тему</span>
                <button id="mobile-theme-toggle" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 transition-all duration-300 hover:rotate-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-100 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-white/80 dark:bg-background-dark/80 backdrop-blur-md z-50 transition-all duration-300 shadow-sm navbar-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3 md:py-4">
                <div class="flex items-center">
                    <a href="profile.php" class="text-3xl font-bold logo-text animate-pulse-slow">Экологика</a>
                </div>
                <div class="hidden md:flex items-center space-x-1 lg:space-x-8 nav-items">
                    <a href="profile.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Профиль</a>
                    <a href="achievements.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Достижения</a>
                    <a href="scientists.php" class="menu-button px-3 py-2 text-primary dark:text-primary-light transition-all duration-300 nav-item font-semibold">Ученые</a>
                    <a href="rating.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Статистика</a>
                    <a href="choice.php" class="px-4 py-2 bg-primary hover:bg-primary-dark text-white rounded-lg transition-all duration-300 hover:shadow-md nav-item">Играть</a>
                    <button id="theme-toggle" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 transition-all duration-300 hover:rotate-12 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-100 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                </div>
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-24 pb-16 page-transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Scientists Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold mb-4 animate-scale-up">Выдающиеся Ученые</h1>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto animate-fade-in">
                    Откройте для себя выдающихся учёных и их вклад в науку об экологии и окружающей среде. 
                    Открывайте новых учёных, проходя испытания в игре.
                </p>
                
                <!-- Progress indicator -->
                <div class="max-w-md mx-auto mt-6">
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-gray-600 dark:text-gray-400">Открыто учёных:</span>
                        <span class="font-medium">
                            <?php echo count($unlockedScientists); ?> из <?php echo count($allScientists); ?>
                            (<?php echo round((count($unlockedScientists) / count($allScientists)) * 100); ?>%)
                        </span>
                    </div>
                    <div class="progress-container">
                        <div class="progress-bar" style="width: <?php echo (count($unlockedScientists) / count($allScientists)) * 100; ?>%"></div>
                    </div>
                </div>
            </div>
            
            <!-- Search and Filter Section -->
            <div class="mb-8 bg-white dark:bg-gray-800 rounded-lg shadow-md p-4 animate-slide-up">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <!-- Search Input -->
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input 
                            id="search-input" 
                            type="text" 
                            placeholder="Поиск ученых..." 
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-primary-light text-base"
                        >
                    </div>
                    
                    <!-- Filter Options -->
                    <div class="flex flex-wrap gap-3">
                        <!-- Status Filter -->
                        <div class="relative">
                            <select id="status-filter" class="appearance-none bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-gray-100 py-2 px-4 pr-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-primary-light text-base">
                                <option value="all">Все ученые</option>
                                <option value="unlocked">Открытые</option>
                                <option value="locked">Заблокированные</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-600 dark:text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Reset Filters Button -->
                        <button id="reset-filters" class="px-4 py-2 bg-gray-200 dark:bg-gray-600 hover:bg-gray-300 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-100 rounded-lg transition-colors">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                <span>Сбросить</span>
                            </div>
                        </button>
                    </div>
                </div>
                
                <!-- Search Results Info -->
                <div id="search-results-info" class="mt-3 text-sm text-gray-600 dark:text-gray-400 hidden">
                    Найдено: <span id="results-count">0</span> ученых
                </div>
            </div>
            
            <!-- Scientists Grid -->
            <div id="scientists-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-8">
                <?php foreach ($allScientists as $scientist): 
                    $isUnlocked = in_array($scientist['id'], $unlockedIds);
                ?>
                <div class="scientist-card bg-white dark:bg-gray-800 shadow-md" 
                     data-aos="fade-up" 
                     data-id="<?php echo $scientist['id']; ?>"
                     data-name="<?php echo htmlspecialchars($scientist['full_name']); ?>"
                     data-status="<?php echo $isUnlocked ? 'unlocked' : 'locked'; ?>">
                    <div class="relative overflow-hidden">
                        <?php if ($isUnlocked): ?>
                            <img 
                                src="<?php echo htmlspecialchars($scientist['photo_url']); ?>" 
                                alt="<?php echo htmlspecialchars($scientist['full_name']); ?>" 
                                class="scientist-image cursor-pointer" 
                                loading="lazy"
                            >
                            <div class="achievement-badge" title="Открыто">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        <?php else: ?>
                            <img 
                                src="<?php echo htmlspecialchars($scientist['photo_url']); ?>" 
                                alt="Заблокированный учёный" 
                                class="scientist-image scientist-placeholder"
                                loading="lazy"
                            >
                            <div class="locked-overlay">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m0 0v2m0-2h2m-2 0H8m9.406-6.188l-.517-.519a2.25 2.25 0 00-3.182 0L12 11.593l-2.707-2.7a2.25 2.25 0 00-3.182 0l-.517.518a2.25 2.25 0 000 3.182L9.409 16H7a1 1 0 00-1 1v4a1 1 0 001 1h10a1 1 0 001-1v-4a1 1 0 00-1-1h-2.409l3.816-3.808a2.25 2.25 0 000-3.182z" />
                                </svg>
                                <p class="font-semibold">Заблокировано</p>
                                <p class="text-xs mt-1 px-4 text-center">Продолжайте играть, чтобы открыть этого учёного</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-bold mb-1 scientist-name <?php echo $isUnlocked ? '' : 'text-gray-400 dark:text-gray-500'; ?>">
                            <?php echo $isUnlocked ? htmlspecialchars($scientist['full_name']) : '??????????????'; ?>
                        </h3>
                        <?php if ($isUnlocked): ?>
                            <button class="mt-2 text-sm px-3 py-1 bg-primary/10 hover:bg-primary/20 text-primary dark:bg-primary-dark/20 dark:hover:bg-primary-dark/30 dark:text-primary-light rounded-full transition-colors show-details">
                                Подробнее
                            </button>
                        <?php else: ?>
                            <p class="text-sm text-gray-400 dark:text-gray-500 italic">Информация заблокирована</p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <!-- No Results Message (hidden by default) -->
            <div id="no-results" class="hidden text-center py-12 mt-8 bg-gray-50 dark:bg-gray-800/50 rounded-lg fade-in-up">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 dark:text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <h3 class="text-xl font-bold text-gray-500 dark:text-gray-400 mb-2">Ничего не найдено</h3>
                <p class="text-gray-500 dark:text-gray-400 max-w-md mx-auto mb-6">
                    Не удалось найти ученых, соответствующих критериям поиска. Попробуйте изменить параметры поиска.
                </p>
                <button id="clear-search" class="inline-flex items-center px-4 py-2 bg-primary hover:bg-primary-dark text-white rounded-lg transition-all duration-300 hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span>Сбросить поиск</span>
                </button>
            </div>
            
            <!-- Empty state if no scientists are unlocked -->
            <?php if (count($unlockedScientists) === 0): ?>
            <div id="empty-state" class="text-center py-12 mt-8 bg-gray-50 dark:bg-gray-800/50 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 dark:text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M12 14l9-5-9-5-9 5 9 5zm0 0v6M12 14l9-5-9-5-9 5 9 5z" />
                </svg>
                <h3 class="text-xl font-bold text-gray-500 dark:text-gray-400 mb-2">Пока нет открытых учёных</h3>
                <p class="text-gray-500 dark:text-gray-400 max-w-md mx-auto mb-6">
                    Играйте в экологические игры, чтобы открывать выдающихся учёных и узнавать их истории
                </p>
                <a href="choice.php" class="inline-flex items-center px-4 py-2 bg-primary hover:bg-primary-dark text-white rounded-lg transition-all duration-300 hover:shadow-md">
                    <span>Начать игру</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </main>
    
    <!-- Scientist Detail Modal -->
    <div id="scientist-modal" class="modal">
        <div class="modal-content max-w-xl">
            <div class="relative">
                <div id="modal-header" class="h-40 bg-gradient-to-r from-primary to-secondary"></div>
                <div id="modal-image-container" class="absolute -bottom-16 left-1/2 transform -translate-x-1/2 w-32 h-32 rounded-full overflow-hidden border-4 border-white dark:border-gray-800">
                    <img id="modal-scientist-image" src="" alt="" class="w-full h-full object-cover">
                </div>
                <button class="modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-6 pt-20">
                <div class="text-center mb-6">
                    <h2 id="modal-scientist-name" class="text-2xl font-bold mb-1"></h2>
                    <p id="modal-scientist-years" class="text-gray-600 dark:text-gray-400"></p>
                    <p id="modal-scientist-country" class="mt-1 inline-block px-3 py-1 bg-gray-100 dark:bg-gray-700 rounded-full text-sm"></p>
                </div>
                
                <div class="space-y-4 mt-8">
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Биография</h3>
                        <p id="modal-scientist-bio" class="text-gray-700 dark:text-gray-300"></p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Основной вклад</h3>
                        <p id="modal-scientist-contributions" class="text-gray-700 dark:text-gray-300"></p>
                    </div>
                </div>
                
                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Открыто <span id="modal-date-opened"></span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script>
    <script>
        // Initialize Theme based on user's preference
        // Initialize Theme based on user's preference and localStorage
function initTheme() {
    // Check localStorage first
    const savedTheme = localStorage.getItem('theme');
    
    if (savedTheme === 'dark') {
        document.documentElement.classList.add('dark');
    } else if (savedTheme === 'light') {
        document.documentElement.classList.remove('dark');
    } else {
        // If no saved preference, use system preference
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
    
    // Add listener for future changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
        // Only apply system preference if user hasn't manually set a theme
        if (!localStorage.getItem('theme')) {
            if (event.matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            updateThreeBackground();
        }
    });
}
  // Theme Toggle Handler
document.getElementById('theme-toggle').addEventListener('click', () => {
    document.documentElement.classList.toggle('dark');
    // Save theme preference to localStorage
    if (document.documentElement.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
    updateThreeBackground();
});

// Mobile Theme Toggle Handler
document.getElementById('mobile-theme-toggle').addEventListener('click', () => {
    document.documentElement.classList.toggle('dark');
    // Save theme preference to localStorage
    if (document.documentElement.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
    updateThreeBackground();
});
        
        // Save theme preference to server
        function saveThemePreference(theme) {
            // Save the theme preference using an AJAX request
            const formData = new FormData();
            formData.append('theme', theme);
            
            fetch(window.location.href, {
                method: 'POST',
                body: formData
            }).catch(error => {
                console.error('Error saving theme preference:', error);
            });
        }

        // Mobile Menu Handlers
        document.getElementById('mobile-menu-button').addEventListener('click', () => {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.add('active');
            
            // Анимируем элементы меню
            const menuItems = document.querySelectorAll('.mobile-menu-item');
            menuItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateX(20px)';
                
                setTimeout(() => {
                    item.style.transition = 'all 0.4s ease';
                    item.style.opacity = '1';
                    item.style.transform = 'translateX(0)';
                }, 100 + (index * 50));
            });
        });
        
        document.getElementById('close-menu').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.remove('active');
        });

        // Loading Screen
        document.addEventListener('DOMContentLoaded', () => {
            initTheme();
            
            // Initialize AOS animations
            AOS.init({
                duration: 800,
                easing: 'ease-out',
                once: true
            });
            
            // Loading progress simulation
            const loadingScreen = document.getElementById('loading-screen');
            const loadingProgress = document.getElementById('loading-progress');
            
            let progress = 0;
            const loadingInterval = setInterval(() => {
                progress += Math.random() * 8 + 2;
                if (progress >= 100) {
                    progress = 100;
                    clearInterval(loadingInterval);
                    
                    // Hide loading screen
                    setTimeout(() => {
                        loadingScreen.classList.add('loaded');
                    }, 500);
                }
                loadingProgress.style.width = `${progress}%`;
            }, 80);
            
            // Initialize Three.js scene
            initThreeBackground();

            // Show loading items
            const loadingItems = document.querySelectorAll('.loading-item');
            let delay = 0;
            
            loadingItems.forEach(item => {
                setTimeout(() => {
                    item.classList.add('visible');
                }, delay);
                delay += 200;
            });
            
            // Initialize scientist details modal
            initScientistModal();
            
            // Initialize search and filter functionality
            initSearchAndFilter();
        });

        // Scientist Modal Functionality
        function initScientistModal() {
            const modal = document.getElementById('scientist-modal');
            const modalClose = document.querySelector('.modal-close');
            const detailButtons = document.querySelectorAll('.show-details');
            const unlockedCards = document.querySelectorAll('.scientist-card:not(.locked)');
            
            // Open modal when clicking on "Show Details" button
            detailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const card = this.closest('.scientist-card');
                    const scientistId = card.dataset.id;
                    openScientistModal(scientistId);
                });
            });
            
            // Also open modal when clicking on unlocked scientist image
            document.querySelectorAll('.scientist-image:not(.scientist-placeholder)').forEach(img => {
                img.addEventListener('click', function() {
                    const card = this.closest('.scientist-card');
                    const scientistId = card.dataset.id;
                    openScientistModal(scientistId);
                });
            });
            
            // Close modal
            modalClose.addEventListener('click', () => {
                closeScientistModal();
            });
            
            // Close modal when clicking outside
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    closeScientistModal();
                }
            });
            
            // Close modal with escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && modal.classList.contains('active')) {
                    closeScientistModal();
                }
            });
        }
        
        function openScientistModal(scientistId) {
            const modal = document.getElementById('scientist-modal');
            
            // Show loading state
            document.getElementById('modal-scientist-name').textContent = 'Загрузка...';
            document.getElementById('modal-scientist-years').textContent = '';
            document.getElementById('modal-scientist-country').textContent = '';
            document.getElementById('modal-scientist-bio').textContent = 'Загрузка информации...';
            document.getElementById('modal-scientist-contributions').textContent = '';
            document.getElementById('modal-date-opened').textContent = '';
            document.getElementById('modal-scientist-image').src = '';
            
            // Show modal
            modal.classList.add('active');
            
            // Fetch scientist details
            fetch(`scientists.php?get_scientist_detail=1&id=${scientistId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const scientist = data.data;
                        
                        // Update modal content
                        document.getElementById('modal-scientist-name').textContent = scientist.full_name;
                        document.getElementById('modal-scientist-years').textContent = `${scientist.birth_year} - ${scientist.death_year || 'наст. время'}`;
                        document.getElementById('modal-scientist-country').textContent = scientist.country;
                        document.getElementById('modal-scientist-bio').textContent = scientist.short_bio;
                        document.getElementById('modal-scientist-contributions').textContent = scientist.main_contributions;
                        
                        // Format date opened
                        const dateOpened = new Date();
                        document.getElementById('modal-date-opened').textContent = dateOpened.toLocaleDateString('ru-RU');
                        
                        // Set image
                        document.getElementById('modal-scientist-image').src = scientist.photo_url;
                    } else {
                        document.getElementById('modal-scientist-name').textContent = 'Ошибка загрузки';
                        document.getElementById('modal-scientist-bio').textContent = 'Не удалось загрузить информацию об учёном. Возможно, вы ещё не открыли этого учёного.';
                    }
                })
                .catch(error => {
                    console.error('Error fetching scientist details:', error);
                    document.getElementById('modal-scientist-name').textContent = 'Ошибка загрузки';
                    document.getElementById('modal-scientist-bio').textContent = 'Произошла ошибка при загрузке данных. Пожалуйста, попробуйте позже.';
                });
        }
        
        function closeScientistModal() {
            const modal = document.getElementById('scientist-modal');
            modal.classList.remove('active');
        }

        // Three.js Background
        let scene, camera, renderer, particles, isDark;
        const particleCount = 800;
        let clock = new THREE.Clock();

        function initThreeBackground() {
            const container = document.getElementById('canvas-container');
            
            // Create scene
            scene = new THREE.Scene();
            
            // Create camera
            camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            camera.position.z = 20;
            
            // Create renderer
            renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setPixelRatio(window.devicePixelRatio);
            container.innerHTML = '';
            container.appendChild(renderer.domElement);
            
            // Check if dark mode is active
            isDark = document.documentElement.classList.contains('dark');
            
            // Create particles
            createParticles();
            
            // Handle window resize
            window.addEventListener('resize', () => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
            });
            
            // Start animation loop
            animate();
        }

        function createParticles() {
            // Remove existing particles if any
            if (particles) {
                scene.remove(particles);
            }
            
            const particleGeometry = new THREE.BufferGeometry();
            const positions = new Float32Array(particleCount * 3);
            const colors = new Float32Array(particleCount * 3);
            const sizes = new Float32Array(particleCount);
            
            // Define particles positions, colors and sizes
            for (let i = 0; i < particleCount; i++) {
                const i3 = i * 3;
                
                // Position - use a wider, flatter distribution for more natural look
                positions[i3] = (Math.random() - 0.5) * 150;
                positions[i3 + 1] = (Math.random() - 0.5) * 100;
                positions[i3 + 2] = (Math.random() - 0.5) * 60;
                
                // Размер частиц - разный для разнообразия
                sizes[i] = Math.random() * 0.5 + 0.1;
                
                // Color
                if (isDark) {
                    // Dark theme: brighter, more vibrant colors
                    colors[i3] = Math.random() * 0.3 + 0.2;             // R: Greenish (0.2-0.5)
                    colors[i3 + 1] = Math.random() * 0.6 + 0.4;         // G: Stronger green (0.4-1.0)
                    colors[i3 + 2] = Math.random() * 0.4 + 0.2;         // B: Some blue for cyan tint (0.2-0.6)
                } else {
                    // Light theme: more subtle, pastel colors
                    colors[i3] = Math.random() * 0.2 + 0.1;             // R: Less red (0.1-0.3)
                    colors[i3 + 1] = Math.random() * 0.5 + 0.3;         // G: Medium green (0.3-0.8)
                    colors[i3 + 2] = Math.random() * 0.3 + 0.1;         // B: Subtle blue (0.1-0.4)
                }
            }
            
            particleGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
            particleGeometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));
            particleGeometry.setAttribute('size', new THREE.BufferAttribute(sizes, 1));
            
            // Create material with improved settings
            const particleMaterial = new THREE.PointsMaterial({
                size: 0.5,
                sizeAttenuation: true,
                vertexColors: true,
                transparent: true,
                opacity: isDark ? 0.7 : 0.5,
                blending: THREE.AdditiveBlending
            });
            
            // Create particle system
            particles = new THREE.Points(particleGeometry, particleMaterial);
            scene.add(particles);
        }

        function updateThreeBackground() {
            isDark = document.documentElement.classList.contains('dark');
            createParticles();
        }

        function animate() {
            requestAnimationFrame(animate);
            
            // Более сложная анимация частиц
            const delta = clock.getDelta();
            if (particles) {
                particles.rotation.x += delta * 0.02;
                particles.rotation.y += delta * 0.03;
                
                // Волнообразное движение частиц
                const time = Date.now() * 0.001;
                const positions = particles.geometry.attributes.position.array;
                
                for (let i = 0; i < positions.length; i += 3) {
                    // Добавляем небольшое синусоидальное движение
                    positions[i + 1] += Math.sin(time + positions[i] * 0.01) * 0.02;
                }
                
                particles.geometry.attributes.position.needsUpdate = true;
            }
            
            renderer.render(scene, camera);
        }
        
        // Search and Filter Functionality
        function initSearchAndFilter() {
            const searchInput = document.getElementById('search-input');
            const statusFilter = document.getElementById('status-filter');
            const resetButton = document.getElementById('reset-filters');
            const clearSearchButton = document.getElementById('clear-search');
            const resultsInfo = document.getElementById('search-results-info');
            const resultsCount = document.getElementById('results-count');
            const noResults = document.getElementById('no-results');
            const emptyState = document.getElementById('empty-state');
            const scientistsGrid = document.getElementById('scientists-grid');
            
            // Apply filters function
            function applyFilters() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const statusValue = statusFilter.value;
                
                // Get all scientist cards
                const cards = document.querySelectorAll('.scientist-card');
                let visibleCount = 0;
                
                cards.forEach(card => {
                    // Get card data
                    const name = card.dataset.name ? card.dataset.name.toLowerCase() : '';
                    const status = card.dataset.status;
                    
                    // Check if card matches all filters
                    const matchesSearch = searchTerm === '' || name.includes(searchTerm);
                    const matchesStatus = statusValue === 'all' || statusValue === status;
                    
                    // Show or hide card based on filter
                    if (matchesSearch && matchesStatus) {
                        card.classList.remove('hidden');
                        visibleCount++;
                        
                        // Highlight search term in visible cards if there's a search term
                        if (searchTerm !== '') {
                            const nameElement = card.querySelector('.scientist-name');
                            if (nameElement && status === 'unlocked') {
                                // Only highlight text for unlocked scientists
                                const originalName = card.dataset.name;
                                const regex = new RegExp(`(${escapeRegExp(searchTerm)})`, 'gi');
                                nameElement.innerHTML = originalName.replace(regex, '<span class="highlight">$1</span>');
                            }
                        } else {
                            // Restore original text when no search term
                            const nameElement = card.querySelector('.scientist-name');
                            if (nameElement && status === 'unlocked') {
                                nameElement.textContent = card.dataset.name;
                            }
                        }
                    } else {
                        card.classList.add('hidden');
                    }
                });
                
                // Update results info
                if (searchTerm !== '' || statusValue !== 'all') {
                    resultsInfo.classList.remove('hidden');
                    resultsCount.textContent = visibleCount;
                } else {
                    resultsInfo.classList.add('hidden');
                }
                
                // Show/hide no results message
                if (visibleCount === 0) {
                    noResults.classList.remove('hidden');
                    scientistsGrid.classList.add('hidden');
                    emptyState.classList.add('hidden');
                } else {
                    noResults.classList.add('hidden');
                    scientistsGrid.classList.remove('hidden');
                    emptyState.classList.add('hidden');
                }
            }
            
            // Helper function to escape special characters in regex
            function escapeRegExp(string) {
                return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
            }
            
            // Reset filters function
            function resetFilters() {
                searchInput.value = '';
                statusFilter.value = 'all';
                
                // Restore original text
                const nameElements = document.querySelectorAll('.scientist-name');
                nameElements.forEach(element => {
                    const card = element.closest('.scientist-card');
                    if (card && card.dataset.status === 'unlocked') {
                        element.textContent = card.dataset.name;
                    }
                });
                
                applyFilters();
                
                // Remove focus from search input
                searchInput.blur();
            }
            
            // Event listeners
            searchInput.addEventListener('input', applyFilters);
            statusFilter.addEventListener('change', applyFilters);
            resetButton.addEventListener('click', resetFilters);
            clearSearchButton.addEventListener('click', resetFilters);
            
            // Initial filter application (in case there are URL params)
            applyFilters();
        }
    </script>
</body>
</html>