@extends('layouts.main')

@section('title', 'Home - RSHP Unair')

@section('content')

{{-- ✅ ALERT LOGOUT / NOTIFIKASI --}}
@if (session('success'))
  <div class="alert-success text-green-800 px-8 py-5 rounded-2xl text-center mb-8 max-w-4xl mx-auto shadow-xl animate-slideDown">
    <div class="flex items-center justify-center gap-3">
      <span class="text-3xl">✅</span>
      <span class="font-bold text-lg">{{ session('success') }}</span>
    </div>
  </div>
@endif

@if (session('error'))
  <div class="alert-error text-red-800 px-8 py-5 rounded-2xl text-center mb-8 max-w-4xl mx-auto shadow-xl animate-slideDown">
    <div class="flex items-center justify-center gap-3">
      <span class="text-3xl">⚠️</span>
      <span class="font-bold text-lg">{{ session('error') }}</span>
    </div>
  </div>
@endif


<!-- ======== HERO SECTION ======== -->
<section class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-16">
  <!-- Left: Info -->
  <div class="md:w-1/2 space-y-8">
    <div class="animate-float">
      <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/06/UNIVERSITAS-AIRLANGGA-scaled.webp"
           alt="Logo Universitas Airlangga RSHP"
           class="w-72 mx-auto md:mx-0 drop-shadow-2xl">
    </div>

    <h1 class="text-5xl md:text-6xl font-black gradient-text leading-tight animate-slideRight">
      Rumah Sakit Hewan Pendidikan Universitas Airlangga
    </h1>
    
    <p class="text-gray-700 leading-relaxed text-xl animate-slideRight delay-100">
      🐾 Berinovasi untuk selalu meningkatkan kualitas pelayanan.  
      RSHP Universitas Airlangga menyediakan fitur pendaftaran online  
      yang mempermudah Anda mendaftarkan hewan kesayangan.
    </p>

    <div class="flex flex-col sm:flex-row gap-5 animate-slideRight delay-200">
      <a href="{{ route('register') }}" 
         class="btn-gradient-primary text-white px-8 py-4 rounded-2xl shadow-2xl text-center font-bold text-lg hover:scale-105 transform transition-all">
        <span class="relative z-10 flex items-center justify-center gap-2">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
          Reservasi Online
        </span>
      </a>
      
      <a href="{{ url('/jadwal') }}"
         class="btn-gradient-secondary text-[#002080] px-8 py-4 rounded-2xl shadow-2xl text-center font-bold text-lg hover:scale-105 transform transition-all">
         <span class="relative z-10 flex items-center justify-center gap-2">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          Jadwal Dokter Jaga
         </span>
      </a>
    </div>
  </div>

  <!-- Right: Video -->
  <div class="md:w-1/2 animate-slideLeft">
    <div class="video-container relative">
      <iframe class="w-full h-80 md:h-[450px] relative z-10"
              src="https://www.youtube.com/embed/rCfvZPECZvE"
              title="Profil RSHP UNAIR"
              frameborder="0"
              allowfullscreen></iframe>
    </div>
  </div>
</section>
<!-- ======== /HERO SECTION ======== -->

