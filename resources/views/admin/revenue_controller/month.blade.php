@extends('template.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Aidat Sorgula</h4>

                    <form method="POST" action="{{ route('admin.revenue.month') }}">
                        <div class="form-group row">
                            <label for="month" class="col-sm-2 col-form-label">Dönem Seçiniz</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="month" id="month">
                                    <option value="Ocak">Ocak</option>
                                    <option value="Şubat">Şubat</option>
                                    <option value="Mart">Mart</option>
                                    <option value="Nisan">Nisan</option>
                                    <option value="Mayıs">Mayıs</option>
                                    <option value="Haziran">Haziran</option>
                                    <option value="Temmuz">Temmuz</option>
                                    <option value="Ağustos">Ağustos</option>
                                    <option value="Eylül">Eylül</option>
                                    <option value="Ekim">Ekim</option>
                                    <option value="Kasım">Kasım</option>
                                    <option value="Aralık">Aralık</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="year" placeholder="2021" required>
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" class="custom-control-input" name="isNotPrice" id="isNotPrice" data-parsley-multiple="groups"
                                       data-parsley-mincheck="2">
                                <label class="custom-control-label" for="isNotPrice">Ödemeyenler</label>
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
