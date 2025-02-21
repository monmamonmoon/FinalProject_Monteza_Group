<!-- Start Header -->
<header class="nftmax-header">
    <div class="container">
        <div class="row g-50">
            <div class="col-12">
                <!-- Dashboard Header -->
                <div class="nftmax-header__inner">
                    <div class="nftmax__sicon close-icon d-xl-none"><img src="img/menu-toggle.svg" alt="#"></div>
                    <div class="nftmax-header__left">
                        
                    </div>
                    <div class="nftmax-header__right">
                        <div class="nftmax-header__group">
                            <!-- Search Form -->
                            
                            <!-- End Search Form -->
                            <div class="nftmax-header__group-two">
                                <div class="nftmax-header__right">
                                   
                                    <div class="nftmax-header__author">
                                        <div class="nftmax-header__author-img"><img src="img/profile-pic.png" alt="#"></div>
                                        <div class="nftmax-header__author-content">
                                            <h4 class="nftmax-header__author-title text-capitalize">{{ Auth::user()->username }}</h4>
                                            <p class="nftmax-header__author-text v1"><a href="#">{{ Auth::user()->email }}</a></p>
                                        </div>
                                        
                                        <!-- NFTMax Profile Hover -->
                                        <div class="nftmax-balance nftmax-profile__hover">
                                            <h3 class="nftmax-balance__title">My Profile</h3>
                                            <!-- NFTMax Balance List -->
                                            <ul class="nftmax-balance_list">
                                                
                                                <li>
                                                    <div class="nftmax-balance-info">
                                                        <div class="nftmax-balance__img nftmax-profile__img-five"><img src="img/profile-5.png" alt="#"></div>
                                                        <h4 class="nftmax-balance-name"><a href="{{url('user/logout')}}">Log Out</a></h4>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End NFTMax Balance Hover -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header -->