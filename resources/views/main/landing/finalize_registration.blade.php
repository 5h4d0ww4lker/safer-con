        <!--================Categories Banner Area =================-->
        @extends('landing_master')

        @section('main_content')
        @section('title', 'Welcome - Arganon')


        <style>
            #sel {
                height: 50px;

                border: 1px solid #cccccc;

                border-radius: 0px;

                -webkit-box-shadow: none;

                box-shadow: none;

                outline: none;

                padding: 0px 22px;

                box-shadow: none;

                line-height: 50px;
                display: block;

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

                transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            }
        </style>
        <!--================End Categories Banner Area =================-->

        <!--================Categories Product Area =================-->
        <section class="categories_product_main p_80">
            <div class="container">
                <div class="categories_main_inner">
                    <div class="row row_disable">
                        <div class="col-lg-9 float-md-right">


                            <div class="categories_product_area">
                              
                                <div class="row">
                                    <div class="col-lg-7 offset-2">
                                    @if(Session::has('toasts'))
                                @foreach(Session::get('toasts') as $toast)
                                <div class="alert alert-{{ $toast['level'] }}">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                    {{ $toast['message'] }}
                                </div>
                                @endforeach
                                @endif
                                        <div class="order_box_price">
                                            <h2 class="reg_title">Finalize Registration</h2>
                                            <div class="payment_list">

                                                <form action="{{ url('complete_registration') }}" method="post" id="order">
                                                    {{ csrf_field() }}
                                                   
                                                    <div class="col-lg-12 form-group">
                                                        <label for="text">Activation Key</label>
                                                        <input class="form-control" type="text" name="activation_key" required>
                                                    </div>

                                                  
                                                    <div class="col-lg-12 form-group">
                                                        <button type="submit" class="btn btn-primary checkout_btn">Verify</button>
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
            </div>
        </section>
        <!--================End Categories Product Area =================-->
        @endsection