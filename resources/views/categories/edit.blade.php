@extends('layouts.app')
@section('title','カテゴリー詳細')
@section('content')
    {{Form::open(['route' => ['categories.update', $category->id],'method' => 'put'])}}
    <div class="form-group">
        {{Form::label('name','カテゴリー名:')}}
        {{Form::text('name', $category->name,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::submit('更新',['class'=>'btn btn-primary form-control'])}}
    </div>
    {{Form::close()}}
    <td>{{ link_to_route('categories.index', 'カテゴリー一覧に戻る', null, ['class' => 'btn btn-default']) }}</td>
@endsection