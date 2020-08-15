@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('You are logged in!') }}
                    </div>
                </div>
                <br>
                <div class="card">

                    <div class="card-header">{{ ('Балланс') }}</div>
                    <div class="card-body">
                        <div class="conteiner">
                            <div class="row justify-content-center">
                                <h2>Total {{ $ballanceCard + $ballanceCash }} </h2>
                            </div>
                            <div class="row justify-content-center">
                               <h4> Card-{{ $ballanceCard }}

                                Cash-{{ $ballanceCash }} </h4>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
