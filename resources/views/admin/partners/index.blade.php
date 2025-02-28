@extends('layouts.admin')
@section('content')
@can('partner_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.partners.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.partner.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Partner', 'route' => 'admin.partners.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.partner.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Partner">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.url') }}
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.lng') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.facebook') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.instagram') }}
                        </th>
                        <th>
                            Category
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.partner.fields.gallery') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($partners as $key => $partner)
                        <tr data-entry-id="{{ $partner->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $partner->id ?? '' }}
                            </td>
                            <td>
                                {{ $partner->name ?? '' }}
                            </td>
                            <td>
                                {{ $partner->url ?? '' }}
                            </td>
                            <td>
                                {{ $partner->phone ?? '' }}
                            </td>
                            <td>
                                {{ $partner->address ?? '' }}
                            </td>
                            <td>
                                @if($partner->logo)
                                    <a href="{{ $partner->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $partner->logo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $partner->lat ?? '' }}
                            </td>
                            <td>
                                {{ $partner->lng ?? '' }}
                            </td>
                            <td>
                                {{ $partner->facebook ?? '' }}
                            </td>
                            <td>
                                {{ $partner->instagram ?? '' }}
                            </td>
                            <td>
                                {{ $partner->category->name ?? '' }}
                            </td>
                            <td>
                                {{ $partner->email ?? '' }}
                            </td>
                            <td>
                                @foreach($partner->gallery as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('partner_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.partners.show', $partner->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('partner_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.partners.edit', $partner->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('partner_delete')
                                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('partner_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.partners.massDestroy') }}",
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
  let table = $('.datatable-Partner:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection
