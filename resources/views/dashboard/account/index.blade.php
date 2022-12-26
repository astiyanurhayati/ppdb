<x-layout-app title="Edit Foto - PPDB">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">My Account</h1>
            <div class="row gy-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                            
                                <div class="col-auto">
                                    <h4 class="app-card-title">Profile</h4>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label mb-2"><strong>Photo</strong></div>
                                        <div class="item-data">
                                            @if(is_null(Auth::user()->image_profile))
                                            <img src ="{{asset('assets/img/profile.png')}}" alt=""
                                            width = "100">
                                              @else
                                              <img src="{{asset('assets/img/'.Auth::user()->image_profile)}}" alt=""
                                              width="100">
                                            @endif
                                        </div>
                                    </div>
                                    <!--//col-->
                                    <div class="col text-end">
                                        <a class="btn-sm app-btn-secondary" href="{{route('profile.edit')}}">Change</a>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                            </div>
                            <!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Name</strong></div>
                                        <div class="item-data">{{$user->nama_lengkap}}</div>
                                    </div>

                                </div>
                                <!--//row-->
                            </div>
                            <!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Email</strong></div>
                                        <div class="item-data">{{$user->email}}</div>
                                    </div>

                                    <!--//row-->
                                </div>
                            
                            </div>


                        </div>
                        <!--//app-card-->
                    </div>

                </div>
                <!--//row-->

            </div>
            <!--//container-fluid-->
        </div>

</x-layout-app>