<!-- ======== BERITA TERKINI SECTION ======== -->
<section class="max-w-7xl mx-auto px-6 py-20 relative">
  <!-- Section Header -->
  <div class="text-center mb-16 animate-fadeIn">
    <h2 class="section-title text-5xl font-black gradient-text mb-6 inline-block">
      Berita Terkini
    </h2>
    <p class="text-gray-600 text-lg mt-8">Ikuti perkembangan dan kegiatan terbaru RSHP Universitas Airlangga</p>
  </div>

  <h3 class="text-3xl font-bold text-gray-800 mb-10 animate-slideRight flex items-center gap-3">
    <span class="w-2 h-10 bg-gradient-to-b from-[#00BFA6] to-[#002080] rounded-full"></span>
    RSHP Latest News
  </h3>

  <!-- Container scroll horizontal -->
  <div class="relative group">
    <!-- Gradient Fade Left -->
    <div class="absolute left-0 top-0 bottom-0 w-20 bg-gradient-to-r from-gray-50 to-transparent z-10 pointer-events-none"></div>
    
    <!-- Gradient Fade Right -->
    <div class="absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-gray-50 to-transparent z-10 pointer-events-none"></div>

    <!-- Tombol kiri -->
    <button id="btn-left"
            class="scroll-btn absolute left-4 top-1/2 -translate-y-1/2 z-20 text-white w-14 h-14 rounded-full shadow-2xl opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center">
      <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"/>
      </svg>
    </button>

    <!-- Scroll area -->
    <div id="news-scroll"
         class="flex gap-8 overflow-x-auto scroll-smooth no-scrollbar px-2 py-6">
      
      <!-- CARD 1 -->
      <div class="card-news min-w-[320px] glass rounded-3xl shadow-2xl overflow-hidden">
        <div class="relative h-64 overflow-hidden">
          <img src="https://rshp.unair.ac.id/wp-content/uploads/2025/06/26-Mei-2025.png"
               class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
          <div class="absolute top-4 right-4 bg-[#00BFA6] text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
            Terbaru
          </div>
        </div>
        <div class="p-6 relative z-10">
          <h4 class="font-bold text-[#002080] text-xl mb-3 hover:text-[#00BFA6] transition-colors duration-300">
            Open Recruit Staf RSHP Unair
          </h4>
          <div class="flex items-center gap-3 text-gray-600">
            <svg class="w-5 h-5 text-[#FFD700]" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
            </svg>
            <span class="font-semibold">1 Juni 2025</span>
          </div>
        </div>
      </div>

      <!-- CARD 2 -->
      <div class="card-news min-w-[320px] glass rounded-3xl shadow-2xl overflow-hidden">
        <div class="relative h-64 overflow-hidden">
          <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/11/Senam-8.jpg"
               class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
          <div class="absolute top-4 right-4 bg-[#FFD700] text-[#002080] px-4 py-2 rounded-full text-sm font-bold shadow-lg">
            🏆 Juara
          </div>
        </div>
        <div class="p-6 relative z-10">
          <h4 class="font-bold text-[#002080] text-xl mb-3 hover:text-[#00BFA6] transition-colors duration-300">
            Tim Satu Sehat Juara 1 Senam Bugar Airlangga
          </h4>
          <div class="flex items-center gap-3 text-gray-600">
            <svg class="w-5 h-5 text-[#FFD700]" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
            </svg>
            <span class="font-semibold">4 November 2024</span>
          </div>
        </div>
      </div>

      <!-- CARD 3 -->
      <div class="card-news min-w-[320px] glass rounded-3xl shadow-2xl overflow-hidden">
        <div class="relative h-64 overflow-hidden">
          <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/08/CueCard-SW-Sitologi-24-A5-21-x-14.8-cm-scaled-1060x450.webp"
               class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
        </div>
        <div class="p-6 relative z-10">
          <h4 class="font-bold text-[#002080] text-xl mb-3 hover:text-[#00BFA6] transition-colors duration-300">
            Seminar & Workshop Sitologi RSHP 2024
          </h4>
          <div class="flex items-center gap-3 text-gray-600">
            <svg class="w-5 h-5 text-[#FFD700]" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
            </svg>
            <span class="font-semibold">27 Agustus 2024</span>
          </div>
        </div>
      </div>

      <!-- CARD 4 -->
      <div class="card-news min-w-[320px] glass rounded-3xl shadow-2xl overflow-hidden">
        <div class="relative h-64 overflow-hidden">
          <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/08/AGT05378-fitur-gambar-scaled-1060x450.jpg"
               class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
        </div>
        <div class="p-6 relative z-10">
          <h4 class="font-bold text-[#002080] text-xl mb-3 hover:text-[#00BFA6] transition-colors duration-300">
            RSHP Goes to Banyuwangi
          </h4>
          <div class="flex items-center gap-3 text-gray-600">
            <svg class="w-5 h-5 text-[#FFD700]" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
            </svg>
            <span class="font-semibold">5 Agustus 2024</span>
          </div>
        </div>
      </div>

      <!-- CARD 5 -->
      <div class="card-news min-w-[320px] glass rounded-3xl shadow-2xl overflow-hidden">
        <div class="relative h-64 overflow-hidden">
          <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/07/fiesta-urology-e1722057203203-720x450.jpg"
               class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
        </div>
        <div class="p-6 relative z-10">
          <h4 class="font-bold text-[#002080] text-xl mb-3 hover:text-[#00BFA6] transition-colors duration-300">
            Seminar dan Workshop FIESTA UROLOGI
          </h4>
          <div class="flex items-center gap-3 text-gray-600">
            <svg class="w-5 h-5 text-[#FFD700]" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
            </svg>
            <span class="font-semibold">21 July 2024</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Tombol kanan -->
    <button id="btn-right"
            class="scroll-btn absolute right-4 top-1/2 -translate-y-1/2 z-20 text-white w-14 h-14 rounded-full shadow-2xl opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center">
      <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/>
      </svg>
    </button>
  </div>
</section>

<!-- Script slider -->
<script>
  const scrollContainer = document.getElementById('news-scroll');
  const btnLeft = document.getElementById('btn-left');
  const btnRight = document.getElementById('btn-right');
  
  btnLeft.addEventListener('click', () => {
    scrollContainer.scrollBy({ left: -350, behavior: 'smooth' });
  });
  
  btnRight.addEventListener('click', () => {
    scrollContainer.scrollBy({ left: 350, behavior: 'smooth' });
  });

  // Auto hide/show buttons based on scroll position
  scrollContainer.addEventListener('scroll', () => {
    if (scrollContainer.scrollLeft <= 0) {
      btnLeft.style.opacity = '0';
    } else {
      btnLeft.style.opacity = '1';
    }

    if (scrollContainer.scrollLeft >= scrollContainer.scrollWidth - scrollContainer.clientWidth - 10) {
      btnRight.style.opacity = '0';
    } else {
      btnRight.style.opacity = '1';
    }
  });
</script>
<!-- ======== /BERITA TERKINI SECTION ======== -->

@endsection