@extends('layouts.main')

@section('title', 'Lokasi RSHP Unair')

@section('content')

<!-- Hero Header -->
<section class="relative bg-gradient-to-br from-[#002080] via-[#0040A0] to-[#00BFA6] text-white py-20 overflow-hidden">
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-[#FFD700] rounded-full blur-3xl"></div>
  </div>
  
  <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
    <h1 class="text-5xl md:text-6xl font-black mb-6 animate-slideDown">
      📍 Lokasi Kami
    </h1>
    <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto animate-slideDown delay-100">
      Temukan kami di kampus C Universitas Airlangga, Surabaya
    </p>
  </div>
</section>

<section class="max-w-7xl mx-auto px-6 py-16">
  
  <!-- Main Location Card -->
  <div class="glass rounded-3xl overflow-hidden shadow-3xl border border-white mb-12 fade-in">
    <div class="flex flex-col lg:flex-row">
      
      <!-- Map Section -->
      <div class="lg:w-3/5 relative group">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-teal-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10 pointer-events-none"></div>
        <iframe class="w-full h-96 lg:h-[600px]"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.7410075551015!2d112.78555967330813!3d-7.27028539273667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd40a9784f5%3A0xe756f6ae03eab99!2sRumah%20Sakit%20Hewan%20Pendidikan%20Universitas%20Airlangga!5e0!3m2!1sid!2sid!4v1755483986152!5m2!1sid!2sid"
                style="border:0;" 
                allowfullscreen 
                loading="lazy">
        </iframe>
      </div>

      <!-- Info Section -->
      <div class="lg:w-2/5 p-8 lg:p-12 space-y-8">
        
        <!-- Address -->
        <div class="space-y-4">
          <div class="flex items-start gap-4">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-2xl shadow-lg flex-shrink-0 animate-float">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
              </svg>
            </div>
            <div>
              <h3 class="text-2xl font-bold gradient-text mb-2">Alamat Lengkap</h3>
              <p class="text-gray-700 leading-relaxed">
                <strong class="text-[#002080] text-lg">RSHP Universitas Airlangga</strong><br>
                <span class="text-gray-600">Kampus C Universitas Airlangga</span><br>
                <span class="text-gray-600">Jl. Dharmahusada Permai</span><br>
                <span class="text-gray-600">Mulyorejo, Surabaya</span><br>
                <span class="text-gray-600">Jawa Timur, Indonesia</span>
              </p>
            </div>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="space-y-4">
          <div class="flex items-start gap-4">
            <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-4 rounded-2xl shadow-lg flex-shrink-0 animate-float" style="animation-delay: 0.5s;">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
              </svg>
            </div>
            <div>
              <h3 class="text-2xl font-bold gradient-text mb-2">Kontak</h3>
              <div class="space-y-2 text-gray-700">
                <p class="flex items-center gap-2">
                  <span class="font-semibold text-[#002080]">Telepon:</span>
                  <a href="tel:+62315992785" class="hover:text-[#00BFA6] transition-colors">(031) 5992785</a>
                </p>
                <p class="flex items-center gap-2">
                  <span class="font-semibold text-[#002080]">Email:</span>
                  <a href="mailto:rshp@unair.ac.id" class="hover:text-[#00BFA6] transition-colors">rshp@unair.ac.id</a>
                </p>
                <p class="flex items-center gap-2">
                  <span class="font-semibold text-[#002080]">WhatsApp:</span>
                  <a href="https://wa.me/6281234567890" class="hover:text-[#00BFA6] transition-colors">+62 812-3456-7890</a>
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Operating Hours -->
        <div class="space-y-4">
          <div class="flex items-start gap-4">
            <div class="bg-gradient-to-br from-amber-500 to-amber-600 p-4 rounded-2xl shadow-lg flex-shrink-0 animate-float" style="animation-delay: 1s;">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <div>
              <h3 class="text-2xl font-bold gradient-text mb-2">Jam Operasional</h3>
              <div class="space-y-1 text-gray-700">
                <p class="font-semibold text-[#00BFA6] text-lg">🕐 Buka 24 Jam</p>
                <p class="text-gray-600">Senin - Minggu</p>
                <p class="text-sm text-gray-500 mt-2">Layanan darurat tersedia setiap saat</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="pt-6 space-y-3">
          <a href="https://www.google.com/maps/dir/?api=1&destination=RSHP+Universitas+Airlangga" 
             target="_blank"
             class="btn-gradient-primary text-white px-6 py-4 rounded-2xl shadow-lg text-center font-bold flex items-center justify-center gap-3 hover:scale-105 transform transition-all w-full">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
            </svg>
            Petunjuk Arah (Google Maps)
          </a>
          
          <a href="https://wa.me/6281234567890?text=Halo%20RSHP%20UNAIR%2C%20saya%20ingin%20bertanya" 
             target="_blank"
             class="btn-gradient-secondary text-[#002080] px-6 py-4 rounded-2xl shadow-lg text-center font-bold flex items-center justify-center gap-3 hover:scale-105 transform transition-all w-full">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            Hubungi via WhatsApp
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Quick Info Cards -->
  <div class="grid md:grid-cols-3 gap-6 mb-12">
    
    <!-- Card 1 -->
    <div class="glass rounded-2xl p-6 shadow-xl border border-white hover:shadow-2xl transition-all hover:-translate-y-2 fade-in delay-200">
      <div class="flex items-center gap-4 mb-4">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-3 rounded-xl">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
          </svg>
        </div>
        <h3 class="font-bold text-xl text-[#002080]">Parkir Luas</h3>
      </div>
      <p class="text-gray-600">Area parkir yang luas dan aman untuk kendaraan Anda</p>
    </div>

    <!-- Card 2 -->
    <div class="glass rounded-2xl p-6 shadow-xl border border-white hover:shadow-2xl transition-all hover:-translate-y-2 fade-in delay-300">
      <div class="flex items-center gap-4 mb-4">
        <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-3 rounded-xl">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
          </svg>
        </div>
        <h3 class="font-bold text-xl text-[#002080]">Akses Mudah</h3>
      </div>
      <p class="text-gray-600">Lokasi strategis dan mudah dijangkau dari berbagai area</p>
    </div>

    <!-- Card 3 -->
    <div class="glass rounded-2xl p-6 shadow-xl border border-white hover:shadow-2xl transition-all hover:-translate-y-2 fade-in delay-400">
      <div class="flex items-center gap-4 mb-4">
        <div class="bg-gradient-to-br from-amber-500 to-amber-600 p-3 rounded-xl">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
          </svg>
        </div>
        <h3 class="font-bold text-xl text-[#002080]">Fasilitas Lengkap</h3>
      </div>
      <p class="text-gray-600">Ruang tunggu nyaman dan fasilitas modern</p>
    </div>
  </div>

  <!-- Transportation Guide -->
  <div class="glass rounded-3xl p-8 shadow-2xl border border-white fade-in delay-500">
    <h2 class="text-3xl font-black gradient-text mb-6 text-center">🚗 Panduan Transportasi</h2>
    
    <div class="grid md:grid-cols-2 gap-8">
      
      <!-- Private Vehicle -->
      <div class="space-y-4">
        <div class="flex items-center gap-3 mb-4">
          <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-3 rounded-xl">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-[#002080]">Kendaraan Pribadi</h3>
        </div>
        <ul class="space-y-2 text-gray-700">
          <li class="flex items-start gap-2">
            <span class="text-[#00BFA6] mt-1">✓</span>
            <span>Dari arah Waru: Ambil Jl. Raya Kendangsari menuju Mulyorejo</span>
          </li>
          <li class="flex items-start gap-2">
            <span class="text-[#00BFA6] mt-1">✓</span>
            <span>Dari arah Bratang: Lewat Jl. Dharmahusada Indah</span>
          </li>
          <li class="flex items-start gap-2">
            <span class="text-[#00BFA6] mt-1">✓</span>
            <span>Tersedia parkir luas di area kampus</span>
          </li>
        </ul>
      </div>

      <!-- Public Transport -->
      <div class="space-y-4">
        <div class="flex items-center gap-3 mb-4">
          <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-3 rounded-xl">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"/>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-[#002080]">Transportasi Umum</h3>
        </div>
        <ul class="space-y-2 text-gray-700">
          <li class="flex items-start gap-2">
            <span class="text-[#00BFA6] mt-1">✓</span>
            <span>Naik angkot jurusan Joyoboyo - Mulyorejo</span>
          </li>
          <li class="flex items-start gap-2">
            <span class="text-[#00BFA6] mt-1">✓</span>
            <span>Ojek online tersedia (turun di gerbang kampus C)</span>
          </li>
          <li class="flex items-start gap-2">
            <span class="text-[#00BFA6] mt-1">✓</span>
            <span>Taksi online bisa langsung ke lokasi RSHP</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- CTA Section --}}
<section class="bg-gradient-to-r from-[#002080] to-[#00BFA6] text-white py-16">
  <div class="max-w-4xl mx-auto text-center px-6">
    <h2 class="text-4xl font-black mb-4">Kesulitan Menemukan Lokasi?</h2>
    <p class="text-xl text-blue-100 mb-8">Hubungi kami dan kami akan dengan senang hati membantu memberikan petunjuk arah</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="tel:+62315992785" class="bg-white text-[#002080] px-8 py-4 rounded-2xl font-bold text-lg hover:scale-105 transform transition-all shadow-2xl flex items-center justify-center gap-2">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
        </svg>
        Hubungi Kami
      </a>
      <a href="https://wa.me/6281234567890" class="bg-[#FFD700] text-[#002080] px-8 py-4 rounded-2xl font-bold text-lg hover:scale-105 transform transition-all shadow-2xl flex items-center justify-center gap-2">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
        Chat WhatsApp
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