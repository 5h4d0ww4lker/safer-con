        <!--================Categories Banner Area =================-->
        @extends('landing_master')

        @section('main_content')
        @section('title', 'Welcome - Arganon')


        <!--================End Categories Banner Area =================-->

        <!--================Categories Product Area =================-->
        <section class="categories_product_main p_80">
            <div class="container">
                <div class="categories_main_inner">
                    <div class="row row_disable">
                      
                        <div class="col-lg-9 float-md-right">

                            <div class="categories_product_area">
                                <div class="row">
                                    @if(Session::has('toasts'))
                                    @foreach(Session::get('toasts') as $toast)
                                    <div class="alert alert-{{ $toast['level'] }}">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                        {{ $toast['message'] }}
                                    </div>
                                    @endforeach
                                    @endif
                                    <div class="col-lg-12">
                                        <div class="billing_details">
                                            <h2 class="reg_title">Shipment Information</h2>
                                            <form class="billing_inner row" action="{{ route('submit_shipment_info') }}" method="post">
                                            {{ csrf_field() }}

                                            <input type="hidden" name="order_id" value="{{$order_id}}" class="form-control" id="address" aria-describedby="address" required>

                                                <div class="col-lg-6">

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="ctown">Region <span>*</span></label>
                                                            <select class="selectpicker" id="ctown" name="region" required>
                                                                <option value="{{$address_info->region}}" selected>{{$user_info->region}}
                                                                <option>
                                                                <option value="Addis Ababa">Addis Ababa</option>
                                                                <option value="Afar">Afar</option>
                                                                <option value="Amhara">Amhara</option>
                                                                <option value="Benishangul Gumz">Benishangul Gumz</option>
                                                                <option value="Diredawa">Diredawa</option>
                                                                <option value="Gambela">Gambela</option>
                                                                <option value="Harari">Harari</option>
                                                                <option value="Oromia">Oromia</option>
                                                                <option value="Somali">Somali</option>
                                                                <option value="SNNP">SNNP</option>
                                                                <option value="Tigray">Tigray</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="address">City <span>*</span></label>
                                                            <input type="text" name="city" value="{{$address_info->city}}" class="form-control" id="address" aria-describedby="address" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="address">Sub City <span>*</span></label>
                                                            <input type="text" name="sub_city" value="{{$address_info->sub_city}}" class="form-control" id="address" aria-describedby="address" required>

                                                        </div>
                                                    </div>

                                                  
                                                   
                                                </div>
                                                <div class="col-lg-6">


<div class="col-lg-12">
    <div class="form-group">
        <label for="address">Location<span>*</span></label>
        <input type="text" name="location" value="{{$address_info->location}}" class="form-control" id="address" aria-describedby="address" required>

    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label for="address">Building (Nearby building form your residence.) <span>*</span></label>
        <input type="text" name="building" value="{{$address_info->building}}" class="form-control" id="address" aria-describedby="address" required>

    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <label for="phone">Phone <span>*</span></label>
        <input type="text" name="phone_number_1" value="{{$user_info->phone_no}}" class="form-control" id="phone" aria-describedby="phone" required>
    </div>
</div>
<button type="submit" value="submit" class="btn subs_btn form-control">Complete</button>
<br><br>
</div>

                                            </form>
                                        </div>
                                    </div>



                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--================End Categories Product Area =================-->
        @endsection