@extends('layouts.admin')
@section('content')
@can('hotspot_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.hotspots.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.hotspot.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.hotspot.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Hotspot">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.hotspot.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotspot.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotspot.fields.level') }}
                        </th>
                        <th>
                            {{ trans('cruds.hotspot.fields.key') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotspots as $key => $hotspot)
                        <tr data-entry-id="{{ $hotspot->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $hotspot->id ?? '' }}
                            </td>
                            <td>
                                {{ $hotspot->name ?? '' }}
                            </td>
                            <td>
                                {{ $hotspot->level->name ?? '' }}
                            </td>
                            <td>
                                {{ $hotspot->key ?? '' }}
                            </td>
                            <td>
                                @can('hotspot_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.hotspots.show', $hotspot->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('hotspot_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.hotspots.edit', $hotspot->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('hotspot_delete')
                                    <form action="{{ route('admin.hotspots.destroy', $hotspot->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('hotspot_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.hotspots.massDestroy') }}",
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
  let table = $('.datatable-Hotspot:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection