<!DOCTYPE html>
<html lang="ru" class="<?php echo isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark' ? 'dark' : 'light'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Биосферный уровень организации живого - Экологика</title>
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
        
        .animal {
            position: absolute;
            width: 25px;
            height: 25px;
            opacity: 0.7;
            animation: moving 5s linear infinite;
        }
        
        @keyframes moving {
            0% {
                transform: translateY(-100px) translateX(0) rotate(0deg) scale(0.8);
                opacity: 0;
            }
            10% {
                opacity: 0.8;
            }
            90% {
                opacity: 0.8;
            }
            100% {
                transform: translateY(100vh) translateX(50px) rotate(360deg) scale(1.2);
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
            --bg-color:rgb(255, 255, 255);
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
        
        /* Topic cards */
        .topic-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .topic-card:hover {
            transform: translateY(-5px);
        }
        
        .topic-card:hover .topic-icon {
            transform: scale(1.1);
        }
        
        .topic-icon {
            transition: all 0.3s ease;
        }

        /* Progress bar for lessons */
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

        /* Lesson card */
        .lesson-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border-left: 4px solid transparent;
        }
        
        .lesson-card:hover {
            transform: translateX(5px);
        }
        
        /* Modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        
        .modal.active {
            opacity: 1;
            visibility: visible;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            transform: scale(0.8);
            transition: transform 0.3s ease;
        }
        
        .dark .modal-content {
            background-color: #1e293b;
        }
        
        .modal.active .modal-content {
            transform: scale(1);
        }

        /* Lesson specific styles */
        .lesson-section {
            display: none;
        }
        
        .lesson-section.active {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }
        
        .child-font {
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 0.02em;
        }
        
        .child-button {
            transition: all 0.3s ease;
        }
        
        .child-button:hover {
            transform: scale(1.05);
        }
        
        .quiz-option {
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .quiz-option:hover {
            border-color: #5D5CDE;
        }
        
        .quiz-option.selected {
            border-color: #5D5CDE;
            background-color: rgba(93, 92, 222, 0.1);
        }
        
        .quiz-option.correct {
            border-color: #22c55e;
            background-color: rgba(34, 197, 94, 0.1);
        }
        
        .quiz-option.incorrect {
            border-color: #ef4444;
            background-color: rgba(239, 68, 68, 0.1);
        }
        
        /* Interactive timeline */
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: #5D5CDE;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
            border-radius: 3px;
        }
        
        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }
        
        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            right: -10px;
            background-color: white;
            border: 4px solid #5D5CDE;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }
        
        .timeline-left {
            left: 0;
        }
        
        .timeline-right {
            left: 50%;
        }
        
        .timeline-right::after {
            left: -10px;
        }
        
        .timeline-content {
            padding: 20px 30px;
            background-color: white;
            position: relative;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .dark .timeline-content {
            background-color: #1e293b;
        }
        
        .dark .timeline-item::after {
            background-color: #1e293b;
        }
        
        @media screen and (max-width: 768px) {
            .timeline::after {
                left: 31px;
            }
            
            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }
            
            .timeline-right {
                left: 0;
            }
            
            .timeline-item::after {
                left: 21px;
            }
            
            .timeline-right::after {
                left: 21px;
            }
        }

        /* Interactive diagram */
        .biosphere-diagram {
            position: relative;
            width: 100%;
            height: 400px;
            background: linear-gradient(180deg, #87CEEB 0%, #4ade80 100%);
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        
        .dark .biosphere-diagram {
            background: linear-gradient(180deg, #1e3a8a 0%, #16a34a 100%);
        }
        
        .layer {
            position: absolute;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .layer:hover {
            filter: brightness(1.2);
            transform: scale(1.01);
        }
        
        .layer-info {
            display: none;
            position: absolute;
            right: 10px;
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            width: 40%;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            z-index: 10;
        }
        
        .dark .layer-info {
            background-color: #1e293b;
        }
        
        .layer.active .layer-info {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }
        
        /* Drag and drop cycle game */
        .cycle-game {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }
        
        @media (min-width: 768px) {
            .cycle-game {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        .cycle-drop-zone {
            background-color: rgba(93, 92, 222, 0.1);
            border: 2px dashed #5D5CDE;
            border-radius: 12px;
            padding: 20px;
            min-height: 120px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .cycle-drop-zone.hover {
            background-color: rgba(93, 92, 222, 0.2);
            transform: scale(1.02);
        }
        
        .cycle-drop-zone.correct {
            background-color: rgba(34, 197, 94, 0.1);
            border: 2px solid #22c55e;
        }
        
        .cycle-card {
            background-color: #fff;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            cursor: grab;
            transition: all 0.3s ease;
            user-select: none;
            margin-bottom: 10px;
            max-width: 100%;
        }
        
        .dark .cycle-card {
            background-color: #334155;
        }
        
        .cycle-card.dragging {
            opacity: 0.5;
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }
        
        .cycle-elements {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
            justify-content: center;
        }
        
        /* Decision scenario game */
        .scenario-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .scenario-header {
            background-color: #5D5CDE;
            color: white;
            padding: 15px;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .scenario-content {
            padding: 20px;
            background-color: white;
            transition: height 0.3s ease;
        }
        
        .dark .scenario-content {
            background-color: #1e293b;
        }
        
        .scenario-option {
            padding: 15px;
            border-radius: 8px;
            background-color: #f8fafc;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .dark .scenario-option {
            background-color: #334155;
        }
        
        .scenario-option:hover {
            border-color: #5D5CDE;
            transform: translateY(-2px);
        }
        
        .scenario-option.selected {
            border-color: #5D5CDE;
            background-color: rgba(93, 92, 222, 0.1);
        }
        
        .scenario-feedback {
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
            display: none;
        }
        
        .scenario-feedback.visible {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }
        
        .scenario-positive {
            background-color: rgba(34, 197, 94, 0.1);
            border: 1px solid #22c55e;
        }
        
        .scenario-negative {
            background-color: rgba(239, 68, 68, 0.1);
            border: 1px solid #ef4444;
        }
        
        .scenario-neutral {
            background-color: rgba(234, 179, 8, 0.1);
            border: 1px solid #eab308;
        }
        
        /* Ecosystem connection game */
        .ecosystem-game {
            position: relative;
            width: 100%;
            height: 500px;
            background-color: #f0f9ff;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        
        .dark .ecosystem-game {
            background-color: #0f172a;
        }
        
        .ecosystem-element {
            position: absolute;
            padding: 10px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 2;
        }
        
        .dark .ecosystem-element {
            background-color: #334155;
        }
        
        .ecosystem-element:hover {
            transform: scale(1.1);
            z-index: 3;
        }
        
        .ecosystem-element.active {
            border: 2px solid #5D5CDE;
            z-index: 4;
        }
        
        .ecosystem-line {
            position: absolute;
            height: 2px;
            background-color: #5D5CDE;
            transform-origin: 0 0;
            z-index: 1;
        }
        
        .ecosystem-element-info {
            position: absolute;
            background-color: white;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            width: 200px;
            font-size: 0.85rem;
            display: none;
            z-index: 5;
        }
        
        .dark .ecosystem-element-info {
            background-color: #1e293b;
        }
        
        .ecosystem-element.active .ecosystem-element-info {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
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
        
        /* Reward modal */
        .reward-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s ease;
        }
        
        .reward-modal.active {
            opacity: 1;
            visibility: visible;
        }
        
        .reward-content {
            background: white;
            border-radius: 20px;
            padding: 30px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            position: relative;
            transform: scale(0.8);
            transition: all 0.5s ease;
        }
        
        .dark .reward-content {
            background: #1e293b;
        }
        
        .reward-modal.active .reward-content {
            transform: scale(1);
        }
        
        .reward-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #5D5CDE, #22c55e);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            animation: pulse-slow 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        /* Confetti */
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #5D5CDE;
            animation: confetti-fall 5s ease-in-out forwards;
        }
        
        @keyframes confetti-fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
        
        .confetti-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9998;
            pointer-events: none;
            overflow: hidden;
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
        <p class="text-sm loading-item" id="loading-text">Подготовка урока "Биосферный уровень организации живого"...</p>
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
            <a href="achievements.php" class="py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-all duration-300 mobile-menu-item">Достижения</a>
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
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-white/80 dark:bg-background-dark/80 backdrop-blur-md z-50 transition-all duration-300 shadow-sm navbar-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3 md:py-4">
                <div class="flex items-center">
                    <a href="index.php" class="text-3xl font-bold logo-text animate-pulse-slow">Экологика</a>
                </div>
                <div class="hidden md:flex items-center space-x-1 lg:space-x-8 nav-items">
                    <a href="choice.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Режимы игры</a>
                    <a href="eco_lessons.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Уроки</a>
                    <a href="profile.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Мой профиль</a>
                    <a href="achievements.php" class="menu-button px-3 py-2 text-gray-800 dark:text-gray-100 hover:text-primary dark:hover:text-primary-light transition-all duration-300 nav-item">Достижения</a>
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
            <span>Размер текста</span>
            <div class="flex items-center">
                <button id="text-size-decrease" class="w-8 h-8 bg-gray-200 dark:bg-gray-700 rounded-l-lg flex items-center justify-center hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                    <span class="text-lg">A-</span>
                </button>
                <div class="px-2 text-center text-sm" id="text-size-value">100%</div>
                <button id="text-size-increase" class="w-8 h-8 bg-gray-200 dark:bg-gray-700 rounded-r-lg flex items-center justify-center hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                    <span class="text-lg">A+</span>
                </button>
            </div>
        </div>
        
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
    <source src="sounds/music.mp3" type="audio/mpeg">
</audio>
<audio id="hover-sound">
    <source src="sounds/hover_2.mp3" type="audio/mpeg">
</audio>
<audio id="click-sound">
    <source src="sounds/click_mult.mp3" type="audio/mpeg">
</audio>

    <!-- Main Content -->
    <main class="pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Lesson Header -->
            <header class="mb-8 text-center">
                <div class="flex justify-center items-center mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f30e.svg" class="w-12 h-12 mr-3 animate-float" alt="Земля" />
                    <h1 class="text-4xl font-bold child-font text-5D5CDE animate-bounce-slow">Биосферный уровень организации живого</h1>
                    <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f30d.svg" class="w-12 h-12 ml-3 animate-pulse-slow" alt="Глобус" />
                </div>
                
                <!-- Progress bar for tracking lesson completion -->
                <div class="max-w-lg mx-auto mb-6">
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium text-gray-600 dark:text-gray-300">Твой прогресс:</span>
                        <span class="font-semibold text-5D5CDE"><span id="progress-percent"><?php echo $currentProgress; ?></span>%</span>
                    </div>
                    <div class="progress-bar">
                        <div id="progress-bar-fill" class="progress-bar-fill green" style="width: <?php echo $currentProgress; ?>%"></div>
                    </div>
                </div>
                
                <!-- Lesson Navigation Controls -->
                <div class="flex justify-center space-x-4 mb-6">
                    <button id="prev-section" class="child-button px-6 py-2 bg-gray-200 dark:bg-gray-700 rounded-full shadow-md hover:shadow-lg text-gray-700 dark:text-gray-200 font-medium transition-all duration-300 flex items-center opacity-50 cursor-not-allowed" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Назад
                    </button>
                    <button id="next-section" class="child-button px-6 py-2 bg-5D5CDE text-gray rounded-full shadow-md hover:shadow-lg font-medium transition-all duration-300 flex items-center">
                        Вперед
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </header>
            
            <!-- Lesson Sections -->
            <div id="lesson-container" class="max-w-4xl mx-auto">
                <!-- Section 1: Introduction to Biosphere -->
                <div id="section-1" class="lesson-section active bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg mb-10">
                    <div class="text-center mb-8">
                        <div class="relative inline-block">
                            <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f30e.svg" class="w-16 h-16 mb-2 mx-auto animate-spin-slow" alt="Земля" />
                            <h2 class="text-3xl font-bold child-font text-5D5CDE mb-2">Введение в биосферу</h2>
                        </div>
                        <p class="text-lg text-gray-700 dark:text-gray-300">Изучаем глобальный уровень организации живого на планете Земля</p>
                    </div>
                    
                    <div class="flex flex-col md:flex-row items-center mb-8">
                        <div class="md:w-1/2 p-4">
                            <div class="bg-blue-50 dark:bg-blue-900/20 rounded-2xl p-5 shadow-md relative overflow-hidden child-font">
                                <div class="absolute right-0 bottom-0 w-20 h-20 opacity-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-full h-full text-blue-500">
                                        <path d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2ZM12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM12 6C13.1046 6 14 6.89543 14 8C14 9.10457 13.1046 10 12 10C10.8954 10 10 9.10457 10 8C10 6.89543 10.8954 6 12 6ZM18 12C18 14.7614 15.3137 17 12 17C8.68629 17 6 14.7614 6 12H8C8 13.6569 9.79086 15 12 15C14.2091 15 16 13.6569 16 12H18Z"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-blue-800 dark:text-blue-300 mb-3">Что такое биосфера?</h3>
                                <p class="text-blue-700 dark:text-blue-200 mb-4">Биосфера — это глобальная экосистема, объединяющая все живые организмы и среду их обитания, включая атмосферу, гидросферу и верхнюю часть литосферы. Термин «биосфера» был предложен австрийским геологом Эдуардом Зюссом в 1875 году, но наиболее полно концепцию развил русский учёный В.И. Вернадский в начале XX века.</p>
                                <p class="text-blue-700 dark:text-blue-200 mb-2">Биосфера — это самый высокий уровень организации живой материи на Земле, объединяющий все экосистемы планеты в единое функциональное целое.</p>
                                <p class="text-blue-600 dark:text-blue-300 italic">Понимание биосферы как целостной системы критически важно для решения глобальных экологических проблем и создания устойчивого будущего.</p>
                            </div>
                        </div>
                        
                        <div class="md:w-1/2 p-4 flex justify-center">
                            <div class="biosphere-diagram relative w-full overflow-hidden rounded-xl">
                                <!-- Earth layers representation -->
                                <div class="layer" id="atmosphere-layer" style="top: 0; height: 40%; background-color: rgba(135, 206, 250, 0.6);">
                                    <div class="absolute top-4 left-4 font-bold text-white">Атмосфера</div>
                                    <div class="layer-info" style="top: 20px;">
                                        <h4 class="font-bold mb-2 text-blue-800 dark:text-blue-300">Атмосфера</h4>
                                        <p class="text-sm text-gray-700 dark:text-gray-300">Газовая оболочка Земли, содержащая кислород, необходимый для дыхания, и защищающая от ультрафиолетового излучения</p>
                                    </div>
                                </div>
                                
                                <div class="layer" id="hydrosphere-layer" style="top: 40%; height: 30%; background-color: rgba(0, 119, 190, 0.6);">
                                    <div class="absolute top-2 left-4 font-bold text-white">Гидросфера</div>
                                    <div class="layer-info" style="top: 50px;">
                                        <h4 class="font-bold mb-2 text-blue-800 dark:text-blue-300">Гидросфера</h4>
                                        <p class="text-sm text-gray-700 dark:text-gray-300">Водная оболочка Земли, включающая океаны, моря, озёра, реки и подземные воды</p>
                                    </div>
                                </div>
                                
                                <div class="layer" id="lithosphere-layer" style="top: 70%; height: 30%; background-color: rgba(139, 69, 19, 0.6);">
                                    <div class="absolute top-2 left-4 font-bold text-white">Литосфера</div>
                                    <div class="layer-info" style="top: 50px;">
                                        <h4 class="font-bold mb-2 text-blue-800 dark:text-blue-300">Литосфера</h4>
                                        <p class="text-sm text-gray-700 dark:text-gray-300">Твёрдая оболочка Земли, включающая земную кору и верхнюю часть мантии</p>
                                    </div>
                                </div>
                                
                              
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-green-50 dark:bg-green-900/20 rounded-2xl p-5 mb-8 child-font relative">
                        <div class="absolute -top-4 -right-4 w-12 h-12 bg-green-300 dark:bg-green-500 rounded-full flex items-center justify-center shadow-lg animate-pulse-slow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-green-800 dark:text-green-300 mb-3">История изучения биосферы</h3>
                        <p class="text-green-700 dark:text-green-200 mb-4">Понимание биосферы как единой системы формировалось на протяжении веков. Вот ключевые моменты в истории изучения биосферы:</p>
                        
                        <div class="timeline mb-6">
                            <div class="timeline-item timeline-left">
                                <div class="timeline-content">
                                    <h4 class="font-semibold text-green-800 dark:text-green-300 mb-1">1875</h4>
                                    <p class="text-green-700 dark:text-green-200 text-sm">Эдуард Зюсс вводит термин «биосфера» для обозначения области распространения жизни на Земле</p>
                                </div>
                            </div>
                            <div class="timeline-item timeline-right">
                                <div class="timeline-content">
                                    <h4 class="font-semibold text-green-800 dark:text-green-300 mb-1">1926</h4>
                                    <p class="text-green-700 dark:text-green-200 text-sm">В.И. Вернадский публикует книгу «Биосфера», в которой развивает целостное учение о биосфере как глобальной системе</p>
                                </div>
                            </div>
                            <div class="timeline-item timeline-left">
                                <div class="timeline-content">
                                    <h4 class="font-semibold text-green-800 dark:text-green-300 mb-1">1935</h4>
                                    <p class="text-green-700 dark:text-green-200 text-sm">Артур Тэнсли вводит понятие «экосистема», что способствует развитию экосистемного подхода к изучению биосферы</p>
                                </div>
                            </div>
                            <div class="timeline-item timeline-right">
                                <div class="timeline-content">
                                    <h4 class="font-semibold text-green-800 dark:text-green-300 mb-1">1972</h4>
                                    <p class="text-green-700 dark:text-green-200 text-sm">Джеймс Лавлок предлагает гипотезу Гайи, рассматривающую Землю как саморегулирующуюся систему</p>
                                </div>
                            </div>
                            <div class="timeline-item timeline-left">
                                <div class="timeline-content">
                                    <h4 class="font-semibold text-green-800 dark:text-green-300 mb-1">1986</h4>
                                    <p class="text-green-700 dark:text-green-200 text-sm">Запуск международной программы «Геосфера-Биосфера» для изучения глобальных изменений</p>
                                </div>
                            </div>
                            <div class="timeline-item timeline-right">
                                <div class="timeline-content">
                                    <h4 class="font-semibold text-green-800 dark:text-green-300 mb-1">XXI век</h4>
                                    <p class="text-green-700 dark:text-green-200 text-sm">Развитие концепции «планетарных границ» для определения безопасных пределов человеческой деятельности в биосфере</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                            <h4 class="font-semibold text-green-800 dark:text-green-300 mb-2">Вклад В.И. Вернадского в учение о биосфере</h4>
                            <p class="text-green-700 dark:text-green-200 text-sm mb-3">Владимир Иванович Вернадский (1863-1945) — выдающийся русский учёный-естествоиспытатель, мыслитель и общественный деятель. Его вклад в учение о биосфере включает:</p>
                            
                            <ul class="list-disc list-inside space-y-2 text-green-700 dark:text-green-200 text-sm">
                                <li>Определение биосферы как активной оболочки Земли, в которой живое вещество играет ведущую роль</li>
                                <li>Выявление геологической роли живых организмов в формировании лика Земли</li>
                                <li>Разработка концепции круговорота химических элементов в биосфере</li>
                                <li>Введение понятия «живое вещество» как совокупности всех живых организмов</li>
                                <li>Предвидение эволюции биосферы в ноосферу — сферу разума</li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Boundaries and structure of the biosphere -->
                    <div class="bg-indigo-50 dark:bg-indigo-900/20 rounded-2xl p-5 mb-8 child-font">
                        <h3 class="text-xl font-bold text-indigo-800 dark:text-indigo-300 mb-3">Границы и структура биосферы</h3>
                        <p class="text-indigo-700 dark:text-indigo-200 mb-4">Биосфера охватывает все области Земли, где существует жизнь. Её границы определяются физическими и химическими условиями, допускающими существование живых организмов:</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 dark:text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-indigo-800 dark:text-indigo-300">В атмосфере</h4>
                                </div>
                                <p class="text-indigo-700 dark:text-indigo-200 text-sm">От поверхности Земли до высоты около 20-25 км (озоновый слой). Здесь встречаются бактерии, споры грибов, пыльца растений, некоторые насекомые, птицы.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 dark:text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-indigo-800 dark:text-indigo-300">В гидросфере</h4>
                                </div>
                                <p class="text-indigo-700 dark:text-indigo-200 text-sm">От поверхности до максимальных глубин океана (около 11 км). Жизнь присутствует даже в самых глубоких океанических впадинах, где обитают экстремофильные организмы.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 dark:text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-indigo-800 dark:text-indigo-300">В литосфере</h4>
                                </div>
                                <p class="text-indigo-700 dark:text-indigo-200 text-sm">От поверхности до глубины около 3-4 км. На больших глубинах обнаружены бактерии, приспособившиеся к экстремальным условиям, но их численность резко снижается с глубиной.</p>
                            </div>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md mb-4">
                            <h4 class="font-semibold text-indigo-800 dark:text-indigo-300 mb-2">Структурные компоненты биосферы по Вернадскому</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="border border-indigo-200 dark:border-indigo-800 rounded-lg p-3">
                                    <p class="font-medium text-indigo-700 dark:text-indigo-300 mb-1">Живое вещество</p>
                                    <p class="text-sm">Совокупность всех живых организмов планеты</p>
                                </div>
                                <div class="border border-indigo-200 dark:border-indigo-800 rounded-lg p-3">
                                    <p class="font-medium text-indigo-700 dark:text-indigo-300 mb-1">Биогенное вещество</p>
                                    <p class="text-sm">Вещество, созданное живыми организмами (уголь, нефть, известняк и т.д.)</p>
                                </div>
                                <div class="border border-indigo-200 dark:border-indigo-800 rounded-lg p-3">
                                    <p class="font-medium text-indigo-700 dark:text-indigo-300 mb-1">Косное вещество</p>
                                    <p class="text-sm">Вещество, образованное без участия живых организмов (вулканические породы)</p>
                                </div>
                                <div class="border border-indigo-200 dark:border-indigo-800 rounded-lg p-3">
                                    <p class="font-medium text-indigo-700 dark:text-indigo-300 mb-1">Биокосное вещество</p>
                                    <p class="text-sm">Вещество, образованное совместно живыми организмами и геологическими процессами (почва, донный ил)</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-center">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md inline-flex items-center">
                                <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f4a1.svg" class="w-10 h-10 mr-3" alt="Идея" />
                                <p class="text-indigo-700 dark:text-indigo-200">Важно понимать, что биосфера — это не просто сумма всех живых организмов, а целостная, саморегулирующаяся система, в которой происходит постоянный обмен веществом и энергией между живой и неживой природой.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Interactive quiz -->
                    <div class="bg-purple-50 dark:bg-purple-900/20 rounded-2xl p-5 shadow-md child-font">
                        <h3 class="text-xl font-bold text-purple-800 dark:text-purple-300 mb-3">Проверь свои знания!</h3>
                        <p class="text-purple-700 dark:text-purple-200 mb-4">Ответь на вопросы о биосфере:</p>
                        
                        <div class="space-y-6">
                            <div class="quiz-question">
                                <p class="font-semibold mb-3">1. Кто считается основоположником современного учения о биосфере?</p>
                                <div class="space-y-2">
                                    <div class="quiz-option p-3 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="q1" value="a" class="mr-3 h-4 w-4">
                                            <span>Чарльз Дарвин</span>
                                        </label>
                                    </div>
                                    <div class="quiz-option p-3 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="q1" value="b" class="mr-3 h-4 w-4">
                                            <span>В.И. Вернадский</span>
                                        </label>
                                    </div>
                                    <div class="quiz-option p-3 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="q1" value="c" class="mr-3 h-4 w-4">
                                            <span>Александр фон Гумбольдт</span>
                                        </label>
                                    </div>
                                    <div class="quiz-option p-3 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="q1" value="d" class="mr-3 h-4 w-4">
                                            <span>Эрнст Геккель</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="quiz-question">
                                <p class="font-semibold mb-3">2. Какой из компонентов НЕ входит в структуру биосферы по Вернадскому?</p>
                                <div class="space-y-2">
                                    <div class="quiz-option p-3 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="q2" value="a" class="mr-3 h-4 w-4">
                                            <span>Живое вещество</span>
                                        </label>
                                    </div>
                                    <div class="quiz-option p-3 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="q2" value="b" class="mr-3 h-4 w-4">
                                            <span>Биогенное вещество</span>
                                        </label>
                                    </div>
                                    <div class="quiz-option p-3 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="q2" value="c" class="mr-3 h-4 w-4">
                                            <span>Биокосное вещество</span>
                                        </label>
                                    </div>
                                    <div class="quiz-option p-3 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="q2" value="d" class="mr-3 h-4 w-4">
                                            <span>Техногенное вещество</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="quiz-question">
                                <p class="font-semibold mb-3">3. До какой примерно высоты в атмосфере распространяется биосфера?</p>
                                <div class="space-y-2">
                                    <div class="quiz-option p-3 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="q3" value="a" class="mr-3 h-4 w-4">
                                            <span>До 100 км (граница космоса)</span>
                                        </label>
                                    </div>
                                    <div class="quiz-option p-3 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="q3" value="b" class="mr-3 h-4 w-4">
                                            <span>До 20-25 км (озоновый слой)</span>
                                        </label>
                                    </div>
                                    <div class="quiz-option p-3 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="q3" value="c" class="mr-3 h-4 w-4">
                                            <span>До 5 км (высота высоких гор)</span>
                                        </label>
                                    </div>
                                    <div class="quiz-option p-3 rounded-lg">
                                        <label class="flex items-center">
                                            <input type="radio" name="q3" value="d" class="mr-3 h-4 w-4">
                                            <span>До 1 км (нижние слои атмосферы)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 text-center">
                            <button id="check-section1-quiz" class="child-button px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-medium transition-all duration-300">
                                Проверить ответы
                            </button>
                            <div id="section1-quiz-result" class="mt-4 hidden"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Section 2: Functions and Cycles of the Biosphere -->
                <div id="section-2" class="lesson-section bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg mb-10">
                    <div class="text-center mb-8">
                        <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/267b.svg" class="w-16 h-16 mb-2 mx-auto animate-spin-slow" alt="Переработка" />
                        <h2 class="text-3xl font-bold child-font text-5D5CDE mb-2">Функции и круговороты в биосфере</h2>
                        <p class="text-lg text-gray-700 dark:text-gray-300">Изучаем энергетические и вещественные процессы в биосфере</p>
                    </div>
                    
                    <!-- Functions of the biosphere -->
                    <div class="bg-teal-50 dark:bg-teal-900/20 rounded-2xl p-5 mb-8 child-font">
                        <h3 class="text-xl font-bold text-teal-800 dark:text-teal-300 mb-3">Основные функции биосферы</h3>
                        <p class="text-teal-700 dark:text-teal-200 mb-4">Биосфера выполняет ряд важнейших функций, обеспечивающих существование жизни на Земле и поддержание глобального экологического равновесия:</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-teal-100 dark:bg-teal-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600 dark:text-teal-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-teal-800 dark:text-teal-300">Энергетическая функция</h4>
                                </div>
                                <p class="text-teal-700 dark:text-teal-200 text-sm">Поглощение солнечной энергии зелёными растениями в процессе фотосинтеза и преобразование её в энергию химических связей органических веществ. Это первичный источник энергии для большинства экосистем.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-teal-100 dark:bg-teal-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600 dark:text-teal-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-teal-800 dark:text-teal-300">Газовая функция</h4>
                                </div>
                                <p class="text-teal-700 dark:text-teal-200 text-sm">Регулирование газового состава атмосферы через фотосинтез (поглощение CO₂, выделение O₂) и дыхание (поглощение O₂, выделение CO₂). Живые организмы создали и поддерживают современный состав атмосферы.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-teal-100 dark:bg-teal-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600 dark:text-teal-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-teal-800 dark:text-teal-300">Окислительно-восстановительная функция</h4>
                                </div>
                                <p class="text-teal-700 dark:text-teal-200 text-sm">Химические преобразования веществ с изменением степени окисления элементов благодаря метаболической активности организмов (особенно микроорганизмов). Играет важную роль в геохимических процессах.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-teal-100 dark:bg-teal-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600 dark:text-teal-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-teal-800 dark:text-teal-300">Концентрационная функция</h4>
                                </div>
                                <p class="text-teal-700 dark:text-teal-200 text-sm">Избирательное накопление элементов из окружающей среды. Живые организмы концентрируют в своём теле определённые химические элементы, которые затем включаются в биогеохимические циклы.</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-teal-100 dark:bg-teal-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600 dark:text-teal-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-teal-800 dark:text-teal-300">Деструктивная функция</h4>
                                </div>
                                <p class="text-teal-700 dark:text-teal-200 text-sm">Разложение отмерших организмов и органических остатков до простых неорганических соединений. Осуществляется в основном редуцентами (бактериями и грибами) и обеспечивает возвращение элементов в круговорот.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-teal-100 dark:bg-teal-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600 dark:text-teal-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-teal-800 dark:text-teal-300">Информационная функция</h4>
                                </div>
                                <p class="text-teal-700 dark:text-teal-200 text-sm">Накопление, хранение и передача генетической информации. Эволюция живых систем привела к созданию и усложнению информационных кодов (генетический код, нервная система, человеческий разум).</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Biogeochemical cycles -->
                    <div class="bg-amber-50 dark:bg-amber-900/20 rounded-2xl p-5 mb-8 child-font">
                        <h3 class="text-xl font-bold text-amber-800 dark:text-amber-300 mb-3">Биогеохимические круговороты в биосфере</h3>
                        <p class="text-amber-700 dark:text-amber-200 mb-4">Круговороты веществ в биосфере — это циклические процессы перемещения химических элементов между живыми организмами, атмосферой, гидросферой и литосферой. Они обеспечивают непрерывное использование элементов в природе.</p>
                        
                        <div class="mb-6">
                            <h4 class="font-semibold text-amber-800 dark:text-amber-300 mb-3">Особенности биогеохимических циклов:</h4>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md mb-4">
                                <ul class="list-disc list-inside space-y-2 text-amber-700 dark:text-amber-200">
                                    <li>Циклы состоят из резервуаров (места хранения веществ) и потоков (перемещения между резервуарами)</li>
                                    <li>В циклах участвуют как биотические (организмы), так и абиотические (физико-химические) компоненты</li>
                                    <li>Скорость круговоротов может меняться под влиянием природных и антропогенных факторов</li>
                                    <li>Человеческая деятельность часто нарушает естественные циклы, ускоряя одни потоки и замедляя другие</li>
                                </ul>
                            </div>
                        </div>
                        
                        <h4 class="font-semibold text-amber-800 dark:text-amber-300 mb-3">Основные биогеохимические циклы:</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-10 h-10 rounded-full bg-amber-100 dark:bg-amber-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <span class="font-bold text-amber-800 dark:text-amber-300">C</span>
                                    </div>
                                    <h4 class="font-semibold text-amber-800 dark:text-amber-300">Углеродный цикл</h4>
                                </div>
                                <p class="text-amber-700 dark:text-amber-200 text-sm mb-2">Основные компоненты: CO₂ в атмосфере, органические соединения в живых организмах, ископаемое топливо, карбонаты в горных породах, растворенный углерод в океане.</p>
                                <p class="text-amber-700 dark:text-amber-200 text-sm">Ключевые процессы: фотосинтез (поглощение CO₂), дыхание (выделение CO₂), разложение органики, горение, растворение/осаждение карбонатов.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-10 h-10 rounded-full bg-amber-100 dark:bg-amber-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <span class="font-bold text-amber-800 dark:text-amber-300">N</span>
                                    </div>
                                    <h4 class="font-semibold text-amber-800 dark:text-amber-300">Азотный цикл</h4>
                                </div>
                                <p class="text-amber-700 dark:text-amber-200 text-sm mb-2">Основные компоненты: N₂ в атмосфере, аммоний, нитраты, нитриты в почве и воде, органические соединения азота в живых организмах.</p>
                                <p class="text-amber-700 dark:text-amber-200 text-sm">Ключевые процессы: азотфиксация (перевод N₂ в доступные формы), нитрификация, денитрификация, аммонификация.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-10 h-10 rounded-full bg-amber-100 dark:bg-amber-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <span class="font-bold text-amber-800 dark:text-amber-300">P</span>
                                    </div>
                                    <h4 class="font-semibold text-amber-800 dark:text-amber-300">Фосфорный цикл</h4>
                                </div>
                                <p class="text-amber-700 dark:text-amber-200 text-sm mb-2">Основные компоненты: фосфаты в горных породах и почве, органические соединения фосфора в живых организмах, растворенные фосфаты в воде.</p>
                                <p class="text-amber-700 dark:text-amber-200 text-sm">Ключевые процессы: выветривание фосфатных пород, потребление растениями, перенос по пищевым цепям, выделение с экскрементами, разложение отмерших организмов.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-10 h-10 rounded-full bg-amber-100 dark:bg-amber-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <span class="font-bold text-amber-800 dark:text-amber-300">H₂O</span>
                                    </div>
                                    <h4 class="font-semibold text-amber-800 dark:text-amber-300">Круговорот воды</h4>
                                </div>
                                <p class="text-amber-700 dark:text-amber-200 text-sm mb-2">Основные компоненты: вода в океанах, реках, озерах, ледниках, подземных источниках, атмосфере, живых организмах.</p>
                                <p class="text-amber-700 dark:text-amber-200 text-sm">Ключевые процессы: испарение, конденсация, осадки, транспирация растений, поверхностный и подземный сток, потребление и выделение воды организмами.</p>
                            </div>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md flex items-center">
                            <div class="bg-amber-100 dark:bg-amber-900 p-2 rounded-full mr-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-amber-600 dark:text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-amber-800 dark:text-amber-300 mb-1">Важный факт</h4>
                                <p class="text-amber-700 dark:text-amber-200 text-sm">Нарушение биогеохимических циклов приводит к серьезным экологическим проблемам. Например, избыточное поступление соединений азота и фосфора в водоемы вызывает эвтрофикацию, а увеличение концентрации углекислого газа в атмосфере — глобальное потепление.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Interactive biogeochemical cycle game -->
                    <div class="bg-blue-50 dark:bg-blue-900/20 rounded-2xl p-5 mb-8 child-font">
                        <h3 class="text-xl font-bold text-blue-800 dark:text-blue-300 mb-3">Интерактивная игра: Биогеохимические циклы</h3>
                        <p class="text-blue-700 dark:text-blue-200 mb-6">Перетащи названия процессов к соответствующим биогеохимическим циклам:</p>
                        
                        <div class="cycle-elements" id="cycle-elements">
                            <!-- Elements will be generated by JavaScript -->
                        </div>
                        
                        <div class="cycle-game" id="cycle-game">
                            <!-- Drop zones will be generated by JavaScript -->
                        </div>
                        
                        <div class="text-center mt-6">
                            <button id="check-cycle-game" class="child-button px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                                Проверить ответы
                            </button>
                            <div id="cycle-game-result" class="mt-4 hidden"></div>
                        </div>
                    </div>
                    
                    <!-- Living matter and its properties -->
                    <div class="bg-purple-50 dark:bg-purple-900/20 rounded-2xl p-5 mb-8 shadow-md child-font">
                        <h3 class="text-xl font-bold text-purple-800 dark:text-purple-300 mb-3">Живое вещество биосферы и его свойства</h3>
                        <p class="text-purple-700 dark:text-purple-200 mb-4">Живое вещество — совокупность всех живых организмов биосферы. Несмотря на относительно малую массу (около 0,01% массы биосферы), именно живое вещество определяет основные процессы в биосфере.</p>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <h4 class="font-semibold text-purple-800 dark:text-purple-300 mb-2">Разнообразие форм</h4>
                                <p class="text-purple-700 dark:text-purple-200 text-sm">Живое вещество существует в форме миллионов видов организмов, приспособившихся к различным условиям среды — от глубоководных гидротерм до высокогорий.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <h4 class="font-semibold text-purple-800 dark:text-purple-300 mb-2">Высокая энергия</h4>
                                <p class="text-purple-700 dark:text-purple-200 text-sm">Живые организмы обладают запасом свободной энергии и используют её для поддержания своей структуры, роста и размножения.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <h4 class="font-semibold text-purple-800 dark:text-purple-300 mb-2">Химический состав</h4>
                                <p class="text-purple-700 dark:text-purple-200 text-sm">Живое вещество содержит те же химические элементы, что и неживая природа, но в других соотношениях. Основу составляют C, H, O, N, P, S.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <h4 class="font-semibold text-purple-800 dark:text-purple-300 mb-2">Способность к воспроизводству</h4>
                                <p class="text-purple-700 dark:text-purple-200 text-sm">Живое вещество обладает уникальной способностью к самовоспроизведению, что обеспечивает непрерывность жизни на Земле.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <h4 class="font-semibold text-purple-800 dark:text-purple-300 mb-2">Адаптация</h4>
                                <p class="text-purple-700 dark:text-purple-200 text-sm">Живые организмы способны адаптироваться к изменяющимся условиям среды благодаря процессам эволюции.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <h4 class="font-semibold text-purple-800 dark:text-purple-300 mb-2">Активность</h4>
                                <p class="text-purple-700 dark:text-purple-200 text-sm">Живое вещество активно взаимодействует с окружающей средой, преобразуя её и создавая условия для существования новых форм жизни.</p>
                            </div>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                            <h4 class="font-semibold text-purple-800 dark:text-purple-300 mb-2">Биогеохимические функции живого вещества по Вернадскому</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                                <div>
                                    <ul class="list-disc list-inside space-y-1 text-purple-700 dark:text-purple-200 text-sm">
                                        <li>Газовая (регулирование газового состава атмосферы)</li>
                                        <li>Концентрационная (избирательное накопление элементов)</li>
                                        <li>Окислительно-восстановительная (химические преобразования)</li>
                                        <li>Биохимическая (синтез и разложение органических веществ)</li>
                                    </ul>
                                </div>
                                <div>
                                    <ul class="list-disc list-inside space-y-1 text-purple-700 dark:text-purple-200 text-sm">
                                        <li>Деструктивная (разложение отмерших организмов)</li>
                                        <li>Средообразующая (изменение физических и химических параметров среды)</li>
                                        <li>Транспортная (перенос веществ в пространстве)</li>
                                        <li>Информационная (накопление и передача генетической информации)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Energy flow -->
                    <div class="bg-green-50 dark:bg-green-900/20 rounded-2xl p-5 shadow-md child-font">
                        <h3 class="text-xl font-bold text-green-800 dark:text-green-300 mb-3">Энергетический поток в биосфере</h3>
                        <p class="text-green-700 dark:text-green-200 mb-4">Энергетический поток в биосфере — это движение энергии от Солнца через экосистемы. В отличие от круговорота веществ, энергия не совершает круговорот — она постоянно поступает от Солнца и постепенно рассеивается в виде тепла.</p>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md mb-6">
                            <h4 class="font-semibold text-green-800 dark:text-green-300 mb-2">Основные этапы потока энергии:</h4>
                            <ol class="list-decimal list-inside space-y-2 text-green-700 dark:text-green-200 text-sm">
                                <li><strong>Поглощение солнечной энергии:</strong> Из всей энергии, поступающей от Солнца к Земле, только около 1% используется растениями для фотосинтеза.</li>
                                <li><strong>Первичная продукция:</strong> Фотосинтезирующие организмы преобразуют солнечную энергию в энергию химических связей органических веществ.</li>
                                <li><strong>Передача по пищевым цепям:</strong> При переходе с одного трофического уровня на другой сохраняется только 10-20% энергии, остальная часть рассеивается в виде тепла.</li>
                                <li><strong>Дыхание и разложение:</strong> Организмы используют часть энергии для жизнедеятельности, а остальная энергия возвращается в окружающую среду в виде тепла.</li>
                            </ol>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md mb-6">
                            <h4 class="font-semibold text-green-800 dark:text-green-300 mb-2">Пирамида энергии в экосистеме:</h4>
                            <div class="relative w-full h-40 flex flex-col justify-center items-center mb-3">
                                <div class="w-1/5 h-8 bg-green-900 dark:bg-green-700 flex items-center justify-center text-white rounded-t-lg">Консументы III</div>
                                <div class="w-2/5 h-8 bg-green-800 dark:bg-green-600 flex items-center justify-center text-white">Консументы II</div>
                                <div class="w-3/5 h-8 bg-green-700 dark:bg-green-500 flex items-center justify-center text-white">Консументы I</div>
                                <div class="w-4/5 h-8 bg-green-500 dark:bg-green-400 flex items-center justify-center text-white rounded-b-lg">Продуценты</div>
                            </div>
                            <p class="text-green-700 dark:text-green-200 text-sm">Пирамида энергии отражает закон экологии: при переходе от нижнего трофического уровня к верхнему количество энергии уменьшается. Это ограничивает число уровней в пищевой цепи и количество крупных хищников.</p>
                        </div>
                        
                        <div class="flex items-center justify-center">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600 dark:text-green-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                                <p class="text-green-700 dark:text-green-200">Поток энергии в биосфере — это "односторонняя улица": энергия постоянно поступает от Солнца и постепенно рассеивается. Для поддержания жизни необходим постоянный приток новой энергии.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Section 3: Human Impact and Sustainable Development -->
                <div id="section-3" class="lesson-section bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg mb-10">
                    <div class="text-center mb-8">
                        <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f30e.svg" class="w-16 h-16 mb-2 mx-auto animate-bounce-slow" alt="Земля" />
                        <h2 class="text-3xl font-bold child-font text-5D5CDE mb-2">Антропогенное воздействие и устойчивое развитие</h2>
                        <p class="text-lg text-gray-700 dark:text-gray-300">Анализируем влияние человека на биосферу и пути решения глобальных экологических проблем</p>
                    </div>
                    
                    <!-- Anthropogenic changes to the biosphere -->
                    <div class="bg-rose-50 dark:bg-rose-900/20 rounded-2xl p-5 mb-8 child-font">
                        <h3 class="text-xl font-bold text-rose-800 dark:text-rose-300 mb-3">Антропогенные изменения биосферы</h3>
                        <p class="text-rose-700 dark:text-rose-200 mb-4">Человечество оказывает всё возрастающее воздействие на биосферу, что выражается в значительных изменениях всех её компонентов:</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-rose-100 dark:bg-rose-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600 dark:text-rose-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-rose-800 dark:text-rose-300">Изменение газового состава атмосферы</h4>
                                </div>
                                <p class="text-rose-700 dark:text-rose-200 text-sm">Увеличение концентрации парниковых газов (CO₂, CH₄, N₂O), истощение озонового слоя, загрязнение воздуха аэрозолями и токсичными веществами. Это приводит к изменению климата, кислотным дождям, смогу.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-rose-100 dark:bg-rose-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600 dark:text-rose-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-rose-800 dark:text-rose-300">Загрязнение гидросферы</h4>
                                </div>
                                <p class="text-rose-700 dark:text-rose-200 text-sm">Промышленные и бытовые стоки, нефтяные разливы, пластиковое загрязнение, химические удобрения и пестициды. Это вызывает эвтрофикацию водоёмов, гибель водных организмов, сокращение запасов питьевой воды.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-rose-100 dark:bg-rose-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600 dark:text-rose-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-rose-800 dark:text-rose-300">Деградация литосферы</h4>
                                </div>
                                <p class="text-rose-700 dark:text-rose-200 text-sm">Добыча полезных ископаемых, деградация и эрозия почв, опустынивание, захоронение отходов. Это приводит к сокращению плодородных земель, нарушению природных ландшафтов, загрязнению подземных вод.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-rose-100 dark:bg-rose-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600 dark:text-rose-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-rose-800 dark:text-rose-300">Нарушение биогеохимических циклов</h4>
                                </div>
                                <p class="text-rose-700 dark:text-rose-200 text-sm">Избыточное поступление азота и фосфора в экосистемы, нарушение углеродного цикла, изменение круговорота воды. Это ведёт к разбалансировке природных процессов, климатическим изменениям.</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-rose-100 dark:bg-rose-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600 dark:text-rose-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-rose-800 dark:text-rose-300">Сокращение биоразнообразия</h4>
                                </div>
                                <p class="text-rose-700 dark:text-rose-200 text-sm">Вырубка лесов, осушение болот, уничтожение естественных мест обитания, чрезмерный промысел, инвазивные виды. Это приводит к исчезновению видов, упрощению экосистем, снижению их устойчивости.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-rose-100 dark:bg-rose-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600 dark:text-rose-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-rose-800 dark:text-rose-300">Изменение энергетического баланса</h4>
                                </div>
                                <p class="text-rose-700 dark:text-rose-200 text-sm">Использование ископаемого топлива, нарушение теплового баланса планеты, урбанизация и создание "тепловых островов". Это вызывает изменение климата, экстремальные погодные явления, смещение климатических зон.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Concept of the noosphere -->
                    <div class="bg-blue-50 dark:bg-blue-900/20 rounded-2xl p-5 mb-8 child-font">
                        <h3 class="text-xl font-bold text-blue-800 dark:text-blue-300 mb-3">Концепция ноосферы</h3>
                        <p class="text-blue-700 dark:text-blue-200 mb-4">Понятие «ноосфера» (от греч. «ноос» — разум) было предложено французским философом Э. Леруа и развито В.И. Вернадским. Это следующий этап эволюции биосферы, в котором разумная деятельность человека становится определяющим фактором её развития.</p>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-5 shadow-md mb-6">
                            <h4 class="font-semibold text-blue-800 dark:text-blue-300 mb-3">Эволюция биосферы по Вернадскому:</h4>
                            <div class="relative">
                                <div class="w-full h-2 bg-blue-200 dark:bg-blue-900 rounded-full mb-8 relative">
                                    <div class="absolute -top-1 left-0 w-4 h-4 bg-blue-500 rounded-full"></div>
                                    <div class="absolute -top-1 left-1/3 w-4 h-4 bg-blue-500 rounded-full"></div>
                                    <div class="absolute -top-1 left-2/3 w-4 h-4 bg-blue-500 rounded-full"></div>
                                    <div class="absolute -top-1 right-0 w-4 h-4 bg-blue-500 rounded-full"></div>
                                </div>
                                <div class="grid grid-cols-4 gap-2 text-center">
                                    <div>
                                        <p class="font-medium text-blue-800 dark:text-blue-300 mb-1">Геосфера</p>
                                        <p class="text-xs text-blue-700 dark:text-blue-200">Неживая материя до появления жизни</p>
                                    </div>
                                    <div>
                                        <p class="font-medium text-blue-800 dark:text-blue-300 mb-1">Биосфера</p>
                                        <p class="text-xs text-blue-700 dark:text-blue-200">Развитие и распространение жизни</p>
                                    </div>
                                    <div>
                                        <p class="font-medium text-blue-800 dark:text-blue-300 mb-1">Техносфера</p>
                                        <p class="text-xs text-blue-700 dark:text-blue-200">Активное преобразование природы человеком</p>
                                    </div>
                                    <div>
                                        <p class="font-medium text-blue-800 dark:text-blue-300 mb-1">Ноосфера</p>
                                        <p class="text-xs text-blue-700 dark:text-blue-200">Гармоничное развитие природы и общества</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <h4 class="font-semibold text-blue-800 dark:text-blue-300 mb-2">Особенности ноосферы</h4>
                                <ul class="list-disc list-inside space-y-1 text-blue-700 dark:text-blue-200 text-sm">
                                    <li>Человеческий разум становится ведущей геологической силой</li>
                                    <li>Управляемое, гармоничное развитие системы «человек-природа»</li>
                                    <li>Научное управление природными процессами</li>
                                    <li>Сохранение биоразнообразия и экосистем</li>
                                    <li>Оптимизация воздействия общества на биосферу</li>
                                </ul>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <h4 class="font-semibold text-blue-800 dark:text-blue-300 mb-2">Условия перехода к ноосфере</h4>
                                <ul class="list-disc list-inside space-y-1 text-blue-700 dark:text-blue-200 text-sm">
                                    <li>Единство человечества и преодоление войн</li>
                                    <li>Равенство людей всех рас и религий</li>
                                    <li>Повышение роли науки в управлении обществом</li>
                                    <li>Рациональное преобразование природы Земли</li>
                                    <li>Увеличение доли возобновляемых источников энергии</li>
                                    <li>Свобода научного творчества и мысли</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md flex items-center">
                            <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f9e0.svg" class="w-12 h-12 mr-3" alt="Мозг" />
                            <p class="text-blue-700 dark:text-blue-200">Идея ноосферы подчеркивает огромную ответственность человека за дальнейшую эволюцию биосферы. Вернадский был оптимистом и верил, что человеческий разум найдет пути гармоничного сосуществования с природой, но современные экологические проблемы показывают, что переход к подлинной ноосфере ещё далек от завершения.</p>
                        </div>
                    </div>
                    
                    <!-- Sustainable development -->
                    <div class="bg-emerald-50 dark:bg-emerald-900/20 rounded-2xl p-5 mb-8 child-font">
                        <h3 class="text-xl font-bold text-emerald-800 dark:text-emerald-300 mb-3">Устойчивое развитие биосферы</h3>
                        <p class="text-emerald-700 dark:text-emerald-200 mb-4">Устойчивое развитие — это развитие, которое удовлетворяет потребности настоящего времени, но не ставит под угрозу способность будущих поколений удовлетворять свои потребности. Оно направлено на сохранение биосферы и обеспечение благополучия людей.</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600 dark:text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-emerald-800 dark:text-emerald-300">Экономическая устойчивость</h4>
                                </div>
                                <ul class="list-disc list-inside space-y-1 text-emerald-700 dark:text-emerald-200 text-sm">
                                    <li>Повышение эффективности использования ресурсов</li>
                                    <li>Развитие возобновляемой энергетики</li>
                                    <li>Внедрение замкнутых циклов производства</li>
                                    <li>Зелёная экономика и ответственное потребление</li>
                                </ul>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600 dark:text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-emerald-800 dark:text-emerald-300">Социальная устойчивость</h4>
                                </div>
                                <ul class="list-disc list-inside space-y-1 text-emerald-700 dark:text-emerald-200 text-sm">
                                    <li>Обеспечение базовых потребностей всех людей</li>
                                    <li>Уменьшение социального неравенства</li>
                                    <li>Повышение уровня образования и здравоохранения</li>
                                    <li>Развитие местных сообществ и культур</li>
                                </ul>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                                <div class="flex items-center mb-2">
                                    <div class="w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-900 flex items-center justify-center mr-3 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600 dark:text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-semibold text-emerald-800 dark:text-emerald-300">Экологическая устойчивость</h4>
                                </div>
                                <ul class="list-disc list-inside space-y-1 text-emerald-700 dark:text-emerald-200 text-sm">
                                    <li>Снижение загрязнения и деградации экосистем</li>
                                    <li>Сохранение биоразнообразия</li>
                                    <li>Устойчивое использование возобновляемых ресурсов</li>
                                    <li>Контроль климатических изменений</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md mb-6">
                            <h4 class="font-semibold text-emerald-800 dark:text-emerald-300 mb-2">Цели устойчивого развития ООН</h4>
                            <p class="text-emerald-700 dark:text-emerald-200 text-sm mb-3">В 2015 году ООН приняла 17 Целей устойчивого развития (ЦУР), которые должны быть достигнуты к 2030 году. Они направлены на решение глобальных проблем человечества и сохранение биосферы:</p>
                            
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                                <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-lg p-2 text-center">
                                    <p class="text-xs font-medium">Ликвидация нищеты</p>
                                </div>
                                <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-lg p-2 text-center">
                                    <p class="text-xs font-medium">Ликвидация голода</p>
                                </div>
                                <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-lg p-2 text-center">
                                    <p class="text-xs font-medium">Хорошее здоровье</p>
                                </div>
                                <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-lg p-2 text-center">
                                    <p class="text-xs font-medium">Качественное образование</p>
                                </div>
                                <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-lg p-2 text-center">
                                    <p class="text-xs font-medium">Чистая вода и санитария</p>
                                </div>
                                <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-lg p-2 text-center">
                                    <p class="text-xs font-medium">Недорогая чистая энергия</p>
                                </div>
                                <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-lg p-2 text-center">
                                    <p class="text-xs font-medium">Борьба с изменением климата</p>
                                </div>
                                <div class="bg-emerald-50 dark:bg-emerald-900/30 rounded-lg p-2 text-center">
                                    <p class="text-xs font-medium">Сохранение экосистем</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-center">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md inline-flex items-center max-w-2xl">
                                <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f4a1.svg" class="w-12 h-12 mr-3" alt="Идея" />
                                <p class="text-emerald-700 dark:text-emerald-200">Устойчивое развитие — это модель развития цивилизации, которая позволит сохранить биосферу для будущих поколений. Она требует перехода от стихийного воздействия на природу к разумному, научно обоснованному управлению биосферными процессами, что соответствует идее ноосферы Вернадского.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Interactive scenario game -->
                    <div class="bg-indigo-50 dark:bg-indigo-900/20 rounded-2xl p-5 shadow-md child-font">
                        <h3 class="text-xl font-bold text-indigo-800 dark:text-indigo-300 mb-3">Интерактивная игра: Сценарии развития биосферы</h3>
                        <p class="text-indigo-700 dark:text-indigo-200 mb-4">Попробуй принять решения, которые помогут перейти к устойчивому развитию биосферы.</p>
                        
                        <div id="scenario-game" class="scenario-container">
                            <div class="scenario-header">
                                Сценарий 1: Энергетика будущего
                            </div>
                            <div class="scenario-content">
                                <p class="text-indigo-700 dark:text-indigo-200 mb-4">Мировая экономика требует всё больше энергии. Какой путь развития энергетики ты бы рекомендовал?</p>
                                
                                <div class="space-y-3" id="scenario-options">
                                    <div class="scenario-option" data-value="fossil">
                                        <div class="font-medium mb-1">Продолжить развитие традиционной энергетики</div>
                                        <p class="text-sm text-gray-700 dark:text-gray-300">Модернизация угольных, газовых и атомных электростанций с внедрением более эффективных технологий и систем улавливания выбросов.</p>
                                    </div>
                                    
                                    <div class="scenario-option" data-value="renewable">
                                        <div class="font-medium mb-1">Переход на возобновляемые источники энергии</div>
                                        <p class="text-sm text-gray-700 dark:text-gray-300">Масштабное развитие солнечной, ветровой, геотермальной и других видов возобновляемой энергетики, создание умных энергосетей.</p>
                                    </div>
                                    
                                    <div class="scenario-option" data-value="mixed">
                                        <div class="font-medium mb-1">Сбалансированный энергетический микс</div>
                                        <p class="text-sm text-gray-700 dark:text-gray-300">Постепенное увеличение доли возобновляемых источников при сохранении атомной энергетики и природного газа как переходного топлива.</p>
                                    </div>
                                </div>
                                
                                <div id="scenario-1-feedback" class="scenario-feedback mt-4"></div>
                                
                                <div class="text-center mt-4">
                                    <button id="scenario-next" class="child-button px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition-all duration-300 hidden">
                                        Следующий сценарий
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div id="scenario-final" class="mt-4 hidden"></div>
                    </div>
                </div>
            </div>
            
            <!-- Completion section -->
            <div id="lesson-complete" class="hidden max-w-4xl mx-auto text-center">
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg">
                    <div class="flex justify-center mb-6">
                        <div class="relative">
                            <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f3c6.svg" class="w-20 h-20 animate-bounce-slow" alt="Кубок" />
                        </div>
                    </div>
                    
                    <h2 class="text-3xl font-bold child-font text-5D5CDE mb-3">Поздравляем!</h2>
                    <p class="text-xl text-gray-700 dark:text-gray-300 mb-6">Ты прошел урок "Биосферный уровень организации живого"!</p>
                    
                    <div class="flex justify-center space-x-4 mb-10">
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 text-center">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Ты получил</p>
                            <div class="flex items-center justify-center">
                                <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/2b50.svg" class="w-8 h-8 mr-2" alt="Звезда" />
                                <p class="text-xl font-bold text-yellow-600 dark:text-yellow-500"><?php echo $lessonData['xp_reward']; ?> XP</p>
                            </div>
                        </div>
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 text-center">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">И ещё</p>
                            <div class="flex items-center justify-center">
                                <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/1f4a7.svg" class="w-8 h-8 mr-2" alt="Капля" />
                                <p class="text-xl font-bold text-blue-600 dark:text-blue-500">20 эко-очков</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                        <a href="eco_test.php?id=<?php echo $lessonData['id']; ?>" class="child-button px-8 py-3 bg-5D5CDE text-gray rounded-full shadow-md hover:shadow-lg font-medium transition-all duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Пройти тест
                        </a>
                        <a href="eco_lessons.php" class="child-button px-8 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-full shadow-md hover:shadow-lg font-medium transition-all duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                            К другим урокам
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Confetti container for completion animation -->
    <div id="confetti-container" class="confetti-container"></div>

    <!-- Reward Modal (shows on lesson completion) -->
    <div id="reward-modal" class="reward-modal">
        <div class="reward-content">
            <div class="reward-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold mb-3">Отличная работа!</h2>
            <p class="mb-6">Ты успешно завершил этап урока и получаешь дополнительные очки!</p>
            <div class="flex justify-center mb-6">
                <div class="flex items-center mx-2">
                    <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/svg/2b50.svg" class="w-6 h-6 mr-1" alt="Звезда" />
                    <span class="font-bold">+30 XP</span>
                </div>
            </div>
            <button id="reward-continue" class="child-button py-2 px-6 bg-5D5CDE text-white rounded-lg transition-all duration-300">Продолжить</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lesson configuration
            const lessonId = <?php echo $lessonData['id']; ?>;
            let currentSection = 1;
            const totalSections = 3;
            // Initialize with saved section progress values
            let sectionProgress = [
                <?php echo $section1Progress; ?>, 
                <?php echo $section2Progress; ?>, 
                <?php echo $section3Progress; ?>
            ]; 

            let lessonCompleted = <?php echo ($currentProgress >= 100) ? 'true' : 'false'; ?>;
            
            // UI Elements
            const prevButton = document.getElementById('prev-section');
            const nextButton = document.getElementById('next-section');
            const progressBar = document.getElementById('progress-bar-fill');
            const progressPercent = document.getElementById('progress-percent');
            const confettiContainer = document.getElementById('confetti-container');
            const rewardModal = document.getElementById('reward-modal');
            const rewardContinue = document.getElementById('reward-continue');
            const lessonComplete = document.getElementById('lesson-complete');
            const lessonContainer = document.getElementById('lesson-container');
            
            // Set initial section based on saved progress
            if ('<?php echo $lastPosition; ?>' !== '') {
                currentSection = parseInt('<?php echo $lastPosition; ?>') || 1;
                
                // Make sure they can't skip ahead if they haven't completed previous sections
                // But allow them to continue where they left off if they had already made progress
                if (currentSection > 1 && sectionProgress[0] < 33 && sectionProgress[1] === 0) {
                    currentSection = 1;
                }
                
                if (currentSection > 2 && sectionProgress[1] < 33 && sectionProgress[2] === 0) {
                    currentSection = 2;
                }
                
                // Show the current section
                showSection(currentSection);
            }
            
            // If lesson is already completed, show the completion screen
            if (lessonCompleted) {
                showCompletionScreen();
            }
            
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

// Initialize theme on page load
initTheme();

// Theme Toggle Handler
document.getElementById('theme-toggle').addEventListener('click', () => {
    document.documentElement.classList.toggle('dark');
    // Save theme preference to localStorage
    if (document.documentElement.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
    // Update Three.js background
    if (window.updateThreeBackground) {
        window.updateThreeBackground();
    }
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
    // Update Three.js background
    if (window.updateThreeBackground) {
        window.updateThreeBackground();
    }
});

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
            
            // Settings panel
            const settingsToggle = document.getElementById('settings-toggle');
            const settingsPanel = document.getElementById('settings-panel');
            const musicToggle = document.getElementById('music-toggle');
            const soundToggle = document.getElementById('sound-toggle');
            const textSizeDecrease = document.getElementById('text-size-decrease');
            const textSizeIncrease = document.getElementById('text-size-increase');
            const textSizeValue = document.getElementById('text-size-value');
            const bgMusic = document.getElementById('bg-music');
            const hoverSound = document.getElementById('hover-sound');
            const clickSound = document.getElementById('click-sound');
            const musicVolume = document.getElementById('music-volume');
            const soundVolume = document.getElementById('sound-volume');
            const musicVolumeValue = document.getElementById('music-volume-value');
            const soundVolumeValue = document.getElementById('sound-volume-value');

            // Initialize settings from localStorage
            let textSize = parseInt(localStorage.getItem('textSize')) || 100; // Default 100%
            let musicEnabled = localStorage.getItem('musicEnabled') === 'true';
            let soundEnabled = localStorage.getItem('soundEnabled') !== 'false'; // Default true
            let musicVolumeLevel = parseInt(localStorage.getItem('musicVolume')) || 50; // Default 50%
            let soundVolumeLevel = parseInt(localStorage.getItem('soundVolume')) || 50; // Default 50%

            // Apply saved settings
            applyTextSize();
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

            // Text size controls
            textSizeDecrease.addEventListener('click', () => {
                if (textSize > 80) { // Minimum size
                    textSize -= 10;
                    applyTextSize();
                    localStorage.setItem('textSize', textSize);
                }
                playSound(clickSound);
            });

            textSizeIncrease.addEventListener('click', () => {
                if (textSize < 150) { // Maximum size
                    textSize += 10;
                    applyTextSize();
                    localStorage.setItem('textSize', textSize);
                }
                playSound(clickSound);
            });

            // Apply text size changes
            function applyTextSize() {
                document.documentElement.style.setProperty('--text-size-factor', textSize / 100);
                textSizeValue.textContent = textSize + '%';
                
                // Adjust lesson container width based on text size
                const lessonContainer = document.getElementById('lesson-container');
                if (lessonContainer) {
                    const baseMaxWidth = 4; // 4xl in Tailwind is the base
                    const widthClass = `max-w-${Math.min(Math.max(Math.round(baseMaxWidth * textSize / 100), 3), 7)}xl`;
                    
                    // Remove existing max-w classes
                    lessonContainer.className = lessonContainer.className.replace(/max-w-\dxl/g, '');
                    // Add new max-w class
                    lessonContainer.classList.add(widthClass);
                }
            }

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

            // Initialize the biosphere diagram
            const layers = document.querySelectorAll('.layer');
            layers.forEach(layer => {
                layer.addEventListener('click', function() {
                    // Remove active class from all layers
                    layers.forEach(l => l.classList.remove('active'));
                    // Add active class to clicked layer
                    this.classList.add('active');
                });
            });

            // Section 1 - Quiz
            const checkSection1QuizBtn = document.getElementById('check-section1-quiz');
            const section1QuizResult = document.getElementById('section1-quiz-result');
            
            checkSection1QuizBtn.addEventListener('click', function() {
                const q1Answer = document.querySelector('input[name="q1"]:checked')?.value;
                const q2Answer = document.querySelector('input[name="q2"]:checked')?.value;
                const q3Answer = document.querySelector('input[name="q3"]:checked')?.value;
                
                // Check if all questions are answered
                if (!q1Answer || !q2Answer || !q3Answer) {
                    section1QuizResult.innerHTML = '<div class="bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-200 p-3 rounded-lg">Пожалуйста, ответь на все вопросы!</div>';
                    section1QuizResult.classList.remove('hidden');
                    return;
                }
                
                // Check answers (b, d, b are correct)
                let score = 0;
                if (q1Answer === 'b') score++;
                if (q2Answer === 'd') score++;
                if (q3Answer === 'b') score++;
                
                let resultHTML = '';
                if (score === 3) {
                    resultHTML = `
                        <div class="bg-green-100 dark:bg-green-900/30 p-4 rounded-lg">
                            <h4 class="font-bold text-green-800 dark:text-green-300 mb-2">Отлично! Все ответы верны!</h4>
                            <p class="text-green-700 dark:text-green-200">Ты хорошо усвоил основные понятия о биосфере.</p>
                        </div>
                    `;
                    
                    // Mark section 1 as completed if not already
                    if (sectionProgress[0] < 33) {
                        sectionProgress[0] = 33;
                        updateTotalProgress();
                    }
                } else if (score >= 1) {
                    resultHTML = `
                        <div class="bg-yellow-100 dark:bg-yellow-900/30 p-4 rounded-lg">
                            <h4 class="font-bold text-yellow-800 dark:text-yellow-300 mb-2">Неплохо! У тебя ${score} из 3 правильных ответов.</h4>
                            <p class="text-yellow-700 dark:text-yellow-200">Правильные ответы: 1-б (В.И. Вернадский), 2-г (Техногенное вещество), 3-б (До 20-25 км).</p>
                        </div>
                    `;
                } else {
                    resultHTML = `
                        <div class="bg-red-100 dark:bg-red-900/30 p-4 rounded-lg">
                            <h4 class="font-bold text-red-800 dark:text-red-300 mb-2">Стоит повторить материал!</h4>
                            <p class="text-red-700 dark:text-red-200">Правильные ответы: 1-б (В.И. Вернадский), 2-г (Техногенное вещество), 3-б (До 20-25 км).</p>
                        </div>
                    `;
                }
                
                section1QuizResult.innerHTML = resultHTML;
                section1QuizResult.classList.remove('hidden');
            });
            
            // Section 2 - Biogeochemical Cycle Game
            const cycleElements = document.getElementById('cycle-elements');
            const cycleGame = document.getElementById('cycle-game');
            const checkCycleGameBtn = document.getElementById('check-cycle-game');
            const cycleGameResult = document.getElementById('cycle-game-result');
            
            // Cycle data
            const cycles = [
                {
                    id: 'carbon',
                    name: 'Углеродный цикл',
                    processes: ['photosynthesis', 'respiration', 'decomposition', 'combustion']
                },
                {
                    id: 'nitrogen',
                    name: 'Азотный цикл',
                    processes: ['fixation', 'nitrification', 'denitrification', 'ammonification']
                },
                {
                    id: 'phosphorus',
                    name: 'Фосфорный цикл',
                    processes: ['weathering', 'absorption', 'excretion', 'sedimentation']
                },
                {
                    id: 'water',
                    name: 'Круговорот воды',
                    processes: ['evaporation', 'condensation', 'precipitation', 'transpiration']
                }
            ];
            
            // Process labels
            const processLabels = {
                'photosynthesis': 'Фотосинтез',
                'respiration': 'Дыхание',
                'decomposition': 'Разложение',
                'combustion': 'Горение',
                'fixation': 'Азотфиксация',
                'nitrification': 'Нитрификация',
                'denitrification': 'Денитрификация',
                'ammonification': 'Аммонификация',
                'weathering': 'Выветривание',
                'absorption': 'Поглощение растениями',
                'excretion': 'Выделение животными',
                'sedimentation': 'Осаждение',
                'evaporation': 'Испарение',
                'condensation': 'Конденсация',
                'precipitation': 'Осадки',
                'transpiration': 'Транспирация'
            };
            
            // Initialize cycle game
            function initializeCycleGame() {
                // Create drop zones for cycles
                cycleGame.innerHTML = '';
                cycles.forEach(cycle => {
                    const cycleZone = document.createElement('div');
                    cycleZone.classList.add('cycle-drop-zone');
                    cycleZone.setAttribute('data-cycle', cycle.id);
                    cycleZone.innerHTML = `
                        <h4 class="font-semibold text-center mb-2">${cycle.name}</h4>
                        <div class="cycle-cards" data-cycle="${cycle.id}"></div>
                    `;
                    cycleGame.appendChild(cycleZone);
                });
                
                // Create elements to drag
                cycleElements.innerHTML = '';
                
                // Flatten and shuffle all processes
                let allProcesses = [];
                cycles.forEach(cycle => {
                    cycle.processes.forEach(process => {
                        allProcesses.push({
                            id: process,
                            label: processLabels[process],
                            cycleId: cycle.id
                        });
                    });
                });
                
                // Shuffle
                allProcesses = allProcesses.sort(() => Math.random() - 0.5);
                
                // Create element cards
                allProcesses.forEach(process => {
                    const card = document.createElement('div');
                    card.classList.add('cycle-card');
                    card.setAttribute('draggable', 'true');
                    card.setAttribute('data-process', process.id);
                    card.setAttribute('data-cycle', process.cycleId);
                    card.textContent = process.label;
                    cycleElements.appendChild(card);
                    
                    // Add drag events
                    card.addEventListener('dragstart', handleDragStart);
                    card.addEventListener('dragend', handleDragEnd);
                });
                
                // Add drop events to zones
                document.querySelectorAll('.cycle-drop-zone').forEach(zone => {
                    zone.addEventListener('dragover', handleDragOver);
                    zone.addEventListener('dragleave', handleDragLeave);
                    zone.addEventListener('drop', handleDrop);
                });
                
                // Disable check button initially
                checkCycleGameBtn.disabled = true;
            }
            
            // Drag and drop handlers
            function handleDragStart(e) {
                e.dataTransfer.setData('text/plain', e.target.getAttribute('data-process'));
                e.target.classList.add('dragging');
            }
            
            function handleDragEnd(e) {
                e.target.classList.remove('dragging');
            }
            
            function handleDragOver(e) {
                e.preventDefault();
                e.currentTarget.classList.add('hover');
            }
            
            function handleDragLeave(e) {
                e.currentTarget.classList.remove('hover');
            }
            
            function handleDrop(e) {
                e.preventDefault();
                e.currentTarget.classList.remove('hover');
                
                const processId = e.dataTransfer.getData('text/plain');
                const card = document.querySelector(`.cycle-card[data-process="${processId}"]`);
                
                if (card) {
                    const cardsContainer = e.currentTarget.querySelector('.cycle-cards');
                    cardsContainer.appendChild(card);
                    
                    // Enable check button
                    checkCycleGameBtn.disabled = false;
                }
            }
            
            // Check cycle game
            checkCycleGameBtn.addEventListener('click', function() {
                let correct = 0;
                let total = 0;
                
                document.querySelectorAll('.cycle-drop-zone').forEach(zone => {
                    const cycleId = zone.getAttribute('data-cycle');
                    const cards = zone.querySelectorAll('.cycle-card');
                    
                    cards.forEach(card => {
                        total++;
                        const cardCycleId = card.getAttribute('data-cycle');
                        
                        if (cardCycleId === cycleId) {
                            correct++;
                            card.style.borderColor = '#22c55e';
                            card.style.backgroundColor = 'rgba(34, 197, 94, 0.1)';
                        } else {
                            card.style.borderColor = '#ef4444';
                            card.style.backgroundColor = 'rgba(239, 68, 68, 0.1)';
                        }
                    });
                });
                
                let resultHTML = '';
                
                if (correct === total && total >= 8) {
                    resultHTML = `
                        <div class="bg-green-100 dark:bg-green-900/30 p-4 rounded-lg">
                            <h4 class="font-bold text-green-800 dark:text-green-300 mb-2">Отлично! Все процессы распределены правильно!</h4>
                            <p class="text-green-700 dark:text-green-200">Ты хорошо понимаешь биогеохимические циклы и их компоненты.</p>
                        </div>
                    `;
                    
                    // Mark section 2 as completed if not already
                    if (sectionProgress[1] < 33) {
                        sectionProgress[1] = 33;
                        updateTotalProgress();
                        showRewardModal();
                    }
                } else if (correct > total / 2) {
                    resultHTML = `
                        <div class="bg-yellow-100 dark:bg-yellow-900/30 p-4 rounded-lg">
                            <h4 class="font-bold text-yellow-800 dark:text-yellow-300 mb-2">Неплохо! ${correct} из ${total} процессов распределены верно.</h4>
                            <p class="text-yellow-700 dark:text-yellow-200">Обрати внимание на цветовую маркировку: зелёным отмечены правильно размещённые процессы, красным — неправильно.</p>
                        </div>
                    `;
                } else {
                    resultHTML = `
                        <div class="bg-amber-100 dark:bg-amber-900/30 p-4 rounded-lg">
                            <h4 class="font-bold text-amber-800 dark:text-amber-300 mb-2">Стоит повторить материал. ${correct} из ${total} процессов распределены верно.</h4>
                            <p class="text-amber-700 dark:text-amber-200">Внимательно изучи описания циклов и попробуй ещё раз.</p>
                        </div>
                    `;
                }
                
                cycleGameResult.innerHTML = resultHTML;
                cycleGameResult.classList.remove('hidden');
            });
            
            // Initialize cycle game on load
            initializeCycleGame();
            
            // Section 3 - Decision Scenario Game
            const scenarioGame = document.getElementById('scenario-game');
            const scenarioOptions = document.getElementById('scenario-options');
            const scenarioNext = document.getElementById('scenario-next');
            const scenarioFinal = document.getElementById('scenario-final');
            
            // Scenario data
            const scenarios = [
                {
                    id: 1,
                    title: 'Энергетика будущего',
                    description: 'Мировая экономика требует всё больше энергии. Какой путь развития энергетики ты бы рекомендовал?',
                    options: [
                        {
                            id: 'fossil',
                            title: 'Продолжить развитие традиционной энергетики',
                            description: 'Модернизация угольных, газовых и атомных электростанций с внедрением более эффективных технологий и систем улавливания выбросов.',
                            feedback: {
                                type: 'negative',
                                text: 'Хотя современные технологии позволяют снизить выбросы, продолжение использования ископаемого топлива не решает проблему изменения климата и истощения невозобновляемых ресурсов. Такой подход может дать краткосрочные экономические выгоды, но усугубит экологические проблемы в долгосрочной перспективе.'
                            }
                        },
                        {
                            id: 'renewable',
                            title: 'Переход на возобновляемые источники энергии',
                            description: 'Масштабное развитие солнечной, ветровой, геотермальной и других видов возобновляемой энергетики, создание умных энергосетей.',
                            feedback: {
                                type: 'positive',
                                text: 'Это устойчивый подход, который минимизирует выбросы парниковых газов и снижает нагрузку на биосферу. Возобновляемые источники энергии становятся всё более конкурентоспособными по цене. Однако переход требует значительных первоначальных инвестиций и решения проблемы прерывистой генерации.'
                            }
                        },
                        {
                            id: 'mixed',
                            title: 'Сбалансированный энергетический микс',
                            description: 'Постепенное увеличение доли возобновляемых источников при сохранении атомной энергетики и природного газа как переходного топлива.',
                            feedback: {
                                type: 'neutral',
                                text: 'Это прагматичный подход, который учитывает текущие экономические и технологические ограничения. Сбалансированный микс может обеспечить более плавный и экономически устойчивый переход, но требует чёткого плана по сокращению доли ископаемого топлива в долгосрочной перспективе.'
                            }
                        }
                    ]
                },
                {
                    id: 2,
                    title: 'Сохранение биоразнообразия',
                    description: 'В мире сохраняется тенденция к сокращению биоразнообразия. Какой подход к решению этой проблемы наиболее эффективен?',
                    options: [
                        {
                            id: 'reserves',
                            title: 'Создание большого числа заповедников и охраняемых территорий',
                            description: 'Значительное увеличение площади охраняемых территорий по всему миру, где будет запрещена любая хозяйственная деятельность.',
                            feedback: {
                                type: 'neutral',
                                text: 'Охраняемые территории играют важную роль в сохранении биоразнообразия, но этого недостаточно. Во-первых, многие виды мигрируют и не могут выжить в изолированных "островках". Во-вторых, такой подход может вызвать конфликты с местным населением, чьи экономические интересы не учитываются.'
                            }
                        },
                        {
                            id: 'sustainable',
                            title: 'Внедрение устойчивых методов природопользования',
                            description: 'Распространение экологически устойчивых методов ведения сельского и лесного хозяйства, рыболовства, создание экологических коридоров между природными зонами.',
                            feedback: {
                                type: 'positive',
                                text: 'Этот подход позволяет сочетать охрану природы с экономическим развитием. Устойчивое природопользование защищает экосистемы и их функции, сохраняет биоразнообразие на больших территориях и учитывает потребности местных сообществ. Однако требуется серьёзное изменение существующих практик и надёжная система контроля.'
                            }
                        },
                        {
                            id: 'technology',
                            title: 'Опора на технологические решения',
                            description: 'Развитие генной инженерии, создание банков генов, искусственных экосистем и других высокотехнологичных методов сохранения биоразнообразия.',
                            feedback: {
                                type: 'negative',
                                text: 'Хотя технологии могут быть полезны, они не могут заменить естественные экосистемы и их сложные взаимосвязи. Сохранение образцов ДНК или разведение видов в неволе не решает проблему разрушения местообитаний и нарушения экологических связей. Технологии должны дополнять, а не заменять охрану природы.'
                            }
                        }
                    ]
                },
                {
                    id: 3,
                    title: 'Развитие устойчивых городов',
                    description: 'К 2050 году около 70% населения будет жить в городах. Какой подход к развитию городской среды наиболее соответствует принципам устойчивого развития?',
                    options: [
                        {
                            id: 'compact',
                            title: 'Компактный город',
                            description: 'Высокоплотная застройка, развитие общественного транспорта, пешеходной и велосипедной инфраструктуры, смешанное использование территорий.',
                            feedback: {
                                type: 'positive',
                                text: 'Компактные города снижают потребление ресурсов, уменьшают загрязнение и сохраняют окружающие природные территории. Они повышают энергоэффективность и снижают выбросы парниковых газов за счёт сокращения потребности в личном транспорте. Однако важно сохранять достаточное количество зелёных зон и обеспечивать высокое качество городской среды.'
                            }
                        },
                        {
                            id: 'garden',
                            title: 'Город-сад',
                            description: 'Низкоплотная застройка с большим количеством зелёных насаждений, индивидуальные дома с приусадебными участками, децентрализованная инфраструктура.',
                            feedback: {
                                type: 'negative',
                                text: 'Хотя такой подход обеспечивает жителям больше пространства и контакт с природой, он приводит к разрастанию городов, увеличению потребления ресурсов и зависимости от личного автотранспорта. Это ведёт к фрагментации природных экосистем и повышенному экологическому следу.'
                            }
                        },
                        {
                            id: 'technocity',
                            title: 'Технологичный умный город',
                            description: 'Максимальное внедрение цифровых технологий, автоматизации и искусственного интеллекта для оптимизации потребления ресурсов и управления городской средой.',
                            feedback: {
                                type: 'neutral',
                                text: 'Умные технологии могут значительно повысить эффективность использования ресурсов и качество жизни в городах. Однако технологии сами по себе не решают проблемы пространственного планирования и экологической устойчивости. Оптимальный подход — сочетание компактной планировки с умными технологиями.'
                            }
                        }
                    ]
                }
            ];
            
            let currentScenario = 0;
            let scenarioScores = {
                positive: 0,
                neutral: 0,
                negative: 0
            };
            
            // Initialize scenario game
            function initializeScenarioGame() {
                // Set up scenario
                const scenario = scenarios[currentScenario];
                
                const scenarioHeader = document.querySelector('.scenario-header');
                const scenarioContent = document.querySelector('.scenario-content');
                
                scenarioHeader.textContent = scenario.title;
                
                const descriptionEl = document.createElement('p');
                descriptionEl.className = 'text-indigo-700 dark:text-indigo-200 mb-4';
                descriptionEl.textContent = scenario.description;
                
                const optionsContainer = document.createElement('div');
                optionsContainer.className = 'space-y-3';
                optionsContainer.id = 'scenario-options';
                
                scenario.options.forEach(option => {
                    const optionEl = document.createElement('div');
                    optionEl.className = 'scenario-option';
                    optionEl.setAttribute('data-value', option.id);
                    
                    const titleEl = document.createElement('div');
                    titleEl.className = 'font-medium mb-1';
                    titleEl.textContent = option.title;
                    
                    const descEl = document.createElement('p');
                    descEl.className = 'text-sm text-gray-700 dark:text-gray-300';
                    descEl.textContent = option.description;
                    
                    optionEl.appendChild(titleEl);
                    optionEl.appendChild(descEl);
                    optionsContainer.appendChild(optionEl);
                    
                    // Add click event
                    optionEl.addEventListener('click', function() {
                        handleScenarioOptionSelect(this);
                    });
                });
                
                // Clear previous content
                scenarioContent.innerHTML = '';
                scenarioContent.appendChild(descriptionEl);
                scenarioContent.appendChild(optionsContainer);
                
                // Add feedback div
                const feedbackEl = document.createElement('div');
                feedbackEl.id = `scenario-${scenario.id}-feedback`;
                feedbackEl.className = 'scenario-feedback mt-4';
                scenarioContent.appendChild(feedbackEl);
                
                // Add next button
                const buttonContainer = document.createElement('div');
                buttonContainer.className = 'text-center mt-4';
                
                const nextButton = document.createElement('button');
                nextButton.id = 'scenario-next';
                nextButton.className = 'child-button px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition-all duration-300 hidden';
                nextButton.textContent = currentScenario < scenarios.length - 1 ? 'Следующий сценарий' : 'Завершить игру';
                
                nextButton.addEventListener('click', function() {
                    if (currentScenario < scenarios.length - 1) {
                        currentScenario++;
                        initializeScenarioGame();
                    } else {
                        showScenarioFinalResult();
                    }
                });
                
                buttonContainer.appendChild(nextButton);
                scenarioContent.appendChild(buttonContainer);
            }
            
            // Handle option selection
            function handleScenarioOptionSelect(optionEl) {
                // Remove selected class from all options
                document.querySelectorAll('.scenario-option').forEach(option => {
                    option.classList.remove('selected');
                });
                
                // Add selected class to clicked option
                optionEl.classList.add('selected');
                
                // Show feedback
                const optionId = optionEl.getAttribute('data-value');
                const scenario = scenarios[currentScenario];
                const option = scenario.options.find(opt => opt.id === optionId);
                
                const feedbackEl = document.getElementById(`scenario-${scenario.id}-feedback`);
                feedbackEl.innerHTML = `
                    <div class="scenario-${option.feedback.type}">
                        <p class="text-sm">${option.feedback.text}</p>
                    </div>
                `;
                feedbackEl.classList.add('visible');
                
                // Track score
                scenarioScores[option.feedback.type]++;
                
                // Show next button
                document.getElementById('scenario-next').classList.remove('hidden');
                
                // Mark section 3 as progressively completed
                if (currentScenario === 0 && sectionProgress[2] < 10) {
                    sectionProgress[2] = 10;
                    updateTotalProgress();
                } else if (currentScenario === 1 && sectionProgress[2] < 20) {
                    sectionProgress[2] = 20;
                    updateTotalProgress();
                } else if (currentScenario === 2 && sectionProgress[2] < 33) {
                    sectionProgress[2] = 33;
                    updateTotalProgress();
                    
                    // If all sections completed, mark lesson as complete
                    if (calculateTotalProgress() >= 100) {
                        lessonCompleted = true;
                        setTimeout(() => {
                            showCompletionScreen();
                            createConfetti();
                        }, 1500);
                    }
                }
            }
            
            // Show final result
            function showScenarioFinalResult() {
                scenarioGame.classList.add('hidden');
                scenarioFinal.classList.remove('hidden');
                
                let resultMessage = '';
                if (scenarioScores.positive >= 2) {
                    resultMessage = 'Отлично! Твои решения в большинстве случаев соответствуют принципам устойчивого развития биосферы. Ты понимаешь важность баланса между экономическими, социальными и экологическими аспектами.';
                } else if (scenarioScores.positive + scenarioScores.neutral >= 2) {
                    resultMessage = 'Неплохо! Ты учитываешь экологические аспекты в своих решениях, но иногда стоит уделять больше внимания долгосрочным последствиям для биосферы.';
                } else {
                    resultMessage = 'Стоит пересмотреть подход к решению экологических проблем. Важно помнить, что устойчивое развитие требует баланса между потребностями человека и сохранением биосферы для будущих поколений.';
                }
                
                scenarioFinal.innerHTML = `
                    <div class="bg-indigo-50 dark:bg-indigo-900/20 rounded-2xl p-5 shadow-md child-font">
                        <h3 class="text-xl font-bold text-indigo-800 dark:text-indigo-300 mb-3">Результаты игры "Сценарии развития биосферы"</h3>
                        <p class="text-indigo-700 dark:text-indigo-200 mb-4">${resultMessage}</p>
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md text-center">
                                <div class="font-bold text-3xl text-green-600 dark:text-green-400">${scenarioScores.positive}</div>
                                <p class="text-sm">Устойчивые решения</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md text-center">
                                <div class="font-bold text-3xl text-yellow-600 dark:text-yellow-400">${scenarioScores.neutral}</div>
                                <p class="text-sm">Компромиссные решения</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md text-center">
                                <div class="font-bold text-3xl text-red-600 dark:text-red-400">${scenarioScores.negative}</div>
                                <p class="text-sm">Неустойчивые решения</p>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 rounded-xl p-4 shadow-md">
                            <h4 class="font-semibold text-indigo-800 dark:text-indigo-300 mb-2">Ключевые принципы устойчивого развития биосферы:</h4>
                            <ul class="list-disc list-inside space-y-1 text-indigo-700 dark:text-indigo-200 text-sm">
                                <li>Сохранение биоразнообразия и экосистемных функций</li>
                                <li>Сокращение выбросов парниковых газов и борьба с изменением климата</li>
                                <li>Эффективное использование ресурсов и снижение отходов</li>
                                <li>Поддержание здоровых биогеохимических циклов</li>
                                <li>Учёт прав и потребностей как настоящего, так и будущих поколений</li>
                            </ul>
                        </div>
                    </div>
                `;
            }
            
            // Initialize scenario game on load
            initializeScenarioGame();
            
            // Add interactive listeners to scenario options
            document.querySelectorAll('.scenario-option').forEach(option => {
                option.addEventListener('click', function() {
                    handleScenarioOptionSelect(this);
                });
            });
            
            // Reward modal
            rewardContinue.addEventListener('click', function() {
                rewardModal.classList.remove('active');
            });
            
            // Navigation between sections
            nextButton.addEventListener('click', function() {
                // Check if current section is completed before allowing to proceed
                if (currentSection === 1 && sectionProgress[0] < 33) {
                    alert('Сначала пройди тест в текущем разделе!');
                    return;
                }
                
                if (currentSection === 2 && sectionProgress[1] < 33) {
                    alert('Сначала заверши игру в текущем разделе!');
                    return;
                }
                
                if (currentSection < totalSections) {
                    currentSection++;
                    showSection(currentSection);
                    updateProgress();
                }
            });
            
            prevButton.addEventListener('click', function() {
                if (currentSection > 1) {
                    currentSection--;
                    showSection(currentSection);
                    updateProgress();
                }
            });
            
            // Show section
            function showSection(sectionNum) {
                // Hide all sections
                document.querySelectorAll('.lesson-section').forEach(section => {
                    section.classList.remove('active');
                });
                
                // Show current section
                document.getElementById(`section-${sectionNum}`).classList.add('active');
                
                // Update navigation buttons
                prevButton.disabled = (sectionNum === 1);
                prevButton.classList.toggle('opacity-50', sectionNum === 1);
                prevButton.classList.toggle('cursor-not-allowed', sectionNum === 1);
                
                nextButton.textContent = sectionNum === totalSections ? 'Завершить' : 'Вперед';
                
                // Update progress tracking
                updateLastPosition(sectionNum);
            }
            
            // Calculate total progress
            function calculateTotalProgress() {
                return Math.min(100, Math.round(sectionProgress.reduce((a, b) => a + b, 0) + 1));
            }
            
            // Update progress indicators
            function updateTotalProgress() {
                const totalProgress = calculateTotalProgress();
                progressPercent.textContent = totalProgress;
                progressBar.style.width = `${totalProgress}%`;
                
                // Update progress on server
                updateProgressOnServer(totalProgress);
            }
            
            // Update last position
            function updateLastPosition(position) {
                // Update last_position on server
                const formData = new FormData();
                formData.append('update_progress', '1');
                formData.append('lesson_id', lessonId);
                formData.append('progress', calculateTotalProgress());
                formData.append('last_position', position);
                
                fetch(window.location.href, {
                    method: 'POST',
                    body: formData
                });
            }
            
            // Update progress on server
            function updateProgressOnServer(progress) {
                const formData = new FormData();
                formData.append('update_progress', '1');
                formData.append('lesson_id', lessonId);
                formData.append('progress', progress);
                formData.append('last_position', currentSection);
                
                fetch(window.location.href, {
                    method: 'POST',
                    body: formData
                });
            }
            
            // Update progress
            function updateProgress() {
                updateTotalProgress();
            }
            
            // Show reward modal
            function showRewardModal() {
                rewardModal.classList.add('active');
            }
            
            // Show completion screen
            function showCompletionScreen() {
                lessonContainer.classList.add('hidden');
                lessonComplete.classList.remove('hidden');
                nextButton.classList.add('hidden');
                prevButton.classList.add('hidden');
            }
            
            // Create confetti animation
            function createConfetti() {
                for (let i = 0; i < 100; i++) {
                    const confetti = document.createElement('div');
                    confetti.classList.add('confetti');
                    confetti.style.left = `${Math.random() * 100}vw`;
                    confetti.style.animationDuration = `${Math.random() * 3 + 2}s`;
                    confetti.style.backgroundColor = getRandomColor();
                    confettiContainer.appendChild(confetti);
                    
                    // Remove confetti after animation
                    setTimeout(() => {
                        confetti.remove();
                    }, 5000);
                }
            }
            
            // Get random color for confetti
            function getRandomColor() {
                const colors = ['#5D5CDE', '#22c55e', '#eab308', '#ef4444', '#0ea5e9'];
                return colors[Math.floor(Math.random() * colors.length)];
            }
            
            // Function to play sound effects
            function playSound(sound) {
                if (soundEnabled && sound) {
                    // Reset the audio to the beginning
                    sound.currentTime = 0;
                    sound.play().catch(e => console.log("Sound play prevented:", e));
                }
            }
            
            // Add hover sound effects to buttons and interactive elements
            const interactiveElements = document.querySelectorAll('button, .quiz-option, .scenario-option, .settings-btn, .switch, .child-button');
            interactiveElements.forEach(element => {
                element.addEventListener('mouseenter', () => {
                    playSound(hoverSound);
                });
                
                element.addEventListener('click', () => {
                    playSound(clickSound);
                });
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
                
                // Color - use shades of blue for biosphere theme
                if (isDark) {
                    // Dark theme: brighter, more vibrant blues
                    colors[i3] = Math.random() * 0.2;             // R: Less red
                    colors[i3 + 1] = Math.random() * 0.3 + 0.1;   // G: Some green
                    colors[i3 + 2] = Math.random() * 0.6 + 0.2;   // B: More blue
                } else {
                    // Light theme: more subtle, lighter blues
                    colors[i3] = Math.random() * 0.2;             // R: Less red
                    colors[i3 + 1] = Math.random() * 0.4 + 0.2;   // G: More green
                    colors[i3 + 2] = Math.random() * 0.5 + 0.3;   // B: Lighter blue
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