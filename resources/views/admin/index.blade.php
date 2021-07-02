@extends('template.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Sandık Genel Bilgileri</h4>

                    <div class="table-responsive table-bordered">
                        <table class="table mb-0">
                            <tbody>
                            <tr>
                                <th scope="row">Üye Sayısı</th>
                                <td>{{ count($users) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Sandıkta Biriken Toplam Para</th>
                                <td>{{ $total_price }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nakit Para Miktarı</th>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">Üyelerdeki Para Miktarı</th>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">En Az Birikim Miktarı</th>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">En Çok Birikim Miktarı</th>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">Sandığın Toplam Kar Miktarı</th>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">Altın Miktarı(Gram)</th>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope="row">Toplam Verilen Borç Miktarı</th>
                                <td>0</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Üyelerin Katılım Miktarları</h4>

                    <div class="table-responsive table-bordered">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>Adı Soyadı</th>
                                <th>Birikim Miktarı</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->name }}</th>
                                    <td>{{ $users_total[$user->id] }} TL</td>
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
