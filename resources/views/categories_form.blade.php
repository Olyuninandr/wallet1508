@extends('layouts.app')
@section('content')
    @if(!empty($category))
        <form method="POST" action="{{route('category_update_submit', $category->id)}}">
            @else
                <form method="POST" action="{{route('category_submit')}}">
                    @endif

                    <?php $option = $category->option ?? ''?>
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Имя</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       value='{{ $category->name ?? '' }}'
                                       name="name"
                                       class="form-control"
                                       id="name">
                            </div>
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Операция</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="option"
                                               id="income"
                                               value="+"
                                               @if($option == '+') checked @endif >

                                        <label class="form-check-label" for="option">
                                            Доход
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="option"
                                               id="consumption"
                                               value="-"
                                               @if($option == '-') checked @endif >

                                        <label class="form-check-label" for="gridRadios2">
                                            Расход
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="submit" class="btn btn-primary">Добавить</button>

                            {{--                            @if(!empty($category))--}}
                            {{--                                <a href="{{ route('category_delete', $category->id) }}">--}}
                            {{--                                    <button class="ml-5 btn btn-danger">Удалить</button>--}}
                            {{--                                </a>--}}
                            {{--                            @endif--}}
                        </div>
                </form>

@endsection

