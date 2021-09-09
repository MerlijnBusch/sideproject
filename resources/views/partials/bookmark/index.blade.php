@extends('layouts.main')

@section('page-title')

<h4>Bookmarks!</h4>

@endsection

@section('content')

    <div class="bookmark-container">
        <div>
    @foreach ($bookmarks as $bookmark)
        <div  onclick="getBookMarkData('{{route('bookmark.bookmarkItems', $bookmark->id)}}')">
        {{$bookmark->type}} <br>
        </div>
    @endforeach
        </div>
        <div id="bookmark-container-item-content">
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
                .then(() => {
                    document.getElementById("bookmark-container-item-content").append(el)
                })

        }

        class CustomComponent extends HTMLElement {
            constructor() {
                super();

                const _style = document.createElement('style');
                const _template = document.createElement('template');

                _style.innerHTML = `
                h1 {
                  color: tomato;
                }
                `;

                _template.innerHTML = `
                    <h1>
                      My Custom Element
                    </h1>
                  `;

                this.attachShadow({ mode: 'open' });
                this.shadowRoot.appendChild(_style);
                this.shadowRoot.appendChild(_template.content.cloneNode(true));
            }
        }

        customElements.define('custom-component', CustomComponent);
        const el = document.createElement('custom-component')

    </script>
@endsection


@section('footer-scripts')
    @include('layouts.scripts.bookmark')
@endsection
