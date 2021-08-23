@if (session()->has('error'))
    <div>
        @if(is_array(session()->get('error')))
            <ul>
                @foreach (session()->get('error') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @else
            {{ session()->get('error') }}
        @endif
    </div>
@endif
