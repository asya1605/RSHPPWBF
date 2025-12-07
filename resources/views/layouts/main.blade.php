<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'RSHP Universitas Airlangga')</title>

  <!-- ✅ Tailwind CSS CDN Resmi -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font modern -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

  <style>
    body { 
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      min-height: 100vh;
    }
    
    a, button { 
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .hover-up:hover { 
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    /* ========== ANIMATIONS ========== */
    @keyframes fadeIn {
      from { 
        opacity: 0;
        transform: translateY(20px);
      }
      to { 
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideDown {
      from { 
        opacity: 0;
        transform: translateY(-30px);
      }
      to { 
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideRight {
      from {
        opacity: 0;
        transform: translateX(-40px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes slideLeft {
      from {
        opacity: 0;
        transform: translateX(40px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes float {
      0%, 100% { 
        transform: translateY(0px);
      }
      50% { 
        transform: translateY(-15px);
      }
    }

    @keyframes pulse-glow {
      0%, 100% {
        box-shadow: 0 0 20px rgba(0, 191, 166, 0.4);
      }
      50% {
        box-shadow: 0 0 40px rgba(0, 191, 166, 0.6);
      }
    }

    @keyframes shimmer {
      0% {
        background-position: -1000px 0;
      }
      100% {
        background-position: 1000px 0;
      }
    }

    /* Animation Classes */
    .animate-fadeIn {
      animation: fadeIn 0.8s ease-out forwards;
    }

    .animate-slideDown {
      animation: slideDown 0.6s ease-out forwards;
    }

    .animate-slideRight {
      animation: slideRight 0.7s ease-out forwards;
    }

    .animate-slideLeft {
      animation: slideLeft 0.7s ease-out forwards;
    }

    .animate-float {
      animation: float 3s ease-in-out infinite;
    }

    .animate-pulse-glow {
      animation: pulse-glow 2s ease-in-out infinite;
    }

    /* Gradient Text */
    .gradient-text {
      background: linear-gradient(135deg, #002080 0%, #0066CC 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .gradient-text-gold {
      background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* Glassmorphism Effect */
    .glass {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* Custom Shadows */
    .shadow-3xl {
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .shadow-inner-lg {
      box-shadow: inset 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Button Hover Effects */
    .btn-gradient-primary {
      background: linear-gradient(135deg, #00BFA6 0%, #00D4B8 100%);
      position: relative;
      overflow: hidden;
    }

    .btn-gradient-primary::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: left 0.5s;
    }

    .btn-gradient-primary:hover::before {
      left: 100%;
    }

    .btn-gradient-secondary {
      background: linear-gradient(135deg, #FFD700 0%, #FFC700 100%);
      position: relative;
      overflow: hidden;
    }

    .btn-gradient-secondary::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
      transition: left 0.5s;
    }

    .btn-gradient-secondary:hover::before {
      left: 100%;
    }

    /* Card Styles */
    .card-news {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
    }

    .card-news::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(135deg, rgba(0, 191, 166, 0.1) 0%, rgba(0, 32, 128, 0.1) 100%);
      opacity: 0;
      transition: opacity 0.4s;
      z-index: 1;
    }

    .card-news:hover::before {
      opacity: 1;
    }

    .card-news:hover {
      transform: translateY(-10px) scale(1.02);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    .card-news img {
      transition: transform 0.5s ease;
    }

    .card-news:hover img {
      transform: scale(1.15);
    }

    /* Hide Scrollbar */
    .no-scrollbar::-webkit-scrollbar { 
      display: none; 
    }
    
    .no-scrollbar { 
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    /* Alert Styles */
    .alert-success {
      background: linear-gradient(135deg, #D1FAE5 0%, #A7F3D0 100%);
      border-left: 5px solid #10B981;
    }

    .alert-error {
      background: linear-gradient(135deg, #FEE2E2 0%, #FECACA 100%);
      border-left: 5px solid #EF4444;
    }

    /* Video Container */
    .video-container {
      position: relative;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 20px 60px rgba(0, 32, 128, 0.3);
      transition: all 0.4s ease;
    }

    .video-container::before {
      content: '';
      position: absolute;
      top: -2px;
      left: -2px;
      right: -2px;
      bottom: -2px;
      background: linear-gradient(135deg, #00BFA6, #002080, #FFD700);
      border-radius: 20px;
      z-index: -1;
      opacity: 0;
      transition: opacity 0.4s;
    }

    .video-container:hover::before {
      opacity: 1;
    }

    .video-container:hover {
      transform: scale(1.02);
      box-shadow: 0 30px 80px rgba(0, 32, 128, 0.4);
    }

    /* Scroll Button Styles */
    .scroll-btn {
      background: linear-gradient(135deg, #002080 0%, #0040A0 100%);
      transition: all 0.3s ease;
    }

    .scroll-btn:hover {
      background: linear-gradient(135deg, #0040A0 0%, #0066CC 100%);
      transform: scale(1.15);
      box-shadow: 0 10px 25px rgba(0, 32, 128, 0.4);
    }

    /* Section Title */
    .section-title {
      position: relative;
      display: inline-block;
    }

    .section-title::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: linear-gradient(90deg, transparent, #FFD700, transparent);
      border-radius: 2px;
    }

    /* Delayed Animations */
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }

    /* Smooth Scroll */
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-gray-50 via-blue-50 to-gray-100">
  <x-navbar />
  <main class="pt-20">
    @yield('content')
  </main>
  <x-footer />
</body>
</html>