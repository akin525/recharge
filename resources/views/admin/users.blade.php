@include('admin.layouts.sidebar')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-4">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="fa fa-users"></i></h1>

                            <h6 class="text-white">{{ number_format($t_users) ?? 'Total users' }}</h6>
                            <h6 class="text-white">Total Users</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="fa fa-users"></i></h1>
                            <h6 class="text-white">{{ number_format($res) ?? 'Total reseller' }}</h6>
                            <h6 class="text-white">Total Reseller</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-4">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><i class="fa fa-users"></i></h1>
                            <h6 class="text-white">{{ number_format($r_users) ?? 'Total Referred' }}</h6>
                            <h6 class="text-white">Total Referred</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Users Table</h4>
                    <p class="text-muted mb-4 font-13">Use <code>pencil icon</code> to view user profile.</p>
                    <div class="table-responsive">
                        <table  class="table table-striped table-bordered align-middle">
                            <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone-No</th>
                                <th>Balance</th>
                                <th>Full-Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user )
                                <tr>
                                    <td>
                                            <img width="50" src="{{asset("samso.png")}}" alt="" class="rounded-circle thumb-sm mr-1"> {{$user->username}}
                                    </td>
{{--                                    <td>₦{{$user->balance}}</td>--}}
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>₦{{number_format(intval($user->wallet *1), 2)}}</td>
                                    <td>{{$user->name}}</td>
                                    <td><a href="profile/{{ $user->username }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                        <a href="delete/{{ $user->id}}" class="btn btn-sm btn-success"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}

                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@include('layouts.footer')
