@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-hover">
                    <thead class="thead-light">
                    <th>Доходы</th>
                    </thead>
                    <tbody>
                    @foreach($categoriesIncome as $category)
                        <tr>
                            <td><a href="{{ route('category_update', $category->id) }}">{{ $category->name }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <table class="table table-hover">
                    <thead class="thead-light">
                    <th>Расходы</th>
                    </thead>
                    <tbody>
                    @foreach($categoriesOutcome as $category)
                        <tr>
                            <td><a href="{{ route('category_update', $category->id) }}">{{ $category->name }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-center">
            <a class="btn btn-primary" href="{{route('categories_add')}}">Добавить категорию</a>
        </div>
    </div>

@endsection
