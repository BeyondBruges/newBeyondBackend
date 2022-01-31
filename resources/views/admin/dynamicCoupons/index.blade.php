@extends('layouts.admin')
@section('content')
@can('dynamic_coupon_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.dynamic-coupons.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dynamicCoupon.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.dynamicCoupon.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DynamicCoupon">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dynamicCoupon.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dynamicCoupon.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.dynamicCoupon.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.dynamicCoupon.fields.product') }}
                        </th>
                        <th>
                            {{ trans('cruds.dynamicCoupon.fields.expiration') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dynamicCoupons as $key => $dynamicCoupon)
                        <tr data-entry-id="{{ $dynamicCoupon->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dynamicCoupon->id ?? '' }}
                            </td>
                            <td>
                                {{ $dynamicCoupon->name ?? '' }}
                            </td>
                            <td>
                                {{ $dynamicCoupon->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $dynamicCoupon->product->name ?? '' }}
                            </td>
                            <td>
                                {{ $dynamicCoupon->expiration ?? '' }}
                            </td>
                            <td>
                                @can('dynamic_coupon_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.dynamic-coupons.show', $dynamicCoupon->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('dynamic_coupon_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.dynamic-coupons.edit', $dynamicCoupon->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('dynamic_coupon_delete')
                                    <form action="{{ route('admin.dynamic-coupons.destroy', $dynamicCoupon->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('dynamic_coupon_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dynamic-coupons.massDestroy') }}",
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
  let table = $('.datatable-DynamicCoupon:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection