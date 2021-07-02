@extends('template.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.debt.price', [$debt->id, $user->id]) }}">
                        <input type="hidden" name="user" value="{{ $user->id }}">
                        <input type="hidden" name="debt" value="{{ $debt->id }}">
                        <h4 class="mt-0 header-title">Textual inputs</h4>
                        <p><b>{{ $user->name }}</b></p>
                        <p>Alınan Borç : <b>{{ $debt->debt }}</b></p>
                        <p>Ödenen Borç : <b>{{ $paid }}</b></p>
                        <p>Kalan Borç : <b>{{ $debt->debt - $paid }}</b></p>
                        <div class="form-group row">
                            <label for="payment" class="col-sm-2 col-form-label">Ödeme</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="payment" id="payment" min="0"
                                       max="{{ $debt->debt - $paid }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-sm-2 col-form-label">Açıklama</label>
                            <div class="col-sm-10">
                                <textarea name="comment" id="comment" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        @csrf

                        <button type="submit" class="btn btn-primary">Ödeme Al</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
