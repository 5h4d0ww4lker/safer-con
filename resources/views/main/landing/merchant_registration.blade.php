@extends('landing_master')

@section('main_content')
@section('title', 'Welcome - Arganon')

<!--================Categories Banner Area =================-->
<section class="solid_banner_area">
    <div class="container">
        <div class="solid_banner_inner">
            <h3>Merchant Registartion</h3>
            <ul>
                <li><a href="#">Home Page</a></li>
                <li><a href="#">Merchant Registartion</a></li>
            </ul>
        </div>
    </div>
</section>
<!--================End Categories Banner Area =================-->

<!--================login Area =================-->
<section class="login_area p_100">
    <div class="container">
        <div class="login_inner">

            <div class="row">
              
                <div class="col-lg-3">

                    
                </div>
                <div class="col-lg-8">
                <div class="col-md-12">


@if(Session::has('toasts'))
@foreach(Session::get('toasts') as $toast)
<div class="alert alert-{{ $toast['level'] }}">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

    {{ $toast['message'] }}
</div>
@endforeach
@endif
</div>
                    <div class="login_title">
                        <h2>merchant account</h2>
                        <p>Follow the steps below to create email account enjoy the great mail.com emailing experience. Vivamus tempus risus vel felis condimentum, non vehicula est iaculis.</p>
                    </div>
                    <form class="login_form row" action="{{ url('store_merchant') }}" method="post">

                        {{ csrf_field() }}

                        <div class="col-lg-6">
                            <div class="col-lg-12 form-group">
                                <input class="form-control" type="text" placeholder="Name" name="name" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <input class="form-control" type="text" placeholder="Father Name" name="father_name" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <select  name="gender" style="height: 50px;

border: 1px solid
#cccccc;

border-radius: 0px;

-webkit-box-shadow: none;

box-shadow: none;

outline: none;

padding: 0px 22px;

box-shadow: none;

line-height: 50px;display: block;

width: 100%;

padding: .375rem .75rem;

font-size: 1rem;

line-height: 1.5;

color:
#495057;

background-color:
#fff;

background-image: none;

background-clip: padding-box;

border: 1px solid #ced4da;

border-radius: .25rem;

transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;" required>

                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-lg-12 form-group">
                                <input class="form-control" type="email" placeholder="Email" name="email" required>
                            </div>

                            <div class="col-lg-12 form-group">
                                <input class="form-control" type="tel" placeholder="Phone" name="phone_no1" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <input class="form-control" type="password" placeholder="Password" name="password" required>
                            </div>



                        </div>
                        <div class="col-lg-6">
                        <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="ctown">Region <span>*</span></label><br/>
                                                            <select  name="region" style="height: 50px;

border: 1px solid
#cccccc;

border-radius: 0px;

-webkit-box-shadow: none;

box-shadow: none;

outline: none;

padding: 0px 22px;

box-shadow: none;

line-height: 50px;display: block;

width: 100%;

padding: .375rem .75rem;

font-size: 1rem;

line-height: 1.5;

color:
#495057;

background-color:
#fff;

background-image: none;

background-clip: padding-box;

border: 1px solid #ced4da;

border-radius: .25rem;

transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;" required>
                                                                
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
                                                            <input type="text" name="city"  class="form-control" id="address" aria-describedby="address" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="address">Sub City <span>*</span></label>
                                                            <input type="text" name="sub_city"  class="form-control" id="address" aria-describedby="address" required>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="address">Location<span>*</span></label>
                                                            <input type="text" name="location"  class="form-control" id="address" aria-describedby="address" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="address">Building (Nearby building form your residence.) <span>*</span></label>
                                                            <input type="text" name="building"  class="form-control" id="address" aria-describedby="address" required>

                                                        </div>
                                                    </div>
                          
                            <div class="col-lg-12 form-group">
                                <button type="submit" value="submit" class="btn subs_btn form-control">register now</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End login Area =================-->
@endsection