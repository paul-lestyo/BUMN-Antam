@extends('layouts.fe-template')

@section('pageStyling')
<link rel="stylesheet" href="{{ asset('dist/css/fe/header.css') }}">

<style>
    /* why choose us */
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap");

    * {
        font-family: 'Inter', sans-serif !important;
    }

    body .choose {
        background-color: #F9FCFC;
    }

    body .choose h1 {
        color: #232323;
        font-weight: 700 !important;
    }

    body .choose p {
        color: #879FB0;
    }

    @media screen and (min-width: 768px) {
        body .choose h1 {
            font-size: 60px !important;
        }
    }

    body .cl-blue {
        color: #0F52BA !important;
    }

    /* why choose us end*/

</style>
@endsection

@section('header')
<div>
    <div class="mx-auto row hero">
        <!-- Left Column -->
        <div
            class="col-lg-6 align-items-lg-start text-lg-start align-items-center text-center">
            <h1 class="title-text-big">
                Logam Mulia<br class="d-lg-block d-none" />
                <span style="color: #CB9D2A">PT Antam Tbk</span>
            </h1>
            <p class="text-caption text-center mb-5">
                To become a leading global corporation through diversification and integrated natural-resource based business
            </p>
            <div class="d-flex flex-sm-row mx-auto mx-lg-0  justify-content-center gap-3">
                <a href="{{ route('about') }}" class="btn btn-get text-white d-inline-flex border-0" style="background-color:#CB9D2A;">
                    About Us
                </a>
                <a href="{{ route('contact') }}" class="btn btn-outline">
                    <div class="d-flex align-items-center">
                        Contact Us
                    </div>
                </a>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-6 justify-content-center justify-content-lg-start text-center pe-0">
            <img class="d-lg-block d-none hero-right w-100"
                src="{{ asset('dist/img/gold-bars.png') }}"
                alt="" />
        </div>
    </div>
</div>

@endsection

@section('content')
{{-- <section class="choose">
    <div class="container pb-4 px-4">
        <div class="row text-center d-block pt-5 pb-md-4">
            <h1 class="my-3">
                Why choose us
            </h1>
            <p>
                House is commited to helping its clients to reach their goals.
            </p>
        </div>
        <div class="row py-5">
            <div class="col-md-3 p-4" onmouseover="coloringgoals(this)" onmouseout="normalgoals(this)">
                <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-House/taxes.svg"
                    alt="taxes" class="img-fluid">
                <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-House/taxes-color.svg"
                    alt="taxes" class="img-fluid" style="display: none;">
                <p class="font-weight-bold mt-4 mb-1 cl-blue">
                    Tax Advantage
                </p>
                <p class="mb-0">
                    Tax advantage which applies to certain accounts or investments.
                </p>
            </div>
            <div class="col-md-3 p-4" onmouseover="coloringgoals(this)" onmouseout="normalgoals(this)">
                <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-House/user.svg"
                    alt="user" class="img-fluid">
                <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-House/user-color.svg"
                    alt="user" class="img-fluid" style="display: none;">
                <p class="font-weight-bold mt-4 mb-1 cl-blue">
                    Property Insurance
                </p>
                <p class="mb-0">
                    A series of policies that offer either property protection of liability coverage.
                </p>
            </div>
            <div class="col-md-3 p-4" onmouseover="coloringgoals(this)" onmouseout="normalgoals(this)">
                <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-House/discount.svg"
                    alt="discount" class="img-fluid">
                <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-House/discount-color.svg"
                    alt="user" class="img-fluid" style="display: none;">
                <p class="font-weight-bold mt-4 mb-1 cl-blue">
                    Lowest Commision
                </p>
                <p class="mb-0">
                    No longer have to negatiate commissions and haggle with other agents.
                </p>
            </div>
            <div class="col-md-3 p-4" onmouseover="coloringgoals(this)" onmouseout="normalgoals(this)">
                <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-House/calendar.svg"
                    alt="calendar" class="img-fluid">
                <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content-House/calendar-color.svg"
                    alt="user" class="img-fluid" style="display: none;">
                <p class="font-weight-bold mt-4 mb-1 cl-blue">
                    House Now
                </p>
                <p class="mb-0">
                    Easy booking system for a host. Try our innovative model.
                </p>
            </div>
        </div>
    </div>
</section> --}}
@endsection

@section('pageScript')
<script>
    function coloringgoals(x) {
        x.classList.add('bg-white');
        x.classList.add('rounded-24');
        x.childNodes[1].style.display = "none";
        x.childNodes[3].style.display = "block";
    }

    function normalgoals(x) {
        x.classList.remove('bg-white');
        x.classList.remove('rounded-24');
        x.childNodes[1].style.display = "block";
        x.childNodes[3].style.display = "none";
    }

</script>
@endsection