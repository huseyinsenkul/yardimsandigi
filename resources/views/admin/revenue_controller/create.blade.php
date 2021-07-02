@extends('template.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Aidat Tahsilatı</h4>

                    <form method="POST" action="{{ route('admin.revenue.store') }}">
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

                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Aidat Miktarı</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="price" id="price" placeholder="250"
                                       required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Dönem</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="month" value="{{ date('m') }}" readonly>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="year" value="{{ date('Y') }}" readonly>
                            </div>
                        </div>

                        <input type="hidden" class="form-control" name="date" id="date"
                               value="{{ date('Y-m-d') }}" required>
                        @csrf
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
