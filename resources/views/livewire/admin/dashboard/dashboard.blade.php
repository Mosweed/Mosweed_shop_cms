<div
    class="min-h-screen antialiased font-normal fi-body fi-panel-admin bg-gray-50 text-gray-950 dark:bg-gray-950 dark:text-white">
<div class="max-w-screen-lg w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6 m-auto">
    <div class="flex justify-between items-start w-full">
        <div class="flex-col items-center">
            <div class="flex items-center mb-1">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">
                    Overview</h5>
            </div>
        </div>
    </div>

    <!-- Line Chart -->
    <div class="py-6">
        <canvas id="combinedChart" width="400" height="200"></canvas>
    </div>
</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('combinedChart').getContext('2d');
    var userData = @json($userData);
    var couponData = @json($couponData);
    var productData = @json($productData);

    var labels = userData.map(function (item) {
        return item.date;
    });

    var userCounts = userData.map(function (item) {
        return item.count;
    });

    var couponCounts = couponData.map(function (item) {
        return item.count;
    });

    var productCounts = productData.map(function (item) {
        return item.count;
    });

    var combinedChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Users',
                    data: userCounts,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'Coupons',
                    data: couponCounts,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderWidth: 1
                },
                {
                    label: 'Products',
                    data: productCounts,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>