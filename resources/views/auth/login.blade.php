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
                            <button class="btn btn-success" type="button" onclick="window.location='{{route('register')}}'">Signup here</button>
                        </center>
                    </div>
                    <br>
                    <!-- Form -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal m-t-20" id="loginform" method="POST" action="{{ route('login') }}">
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
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-warning text-white" id="basic-addon2" onclick="togglePasswordVisibility()"> <i class="fa fa-eye"></i></span>
{{--                            <span class="show-password-btn" onclick="togglePasswordVisibility()">👁️</span>--}}
                        </div>
                        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="">

                    </div>
                </div>
            </div>
            <div class="row border-top border-secondary">
                <div class="col-12">
                    <div class="form-group">
                        <div class="p-t-20">
                            <a href="{{ route('password.request') }}" class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> Lost password?</a>
                            <button class="btn btn-success float-right" type="submit">Login</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var btn = document.querySelector('.show-password-btn');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                btn.textContent = '👁️';
            } else {
                passwordInput.type = 'password';
                btn.textContent = '👁️';
            }
        }
    </script>
    <script>
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $('#to-login').click(function(){

            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    </script>
</x-guest-layout>
