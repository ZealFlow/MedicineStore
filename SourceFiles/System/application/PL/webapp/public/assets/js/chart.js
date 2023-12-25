import Chart from 'chart.js/auto';

// Lấy tham chiếu đến canvas trên trang web
const canvas = document.getElementById('myChart');
const ctx = canvas.getContext('2d');

// Dữ liệu biểu đồ
const chartData = {
  type: 'bar',
  data: {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3],
      borderWidth: 1,
    }],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
};

// Tạo biểu đồ mới
new Chart(ctx, chartData);
