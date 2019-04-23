@extends('layouts.app')
@section('title','商品一覧')
@section('content')
    {{link_to_route('items.create','新規登録',[],['class' =>'btn btn-primary btn-lg'])}}

    {{Form::open(['method'=>'GET','route' => 'items.search'])}}
        <div class="form-group">
            {{Form::label('name','商品名:')}}
            {{Form::text('name', null,['class'=>'form-control'])}}
            {{Form::label('name','カテゴリー:')}}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'']) }}
            {{Form::submit('検索',['class'=>'btn btn-primary form-control'])}}
        </div>
    {{Form::close()}}

    <table class="table table-striped">
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name', '商品名')</th>
                <th>@sortablelink('category_id', 'カテゴリー')</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{link_to_route('items.show',$item->id, ['item' => $item->id])}}</td>
                <td>{{$item->name}}</td>
                <td>{{ link_to_route('categories.show', $item->category->name, ['id' => $item->category->id], ['class' => 'btn btn-default']) }}</td>
                <td>{{ link_to_route('items.show', '詳細', ['id' => $item->id], ['class' => 'btn btn-default']) }}</td>
                <td>{{ link_to_route('items.edit', '編集', ['id' => $item->id], ['class' => 'btn btn-default']) }}</td>
                <td>
                    {{ Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete']) }}
                    {{ Form::submit('削除', ['class' => 'btn btn-danger btn-sm btn-dell']) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="paginate">
    {{$items->appends(request()->input())->links()}}
    </div>
{{--    <div class="paginate">--}}
{{--        {{ $items->render('pagination::bootstrap-4') }}--}}
{{--    </div>--}}

@endsection
