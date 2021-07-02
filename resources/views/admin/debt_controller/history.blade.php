@extends('template.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Textual inputs</h4>
                    <div class="table-responsive">
                        @foreach($user->getDebts as $debt)
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th rowspan="2">Borç Alış Detayı</th>
                                    <th>Alış tarihi</th>
                                    <th>Miktarı</th>
                                    <th style="width: 150px;">Durum</th>
                                </tr>
                                <tr>
                                    <td>{{ date('d/m/Y H:i', strtotime($debt->date)) }}</td>
                                    <td>{{ $debt->debt }}</td>
                                    <td>
                                        <span class="badge badge-{{ ($debt->status) ? 'success' :'warning' }}">
                                            {{ ($debt->status) ? 'Tamamlandı' : 'Tamamlanmadı' }}
                                        </span>
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th rowspan="{{ count($debt->getPayments) + 1 }}">Borç Ödeme Detayı</th>
                                    <th>Ödeme tarihi</th>
                                    <th>Miktarı</th>
                                    <th>Açıklama</th>
                                </tr>
                                @foreach($debt->getPayments as $payment)
                                    <tr>
                                        <td>{{ date('d/m/Y H:i', strtotime($payment->date)) }}</td>
                                        <td>{{ $payment->payment }}</td>
                                        <td>{{ $payment->comment }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
