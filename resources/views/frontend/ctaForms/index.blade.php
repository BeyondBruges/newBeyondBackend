@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('cta_form_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.cta-forms.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.ctaForm.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.ctaForm.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CtaForm">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ctaForm.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ctaForm.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ctaForm.fields.subtitle') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ctaForm.fields.inputfield_text') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ctaForm.fields.button_text') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ctaForm.fields.legends_title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ctaForm.fields.legends_subtitle') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ctaForm.fields.legends_link') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ctaForm.fields.legends_button_text') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ctaForm.fields.language') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ctaForms as $key => $ctaForm)
                                    <tr data-entry-id="{{ $ctaForm->id }}">
                                        <td>
                                            {{ $ctaForm->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ctaForm->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ctaForm->subtitle ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ctaForm->inputfield_text ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ctaForm->button_text ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ctaForm->legends_title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ctaForm->legends_subtitle ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ctaForm->legends_link ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ctaForm->legends_button_text ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ctaForm->language->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('cta_form_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.cta-forms.show', $ctaForm->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('cta_form_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.cta-forms.edit', $ctaForm->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('cta_form_delete')
                                                <form action="{{ route('frontend.cta-forms.destroy', $ctaForm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('cta_form_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.cta-forms.massDestroy') }}",
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
  let table = $('.datatable-CtaForm:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection