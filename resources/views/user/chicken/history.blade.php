@extends('user.user_dashboard')

@section('user')
<div class="nftmax-table mg-top-40">
    <div class="nftmax-table__heading">
        <h3 class="nftmax-table__title mb-0">All CHICKEN TRANSACTION<span class="nftmax-table__badge">435</span></h3>
        <ul class="nav nav-tabs nftmax-dropdown__list" id="nav-tab" role="tablist">
            <li class="nav-item dropdown">
                <a class="nftmax-sidebar_btn nftmax-heading__tabs nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">All Categories 
                    <span class="nftmax-table__arrow--icon">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.7" d="M12.4124 0.247421C12.3327 0.169022 12.2379 0.106794 12.1335 0.0643287C12.0291 0.0218632 11.917 0 11.8039 0C11.6908 0 11.5787 0.0218632 11.4743 0.0643287C11.3699 0.106794 11.2751 0.169022 11.1954 0.247421L7.27012 4.07837C7.19045 4.15677 7.09566 4.219 6.99122 4.26146C6.88678 4.30393 6.77476 4.32579 6.66162 4.32579C6.54848 4.32579 6.43646 4.30393 6.33202 4.26146C6.22758 4.219 6.13279 4.15677 6.05312 4.07837L2.12785 0.247421C2.04818 0.169022 1.95338 0.106794 1.84895 0.0643287C1.74451 0.0218632 1.63249 0 1.51935 0C1.40621 0 1.29419 0.0218632 1.18975 0.0643287C1.08531 0.106794 0.990517 0.169022 0.910844 0.247421C0.751218 0.404141 0.661621 0.616141 0.661621 0.837119C0.661621 1.0581 0.751218 1.2701 0.910844 1.42682L4.84468 5.26613C5.32677 5.73605 5.98027 6 6.66162 6C7.34297 6 7.99647 5.73605 8.47856 5.26613L12.4124 1.42682C12.572 1.2701 12.6616 1.0581 12.6616 0.837119C12.6616 0.616141 12.572 0.404141 12.4124 0.247421Z" fill="#374557" fill-opacity="0.6"></path>
                        </svg>
                    </span>
                </a>
                <ul class="dropdown-menu nftmax-sidebar_dropdown">
                    <li><a class="dropdown-item list-group-item" data-bs-toggle="tab" data-bs-target="#table_1" role="tab">Categories V1</a></li>
                    <li><a class="dropdown-item list-group-item" data-bs-toggle="tab" data-bs-target="#table_2" role="tab">Categories V2</a></li>
                    <li><a class="dropdown-item list-group-item" data-bs-toggle="tab" data-bs-target="#table_3" role="tab">Categories V3</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="table_1" role="tabpanel">
            <!-- NFTMax Table -->
            <table id="nftmax-table__main" class="nftmax-table__main nftmax-table__main-v1">
                <!-- NFTMax Table Head -->
                <thead class="nftmax-table__head">
                    <tr>
                        <th class="nftmax-table__column-1 nftmax-table__h1">All Batches</th>
                        <th class="nftmax-table__column-2 nftmax-table__h2">User Name</th>
                        <th class="nftmax-table__column-3 nftmax-table__h3">Quantity</th>
                        <th class="nftmax-table__column-4 nftmax-table__h4">Price Each</th>
                        <th class="nftmax-table__column-5 nftmax-table__h5">Total</th>
                    </tr>
                </thead>
                <!-- NFTMax Table Body -->
                <tbody class="nftmax-table__body">
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="nftmax-table__column-1 nftmax-table__data-1">
                                <div class="nftmax-table__product">
                                    <div class="nftmax-table__product-img">
                                        <img src="{{ asset($transaction->batchChicken->batch_image) }}" alt="#">
                                    </div>
                                    <div class="nftmax-table__product-content">
                                        <h4 class="nftmax-table__product-title">{{ $transaction->batchChicken->batch_name ?? 'N/A' }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td class="nftmax-table__column-2 nftmax-table__data-2">
                                <div class="nftmax-table__amount nftmax-table__text-one">
                                    <img src="img/eth-icon.png" alt="#"><span class="nftmax-table__text">{{ $transaction->user->username ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td class="nftmax-table__column-3 nftmax-table__data-3">
                                <div class="nftmax-table__amount nftmax-table__text-two">
                                    <img src="img/usd-icon.png" alt="#"><span class="nftmax-table__text">{{ $transaction->quantity }}</span>
                                </div>
                            </td>
                            <td class="nftmax-table__column-4 nftmax-table__data-4">
                                <p class="nftmax-table__text nftmax-table__up-down nftmax-rcolor">{{ $transaction->price_each }}</p>
                            </td>
                            <td class="nftmax-table__column-5 nftmax-table__data-5">
                                <p class="nftmax-table__text nftmax-table__bid-text">{{ $transaction->total }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <!-- End NFTMax Table Body -->
            </table>
            <!-- End NFTMax Table -->
        </div>
    </div>
</div>
@endsection
