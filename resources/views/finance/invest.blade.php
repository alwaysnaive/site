@extends('app')
@section('content')
<h1>{{trans('app.finance')}}</h1>
    <hr/>
    <ul class="nav nav-tabs" style="margin-bottom: 15px">
        <li role="presentation"><a href="{{ url('/finance') }}">{{trans('finance.summary')}}</a></li>
        <li role="presentation"><a href="{{ url('/finance/income') }}">{{trans('finance.income')}}</a></li>
        <li role="presentation"><a href="{{ url('/finance/outcome') }}">{{trans('finance.outcome')}}</a></li>
        <li role="presentation"><a href="{{ url('/finance/trade') }}">{{trans('finance.trade')}}</a></li>
        <li role="presentation" class="active"><a href="{{ url('/finance/invest') }}">{{trans('finance.invest')}}</a></li>
    </ul>

    <div class="panel panel-default">
        <div class="panel-heading">{{trans('finance.record')}}</div>
        <div class="panel-body">
            <table class="table table-striped">
                <tr>
                    <td>{{trans('finance.invest_date')}}</td>
                    <td>{{trans('finance.investor')}}</td>
                    <td>{{trans_choice('app.stock',2)}}</td>
                    <td>{{trans('finance.price')}}</td>
                    <td>{{trans('finance.aver_price')}}</td>
                    <td>{{trans('finance.per_stock')}}</td>
                </tr>
                @foreach($invest as $item)
                <tr>
                    <td>{{$item->updated_at->format('Y-m-d')}}</td>
                    <td><a href="/profiles/{{$item->user->id}}">{{$item->user->username}}</a></td>
                    <td>{{$item->stock}}</td>
                    <td>{{Clockos\ChangeRate::toRmb($item->price)}}</td>
                    <td>{{Clockos\ChangeRate::toRmb($item->average_price)}}</td>
                    <td>{{$item->per_stock}}%</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
@section('footer')
@endsection