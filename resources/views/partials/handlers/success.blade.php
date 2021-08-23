@if (session()->has('success'))
    <div>
        @if(is_array(session()->get('success')))
            <ul>
                @foreach (session()->get('success') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @else
            {{ session()->get('success') }}
        @endif
    </div>
@endif
