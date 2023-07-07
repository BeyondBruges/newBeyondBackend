@extends('layouts.admin')
@section('content')


@php
    $firstDayofMonth = \Carbon\Carbon::now()->startOfMonth();
    $lastDayofMonth = \Carbon\Carbon::now()->endOfMonth();
    $firstDayofPreviousMonth = \Carbon\Carbon::now()->subMonths(1)->startOfMonth();
    $lastDayofPreviousMonth = \Carbon\Carbon::now()->subMonths(1)->endOfMonth();

    $codes =\App\Models\QRCode::whereBetween('created_at', [$firstDayofMonth, $lastDayofMonth])
    ->get()
    ->groupBy('partner_id');

    foreach ($codes as $partnerId => $qrcodesForPartner) {
    $sum = $qrcodesForPartner->sum('transaction_total');
    $sumb = $qrcodesForPartner->sum('issued_bryghia');
    }

    $previous =\App\Models\QRCode::whereBetween('created_at', [$firstDayofPreviousMonth, $lastDayofPreviousMonth])
    ->get()
    ->groupBy('partner_id');

    foreach ($previous as $partnerId => $prevQrcodesForPartner) {
    $sumAP = $prevQrcodesForPartner->sum('transaction_total');
    $sumBP = $prevQrcodesForPartner->sum('issued_bryghia');
    }

@endphp

<div class="card">
    <div class="card-header">
     Active Months
    </div>

    <div class="card-body">
        <div class="grid">
            {{----}}
            @foreach ($months as $monthName => $qrcodesForMonth)
                <a href="{{ route('admin.qr-codes.monthly', ['month' => $monthName]) }}" class="btn btn-primary">
                    {{ $monthName }}
                </a>
            @endforeach
        </div>
    </div>
</div>




        <div class="card">
    <div class="card-header">
        Current month's issued Bryghia by Partner
    </div>
</center>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-QrCode">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                        </th>
                        <th>
                                Total of transactions (Euro)
                        </th>
                        <th>
                                Total Issued Bryghia
                        </th>
                        <th>
                                Partner
                        </th>
                        <th>
                                Number of transactions
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($codes as $key => $qrCode)

                        <tr>
                            <td>

                            </td>
                            <td>
                                {{$loop->index +1 }}
                            </td>
                            <td>
                                {{ $sum }}
                            </td>
                            <td>
                                {{$sumb}}
                            </td>
                            <td>
                                {{$qrCode->first()->partner->name }}
                            </td>
                            <td>
                                {{$qrCode->count()}}
                            </td>



                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Previous month's issued Bryghia by Partner
    </div>

    <br>
    <center>

</center>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-QrCode">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                        </th>
                        <th>
                                Total of transactions (Euro)
                        </th>
                        <th>
                                Total Issued Bryghia
                        </th>
                        <th>
                                Partner
                        </th>
                        <th>
                                Number of transactions
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($previous as $key => $qrCode)

                        <tr>
                            <td>

                            </td>
                            <td>
                                {{$loop->index +1 }}
                            </td>
                            <td>
                                {{ $sumAP }}
                            </td>
                            <td>
                                {{$sumBP}}
                            </td>
                            <td>
                                {{$qrCode->first()->partner->name }}
                            </td>
                            <td>
                                {{$qrCode->count()}}
                            </td>



                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




{{--
<div class="card">
    <div class="card-header">
        {{ trans('cruds.qrCode.title_singular') }} {{ trans('global.list') }}
    </div>
    <br>
<center>
    <h2>All QR codes over time</h2>
</center>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-QrCode">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.qrCode.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.qrCode.fields.transaction_total') }}
                        </th>
                        <th>
                            {{ trans('cruds.qrCode.fields.issued_bryghia') }}
                        </th>
                        <th>
                            {{ trans('cruds.qrCode.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.qrCode.fields.partner') }}
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($qrCodes as $key => $qrCode)
                        <tr data-entry-id="{{ $qrCode->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $qrCode->id ?? '' }}
                            </td>
                            <td>
                                {{ $qrCode->transaction_total ?? '' }}
                            </td>
                            <td>
                                {{ $qrCode->issued_bryghia ?? '' }}
                            </td>
                            <td>
                                {{ $qrCode->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $qrCode->partner->name ?? '' }}
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
--}}


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('qr_code_delete1')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.qr-codes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-QrCode:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
