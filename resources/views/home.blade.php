@extends("layouts.main-layout")

@section("content")

    <section class="text-center">

        <h1>
            Available comics <a href="{{ route('create') }}"> + </a>
        </h1>

        <ul class="list-unstyled">

            @foreach ($comics as $comic)

                <li>
                    <a href="{{ route('show', $comic -> id) }}">
                        {{ $comic -> title }}
                    </a>

                    <a class="mx-3 btn" href="{{ route('edit', $comic -> id) }}">
                        edit
                    </a>

                    <form class="d-inline" method="POST" action="{{ route('destroy', $comic -> id) }}">

                        @csrf
                        @method('DELETE')

                        <input class="mx-3 btn" type="submit" value="DELETE">
                    </form>
                </li>

            @endforeach
            
        </ul>
    </section>

@endsection