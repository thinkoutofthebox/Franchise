<div class="card">
    <div id="BasicDetails">
        <div class="card-body">
            <form method="POST" class="form-group" onsubmit="return registerStudent()">
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        		<div class="row">
        			<div class="col-xs-12 col-sm-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="formControl">
                                    <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> -->
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" required autofocus>
                                    <span id="error-name" class="invalid-feedback" role="alert"></span>
                                    <div class="input-icon"><i class="fa fa-user"></i></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->
                                <div class="formControl">
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                    <span id="error-email" class="invalid-feedback" role="alert"></span>
                                    <div class="input-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                                </span> @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label> -->
                            <div class="col-xs-12 col-sm-12">
                                <div class="formControl">
                                    <input id="phone" type="text" name="phone" value="{{$phone}}" required readonly />
                                    <span id="error-phone" class="invalid-feedback" role="alert"></span>
                                    <div class="input-icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="formControl">
                                    <!-- <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label> -->
                                    <input id="address" type="text" value="{{ old('address') }}" placeholder="Address" required autofocus>
                                    <span id="error-address" class="invalid-feedback" role="alert"></span>
                                    <div class="input-icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="formControl">
                                    <!-- <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('Postal Code') }}</label> -->
                                    <input id="postal_code" type="text" name="postal_code" value="{{ old('postal_code') }}" placeholder="Postal Code" required autofocus>
                                    <span id="error-postal_code" class="invalid-feedback" role="alert"></span>
                                    <div class="input-icon"><i class="fa fa-map-pin" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                                <div class="formControl">
                                    <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> -->
                                    <input id="father_name" type="text" name="father_name" value="{{ old('father_name') }}" placeholder="Father Name" required autofocus>
                                    <span id="error-father_name" class="invalid-feedback" role="alert"></span>
                                    <div class="input-icon"><i class="fa fa-user"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="formControl">
                                    <select id="pid" autocomplete="off" name="pid" required>
                                        <option value="">--Select Course--</option>
                                        @foreach($products as $product)
                                        <option data-min_fee_allowed="{{$product->min_fee_allowed}}" data-max_fee_allowed="{{$product->max_fee_allowed}}" data-min_fee_books_services="{{$product->min_fee_books_services}}" value="{{$product->pid}}">{{$product->product_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="image" id="image">
                    <div class="col-xs-12 col-sm-6 uploadPhoto">
            			<div class="defaultImg">
            				<img id="snap">
            				<i class="fa fa-user"></i>
                                    	<a href="javascript:void(0);" id="start-camera" class="visible" onclick="StartCamera()">Capture Student Photo</a>
            				<video id="camera-stream" class="cameraView" style="display:none;"></video>
            				<canvas></canvas>
            				<div class="controls" id="controlsWrap" style="display:none;">
                          		<a href="#" id="delete-photo" title="Delete Photo" class="disabled"><i class="fa fa-trash"></i></a>
                          		<a href="#" id="take-photo" title="Take Photo"><i class="fa fa-camera"></i></a>
                          		<a href="#" id="download-photo" download="selfie.png" title="Save Photo" class="disabled"><i class="fa fa-save"></i></a>
                        	</div>
            			</div>
                        <p id="error-message" class="errorMsg"></p>
                        <div id="error-image" class="invalid-feedback" align="center" role="alert"></div>
                    </div>


                      <div class="col-xs-12 col-sm-12">
                            <label class="radio-inline"><input type="radio" name="category" checked value="gen"> Gen </label>
                            <label class="radio-inline"><input type="radio" name="category" value="sc"> SC </label>
                            <label class="radio-inline"><input type="radio" name="category" value="st"> ST </label>
                            <label class="radio-inline"><input type="radio" name="category" value="obc"> OBC </label>
                        </div>                       
                        <div class="col-xs-12 col-sm-12">
                            <input type="checkbox" class="regchk checkbox" id="is_muslim" name="is_muslim" value="1"> IsMuslim
                        </div>
                    <div class="col-xs-12 col-sm-12">
                        <hr>
                        <div>
                            {{ __('Referred Phone Numbers') }}
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="formControl noIcon">
                                    <input type="text" name="referred_phone[]" placeholder="Phone 1">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="formControl noIcon">
                                    <input type="text" name="referred_phone[]" placeholder="Phone 2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="formControl noIcon">
                                    <input type="text" name="referred_phone[]" placeholder="Phone 3">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="formControl noIcon">
                                    <input type="text" name="referred_phone[]" placeholder="Phone 4">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="formControl noIcon">
                                    <input type="text" name="referred_phone[]" placeholder="Phone 5">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="formControl noIcon">
                                    <input type="text" name="referred_phone[]" placeholder="Phone 6">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <button type="submit" id="enrol" name="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

 <!-- Modal -->
<div class="modal fade" id="phone-otp" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-sm">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        	<div class="form-group otp-conatiner">
			<form  method="post" enctype="multipart/form-data" onsubmit="verifyOtp();return false;">
				<div class="otp-icon">
					<i class="fa fa-phone"></i>
				</div>
                		<label>Enter OTP:</label>
                		<input type="text" name="otp" id="otp" required placeholder="1234" class="otpInput" maxlength="4">
                		<div id="error-otp" style="color:red;"></div>
				<div class="otp-action">
					<button type="button" id="sendotp" type="submit" class="btn btn-primary">Verify OTP</button>
					<div>
						<a href="javascript:void(0);" id="resent-otp" class="btn btn-link">Resend OTP</a>
					</div>
				</div>
            		</form>
                </div>
      	</div> 
     </div> 
    </div>
</div>

<script type="text/javascript">
   $('#phone-otp').modal('show');

    var is_otp_verified = false;
    var student = null;
    
    function registerStudent() {
        $('.loading').show();
        var new_registration_url = "{{ url('register-student') }}";
        var id = $('#id').val();
        var user_id = "{{auth()->user()->id}}";
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var postal_code = $('#postal_code').val();
        var father_name = $('#father_name').val();
        var image = $('#image').val();
        var pid = $('#pid option:selected').val();
        var category = $('input[type="radio"][name="category"]:checked').val();
        var is_muslim = $('input[name=is_muslim]:checked').val();
        if (is_muslim == undefined) {is_muslim=0;}
        var referred_phone = $("input[name='referred_phone[]']").map(function(){return $(this).val();}).get();

        var _data = {_token:"{{csrf_token()}}", id:id, user_id:user_id, name:name, email:email, phone:phone, address:address, postal_code:postal_code,pid:pid, father_name:father_name,image:image,referred_phone:referred_phone,category:category,is_muslim:is_muslim};
        console.log(_data);
        $.ajax({
            type: 'POST',
            url: new_registration_url,
            data: _data,
            async : true,
            success: function(res) {
                // console.log(res['errors'], res['student']);
                if (res['errors'] != undefined) {
                    $.each( res['errors'], function( key, value ) {
                        $('#error-'+key).html(value);
                        $('.loading').hide();
                    });
                } else if (res['student'] != undefined){
                    console.log(res);
                    student = res['student'];
                    location.href = '/student-details/' + student['id'];
                } else {
                    console.log(res);
                    $('.loading').hide();
                    alert('Some error has Occured? Please refresh and try again.');
                }
            },

            error: function(error) {
                console.log(error);
            }
        });
        return false;
    }

    function verifyOtp() {
        var phone = $('#phone').val();
        var otp = $('#otp').val();
        $.ajax({
            type: 'POST',
            url: "/verify-otp",
            data: { _token: "{{csrf_token()}}", phone:phone, otp:otp },
            async : true,
            success: function(res) {
                console.log(res);
                if (res) {
                    $( "#enrol" ).prop( "disabled", false );
                    $('#phone-otp').modal('hide');
                } else {
                    $('#error-otp').html('Invalid OTP');
                }
            },

            error: function(error) {
                console.log(error);
            }
        });
    }
  

    $('#snap').on('load', function () {
        var image_src = $('#snap').attr('src');
        $('#image').val(image_src);
        // console.log(image_src);
    });

    $('#resent-otp').on('click', function(){
        var phone = $('#registered-phone-number').val();
        $.ajax({
            type: 'POST',
            url: "/resend-otp",
            data: { _token: "{{csrf_token()}}", phone:phone},
            async : true,
            success: function(res) {
                console.log(res);
                if (res['success']) {
                    $('#error-otp').html(res['success']);
                } else {
                    $('#error-otp').html('Error Sending OTP. Please Refresh and Try again.');
                }
            },

            error: function(error) {
                console.log(error);
            }
        });
    });
</script>