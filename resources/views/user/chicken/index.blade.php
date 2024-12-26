@extends('user.user_dashboard')

@section('user')

    <!-- Dashboard Inner -->
    <div class="nftmax-dsinner">
        <div class="nftmax-inner__heading mg-btm-20">
            <h2 class="nftmax-inner__page-title mb-0">BUY CHICKEN</h2>
        </div>
        <div class="row nftmax-gap-sq30">
            @foreach ($chicken as $chicken )
                <div class="col-xxl-3 col-lg-3 col-md-6 col-12">
                <!-- Treadning Single -->
                <div class="trending-action__single">
                    <!-- Trending Head -->
                    <div class="trending-action__head">
                        
                        <img src="{{ $chicken->batch_image ? asset('' . $chicken->batch_image) : asset('img/trending-img-1.png') }}" alt="{{ $chicken->batch_image ? $chicken->batch_image : 'Default Image' }}">
                    </div>
                    <!-- Trending Body -->
                    <div class="trending-action__body">
                        <h2 class="trending-action__title"><a href="active-bids.html">{{ $chicken->batch_name}}</a></h2>
                        <div class="dashboard-banner__bid dashboard-banner__bid-v2">
                            <!-- Single Bid -->
                            <div class="dashboard-banner__group dashboard-banner__group-v2">
                                <p class="dashboard-banner__group-small">Price</p>
                                <h3 class="dashboard-banner__group-title">{{ $chicken->price}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-banner__button trending-action__bottom">
                        <a href="{{ route('chicken.details', ['id' => $chicken->batch_id]) }}" class="nftmax-btn nftmax-btn__secondary radius">BUY CHICKEN</a>
                    </div>
                </div>
                <!-- End Treadning Single -->
            </div>
            @endforeach
            

        </div>

        
    </div>
    <!-- End Dashboard Inner -->
@endsection
