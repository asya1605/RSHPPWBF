@extends('layouts.main')

@section('title', 'Visi, Misi, dan Tujuan - RSHP Unair')

@section('content')

<!-- Hero Header -->
<section class="relative bg-gradient-to-br from-[#002080] via-[#0040A0] to-[#00BFA6] text-white py-20 overflow-hidden">
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-[#FFD700] rounded-full blur-3xl"></div>
  </div>
  
  <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
    <div class="inline-block bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full mb-6 animate-slideDown">
      <span class="font-semibold">🎯 Komitmen Kami</span>
    </div>
    <h1 class="text-5xl md:text-6xl font-black mb-6 animate-slideDown delay-100">
      Visi, Misi & Tujuan
    </h1>
    <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto animate-slideDown delay-200">
      Fondasi nilai dan arah strategi RSHP Universitas Airlangga menuju masa depan
    </p>
  </div>
</section>

<section class="max-w-7xl mx-auto px-6 py-16">
  
  <!-- Main Content Grid -->
  <div class="space-y-12">
    
    <!-- VISI Section -->
    <div class="fade-in">
      <div class="glass rounded-3xl overflow-hidden shadow-3xl border border-white">
        <div class="relative bg-gradient-to-br from-blue-600 to-blue-700 p-8 md:p-12">
          <!-- Decorative Elements -->
          <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
          <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
          
          <div class="relative z-10">
            <div class="flex items-center gap-4 mb-6">
              <div class="bg-white/20 backdrop-blur-sm p-4 rounded-2xl shadow-lg animate-float">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
              </div>
              <div>
                <h2 class="text-4xl md:text-5xl font-black text-white mb-2">Visi</h2>
                <p class="text-blue-100 text-sm md:text-base">Our Vision for the Future</p>
              </div>
            </div>
            
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 md:p-8 border border-white/20">
              <p class="text-white text-lg md:text-xl leading-relaxed font-medium">
                Menjadi <span class="font-black text-[#FFD700]">Rumah Sakit Hewan Pendidikan terkemuka</span> 
                di tingkat nasional dan internasional dalam pelayanan, pendidikan, dan penelitian yang 
                <span class="font-black text-[#FFD700]">unggul, mandiri, serta bermartabat</span>.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MISI Section -->
    <div class="fade-in delay-200">
      <div class="glass rounded-3xl overflow-hidden shadow-3xl border border-white">
        <div class="relative bg-gradient-to-br from-teal-600 to-teal-700 p-8 md:p-12">
          <!-- Decorative Elements -->
          <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
          <div class="absolute bottom-0 right-0 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
          
          <div class="relative z-10">
            <div class="flex items-center gap-4 mb-8">
              <div class="bg-white/20 backdrop-blur-sm p-4 rounded-2xl shadow-lg animate-float" style="animation-delay: 0.5s;">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
              </div>
              <div>
                <h2 class="text-4xl md:text-5xl font-black text-white mb-2">Misi</h2>
                <p class="text-teal-100 text-sm md:text-base">Our Mission & Commitment</p>
              </div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-4">
              <!-- Mission Item 1 -->
              <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/20 transition-all hover:scale-105 transform duration-300">
                <div class="flex items-start gap-4">
                  <div class="flex-shrink-0 w-12 h-12 bg-[#FFD700] rounded-xl flex items-center justify-center font-black text-teal-900 text-xl shadow-lg">
                    1
                  </div>
                  <p class="text-white leading-relaxed">
                    Menyelenggarakan <span class="font-bold text-[#FFD700]">pelayanan terintegrasi dan bermutu tinggi</span> 
                    dengan mengutamakan keselamatan pasien.
                  </p>
                </div>
              </div>

              <!-- Mission Item 2 -->
              <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/20 transition-all hover:scale-105 transform duration-300">
                <div class="flex items-start gap-4">
                  <div class="flex-shrink-0 w-12 h-12 bg-[#FFD700] rounded-xl flex items-center justify-center font-black text-teal-900 text-xl shadow-lg">
                    2
                  </div>
                  <p class="text-white leading-relaxed">
                    Menyelenggarakan <span class="font-bold text-[#FFD700]">pendidikan dan pelatihan</span> 
                    bidang kedokteran hewan dan kesehatan lainnya.
                  </p>
                </div>
              </div>

              <!-- Mission Item 3 -->
              <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/20 transition-all hover:scale-105 transform duration-300">
                <div class="flex items-start gap-4">
                  <div class="flex-shrink-0 w-12 h-12 bg-[#FFD700] rounded-xl flex items-center justify-center font-black text-teal-900 text-xl shadow-lg">
                    3
                  </div>
                  <p class="text-white leading-relaxed">
                    Melakukan <span class="font-bold text-[#FFD700]">penelitian inovatif</span> 
                    berbasis kedokteran hewan dan kesehatan lainnya.
                  </p>
                </div>
              </div>

              <!-- Mission Item 4 -->
              <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/20 transition-all hover:scale-105 transform duration-300">
                <div class="flex items-start gap-4">
                  <div class="flex-shrink-0 w-12 h-12 bg-[#FFD700] rounded-xl flex items-center justify-center font-black text-teal-900 text-xl shadow-lg">
                    4
                  </div>
                  <p class="text-white leading-relaxed">
                    Menjadi <span class="font-bold text-[#FFD700]">pusat rujukan</span> 
                    pelayanan kedokteran hewan yang unggul.
                  </p>
                </div>
              </div>

              <!-- Mission Item 5 -->
              <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 hover:bg-white/20 transition-all hover:scale-105 transform duration-300 md:col-span-2">
                <div class="flex items-start gap-4">
                  <div class="flex-shrink-0 w-12 h-12 bg-[#FFD700] rounded-xl flex items-center justify-center font-black text-teal-900 text-xl shadow-lg">
                    5
                  </div>
                  <p class="text-white leading-relaxed">
                    Mengembangkan <span class="font-bold text-[#FFD700]">manajemen rumah sakit yang produktif dan efisien</span>.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- TUJUAN Section -->
    <div class="fade-in delay-300">
      <div class="glass rounded-3xl overflow-hidden shadow-3xl border border-white">
        <div class="relative bg-gradient-to-br from-purple-600 to-purple-700 p-8 md:p-12">
          <!-- Decorative Elements -->
          <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
          <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
          
          <div class="relative z-10">
            <div class="flex items-center gap-4 mb-8">
              <div class="bg-white/20 backdrop-blur-sm p-4 rounded-2xl shadow-lg animate-float" style="animation-delay: 1s;">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
              </div>
              <div>
                <h2 class="text-4xl md:text-5xl font-black text-white mb-2">Tujuan</h2>
                <p class="text-purple-100 text-sm md:text-base">Our Strategic Goals</p>
              </div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-6">
              <!-- Goal 1 -->
              <div class="relative group">
                <div class="absolute inset-0 bg-gradient-to-r from-[#FFD700] to-amber-400 rounded-2xl blur opacity-75 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative bg-white rounded-2xl p-8 shadow-2xl">
                  <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl flex items-center justify-center font-black text-white text-2xl shadow-lg">
                      1
                    </div>
                    <div>
                      <h4 class="text-xl font-bold text-purple-900 mb-3">Adaptif & Inovatif</h4>
                      <p class="text-gray-700 leading-relaxed">
                        Menjadi RS hewan yang <span class="font-bold text-purple-700">adaptif, kreatif, dan proaktif</span> 
                        terhadap perkembangan teknologi.
                      </p>
                    </div>
                  </div>
                  
                  <!-- Icons -->
                  <div class="flex gap-3 mt-6 pt-6 border-t border-purple-100">
                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">💡 Inovasi</span>
                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">🚀 Teknologi</span>
                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">⚡ Proaktif</span>
                  </div>
                </div>
              </div>

              <!-- Goal 2 -->
              <div class="relative group">
                <div class="absolute inset-0 bg-gradient-to-r from-[#00BFA6] to-teal-400 rounded-2xl blur opacity-75 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative bg-white rounded-2xl p-8 shadow-2xl">
                  <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl flex items-center justify-center font-black text-white text-2xl shadow-lg">
                      2
                    </div>
                    <div>
                      <h4 class="text-xl font-bold text-purple-900 mb-3">Mandiri & Profesional</h4>
                      <p class="text-gray-700 leading-relaxed">
                        Menjadi RS hewan <span class="font-bold text-purple-700">mandiri</span> 
                        dengan <span class="font-bold text-purple-700">tata kelola yang baik</span>.
                      </p>
                    </div>
                  </div>
                  
                  <!-- Icons -->
                  <div class="flex gap-3 mt-6 pt-6 border-t border-purple-100">
                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">🎯 Mandiri</span>
                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">⚖️ Tata Kelola</span>
                    <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">🏆 Unggul</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Core Values Section -->
  <div class="mt-16 fade-in delay-400">
    <div class="text-center mb-12">
      <h2 class="text-4xl font-black gradient-text mb-4">Nilai-Nilai Inti</h2>
      <p class="text-gray-600 text-lg">Prinsip yang memandu setiap langkah kami</p>
    </div>

    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">
      <!-- Value 1 -->
      <div class="glass rounded-2xl p-6 shadow-xl border border-white text-center hover:shadow-2xl transition-all hover:-translate-y-2">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg animate-float">
          <span class="text-3xl">🎯</span>
        </div>
        <h4 class="font-bold text-lg text-[#002080] mb-2">Profesional</h4>
        <p class="text-gray-600 text-sm">Komitmen pada standar tertinggi dalam pelayanan</p>
      </div>

      <!-- Value 2 -->
      <div class="glass rounded-2xl p-6 shadow-xl border border-white text-center hover:shadow-2xl transition-all hover:-translate-y-2">
        <div class="bg-gradient-to-br from-teal-500 to-teal-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg animate-float" style="animation-delay: 0.3s;">
          <span class="text-3xl">❤️</span>
        </div>
        <h4 class="font-bold text-lg text-[#002080] mb-2">Empati</h4>
        <p class="text-gray-600 text-sm">Peduli dan memahami kebutuhan setiap pasien</p>
      </div>

      <!-- Value 3 -->
      <div class="glass rounded-2xl p-6 shadow-xl border border-white text-center hover:shadow-2xl transition-all hover:-translate-y-2">
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg animate-float" style="animation-delay: 0.6s;">
          <span class="text-3xl">🔬</span>
        </div>
        <h4 class="font-bold text-lg text-[#002080] mb-2">Inovasi</h4>
        <p class="text-gray-600 text-sm">Selalu berkembang dengan teknologi terkini</p>
      </div>

      <!-- Value 4 -->
      <div class="glass rounded-2xl p-6 shadow-xl border border-white text-center hover:shadow-2xl transition-all hover:-translate-y-2">
        <div class="bg-gradient-to-br from-amber-500 to-amber-600 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg animate-float" style="animation-delay: 0.9s;">
          <span class="text-3xl">🤝</span>
        </div>
        <h4 class="font-bold text-lg text-[#002080] mb-2">Integritas</h4>
        <p class="text-gray-600 text-sm">Jujur dan transparan dalam setiap tindakan</p>
      </div>
    </div>
  </div>
</section>

{{-- CTA Section --}}
<section class="bg-gradient-to-r from-[#002080] to-[#00BFA6] text-white py-16">
  <div class="max-w-4xl mx-auto text-center px-6">
    <h2 class="text-4xl font-black mb-4">Mari Wujudkan Visi Bersama</h2>
    <p class="text-xl text-blue-100 mb-8">Bergabunglah dengan kami dalam memberikan pelayanan kesehatan hewan terbaik</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="{{ route('register') }}"  class="bg-white text-[#002080] px-8 py-4 rounded-2xl font-bold text-lg hover:scale-105 transform transition-all shadow-2xl">
        🐾 Reservasi Sekarang
      </a>
      <a href="https://wa.me/6281234567890"  class="bg-[#FFD700] text-[#002080] px-8 py-4 rounded-2xl font-bold text-lg hover:scale-105 transform transition-all shadow-2xl">
        📞 Hubungi Kami
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
</style>

@endsection