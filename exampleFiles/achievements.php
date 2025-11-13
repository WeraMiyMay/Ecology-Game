<!DOCTYPE html>
<html lang="ru" class="<?php echo isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark' ? 'dark' : 'light'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Достижения - Экологика</title>
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
        
        /* Category tab navigation */
        .category-tab {
            position: relative;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .category-tab::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background-color: #5D5CDE;
            transition: width 0.3s ease;
        }
        
        .category-tab.active::after,
        .category-tab:hover::after {
            width: 100%;
        }
        
        /* Achievement card styles */
        .achievement-card {
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .achievement-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .achievement-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            transition: all 0.3s ease;
        }
        
        .achievement-card:hover .achievement-icon {
            transform: scale(1.1);
        }
        
        .achievement-card.locked {
            filter: grayscale(1);
            opacity: 0.7;
        }
        
        .achievement-card.locked:hover {
            filter: grayscale(0.5);
            opacity: 0.9;
        }
        
        .achievement-icon.green {
            background: linear-gradient(135deg, #4ade80, #22c55e);
            color: white;
            box-shadow: 0 0 15px rgba(34, 197, 94, 0.5);
        }
        
        .achievement-icon.blue {
            background: linear-gradient(135deg, #7dd3fc, #0ea5e9);
            color: white;
            box-shadow: 0 0 15px rgba(14, 165, 233, 0.5);
        }
        
        .achievement-icon.purple {
            background: linear-gradient(135deg, #c084fc, #8b5cf6);
            color: white;
            box-shadow: 0 0 15px rgba(139, 92, 246, 0.5);
        }
        
        .achievement-icon.yellow {
            background: linear-gradient(135deg, #fde047, #eab308);
            color: white;
            box-shadow: 0 0 15px rgba(234, 179, 8, 0.5);
        }
        
        .achievement-icon.orange {
            background: linear-gradient(135deg, #fdba74, #f97316);
            color: white;
            box-shadow: 0 0 15px rgba(249, 115, 22, 0.5);
        }
        
        .achievement-icon.indigo {
            background: linear-gradient(135deg, #a5b4fc, #6366f1);
            color: white;
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.5);
        }
        
        .achievement-icon.pink {
            background: linear-gradient(135deg, #f9a8d4, #ec4899);
            color: white;
            box-shadow: 0 0 15px rgba(236, 72, 153, 0.5);
        }
        
        .achievement-icon.teal {
            background: linear-gradient(135deg, #5eead4, #14b8a6);
            color: white;
            box-shadow: 0 0 15px rgba(20, 184, 166, 0.5);
        }
        
        .achievement-card.locked .achievement-icon {
            background: linear-gradient(135deg, #94a3b8, #64748b);
            box-shadow: none;
        }
        
        .achievement-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .achievement-card.locked:hover .achievement-overlay {
            opacity: 1;
        }
        
        .locked-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 4px 8px;
            border-radius: 9999px;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            z-index: 10;
        }
        
        /* Difficulty stars */
        .difficulty-stars {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0.5rem;
        }
        
        .difficulty-star {
            color: #e2e8f0;
            margin: 0 1px;
        }
        
        .dark .difficulty-star {
            color: #334155;
        }
        
        .difficulty-star.filled {
            color: #fbbf24;
            filter: drop-shadow(0 0 2px rgba(251, 191, 36, 0.5));
        }
        
        /* Progress circle */
        .progress-circle {
            position: relative;
            width: 120px;
            height: 120px;
        }
        
        .progress-circle svg {
            transform: rotate(-90deg);
        }
        
        .progress-circle-bg {
            fill: none;
            stroke: #e2e8f0;
            stroke-width: 8;
        }
        
        .dark .progress-circle-bg {
            stroke: #334155;
        }
        
        .progress-circle-value {
            fill: none;
            stroke: #5D5CDE;
            stroke-width: 8;
            stroke-linecap: round;
            transition: stroke-dasharray 1s ease;
        }
        
        .progress-circle-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        
        /* Badge styles */
        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .badge-purple {
            background-color: rgba(93, 92, 222, 0.1);
            color: #5D5CDE;
        }
        
        .dark .badge-purple {
            background-color: rgba(93, 92, 222, 0.2);
        }
        
        /* Recent achievement styles */
        .recent-achievement {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            border-radius: 0.5rem;
            background-color: rgba(148, 163, 184, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 0.75rem;
        }
        
        .recent-achievement:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .dark .recent-achievement:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -1px rgba(0, 0, 0, 0.1);
        }
        
        /* Achievement tooltip */
        .achievement-tooltip {
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 0.75rem;
            z-index: 50;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            pointer-events: none;
        }
        
        .dark .achievement-tooltip {
            background-color: #1e293b;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -1px rgba(0, 0, 0, 0.1);
        }
        
        .achievement-tooltip:after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border-width: 8px;
            border-style: solid;
            border-color: white transparent transparent transparent;
        }
        
        .dark .achievement-tooltip:after {
            border-color: #1e293b transparent transparent transparent;
        }
        
        .achievement-card:hover .achievement-tooltip {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(-10px);
        }
        
        /* Leaderboard styles */
        .leaderboard-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .leaderboard-table th {
            text-align: left;
            font-weight: 600;
            padding: 1rem;
            background-color: rgba(148, 163, 184, 0.1);
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .dark .leaderboard-table th {
            background-color: rgba(51, 65, 85, 0.5);
        }
        
        .leaderboard-table tr {
            transition: all 0.2s ease;
        }
        
        .leaderboard-table tr:hover {
            background-color: rgba(148, 163, 184, 0.1);
        }
        
        .dark .leaderboard-table tr:hover {
            background-color: rgba(51, 65, 85, 0.3);
        }
        
        .leaderboard-table td {
            padding: 1rem;
            border-bottom: 1px solid rgba(148, 163, 184, 0.2);
            vertical-align: middle;
        }
        
        .dark .leaderboard-table td {
            border-bottom: 1px solid rgba(51, 65, 85, 0.5);
        }
        
        .rank-cell {
            font-weight: 700;
            width: 70px;
            text-align: center;
        }
        
        .top-rank {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin: 0 auto;
            color: white;
            font-weight: bold;
        }
        
        .rank-1 {
            background: linear-gradient(135deg, #ffd700, #f59e0b);
            box-shadow: 0 4px 10px rgba(245, 158, 11, 0.3);
        }
        
        .rank-2 {
            background: linear-gradient(135deg, #c0c0c0, #94a3b8);
            box-shadow: 0 4px 10px rgba(148, 163, 184, 0.3);
        }
        
        .rank-3 {
            background: linear-gradient(135deg, #cd7f32, #b45309);
            box-shadow: 0 4px 10px rgba(180, 83, 9, 0.3);
        }
        
        /* Avatar styles */
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e2e8f0;
            color: #64748b;
            font-weight: 600;
        }
        
        .dark .avatar {
            background-color: #334155;
            color: #94a3b8;
        }
        
        /* View modes */
        .view-mode-button {
            padding: 0.5rem;
            border-radius: 0.25rem;
            transition: all 0.3s ease;
        }
        
        .view-mode-button:hover {
            background-color: rgba(148, 163, 184, 0.1);
        }
        
        .view-mode-button.active {
            background-color: rgba(93, 92, 222, 0.1);
            color: #5D5CDE;
        }
        
        .dark .view-mode-button.active {
            background-color: rgba(93, 92, 222, 0.2);
        }
        
        /* Loading indicator */
        .loading-indicator {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 3px solid rgba(148, 163, 184, 0.2);
            border-top-color: #5D5CDE;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Achievement detail modal */
        .achievement-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 100;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .achievement-modal.active {
            opacity: 1;
            visibility: visible;
        }
        
        .achievement-modal-content {
            background-color: white;
            border-radius: 1rem;
            padding: 2rem;
            max-width: 500px;
            width: 90%;
            transform: scale(0.9);
            transition: all 0.3s ease;
        }
        
        .dark .achievement-modal-content {
            background-color: #1e293b;
        }
        
        .achievement-modal.active .achievement-modal-content {
            transform: scale(1);
        }
        
        /* Search bar */
        .search-bar {
            position: relative;
        }
        
        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }
        
        .search-input {
            padding-left: 2.5rem;
            width: 100%;
            height: 2.5rem;
            border-radius: 0.5rem;
            background-color: white;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        
        .dark .search-input {
            background-color: #1e293b;
            border-color: #334155;
            color: white;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #5D5CDE;
            box-shadow: 0 0 0 3px rgba(93, 92, 222, 0.2);
        }
        
        .search-clear {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .search-clear.active {
            opacity: 1;
            visibility: visible;
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
        <h2 class="text-2xl font-bold mb-2 loading-item" id="loading-title">Загрузка</h2>
        <p class="text-sm loading-item" id="loading-text">Подготовка ваших достижений...</p>
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
            <a href="choice.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item">Режимы игры</a>
            <a href="profile.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item">Мой профиль</a>
            <a href="achievements.php" class="py-2 px-4 bg-gray-100 dark:bg-gray-700 rounded font-medium transition-all duration-300 mobile-menu-item">Достижения</a>
            <a href="rating.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item">Рейтинг</a>
            <a href="logout.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item text-red-500">Выйти</a>
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

    <!-- Achievement Detail Modal -->
    <div id="achievement-modal" class="achievement-modal">
        <div class="achievement-modal-content dark:text-gray-100">
            <div class="flex justify-between items-start mb-6">
                <h3 class="text-xl font-bold" id="modal-title">Название достижения</h3>
                <button id="close-modal" class="p-1 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div class="flex justify-center mb-6">
                <div id="modal-icon" class="achievement-icon green w-20 h-20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                    </svg>
                </div>
            </div>
            
            <p id="modal-description" class="text-gray-600 dark:text-gray-300 mb-6">Описание достижения...</p>
            
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Категория</h4>
                    <p id="modal-category" class="font-medium">Категория</p>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Сложность</h4>
                    <div id="modal-difficulty" class="difficulty-stars">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 difficulty-star" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Очки</h4>
                    <p id="modal-points" class="badge badge-purple inline-block">0 очков</p>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Статус</h4>
                    <p id="modal-status" class="font-medium text-green-500">Получено</p>
                </div>
            </div>
            
            <div id="modal-earned-date-container" class="mb-6">
                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Получено</h4>
                <p id="modal-earned-date" class="text-sm">01.01.2024 12:00</p>
            </div>
            
            <div class="flex justify-center">
                <button id="modal-close-btn" class="py-2 px-6 bg-[#5D5CDE] hover:bg-[#4a49c8] text-white font-medium rounded-lg transition-all duration-300">
                    Закрыть
                </button>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-white/80 dark:bg-background-dark/80 backdrop-blur-md z-50 transition-all duration-300 shadow-sm navbar-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3 md:py-4">
                <div class="flex items-center">
                    <a href="index.php" class="text-3xl font-bold logo-text animate-pulse-slow">Экологика</a>
                </div>
                <div class="hidden md:flex items-center space-x-1 lg:space-x-8 nav-items">
                    <a href="choice.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Режимы игры</a>
                    <a href="profile.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Мой профиль</a>
                    <a href="achievements.php" class="menu-button px-3 py-2 text-[#5D5CDE] dark:text-[#5D5CDE] font-medium transition-all duration-300 nav-item">Достижения</a>
                    <a href="rating.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Рейтинг</a>
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
    <main class="pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <header class="mb-8 text-center">
                <h1 class="text-4xl font-bold mb-3 animate-fade-in" data-aos="fade-down">Достижения</h1>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                    Откройте все достижения и получите незабываемый опыт в игре Экологика
                </p>
            </header>
            
            <!-- User Achievement Stats -->
            <div class="mb-12" data-aos="fade-up" data-aos-delay="300">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                        <!-- Progress Circle -->
                        <div class="flex flex-col items-center justify-center">
                            <div class="progress-circle mb-4">
                                <svg width="120" height="120" viewBox="0 0 120 120">
                                    <circle class="progress-circle-bg" cx="60" cy="60" r="54" />
                                    <circle class="progress-circle-value" cx="60" cy="60" r="54" stroke-dasharray="<?php echo 339.292 * $achievementStats['completion_percentage'] / 100; ?> 339.292" />
                                </svg>
                                <div class="progress-circle-text">
                                    <div class="text-3xl font-bold text-[#5D5CDE]"><?php echo $achievementStats['completion_percentage']; ?>%</div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">выполнено</div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="font-medium"><?php echo $achievementStats['earned_achievements']; ?> из <?php echo $achievementStats['total_achievements']; ?> получено</p>
                            </div>
                        </div>
                        
                        <!-- Categories -->
                        <div class="flex flex-col justify-center lg:col-span-2">
                            <h3 class="text-lg font-semibold mb-4">Категории достижений</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                <?php 
                                // Отображаем первые 6 категорий (или меньше, если их меньше)
                                $displayedCategories = 0;
                                foreach($categories as $category):
                                    if ($displayedCategories >= 6) break;
                                    $categoryDetail = getCategoryDetails($category['category'], $categoryIcons, $categoryColors);
                                    $displayedCategories++;
                                ?>
                                <a href="?category=<?php echo $category['category']; ?>" class="px-3 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-300 text-sm">
                                    <div class="flex items-center">
                                        <div class="w-6 h-6 rounded-full flex items-center justify-center mr-2 text-<?php echo $categoryDetail['color']; ?>-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $categoryDetail['icon']; ?>" />
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="font-medium"><?php echo $categoryDetail['name']; ?></span>
                                            <div class="text-xs text-gray-500 dark:text-gray-400"><?php echo $category['earned_count']; ?>/<?php echo $category['total_count']; ?></div>
                                        </div>
                                    </div>
                                </a>
                                <?php endforeach; ?>
                                
                                <?php if (count($categories) > 6): ?>
                                <div class="px-3 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-300 text-sm text-center flex items-center justify-center">
                                    <a href="#category-tabs" class="flex items-center">
                                        <span>Еще категории</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!-- Quick Stats -->
                        <div class="flex flex-col justify-center">
                            <h3 class="text-lg font-semibold mb-4">Статистика</h3>
                            <div class="space-y-3">
                                <div>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="text-gray-600 dark:text-gray-300">Всего очков</span>
                                        <span class="font-medium"><?php echo number_format($achievementStats['total_points']); ?></span>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="text-gray-600 dark:text-gray-300">Последнее достижение</span>
                                        <span class="font-medium">
                                            <?php 
                                            if ($achievementStats['last_earned_date']) {
                                                $lastDate = new DateTime($achievementStats['last_earned_date']);
                                                echo $lastDate->format('d.m.Y');
                                            } else {
                                                echo "Нет";
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <a href="rating.php?mode=achievements" class="inline-flex items-center text-[#5D5CDE] hover:underline text-sm">
                                        <span>Рейтинг по достижениям</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Achievements Section -->
            <?php if (!empty($recentAchievements)): ?>
            <div class="mb-12" data-aos="fade-up">
                <h2 class="text-2xl font-bold mb-6">Недавно полученные достижения</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    <?php foreach($recentAchievements as $achievement):
                        $categoryDetail = getCategoryDetails($achievement['category'], $categoryIcons, $categoryColors);
                        $earnedDate = new DateTime($achievement['earned_at']);
                    ?>
                    <div class="achievement-card bg-white dark:bg-gray-800 rounded-lg p-4 shadow-md" data-id="<?php echo $achievement['id']; ?>">
                        <div class="achievement-icon <?php echo $categoryDetail['color']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $categoryDetail['icon']; ?>" />
                            </svg>
                        </div>
                        <h3 class="text-center font-semibold mb-1"><?php echo htmlspecialchars($achievement['name']); ?></h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 text-center mb-2"><?php echo $categoryDetail['name']; ?></p>
                        
                        <div class="flex items-center justify-center text-xs text-gray-500 dark:text-gray-400">
                            <span>Получено: <?php echo $earnedDate->format('d.m.Y'); ?></span>
                        </div>
                        
                   <div class="difficulty-stars">
    <?php
    // Преобразование значения сложности в число
    $difficulty_map = [
        'easy' => 1,
        'medium' => 2,
        'hard' => 3,
    ];
    $difficulty_value = isset($difficulty_map[$achievement['difficulty']]) ? $difficulty_map[$achievement['difficulty']] : 1;
    for($i = 1; $i <= 3; $i++):
    ?>
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="h-3 w-3 difficulty-star <?php echo ($i <= $difficulty_value) ? 'filled' : ''; ?>" 
         fill="currentColor" viewBox="0 0 24 24">
        <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
    </svg>
    <?php endfor; ?>
</div>
                        
                        <div class="achievement-tooltip">
                            <h4 class="font-semibold mb-1"><?php echo htmlspecialchars($achievement['name']); ?></h4>
                            <p class="text-xs text-gray-600 dark:text-gray-300 mb-2"><?php echo htmlspecialchars($achievement['description']); ?></p>
                            <div class="text-xs">
                                <span class="badge badge-purple"><?php echo $achievement['points']; ?> очков</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- Category Tabs and Search -->
            <div class="mb-8" id="category-tabs" data-aos="fade-up">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6 gap-4">
                    <!-- Category Tabs -->
                    <div class="flex items-center space-x-2 overflow-x-auto pb-2 md:pb-0 whitespace-nowrap">
                        <a href="?category=all" class="category-tab tab-link py-2 px-4 text-sm font-medium <?php echo $activeCategory === 'all' ? 'active text-[#5D5CDE]' : 'text-gray-600 dark:text-gray-300'; ?>">
                            Все
                        </a>
                        
                        <?php foreach($categories as $category): 
                            $categoryDetail = getCategoryDetails($category['category'], $categoryIcons, $categoryColors);
                        ?>
                        <a href="?category=<?php echo $category['category']; ?>" class="category-tab tab-link py-2 px-4 text-sm font-medium <?php echo $activeCategory === $category['category'] ? 'active text-[#5D5CDE]' : 'text-gray-600 dark:text-gray-300'; ?>">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-<?php echo $categoryDetail['color']; ?>-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $categoryDetail['icon']; ?>" />
                                </svg>
                                <?php echo $categoryDetail['name']; ?>
                                <span class="ml-1 text-xs text-gray-500 dark:text-gray-400">(<?php echo $category['earned_count']; ?>/<?php echo $category['total_count']; ?>)</span>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Search and View Mode -->
                    <div class="flex items-center space-x-4 w-full md:w-auto">
                        <div class="search-bar w-full md:w-64">
                            <div class="search-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" id="achievement-search" class="search-input" placeholder="Поиск достижений">
                            <div class="search-clear" id="search-clear">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                        
                        <div class="hidden md:flex items-center space-x-2">
                            <button class="view-mode-button active" data-view="grid">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                            </button>
                            <button class="view-mode-button" data-view="list">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Category Description -->
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4 mb-6">
                    <h2 class="text-xl font-bold mb-2">
                        <?php 
                        if ($activeCategory === 'all') {
                            echo 'Все достижения';
                        } else {
                            $categoryDetail = getCategoryDetails($activeCategory, $categoryIcons, $categoryColors);
                            echo $categoryDetail['name'];
                        }
                        ?>
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300">
                        <?php 
                        if ($activeCategory === 'all') {
                            echo 'Полный список всех достижений, доступных в Экологике. Заработайте их все, чтобы получить особые награды!';
                        } else {
                            $descriptions = [
                                'test' => 'Достижения за прохождение тестов и викторин. Проверьте свои знания по экологии и получите награды за правильные ответы!',
                                'lesson' => 'Достижения за изучение уроков и образовательных материалов. Узнавайте больше о природе и экологии!',
                                'eco' => 'Достижения за выполнение экологических заданий и челленджей в реальной жизни.',
                                'discussion' => 'Достижения за участие в экологических дискуссиях и обсуждениях актуальных проблем.',
                                'level' => 'Достижения за прогресс в игре и достижение новых уровней.',
                                'special' => 'Особые достижения за уникальные действия и достижения в игре.',
                                'community' => 'Достижения за активность в сообществе и помощь другим игрокам.',
                                'time' => 'Достижения за игровое время и регулярные посещения приложения.'
                            ];
                            
                            echo isset($descriptions[$activeCategory]) ? $descriptions[$activeCategory] : 'Достижения этой категории помогут вам развить экологическое мышление и стать настоящим защитником природы!';
                        }
                        ?>
                    </p>
                </div>
            </div>
            
            <!-- Achievements Grid View -->
            <div id="grid-view" class="mb-12" data-aos="fade-up" data-aos-delay="100">
                <?php if (empty($achievements)): ?>
                <div class="text-center py-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-xl font-bold mb-2">Нет достижений</h3>
                    <p class="text-gray-600 dark:text-gray-300">В этой категории пока нет доступных достижений</p>
                </div>
                <?php else: ?>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 achievement-container">
                    <?php foreach($achievements as $achievement):
                        $isEarned = $achievement['is_earned'] == 1;
                        $categoryDetail = getCategoryDetails($achievement['category'], $categoryIcons, $categoryColors);
                    ?>
                    <div class="achievement-card bg-white dark:bg-gray-800 rounded-lg p-4 shadow-md <?php echo !$isEarned ? 'locked' : ''; ?>" data-id="<?php echo $achievement['id']; ?>" data-name="<?php echo htmlspecialchars($achievement['name']); ?>" data-category="<?php echo $achievement['category']; ?>" data-points="<?php echo $achievement['points']; ?>">
                        <?php if (!$isEarned): ?>
                        <div class="locked-badge">Закрыто</div>
                        <?php endif; ?>
                        
                        <div class="achievement-icon <?php echo $categoryDetail['color']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $categoryDetail['icon']; ?>" />
                            </svg>
                        </div>
                        <h3 class="text-center font-semibold mb-1"><?php echo htmlspecialchars($achievement['name']); ?></h3>
                        <p class="text-xs text-gray-500 dark:text-gray-400 text-center mb-2"><?php echo $categoryDetail['name']; ?></p>
                        
                        <?php if ($isEarned): ?>
                        <div class="flex items-center justify-center text-xs text-gray-500 dark:text-gray-400">
                            <span>Получено: <?php echo formatDate($achievement['earned_at']); ?></span>
                        </div>
                        <?php else: ?>
                        <div class="flex items-center justify-center text-xs text-gray-500 dark:text-gray-400">
                            <span class="badge badge-purple"><?php echo $achievement['points']; ?> очков</span>
                        </div>
                        <?php endif; ?>
                        
                   <div class="difficulty-stars">
    <?php
    // Преобразование значения сложности в число
    $difficulty_map = [
        'easy' => 1,
        'medium' => 2,
        'hard' => 3,
    ];
    $difficulty_value = isset($difficulty_map[$achievement['difficulty']]) ? $difficulty_map[$achievement['difficulty']] : 1;
    for($i = 1; $i <= 3; $i++):
    ?>
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="h-3 w-3 difficulty-star <?php echo ($i <= $difficulty_value) ? 'filled' : ''; ?>" 
         fill="currentColor" viewBox="0 0 24 24">
        <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
    </svg>
    <?php endfor; ?>
</div>
                        
                        <div class="achievement-tooltip">
                            <h4 class="font-semibold mb-1"><?php echo htmlspecialchars($achievement['name']); ?></h4>
                            <p class="text-xs text-gray-600 dark:text-gray-300 mb-2"><?php echo htmlspecialchars($achievement['description']); ?></p>
                            <div class="text-xs">
                                <span class="badge badge-purple"><?php echo $achievement['points']; ?> очков</span>
                            </div>
                        </div>
                        
                        <?php if (!$isEarned): ?>
                        <div class="achievement-overlay">
                            <div class="text-white text-sm font-medium">Нажмите для подробностей</div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Achievements List View (hidden by default) -->
            <div id="list-view" class="mb-12 hidden">
                <?php if (empty($achievements)): ?>
                <div class="text-center py-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-xl font-bold mb-2">Нет достижений</h3>
                    <p class="text-gray-600 dark:text-gray-300">В этой категории пока нет доступных достижений</p>
                </div>
                <?php else: ?>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left">Название</th>
                                    <th class="px-4 py-3 text-left">Категория</th>
                                    <th class="px-4 py-3 text-left">Описание</th>
                                    <th class="px-4 py-3 text-center">Очки</th>
                                    <th class="px-4 py-3 text-center">Сложность</th>
                                    <th class="px-4 py-3 text-center">Статус</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($achievements as $achievement):
                                    $isEarned = $achievement['is_earned'] == 1;
                                    $categoryDetail = getCategoryDetails($achievement['category'], $categoryIcons, $categoryColors);
                                ?>
                                <tr class="border-t border-gray-200 dark:border-gray-700 achievement-item cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700" data-id="<?php echo $achievement['id']; ?>">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full flex items-center justify-center mr-3 bg-<?php echo $categoryDetail['color']; ?>-100 dark:bg-<?php echo $categoryDetail['color']; ?>-900/30 text-<?php echo $categoryDetail['color']; ?>-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $categoryDetail['icon']; ?>" />
                                                </svg>
                                            </div>
                                            <span class="font-medium"><?php echo htmlspecialchars($achievement['name']); ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm"><?php echo $categoryDetail['name']; ?></td>
                                    <td class="px-4 py-3 text-sm max-w-xs truncate"><?php echo htmlspecialchars($achievement['description']); ?></td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="badge badge-purple"><?php echo $achievement['points']; ?></span>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex justify-center">
                                            <?php for($i = 1; $i <= 3; $i++): ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 difficulty-star <?php echo ($i <= $achievement['difficulty']) ? 'filled' : ''; ?>" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                            <?php endfor; ?>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <?php if ($isEarned): ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Получено
                                        </span>
                                        <?php else: ?>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                            </svg>
                                            Закрыто
                                        </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- No Results Message (Hidden by default) -->
            <div id="no-results" class="hidden text-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <h3 class="text-xl font-bold mb-2">Ничего не найдено</h3>
                <p class="text-gray-600 dark:text-gray-300">Попробуйте изменить поисковый запрос</p>
                <button id="clear-search" class="mt-4 py-2 px-4 bg-[#5D5CDE] hover:bg-[#4a49c8] text-white font-medium rounded-lg transition-all duration-300">
                    Очистить поиск
                </button>
            </div>
            
            <!-- Rare Achievements Section -->
            <?php if (!empty($rareAchievements)): ?>
            <div class="mb-12" data-aos="fade-up">
                <h2 class="text-2xl font-bold mb-6">Редкие достижения</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">Эти достижения получили меньше всего пользователей. Сможете ли вы их разблокировать?</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php foreach($rareAchievements as $achievement):
                        $categoryDetail = getCategoryDetails($achievement['category'], $categoryIcons, $categoryColors);
                        $isEarned = false;
                        foreach($achievements as $userAchievement) {
                            if ($userAchievement['id'] == $achievement['id'] && $userAchievement['is_earned'] == 1) {
                                $isEarned = true;
                                break;
                            }
                        }
                    ?>
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-md achievement-card <?php echo !$isEarned ? 'locked' : ''; ?>" data-id="<?php echo $achievement['id']; ?>">
                        <div class="flex items-center">
                            <div class="achievement-icon <?php echo $categoryDetail['color']; ?> w-12 h-12 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $categoryDetail['icon']; ?>" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-semibold"><?php echo htmlspecialchars($achievement['name']); ?></h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo $categoryDetail['name']; ?></p>
                                <div class="mt-1 flex items-center">
                                    <span class="text-xs text-orange-500 font-medium">Всего получено: <?php echo $achievement['users_count']; ?> пользователей</span>
                                </div>
                                <div class="mt-1">
                                    <span class="badge badge-purple"><?php echo $achievement['points']; ?> очков</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-3"><?php echo htmlspecialchars($achievement['description']); ?></p>
                        <?php if (!$isEarned): ?>
                        <div class="achievement-overlay">
                            <div class="text-white text-sm font-medium">Нажмите для подробностей</div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- Top Users by Achievements Section -->
            <?php if (!empty($topUsers)): ?>
            <div class="mb-12" data-aos="fade-up">
                <h2 class="text-2xl font-bold mb-6">Лидеры по достижениям</h2>
                
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="leaderboard-table">
                            <thead>
                                <tr>
                                    <th class="rank-cell">Место</th>
                                    <th>Участник</th>
                                    <th>Достижения</th>
                                    <th>Очки</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($topUsers as $index => $user): 
                                    $rank = $index + 1;
                                    $isCurrentUser = $user['id'] == $userId;
                                ?>
                                <tr class="<?php echo $isCurrentUser ? 'bg-purple-50 dark:bg-purple-900/10' : ''; ?>">
                                    <td class="rank-cell">
                                        <?php if ($rank <= 3): ?>
                                        <div class="top-rank rank-<?php echo $rank; ?>">
                                            <?php echo $rank; ?>
                                        </div>
                                        <?php else: ?>
                                        <?php echo $rank; ?>
                                        <?php endif; ?>
                                    </td>
                                    
                                    <td>
                                        <div class="flex items-center">
                                            <?php if (!empty($user['profile_photo'])): ?>
                                            <div class="avatar mr-3">
                                                <img src="<?php echo htmlspecialchars($user['profile_photo']); ?>" alt="Avatar" class="w-full h-full object-cover">
                                            </div>
                                            <?php else: ?>
                                            <div class="avatar mr-3">
                                                <span><?php echo substr($user['name'], 0, 1); ?></span>
                                            </div>
                                            <?php endif; ?>
                                            
                                            <div>
                                                <div class="font-medium"><?php echo htmlspecialchars($user['name']); ?></div>
                                                <?php if ($isCurrentUser): ?>
                                                <span class="text-xs text-[#5D5CDE]">(вы)</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <span class="badge badge-purple"><?php echo $user['achievements_count']; ?> получено</span>
                                    </td>
                                    
                                    <td>
                                        <span class="font-medium"><?php echo number_format($user['total_points']); ?></span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="text-center mt-6">
                    <a href="rating.php?mode=achievements" class="inline-flex items-center py-2 px-4 bg-[#5D5CDE] hover:bg-[#4a49c8] text-white font-medium rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Полный рейтинг
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 dark:bg-gray-800 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <div class="text-2xl font-bold logo-text animate-pulse-slow">Экологика</div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">© 2025 Экологика. Все права защищены.</p>
                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">Студенческий проект</p>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 sm:gap-x-12 mb-6 md:mb-0">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">Навигация</h3>
                        <ul class="space-y-1 text-sm">
                            <li><a href="index.php#about" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary-light transition-colors duration-300">О игре</a></li>
                            <li><a href="index.php#features" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary-light transition-colors duration-300">Особенности</a></li>
                            <li><a href="index.php#modes" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary-light transition-colors duration-300">Режимы игры</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">Информация</h3>
                        <ul class="space-y-1 text-sm">
                            <li><a href="index.php#faq" class="text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-primary-light transition-colors duration-300">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">Связаться с нами</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Есть вопросы или предложения?</p>
                        <a href="mailto:ecologica.sup@gmail.com" class="text-primary dark:text-primary-light text-sm hover:underline transition-all duration-300">ecologica.sup@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize theme first
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
            if (window.updateThreeBackground) {
                window.updateThreeBackground();
            }
        }
    });
}

// Call initTheme immediately
initTheme();

// Loading animation
const loadingProgress = document.getElementById('loading-progress');
const loadingScreen = document.getElementById('loading-screen');
const loadingItems = document.querySelectorAll('.loading-item');

let progress = 0;
const interval = setInterval(() => {
    progress += Math.random() * 10;
    if (progress >= 100) {
        progress = 100;
        clearInterval(interval);
        
        setTimeout(() => {
            loadingScreen.classList.add('loaded');
        }, 500);
    }
    loadingProgress.style.width = `${progress}%`;
}, 100);

// Animate loading items
let delay = 100;
loadingItems.forEach(item => {
    setTimeout(() => {
        item.style.opacity = 1;
        item.style.transform = 'translateY(0)';
    }, delay);
    delay += 150;
});

// Initialize AOS animations
AOS.init({
    duration: 800,
    once: false,
    mirror: true
});

// Theme toggle
const themeToggle = document.getElementById('theme-toggle');
const mobileThemeToggle = document.getElementById('mobile-theme-toggle');

function toggleTheme() {
    document.documentElement.classList.toggle('dark');
    
    // Update Three.js background
    if (window.updateThreeBackground) {
        window.updateThreeBackground();
    }
    
    // Save theme preference to localStorage
    const theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
    localStorage.setItem('theme', theme);
}

themeToggle.addEventListener('click', toggleTheme);
mobileThemeToggle.addEventListener('click', toggleTheme);

// Mobile menu
const mobileMenuButton = document.getElementById('mobile-menu-button');
const closeMenuButton = document.getElementById('close-menu');
const mobileMenu = document.getElementById('mobile-menu');

mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.add('active');
});

closeMenuButton.addEventListener('click', () => {
    mobileMenu.classList.remove('active');
});

// Initialize Three.js background
initializeThreeBackground();
            
            // View Mode Switch
            const gridView = document.getElementById('grid-view');
            const listView = document.getElementById('list-view');
            const viewModeButtons = document.querySelectorAll('.view-mode-button');
            
            viewModeButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const viewMode = button.getAttribute('data-view');
                    
                    // Remove active class from all buttons
                    viewModeButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add active class to clicked button
                    button.classList.add('active');
                    
                    // Show the corresponding view
                    if (viewMode === 'grid') {
                        gridView.classList.remove('hidden');
                        listView.classList.add('hidden');
                    } else {
                        gridView.classList.add('hidden');
                        listView.classList.remove('hidden');
                    }
                });
            });
            
            // Search Functionality
            const searchInput = document.getElementById('achievement-search');
            const searchClear = document.getElementById('search-clear');
            const clearSearchButton = document.getElementById('clear-search');
            const noResults = document.getElementById('no-results');
            const achievementCards = document.querySelectorAll('.achievement-card');
            const achievementItems = document.querySelectorAll('.achievement-item');
            
            searchInput.addEventListener('input', filterAchievements);
            searchClear.addEventListener('click', clearSearch);
            clearSearchButton.addEventListener('click', clearSearch);
            
            function filterAchievements() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                
                if (searchTerm.length > 0) {
                    searchClear.classList.add('active');
                } else {
                    searchClear.classList.remove('active');
                }
                
                let visibleCount = 0;
                
                // Filter cards (grid view)
                achievementCards.forEach(card => {
                    const name = card.getAttribute('data-name')?.toLowerCase() || '';
                    const category = card.getAttribute('data-category')?.toLowerCase() || '';
                    
                    if (name.includes(searchTerm) || category.includes(searchTerm)) {
                        card.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        card.classList.add('hidden');
                    }
                });
                
                // Filter items (list view)
                achievementItems.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    
                    if (text.includes(searchTerm)) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
                
                // Show/hide no results message
                if (visibleCount === 0) {
                    gridView.classList.add('hidden');
                    listView.classList.add('hidden');
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                    
                    // Show the current active view
                    if (document.querySelector('.view-mode-button[data-view="grid"]').classList.contains('active')) {
                        gridView.classList.remove('hidden');
                    } else {
                        listView.classList.remove('hidden');
                    }
                }
            }
            
            function clearSearch() {
                searchInput.value = '';
                searchClear.classList.remove('active');
                
                // Show all achievements
                achievementCards.forEach(card => {
                    card.classList.remove('hidden');
                });
                
                achievementItems.forEach(item => {
                    item.classList.remove('hidden');
                });
                
                // Hide no results message
                noResults.classList.add('hidden');
                
                // Show the current active view
                if (document.querySelector('.view-mode-button[data-view="grid"]').classList.contains('active')) {
                    gridView.classList.remove('hidden');
                } else {
                    listView.classList.remove('hidden');
                }
            }
            
            // Achievement Detail Modal
            const modal = document.getElementById('achievement-modal');
            const closeModal = document.getElementById('close-modal');
            const closeModalBtn = document.getElementById('modal-close-btn');
            const modalTitle = document.getElementById('modal-title');
            const modalDescription = document.getElementById('modal-description');
            const modalCategory = document.getElementById('modal-category');
            const modalDifficulty = document.getElementById('modal-difficulty');
            const modalPoints = document.getElementById('modal-points');
            const modalStatus = document.getElementById('modal-status');
            const modalIcon = document.getElementById('modal-icon');
            const modalEarnedDate = document.getElementById('modal-earned-date');
            const modalEarnedDateContainer = document.getElementById('modal-earned-date-container');
            
            // Add click event to all achievement cards and items
            document.querySelectorAll('.achievement-card, .achievement-item').forEach(item => {
                item.addEventListener('click', () => {
                    const id = item.getAttribute('data-id');
                    const achievement = findAchievementById(id);
                    
                    if (achievement) {
                        showAchievementModal(achievement);
                    }
                });
            });
            
            function findAchievementById(id) {
                // In a real application, you might fetch this from the server
                // For now, we'll use a client-side method based on existing DOM elements
                return Array.from(document.querySelectorAll('.achievement-card')).find(card => card.getAttribute('data-id') === id);
            }
            
            function showAchievementModal(achievementCard) {
                // Get achievement data from attributes or children
                const title = achievementCard.querySelector('h3')?.textContent || 'Название достижения';
                const description = achievementCard.querySelector('.achievement-tooltip p')?.textContent || 'Описание достижения';
                const category = achievementCard.querySelector('p:nth-child(3)')?.textContent || achievementCard.getAttribute('data-category') || 'Категория';
                const points = achievementCard.getAttribute('data-points') || '0';
                const isLocked = achievementCard.classList.contains('locked');
                const iconType = achievementCard.querySelector('.achievement-icon')?.classList[1] || 'green';
                const iconPath = achievementCard.querySelector('.achievement-icon svg path')?.getAttribute('d') || '';
                
                // Count filled stars for difficulty
                const difficultyStars = achievementCard.querySelectorAll('.difficulty-star.filled').length || 1;
                
                // Update modal content
                modalTitle.textContent = title;
                modalDescription.textContent = description;
                modalCategory.textContent = category;
                modalPoints.textContent = `${points} очков`;
                
                // Update modal status
                if (isLocked) {
                    modalStatus.textContent = 'Не получено';
                    modalStatus.classList.remove('text-green-500');
                    modalStatus.classList.add('text-gray-500');
                    modalEarnedDateContainer.classList.add('hidden');
                } else {
                    modalStatus.textContent = 'Получено';
                    modalStatus.classList.remove('text-gray-500');
                    modalStatus.classList.add('text-green-500');
                    modalEarnedDateContainer.classList.remove('hidden');
                    
                    // Try to get earned date if available
                    const earnedDateText = achievementCard.querySelector('.text-xs.text-gray-500 span')?.textContent || '';
                    modalEarnedDate.textContent = earnedDateText.replace('Получено: ', '') || 'Дата неизвестна';
                }
                
                // Update difficulty stars
                modalDifficulty.innerHTML = '';
                for (let i = 1; i <= 3; i++) {
                    const starClass = i <= difficultyStars ? 'difficulty-star filled' : 'difficulty-star';
                    modalDifficulty.innerHTML += `
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ${starClass}" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    `;
                }
                
                // Update icon
                modalIcon.className = `achievement-icon ${iconType} w-20 h-20`;
                modalIcon.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${iconPath}" />
                    </svg>
                `;
                
                // Show modal
                modal.classList.add('active');
            }
            
            // Close modal events
            closeModal.addEventListener('click', () => {
                modal.classList.remove('active');
            });
            
            closeModalBtn.addEventListener('click', () => {
                modal.classList.remove('active');
            });
            
            // Close modal when clicking outside content
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
        });
        
        // Three.js Background
        let scene, camera, renderer, particles, isDark;
        const particleCount = 800;
        let clock = new THREE.Clock();

        function initializeThreeBackground() {
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
                
                // Size - varied sizes for more natural look
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
        
        // Make updateThreeBackground globally accessible
        window.updateThreeBackground = updateThreeBackground;

        function animate() {
            requestAnimationFrame(animate);
            
            // Complex particle animation
            const delta = clock.getDelta();
            if (particles) {
                particles.rotation.x += delta * 0.02;
                particles.rotation.y += delta * 0.03;
                
                // Wave motion
                const time = Date.now() * 0.001;
                const positions = particles.geometry.attributes.position.array;
                
                for (let i = 0; i < positions.length; i += 3) {
                    // Add small sinusoidal movement
                    positions[i + 1] += Math.sin(time + positions[i] * 0.01) * 0.02;
                }
                
                particles.geometry.attributes.position.needsUpdate = true;
            }
            
            renderer.render(scene, camera);
        }
    </script>
</body>
</html>