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
                                <th>İsim Soyisim</th>
                                <th>Alış Tarihi & Saati</th>
                                <th>Borç Miktarı</th>
                                <th>Ödenen</th>
                                <th>Kalan</th>
                                <th>Yeni</th>
                                <th>Ödeme</th>
                                <th>Ö. Detay</th>
                                <th>Geçmiş</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td scope="row">{{ $user->name }}</td>
                                    <td>{{ ($debts[$user->id]) ? date('d/m/Y H:i', strtotime($debts[$user->id]->date)) : '-' }}</td>
                                    <td>{{ ($debts[$user->id]) ? $debts[$user->id]->debt : '-' }}</td>
                                    <td>{{ ($debts[$user->id]) ? $payments[$debts[$user->id]->id] : '-' }}</td>
                                    <td>{{ ($debts[$user->id]) ? ($debts[$user->id]->debt - $payments[$debts[$user->id]->id]) : '-' }}</td>
                                    @if($debts[$user->id])
                                        <td>
                                            <button class="btn btn-secondary" disabled>Yeni</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-{{ ($debts[$user->id]) ? 'primary' : 'secondary' }}"
                                                    onclick="window.location.href = '{{ route('admin.debt.price', [$debts[$user->id]->id, $user->id]) }}'" {{ ($debts[$user->id]) ? '' : 'disabled' }}>
                                                Ödeme
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-{{ ($debts[$user->id]) ? 'primary' : 'secondary' }}"
                                                    onclick="window.location.href = '{{ route('admin.debt.show', $debts[$user->id]->id) }}'" {{ ($debts[$user->id]) ? '' : 'disabled' }}>
                                                Ö. Detay
                                            </button>
                                        </td>
                                    @else
                                        <td>
                                            <button
                                                onclick="window.location.href = '{{ route('admin.debt.create', ['user' => $user->id]) }}'"
                                                class="btn btn-success">Yeni
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" disabled>Ödeme</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary" disabled>Ö. Detay</button>
                                        </td>
                                    @endif
                                    <td>
                                        <button class="btn btn-warning"
                                                onclick="window.location.href = '{{ route('admin.debts.history', $user->id) }}'">
                                            Geçmiş
                                        </button>
                                    </td>
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
