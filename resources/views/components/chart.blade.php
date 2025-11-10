<div class="bg-white p-6 rounded-xl shadow-md">
  <h3 class="text-lg font-semibold mb-4 text-[#002080]">📊 Data Kunjungan</h3>
  <canvas id="visitorChart" height="120"></canvas>
</div>

<script>
const ctx = document.getElementById('visitorChart');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
    datasets: [{
      label: 'Jumlah Kunjungan',
      data: [45, 60, 70, 90, 80, 100],
      borderColor: '#002080',
      backgroundColor: 'rgba(0,32,128,0.1)',
      tension: 0.4,
      fill: true
    }]
  },
  options: {
    plugins: { legend: { display: false } },
    scales: { y: { beginAtZero: true } }
  }
});
</script>
