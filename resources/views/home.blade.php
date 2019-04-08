@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Forms</div>

                <div class="panel-body">
                    @if (count($forms) > 0) 
                        @foreach ($forms as $formid=>$form)
                        <div class="panel panel-default text-center">
                            <div class="panel-heading" style="font-size: 28px;">
                                <a href='/form/{{$formid}}'>{{ $form['name'] }}</a>
                            </div>
                            <div class="panel-body">
                                @if (count($form['items']))
                                    @foreach($form['items'] as $item)
                                        <p style="{{ $item['required']? 'font-weight:bold': '' }}">{{ $item['label'] }}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @endforeach
                    @else
                        No forms yet
                    @endif
                    
                </div>
                <button class="btn btn-primary">Create Form</button>
            </div>
        </div>
    </div>
</div>
@endsection
