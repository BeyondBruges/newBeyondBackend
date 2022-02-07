@extends('layouts.admin')
@section('content')
@can('feature_title_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.feature-titles.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.featureTitle.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.featureTitle.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-FeatureTitle">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.featureTitle.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.featureTitle.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.featureTitle.fields.subtitle') }}
                        </th>
                        <th>
                            {{ trans('cruds.featureTitle.fields.language') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($featureTitles as $key => $featureTitle)
                        <tr data-entry-id="{{ $featureTitle->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $featureTitle->id ?? '' }}
                            </td>
                            <td>
                                {{ $featureTitle->title ?? '' }}
                            </td>
                            <td>
                                {{ $featureTitle->subtitle ?? '' }}
                            </td>
                            <td>
                                {{ $featureTitle->language->name ?? '' }}
                            </td>
                            <td>
                                @can('feature_title_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.feature-titles.show', $featureTitle->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('feature_title_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.feature-titles.edit', $featureTitle->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('feature_title_delete')
                                    <form action="{{ route('admin.feature-titles.destroy', $featureTitle->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('feature_title_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.feature-titles.massDestroy') }}",
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
  let table = $('.datatable-FeatureTitle:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection