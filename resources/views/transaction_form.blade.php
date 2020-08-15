@extends('layouts.app')
@section('content')
                <form method="POST" action="">
                    <?php $source = $transaction->source ?? ''?>

                    @csrf
<div class="container">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="amount">Сумма</label>
                            <input type="text"
                                   name="amount"
                                   class="form-control"
                                   id="amount"
                                   value="{{$transaction->amount ?? ''}}"
                                   placeholder="Сумма">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="source">Ресурс</label>
                            <select name="source" id="source" class="form-control">
                                <option value="bank" @if($source == 'bank') selected @endif>Bank</option>
                                <option value="cash" @if($source == 'cash') selected @endif>Cash</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="category">Категория</label>
                            <select name="category" id="category" class="form-control">

                                    <option disabled>Доход:
                                    </option>
                                @foreach($categoriesIncome as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                                <option disabled>Расход:
                                </option>
                                @foreach($categoriesOutcome as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="date">Дата</label>
                            <input type="date" name="date" class="form-control" id="date"
                                   value="{{$transaction->date ?? ''}}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Отправить</button>

                </form>
                </div>

@endsection
