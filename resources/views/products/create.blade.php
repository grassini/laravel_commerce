@extends('app')


@section('content')
    <div class="container">
        <h1>Create Product</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'products.store']) !!}

        <div class="form-group">
            {!! Form::label('category', 'Category: ') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control'] ) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name', 'Name: ') !!}
            {!! Form::text('name', null, ['class'=>'form-control'] ) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description: ') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control'] ) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price: ') !!}
            {!! Form::text('price', null, ['class'=>'form-control'] ) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Featured ?') !!}
            {!! Form::radio('featured', 1, ['class' => 'form-control']) !!} Yes
            {!! Form::radio('featured', 0, ['class' => 'form-control']) !!} No
        </div>

        <div class="form-group">
            {!! Form::label('Recommend ?') !!}
            {!! Form::radio('recommend', 1, ['class' => 'form-control']) !!} Yes
            {!! Form::radio('recommend', 0, ['class' => 'form-control']) !!} No
        </div>


        <div class="form-group">
            {!! Form::label('tags', 'Tags: (Use o padrão: nomeDaTag, nomeDaTag, nomeDaTag,...)') !!}
            {!! Form::text('tags', null, ['class' => 'form-control input-lg']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Add Product', ['class'=>'btn btn-primary '] ) !!}
            <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
