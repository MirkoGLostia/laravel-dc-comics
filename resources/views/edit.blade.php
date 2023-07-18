@extends('layouts.main-layout')

@section('content')

    <section class="text-center">

        <h2>
            comic modify
        </h2>

        <form method="POST" action="{{ route('update', $comic -> id) }}">

            @csrf
            @method('PUT')

            <label for="title">Title</label>
            <br>
            <input type="text" name="title" id="title" value="{{ $comic -> title }}">
            <br>

            <label for="description">Description</label>
            <br>
            <input type="text" name="description" id="description" value="{{ $comic -> description }}">
            <br>

            <label for="thumb">Thumb</label>
            <br>
            <input type="text" name="thumb" id="thumb" value="{{ $comic -> thumb }}">
            <br>

            <label for="price">Price</label>
            <br>
            <input type="text" name="price" id="price" value="{{ $comic -> price }}">
            <br>

            <label for="series">Series</label>
            <br>
            <input type="text" name="series" id="series" value="{{ $comic -> series }}">
            <br>

            <label for="sale_date">Sale Date</label>
            <br>
            <input type="date" name="sale_date" id="sale_date" value="{{ $comic -> sale_date }}">
            <br>

            <label for="type">Type</label>
            <br>
            <input type="text" name="type" id="type" value="{{ $comic -> type }}">
            <br>

            <input class="my-3" type="submit" value="UPDATE">

        </form>
        
    </section>
    
@endsection