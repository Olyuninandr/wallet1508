@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-center"> {{ __('Отчет за'." $monthWord") }} </div>
        </div>
        <div class="card-body">
            <table class="table">

                <thead class="thead-light">
                <tr>
                    <th scope="col" >Доход</th>
                    <th scope="col" >Расход</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{$monthIncome}}</th>
                    <th scope="row">{{$monthConsumption}}</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <br>
    <div class="container">
        <div class="d-flex justify-content-center">
            <?php $prev = $month-1;
                  $next = $month+1;
                  ?>
            <a class="mr-3 btn btn-primary" href="{{ route('monthly_spent_next', $prev) }}">Предыдущий</a>
            <a class="btn btn-primary" href="{{ route('monthly_spent_next', $next) }}">Следующий</a>
        </div>
    </div>
@endsection
