@extends('layouts.main')

@section('page-title')

    <div class="profile-banner-container ">
        <div class="profile-banner-container-actions">
            <div class="profile-banner-container-actions-btn-name">
            <button>terug</button>
                <div>John gekke Doe</div>
            </div>
            <div class="profile-banner-container-actions-inf">
                <div>44 fotos</div>
                <div>31 videos</div>
                <div>650 total like</div>
            </div>
        </div>
        <div class="profile-banner-container-image-container">
            <img class="profile-banner-container-image"
                src="https://public.onlyfans.com/files/thumbs/w760/r/rk/rkc/rkc8rarfjn3lwe0mzb3bfbkmvwpbpugi1627617891/header.jpg" alt="Yanet Garcia">
        </div>
    </div>
    <div class="profile-banner-container-second">
        <a>
            <img class="profile-banner-container-second-avatar" src="https://public.onlyfans.com/files/thumbs/c144/w/w8/w8w/w8wz6svukrvginogstjv88blces3vohg1619401797/avatar.jpg" alt="Yanet Garcia">
        </a>
        <div class="profile-banner-container-second-actions">
            @include('partials.profile.follow', ['user' => $user])
            @include('partials.profile.share', ['user' => $user])
        </div>
    </div>
    <div>
        <h5>Olivia Knight</h5>
        <h6>@chesswitholivia Available now</h6>

        <div>
            Chess Babe✨
            OFTV Weekly Video: Chess With Olivia ♟
            Chess Live Streams 🤳
            https://Chesswitholivia.com
            https://www.amazon.com/hz/wishlist/ls/2LGV4V8SMDU0B?ref_=wl_share
        </div>
        <a>Collapse info</a>
    </div>



@endsection

@section('content')

    @forelse ($posts as $post)
        @include('partials.post.single', ['post' => $post])
    @empty
        <p>This user still needs to create post</p>
    @endforelse

@endsection

@section('footer-scripts')
    @include('layouts.scripts.postFooter')
@endsection
