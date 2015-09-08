<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 3, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('fullcalendar/fullcalendar.css') }}" rel='stylesheet' />
	<link href="{{ asset('fullcalendar/fullcalendar.print.css') }}" rel='stylesheet' media='print' />
	<link href="{{ asset('datetimepicker/jquery.datetimepicker.css') }}" rel='stylesheet' />
	<script src="{{ asset('fullcalendar/lib/moment.min.js') }}"></script>
	<script src="{{ asset('fullcalendar/lib/jquery.min.js') }}"></script>
	<script src="{{ asset('fullcalendar/fullcalendar.min.js') }}"></script>
	<script src="{{ asset('datetimepicker/jquery.datetimepicker.js') }}"></script>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="#">E-Learning</a>
                </div>
                @if(Auth::check())
                <div class="navbar-collapse collapse in" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="{{ url('/')  }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ url('/subscribe')  }}">Subscription Plan</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">The Company<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('about_us') }}">About us</a>
                                </li>
                                <li>
                                    <a href="{{ url('company_policy') }}">Company Policy</a>
                                </li>
                                <li>
                                    <a href="{{ url('contacts') }}">Contacts</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input class="form-control" type="text">
                        </div>
                        <button type="submit" class="btn btn-default">
                            Submit
                        </button>
                    </form>
					@else
					{!! Form::open(['url'=>'login','class'=>'navbar-form navbar-right ']) !!}
							<div class="form-group">
							{!! Form::text('username',null,['class'=>'form-control','placeholder'=>'username']) !!}
							</div>
							<div class="form-group">
							{!! Form::password('password',['class'=>'form-control','placeholder'=>'password']) !!}
							</div>
							<button type="submit" class="btn btn-default">
								Login
							</button>
						{!! Form::close() !!}	
                    @endif
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::guest())
                        <li class="dropdown">
                            <a href="#">Register</a>
                        </li>
                        @endif
                        @if(Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{  Auth::user()->first_name." ".Auth::user()->last_name }}<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('profile') }}">Profile</a>
                                </li>
                                <li>
                                    <a href="{{ url('my/transaction_list') }}">Transaction List</a>
                                </li>
                                <li>
                                    <a href="{{ url('my/schedules') }}">Schedules</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="{{ url('logout') }}">Logout</a>
                                </li>
                            </ul>
                        </li>
							
                        @endif
                    </ul>
                </div>

            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10" style="background: #E8E8E8 ;">
             @yield('content')
            <hr style=" border-width:5px;"  />
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-success">
                        h3. Lorem ipsum dolor sit amet.
                    </h3>
                    <dl>
                        <dt>
                            Description lists
                        </dt>
                        <dd>
                            A description list is perfect for defining terms.
                        </dd>
                        <dt>
                            Euismod
                        </dt>
                        <dd>
                            Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                        </dd>
                        <dd>
                            Donec id elit non mi porta gravida at eget metus.
                        </dd>
                        <dt>
                            Malesuada porta
                        </dt>
                        <dd>
                            Etiam porta sem malesuada magna mollis euismod.
                        </dd>
                        <dt>
                            Felis euismod semper eget lacinia
                        </dt>
                        <dd>
                            Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                        </dd>
                    </dl>
                </div>
                <div class="col-md-4">
                    <h3 class="text-primary">
                        h3. Lorem ipsum dolor sit amet.
                    </h3>
                    <dl>
                        <dt>
                            Description lists
                        </dt>
                        <dd>
                            A description list is perfect for defining terms.
                        </dd>
                        <dt>
                            Euismod
                        </dt>
                        <dd>
                            Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                        </dd>
                        <dd>
                            Donec id elit non mi porta gravida at eget metus.
                        </dd>
                        <dt>
                            Malesuada porta
                        </dt>
                        <dd>
                            Etiam porta sem malesuada magna mollis euismod.
                        </dd>
                        <dt>
                            Felis euismod semper eget lacinia
                        </dt>
                        <dd>
                            Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                        </dd>
                    </dl>
                </div>
                <div class="col-md-4">
                    <h3 class="text-info">
                        h3. Lorem ipsum dolor sit amet.
                    </h3>
                    <dl>
                        <dt>
                            Description lists
                        </dt>
                        <dd>
                            A description list is perfect for defining terms.
                        </dd>
                        <dt>
                            Euismod
                        </dt>
                        <dd>
                            Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                        </dd>
                        <dd>
                            Donec id elit non mi porta gravida at eget metus.
                        </dd>
                        <dt>
                            Malesuada porta
                        </dt>
                        <dd>
                            Etiam porta sem malesuada magna mollis euismod.
                        </dd>
                        <dt>
                            Felis euismod semper eget lacinia
                        </dt>
                        <dd>
                            Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>
</div>


<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>