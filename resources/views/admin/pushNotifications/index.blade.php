@extends('layouts.admin')
@section('content')
@can('notification_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.push-notifications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.notification.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.notification.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Notification">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            id
                        </th>
                        <th>
                            key
                        </th>
                        <th>
                            en_title
                        </th>
                        <th>
                            es_title
                        </th>
                        <th>
                            nl_title
                        </th>
                        <th>
                            fr_title
                        </th>
                        <th>
                            en_content
                        </th>
                        <th>
                            es_content
                        </th>
                        <th>
                            nl_content
                        </th>
                        <th>
                            fr_content
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notifications as $key => $notification)
                        <tr data-entry-id="{{ $notification->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $notification->id ?? '' }}
                            </td>
                            <td>
                                {{ $notification->key ?? '' }}
                            </td>
                            <td>
                                {{ $notification->en_title ?? '' }}
                            </td>
                            <td>
                                {{ $notification->es_title ?? '' }}
                            </td>
                            <td>
                                {{ $notification->nl_title ?? '' }}
                            </td>
                            <td>
                                {{ $notification->fr_title ?? '' }}
                            </td>
                            <td>
                                {{ $notification->en_content ?? '' }}
                            </td>
                            <td>
                                {{ $notification->es_content ?? '' }}
                            </td>
                            <td>
                                {{ $notification->nl_content ?? '' }}
                            </td>
                            <td>
                                {{ $notification->fr_content ?? '' }}
                            </td>
                            <td>
                                @can('notification_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.push-notifications.show', $notification->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('notification_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.push-notifications.edit', $notification->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('notification_delete')
                                    <form action="{{ route('admin.push-notifications.destroy', $notification->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('notification_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.notifications.massDestroy') }}",
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
  let table = $('.datatable-Notification:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
