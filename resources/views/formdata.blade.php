@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="/home">All Forms</a>&nbsp;&gt;&nbsp;<a href="/form/{{$form['id']}}">{{ $form['name']}}</a>&nbsp;&gt;&nbsp;Data
            @if ($form) 
                @if($form['data'])
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-size: 20px;">
                        Data
                    </div>
                    <div class="panel-body">
                        <div class="container">
                        @if (count($form['data']))
                            @foreach($form['data'] as $data)
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-2" style="font-weight:bold">User</div>
                                        <div class="col-md-3">{{ $data['user'] }}</div>
                                        <div class="col-md-2" style="font-weight:bold">Date</div>
                                        <div class="col-md-3">{{ $data['datestring'] }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <ul>
                                                @foreach($data['items'] as $item)
                                                    <li>{{ $item['name'] }}: {{ $item['value'] }}
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                </div>
                @endif
            @else
                No form found by that ID
            @endif
        </div>
    </div>
</div>
@endsection
