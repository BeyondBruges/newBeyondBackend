@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
 
                    @endif
{{--Generals--}}
    <div class="row">
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$users}}</h3>
                <p>Total Users</p>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{$transactions}}</h3>
                <p>Total Transactions</p>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$partners}}</h3>
                <p>Total Partners</p>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$coupons}}</h3>
                <p>Coupons</p>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$dy_coupons}}</h3>
                <p>Dynamic Coupons</p>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$qrs}}</h3>
                <p>QRs</p>
              </div>
            </div>
        </div>

        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3>{{$bryghia}}</h3>
                <p>Total Issued Bryghias</p>
              </div>
            </div>
        </div>    
    </div>
<hr>
{{--ContactForms--}}  
<h3>Latest Contact Forms</h3>
    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Subject</th>
          <th scope="col">Email</th>
          <th scope="col">Message</th>
        </tr>
      </thead>
        @forelse($contactForm as $form)
      <tbody>
        <tr>
          <td>{{$form->name}}</td>
          <td>{{$form->subject}}</td>
          <td>{{$form->email}}</td>
          <td>{{$form->message}}</td>
        </tr>
      </tbody>
        @empty
         There aren't any Messages yet.
        @endforelse
    </table>   

{{--UsersXmonth--}}    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection