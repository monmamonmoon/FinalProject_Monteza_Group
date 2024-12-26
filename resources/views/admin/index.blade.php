@extends('admin.admin_dashboard')


@section('admin')
    <!-- Dashboard Slider -->
    <div class="dashboard-banner nftmax-bg-cover mg-top-40"
    style="background-image:url('img/banner-bg.png')">
    <div class="row">
        <div class="col-12">
            <div class="dashboard-banner__main">
                <div class="dashboard-banner__column dashboard-banner__column--one">
                    <!-- Dashboard Content -->
                    <div class="dashboard-banner__content">
                        <h2
                            class="dashboard-banner__title nftmax-font-regular nftmax-lspacing">
                            Lock and Lob x Fiesta Spurs</h2>
                        <p class="dashboard-banner__text nftmax-lspacing">ID : 2320382
                        </p>
                    </div>

                    <div class="nftmax-header__author nftmax-header__author-two ">
                        <div class="nftmax-header__author-img"><img
                                src="img/profile-pic-2.png" alt="#"></div>
                        <div class="nftmax-header__author-content ">
                            <h4
                                class="nftmax-header__author-title nftmax-header__author-title--two nftmax-lspacing">
                                Brokln Simons</h4>
                            <p
                                class="nftmax-header__author-text nftmax-header__author-text--two">
                                <a href="#"
                                    class="nftmax-font-regular nftmax-lspacing">@broklinslam_75</a>
                            </p>
                        </div>
                    </div>

                    <div class="dashboard-banner__bids">
                        <div class="dashboard-banner__bid">
                            <!-- Single Bid -->
                            <div class="dashboard-banner__group">
                                <p class="dashboard-banner__group-small">Current Bid</p>
                                <h3 class="dashboard-banner__group-title">75,320 ETH
                                </h3>
                                <p class="dashboard-banner__group-small">773.69
                                    <span>USD</span></p>
                            </div>
                            <!-- End Single Bid -->
                            <div class="dashboard-banner__middle-border"></div>
                            <!-- Single Bid -->
                            <div class="dashboard-banner__group">
                                <p class="dashboard-banner__group-small">Remaing Time
                                </p>
                                <h3 class="dashboard-banner__group-title"
                                    data-countdown="2023/12/26"></h3>
                                <p class="dashboard-banner__group-small nftmax-timing">
                                    <span>Hrs</span> <span>Min</span> <span>Sec</span>
                                </p>
                            </div>
                            <!-- End Single Bid -->
                        </div>
                    </div>

                    <!-- Dashboard Banner Button -->
                    <div class="dashboard-banner__button">
                        <div class="dashboard-banner__single-btn">
                            <a class="dashboard-banner__heart"><i
                                    class="fa-solid fa-heart"></i></a>
                        </div>
                        <div
                            class="dashboard-banner__single-btn dashboard-banner__main-btn">
                            <a href="active-bids.html"
                                class="nftmax-btn nftmax-btn__secondary radius">Place a
                                Bid</a>
                        </div>
                        <div class="dashboard-banner__single-btn">
                            <a href="marketplace.html" class="nftmax-btn trs-white">View
                                Art Work</a>
                        </div>
                    </div>
                    <!-- End Dashboard Banner Button -->
                </div>
                <div class="dashboard-banner__column dashboard-banner__column--two">
                    <div class="dashboard-banner__slider">
                        <div class="dashboard-banner__single-slider">
                            <img src="img/dashboard-slider-1.png" alt="#">
                        </div>
                        <div class="dashboard-banner__single-slider">
                            <img src="img/slide_2.jpg" alt="#">
                        </div>
                        <div class="dashboard-banner__single-slider">
                            <img src="img/slide_3.jpg" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Dashboard Slider -->
@endsection