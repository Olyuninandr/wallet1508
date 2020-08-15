@extends('layouts.app')
@section('content')
@foreach($transactionsList as $transaction)
    {{$transaction->amount}}
@endforeach
    @endsection
