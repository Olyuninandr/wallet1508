@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                <br>
                <div class="card">
                    <div class="card-header">{{ __('Потрачено по категориям') }}</div>
                    <div class="card-body">
                        <table class="table">

                            <thead class="thead-light">
                            <tr>
                                @foreach($categoryList as $category)
                                    <th scope="col">{{$category['name']}}</th>
                                @endforeach
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                @foreach($spentTotal as $spentPerCategory)
                                    <td>{{(-1)*$spentPerCategory}}</td>
                                @endforeach
                            </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
