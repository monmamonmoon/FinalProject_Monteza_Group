@extends('user.user_dashboard')

@section('user')
<div class="dashboard-banner__main">
    <div class="dashboard-banner__column dashboard-banner__column--two order-top">
        <div class="dashboard-banner__single-slider order-top">
            <img src="img/active-bids-img.png" alt="#">
        </div>
    </div>
    <div class="dashboard-banner__column dashboard-banner__column--one">
        <div class="dashboard-banner__content">
            <h2 class="dashboard-banner__title" style="color: black;">Egg Batch Name: {{ $eggs->batch_name }}</h2>
        </div>	
        
        <div class="dashboard-banner__bids">
            <form method="POST" action="{{ route('egg.buy', $eggs->batch_id) }}">
                @csrf
                <div class="dashboard-banner__bid">
                    <div class="dashboard-banner__group">
                        <p class="dashboard-banner__group-small" style="color: black;">QUANTITY OF EGGS</p>
                        <h3 class="dashboard-banner__group-title" style="color: black;">{{ $eggs->quantity }}</h3>
                    </div>
                </div>
                <div class="nftmax__item-form--group nftmax-last-name">
                    <label class="nftmax__item-label">Quantity </label>
                    <input class="nftmax__item-input" type="number" name="quantity" placeholder="123" required>
                </div>
                <div class="dashboard-banner__single-btn">
                    <button type="submit" class="nftmax-btn nftmax-btn__secondary radius">BUY</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
