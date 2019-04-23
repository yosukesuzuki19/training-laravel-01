@extends('layouts.app')
@section('title','商品詳細')
@section('content')
    {{Form::open(['route' => ['items.update', $item->id],'method' => 'put'])}}
    <div class="form-group">
        {{Form::label('name','商品名:')}}
        {{Form::text('name', $item->name,['class'=>'form-control'])}}
        {{Form::label('name','カテゴリー:')}}
        {{ Form::select('category_id', $categories, $item->category->name, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{Form::submit('更新',['class'=>'btn btn-primary form-control'])}}
    </div>
    {{Form::close()}}
    <td>{{ link_to_route('items.index', '商品一覧に戻る', null, ['class' => 'btn btn-default']) }}</td>
@endsection