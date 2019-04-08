@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="/home">All Forms</a>&nbsp;&gt;&nbsp;{{ $form['name']}}
            @if ($form) 
                <div class="panel panel-default">
                    <div class="panel-heading text-center" style="font-size: 28px;">
                        {{ $form['name'] }}
                    </div>
                    <div class="panel-body">
                        @if (count($form['items']))
                            @foreach($form['items'] as $item)
                                <p style="{{ $item['required']? 'font-weight:bold': '' }}">{{ $item['label'] }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
                @if($form['data'])
                <a role="button" href="/form/{{$form['id']}}/data" class="btn btn-default">View Data</a>
                @endif
                <a role="button" href="/form/{{$form['id']}}/edit" class="btn btn-secondary">Edit</a>
            @else
                No form found by that ID
            @endif
        </div>
    </div>
</div>
@endsection
