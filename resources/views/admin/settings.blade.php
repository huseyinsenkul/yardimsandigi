@extends('template.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form method="POST" action="#">
                        <h4 class="mt-0 header-title">Textual inputs</h4>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Hisse bedeli</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Hissenin kaç katı alınabilir?</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Bir üye sandığın kaçta birini alabilir?</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Alınabilecek tavan bedel nedir?</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Sandığın toplam kar payı ne kadardır?</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Sandığın toplam altını ne kadardır?</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
