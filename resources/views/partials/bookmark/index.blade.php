@extends('layouts.main')

@section('page-title')

<h4>Bookmarks!</h4>

@endsection

@section('content')

    <div class="bookmark-container">
        <div>
    @foreach ($bookmarks as $bookmark)
        <div  onclick="getBookMarkData({{}})">
        {{$bookmark->type}} <br>
        </div>
    @endforeach
        </div>
        <div>
            loading content
        </div>
    </div>

    <script type="text/javascript">
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


        function sendPostData(data, url){
            fetch(url, {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": token
                },
                method: 'post',
                credentials: "same-origin",
                body: JSON.stringify( data )
            })
        }

        function getBookMarkData(url) {
            fetch(url)
                .then(response => response.json())
                .then(data => console.log(data))
        }
    </script>
@endsection


@section('footer-scripts')
    @include('layouts.scripts.bookmark')
@endsection
