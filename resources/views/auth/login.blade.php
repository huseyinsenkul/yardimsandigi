@extends('template.auth')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mt-0 m-b-15">
                        <a href="#" class="logo logo-admin"><img
                                src="{{ asset('assets/images/logo-dark.png') }}" height="30" alt="logo"></a>
                    </h3>

                    <h4 class="text-muted text-center font-18"><b>Giriş Sayfası</b></h4>

                    <div class="p-2">
                        <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="email" name="email" placeholder="E-Posta">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password" name="password" placeholder="Şifre">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-2">
                                    <label class="unselectable">{{ $captcha }}</label>
                                </div>
                                <div class="col-10">
                                    <input class="form-control" type="hidden" name="captcha" value="{{ $captcha }}">
                                    <input class="form-control" type="text" name="captcha_v" placeholder="" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember"
                                               id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Beni hatırla</label>
                                    </div>
                                </div>
                            </div>
                            @csrf
                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">
                                        Giriş Yap
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
