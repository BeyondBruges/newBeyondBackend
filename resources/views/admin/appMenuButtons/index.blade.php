@extends('layouts.admin')
@section('content')
@can('app_menu_button_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.app-menu-buttons.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.appMenuButton.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.appMenuButton.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AppMenuButton">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.appMenuButton.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.appMenuButton.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.appMenuButton.fields.key') }}
                        </th>
                        <th>
                            {{ trans('cruds.appMenuButton.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appMenuButtons as $key => $appMenuButton)
                        <tr data-entry-id="{{ $appMenuButton->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $appMenuButton->id ?? '' }}
                            </td>
                            <td>
                                {{ $appMenuButton->name ?? '' }}
                            </td>
                            <td>
                                {{ $appMenuButton->key ?? '' }}
                            </td>
                            <td>
                                {{ $appMenuButton->status ?? '' }}
                            </td>
                            <td>
                                @can('app_menu_button_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.app-menu-buttons.show', $appMenuButton->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('app_menu_button_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.app-menu-buttons.edit', $appMenuButton->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('app_menu_button_delete')
                                    <form action="{{ route('admin.app-menu-buttons.destroy', $appMenuButton->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('app_menu_button_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.app-menu-buttons.massDestroy') }}",
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
  let table = $('.datatable-AppMenuButton:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection