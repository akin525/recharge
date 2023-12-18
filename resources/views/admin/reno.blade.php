@include('admin.layouts.sidebar')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {{ session('error') }}
                        </div>
                    @endif
                    <p class="text-muted mb-4 font-13">Renomobilemoney Selling Price</p>
                        <div class="table-responsive">
                            <table id="data-table-buttons" class="table table-striped table-bordered align-middle">
                                <thead>
                        <tr>
                            <th>Network</th>
                            <th>Plan</th>
                            <th>Reno Amount</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $seller)
                            <tr>
                                <link rel="stylesheet" href="{{asset('style.css')}}">
                                <!--Only for demo purpose - no need to add.-->
                                <link rel="stylesheet" href="{{asset('demo.css')}}"/>
                                <td> {{$seller->network}} </td>
                                <td> {{$seller->plan}}</td>
                                <td> {{$seller->ramount}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$product->links()}}

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@include('layouts.footer')
