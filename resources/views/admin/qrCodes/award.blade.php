@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Give Bryghia to User {{$user->name}}
    </div>

    <div class="card-body">
        <center>
        <h5>Type the purchase total and the user will automatically get 10% in Bryghia added to their Beyond Bruges Wallet</h5>
        </center>
        <hr>
        <div class="row">
                    <div class="col-5">
           <h4>
               User Name: {{$user->name}}
           </h4> 
            <h4>
               User email: {{$user->email}}
           </h4>           
            <h4>
               User Current Bryghia: {{$user->bryghia}}
           </h4> 
        </div>
        <div class="col-7">
                   <form method="POST" action="{{ route("admin.qr-codes.awardstore") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="transaction_total">{{ trans('cruds.qrCode.fields.transaction_total') }}</label>
                <input class="form-control {{ $errors->has('transaction_total') ? 'is-invalid' : '' }}" type="number" name="transaction_total" id="transaction_total" value="{{ old('transaction_total', '') }}" step="1" required>
                @if($errors->has('transaction_total'))
                    <span class="text-danger">{{ $errors->first('transaction_total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.transaction_total_helper') }}</span>
            </div>

            <input type="text" name="user_id" value="{{$user->id}}" hidden>
            <div class="form-group">
                <label class="required" for="partner_id">{{ trans('cruds.qrCode.fields.partner') }}</label>
                <select class="form-control select2 {{ $errors->has('partner') ? 'is-invalid' : '' }}" name="partner_id" id="partner_id" required>

                    @foreach($loggeduser->userpartners as $id => $entry)
                        <option value="{{ $entry->partner->id }}" {{ old('$entry->partner->id') == $id ? 'selected' : '' }}>
                          {{ $entry->partner->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('partner'))
                    <span class="text-danger">{{ $errors->first('partner') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.partner_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form> 
        </div>
        </div>


    </div>
</div>



@endsection