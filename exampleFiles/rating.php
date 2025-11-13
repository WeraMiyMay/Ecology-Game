<!DOCTYPE html>
<html lang="ru" class="<?php echo isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark' ? 'dark' : 'light'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рейтинг участников - Экологика</title>
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
#mobile-menu {
    z-index: 60 !important;
}
.mobile-menu {
    transform: translateX(100%);
    transition: transform 0.3s ease;
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
        
        /* Mode tab navigation */
        .mode-tab {
            position: relative;
            transition: all 0.3s ease;
            overflow: hidden;
            flex-shrink: 0; /* Prevent tabs from shrinking on mobile */
        }
        
        .mode-tab::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background-color: #5D5CDE;
            transition: width 0.3s ease;
        }
        
        .mode-tab.active::after,
        .mode-tab:hover::after {
            width: 100%;
        }
        
        .tab-indicator {
            position: absolute;
            bottom: 0;
            height: 3px;
            background-color: #5D5CDE;
            transition: all 0.3s ease;
        }
        
        /* Mobile tabs container improvements */
        .tabs-container {
            display: flex;
            gap: 0.5rem;
            overflow-x: auto;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none;  /* Internet Explorer 10+ */
            padding-bottom: 8px;
            padding-left: 4px;
            padding-right: 4px;
        }
        
        .tabs-container::-webkit-scrollbar { /* WebKit */
            display: none;
        }
        
        /* Mobile responsive tabs */
        @media (max-width: 768px) {
            .mode-tab {
                min-width: max-content;
                padding: 0.5rem 0.75rem;
                font-size: 0.875rem;
                white-space: nowrap;
            }
            
            .tabs-container {
                justify-content: flex-start;
            }
        }
        
        /* Hamburger menu button fix */
        #mobile-menu-button {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        @media (min-width: 768px) {
            #mobile-menu-button {
                display: none !important;
            }
        }
        
        /* Leaderboard table */
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
        
        /* Mobile table improvements */
        @media (max-width: 768px) {
            .leaderboard-table th,
            .leaderboard-table td {
                padding: 0.5rem 0.25rem;
                font-size: 0.875rem;
            }
            
            .leaderboard-table {
                min-width: 100%;
            }
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
        
        .badge-green {
            background-color: rgba(34, 197, 94, 0.1);
            color: #22c55e;
        }
        
        .dark .badge-green {
            background-color: rgba(34, 197, 94, 0.2);
        }
        
        .badge-blue {
            background-color: rgba(14, 165, 233, 0.1);
            color: #0ea5e9;
        }
        
        .dark .badge-blue {
            background-color: rgba(14, 165, 233, 0.2);
        }
        
        .badge-purple {
            background-color: rgba(93, 92, 222, 0.1);
            color: #5D5CDE;
        }
        
        .dark .badge-purple {
            background-color: rgba(93, 92, 222, 0.2);
        }
        
        .badge-orange {
            background-color: rgba(249, 115, 22, 0.1);
            color: #f97316;
        }
        
        .dark .badge-orange {
            background-color: rgba(249, 115, 22, 0.2);
        }
        
        .badge-yellow {
            background-color: rgba(234, 179, 8, 0.1);
            color: #eab308;
        }
        
        .dark .badge-yellow {
            background-color: rgba(234, 179, 8, 0.2);
        }
        
        /* Level indicator */
        .level-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: linear-gradient(135deg, #5D5CDE, #0ea5e9);
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
            margin-right: 0.5rem;
        }
        
        /* Progress bars */
        .progress-bar {
            height: 6px;
            background-color: #e2e8f0;
            border-radius: 3px;
            overflow: hidden;
        }
        
        .dark .progress-bar {
            background-color: #334155;
        }
        
        .progress-bar-fill {
            height: 100%;
            transition: width 0.5s ease;
        }
        
        .progress-bar-fill.green {
            background: linear-gradient(to right, #4ade80, #22c55e);
        }
        
        .progress-bar-fill.blue {
            background: linear-gradient(to right, #7dd3fc, #0ea5e9);
        }
        
        .progress-bar-fill.yellow {
            background: linear-gradient(to right, #fde047, #eab308);
        }
        
        .progress-bar-fill.purple {
            background: linear-gradient(to right, #c084fc, #8b5cf6);
        }
        
        /* Stars */
        .stars-container {
            display: flex;
            align-items: center;
        }
        
        .star {
            color: #e2e8f0;
            transition: all 0.3s ease;
            margin-right: 3px;
        }
        
        .dark .star {
            color: #334155;
        }
        
        .star.filled {
            color: #fbbf24;
            filter: drop-shadow(0 0 2px rgba(251, 191, 36, 0.5));
        }
        
        /* Achievements */
        .achievement {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            border-radius: 0.5rem;
            background-color: rgba(148, 163, 184, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 0.75rem;
        }
        
        .achievement:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .dark .achievement:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -1px rgba(0, 0, 0, 0.1);
        }
        
        .achievement-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }
        
        .achievement-icon.green {
            background: linear-gradient(135deg, #4ade80, #22c55e);
            color: white;
        }
        
        .achievement-icon.blue {
            background: linear-gradient(135deg, #7dd3fc, #0ea5e9);
            color: white;
        }
        
        .achievement-icon.purple {
            background: linear-gradient(135deg, #c084fc, #8b5cf6);
            color: white;
        }
        
        .achievement-icon.yellow {
            background: linear-gradient(135deg, #fde047, #eab308);
            color: white;
        }
        
        .achievement-icon.orange {
            background: linear-gradient(135deg, #fdba74, #f97316);
            color: white;
        }
        
        /* User rank card */
        .user-rank-card {
            transition: all 0.3s ease;
            transform-origin: center;
        }
        
        .user-rank-card:hover {
            transform: translateY(-5px);
        }
        
        /* Filter styles */
         /* Filter dropdown container - add relative positioning and explicit z-index */
    .filter-dropdown {
        position: relative;
        z-index: 9999; /* Extremely high z-index to overcome any other elements */
    }
    
    /* Improve dropdown menu positioning and visibility */
    .filter-menu {
        position: absolute;
        top: calc(100% + 5px);
        right: 0;
        width: 200px;
        background-color: white;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        padding: 0.5rem;
        z-index: 9999; /* Match parent's high z-index */
        transform-origin: top right;
        transform: scale(0.95);
        opacity: 0;
        visibility: hidden;
        transition: all 0.2s ease;
    }
    
    .dark .filter-menu {
        background-color: #1e293b;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -1px rgba(0, 0, 0, 0.1);
    }
    
    /* Ensure the table doesn't create a stacking context that overrides our dropdowns */
    .leaderboard-table {
        position: relative;
        z-index: 1; /* Lower z-index than the dropdowns */
    }
    
    /* Make sure the dropdown container's parent also has proper stacking */
    #mode-tabs-container {
        position: relative;
        z-index: 9990; /* High z-index but slightly lower than the actual dropdowns */
    }
    
    /* Active state - ensure these rules maintain high z-index */
    .filter-dropdown.active .filter-menu {
        transform: scale(1);
        opacity: 1;
        visibility: visible;
        z-index: 9999; /* Explicitly set high z-index in active state too */
    }
    
    /* Leaderboard container should have lower z-index */
    #leaderboard-container {
        position: relative;
        z-index: 1;
    }
        .filter-option {
            padding: 0.5rem;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .filter-option:hover {
            background-color: rgba(148, 163, 184, 0.1);
        }
        
        .dark .filter-option:hover {
            background-color: rgba(51, 65, 85, 0.5);
        }
        
        .filter-option.active {
            background-color: rgba(93, 92, 222, 0.1);
            color: #5D5CDE;
            font-weight: 600;
        }
        
        .dark .filter-option.active {
            background-color: rgba(93, 92, 222, 0.2);
        }
        
        /* Your Rank indicator */
  .you-indicator {
    position: absolute;
    top: 50%;
    right: -60px;
    transform: translateY(-50%);
    padding: 2px 8px;
    background-color: rgba(93, 92, 222, 0.8); /* Полупрозрачный фон (#5D5CDE с 80% видимости) */
    color: rgba(255, 255, 255, 0.9); /* Белый текст с небольшой прозрачностью */
    font-size: 0.6rem;
    font-weight: 700;
    text-transform: uppercase;
    border-radius: 9999px;
    letter-spacing: 0.05em;
    opacity: 0.9; /* Дополнительная общая прозрачность */
    z-index: 1; /* Убедиться, что элемент выше других */
}
        
        .you-indicator::after {
            content: '';
            position: absolute;
            right: 100%;
            top: 50%;
            transform: translateY(-50%);
            border-width: 4px;
            border-style: solid;
            border-color: transparent #5D5CDE transparent transparent;
        }
        
        /* Highlight current user's row */
        tr.current-user {
            background-color: rgba(93, 92, 222, 0.05);
            position: relative;
        }
        
        .dark tr.current-user {
            background-color: rgba(93, 92, 222, 0.1);
        }
        
        tr.current-user td {
            border-bottom: 1px solid rgba(93, 92, 222, 0.3);
        }
        
        tr.current-user:hover {
            background-color: rgba(93, 92, 222, 0.1);
        }
        
        .dark tr.current-user:hover {
            background-color: rgba(93, 92, 222, 0.15);
        }

        /* Added transition for content loading */
        #rating-content {
            transition: opacity 0.3s ease;
        }
        
        #rating-content.loading {
            opacity: 0.6;
        }
        
        /* Loading indicator for AJAX requests */
        .ajax-loader {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }
        
        .ajax-loader.active {
            display: flex;
        }
        /* Основной контейнер модального окна */
.achievement-modal {
    display: none;
    position: fixed;
    z-index: 10000;
    bottom: 20px;
    right: 20px;
    width: auto;
    height: auto;
    justify-content: center;
    align-items: center;
    pointer-events: none; /* Не блокирует клики на странице */
}

/* Контент модального окна */
.achievement-modal-content {
    background: linear-gradient(135deg,rgb(86, 242, 130),rgb(173, 235, 239));
    border-radius: 15px;
    max-width: 340px;
    width: 340px;
    padding: 24px;
    text-align: center;
    position: relative;
    box-shadow: 0 6px 32px rgba(0, 0, 0, 0.3);
    animation: slide-in 0.4s cubic-bezier(0.42, 1.7, 0.57, 0.93) 1;
    pointer-events: auto; /* Позволяет взаимодействовать с модалкой */
    color: #fff;
}

/* Анимация появления окна */
@keyframes slide-in {
    0% {
        transform: translateY(100%);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Кнопка закрытия */
.achievement-modal-close {
    position: absolute;
    top: 12px;
    right: 12px;
    font-size: 24px;
    color: #fff;
    cursor: pointer;
    font-weight: bold;
    transition: color 0.3s;
}
.achievement-modal-close:hover {
    color: #d1d1d1;
}

/* Иконка */
.achievement-modal-icon {
    margin-bottom: 16px;
    font-size: 56px;
    color:rgb(214, 246, 241);
    text-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
}

/* Заголовок */
.achievement-modal-content h2 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Описание */
.achievement-modal-content p {
    font-size: 16px;
    margin-bottom: 16px;
    line-height: 1.4;
}

/* Очки */
.achievement-modal-points {
    font-weight: bold;
    font-size: 18px;
    color:rgb(3, 179, 102);
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Добавляем плавные переходы */
.achievement-modal-content,
.achievement-modal-close,
.achievement-modal-points {
    transition: all 0.3s ease;
}

/* Hover эффекты */
.achievement-modal-content:hover {
    box-shadow: 0 8px 36px rgba(0, 0, 0, 0.4);
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
        </div>
        <h2 class="text-2xl font-bold mb-2 loading-item" id="loading-title">Загрузка</h2>
        <p class="text-sm loading-item" id="loading-text">Подготовка рейтинга участников...</p>
        <div class="mt-4 w-64 h-2 bg-gray-200 dark:bg-gray-700 rounded-full loading-item" id="loading-progress-container">
            <div id="loading-progress" class="h-full bg-gradient-to-r from-primary to-secondary rounded-full w-0"></div>
        </div>
    </div>

    <!-- AJAX Loading Indicator -->
    <div class="ajax-loader" id="ajax-loader">
        <div class="w-16 h-16 border-4 border-t-primary border-gray-200 rounded-full animate-spin"></div>
    </div>

    <!-- 3D Background Container -->
    <div id="canvas-container"></div>

    <!-- Mobile Menu -->
   <div id="mobile-menu" class="fixed top-0 right-0 h-full w-4/5 max-w-xs bg-white dark:bg-gray-800 z-[60] shadow-2xl mobile-menu flex flex-col">
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
            <a href="achievements.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item">Достижения</a>
            <a href="rating.php" class="py-2 px-4 bg-gray-100 dark:bg-gray-700 rounded font-medium transition-all duration-300 mobile-menu-item">Рейтинг</a>
            <a href="logout.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item text-red-500">Выйти</a>
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
                    <a href="achievements.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Достижения</a>
                    <a href="rating.php" class="menu-button px-3 py-2 text-[#5D5CDE] dark:text-[#5D5CDE] font-medium transition-all duration-300 nav-item">Рейтинг</a>
                    <button id="theme-toggle" class="p-2 rounded-full bg-gray-200 dark:bg-gray-700 transition-all duration-300 hover:rotate-12 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-100 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </button>
                </div>
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-300 text-gray-800 dark:text-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="rating-content">
            <!-- Page Header -->
            <header class="mb-8 text-center">
                <h1 class="text-4xl font-bold mb-3 animate-fade-in" data-aos="fade-down"><?php echo htmlspecialchars($pageHeader['title']); ?></h1>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200"><?php echo htmlspecialchars($pageHeader['description']); ?></p>
            </header>
            
            <!-- User Rank Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-8" data-aos="fade-up" data-aos-delay="300" id="user-rank-cards">
                <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md user-rank-card">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-lg bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#5D5CDE]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-gray-500 dark:text-gray-400">Общий рейтинг</h3>
                            <div class="flex items-center mt-1">
                                <span class="text-xl font-bold"><?php echo $userRanks['xp']; ?></span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 ml-1">место</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md user-rank-card">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-lg bg-green-100 dark:bg-green-900/30 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-gray-500 dark:text-gray-400">Рейтинг по тестам</h3>
                            <div class="flex items-center mt-1">
                                <span class="text-xl font-bold"><?php echo $userRanks['tests']; ?></span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 ml-1">место</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md user-rank-card">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-gray-500 dark:text-gray-400">Рейтинг по урокам</h3>
                            <div class="flex items-center mt-1">
                                <span class="text-xl font-bold"><?php echo $userRanks['lessons']; ?></span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 ml-1">место</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md user-rank-card">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-lg bg-yellow-100 dark:bg-yellow-900/30 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-gray-500 dark:text-gray-400">Рейтинг по дискуссиям</h3>
                            <div class="flex items-center mt-1">
                                <span class="text-xl font-bold"><?php echo $userRanks['discussions']; ?></span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 ml-1">место</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md user-rank-card">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-lg bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xs font-medium text-gray-500 dark:text-gray-400">Рейтинг по достижениям</h3>
                            <div class="flex items-center mt-1">
                                <span class="text-xl font-bold"><?php echo $userRanks['achievements']; ?></span>
                                <span class="text-sm text-gray-500 dark:text-gray-400 ml-1">место</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Mode Tabs and Filters Header -->
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6 gap-4" data-aos="fade-up" id="mode-tabs-container">
                <!-- Mode Tabs -->
                <div class="tabs-container w-full md:w-auto">
                    <a href="javascript:void(0)" data-mode="overall" class="mode-tab tab-link py-2 px-4 text-sm font-medium <?php echo $activeMode === 'overall' ? 'active text-[#5D5CDE]' : 'text-gray-600 dark:text-gray-300'; ?>">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Общий рейтинг
                        </div>
                    </a>
                    
                    <a href="javascript:void(0)" data-mode="tests" class="mode-tab tab-link py-2 px-4 text-sm font-medium <?php echo $activeMode === 'tests' ? 'active text-[#5D5CDE]' : 'text-gray-600 dark:text-gray-300'; ?>">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Тесты
                        </div>
                    </a>
                    
                    <a href="javascript:void(0)" data-mode="lessons" class="mode-tab tab-link py-2 px-4 text-sm font-medium <?php echo $activeMode === 'lessons' ? 'active text-[#5D5CDE]' : 'text-gray-600 dark:text-gray-300'; ?>">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            Уроки
                        </div>
                    </a>
                    
                    <a href="javascript:void(0)" data-mode="discussions" class="mode-tab tab-link py-2 px-4 text-sm font-medium <?php echo $activeMode === 'discussions' ? 'active text-[#5D5CDE]' : 'text-gray-600 dark:text-gray-300'; ?>">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>
                            Дискуссии
                        </div>
                    </a>
                    
                    <a href="javascript:void(0)" data-mode="achievements" class="mode-tab tab-link py-2 px-4 text-sm font-medium <?php echo $activeMode === 'achievements' ? 'active text-[#5D5CDE]' : 'text-gray-600 dark:text-gray-300'; ?>">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            Достижения
                        </div>
                    </a>
                </div>
                
                <!-- Filters -->
                <div class="flex items-center space-x-3">
                    <!-- User Type Filter -->
                    <div class="filter-dropdown" id="user-type-filter">
                        <button class="flex items-center py-2 px-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm text-sm font-medium">
                            <span class="mr-2" id="user-type-display">
                                <?php 
                                    switch($userTypeFilter) {
                                        case 'child':
                                            echo 'Дети';
                                            break;
                                        case 'teen':
                                            echo 'Подростки';
                                            break;
                                        case 'adult':
                                            echo 'Взрослые';
                                            break;
                                        default:
                                            echo 'Все участники';
                                            break;
                                    }
                                ?>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        
                        <div class="filter-menu">
                            <a href="javascript:void(0)" data-user-type="all" class="filter-option filter-user-type <?php echo $userTypeFilter === 'all' ? 'active' : ''; ?>">
                                <span>Все участники</span>
                                <?php if ($userTypeFilter === 'all'): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <?php endif; ?>
                            </a>
                            <a href="javascript:void(0)" data-user-type="child" class="filter-option filter-user-type <?php echo $userTypeFilter === 'child' ? 'active' : ''; ?>">
                                <span>Дети</span>
                                <?php if ($userTypeFilter === 'child'): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <?php endif; ?>
                            </a>
                            <a href="javascript:void(0)" data-user-type="teen" class="filter-option filter-user-type <?php echo $userTypeFilter === 'teen' ? 'active' : ''; ?>">
                                <span>Подростки</span>
                                <?php if ($userTypeFilter === 'teen'): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <?php endif; ?>
                            </a>
                            <a href="javascript:void(0)" data-user-type="adult" class="filter-option filter-user-type <?php echo $userTypeFilter === 'adult' ? 'active' : ''; ?>">
                                <span>Взрослые</span>
                                <?php if ($userTypeFilter === 'adult'): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Limit Filter -->
                    <div class="filter-dropdown" id="limit-filter">
                        <button class="flex items-center py-2 px-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm text-sm font-medium">
                            <span class="mr-2" id="limit-display">Показать <?php echo $limit; ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        
                        <div class="filter-menu">
                            <?php foreach([10, 20, 30, 50] as $limitOption): ?>
                            <a href="javascript:void(0)" data-limit="<?php echo $limitOption; ?>" class="filter-option filter-limit <?php echo $limit === $limitOption ? 'active' : ''; ?>">
                                <span>Показать <?php echo $limitOption; ?></span>
                                <?php if ($limit === $limitOption): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <?php endif; ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Leaderboard Table Section -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden" data-aos="fade-up" data-aos-delay="400" id="leaderboard-container">
                <div class="overflow-x-auto">
                    <table class="leaderboard-table" id="leaderboard-table">
                        <thead>
                            <tr>
                                <th class="rank-cell">Место</th>
                                <th>Участник</th>
                                
                                <?php if ($activeMode === 'overall'): ?>
                                <th>Уровень</th>
                                <th>Опыт</th>
                                <th>Эко-очки</th>
                                
                                <?php elseif ($activeMode === 'tests'): ?>
                                <th>Тесты</th>
                                <th>Звезды</th>
                                <th>Баллы</th>
                                
                                <?php elseif ($activeMode === 'lessons'): ?>
                                <th>Уроки</th>
                                <th>Прогресс</th>
                                
                                <?php elseif ($activeMode === 'discussions'): ?>
                                <th>Дискуссии</th>
                                <th>Последнее участие</th>
                                
                                <?php elseif ($activeMode === 'achievements'): ?>
                                <th>Достижения</th>
                                <th>Очки</th>
                                <th>Достижения</th>
                                
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($topUsers)): ?>
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-500 dark:text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto mb-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    <p>Данные не найдены</p>
                                </td>
                            </tr>
                            <?php else: ?>
                            
                            <?php foreach($topUsers as $index => $user): 
                                $rank = $index + 1;
                                $isCurrentUser = $user['id'] == $userId;
                            ?>
                            <tr class="<?php echo $isCurrentUser ? 'current-user' : ''; ?>">
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
                                        
                                        <div class="relative">
                                            <div class="font-medium"><?php echo htmlspecialchars($user['name']); ?></div>
                                            <?php if ($isCurrentUser): ?>
                                            <div class="you-indicator">вы</div> 
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                
                                <?php if ($activeMode === 'overall'): ?>
                                <td>
                                    <div class="flex items-center">
                                        <div class="level-indicator"><?php echo $user['level']; ?></div>
                                        <span class="text-sm">уровень</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="font-medium"><?php echo number_format($user['xp']); ?> XP</span>
                                </td>
                                <td>
                                    <span class="badge badge-green"><?php echo number_format($user['eco_points']); ?></span>
                                </td>
                                
                                <?php elseif ($activeMode === 'tests'): ?>
                                <td>
                                    <span class="badge badge-blue"><?php echo $user['tests_completed']; ?> пройдено</span>
                                </td>
                                <td>
                                    <div class="stars-container">
                                        <span class="font-medium mr-2"><?php echo $user['total_stars']; ?></span>
                                        <div class="flex">
                                            <?php for ($i = 0; $i < 3; $i++): ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 star <?php echo ($i < round($user['total_stars'] / $user['tests_completed']) ? 'filled' : ''); ?>" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                            </svg>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="font-medium"><?php echo number_format($user['total_score']); ?></span>
                                </td>
                                
                                <?php elseif ($activeMode === 'lessons'): ?>
                                <td>
                                    <span class="badge badge-green"><?php echo $user['lessons_completed']; ?> пройдено</span>
                                </td>
                                <td>
                                    <div class="w-32 bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                        <div class="bg-green-500 h-2 rounded-full" style="width: <?php echo min(100, $user['avg_progress']); ?>%"></div>
                                    </div>
                                    <span class="text-xs text-gray-500 dark:text-gray-400 mt-1 block"><?php echo round($user['avg_progress']); ?>% среднее</span>
                                </td>
                                
                                <?php elseif ($activeMode === 'discussions'): ?>
                                <td>
                                    <span class="badge badge-yellow"><?php echo $user['discussions_completed']; ?> пройдено</span>
                                </td>
                                <td>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">
                                        <?php 
                                            $date = new DateTime($user['last_completion']);
                                            echo $date->format('d.m.Y');
                                        ?>
                                    </span>
                                </td>
                                
                                <?php elseif ($activeMode === 'achievements'): ?>
                                <td>
                                    <span class="badge badge-purple"><?php echo $user['achievements_count']; ?> получено</span>
                                </td>
                                <td>
                                    <span class="font-medium"><?php echo number_format($user['achievement_points']); ?></span>
                                </td>
                                <td>
                                    <div class="text-sm text-gray-600 dark:text-gray-300 truncate max-w-xs"><?php echo htmlspecialchars($user['achievement_names']); ?></div>
                                </td>
                                
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- User Achievements Section -->
            <?php if (!empty($userAchievements)): ?>
            <div class="mt-12" id="achievements-section">
                <h2 class="text-2xl font-bold mb-6" data-aos="fade-up">Ваши последние достижения</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" data-aos="fade-up" data-aos-delay="100">
                    <?php 
                    $iconColors = ['green', 'blue', 'purple', 'yellow', 'orange'];
                    $iconPaths = [
                        'test' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                        'lesson' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                        'discuss' => 'M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z',
                        'level' => 'M13 10V3L4 14h7v7l9-11h-7z',
                        'star' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z',
                        'time' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                    ];
                    
                    foreach($userAchievements as $index => $achievement):
                        $iconColor = $iconColors[$index % count($iconColors)];
                        
                        // Determine icon based on category or name
                        $iconPath = '';
                        foreach ($iconPaths as $key => $path) {
                            if (stripos(mb_strtolower($achievement['name'] . ' ' . $achievement['category']), $key) !== false) {
                                $iconPath = $path;
                                break;
                            }
                        }
                        
                        // If icon not found, use default
                        if (empty($iconPath)) {
                            $iconPath = 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z';
                        }
                        
                        $earnedDate = new DateTime($achievement['earned_at']);
                    ?>
                    <div class="achievement bg-white dark:bg-gray-800 shadow-sm">
                        <div class="achievement-icon <?php echo $iconColor; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo $iconPath; ?>" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-medium"><?php echo htmlspecialchars($achievement['name']); ?></h3>
                            <p class="text-sm text-gray-600 dark:text-gray-300"><?php echo htmlspecialchars($achievement['description']); ?></p>
                            <div class="flex items-center mt-2">
                                <span class="text-xs text-gray-500 dark:text-gray-400">Получено: <?php echo $earnedDate->format('d.m.Y'); ?></span>
                                <span class="ml-auto badge badge-<?php echo $iconColor; ?>"><?php echo $achievement['points']; ?> очков</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="text-center mt-6">
                    <a href="achievements.php" class="inline-flex items-center py-2 px-4 bg-[#5D5CDE] hover:bg-[#4a49c8] text-white font-medium rounded-lg transition-all duration-300 shadow-md hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                        </svg>
                        Все достижения
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
            // Loading animation
            const loadingProgress = document.getElementById('loading-progress');
            const loadingScreen = document.getElementById('loading-screen');
            const loadingItems = document.querySelectorAll('.loading-item');
            const ajaxLoader = document.getElementById('ajax-loader');
            
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
                    
                    // Update Three.js background if exists
                    if (window.updateThreeBackground) {
                        window.updateThreeBackground();
                    }
                }
            });
        }
        
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
        
        const themeToggle = document.getElementById('theme-toggle');
        const mobileThemeToggle = document.getElementById('mobile-theme-toggle');
        
        themeToggle.addEventListener('click', toggleTheme);
        mobileThemeToggle.addEventListener('click', toggleTheme);
        
     // Mobile menu
const mobileMenuButton = document.getElementById('mobile-menu-button');
const closeMenuButton = document.getElementById('close-menu');
const mobileMenu = document.getElementById('mobile-menu');

function openMobileMenu() {
    mobileMenu.classList.add('active');
    document.body.style.overflow = 'hidden'; // Prevent scrolling
}

function closeMobileMenu() {
    mobileMenu.classList.remove('active');
    document.body.style.overflow = ''; // Restore scrolling
}

mobileMenuButton.addEventListener('click', openMobileMenu);
closeMenuButton.addEventListener('click', closeMobileMenu);

// Close menu when clicking outside
mobileMenu.addEventListener('click', (e) => {
    if (e.target === mobileMenu) {
        closeMobileMenu();
    }
});

// Close menu on escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
        closeMobileMenu();
    }
});
        
        // Initialize theme
        initTheme();
        
        // Initialize Three.js background if exists
        if (window.initializeThreeBackground) {
            initializeThreeBackground();
        }
            
            // Main variables
            const ratingContent = document.getElementById('rating-content');
            let currentMode = '<?php echo $activeMode; ?>';
            let currentUserType = '<?php echo $userTypeFilter; ?>';
            let currentLimit = <?php echo $limit; ?>;
            
            // AJAX Functions
            function fetchContent(mode, userType, limit) {
                // Show loading indicator
                ajaxLoader.classList.add('active');
                ratingContent.classList.add('loading');
                
                // Construct URL
                const url = `rating.php?mode=${mode}&user_type=${userType}&limit=${limit}&ajax=1`;
                
                // Fetch content
                fetch(url)
                    .then(response => response.text())
                    .then(html => {
                        // Create a temporary element to parse the HTML
                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = html;
                        
                        // Extract necessary parts
                        const newTitle = tempDiv.querySelector('h1').textContent;
                        const newDescription = tempDiv.querySelector('h1+p').textContent;
                        const newTable = tempDiv.querySelector('#leaderboard-table').innerHTML;
                        
                        // Update the page content
                        document.querySelector('header h1').textContent = newTitle;
                        document.querySelector('header p').textContent = newDescription;
                        document.querySelector('#leaderboard-table').innerHTML = newTable;
                        
                        // Update URL without page reload
                        const newUrl = `rating.php?mode=${mode}${userType !== 'all' ? '&user_type=' + userType : ''}${limit !== 10 ? '&limit=' + limit : ''}`;
                        history.pushState({ mode, userType, limit }, '', newUrl);
                        
                        // Hide loading indicator
                        ajaxLoader.classList.remove('active');
                        ratingContent.classList.remove('loading');
                        
                        // Update active tab
                        updateActiveTab(mode);
                    })
                    .catch(error => {
                        console.error('Error fetching content:', error);
                        ajaxLoader.classList.remove('active');
                        ratingContent.classList.remove('loading');
                    });
            }
            
            // Update active tab
            function updateActiveTab(mode) {
                // Remove active class from all tabs
                document.querySelectorAll('.tab-link').forEach(tab => {
                    tab.classList.remove('active');
                    tab.classList.remove('text-[#5D5CDE]');
                    tab.classList.add('text-gray-600', 'dark:text-gray-300');
                });
                
                // Add active class to the current tab
                const activeTab = document.querySelector(`.tab-link[data-mode="${mode}"]`);
                if (activeTab) {
                    activeTab.classList.add('active', 'text-[#5D5CDE]');
                    activeTab.classList.remove('text-gray-600', 'dark:text-gray-300');
                }
            }
            
            // Tab click event listener
            document.querySelectorAll('.tab-link').forEach(tab => {
                tab.addEventListener('click', (e) => {
                    e.preventDefault();
                    const mode = tab.getAttribute('data-mode');
                    fetchContent(mode, currentUserType, currentLimit);
                    currentMode = mode;
                });
            });
            
            // User type filter click event listener
            document.querySelectorAll('.filter-user-type').forEach(option => {
                option.addEventListener('click', (e) => {
                    e.preventDefault();
                    const userType = option.getAttribute('data-user-type');
                    fetchContent(currentMode, userType, currentLimit);
                    currentUserType = userType;
                    
                    // Update display text
                    let displayText = 'Все участники';
                    switch(userType) {
                        case 'child':
                            displayText = 'Дети';
                            break;
                        case 'teen':
                            displayText = 'Подростки';
                            break;
                        case 'adult':
                            displayText = 'Взрослые';
                            break;
                    }
                    document.getElementById('user-type-display').textContent = displayText;
                    
                    // Close dropdown
                    document.getElementById('user-type-filter').classList.remove('active');
                });
            });
            
            // Limit filter click event listener
            document.querySelectorAll('.filter-limit').forEach(option => {
                option.addEventListener('click', (e) => {
                    e.preventDefault();
                    const limit = parseInt(option.getAttribute('data-limit'));
                    fetchContent(currentMode, currentUserType, limit);
                    currentLimit = limit;
                    
                    // Update display text
                    document.getElementById('limit-display').textContent = `Показать ${limit}`;
                    
                    // Close dropdown
                    document.getElementById('limit-filter').classList.remove('active');
                });
            });
            
            // Handle browser back/forward
            window.addEventListener('popstate', (event) => {
                if (event.state) {
                    const { mode, userType, limit } = event.state;
                    fetchContent(mode, userType, limit);
                    currentMode = mode;
                    currentUserType = userType;
                    currentLimit = limit;
                    
                    // Update display texts
                    let userTypeDisplayText = 'Все участники';
                    switch(userType) {
                        case 'child':
                            userTypeDisplayText = 'Дети';
                            break;
                        case 'teen':
                            userTypeDisplayText = 'Подростки';
                            break;
                        case 'adult':
                            userTypeDisplayText = 'Взрослые';
                            break;
                    }
                    document.getElementById('user-type-display').textContent = userTypeDisplayText;
                    document.getElementById('limit-display').textContent = `Показать ${limit}`;
                }
            });
            
            // Filter dropdowns
            const filterDropdowns = document.querySelectorAll('.filter-dropdown');
            
            filterDropdowns.forEach(dropdown => {
                const button = dropdown.querySelector('button');
                
                button.addEventListener('click', (e) => {
                    e.stopPropagation();
                    
                    // Close other open dropdowns
                    filterDropdowns.forEach(otherDropdown => {
                        if (otherDropdown !== dropdown) {
                            otherDropdown.classList.remove('active');
                        }
                    });
                    
                    // Toggle current dropdown
                    dropdown.classList.toggle('active');
                });
            });
            
            // Close dropdowns when clicking outside
            document.addEventListener('click', () => {
                filterDropdowns.forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            });
            
            // Initialize browser history state
            history.replaceState({ 
                mode: currentMode, 
                userType: currentUserType, 
                limit: currentLimit 
            }, '', window.location.href);
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



<script>
    window.achievementPopup = <?php echo json_encode($achievementPopup); ?>;
</script>
<div id="achievementModal" class="achievement-modal">
  <div class="achievement-modal-content">
    <span class="achievement-modal-close">&times;</span>
    <div class="achievement-modal-icon" id="achievementModalIcon"></div>
    <h2 id="achievementModalTitle"></h2>
    <p id="achievementModalDesc"></p>
    <div class="achievement-modal-points" id="achievementModalPoints"></div>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    if (window.achievementPopup && window.achievementPopup.name) {
        document.getElementById('achievementModalTitle').innerText = window.achievementPopup.name;
        document.getElementById('achievementModalDesc').innerText = window.achievementPopup.description;
        document.getElementById('achievementModalPoints').innerText = 
            '+' + window.achievementPopup.points + ' эко-очков';

        let iconHTML = '';
        if (window.achievementPopup.icon) {
            iconHTML = window.achievementPopup.icon;
        } else {
            iconHTML = '🏆';
        }
        document.getElementById('achievementModalIcon').innerHTML = iconHTML;

        document.getElementById('achievementModal').style.display = "flex";
        document.querySelector('.achievement-modal-close').onclick = function() {
            document.getElementById('achievementModal').style.display = "none";
        };
        document.getElementById('achievementModal').onclick = function(e) {
            if (e.target === this) this.style.display = "none";
        };
    }
});
</script>
</body>
</html>