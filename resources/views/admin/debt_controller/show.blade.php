@extends('template.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Textual inputs</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Yapılan Ödeme</th>
                                <th>Açıklama</th>
                                <th>Ödeme Tarihi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($debt->getPayments as $payment)
                                <tr>
                                    <td>{{ $payment->payment }}</td>
                                    <td>{{ $payment->comment }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($payment->date)) }}</td>
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
