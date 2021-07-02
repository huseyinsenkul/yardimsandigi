@extends('template.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Aidat Sorgula</h4>

                    <form method="POST" action="{{ route('admin.revenue.search') }}">
                        <div class="form-group row">
                            <label for="user" class="col-sm-2 col-form-label">Üye Seçiniz</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="user" id="user">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">Sorgula</button>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
