@extends('layouts.admin')
@section('content')
@can('character_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.characters.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.character.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Character', 'route' => 'admin.characters.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.character.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Character">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.character.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.character.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.character.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.character.fields.key') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($characters as $key => $character)
                        <tr data-entry-id="{{ $character->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $character->id ?? '' }}
                            </td>
                            <td>
                                {{ $character->name ?? '' }}
                            </td>
                            <td>
                                @if($character->image)
                                    <a href="{{ $character->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $character->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $character->key ?? '' }}
                            </td>
                            <td>
                                @can('character_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.characters.show', $character->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('character_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.characters.edit', $character->id) }}">
                                        {{ trans('global.edit') }}
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
@can('character_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.characters.massDestroy') }}",
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
  let table = $('.datatable-Character:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection