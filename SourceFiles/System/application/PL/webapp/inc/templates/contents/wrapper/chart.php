<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            
            <form action="/SourceFiles/System/application/PL/controllers/ChartController.php" class="date-filter mt-3" id="data" method="get">
                <label for="startDate" class="form-label">Ngày bắt đầu:</label>
                <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo isset($_GET['startDate']) ? htmlspecialchars($_GET['startDate']) : ''; ?>">

                <label for="endDate" class="form-label">Ngày kết thúc:</label>
                <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo isset($_GET['endDate']) ? htmlspecialchars($_GET['endDate']) : ''; ?>">

                <!-- Nút "Hiển thị" -->
                <button type="submit" class="btn btn-primary show-button" onclick="filterByDateRange()">Hiển thị</button>
            </form>
            
            <canvas id="myChart" class="mt-3" data-order='<?php echo json_encode($_SESSION['ordersCountArray']); ?>'></canvas>

        </div>
    </div>
</div>
