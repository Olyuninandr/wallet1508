@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">Сумма</th>
                <th scope="col">Операция</th>
                <th scope="col">Ресурс</th>
                <th scope="col">Категория</th>
                <th scope="col">Дата</th>
                <th scope="col">Комментарий</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactionsList as $transaction)

                <tr>
                    <th scope="row">{{ $transaction->amount }}</th>
                    <td scope="row">{{ $transaction->option }}</td>
                    <td scope="row">{{ $transaction->source }}</td>
                    <td scope="row">{{ $transaction->getCategoryName->name ?? '?' }}</td>
                    <td scope="row">{{$transaction->date}}</td>
                    <td scope="row">{{ $transaction->comment }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@guest
    <div class="container">
        <div class="d-flex justify-content-center">
            <span>Log in to add or modify transactions</span>
        </div>
    </div>
@else
    <div class="container">
        <div class="d-flex justify-content-center">
                    <a class="mr-3 btn btn-primary" href="{{ route('transaction_add') }}">Добавить операцию</a>
        </div>
    </div>
@endguest
@endsection
