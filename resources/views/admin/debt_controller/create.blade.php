@extends('template.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.debt.store') }}">
                        <input type="hidden" name="user" value="{{ $user->id }}">
                        <h4 class="mt-0 header-title">Textual inputs</h4>
                        <p><b>{{ $user->name }}</b></p>
                        <p>Mevcut Borç : <b>0</b></p>
                        <p>Alabileceği Borç : <b>{{ $max }}</b></p>
                        <div class="form-group row">
                            <label for="debt" class="col-sm-2 col-form-label">Borç Miktarı</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="debt" id="debt" min="0"
                                       max="{{ $max }}" required>
                            </div>
                        </div>

                        @csrf

                        <button type="submit" class="btn btn-primary">Borç Ver</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
