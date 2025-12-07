@extends('layouts.main')

@section('title', 'Jadwal Dokter Jaga - RSHP Unair')

@section('content')

<!-- Hero Header -->
<section class="relative bg-gradient-to-br from-[#002080] via-[#0040A0] to-[#00BFA6] text-white py-20 overflow-hidden">
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-10 right-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 left-10 w-96 h-96 bg-[#FFD700] rounded-full blur-3xl"></div>
  </div>
  
  <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
    <div class="inline-block bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full mb-6 animate-slideDown">
      <span class="font-semibold">📅 Senin - Jumat, 2024</span>
    </div>
    <h1 class="text-5xl md:text-6xl font-black mb-6 animate-slideDown delay-100">
      🩺 Jadwal Dokter Jaga
    </h1>
    <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto animate-slideDown delay-200">
      Temukan jadwal dokter hewan profesional yang siap melayani hewan kesayangan Anda
    </p>
  </div>
</section>

<section class="max-w-7xl mx-auto px-6 py-16">
  
  <!-- Info Card -->
  <div class="max-w-4xl mx-auto mb-12 glass rounded-3xl p-8 shadow-2xl border border-white text-center fade-in">
    <div class="flex items-center justify-center gap-3 mb-4">
      <span class="text-4xl">⏰</span>
      <h3 class="text-2xl font-bold gradient-text">Jam Operasional</h3>
    </div>
    <p class="text-gray-700 text-lg">
      Kami melayani <span class="font-bold text-[#00BFA6]">24 jam setiap hari</span> dengan dokter jaga berpengalaman. 
      Silakan hubungi kami untuk reservasi atau informasi lebih lanjut.
    </p>
  </div>

  <div class="grid lg:grid-cols-2 gap-8">
    
    <!-- ========== KOLOM 1 ========== -->
    <div class="space-y-8">
      
      <!-- SENIN -->
      <div class="glass rounded-3xl p-8 shadow-2xl border border-white hover:shadow-3xl transition-all duration-500 fade-in delay-100">
        <div class="flex items-center gap-4 mb-6">
          <div class="bg-gradient-to-br from-blue-500 to-blue-600 w-16 h-16 rounded-2xl flex items-center justify-center text-white text-2xl font-black shadow-lg animate-float">
            SEN
          </div>
          <div>
            <h3 class="text-3xl font-black gradient-text">Senin</h3>
            <p class="text-gray-500 text-sm">5 Dokter Jaga</p>
          </div>
        </div>
        
        <div class="space-y-3">
          <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-4 rounded-xl border-l-4 border-blue-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Prof. Dr. I. Komang Wiarsa Sardjana, drh.</p>
              </div>
              <div class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                08.30 – 12.00
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-4 rounded-xl border-l-4 border-blue-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Dr. Miyayu S. Sofyan, Drh., M.Vet.</p>
              </div>
              <div class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                08.30 – 16.30
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-4 rounded-xl border-l-4 border-blue-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Drh. Lina Susanti, MS., Ph.D.</p>
              </div>
              <div class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                13.00 – 16.30
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-4 rounded-xl border-l-4 border-blue-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Dr. Donny Chrismanto, drh., MS.</p>
              </div>
              <div class="bg-indigo-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                18.00 – 21.30
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-4 rounded-xl border-l-4 border-blue-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Simeon Marcellino Tantono, drh.</p>
              </div>
              <div class="bg-purple-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                23.00 – 07.00
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- SELASA -->
      <div class="glass rounded-3xl p-8 shadow-2xl border border-white hover:shadow-3xl transition-all duration-500 fade-in delay-200">
        <div class="flex items-center gap-4 mb-6">
          <div class="bg-gradient-to-br from-teal-500 to-teal-600 w-16 h-16 rounded-2xl flex items-center justify-center text-white text-2xl font-black shadow-lg animate-float" style="animation-delay: 0.5s;">
            SEL
          </div>
          <div>
            <h3 class="text-3xl font-black gradient-text">Selasa</h3>
            <p class="text-gray-500 text-sm">5 Dokter Jaga</p>
          </div>
        </div>
        
        <div class="space-y-3">
          <div class="bg-gradient-to-r from-teal-50 to-emerald-50 p-4 rounded-xl border-l-4 border-teal-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Prof. Dr. Wiwik Misaco Yuniarti, drh., M.Kes.</p>
              </div>
              <div class="bg-teal-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                08.30 – 16.30
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-teal-50 to-emerald-50 p-4 rounded-xl border-l-4 border-teal-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Dr. Ira Sari Yudaniayanti, drh., M.P.</p>
              </div>
              <div class="bg-teal-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                08.30 – 12.00
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-teal-50 to-emerald-50 p-4 rounded-xl border-l-4 border-teal-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Simeon Marcellino Tantono, drh.</p>
              </div>
              <div class="bg-teal-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                15.00 – 23.00
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-teal-50 to-emerald-50 p-4 rounded-xl border-l-4 border-teal-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Dr. Donny Chrismanto, drh., MS.</p>
              </div>
              <div class="bg-indigo-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                18.00 – 21.30
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-teal-50 to-emerald-50 p-4 rounded-xl border-l-4 border-teal-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Puruh Renzy Amdalia, drh.</p>
              </div>
              <div class="bg-purple-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                23.00 – 07.00
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- RABU -->
      <div class="glass rounded-3xl p-8 shadow-2xl border border-white hover:shadow-3xl transition-all duration-500 fade-in delay-300">
        <div class="flex items-center gap-4 mb-6">
          <div class="bg-gradient-to-br from-green-500 to-green-600 w-16 h-16 rounded-2xl flex items-center justify-center text-white text-2xl font-black shadow-lg animate-float" style="animation-delay: 1s;">
            RAB
          </div>
          <div>
            <h3 class="text-3xl font-black gradient-text">Rabu</h3>
            <p class="text-gray-500 text-sm">5 Dokter Jaga</p>
          </div>
        </div>
        
        <div class="space-y-3">
          <div class="bg-gradient-to-r from-green-50 to-lime-50 p-4 rounded-xl border-l-4 border-green-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Lianny Nangoi, drh., M.Kes.</p>
              </div>
              <div class="bg-green-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                08.30 – 12.00
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-green-50 to-lime-50 p-4 rounded-xl border-l-4 border-green-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Dr. Ira Sari Yudaniayanti, drh., M.P.</p>
              </div>
              <div class="bg-green-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                08.30 – 16.30
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-green-50 to-lime-50 p-4 rounded-xl border-l-4 border-green-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Abihilal Zikra Taim, drh.</p>
              </div>
              <div class="bg-green-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                15.00 – 23.00
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-green-50 to-lime-50 p-4 rounded-xl border-l-4 border-green-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Dr. Donny Chrismanto, drh., MS.</p>
              </div>
              <div class="bg-indigo-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                18.00 – 21.30
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-green-50 to-lime-50 p-4 rounded-xl border-l-4 border-green-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Puruh Renzy Amdalia, drh.</p>
              </div>
              <div class="bg-purple-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                23.00 – 07.00
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- ========== KOLOM 2 ========== -->
    <div class="space-y-8">
      
      <!-- KAMIS -->
      <div class="glass rounded-3xl p-8 shadow-2xl border border-white hover:shadow-3xl transition-all duration-500 fade-in delay-100">
        <div class="flex items-center gap-4 mb-6">
          <div class="bg-gradient-to-br from-amber-500 to-amber-600 w-16 h-16 rounded-2xl flex items-center justify-center text-white text-2xl font-black shadow-lg animate-float" style="animation-delay: 1.5s;">
            KAM
          </div>
          <div>
            <h3 class="text-3xl font-black gradient-text">Kamis</h3>
            <p class="text-gray-500 text-sm">5 Dokter Jaga</p>
          </div>
        </div>
        
        <div class="space-y-3">
          <div class="bg-gradient-to-r from-amber-50 to-orange-50 p-4 rounded-xl border-l-4 border-amber-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Dr. Nusdianto Triakoso, drh., M.P.</p>
              </div>
              <div class="bg-amber-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                08.30 – 16.30
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-amber-50 to-orange-50 p-4 rounded-xl border-l-4 border-amber-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Drh. Lina Susanti, MS., Ph.D.</p>
              </div>
              <div class="bg-amber-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                08.30 – 12.00
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-amber-50 to-orange-50 p-4 rounded-xl border-l-4 border-amber-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Drh. Mirza Atikah Madarina Hisyam, M.Si.</p>
              </div>
              <div class="bg-amber-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                13.00 – 16.30
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-amber-50 to-orange-50 p-4 rounded-xl border-l-4 border-amber-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Puruh Renzy Amdalia, drh.</p>
              </div>
              <div class="bg-amber-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                15.00 – 23.00
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-amber-50 to-orange-50 p-4 rounded-xl border-l-4 border-amber-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Abihilal Zikra Taim, drh.</p>
              </div>
              <div class="bg-purple-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                23.00 – 07.00
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- JUMAT -->
      <div class="glass rounded-3xl p-8 shadow-2xl border border-white hover:shadow-3xl transition-all duration-500 fade-in delay-200">
        <div class="flex items-center gap-4 mb-6">
          <div class="bg-gradient-to-br from-rose-500 to-rose-600 w-16 h-16 rounded-2xl flex items-center justify-center text-white text-2xl font-black shadow-lg animate-float" style="animation-delay: 2s;">
            JUM
          </div>
          <div>
            <h3 class="text-3xl font-black gradient-text">Jumat</h3>
            <p class="text-gray-500 text-sm">6 Dokter Jaga</p>
          </div>
        </div>
        
        <div class="space-y-3">
          <div class="bg-gradient-to-r from-rose-50 to-pink-50 p-4 rounded-xl border-l-4 border-rose-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Dr. Boedi Setiawan, drh., M.P.</p>
              </div>
              <div class="bg-rose-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                08.30 – 12.00
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-rose-50 to-pink-50 p-4 rounded-xl border-l-4 border-rose-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Dr. Miyayu Soneta Sofyan, drh., M.Vet.</p>
              </div>
              <div class="bg-rose-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                08.30 – 12.00
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-rose-50 to-pink-50 p-4 rounded-xl border-l-4 border-rose-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Drh. Mirza Atikah Madarina Hisyam, M.Si.</p>
              </div>
              <div class="bg-rose-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                13.00 – 16.30
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-rose-50 to-pink-50 p-4 rounded-xl border-l-4 border-rose-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Dr. Donny Chrismanto, drh., MS.</p>
              </div>
              <div class="bg-rose-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                13.00 – 16.30
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-rose-50 to-pink-50 p-4 rounded-xl border-l-4 border-rose-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Puruh Renzy Amdalia, drh.</p>
              </div>
              <div class="bg-rose-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                15.00 – 23.00
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-r from-rose-50 to-pink-50 p-4 rounded-xl border-l-4 border-rose-500 hover:shadow-md transition-all hover:-translate-x-1">
            <div class="flex justify-between items-start gap-3">
              <div class="flex-1">
                <p class="font-bold text-gray-800">Abihilal Zikra Taim, drh.</p>
              </div>
              <div class="bg-purple-600 text-white px-3 py-1 rounded-lg text-sm font-bold whitespace-nowrap">
                23.00 – 07.00
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Info Footer -->
  <div class="mt-12 max-w-4xl mx-auto glass rounded-3xl p-8 shadow-2xl border border-white text-center fade-in delay-500">
    <div class="flex flex-col md:flex-row items-center justify-center gap-6">
      <div class="flex items-center gap-3">
        <div class="bg-blue-600 w-4 h-4 rounded"></div>
        <span class="text-gray-700">Pagi (08.30 - 16.30)</span>
      </div>
      <div class="flex items-center gap-3">
        <div class="bg-indigo-600 w-4 h-4 rounded"></div>
        <span class="text-gray-700">Sore (18.00 - 21.30)</span>
      </div>
      <div class="flex items-center gap-3">
        <div class="bg-purple-600 w-4 h-4 rounded"></div>
        <span class="text-gray-700">Malam (23.00 - 07.00)</span>
      </div>
    </div>
  </div>
</section>

{{-- CTA Section --}}
<section class="bg-gradient-to-r from-[#002080] to-[#00BFA6] text-white py-16">
  <div class="max-w-4xl mx-auto text-center px-6">
    <h2 class="text-4xl font-black mb-4">Butuh Konsultasi Segera?</h2>
    <p class="text-xl text-blue-100 mb-8">Hubungi kami atau buat reservasi online untuk bertemu dengan dokter pilihan Anda</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="#" class="bg-white text-[#002080] px-8 py-4 rounded-2xl font-bold text-lg hover:scale-105 transform transition-all shadow-2xl">
        📞 Hubungi Kami
      </a>
      <a href="#" class="bg-[#FFD700] text-[#002080] px-8 py-4 rounded-2xl font-bold text-lg hover:scale-105 transform transition-all shadow-2xl">
        📅 Reservasi Online
      </a>
    </div>
  </div>
</section>

{{-- ==== ANIMASI SCROLL ==== --}}
<script>
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) entry.target.classList.add('show');
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
</script>

<style>
  .fade-in { 
    opacity: 0; 
    transform: translateY(30px); 
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
  }
  .fade-in.show { 
    opacity: 1; 
    transform: translateY(0); 
  }
  .delay-100 { transition-delay: 0.1s; }
  .delay-200 { transition-delay: 0.2s; }
  .delay-300 { transition-delay: 0.3s; }
  .delay-400 { transition-delay: 0.4s; }
  .delay-500 { transition-delay: 0.5s; }
</style>

@endsection