@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.slider.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sliders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.id') }}
                        </th>
                        <td>
                            {{ $slider->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.hero_title') }}
                        </th>
                        <td>
                            {{ $slider->hero_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.hero_subtitle') }}
                        </th>
                        <td>
                            {{ $slider->hero_subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.button_text') }}
                        </th>
                        <td>
                            {{ $slider->button_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.button_url') }}
                        </th>
                        <td>
                            {{ $slider->button_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.image') }}
                        </th>
                        <td>
                            @foreach($slider->image as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.button_2_text') }}
                        </th>
                        <td>
                            {{ $slider->button_2_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.button_2_url') }}
                        </th>
                        <td>
                            {{ $slider->button_2_url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slider.fields.language') }}
                        </th>
                        <td>
                            {{ $slider->language->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sliders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection