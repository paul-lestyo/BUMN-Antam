@extends('layouts.fe-template')

@section('pageStyling')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Merriweather:wght@900&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;900&family=Merriweather:wght@900&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap");

    * {
        font-family: 'Poppins', 'Inter', sans-serif !important;
    }

    body .cl-light {
        color: #EEEEEE;
    }

    body .cl-light-grey-2 {
        color: #90BCB7;
    }

    body .font-lora {
        font-family: 'Lora', sans-serif !important;
    }

    body .explain {
        /* background-color: #000909; */
        background-color: inherit;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    @media only screen and (min-width: 768px) {
        body .explain {
            /* padding-top: 160px; */
            padding-top: 100px;
            padding-bottom: 100px;
        }
    }

    body .explain h1 {
        font-weight: 700;
        /* color: #EEEEEE; */
        color: #0A0F16;
    }

    @media only screen and (min-width: 768px) {
        body .explain h1 {
            font-size: 40 !important;
        }
    }

    body .explain .card {
        z-index: 1;
        /* background: #0A0F16; */
        background: white;
        border-radius: 12px !important;
        width: 364px !important;
        margin-top: 56px !important;
        width: 25.25rem !important;
		padding: 0 !important;
        border: unset;
        box-shadow: 0 .250rem .50rem rgba(0, 0, 0, .1) !important;
        text-decoration: none
    }

	body .card img {
		width: 100%;
		height: 175px;
		object-fit: cover;
		object-position: center;
		border-radius: 10px 10px 0 0;
	}

    body .explain .card .card-body {
        padding: 32px 40px !important;
    }

    /* @media only screen and (min-width: 768px) {
        body .explain .card-desc {
            padding-top: 40px;
        }
    } */

    body .explain .card-title {
        font-weight: 700;
        /* color: #EEEEEE; */
        color: #0A0F16;
    }

    body .explain .card-text {
        font-weight: 400;
        font-size: 16px;
        /* color: #888888; */
        color: #565656;
    }

    body .explain .card-desc small {
        color: #0A0F16;
    }

    .page-item .page-link {
        color: black;
    }

    .page-item.active .page-link {
        background-color: black !important;
        border-color: black !important;
        /* color: white; */
    }

</style>
@endsection

@section('content')
<section class="explain">

    <div class="my-3 container-xxl">
        <div class="row text-center d-block mx-0">
            <h1>
                Our Article
            </h1>
        </div>
        <div class="row mx-0 mt-3 d-flex justify-content-around mx-3 mx-md-4">
            @foreach ($articles as $article)
            <a class="card rounded-lg" href="{{ route('article.detail',$article->id) }}">
				<div class="wrap-image">
					<img class="img-fluid" src="{{ secure_asset($article->img) }}">
				</div>
                <div class="card-body">
                    <div class="card-desc">
                        <div class="d-flex justify-content-between">
                            <small>{{ $article->category }}</small>
                            <small style="font-size: 10px;" class="align-self-center">{{ $article->created_at->diffForHumans() }}</small>
                        </div>
                        <h4 class="card-title my-3">{{ $article->judul }}</h4>
                        <p class="card-text">{!! substr(strip_tags($article->deskripsi),0,150) !!}...</p>
                        <small class="d-block text-right">{{ $article->author }}</small>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-5 d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>
    <!-- end explain -->
</section>
@endsection
