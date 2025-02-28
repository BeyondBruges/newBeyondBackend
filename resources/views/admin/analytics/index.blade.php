@extends('layouts.admin')
@section('content')
@can('analytic_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">

        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.analytic.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Analytic">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.analytic.fields.id') }}
                        </th>
                        <th>
                            User
                        </th>
                        <th>
                            {{ trans('cruds.analytic.fields.value') }}
                        </th>
                        <th>
                            {{ trans('cruds.analytic.fields.type') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($analytics as $key => $analytic)
                        <tr data-entry-id="{{ $analytic->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $analytic->id ?? '' }}
                            </td>
                            <td>
                                @if(isset($analytic->user))
                                    @if($analytic->user->id == 1)
                                    No User
                                    @else
                                    {{ $analytic->user->name ?? '' }}
                                    @endif
                                @endif
                                
                            </td>
                            <td>
                                {{ $analytic->value ?? '' }}
                            </td>
                            <td>
                                {{ $analytic->type->name ?? '' }}
                            </td>
                            <td>
                                @can('analytic_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.analytics.show', $analytic->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan


                            </td>

                        </tr>
                    @endforeach
                </tbody>
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
@can('analytic_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.analytics.massDestroy') }}",
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
  let table = $('.datatable-Analytic:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection