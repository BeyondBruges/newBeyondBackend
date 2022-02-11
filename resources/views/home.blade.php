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
<hr>
<h3>Stats</h3>

{{--UsersXmonth--}}    
<br>
    <div class="row">

        <div class="col-md-6 col-sm-12">
            <h5>App Launches</h5>
            <canvas id="applaunch" width="100%" height="60"></canvas>
    
            <script>
            const user1 = document.getElementById('applaunch');
            const applaunch = new Chart(user1, {
                type: 'line',
                data: {
                    labels: [      
                        @for ($i = 0; $i < 7; $i++)
                        {{Carbon\Carbon::today()->subDays(7-$i)->format('d')}},
                        @endfor
                        {{Carbon\Carbon::today()->format('d')}},
                        ],
                    datasets: [{
                        label: 'App Launches 7 days',
                        data:
    
                         [
                        @for ($i = 0; $i < 7; $i++)
    
                    {{DB::table('analytics')->where('value', 'App Launch')->whereDate('created_at', '=', now()->subDays(7-$i)->format('Y-m-d'))->count()}},
                        @endfor
                        {{DB::table('analytics')->where('value', 'App Launch')->whereDate('created_at', '=', now()->format('Y-m-d'))->count()}},
                         ],
    
                     fill: false,
                        borderColor: '#0960e3',
                        tension: 0.1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
            </script>   
        </div>

        <div class="col-md-6 col-sm-12">
            <h5>Logins</h5>
            <canvas id="logins" width="100%" height="60"></canvas>
    
            <script>
            const login = document.getElementById('logins');
            const logins = new Chart(login, {
                type: 'line',
                data: {
                    labels: [      
                        @for ($i = 0; $i < 7; $i++)
                        {{Carbon\Carbon::today()->subDays(7-$i)->format('d')}},
                        @endfor
                        {{Carbon\Carbon::today()->format('d')}},
                        ],
                    datasets: [{
                        label: 'Logins 7 days',
                        data:
    
                         [
                        @for ($i = 0; $i < 7; $i++)
    
                    {{DB::table('analytics')->where('value', 'Login')->whereDate('created_at', '=', now()->subDays(7-$i)->format('Y-m-d'))->count()}},
                        @endfor
                        {{DB::table('analytics')->where('value', 'Login')->whereDate('created_at', '=', now()->format('Y-m-d'))->count()}},
                         ],
    
                     fill: false,
                        borderColor: '#0960e3',
                        tension: 0.1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
            </script>   
        </div>

    </div>

    <br>    
    <br>   

    <div class="row">  
        <div class="col-md-4 col-sm-12">
            <h5>Devices</h5>
            <canvas id="devices" width="100%" height="100"></canvas>
    
            <script>
            const devices1 = document.getElementById('devices');
            const devices = new Chart(devices1, {
                type: 'pie',
                data: {
                    labels: ['iPhone', 'Android', 'PC', 'Undefined'],
  datasets: [{
    label: 'My First Dataset',
    data: [
        
        {{App\Models\User::where('device', 'IPhonePlayer')->get()->count()}}, 
        {{App\Models\User::where('device', 'Android')->get()->count()}},
        {{App\Models\User::where('device', 'WindowsEditor')->get()->count()}},
        {{App\Models\User::where('device', 'null')->get()->count()}},

    ],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
            </script>       
                    
        </div>



        <div class="col-md-8 col-sm-12" >
            <h5>Users</h5>
            <canvas id="usersChart" width="400" height="200"></canvas>
    
            <script>
            const user = document.getElementById('usersChart');
            const usersChart = new Chart(user, {
                type: 'line',
                data: {
                    labels: [      
                        @for ($i = 0; $i < 30; $i++)
                        {{Carbon\Carbon::today()->subDays(30-$i)->format('d')}},
                        @endfor
                        {{Carbon\Carbon::today()->format('d')}},
                        ],
                    datasets: [{
                        label: 'New users in the latest 30 days',
                        data:
    
                         [
                        @for ($i = 0; $i < 30; $i++)
    
                    {{DB::table('users')->whereDate('created_at', '=', now()->subDays(30-$i)->format('Y-m-d'))->count()}},
                        @endfor
                        {{DB::table('users')->whereDate('created_at', '=', now()->format('Y-m-d'))->count()}},
                         ],
    
                     fill: false,
                        borderColor: '#0960e3',
                        tension: 0.1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
            </script>   
        </div>
    </div>
{{--TransactionsXmonth--}}  
<br>
    <div class="row">
        <h5>Transactions</h5>
        <canvas id="transacitonChart" width="400" height="100"></canvas>

        <script>
        const transaction = document.getElementById('transacitonChart');
        const transacitonChart = new Chart(transaction, {
            type: 'line',
            data: {
                labels: [      
                    @for ($i = 0; $i < 30; $i++)
                    {{Carbon\Carbon::today()->subDays(30-$i)->format('d')}},
                    @endfor
                    {{Carbon\Carbon::today()->format('d')}},
                    ],
                datasets: [{
                    label: 'All transactions in the latest 30 days',
                    data:

                     [
                    @for ($i = 0; $i < 30; $i++)

                {{DB::table('transactions')->whereDate('created_at', '=', now()->subDays(30-$i)->format('Y-m-d'))->count()}},
                    @endfor
                    {{DB::table('transactions')->whereDate('created_at', '=', now()->format('Y-m-d'))->count()}},
                     ],

                 fill: false,
                    borderColor: '#10ed05',
                    tension: 0.1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
        </script>  
    </div> 
{{--PartnersXmonth--}}  
<br>
    <div class="row">
        <h5>Partners</h5>
        <canvas id="partnerChart" width="400" height="100"></canvas>

        <script>
        const partner = document.getElementById('partnerChart');
        const partnerChart = new Chart(partner, {
            type: 'line',
            data: {
                labels: [      
                    @for ($i = 0; $i < 30; $i++)
                    {{Carbon\Carbon::today()->subDays(30-$i)->format('d')}},
                    @endfor
                    {{Carbon\Carbon::today()->format('d')}},
                    ],
                datasets: [{
                    label: 'New partners in the latest 30 days',
                    data:

                     [
                    @for ($i = 0; $i < 30; $i++)

                {{DB::table('partners')->whereDate('created_at', '=', now()->subDays(30-$i)->format('Y-m-d'))->count()}},
                    @endfor
                    {{DB::table('partners')->whereDate('created_at', '=', now()->format('Y-m-d'))->count()}},
                     ],

                 fill: false,
                    borderColor: '#9c08d1',
                    tension: 0.1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
        </script>  
    </div>  
{{--CouponsXmonth--}}  
<br>
    <div class="row">
        <h5>Coupons</h5>
        <canvas id="couponChart" width="400" height="100"></canvas>

        <script>
        const coupon = document.getElementById('couponChart');
        const couponChart = new Chart(coupon, {
            type: 'line',
            data: {
                labels: [      
                    @for ($i = 0; $i < 30; $i++)
                    {{Carbon\Carbon::today()->subDays(30-$i)->format('d')}},
                    @endfor
                    {{Carbon\Carbon::today()->format('d')}},
                    ],
                datasets: [{
                    label: 'Coupons generate in the latest 30 days',
                    data:

                     [
                    @for ($i = 0; $i < 30; $i++)

                {{DB::table('coupons')->whereDate('created_at', '=', now()->subDays(30-$i)->format('Y-m-d'))->count()}},
                    @endfor
                    {{DB::table('coupons')->whereDate('created_at', '=', now()->format('Y-m-d'))->count()}},
                     ],

                 fill: false,
                    borderColor: '#d108a2',
                    tension: 0.1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
        </script>  
    </div> 
{{--QrXmonth--}}  
<br>
    <div class="row">
        <h5>QRs</h5>
        <canvas id="qrChart" width="400" height="100"></canvas>

        <script>
        const qr = document.getElementById('qrChart');
        const qrChart = new Chart(qr, {
            type: 'line',
            data: {
                labels: [      
                    @for ($i = 0; $i < 30; $i++)
                    {{Carbon\Carbon::today()->subDays(30-$i)->format('d')}},
                    @endfor
                    {{Carbon\Carbon::today()->format('d')}},
                    ],
                datasets: [{
                    label: 'QRs generate in the latest 30 days',
                    data:

                     [
                    @for ($i = 0; $i < 30; $i++)

                {{DB::table('qr_codes')->whereDate('created_at', '=', now()->subDays(30-$i)->format('Y-m-d'))->count()}},
                    @endfor
                    {{DB::table('qr_codes')->whereDate('created_at', '=', now()->format('Y-m-d'))->count()}},
                     ],

                 fill: false,
                    borderColor: '#b5b3b5',
                    tension: 0.1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
        </script>  
    </div>  
{{--BryghisXmonth--}}  
<br>
    <div class="row">
        <h5>Bryghia</h5>
        <canvas id="bryghiaChart" width="400" height="100"></canvas>

        <script>
        const bryghia = document.getElementById('bryghiaChart');
        const bryghiaChart = new Chart(bryghia, {
            type: 'line',
            data: {
                labels: [      
                    @for ($i = 0; $i < 30; $i++)
                    {{Carbon\Carbon::today()->subDays(30-$i)->format('d')}},
                    @endfor
                    {{Carbon\Carbon::today()->format('d')}},
                    ],
                datasets: [{
                    label: 'Bryghia generate in the latest 30 days',
                    data:

                     [
                    @for ($i = 0; $i < 30; $i++)

                {{DB::table('analytics')->where('value','issued_bryghia')->whereDate('created_at', '=', now()->subDays(30-$i)->format('Y-m-d'))->get()->sum('value')}},
                    @endfor
                    {{DB::table('analytics')->where('value','issued_bryghia')->whereDate('created_at', '=', now()->format('Y-m-d'))->get()->sum('value')}},
                     ],

                 fill: false,
                    borderColor: '#fc9c00',
                    tension: 0.1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
        </script>  
    </div>        
<hr>
<h3>Users Graphs</h3>
<br>

{{--UsersInfo--}}    
<br>
    <div class="row">
        <h5>Users Info</h5>
        <canvas id="usersInfoChart" width="400" height="100"></canvas>

        <script>
        const user_info = document.getElementById('usersInfoChart');
        const usersInfoChart = new Chart(user_info, {
             type: 'bar',
            data: {
                labels: [      
                    @for ($i = 0; $i < 7; $i++)
                    {{Carbon\Carbon::today()->subDays(7-$i)->format('d')}},
                    @endfor
                    {{Carbon\Carbon::today()->format('d')}},
                    ],
                datasets: [{
                    label: 'Unlocked Characters',
                    data:

                     [
                    @for ($i = 0; $i < 7; $i++)

                    {{DB::table('user_characters')->whereDate('created_at', '=', now()->subDays(7-$i)->format('Y-m-d'))->count()}},
                    @endfor
                    {{DB::table('user_characters')->whereDate('created_at', '=', now()->format('Y-m-d'))->count()}},
                     ],

                     fill: false,
                    backgroundColor: '#05a86a',

                        },
                    {
                    label: 'Unlocked Levels',
                    data:

                     [
                    @for ($i = 0; $i < 7; $i++)

                    {{DB::table('user_levels')->whereDate('created_at', '=', now()->subDays(7-$i)->format('Y-m-d'))->count()}},
                    @endfor
                    {{DB::table('user_levels')->whereDate('created_at', '=', now()->format('Y-m-d'))->count()}},
                     ],

                     fill: false,
                    backgroundColor: '#0598a8',

                        },
                    {    
                    label: 'Unlocked Landmarks',
                    data:

                     [
                    @for ($i = 0; $i < 7; $i++)

                    {{DB::table('user_landmarks')->whereDate('created_at', '=', now()->subDays(7-$i)->format('Y-m-d'))->count()}},
                    @endfor
                    {{DB::table('user_landmarks')->whereDate('created_at', '=', now()->format('Y-m-d'))->count()}},
                     ],

                     fill: false,
                    backgroundColor: '#7705a8',

                        }, 
                    {    
                    label: 'Generated QRs',
                    data:

                     [
                    @for ($i = 0; $i < 7; $i++)

                    {{DB::table('user_qr_codes')->whereDate('created_at', '=', now()->subDays(7-$i)->format('Y-m-d'))->count()}},
                    @endfor
                    {{DB::table('user_qr_codes')->whereDate('created_at', '=', now()->format('Y-m-d'))->count()}},
                     ],

                     fill: false,
                    backgroundColor: '#a8057d',

                        }, 
                    {    
                    label: 'Level Objects',
                    data:

                     [
                    @for ($i = 0; $i < 7; $i++)

                    {{DB::table('user_level_objects')->whereDate('created_at', '=', now()->subDays(7-$i)->format('Y-m-d'))->count()}},
                    @endfor
                    {{DB::table('user_level_objects')->whereDate('created_at', '=', now()->format('Y-m-d'))->count()}},
                     ],

                     fill: false,
                    backgroundColor: '#a5a805',

                        }, 
                    {    
                    label: 'Generated Questions',
                    data:

                     [
                    @for ($i = 0; $i < 7; $i++)

                    {{DB::table('user_level_questions')->whereDate('created_at', '=', now()->subDays(7-$i)->format('Y-m-d'))->count()}},
                    @endfor
                    {{DB::table('user_level_questions')->whereDate('created_at', '=', now()->format('Y-m-d'))->count()}},
                     ],

                     fill: false,
                    backgroundColor: '#a83305',

                        },           


                        ]},
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
        </script>  
    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection