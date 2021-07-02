@extends('template.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Üye Adına Göre Sorgulama</h4>

                    <div class="table-responsive table-bordered">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>Adı Soyadı</th>
                                <th>Aidat Miktarı</th>
                                <th>Dönem</th>
                                <th>Aidat Tarihi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($revenues as $revenue)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $revenue->price }}</td>
                                    <td>{{ $revenue->month }} / {{ $revenue->year }}</td>
                                    <td>{{ date('d/m/Y', strtotime($revenue->date)) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
