@extends('layouts.admin')
@section('content')
@can('user_level_question_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.user-level-questions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.userLevelQuestion.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.userLevelQuestion.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-UserLevelQuestion">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.userLevelQuestion.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.userLevelQuestion.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.userLevelQuestion.fields.question') }}
                        </th>
                        <th>
                            {{ trans('cruds.userLevelQuestion.fields.result') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userLevelQuestions as $key => $userLevelQuestion)
                        <tr data-entry-id="{{ $userLevelQuestion->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $userLevelQuestion->id ?? '' }}
                            </td>
                            <td>
                                {{ $userLevelQuestion->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $userLevelQuestion->question->title ?? '' }}
                            </td>
                            <td>
                                @switch($userLevelQuestion->result)
                                    @case(0)
                                        Wrong
                                        @break
                                
                                    @default
                                        Right
                                        
                                @endswitch
                            </td>
                            <td>
                                @can('user_level_question_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.user-level-questions.show', $userLevelQuestion->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('user_level_question_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.user-level-questions.edit', $userLevelQuestion->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('user_level_question_delete')
                                    <form action="{{ route('admin.user-level-questions.destroy', $userLevelQuestion->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('user_level_question_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.user-level-questions.massDestroy') }}",
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
  let table = $('.datatable-UserLevelQuestion:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection