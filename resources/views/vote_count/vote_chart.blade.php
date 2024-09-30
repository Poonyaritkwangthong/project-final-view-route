@extends('layouts.user')

@section('title')
Vote Result Page
@endsection

@section('content')
<div>
    <h1 class="text-[30px] font-heading font-bold ml-10 text-center my-10">ผลสรุปจำนวนคนที่โหวด</h1>
</div>


    <div class="flex items-center gap-4 p-4">

    <!--สรุปผล-->
    <div class="w-[70%] mx-auto">
            <h1></h1>
            <canvas id="voteChart"></canvas>
    </div>
    <!--สรุปผล-->



</div>
</body>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('voteChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [
                    {
                        label: 'จำนวนเห็นด้วย',
                        data: @json($data_agree),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'จำนวนไม่เห็นด้วย',
                        data: @json($data_disagree),
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
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

</html>

@endsection

