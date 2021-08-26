@if (session()->has('errors'))
    <div>
        @if(is_array(session()->get('errors')))
            <ul>
                @foreach (session()->get('errors') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @else
            {{ session()->get('errors') }}
        @endif
    </div>
@endif
