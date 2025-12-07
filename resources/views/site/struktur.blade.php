@extends('layouts.main')

@section('title', 'Struktur Organisasi - RSHP Unair')

@section('content')

<!-- Hero Header -->
<section class="relative bg-gradient-to-br from-[#002080] via-[#0040A0] to-[#00BFA6] text-white py-20 overflow-hidden">
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-10 right-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 left-10 w-96 h-96 bg-[#FFD700] rounded-full blur-3xl"></div>
  </div>
  
  <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
    <div class="inline-block bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full mb-6 animate-slideDown">
      <span class="font-semibold">🏛️ Kepemimpinan & Manajemen</span>
    </div>
    <h1 class="text-5xl md:text-6xl font-black mb-6 animate-slideDown delay-100">
      Struktur Organisasi
    </h1>
    <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto animate-slideDown delay-200">
      Tim profesional yang berdedikasi untuk pelayanan kesehatan hewan terbaik
    </p>
  </div>
</section>

<section class="max-w-7xl mx-auto px-6 py-16">
  
  <!-- Intro Text -->
  <div class="max-w-4xl mx-auto text-center mb-16 fade-in">
    <p class="text-lg text-gray-700 leading-relaxed">
      RSHP Universitas Airlangga dipimpin oleh tim manajemen yang berpengalaman dan 
      berkomitmen untuk memberikan pelayanan kesehatan hewan yang berkualitas tinggi, 
      sekaligus menjadi pusat pendidikan dan penelitian veteriner yang unggul.
    </p>
  </div>

  <!-- Organization Chart -->
  <div class="space-y-12">
    
    <!-- DIREKTUR - Top Level -->
    <div class="flex justify-center fade-in delay-100">
      <div class="glass rounded-3xl overflow-hidden shadow-3xl border border-white hover:shadow-4xl transition-all duration-500 w-full max-w-md group">
        <div class="relative">
          <!-- Ribbon -->
          <div class="absolute top-6 -left-1 bg-gradient-to-r from-amber-500 to-amber-600 text-white px-8 py-2 rounded-r-lg shadow-lg z-10 font-bold text-sm">
            👑 DIREKTUR
          </div>
          
          <!-- Photo -->
          <div class="h-96 w-full overflow-hidden relative">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <img src="https://unair.ac.id/wp-content/uploads/2024/04/Direktur-RSHP.webp"
                 alt="Direktur RSHP"
                 class="w-full h-full object-cover object-top transform group-hover:scale-110 transition-transform duration-700">
          </div>
          
          <!-- Info -->
          <div class="p-8 text-center bg-gradient-to-br from-white to-blue-50">
            <div class="mb-3">
              <span class="inline-block bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-1 rounded-full text-sm font-bold shadow-md">
                Direktur
              </span>
            </div>
            <h3 class="text-2xl font-black gradient-text mb-2">
              Dr. Ira Sari Yudaniayanti
            </h3>
            <p class="text-gray-600 text-sm">drh., M.P.</p>
            
            <!-- Divider -->
            <div class="w-20 h-1 bg-gradient-to-r from-transparent via-[#00BFA6] to-transparent mx-auto mt-4"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Connector Line -->
    <div class="flex justify-center fade-in delay-200">
      <div class="w-1 h-16 bg-gradient-to-b from-[#002080] via-[#00BFA6] to-transparent rounded-full"></div>
    </div>

    <!-- WAKIL DIREKTUR - Second Level -->
    <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto fade-in delay-300">
      
      <!-- WAKIL DIREKTUR I -->
      <div class="glass rounded-3xl overflow-hidden shadow-2xl border border-white hover:shadow-3xl transition-all duration-500 group">
        <div class="relative">
          <!-- Ribbon -->
          <div class="absolute top-6 -left-1 bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-2 rounded-r-lg shadow-lg z-10 font-bold text-sm">
            📋 WADIR I
          </div>
          
          <!-- Photo -->
          <div class="h-80 w-full overflow-hidden relative">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <img src="data:image/webp;base64,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"
                 alt="Wakil Direktur I"
                 class="w-full h-full object-cover object-top transform group-hover:scale-110 transition-transform duration-700">
          </div>
          
          <!-- Info -->
          <div class="p-6 bg-gradient-to-br from-white to-teal-50">
            <div class="mb-3">
              <span class="inline-block bg-gradient-to-r from-teal-600 to-teal-700 text-white px-4 py-1 rounded-full text-xs font-bold shadow-md">
                Wakil Direktur I
              </span>
            </div>
            
            <div class="mb-3">
              <p class="text-sm text-gray-600 font-semibold leading-relaxed">
                Pelayanan Medis, Pendidikan dan Penelitian
              </p>
            </div>
            
            <h3 class="text-xl font-black gradient-text mb-1">
              Dr. Nusdianto Triakoso
            </h3>
            <p class="text-gray-600 text-sm">M.P., drh.</p>
            
            <!-- Responsibilities -->
            <div class="mt-4 pt-4 border-t border-gray-200">
              <p class="text-xs text-gray-500 font-semibold mb-2">Bidang Tanggung Jawab:</p>
              <div class="flex flex-wrap gap-2">
                <span class="bg-teal-100 text-teal-800 text-xs px-3 py-1 rounded-full">🏥 Pelayanan Medis</span>
                <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full">📚 Pendidikan</span>
                <span class="bg-purple-100 text-purple-800 text-xs px-3 py-1 rounded-full">🔬 Penelitian</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- WAKIL DIREKTUR II -->
      <div class="glass rounded-3xl overflow-hidden shadow-2xl border border-white hover:shadow-3xl transition-all duration-500 group">
        <div class="relative">
          <!-- Ribbon -->
          <div class="absolute top-6 -left-1 bg-gradient-to-r from-purple-500 to-purple-600 text-white px-6 py-2 rounded-r-lg shadow-lg z-10 font-bold text-sm">
            💼 WADIR II
          </div>
          
          <!-- Photo -->
          <div class="h-80 w-full overflow-hidden relative">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <img src="https://e-journal.unair.ac.id/public/site/images/admin/197602222015043201-1625241368.jpg"
                 alt="Wakil Direktur II"
                 class="w-full h-full object-cover object-top transform group-hover:scale-110 transition-transform duration-700">
          </div>
          
          <!-- Info -->
          <div class="p-6 bg-gradient-to-br from-white to-purple-50">
            <div class="mb-3">
              <span class="inline-block bg-gradient-to-r from-purple-600 to-purple-700 text-white px-4 py-1 rounded-full text-xs font-bold shadow-md">
                Wakil Direktur II
              </span>
            </div>
            
            <div class="mb-3">
              <p class="text-sm text-gray-600 font-semibold leading-relaxed">
                Sumber Daya Manusia, Sarana Prasarana dan Keuangan
              </p>
            </div>
            
            <h3 class="text-xl font-black gradient-text mb-1">
              Dr. Miyayu Soneta S.
            </h3>
            <p class="text-gray-600 text-sm">M.Vet., drh.</p>
            
            <!-- Responsibilities -->
            <div class="mt-4 pt-4 border-t border-gray-200">
              <p class="text-xs text-gray-500 font-semibold mb-2">Bidang Tanggung Jawab:</p>
              <div class="flex flex-wrap gap-2">
                <span class="bg-purple-100 text-purple-800 text-xs px-3 py-1 rounded-full">👥 SDM</span>
                <span class="bg-indigo-100 text-indigo-800 text-xs px-3 py-1 rounded-full">🏗️ Sarana Prasarana</span>
                <span class="bg-amber-100 text-amber-800 text-xs px-3 py-1 rounded-full">💰 Keuangan</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- CTA Section --}}
<section class="bg-gradient-to-r from-[#002080] to-[#00BFA6] text-white py-16 mt-16">
  <div class="max-w-4xl mx-auto text-center px-6">
    <h2 class="text-4xl font-black mb-4">Bergabunglah dengan Tim Kami</h2>
    <p class="text-xl text-blue-100 mb-8">Kami selalu mencari profesional berbakat untuk bergabung dalam tim RSHP UNAIR</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="#" class="bg-white text-[#002080] px-8 py-4 rounded-2xl font-bold text-lg hover:scale-105 transform transition-all shadow-2xl">
        📋 Info Karir
      </a>
      <a href="#" class="bg-[#FFD700] text-[#002080] px-8 py-4 rounded-2xl font-bold text-lg hover:scale-105 transform transition-all shadow-2xl">
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
  .delay-500 { transition-delay: 0.5s; }
  
  .shadow-4xl {
    box-shadow: 0 30px 70px -15px rgba(0, 0, 0, 0.3);
  }
</style>

@endsection