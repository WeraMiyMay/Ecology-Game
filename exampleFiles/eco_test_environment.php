<!DOCTYPE html>
<html lang="ru" class="<?php echo isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark' ? 'dark' : 'light'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($testInfo['name']); ?> - Экологика</title>
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
        
        /* Question styles */
        .question-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .question-card:hover {
            transform: translateY(-2px);
        }
        
        .question-number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-weight: 600;
            font-size: 14px;
            margin-right: 12px;
        }
        
        .option-container {
            position: relative;
            padding-left: 35px;
            padding-right: 40px; /* Added more right padding so text doesn't get hidden behind buttons */
            cursor: pointer;
            user-select: none;
            display: flex;
            align-items: center;
            transition: all 0.2s ease;
        }
        
        .option-container:hover {
            background-color: rgba(0, 0, 0, 0.03);
        }
        
        .dark .option-container:hover {
            background-color: rgba(255, 255, 255, 0.03);
        }
        
        .option-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }
        
        .checkmark {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            height: 20px;
            width: 20px;
            background-color: #eee;
            border-radius: 50%;
            transition: all 0.2s ease;
        }
        
        .checkbox .checkmark {
            border-radius: 4px;
        }
        
        .dark .checkmark {
            background-color: #334155;
        }
        
        .option-container:hover input ~ .checkmark {
            background-color: #ccc;
        }
        
        .dark .option-container:hover input ~ .checkmark {
            background-color: #475569;
        }
        
        .option-container input:checked ~ .checkmark {
            background-color: #22c55e;
        }
        
        .dark .option-container input:checked ~ .checkmark {
            background-color: #4ade80;
        }
        
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        
        .option-container input:checked ~ .checkmark:after {
            display: block;
        }
        
        .option-container .checkmark:after {
            left: 7px;
            top: 3px;
            width: 6px;
            height: 12px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        
        .checkbox .checkmark:after {
            left: 7px;
            top: 3px;
            width: 6px;
            height: 12px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        
        /* Test timer */
        .timer-container {
            display: flex;
            align-items: center;
            border-radius: 12px;
            padding: 6px 12px;
            font-weight: 600;
            font-size: 14px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .dark .timer-container {
            background-color: rgba(30, 41, 59, 0.8);
        }
        
        .timer-icon {
            margin-right: 6px;
        }
        
        /* Results page styles */
        .result-container {
            max-width: 700px;
            margin: 0 auto;
            padding: 2rem;
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }
        
        .dark .result-container {
            background-color: #1e293b;
        }
        
        .result-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .result-score {
            font-size: 3rem;
            font-weight: 700;
            color: #22c55e;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .dark .result-score {
            color: #4ade80;
        }
        
        .result-stars {
            display: flex;
            justify-content: center;
            margin: 1.5rem 0;
        }
        
        .star {
            width: 40px;
            height: 40px;
            margin: 0 8px;
            color: #d1d5db;
            transition: all 0.5s ease;
        }
        
        .dark .star {
            color: #475569;
        }
        
        .star.filled {
            color: #fbbf24;
            animation: starPop 0.5s ease-out forwards;
        }
        
        @keyframes starPop {
            0% {
                transform: scale(0);
            }
            50% {
                transform: scale(1.3);
            }
            100% {
                transform: scale(1);
            }
        }
        
        .result-message {
            text-align: center;
            font-size: 1.25rem;
            font-weight: 600;
            margin-top: 1rem;
            margin-bottom: 2rem;
        }
        
        .result-stats {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-bottom: 2rem;
        }
        
        .stat-item {
            text-align: center;
            padding: 1rem;
        }
        
        .stat-label {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 0.25rem;
        }
        
        .dark .stat-label {
            color: #9ca3af;
        }
        
        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .result-actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .result-button {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .result-button:hover {
            transform: translateY(-2px);
        }
        
        .result-confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f59e0b;
            top: -10px;
            animation: confetti 5s ease-in-out infinite;
        }
        
        @keyframes confetti {
            0% {
                top: -10px;
                transform: translateX(0) rotateZ(0deg);
            }
            100% {
                top: 100%;
                transform: translateX(calc(100px - 200px * var(--r))) rotateZ(720deg);
            }
        }
        
        /* Matching question styles */
        .matching-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .matching-pair {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            align-items: center;
        }
        
        .matching-item {
            font-weight: 600;
            min-width: 150px;
            background-color: #e5e7eb;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
        }
        
        .dark .matching-item {
            background-color: #334155;
        }
        
        .matching-select {
            flex-grow: 1;
            padding: 0.5rem;
            border-radius: 0.5rem;
            border: 1px solid #d1d5db;
            background-color: white;
            font-size: 1rem;
        }
        
        .dark .matching-select {
            background-color: #1e293b;
            border-color: #475569;
            color: white;
        }
        
        /* Progress bar */
        .progress-container {
            width: 100%;
            height: 8px;
            background-color: #e5e7eb;
            border-radius: 4px;
            margin-bottom: 2rem;
            overflow: hidden;
        }
        
        .dark .progress-container {
            background-color: #334155;
        }
        
        .progress-bar {
            height: 100%;
            background-color: #22c55e;
            transition: width 0.3s ease;
        }
        
        /* Navigation buttons */
        .nav-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .nav-button:hover {
            transform: translateY(-2px);
        }
        
        .nav-button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }
        
        /* Animation for question transitions */
        .question-fade-enter {
            opacity: 0;
            transform: translateY(20px);
        }
        
        .question-fade-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 0.3s, transform 0.3s;
        }
        
        .question-fade-exit {
            opacity: 1;
            transform: translateY(0);
        }
        
        .question-fade-exit-active {
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.3s, transform 0.3s;
        }
        
        /* Difficulty indicator */
        .difficulty-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 0.75rem;
            margin-bottom: 0.5rem;
        }
        
        .difficulty-easy {
            background-color: rgba(34, 197, 94, 0.2);
            color: #22c55e;
        }
        
        .dark .difficulty-easy {
            background-color: rgba(74, 222, 128, 0.2);
            color: #4ade80;
        }
        
        .difficulty-medium {
            background-color: rgba(234, 179, 8, 0.2);
            color: #eab308;
        }
        
        .dark .difficulty-medium {
            background-color: rgba(234, 179, 8, 0.2);
            color: #facc15;
        }
        
        .difficulty-hard {
            background-color: rgba(239, 68, 68, 0.2);
            color: #ef4444;
        }
        
        .dark .difficulty-hard {
            background-color: rgba(239, 68, 68, 0.2);
            color: #f87171;
        }
        
        /* True/False styles */
        .true-false-options {
            display: flex;
            gap: 1rem;
        }
        
        .true-false-option {
            flex: 1;
            padding: 1rem;
            border-radius: 0.5rem;
            text-align: center;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .true-false-option:hover {
            transform: translateY(-2px);
        }
        
        .true-option {
            background-color: rgba(34, 197, 94, 0.1);
            color: #22c55e;
            border: 2px solid transparent;
        }
        
        .dark .true-option {
            background-color: rgba(74, 222, 128, 0.1);
            color: #4ade80;
        }
        
        .true-option.selected {
            border-color: #22c55e;
            background-color: rgba(34, 197, 94, 0.3);
        }
        
        .dark .true-option.selected {
            border-color: #4ade80;
            background-color: rgba(74, 222, 128, 0.3);
        }
        
        .false-option {
            background-color: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 2px solid transparent;
        }
        
        .dark .false-option {
            background-color: rgba(248, 113, 113, 0.1);
            color: #f87171;
        }
        
        .false-option.selected {
            border-color: #ef4444;
            background-color: rgba(239, 68, 68, 0.3);
        }
        
        .dark .false-option.selected {
            border-color: #f87171;
            background-color: rgba(248, 113, 113, 0.3);
        }
        
        /* Topics button - new style for the back to topics button */
        .topics-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 0.5rem;
            background-color: #f3f4f6;
            color: #4b5563;
            transition: all 0.3s ease;
        }
        
        .dark .topics-button {
            background-color: #374151;
            color: #d1d5db;
        }
        
        .topics-button:hover {
            transform: translateY(-2px);
            background-color: #e5e7eb;
        }
        
        .dark .topics-button:hover {
            background-color: #4b5563;
        }

        /* Image container for question images */
        .question-image {
            max-width: 100%;
            border-radius: 0.5rem;
            margin: 1rem auto;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s ease;
        }
        
        .question-image:hover {
            transform: scale(1.02);
        }

        /* Special styles for environment-themed elements */
        .env-bg {
            background-color: rgba(134, 239, 172, 0.2);
        }
        
        .dark .env-bg {
            background-color: rgba(5, 46, 22, 0.3);
        }
        
        .eco-bullet {
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: #10b981;
            border-radius: 50% 50% 50% 0;
            margin-right: 0.5rem;
        }
        
        .dark .eco-bullet {
            background-color: #34d399;
        }
        
        /* Styles for detailed results */
        .analysis-container {
            display: none;
            margin-top: 2rem;
            animation: fadeIn 0.5s ease-in-out;
        }

        .question-analysis {
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .question-analysis:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .question-analysis-header {
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
        }

        .question-analysis-content {
            padding: 1rem;
            border-top: 1px solid rgba(0,0,0,0.1);
            display: none;
        }

        .question-analysis-content.open {
            display: block;
            animation: slideDown 0.3s ease;
        }

        .question-analysis.correct .question-analysis-header {
            background-color: rgba(34, 197, 94, 0.1);
        }

        .question-analysis.incorrect .question-analysis-header {
            background-color: rgba(239, 68, 68, 0.1);
        }

        .dark .question-analysis.correct .question-analysis-header {
            background-color: rgba(34, 197, 94, 0.2);
        }

        .dark .question-analysis.incorrect .question-analysis-header {
            background-color: rgba(239, 68, 68, 0.2);
        }

        .question-status {
            display: flex;
            align-items: center;
            font-weight: 600;
        }

        .question-status svg {
            margin-right: 0.5rem;
        }

        .question-status.correct {
            color: #22c55e;
        }

        .question-status.incorrect {
            color: #ef4444;
        }

        .explanation-box {
            background-color: rgba(34, 197, 94, 0.05);
            border-left: 4px solid #22c55e;
            padding: 1rem;
            margin-top: 1rem;
            border-radius: 0 0.25rem 0.25rem 0;
        }

        .dark .explanation-box {
            background-color: rgba(34, 197, 94, 0.1);
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Анимация для кнопки */
        .show-analysis-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .show-analysis-btn:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.3);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        .show-analysis-btn:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }
            20% {
                transform: scale(25, 25);
                opacity: 0.3;
            }
            100% {
                opacity: 0;
                transform: scale(40, 40);
            }
        }
            /* Settings panel */
        .settings-panel {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 900;
            transition: all 0.3s ease;
        }
        
        .settings-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #5D5CDE;
            box-shadow: 0 4px 12px rgba(93, 92, 222, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .settings-btn:hover {
            transform: rotate(30deg);
        }
        
        .settings-content {
            position: absolute;
            bottom: 60px;
            right: 0;
            background: white;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 240px;
            opacity: 0;
            transform: translateY(20px);
            pointer-events: none;
            transition: all 0.3s ease;
        }
        
        .dark .settings-content {
            background: #1e293b;
        }
        
        .settings-panel.active .settings-content {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }
        
        .settings-option {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .dark .settings-option {
            border-bottom: 1px solid #334155;
        }
        
        .settings-option:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        /* Switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 24px;
        }
        
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e2e8f0;
            transition: .4s;
            border-radius: 24px;
        }
    
        .dark .slider {
            background-color: #334155;
        }
        
        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        
        input:checked + .slider {
            background-color: #5D5CDE;
        }
        
        input:checked + .slider:before {
            transform: translateX(24px);
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
        <p class="text-sm loading-item" id="loading-text">Подготовка теста по охране окружающей среды...</p>
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
            <a href="tests.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item">Вернуться к тестам</a>
            <a href="choice.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item">Режимы игры</a>
            <a href="profile.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item">Мой профиль</a>
            <a href="achievements.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item">Достижения</a>
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

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-white/80 dark:bg-background-dark/80 backdrop-blur-md z-30 transition-all duration-300 shadow-sm navbar-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3 md:py-4">
                <div class="flex items-center">
                    <a href="index.php" class="text-3xl font-bold logo-text animate-pulse-slow">Экологика</a>
                </div>
                <div class="hidden md:flex items-center space-x-1 lg:space-x-8 nav-items">
                    <a href="tests.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Вернуться к тестам</a>
                    <a href="choice.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Режимы игры</a>
                    <a href="profile.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Мой профиль</a>
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
   <!-- Settings Panel -->
<div id="settings-panel" class="settings-panel">
    <div class="settings-btn" id="settings-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
    </div>
    <div class="settings-content">
        <h3 class="text-lg font-semibold mb-3">Настройки</h3>
    
        <div class="settings-option">
            <span>Фоновая музыка</span>
            <label class="switch">
                <input type="checkbox" id="music-toggle">
                <span class="slider"></span>
            </label>
        </div>
        
        <div class="settings-option">
            <span>Звуковые эффекты</span>
            <label class="switch">
                <input type="checkbox" id="sound-toggle" checked>
                <span class="slider"></span>
            </label>
        </div>
        
        <div class="settings-option">
            <span>Громкость музыки</span>
            <div class="flex items-center w-full">
                <input type="range" id="music-volume" min="0" max="100" value="50" class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer">
                <div class="ml-2 text-sm w-8 text-center" id="music-volume-value">50%</div>
            </div>
        </div>
    
        <div class="settings-option">
            <span>Громкость эффектов</span>
            <div class="flex items-center w-full">
                <input type="range" id="sound-volume" min="0" max="100" value="50" class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer">
                <div class="ml-2 text-sm w-8 text-center" id="sound-volume-value">50%</div>
            </div>
        </div>
    </div>
</div>

<!-- Audio Elements -->
<audio id="bg-music" loop>
    <source src="sounds/whispering-winds-20240601-053913.mp3" type="audio/mpeg">
</audio>
<audio id="hover-sound">
    <source src="sounds/hover_2.mp3" type="audio/mpeg">
</audio>
<audio id="click-sound">
    <source src="sounds/click_mult.mp3" type="audio/mpeg">
</audio>
    <!-- Main Content -->
    <main class="pt-20 pb-16 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php if ($mode === 'process'): ?>
            <!-- Test Results -->
            <div class="result-container animate__animated animate__fadeIn dark:bg-gray-800" data-aos="zoom-in">
                <?php if ($testResults['passed']): ?>
                <!-- Create confetti effect for passed test -->
                <?php for ($i = 0; $i < 40; $i++): ?>
                <div class="result-confetti" style="left: <?php echo rand(0, 100); ?>%; --r: <?php echo rand(0, 100) / 100; ?>; background-color: <?php echo ['#f59e0b', '#22c55e', '#3b82f6', '#ec4899', '#8b5cf6'][rand(0, 4)]; ?>; animation-delay: <?php echo rand(0, 30) / 10; ?>s;"></div>
                <?php endfor; ?>
                <?php endif; ?>
                
                <div class="result-header">
                    <div class="difficulty-badge difficulty-<?php echo $testInfo['difficulty'] == 1 ? 'easy' : ($testInfo['difficulty'] == 2 ? 'medium' : 'hard'); ?>">
                        <?php if ($testInfo['difficulty'] == 1): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg> Легкий уровень
                        <?php elseif ($testInfo['difficulty'] == 2): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg> Средний уровень
                        <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg> Сложный уровень
                        <?php endif; ?>
                    </div>
                    <h1 class="text-2xl font-bold mb-2"><?php echo htmlspecialchars($testInfo['name']); ?></h1>
                    <p class="text-gray-600 dark:text-gray-400"><?php echo htmlspecialchars($testInfo['topic_name']); ?></p>
                </div>
                
                <div class="result-score">
                    <span class="<?php echo $testResults['percent_correct'] >= 70 ? 'text-green-500' : ($testResults['percent_correct'] >= 50 ? 'text-yellow-500' : 'text-red-500'); ?>">
                        <?php echo $testResults['percent_correct']; ?>%
                    </span>
                </div>
                
                <div class="result-stars" data-stars="<?php echo $testResults['stars']; ?>">
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                    <div class="star <?php echo ($i <= $testResults['stars']) ? 'filled' : ''; ?>" style="animation-delay: <?php echo ($i - 1) * 0.3; ?>s;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <?php endfor; ?>
                </div>
                
                <div class="result-message">
                    <?php if ($testResults['percent_correct'] >= 90): ?>
                    <span class="text-green-500">Отлично! Ты настоящий защитник природы! 🌍</span>
                    <?php elseif ($testResults['percent_correct'] >= 70): ?>
                    <span class="text-green-500">Очень хороший результат! Продолжай заботиться о природе! 🌱</span>
                    <?php elseif ($testResults['percent_correct'] >= 50): ?>
                    <span class="text-yellow-500">Неплохо! Но есть к чему стремиться 🌿</span>
                    <?php else: ?>
                    <span class="text-red-500">Стоит немного подучить материал и попробовать снова 🍃</span>
                    <?php endif; ?>
                </div>
                
                <div class="result-stats">
                    <div class="stat-item">
                        <div class="stat-label">Правильных ответов</div>
                        <div class="stat-value"><?php echo $testResults['correct_answers']; ?> из <?php echo $testResults['total_questions']; ?></div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-label">Звёзд получено</div>
                        <div class="stat-value"><?php echo $testResults['stars']; ?> из 3</div>
                    </div>
                    
                    <div class="stat-item">
                        <div class="stat-label">Статус</div>
                        <div class="stat-value">
                            <?php if ($testResults['passed']): ?>
                            <span class="text-green-500">Пройден</span>
                            <?php else: ?>
                            <span class="text-red-500">Не пройден</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <?php if ($testResults['passed'] && $testInfo['difficulty'] < 3): ?>
                <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm leading-5 font-medium text-green-800 dark:text-green-200">Поздравляем!</h3>
                            <div class="mt-2 text-sm leading-5 text-green-700 dark:text-green-300">
                                <p>Ты успешно прошел этот уровень! Теперь доступен следующий уровень сложности.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Кнопка для отображения детального анализа ответов -->
                <div class="mt-6 flex justify-center">
                    <button id="show-analysis-btn" class="show-analysis-btn bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full shadow-md transition-all duration-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Показать анализ ответов
                    </button>
                </div>
                
                <!-- Детальный анализ ответов на вопросы -->
                <div id="questions-analysis" class="analysis-container">
                    <h3 class="text-xl font-bold mb-4 text-center">Анализ ответов</h3>
                    
                    <?php 
                    // Проверка наличия данных анализа
                    if (isset($testResults['questions_analysis']) && is_array($testResults['questions_analysis'])): 
                    ?>
                    
                    <?php foreach ($testResults['questions_analysis'] as $index => $analysis): ?>
                    <div class="question-analysis <?php echo $analysis['is_correct'] ? 'correct' : 'incorrect'; ?> bg-white dark:bg-gray-800">
                        <div class="question-analysis-header" onclick="toggleAnalysisContent(this)">
                            <div class="flex items-center">
                                <div class="question-number bg-<?php echo $currentDifficultyInfo['color']; ?>-100 dark:bg-<?php echo $currentDifficultyInfo['color']; ?>-900/30 text-<?php echo $currentDifficultyInfo['color']; ?>-500 dark:text-<?php echo $currentDifficultyInfo['color']; ?>-400 mr-3">
                                    <?php echo $index + 1; ?>
                                </div>
                                <div class="text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($analysis['question']); ?></div>
                            </div>
                            
                            <div class="question-status <?php echo $analysis['is_correct'] ? 'correct' : 'incorrect'; ?> ml-3 flex-shrink-0">
                                <?php if ($analysis['is_correct']): ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Правильно
                                <?php else: ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Неправильно
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="question-analysis-content">
                            <?php if ($analysis['is_correct'] && !empty($analysis['explanation'])): ?>
                            <div class="explanation-box">
                                <h4 class="font-semibold mb-1">Пояснение:</h4>
                                <p><?php echo htmlspecialchars($analysis['explanation']); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    <?php else: ?>
                    <div class="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-yellow-800 dark:text-yellow-200">Информация недоступна</h3>
                                <div class="mt-2 text-sm text-yellow-700 dark:text-yellow-300">
                                    <p>Подробный анализ ответов для этого теста недоступен.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="result-actions">
                    <a href="tests.php" class="result-button bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200">
                        Вернуться к тестам
                    </a>
                    <a href="eco_test_environment.php?test_id=<?php echo $testId; ?>" class="result-button bg-<?php echo $currentDifficultyInfo['color']; ?>-500 hover:bg-<?php echo $currentDifficultyInfo['color']; ?>-600 text-white">
                        Пройти еще раз
                    </a>
                           <a href="eco_lessons.php" class="result-button bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200">
                        Пройти урок
                    </a>
                    <?php 
                    // Показываем кнопку для следующего уровня, если текущий уровень пройден и это не последний уровень
                    if ($testResults['passed'] && $testInfo['difficulty'] < 3): 
                        // Получаем ID теста следующего уровня
                        $nextDifficulty = $testInfo['difficulty'] + 1;
                        $stmt = $pdo->prepare("SELECT id FROM eco_tests WHERE topic_id = :topic_id AND difficulty = :difficulty");
                        $stmt->bindParam(':topic_id', $testInfo['topic_id']);
                        $stmt->bindParam(':difficulty', $nextDifficulty);
                        $stmt->execute();
                        $nextTest = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        if ($nextTest):
                    ?>
                    <a href="eco_test_environment.php?test_id=<?php echo $nextTest['id']; ?>" class="result-button bg-blue-500 hover:bg-blue-600 text-white">
                        Перейти к следующему уровню
                    </a>
                    <?php endif; endif; ?>
                </div>
            </div>
            <?php else: ?>
            <!-- Test Header -->
            <header class="mb-8 text-center" data-aos="fade-down">
                <div class="inline-block">
                    <div class="difficulty-badge difficulty-<?php echo $testInfo['difficulty'] == 1 ? 'easy' : ($testInfo['difficulty'] == 2 ? 'medium' : 'hard'); ?>">
                        <?php if ($testInfo['difficulty'] == 1): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg> Легкий уровень
                        <?php elseif ($testInfo['difficulty'] == 2): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg> Средний уровень
                        <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg> Сложный уровень
                        <?php endif; ?>
                    </div>
                </div>
                <h1 class="text-3xl font-bold mb-2"><?php echo htmlspecialchars($testInfo['name']); ?></h1>
                <p class="text-gray-600 dark:text-gray-300 mb-4"><?php echo htmlspecialchars($currentDifficultyInfo['description']); ?></p>
                
                <div class="flex justify-center items-center mb-4">
                    <div class="timer-container" id="timer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-300 timer-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span id="timer-display"><?php echo floor($testInfo['time_limit'] / 60); ?>:<?php echo str_pad($testInfo['time_limit'] % 60, 2, '0', STR_PAD_LEFT); ?></span>
                    </div>
                </div>
                
                <!-- Added button to return to topics during the test -->
                <div class="my-4">
                    <a href="tests.php" class="topics-button inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Вернуться к темам
                    </a>
                </div>
            </header>
            
            <!-- Test Content -->
            <div class="max-w-4xl mx-auto">
                <!-- Progress Indicator -->
                <div class="progress-container" data-aos="fade-up">
                    <div class="progress-bar" id="progress-bar" style="width: 0%"></div>
                </div>
                
                <!-- Test Form -->
                <form id="test-form" method="post" action="eco_test_environment.php?test_id=<?php echo $testId; ?>">
                    <div id="questions-container">
                        <?php foreach ($testQuestions as $index => $question): ?>
                        <div class="question-card bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 mb-6 <?php echo $index !== 0 ? 'hidden' : ''; ?>" data-question="<?php echo $index; ?>" data-aos="fade-up" data-aos-delay="100">
                            <div class="flex items-center mb-4">
                                <div class="question-number bg-<?php echo $currentDifficultyInfo['color']; ?>-100 dark:bg-<?php echo $currentDifficultyInfo['color']; ?>-900/30 text-<?php echo $currentDifficultyInfo['color']; ?>-500 dark:text-<?php echo $currentDifficultyInfo['color']; ?>-400">
                                    <?php echo $index + 1; ?>
                                </div>
                                <h3 class="text-lg font-semibold"><?php echo htmlspecialchars($question['question']); ?></h3>
                            </div>
                            
                            <?php if ($question['image']): ?>
                            <div class="mb-4">
                                <img src="<?php echo htmlspecialchars($question['image']); ?>" alt="Изображение к вопросу" class="question-image rounded-lg max-w-full mx-auto">
                            </div>
                            <?php endif; ?>
                            
                            <?php if ($question['type'] === 'multiple'): ?>
                            <div class="mt-4 space-y-3">
                                <?php foreach ($question['options'] as $optionIndex => $option): ?>
                                <label class="option-container relative p-3 pl-10 rounded-lg block hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <input type="radio" name="answers[<?php echo $index; ?>]" value="<?php echo $optionIndex; ?>" class="answer-option absolute left-3 top-1/2 transform -translate-y-1/2">
                                    <span class="checkmark absolute left-3 top-1/2 transform -translate-y-1/2"></span>
                                    <span class="option-text"><?php echo htmlspecialchars($option); ?></span>
                                </label>
                                <?php endforeach; ?>
                            </div>
                            <?php elseif ($question['type'] === 'checkbox'): ?>
                            <div class="mt-4 space-y-3">
                                <?php foreach ($question['options'] as $optionIndex => $option): ?>
                                <label class="option-container checkbox relative p-3 pl-10 rounded-lg block hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <input type="checkbox" name="answers[<?php echo $index; ?>][]" value="<?php echo $optionIndex; ?>" class="answer-option absolute left-3 top-1/2 transform -translate-y-1/2">
                                    <span class="checkmark absolute left-3 top-1/2 transform -translate-y-1/2"></span>
                                    <span class="option-text"><?php echo htmlspecialchars($option); ?></span>
                                </label>
                                <?php endforeach; ?>
                            </div>
                            <?php elseif ($question['type'] === 'true_false'): ?>
                            <div class="mt-6">
                                <p class="text-center mb-4 text-lg"><?php echo htmlspecialchars($question['statement']); ?></p>
                                <div class="true-false-options">
                                    <div class="true-option true-false-option" onclick="selectTrueFalse(this, <?php echo $index; ?>, 0)">
                                        <input type="radio" name="answers[<?php echo $index; ?>]" value="0" class="hidden answer-option">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Верно
                                    </div>
                                    <div class="false-option true-false-option" onclick="selectTrueFalse(this, <?php echo $index; ?>, 1)">
                                        <input type="radio" name="answers[<?php echo $index; ?>]" value="1" class="hidden answer-option">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Неверно
                                    </div>
                                </div>
                            </div>
                            <?php elseif ($question['type'] === 'matching'): ?>
                            <div class="mt-4">
                                <div class="matching-container">
                                    <?php foreach ($question['pairs'] as $key => $value): ?>
                                    <div class="matching-pair">
                                        <div class="matching-item"><?php echo htmlspecialchars($key); ?></div>
                                        <select name="answers[<?php echo $index; ?>][<?php echo htmlspecialchars($key); ?>]" class="matching-select answer-option">
                                            <option value="">-- Выберите ответ --</option>
                                            <?php 
                                            // Перемешиваем варианты ответов для matching
                                            $values = array_values($question['pairs']);
                                            shuffle($values);
                                            foreach ($values as $option): 
                                            ?>
                                            <option value="<?php echo htmlspecialchars($option); ?>"><?php echo htmlspecialchars($option); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <!-- Navigation buttons with additions -->
                            <div class="flex justify-between mt-6">
                                <div class="flex items-center">
                                    <button type="button" class="nav-button bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 prev-button <?php echo $index === 0 ? 'opacity-50 cursor-not-allowed' : ''; ?>" <?php echo $index === 0 ? 'disabled' : ''; ?> onclick="showPreviousQuestion()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                        Назад
                                    </button>
                                </div>
                                
                                <div>
                                    <!-- Added "Return to topics" button when on mobile -->
                                    <a href="tests.php" class="topics-button md:hidden text-sm mb-2 block text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                        </svg>
                                        Вернуться к темам
                                    </a>
                                    
                                    <?php if ($index === count($testQuestions) - 1): ?>
                                    <button type="submit" id="submit-button" name="submit_test" class="nav-button bg-<?php echo $currentDifficultyInfo['color']; ?>-500 hover:bg-<?php echo $currentDifficultyInfo['color']; ?>-600 text-white">
                                        Завершить тест
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </button>
                                    <?php else: ?>
                                    <button type="button" class="nav-button bg-<?php echo $currentDifficultyInfo['color']; ?>-500 hover:bg-<?php echo $currentDifficultyInfo['color']; ?>-600 text-white next-button" onclick="showNextQuestion()">
                                        Далее
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
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
function toggleTheme() {
    document.documentElement.classList.toggle('dark');
    
    // Save theme preference to localStorage
    const theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
    localStorage.setItem('theme', theme);
    
    // Update Three.js background
    if (window.updateThreeBackground) {
        window.updateThreeBackground();
    }
    
    // Optionally, send theme preference to the server
    const formData = new FormData();
    formData.append('theme', theme);
    fetch(window.location.href, {
        method: 'POST',
        body: formData
    });
}

// Attach event listeners for theme toggle buttons
document.getElementById('theme-toggle').addEventListener('click', toggleTheme);
document.getElementById('mobile-theme-toggle').addEventListener('click', toggleTheme);

// Initialize theme on page load
initTheme();

initializeThreeBackground();

        
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
        
        // Test navigation
        window.currentQuestion = 0;
        window.totalQuestions = document.querySelectorAll('.question-card').length;
        
        // Update progress bar
        updateProgress();
        
        // Initialize countdown timer if we're on the test page
        if (document.getElementById('timer-display')) {
            initializeTimer(<?php echo $testInfo['time_limit']; ?>);
        }
        
        // Auto-submit when time runs out
        window.addEventListener('timeExpired', function() {
            document.getElementById('test-form').submit();
        });
        
        // Results page animations for stars
        if (document.querySelector('.result-stars')) {
            const stars = document.querySelectorAll('.star');
            const starsCount = parseInt(document.querySelector('.result-stars').dataset.stars);
            
            stars.forEach((star, index) => {
                if (index < starsCount) {
                    setTimeout(() => {
                        star.classList.add('filled');
                    }, 500 + (index * 300));
                }
            });
        }
        
        // Initialize Three.js background
        // initializeThreeBackground();
        // Settings panel
const settingsToggle = document.getElementById('settings-toggle');
const settingsPanel = document.getElementById('settings-panel');
const musicToggle = document.getElementById('music-toggle');
const soundToggle = document.getElementById('sound-toggle');
const bgMusic = document.getElementById('bg-music');
const hoverSound = document.getElementById('hover-sound');
const clickSound = document.getElementById('click-sound');
const musicVolume = document.getElementById('music-volume');
const soundVolume = document.getElementById('sound-volume');
const musicVolumeValue = document.getElementById('music-volume-value');
const soundVolumeValue = document.getElementById('sound-volume-value');

// Initialize settings from localStorage
let musicEnabled = localStorage.getItem('musicEnabled') === 'true';
let soundEnabled = localStorage.getItem('soundEnabled') !== 'false'; // Default true
let musicVolumeLevel = parseInt(localStorage.getItem('musicVolume')) || 50; // Default 50%
let soundVolumeLevel = parseInt(localStorage.getItem('soundVolume')) || 50; // Default 50%

// Apply saved settings
musicToggle.checked = musicEnabled;
soundToggle.checked = soundEnabled;
musicVolume.value = musicVolumeLevel;
soundVolume.value = soundVolumeLevel;
musicVolumeValue.textContent = musicVolumeLevel + '%';
soundVolumeValue.textContent = soundVolumeLevel + '%';

// Apply volume settings
bgMusic.volume = musicVolumeLevel / 100;
hoverSound.volume = soundVolumeLevel / 100;
clickSound.volume = soundVolumeLevel / 100;

// If music was enabled, try to play it
if (musicEnabled) {
    bgMusic.play().catch(e => {
        console.log("Autoplay prevented:", e);
        musicToggle.checked = false;
        musicEnabled = false;
        localStorage.setItem('musicEnabled', 'false');
    });
}

// Toggle settings panel
settingsToggle.addEventListener('click', () => {
    settingsPanel.classList.toggle('active');
    playSound(clickSound);
});

// Close settings panel when clicking outside
document.addEventListener('click', (e) => {
    if (!settingsPanel.contains(e.target) && e.target !== settingsToggle) {
        settingsPanel.classList.remove('active');
    }
});

// Music toggle
musicToggle.addEventListener('change', () => {
    musicEnabled = musicToggle.checked;
    localStorage.setItem('musicEnabled', musicEnabled);

    if (musicEnabled) {
        bgMusic.play().catch(e => {
            console.log("Autoplay prevented:", e);
            musicToggle.checked = false;
            musicEnabled = false;
            localStorage.setItem('musicEnabled', 'false');
        });
    } else {
        bgMusic.pause();
    }

    playSound(clickSound);
});

// Sound effects toggle
soundToggle.addEventListener('change', () => {
    soundEnabled = soundToggle.checked;
    localStorage.setItem('soundEnabled', soundEnabled);

    if (soundEnabled) {
        playSound(clickSound);
    }
});

// Music volume control
musicVolume.addEventListener('input', () => {
    musicVolumeLevel = parseInt(musicVolume.value);
    musicVolumeValue.textContent = musicVolumeLevel + '%';
    bgMusic.volume = musicVolumeLevel / 100;
    localStorage.setItem('musicVolume', musicVolumeLevel);
});

// Sound effects volume control
soundVolume.addEventListener('input', () => {
    soundVolumeLevel = parseInt(soundVolume.value);
    soundVolumeValue.textContent = soundVolumeLevel + '%';
    hoverSound.volume = soundVolumeLevel / 100;
    clickSound.volume = soundVolumeLevel / 100;
    localStorage.setItem('soundVolume', soundVolumeLevel);

    // Play a sample sound when adjusting volume
    if (soundEnabled) {
        playSound(clickSound);
    }
});

// Function to play sound effects
function playSound(sound) {
    if (soundEnabled && sound) {
        // Reset the audio to the beginning
        sound.currentTime = 0;
        sound.play().catch(e => console.log("Sound play prevented:", e));
    }
}

// Add hover sound effects to buttons and interactive elements
const interactiveElements = document.querySelectorAll('button, .quiz-option, .species-card, .food-web-item, .conservation-project, .settings-btn, .switch, .child-button');
interactiveElements.forEach(element => {
    element.addEventListener('mouseenter', () => {
        playSound(hoverSound);
    });

    element.addEventListener('click', () => {
        playSound(clickSound);
    });
});
        // Show/hide questions analysis on button click
        const showAnalysisBtn = document.getElementById('show-analysis-btn');
        if (showAnalysisBtn) {
            showAnalysisBtn.addEventListener('click', function() {
                const questionsAnalysis = document.getElementById('questions-analysis');
                if (questionsAnalysis.style.display === 'block') {
                    questionsAnalysis.style.display = 'none';
                    showAnalysisBtn.textContent = 'Показать анализ ответов';
                } else {
                    questionsAnalysis.style.display = 'block';
                    showAnalysisBtn.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Скрыть анализ ответов
                    `;
                }
            });
        }
    });
    
    // Toggle question analysis content
    function toggleAnalysisContent(header) {
        const content = header.nextElementSibling;
        if (content.classList.contains('open')) {
            content.classList.remove('open');
        } else {
            content.classList.add('open');
        }
    }
    
    // Functions for test navigation
    function showNextQuestion() {
        if (window.currentQuestion < window.totalQuestions - 1) {
            document.querySelector(`.question-card[data-question="${window.currentQuestion}"]`).classList.add('hidden');
            window.currentQuestion++;
            document.querySelector(`.question-card[data-question="${window.currentQuestion}"]`).classList.remove('hidden');
            updateProgress();
            
            // Scroll to top of question
            window.scrollTo({
                top: document.querySelector('#questions-container').offsetTop - 100,
                behavior: 'smooth'
            });
        }
    }
    
    function showPreviousQuestion() {
        if (window.currentQuestion > 0) {
            document.querySelector(`.question-card[data-question="${window.currentQuestion}"]`).classList.add('hidden');
            window.currentQuestion--;
            document.querySelector(`.question-card[data-question="${window.currentQuestion}"]`).classList.remove('hidden');
            updateProgress();
            
            // Scroll to top of question
            window.scrollTo({
                top: document.querySelector('#questions-container').offsetTop - 100,
                behavior: 'smooth'
            });
        }
    }
    
    function updateProgress() {
        const progressBar = document.getElementById('progress-bar');
        if (progressBar) {
            const progress = ((window.currentQuestion + 1) / window.totalQuestions) * 100;
            progressBar.style.width = `${progress}%`;
        }
    }
    
    function selectTrueFalse(element, questionIndex, value) {
        // Remove selected class from all options
        const options = element.parentElement.querySelectorAll('.true-false-option');
        options.forEach(opt => opt.classList.remove('selected'));
        
        // Add selected class to clicked option
        element.classList.add('selected');
        
        // Set the value of the hidden input
        element.querySelector('input').checked = true;
    }
    
    function initializeTimer(seconds) {
        let timeLeft = seconds;
        const timerDisplay = document.getElementById('timer-display');
        
        const timer = setInterval(() => {
            timeLeft--;
            
            if (timeLeft <= 0) {
                clearInterval(timer);
                window.dispatchEvent(new Event('timeExpired'));
            }
            
            // Update display
            const minutes = Math.floor(timeLeft / 60);
            const secondsDisplay = timeLeft % 60;
            timerDisplay.textContent = `${minutes}:${secondsDisplay < 10 ? '0' : ''}${secondsDisplay}`;
            
            // Change color when time is running out
            if (timeLeft <= 30) {
                timerDisplay.classList.add('text-red-500');
                timerDisplay.classList.add('animate-pulse');
            }
        }, 1000);
    }
    
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
            
            // Color - environment theme with blue and green tones
            if (isDark) {
                // Dark theme: brighter, more vibrant colors
                if (Math.random() > 0.5) {
                    // Blue particles
                    colors[i3] = Math.random() * 0.2;          // R: Very little red (0.0-0.2)
                    colors[i3 + 1] = Math.random() * 0.3 + 0.3; // G: Medium green (0.3-0.6)
                    colors[i3 + 2] = Math.random() * 0.4 + 0.6; // B: Strong blue (0.6-1.0)
                } else {
                    // Green particles
                    colors[i3] = Math.random() * 0.2;          // R: Very little red (0.0-0.2)
                    colors[i3 + 1] = Math.random() * 0.4 + 0.6; // G: Strong green (0.6-1.0)
                    colors[i3 + 2] = Math.random() * 0.3;      // B: Very little blue (0.0-0.3)
                }
            } else {
                // Light theme: more subtle, pastel colors
                if (Math.random() > 0.5) {
                    // Blue particles
                    colors[i3] = Math.random() * 0.2;          // R: Very little red (0.0-0.2)
                    colors[i3 + 1] = Math.random() * 0.3 + 0.2; // G: Medium green (0.2-0.5)
                    colors[i3 + 2] = Math.random() * 0.4 + 0.4; // B: Medium-strong blue (0.4-0.8)
                } else {
                    // Green particles
                    colors[i3] = Math.random() * 0.2;          // R: Very little red (0.0-0.2)
                    colors[i3 + 1] = Math.random() * 0.3 + 0.5; // G: Medium to strong green (0.5-0.8)
                    colors[i3 + 2] = Math.random() * 0.2;      // B: Very little blue (0.0-0.2)
                }
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
        
        // Environment-themed particle animation - gentler movement representing clean air
        const delta = clock.getDelta();
        if (particles) {
            particles.rotation.x += delta * 0.015; // Slightly faster rotation to show air movement
            particles.rotation.y += delta * 0.02;
            
            // More fluid motion like air currents
            const time = Date.now() * 0.0006; // Slightly faster time factor for air-like movement
            const positions = particles.geometry.attributes.position.array;
            
            for (let i = 0; i < positions.length; i += 3) {
                // Add gentle sinusoidal movement
                positions[i] += Math.sin(time + positions[i] * 0.05) * 0.02; // Side to side
                positions[i + 1] += Math.cos(time + positions[i + 1] * 0.05) * 0.02; // Up and down
                positions[i + 2] += Math.sin(time * 0.7 + positions[i + 2] * 0.05) * 0.02; // Back and forth
            }
            
            particles.geometry.attributes.position.needsUpdate = true;
        }
        
        renderer.render(scene, camera);
    }
</script>


</body>
</html>