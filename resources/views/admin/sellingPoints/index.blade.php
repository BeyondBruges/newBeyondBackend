@extends('layouts.admin')
@section('content')
@can('selling_point_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.selling-points.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.sellingPoint.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.sellingPoint.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SellingPoint">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.sellingPoint.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.sellingPoint.fields.icon_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.sellingPoint.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.sellingPoint.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.sellingPoint.fields.language') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sellingPoints as $key => $sellingPoint)
                        <tr data-entry-id="{{ $sellingPoint->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $sellingPoint->id ?? '' }}
                            </td>
                            <td>
                                {{ $sellingPoint->icon_code ?? '' }}
                            </td>
                            <td>
                                {{ $sellingPoint->title ?? '' }}
                            </td>
                            <td>
                                {{ $sellingPoint->description ?? '' }}
                            </td>
                            <td>
                                {{ $sellingPoint->language->name ?? '' }}
                            </td>
                            <td>
                                @can('selling_point_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.selling-points.show', $sellingPoint->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('selling_point_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.selling-points.edit', $sellingPoint->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('selling_point_delete')
                                    <form action="{{ route('admin.selling-points.destroy', $sellingPoint->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
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
@can('selling_point_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.selling-points.massDestroy') }}",
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
  let table = $('.datatable-SellingPoint:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection