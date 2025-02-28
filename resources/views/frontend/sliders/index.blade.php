@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('slider_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.sliders.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.slider.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.slider.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Slider">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.slider.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slider.fields.hero_title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slider.fields.hero_subtitle') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slider.fields.button_text') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slider.fields.button_url') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slider.fields.image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slider.fields.button_2_text') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slider.fields.button_2_url') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slider.fields.language') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $key => $slider)
                                    <tr data-entry-id="{{ $slider->id }}">
                                        <td>
                                            {{ $slider->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slider->hero_title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slider->hero_subtitle ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slider->button_text ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slider->button_url ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($slider->image as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $slider->button_2_text ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slider->button_2_url ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slider->language->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('slider_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.sliders.show', $slider->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('slider_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.sliders.edit', $slider->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('slider_delete')
                                                <form action="{{ route('frontend.sliders.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('slider_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.sliders.massDestroy') }}",
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
  let table = $('.datatable-Slider:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection