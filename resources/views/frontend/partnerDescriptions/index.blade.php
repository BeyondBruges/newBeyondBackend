@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('partner_description_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.partner-descriptions.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.partnerDescription.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.partnerDescription.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-PartnerDescription">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.partnerDescription.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.partnerDescription.fields.partner') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.partnerDescription.fields.language') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.language.fields.code') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($partnerDescriptions as $key => $partnerDescription)
                                    <tr data-entry-id="{{ $partnerDescription->id }}">
                                        <td>
                                            {{ $partnerDescription->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $partnerDescription->partner->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $partnerDescription->language->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $partnerDescription->language->code ?? '' }}
                                        </td>
                                        <td>
                                            @can('partner_description_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.partner-descriptions.show', $partnerDescription->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('partner_description_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.partner-descriptions.edit', $partnerDescription->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('partner_description_delete')
                                                <form action="{{ route('frontend.partner-descriptions.destroy', $partnerDescription->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('partner_description_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.partner-descriptions.massDestroy') }}",
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
  let table = $('.datatable-PartnerDescription:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection