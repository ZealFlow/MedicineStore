<!DOCTYPE html>
<html lang="en">

    <?php   
        include_once('C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\inc\templates\head\head_admin.php');
    ?>

    <body class="app">
        <?php
            include_once('C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\inc\templates\header\header_admin.php');
            include_once('C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\inc\templates\contents\wrapper\chart.php');
            include_once('C:\xampp\htdocs\MedicineStore\SourceFiles\System\application\PL\webapp\inc\templates\footer\footer_admin.php');
        ?>
        <script>
            // Declare myChart outside the functions
            let myChart;

            // Get the canvas element and the data-order attribute
            const canvas = document.getElementById('myChart');
            const dataOrder = JSON.parse(canvas.getAttribute('data-order'));

            // Separate dates and values into two arrays
            const dates = Object.keys(dataOrder);
            const values = Object.values(dataOrder).map(Number);

            // Dùng mảng dates và values trong Chart.js
            const chartData = {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Order',
                        data: values,
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

            // Hàm JavaScript để lấy giá trị ngày từ ô input
            function filterByDateRange() {
                var startDate = document.getElementById('startDate').value;
                var endDate = document.getElementById('endDate').value;

                // Gọi hàm để cập nhật biểu đồ với khoảng thời gian từ startDate đến endDate
                updateChart(startDate, endDate);
            }

            function getDates(startDate, endDate) {
                let dateArray = [];
                let currentDate = new Date(startDate);

                while (currentDate <= new Date(endDate)) {
                    dateArray.push(currentDate.toISOString().split('T')[0]); // Format as YYYY-MM-DD
                    currentDate.setDate(currentDate.getDate() + 1);
                }

                return dateArray;
            }

            // Hàm cập nhật biểu đồ với khoảng thời gian từ startDate đến endDate
            function updateChart(startDate, endDate) {
                // Logic để lấy dữ liệu mới dựa trên khoảng thời gian và cập nhật nhãn
                // Đây là nơi bạn có thể thực hiện AJAX để lấy dữ liệu mới từ máy chủ
                // Trong ví dụ này, tôi sẽ chỉ đơn giản in ra các giá trị của ngày bắt đầu và kết thúc
                console.log('Ngày bắt đầu:', startDate);
                console.log('Ngày kết thúc:', endDate);

                // Cập nhật nhãn và dữ liệu biểu đồ
                chartData.data.labels = getDates(startDate, endDate);
                chartData.data.datasets[0].data = [5, 10, 8, 15, 7, 12];

                // Cập nhật biểu đồ
                myChart.data = chartData.data;
                myChart.update();
            }

            // Tạo biểu đồ mới
            const ctx = canvas.getContext('2d');
            myChart = new Chart(ctx, chartData);
        </script>

    </body>

</html>
