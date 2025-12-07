@extends('layouts.main')

@section('title', 'Layanan Umum - RSHP Unair')

@section('content')

<!-- Hero Header -->
<section class="relative bg-gradient-to-br from-[#002080] via-[#0040A0] to-[#00BFA6] text-white py-20 overflow-hidden">
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-[#FFD700] rounded-full blur-3xl"></div>
  </div>
  
  <div class="max-w-6xl mx-auto px-6 relative z-10 text-center">
    <h1 class="text-5xl md:text-6xl font-black mb-6 animate-slideDown">
      ✨ Layanan Umum RSHP
    </h1>
    <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto animate-slideDown delay-100">
      Pelayanan kesehatan hewan terbaik dengan fasilitas modern dan tenaga medis profesional
    </p>
    <div class="mt-8 flex justify-center gap-3 animate-slideDown delay-200">
      <div class="bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full">
        <span class="font-semibold">🏥 Rawat Jalan & Inap</span>
      </div>
      <div class="bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full">
        <span class="font-semibold">💉 Vaksinasi</span>
      </div>
      <div class="bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full">
        <span class="font-semibold">🔬 Pemeriksaan Lab</span>
      </div>
    </div>
  </div>
</section>

<section class="max-w-6xl mx-auto px-6 py-16 leading-relaxed text-gray-700">
  
  <p class="text-center text-lg max-w-3xl mx-auto mb-16 fade-in bg-gradient-to-r from-blue-50 to-teal-50 p-8 rounded-2xl shadow-lg border border-blue-100">
    Rumah Sakit Hewan Pendidikan Universitas Airlangga melakukan berbagai layanan,
    baik atas kehendak klien maupun rujukan dokter hewan praktisi, dengan fasilitas modern
    dan tenaga medis profesional.
  </p>

  {{-- ====== POLIKLINIK ====== --}}
  <div class="mb-16 fade-in">
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white hover:shadow-3xl transition-all duration-500 hover:scale-[1.02]">
      <div class="flex items-center gap-4 mb-6">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-2xl shadow-lg animate-float">
          <img src="https://cdn-icons-png.flaticon.com/128/2968/2968946.png" alt="Poliklinik"
               class="w-12 h-12 brightness-0 invert">
        </div>
        <div>
          <h3 class="text-3xl font-bold gradient-text">Poliklinik</h3>
          <p class="text-sm text-gray-500">Rawat Jalan & Pemeriksaan Umum</p>
        </div>
      </div>
      
      <div class="space-y-4 text-gray-700">
        <p class="leading-relaxed">
          Poliklinik adalah layanan rawat jalan dimana pelayanan kesehatan hewan dilakukan tanpa pasien menginap.
          Melayani tindakan observasi, diagnosis, pengobatan, rehabilitasi medik, serta pelayanan kesehatan lainnya seperti surat keterangan sehat.
        </p>
        <p class="leading-relaxed">
          Pemeriksaan dapat mencakup sitologi, dermatologi, hematologi, radiologi, ultrasonografi, hingga elektrokardiografi.
          Bila diperlukan, pemeriksaan lanjutan dilakukan bekerja sama dengan Fakultas Kedokteran Hewan Universitas Airlangga.
        </p>
        <div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded-lg">
          <p class="text-amber-900 font-medium">
            💡 Kami juga menyediakan rapid test untuk penyakit berbahaya pada hewan seperti panleukopenia, calicivirus,
            rhinotracheitis, FIP pada kucing, serta parvovirus dan canine distemper pada anjing.
          </p>
        </div>

        <div class="mt-6">
          <h4 class="font-bold text-lg text-gray-800 mb-4 flex items-center gap-2">
            <span class="w-1 h-6 bg-gradient-to-b from-[#00BFA6] to-[#002080] rounded-full"></span>
            Layanan Kesehatan Hewan di Poliklinik:
          </h4>
          <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-3">
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-md hover:shadow-lg transition-all hover:-translate-y-1">
              <span class="text-2xl">🏥</span>
              <span class="font-semibold text-gray-700">Rawat jalan</span>
            </div>
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-md hover:shadow-lg transition-all hover:-translate-y-1">
              <span class="text-2xl">💉</span>
              <span class="font-semibold text-gray-700">Vaksinasi</span>
            </div>
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-md hover:shadow-lg transition-all hover:-translate-y-1">
              <span class="text-2xl">📍</span>
              <span class="font-semibold text-gray-700">Akupuntur</span>
            </div>
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-md hover:shadow-lg transition-all hover:-translate-y-1">
              <span class="text-2xl">💊</span>
              <span class="font-semibold text-gray-700">Kemoterapi</span>
            </div>
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-md hover:shadow-lg transition-all hover:-translate-y-1">
              <span class="text-2xl">🏃</span>
              <span class="font-semibold text-gray-700">Fisioterapi</span>
            </div>
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-md hover:shadow-lg transition-all hover:-translate-y-1">
              <span class="text-2xl">🛁</span>
              <span class="font-semibold text-gray-700">Mandi terapi</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- ====== RAWAT INAP ====== --}}
  <div class="mb-16 fade-in delay-200">
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white hover:shadow-3xl transition-all duration-500 hover:scale-[1.02]">
      <div class="flex items-center gap-4 mb-6">
        <div class="bg-gradient-to-br from-teal-500 to-teal-600 p-4 rounded-2xl shadow-lg animate-float" style="animation-delay: 0.5s;">
          <img src="https://cdn-icons-png.flaticon.com/128/2749/2749678.png" alt="Rawat Inap"
               class="w-12 h-12 brightness-0 invert">
        </div>
        <div>
          <h3 class="text-3xl font-bold gradient-text">Rawat Inap</h3>
          <p class="text-sm text-gray-500">Perawatan Intensif & Observasi 24 Jam</p>
        </div>
      </div>
      
      <div class="space-y-4 text-gray-700">
        <p class="leading-relaxed">
          Rawat inap dilakukan untuk pasien dengan kondisi berat atau membutuhkan perawatan intensif.
          Pasien akan diobservasi dan dirawat di bawah pengawasan dokter serta paramedis yang handal.
        </p>
        <div class="bg-blue-50 border-l-4 border-blue-400 p-5 rounded-lg">
          <p class="text-blue-900 leading-relaxed">
            📋 Sebelum rawat inap, klien wajib mengisi <em class="font-semibold">informed consent</em> dan akan diberi penjelasan
            lengkap tentang kondisi pasien, rencana terapi, serta biaya layanan. RSHP menerima
            pembayaran tunai maupun kartu debit.
          </p>
        </div>
      </div>
    </div>
  </div>

  {{-- ====== BEDAH ====== --}}
  <div class="mb-16 fade-in delay-300">
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white hover:shadow-3xl transition-all duration-500 hover:scale-[1.02]">
      <div class="flex items-center gap-4 mb-6">
        <div class="bg-gradient-to-br from-red-500 to-red-600 p-4 rounded-2xl shadow-lg animate-float" style="animation-delay: 1s;">
          <img src="https://cdn-icons-png.flaticon.com/128/15090/15090889.png" alt="Bedah"
               class="w-12 h-12 brightness-0 invert">
        </div>
        <div>
          <h3 class="text-3xl font-bold gradient-text">Tindakan Bedah</h3>
          <p class="text-sm text-gray-500">Bedah Minor & Mayor</p>
        </div>
      </div>
      
      <div class="grid md:grid-cols-2 gap-6">
        <!-- Bedah Minor -->
        <div class="bg-gradient-to-br from-red-50 to-orange-50 p-6 rounded-2xl border border-red-100">
          <h4 class="font-bold text-xl text-red-800 mb-4 flex items-center gap-2">
            <span class="text-2xl">🔪</span>
            Bedah Minor
          </h4>
          <ul class="space-y-2">
            <li class="flex items-start gap-2">
              <span class="text-red-500 mt-1">✓</span>
              <span>Jahit luka</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-red-500 mt-1">✓</span>
              <span>Kastrasi</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-red-500 mt-1">✓</span>
              <span>Othematoma</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-red-500 mt-1">✓</span>
              <span>Scaling – root planning</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-red-500 mt-1">✓</span>
              <span>Ekstraksi gigi</span>
            </li>
          </ul>
        </div>

        <!-- Bedah Mayor -->
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-2xl border border-purple-100">
          <h4 class="font-bold text-xl text-purple-800 mb-4 flex items-center gap-2">
            <span class="text-2xl">⚕️</span>
            Bedah Mayor
          </h4>
          <ul class="space-y-2">
            <li class="flex items-start gap-2">
              <span class="text-purple-500 mt-1">✓</span>
              <span>Gastrotomi, Entrotomi, Enterektomi</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-purple-500 mt-1">✓</span>
              <span>Ovariohisterektomi, Sectio caesar</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-purple-500 mt-1">✓</span>
              <span>Sistotomi, Urethrostomi</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-purple-500 mt-1">✓</span>
              <span>Fraktur tulang</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-purple-500 mt-1">✓</span>
              <span>Hernia (diafragmatika, perinealis)</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-purple-500 mt-1">✓</span>
              <span>Eksisi tumor</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  {{-- ====== PEMERIKSAAN ====== --}}
  <div class="mb-16 fade-in delay-400">
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white hover:shadow-3xl transition-all duration-500 hover:scale-[1.02]">
      <div class="flex items-center gap-4 mb-6">
        <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 p-4 rounded-2xl shadow-lg animate-float" style="animation-delay: 1.5s;">
          <img src="https://cdn-icons-png.flaticon.com/128/1934/1934474.png" alt="Pemeriksaan"
               class="w-12 h-12 brightness-0 invert">
        </div>
        <div>
          <h3 class="text-3xl font-bold gradient-text">Pemeriksaan Diagnostik</h3>
          <p class="text-sm text-gray-500">Laboratorium & Imaging</p>
        </div>
      </div>
      
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-gradient-to-br from-indigo-50 to-blue-50 p-5 rounded-xl border border-indigo-100 hover:shadow-lg transition-all hover:-translate-y-1">
          <div class="flex items-center gap-3 mb-2">
            <span class="text-3xl">🔬</span>
            <h4 class="font-bold text-indigo-900">Sitologi</h4>
          </div>
          <p class="text-sm text-gray-600">Pemeriksaan sel</p>
        </div>
        
        <div class="bg-gradient-to-br from-pink-50 to-rose-50 p-5 rounded-xl border border-pink-100 hover:shadow-lg transition-all hover:-translate-y-1">
          <div class="flex items-center gap-3 mb-2">
            <span class="text-3xl">🧬</span>
            <h4 class="font-bold text-pink-900">Dermatologi</h4>
          </div>
          <p class="text-sm text-gray-600">Pemeriksaan kulit</p>
        </div>
        
        <div class="bg-gradient-to-br from-red-50 to-orange-50 p-5 rounded-xl border border-red-100 hover:shadow-lg transition-all hover:-translate-y-1">
          <div class="flex items-center gap-3 mb-2">
            <span class="text-3xl">🩸</span>
            <h4 class="font-bold text-red-900">Hematologi</h4>
          </div>
          <p class="text-sm text-gray-600">Pemeriksaan darah</p>
        </div>
        
        <div class="bg-gradient-to-br from-purple-50 to-violet-50 p-5 rounded-xl border border-purple-100 hover:shadow-lg transition-all hover:-translate-y-1">
          <div class="flex items-center gap-3 mb-2">
            <span class="text-3xl">📸</span>
            <h4 class="font-bold text-purple-900">Radiografi</h4>
          </div>
          <p class="text-sm text-gray-600">Rontgen X-Ray</p>
        </div>
        
        <div class="bg-gradient-to-br from-teal-50 to-cyan-50 p-5 rounded-xl border border-teal-100 hover:shadow-lg transition-all hover:-translate-y-1">
          <div class="flex items-center gap-3 mb-2">
            <span class="text-3xl">📡</span>
            <h4 class="font-bold text-teal-900">USG</h4>
          </div>
          <p class="text-sm text-gray-600">Ultrasonografi</p>
        </div>
        
        <div class="bg-gradient-to-br from-amber-50 to-yellow-50 p-5 rounded-xl border border-amber-100 hover:shadow-lg transition-all hover:-translate-y-1">
          <div class="flex items-center gap-3 mb-2">
            <span class="text-3xl">💓</span>
            <h4 class="font-bold text-amber-900">EKG</h4>
          </div>
          <p class="text-sm text-gray-600">Elektrokardiografi</p>
        </div>
      </div>
    </div>
  </div>

  {{-- ====== GROOMING ====== --}}
  <div class="mb-8 fade-in delay-500">
    <div class="glass rounded-3xl p-8 shadow-2xl border border-white hover:shadow-3xl transition-all duration-500 hover:scale-[1.02]">
      <div class="flex items-center gap-4 mb-6">
        <div class="bg-gradient-to-br from-pink-500 to-pink-600 p-4 rounded-2xl shadow-lg animate-float" style="animation-delay: 2s;">
          <img src="https://cdn-icons-png.flaticon.com/128/823/823990.png" alt="Grooming"
               class="w-12 h-12 brightness-0 invert">
        </div>
        <div>
          <h3 class="text-3xl font-bold gradient-text">Grooming</h3>
          <p class="text-sm text-gray-500">Perawatan Kebersihan & Kecantikan</p>
        </div>
      </div>
      
      <div class="space-y-4">
        <p class="text-gray-700 leading-relaxed">
          Selain layanan medis, RSHP Universitas Airlangga juga menyediakan layanan grooming
          bagi hewan kesayangan Anda, dilakukan oleh tenaga berpengalaman dengan memperhatikan
          kenyamanan dan kebersihan hewan secara menyeluruh.
        </p>
        
        <div class="flex flex-wrap gap-3 mt-4">
          <span class="bg-gradient-to-r from-pink-100 to-rose-100 text-pink-800 px-4 py-2 rounded-full text-sm font-semibold">✂️ Hair Cut</span>
          <span class="bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold">🛁 Bath</span>
          <span class="bg-gradient-to-r from-purple-100 to-violet-100 text-purple-800 px-4 py-2 rounded-full text-sm font-semibold">💅 Nail Trim</span>
          <span class="bg-gradient-to-r from-amber-100 to-yellow-100 text-amber-800 px-4 py-2 rounded-full text-sm font-semibold">👂 Ear Cleaning</span>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- CTA Section --}}
<section class="bg-gradient-to-r from-[#002080] to-[#00BFA6] text-white py-16 mb-0">
  <div class="max-w-4xl mx-auto text-center px-6">
    <h2 class="text-4xl font-black mb-4">Siap Merawat Hewan Kesayangan Anda?</h2>
    <p class="text-xl text-blue-100 mb-8">Hubungi kami atau lakukan reservasi online sekarang!</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="#" class="bg-white text-[#002080] px-8 py-4 rounded-2xl font-bold text-lg hover:scale-105 transform transition-all shadow-2xl">
        📞 Hubungi Kami
      </a>
      <a href="{{ route('register') }}" class="bg-[#FFD700] text-[#002080] px-8 py-4 rounded-2xl font-bold text-lg hover:scale-105 transform transition-all shadow-2xl">
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