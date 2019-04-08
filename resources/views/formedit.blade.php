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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    <h3 class="text-center">Items</h3>
                        {{ csrf_field() }}
                        @if($form['items'] && count($form['items']) > 0)
                            @foreach($form['items'] as $index=>$item)

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name-{{$index}}" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name-{{$index}}" class="form-control" name="name-{{$index}}" value="{{ $item['name'] }}" readonly>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
                                    <label for="label-{{$index}}" class="col-md-4 control-label">Display</label>

                                    <div class="col-md-6">
                                        <input id="label-{{$index}}" class="form-control" name="label-{{$index}}" value="{{ $item['label'] }}" required>

                                        @if ($errors->has('label'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('label') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('placeholder') ? ' has-error' : '' }}">
                                    <label for="placeholder-{{$index}}" class="col-md-4 control-label">Placeholder</label>

                                    <div class="col-md-6">
                                        <input id="placeholder-{{$index}}" class="form-control" name="placeholder-{{$index}}" value="{{ $item['placeholder'] }}" required>

                                        @if ($errors->has('placeholder'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('placeholder') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                                    <label for="icon-{{$index}}" class="col-md-4 control-label">Icon</label>

                                    <div class="col-md-4">
                                        <input id="icon-{{$index}}" class="form-control icon-text" name="icon-{{$index}}" value="{{ $item['icon'] }}">

                                        @if ($errors->has('icon'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('icon') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        @if($item['icon'])
                                            <ion-icon id="icon-{{$index}}-md" size="large" name="md-{{ $item['icon'] }}"></ion-icon>
                                            <ion-icon id="icon-{{$index}}-ios" size="large" name="ios-{{ $item['icon'] }}"></ion-icon>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <label for="type-{{$index}}" class="col-md-4 control-label">Type</label>

                                    <div class="col-md-6">
                                        {{ Form::select("type-$index", array('integer' => 'Integer', 'real' => 'Real Number', 'text' => 'Text', 'select' => 'Drop-Down'), $item['type'], array('class' => 'form-control')) }}

                                        @if ($errors->has('type'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('min') ? ' has-error' : '' }}{{ $item['type'] === 'integer' || $item['type'] === 'real' ? '': ' hidden'}}">
                                    <label for="min-{{$index}}" class="col-md-4 control-label">Minimum</label>

                                    <div class="col-md-6">
                                        <input class="form-control" type="number" id="min-{{$index}}" name="min-{{$index}}" {{ $item['type'] === 'integer' ? 'step="1"': ''}} value="{{ isset($item['min']) ? $item['min']: '' }}" />

                                        @if ($errors->has('min'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('min') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('max') ? ' has-error' : '' }}{{ $item['type'] === 'integer' || $item['type'] === 'real' ? '': ' hidden'}}">
                                    <label for="max-{{$index}}" class="col-md-4 control-label">Maximum</label>

                                    <div class="col-md-6">
                                        <input class="form-control" type="number" id="max-{{$index}}" name="max-{{$index}}" {{ $item['type'] === 'integer' ? 'step="1"': ''}} value="{{ isset($item['max']) ? $item['max']: '' }}" />

                                        @if ($errors->has('max'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('max') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('options') ? ' has-error' : '' }}{{ $item['type'] === 'select' ? '': ' hidden'}}">
                                    <label for="options-{{$index}}" class="col-md-4 control-label">Options</label>

                                    <div class="col-md-6">
                                        {{-- <textarea class="form-control" rows="{{ isset($item['options']) && count($item['options']) > 0 ? count($item['options']): "2" }}" id="options-{{$index}}" name="options-{{$index}}">@if($item['type'] == 'select' && isset($item['options']))@foreach ($item['options'] as $index=>$option){{$option['label']}}:{{$option['value']}}
@endforeach @endif</textarea> --}}
                                        <div class="form-row">
                                            <div class="form-group col-md-6"><label>Label</label></div>
                                            <div class="form-group col-md-6"><label>Value</label></div>
                                        </div>
                                        @if(isset($item['options'] ))
                                            @foreach($item['options'] as $optindex=>$option)
                                                <div class="form-row">
                                                    <div class="form-group col-md-6"><input type="text" class="form-control" name="options[{{$optindex}}][label]" value="{{$option['label']}}" /></div>
                                                    <div class="form-group col-md-6"><input type="text" class="form-control" name="options[{{$optindex}}][value]" value="{{$option['value']}}" /></div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <input type="button" onclick="addOption({{$index}})" class="btn btn-default" value="Add Option" />
                                        @if ($errors->has('options'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('options') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="required-{{$index}}" class="col-md-4 control-label form-check-label">Required</label>
                                    <div class="col-md-6">
                                        <input class="form-check-input" type="checkbox" id="required-{{$index}}" style="margin-top:1em;" name="required-{{$index}}" {{ isset($item['required']) && $item['required'] ? 'checked' : '' }}>
                                    </div>
                                </div>

                                <hr />
                            @endforeach
                        @endif
                        <h3 class="text-center">Users</h3>
                        @if($form['users'] && count($form['users']) > 0)
                            @foreach($form['users'] as $user) 
                                <div>{{ $user }}</div>
                            @endforeach
                        @endif
                        <button type="submit" class="btn btn-primary">Save</a>
                    </form>
                </div>
            @else
                No form found by that ID
            @endif
        </div>
    </div>
</div>

@endsection


@push('scripts')

    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>

    <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(function() {
            $("select").on("change", function() {
                console.log($(this));
            });

            $("input.icon-text").on("change", function() {
                $("#" + this.id + "-md").attr("name", "md-" + this.value);
                $("#" + this.id + "-ios").attr("name", "ios-" + this.value);
            });
        });

        function addOption(index) {
            console.log(index);
        }
    </script>
@endpush


@push('css')
<link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
@endpush