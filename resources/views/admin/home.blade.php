@extends('admin.layouts.sidebar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow" style="border-radius:20px;">
                <div class="card-body h-auto">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="chart" style="height:300px; @media only screen and (max-width: 400px) { height:50px;}"></div>
                    <!-- Your application script -->
                    @push('js')
                    <script>
                        const chart = new Chartisan({
                            el: '#chart',
                            url: "@chart('my_charts')",
                            hooks: new ChartisanHooks()
                                .legend({ top:5 })
                                .tooltip()
                                .datasets('pie'),
                        });
                    </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
