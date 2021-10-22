<div class="card card-info" style="width:100%">
            <div class="card-header">
                <h3 class="card-title">Line Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                </div>
            
            </div>
            <div class="card-body">
                <div class="chart" id="chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                
            </div>
            <!-- /.card-body -->
</div>
@widget('map')
        <!-- Charting library -->
        <script src="{{ url('../AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
        <!-- Chartisan -->
        <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

            <!-- Your application script -->
            <script>
            const chart = new Chartisan({
                el: '#chart',
                url: "{{route('dashboard.chart')}}",
                hooks: new ChartisanHooks()
                    .colors()
                    .borderColors()
                    .responsive()
                    .beginAtZero()
                    .legend({ position: 'bottom' })
                    .title('This is a sample chart using chartisan!')
                    .datasets([{ type: 'line', fill: false }, 'line']),
            });
        </script>
        </div>
    </div>