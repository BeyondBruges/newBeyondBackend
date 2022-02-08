@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ctaForm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cta-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ctaForm.fields.id') }}
                        </th>
                        <td>
                            {{ $ctaForm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctaForm.fields.title') }}
                        </th>
                        <td>
                            {{ $ctaForm->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctaForm.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $ctaForm->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctaForm.fields.inputfield_text') }}
                        </th>
                        <td>
                            {{ $ctaForm->inputfield_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctaForm.fields.button_text') }}
                        </th>
                        <td>
                            {{ $ctaForm->button_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctaForm.fields.legends_title') }}
                        </th>
                        <td>
                            {{ $ctaForm->legends_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctaForm.fields.legends_subtitle') }}
                        </th>
                        <td>
                            {{ $ctaForm->legends_subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctaForm.fields.legends_link') }}
                        </th>
                        <td>
                            {{ $ctaForm->legends_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctaForm.fields.legends_button_text') }}
                        </th>
                        <td>
                            {{ $ctaForm->legends_button_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ctaForm.fields.language') }}
                        </th>
                        <td>
                            {{ $ctaForm->language->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cta-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection