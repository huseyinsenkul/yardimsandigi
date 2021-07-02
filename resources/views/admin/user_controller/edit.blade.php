@extends('template.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                        <h4 class="mt-0 header-title">Textual inputs</h4>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">İsim Soyisim</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">E-Posta</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Şifre</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name="password" id="password">
                            </div>
                        </div>

                        @csrf
                        @method('PUT')

                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">KULLANICIYI SİL</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
