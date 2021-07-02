@extends('template.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Döneme Göre Sorgulama</h4>

                    <div class="table-responsive table-bordered">
                        @if($price)
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>Adı Soyadı</th>
                                    <th>Aidat Miktarı</th>
                                    <th>Aidat Tarihi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($revenues as $revenue)
                                    <tr>
                                        <td>{{ $revenue->getUser->name }}</td>
                                        <td>{{ $revenue->price }}</td>
                                        <td>{{ date('d/m/Y', strtotime($revenue->date)) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>Adı Soyadı</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($odemeyenler as $odemeyen)
                                    <tr>
                                        <td>{{ $odemeyen }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
