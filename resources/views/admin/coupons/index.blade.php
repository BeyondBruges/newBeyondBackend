@extends('layouts.admin')
@section('content')
@can('coupon_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'BoxCode', 'route' => 'admin.coupons.parseCsvImport'])
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
       Box codes List
    </div>

    <div class="card-body">



        <form method="POST" action="{{ route("admin.products.storepermanent") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">Create New Code</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>

<hr>

        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Coupon">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.coupon.fields.id') }}
                        </th>
                        <th>
                          Code
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Actions
                        </th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($permanentCoupons as $key => $coupon)
                        <tr data-entry-id="{{ $coupon->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $coupon->id ?? '' }}
                            </td>
                            <td>
                                {{ $coupon->code ?? '' }}
                            </td>
                            <td>
                                {{ $coupon->status == "1" ? 'Active' : 'Inactive'}}
                            </td>
                            <td>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.products.editpermantent', $coupon->id) }}">
                                   Change Status
                                </a>
                                <form action="{{ route('admin.products.destroypermanent')}}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{ $coupon->id}}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>
                            </td>




                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>

        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
       Box codes List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Coupon">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.coupon.fields.id') }}
                        </th>
                        <th>
                          Code
                        </th>
                        <th>
                           Category
                        </th>
                        <th>
                            Status
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }} </option>
                                <option value="Used">Used </option>
                                <option value="Active">Active </option>

                            </select>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupons as $key => $coupon)
                        <tr data-entry-id="{{ $coupon->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $coupon->id ?? '' }}
                            </td>
                            <td>
                                {{ $coupon->code ?? '' }}
                            </td>
                            <td>
                                {{ $coupon->category->name ?? '' }}
                            </td>
                            <td>
                                @switch($coupon->status)
                                    @case(0)
                                       <span style="color: green;">Used</span>
                                        @break

                                    @default
                                    <span style="color: blue;">Active</span>
                                @endswitch
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>

        </div>
        <center>
            {{$coupons->links()}}
        </center>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Coupon:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
