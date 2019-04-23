@extends('layouts.app')
@section('title','カテゴリー一覧')
@section('content')
    {{link_to_route('categories.create','新規登録',[],['class' =>'btn btn-primary'])}}

    {{Form::open(['method'=>'GET','route' => 'categories.search'])}}
    <div class="form-group">
        {{Form::label('name','カテゴリー名:')}}
        {{Form::text('name', null,['class'=>'form-control'])}}
        {{ csrf_field() }}
        {{Form::submit('検索',['class'=>'btn btn-primary form-control'])}}
    </div>
    {{Form::close()}}

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>カテゴリー名</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{link_to_route('categories.show',$category->id, ['item' => $category->id])}}</td>
                <td>{{$category->name}}</td>
                <td>{{ link_to_route('categories.show', '詳細', ['id' => $category->id], ['class' => 'btn btn-default']) }}</td>
                <td>{{ link_to_route('categories.edit', '編集', ['id' => $category->id], ['class' => 'btn btn-default']) }}</td>
                <td>
                    {{ Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) }}
                    {{ Form::submit('削除', ['class' => 'btn btn-danger btn-sm btn-dell']) }}
                    {{ Form::close() }}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginate">
        {{$categories->appends(request()->input())->links()}}
    </div>
@endsection
