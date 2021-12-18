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
        border: unset;
        box-shadow: 0 .250rem .50rem rgba(0, 0, 0, .1) !important;
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
        color: #969696;
    }

</style>
@endsection

@section('content')
<section class="explain">

    <div class="my-2 container-xl">
        <div class="row text-center d-block mx-0 mb-5">
            <small class="d-inline-block mb-2">{{ $article->category }}</small> 
            <h1 class="mb-1">
                {{ $article->judul }}
            </h1>
            <small>{{ $article->author }} |  {{ $article->created_at->format('d M Y, H:i')}} WIB</small> 
        </div>
        <div class="row">
            <img src="{{ asset($article->img) }}" class="img-fluid" alt="{{ $article->judul }}">
        </div>
        <div class="row mx-0 mt-3 mx-3 mx-md-4">
            <p>{!! $article->deskripsi !!}</p>
        </div>
    </div>

    <!-- end explain -->
</section>
@endsection
