<div class="dashboard-sidebar">
                        <div class="profile-top">
                            <div class="profile-image">
                                @if(Auth::user()->image)
                                <img src="{{asset('files/'.Auth::user()->image)}}" alt="" class="img-fluid">
                                @else
                                <img src="{{asset('assets/images/avtar.png')}}" alt="" class="img-fluid">
                                @endif
                            </div>
                            @php 
                                $user_level = Auth::user()->user_level;
                                if($user_level==2) { $rank = 'Active Associate'; }
                                elseif($user_level==3) { $rank = 'Bronze'; }
                                elseif($user_level==4) { $rank = 'Silver'; }
                                elseif($user_level==5) { $rank = 'Gold'; }
                                else { $rank = 'Associate'; }
                            
                            @endphp
                            <div class="profile-detail">
                                <h5>{{ Auth::user()->f_name.' '.Auth::user()->l_name }}</h5>
                                <h6>{{ Auth::user()->customer_id }}</h6>
                                <h6>{{ Auth::user()->email }}</h6>
                                <h6>{{ $rank }}</h6>
                            </div>
                        </div>
                        
                        <div class="faq-tab">
                            <ul class="nav nav-tabs" id="top-tab" role="tablist">
                                <li class="nav-item"><a href="{{ url('/user') }}"
                                        class="nav-link {{ (Request::segment(2)=='')?'active':'' }}">Dashboard</a></li>
                                <!-- <li class="nav-item"><a href="{{ url('/user/address') }}"
                                        class="nav-link {{ (Request::segment(2)=='address')?'active':'' }}">Address Book</a></li> -->
                                <li class="nav-item"><a href="{{ url('/user/orders') }}"
                                        class="nav-link {{ (Request::segment(2)=='orders')?'active':'' }}">My Orders</a></li>
                                <!-- <li class="nav-item"><a href="{{ url('/user/wishlist') }}"
                                        class="nav-link">My Wishlist</a></li> -->
                                <!-- <li class="nav-item"><a href="{{ url('/user/cards') }}"
                                        class="nav-link">Saved Cards</a></li> -->
                                <li class="nav-item"><a href="{{ url('/user/profile') }}"
                                        class="nav-link {{ (Request::segment(2)=='profile')?'active':'' }}">Profile</a></li>
                                <li class="nav-item"><a href="{{ url('/user/recent-clicks') }}"
                                        class="nav-link {{ (Request::segment(2)=='recent-clicks')?'active':'' }}">Recent clicks</a></li>
                                <!-- <li class="nav-item"><a href="{{ url('/user/security') }}"
                                        class="nav-link">Security</a> </li> -->
                                <li class="nav-item"><a href="{{ url('/user/password') }}"
                                        class="nav-link {{ (Request::segment(2)=='password')?'active':'' }}">Password</a></li>
                                <li class="nav-item"><a href="{{ url('/user/logout') }}" 
                                        class="nav-link">Log Out</a> </li>
                            </ul>
                        </div>
                    </div>