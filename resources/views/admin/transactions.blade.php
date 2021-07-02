@extends('template.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Basic example</h4>
                    <p class="text-muted m-b-30 font-14">For basic styling—light padding and
                        only horizontal dividers—add the base class <code>.table</code> to any
                        <code>&lt;table&gt;</code>.
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tarih & Saat</th>
                                <th>İşlemi Gerçekleştiren</th>
                                <th>İşlem Detayı</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <th scope="row">{{ $transaction->id }}</th>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>{{ $transaction->getAdmin->name }}</td>
                                    <td>{{ $transaction->description }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $transactions->links() }}
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
