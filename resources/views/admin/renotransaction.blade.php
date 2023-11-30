@include('admin.layouts.sidebar')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>RENO Transaction</h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                        <th class="table-active">id</th>
                        <th>Plan</th>
                        <th>Amount</th>
                        <th>Number</th>
                        <th>Refid</th>
                        <th>Date</th>
                        </thead>
                        <tbody>
                       @foreach ($success as $plan)
                        <tr>
                            <td>{{$plan['id'] }}</td>
                            <td>{{ $plan['product'] }}</td>
                            <td>{{ $plan['amount'] }}</td>
                            <td>{{ $plan['number']}}</td>
                            <td>{{ $plan['transactionid'] }}</td>
                            <td>{{ $plan['timestamp'] }}</td>
                        </tr>
                       @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- this page js -->
<script src="{{asset('assets/libs/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{asset('dist/js/pages/calendar/cal-init.js')}}"></script>
<script src="{{asset('assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
<script src="{{asset('assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
<script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script>
@include('layouts.footer')
