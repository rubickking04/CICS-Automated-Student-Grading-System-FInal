@extends('admin.layouts.sidebar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow" style="border-radius:20px;">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="chart" style="height: 300px;"></div>
                        <!-- Your application script -->
                    @push('js')
                    <script>
                        const chart = new Chartisan({
                            el: '#chart',
                            url: "@chart('my_charts')",
                            hooks: new ChartisanHooks()
                                .legend()
                                .colors()
                                .tooltip(),
                        });
                    </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
