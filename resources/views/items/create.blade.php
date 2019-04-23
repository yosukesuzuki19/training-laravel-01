@extends('layouts.app')
@section('title','商品登録')
@section('content')

    {{-- エラーの表示を追加 --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{Form::open(['route' => 'items.store'])}}
    <div class="form-group">
        {{Form::label('name','商品名:')}}
        {{Form::text('name', null,['class'=>'form-control'])}}
        {{Form::label('name','カテゴリー:')}}
        {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{Form::submit('登録',['class'=>'btn btn-primary form-control'])}}
    </div>
    {{Form::close()}}
@endsection
