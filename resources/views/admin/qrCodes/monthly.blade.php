@extends('layouts.admin')
@section('content')


@php
    $totaleuro = 0;
    $totalbryghia = 0;
    $totaltransactions = 0;

        $date = \Carbon\Carbon::createFromDate(2023, 4, 1)->startOfMonth();
            $qrCodes = App\Models\QrCode::where('created_at', '>', $date)->get();

        $months = $qrCodes->groupBy(function($qr) {
            return \Carbon\Carbon::parse($qr->created_at)->format('F Y');
        });
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
        {{ trans('cruds.qrCode.title_singular') }} {{ trans('global.list') }}
    </div>

    <br>
    <center>
<h2>{{\Carbon\Carbon::parse($codes->first()->first()->created_at)->format('F Y')}}</h2>
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
                                {{$qrCode->sum('transaction_total')}}
                                @php
                                    $totaleuro += $qrCode->sum('transaction_total');
                                @endphp
                            </td>
                            <td>
                                {{$qrCode->sum('issued_bryghia')}}
                                @php
                                $totalbryghia += $qrCode->sum('issued_bryghia');
                            @endphp
                            </td>
                            <td>
                                @if($qrCode->first()->partner != null)
                                {{$qrCode->first()->partner->name }}
                                @else
                                DELETED PARTNER
                                @endif
                            </td>
                            <td>
                                {{$qrCode->count()}}
                                @php
                                $totaltransactions += $qrCode->count();
                            @endphp
                            </td>



                        </tr>
                    @endforeach
                </tbody>
                <br>
                <tfooter>
                    <tr>
                        <td>

                        </td>
                        <td></td>
                      <td>
                     <b>  Total: {{ $totaleuro}} </b>
                      </td>
                      <td>
                     <b>  Total: {{ $totalbryghia}} </b>
                      </td>
                      <td>

                      </td>
                      <td>
                        <b>Total: {{$totaltransactions}}</b>
                      </td>
                    </tr>
                </tfooter>
            </table>
        </div>
    </div>
</div>




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
