<x-guest-layout>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <center>
                            <span class="db"><img src="{{asset('images/logo.jpeg')}}" alt="logo" /></span>
                            <button class="btn btn-success" type="button" onclick="window.location='{{route('login')}}'">Login</button>
                        </center>
                    </div>
                    <br>
                    <!-- Form -->
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('passw') }}">
            @csrf

                        <div class="row p-b-30">
                            <div class="col-12">
                                <x-jet-validation-errors class="alert-danger card-body" />
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" name="email" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-block btn-lg btn-success" type="submit">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
