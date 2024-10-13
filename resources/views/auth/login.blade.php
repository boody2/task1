@extends('layout.page-app')
@section('body')
    <div class="container position-sticky z-index-sticky top-0">
    </div>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>

                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="text-start">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name='password' class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign
                                            in</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="copyright text-center text-sm text-white text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart" aria-hidden="true"></i> by
                            <a href="https://www.linkedin.com/in/abdelrahman-talaat2019" class="font-weight-bold text-white"
                                target="_blank">Eng. Abdelrahman Talaat.</a>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </main>
@endsection
@section('script')
    @error('login')
        <script>
            console.log("ss");
            toastr.error("{{ $message }}", 'Failed');
        </script>
    @enderror
    @error('email')
        <script>
            console.log("ss");
            toastr.error("{{ $message }}", 'Failed');
        </script>
    @enderror
    @error('password')
        <script>
            console.log("ss");
            toastr.error("{{ $message }}", 'Failed');
        </script>
    @enderror
@endsection
