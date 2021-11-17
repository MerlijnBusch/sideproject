@extends('layouts.main')

@section('page-title')

    <h4>Bookmarks!</h4>

@endsection

@section('content')

    <div class="bookmark-container">
        <div>
            @foreach ($bookmarks as $bookmark)
                <div onclick="getBookMarkData('{{route('bookmark.bookmarkItems', $bookmark->id)}}')">
                    {{$bookmark->type}} <br>
                </div>
            @endforeach
        </div>
        <div id="bookmark-container-item-content">
            loading content
        </div>
    </div>

    <script type="text/javascript">
        function getBookMarkData(url) {
            document.dispatchEvent(new CustomEvent('bookmark-loading'))
            fetch(url)
                .then(response => response.json())
                .then((data) => {
                    document.dispatchEvent(new CustomEvent('bookmark-data', {
                        detail: data,
                    }))
                })
        }


        class PostComponent extends HTMLElement {

            _style = document.createElement('style');
            _template = document.createElement('template');

            constructor() {
                super();

                document.addEventListener("bookmark-loading", () => {
                    this.setToLoading()
                });

                document.addEventListener("bookmark-data", (evt => {
                    this.updateComponent(evt.detail)
                }));

                this._style.innerHTML = `
                h1 {
                  color: tomato;
                }
                `;

                this._template.innerHTML = `<div class="post-component-container"></div>`;

                this.attachShadow({mode: 'open'});
                this.shadowRoot.appendChild(this._style);
                this.shadowRoot.appendChild(this._template.content.cloneNode(true));
            }

            updateComponent(data) {
                console.log(data);

                const div = this.shadowRoot.querySelector(".post-component-container");
                div.innerHTML = '';
                data.forEach((item) => {
                    if(item.bookmark_item_type.toLowerCase().includes("comment"))
                        div.innerHTML += this.displayComment(item.comment)
                    if(item.bookmark_item_type.toLowerCase().includes("post"))
                        div.innerHTML += this.displayPost(item.post)
                    console.log(item)
                })
            }

            displayPost(post){
                return `<h1>${post.uuid}</h1></br>`
            }

            displayComment(comment){
                return `<h1>${comment.id}</h1></br>`
            }

            setToLoading() {
                const div = this.shadowRoot.querySelector(".post-component-container");
                div.innerHTML = '';
                div.innerHTML = `
                    <h1>
                       Loading
                    </h1>
                `;
            }
        }

        customElements.define('post-component', PostComponent);
        const el = document.createElement('post-component');
        document.getElementById("bookmark-container-item-content").append(el);

    </script>
@endsection


@section('footer-scripts')
    @include('layouts.scripts.bookmark')
@endsection
