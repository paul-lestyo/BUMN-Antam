@extends('layouts.fe-template')

@section('pageStyling')
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    .content-3-2 .btn:focus,
    .content-3-2 .btn:active {
        outline: none !important;
    }

    .content-3-2 {
        padding: 5rem 2rem;
    }

    .content-3-2 .img-hero {
        width: 100%;
        margin-bottom: 3rem;
    }

    .content-3-2 .right-column {
        width: 100%;
    }

    .content-3-2 .title-text {
        font: 600 1.875rem/2.25rem Poppins, sans-serif;
        margin-bottom: 2.5rem;
        letter-spacing: -0.025em;
        color: #121212;
    }

    .content-3-2 .title-caption {
        font: 500 1.5rem/2rem Poppins, sans-serif;
        margin-bottom: 1.25rem;
        color: #121212;
    }

    .content-3-2 .circle {
        font: 500 1.25rem/1.75rem Poppins, sans-serif;
        height: 3rem;
        width: 3rem;
        margin-bottom: 1.25rem;
        border-radius: 9999px;
        background-color: #27c499;
    }

    .content-3-2 .text-caption {
        font: 400 1rem/1.75rem Poppins, sans-serif;
        letter-spacing: 0.025em;
        color: #565656;
    }

    .content-3-2 .btn-learn {
        font: 600 1rem/1.5rem Poppins, sans-serif;
        padding: 1rem 2.5rem;
        background-color: #27c499;
        transition: 0.3s;
        letter-spacing: 0.025em;
        border-radius: 0.75rem;
    }

    .content-3-2 .btn:hover {
        background-color: #45dbb2;
        transition: 0.3s;
    }

    @media (min-width: 768px) {
        .content-3-2 .title-text {
            font: 600 2.25rem/2.5rem Poppins, sans-serif;
        }
    }

    @media (min-width: 992px) {
        /* .content-3-2 .img-hero {
            width: 50%;
            margin-bottom: 0;
        } */

        .content-3-2 .right-column {
            width: 50%;
        }

        .content-3-2 .circle {
            margin-right: 1.25rem;
            margin-bottom: 0;
        }
    }

</style>
@endsection

@section('content')
<section class="h1-00 w-100 bg-white" style="box-sizing: border-box">
    <div class="content-3-2 container-xl mx-auto  position-relative" style="font-family: 'Poppins', sans-serif">
        <div class="row justify-conten-center align-items-center">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="img-hero">
                    <img id="hero" class="img-fluid"
                        src="http://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content3/Content-3-1.png"
                        alt="" />
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="text-lg-start">
                    <h2 class="title-text text-center">About Us</h2>
                    <p class="text-caption">
                        {{ $about->deskripsi }}
                    </p>
                    <div class="mt-5">
                        <a class="btn btn-learn text-white float-right" href="{{ route('contact') }}">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
