<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />  --}}
    </head>
<body>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h3>{{ __('Profile')}}</h3></div>
            <div class="card-body">
                <form class="forms-sample" id="form" action="{{ route("profile.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="">{{ __('Name')}}</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                    </div>

                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        <label for="">{{ __('Mobile')}}</label>
                        <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Phone">
                        @if ($errors->has('mobile'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
                        <label for="">{{ __('Date of Birth')}}</label>
                        <input type="text" name="dob" class="form-control" id="dob">
                        @if ($errors->has('dob'))
                        {{--  <span class="help-block">
                            <strong>{{ $errors->first('dob') }}</strong>
                        </span>  --}}
                        <span id="lblError" style = "color:Red"></span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                        <label for="">{{ __('Username')}}</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                        @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="">{{ __('Email address')}}</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="">{{ __('Gender')}}</label>
                                <select class="form-control" name="gender" id="" required>
                                    <option>{{ __('Male')}}</option>
                                    <option>{{ __('Female')}}</option>
                                </select>
                                @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('id_type') ? 'has-error' : '' }}">
                                <label for="">{{ __('ID Type')}}</label required>
                                <select class="form-control" id="" name="id_type">
                                    <option>{{ __('PAN Card')}}</option>
                                    <option>{{ __('Aadhar Card')}}</option>
                                    <option>{{ __('Passport')}}</option>
                                    <option>{{ __('Voter Card')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('id_no') ? 'has-error' : '' }}">
                                <label for="">{{ __('ID Number')}}</label>
                                <input type="text" name="id_no" class="form-control" id="id_no" placeholder="ID Number">
                                @if($errors->has('id_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('id_no') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                        <label for="">{{ __('Category')}}</label>
                        <input type="text" name="category" class="form-control" id="" placeholder="Category">
                        @if ($errors->has('category'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span>
                        @endif
                    </div> --}}

                    <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                        <label for="categories">{{ trans('cruds.job.fields.categories') }}
                            <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                            <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                        <select name="categories[]" id="categories" class="form-control select2" multiple="multiple">
                            @foreach($categories as $id => $categories)
                                <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || isset($job) && $job->categories->contains($id)) ? 'selected' : '' }}>{{ $categories }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('categories'))
                            <em class="invalid-feedback">
                                {{ $errors->first('categories') }}
                            </em>
                        @endif              
                    </div>

                    <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                        <label for="">{{ __('Location')}}</label>
                        <input type="text" name="location" class="form-control" id="" placeholder="Location">
                        @if ($errors->has('location'))
                            <span class="help-block">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                        @endif
                    </div>

                    {{--  <div class="form-group">
                        <label for="exampleInputPassword4">{{ __('Password')}}</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                    </div>  --}}

                    <div class="form-group {{ $errors->has('url_twitter') ? 'has-error' : '' }}">
                        <label for="">{{ __('URL Twitter')}}</label>
                        <input type="text" name="url_twitter" class="form-control" id="url_twitter" placeholder="URL Twitter">
                        @if ($errors->has('url_twitter'))
                            <span class="help-block">
                                <strong>{{ $errors->first('url_twitter') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('url_facebook') ? 'has-error' : '' }}">
                        <label for="">{{ __('URL Facebook')}}</label>
                        <input type="text" name="url_facebook" class="form-control" id="url_facebook" placeholder="URL Facebook">
                        @if ($errors->has('url_facebook'))
                            <span class="help-block">
                                <strong>{{ $errors->first('url_facebook') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('url_linkedin') ? 'has-error' : '' }}">
                        <label for="">{{ __('URL LinkedIn')}}</label>
                        <input type="text" name="url_linkedin" class="form-control" id="url_linkedin" placeholder="URL LinkedIn">
                        @if ($errors->has('url_linkedin'))
                            <span class="help-block">
                                <strong>{{ $errors->first('url_linkedin') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('url_instagram') ? 'has-error' : '' }}">
                        <label for="">{{ __('URL Instagram')}}</label>
                        <input type="text" name="url_instagram" class="form-control" id="url_instagram" placeholder="URL Instagram">
                        @if ($errors->has('url_instagram'))
                            <span class="help-block">
                                <strong>{{ $errors->first('url_instagram') }}</strong>
                            </span>
                        @endif
                    </div>

                    {{-- <div class="form-group {{ $errors->has('profile_img') ? 'has-error' : '' }}">
                        <label>{{ __('Profile Pics')}}</label>
                         <div class="col-md-6 pakainfo">
                            <div id="live_camera"></div>
                            <hr/>
                            <input type="button" value="Take Snapshot" onClick="capture_web_snapshot()">
                            <input type="hidden" name="profile_img" class="image-tag">
                        </div> 
                        <input type="file" name="profile_img" id="profile_img" class="file-upload-default">
                        @if ($errors->has('profile_img'))
                            <span class="help-block">
                                <strong>{{ $errors->first('profile_img') }}</strong>
                            </span>
                        @endif
                    </div> --}}


                    <div class="form-group {{ $errors->has('profile_img') ? 'has-error' : '' }}">
                        <label>{{ __('Profile Image')}}</label>
                        <input type="file" name="profile_img" id="profile_img" class="file-upload-default">
                        @if ($errors->has('profile_img'))
                            <span class="help-block">
                                <strong>{{ $errors->first('profile_img') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="col-md-6">
                        <div id="preview"></div>
                    </div>

                    <div class="form-group {{ $errors->has('skills') ? 'has-error' : '' }}">
                        <label for="">{{ __('Skills')}}</label>
                        <input type="text" name="skills" class="form-control" id="skills" placeholder="Skills">
                        @if ($errors->has('skills'))
                            <span class="help-block">
                                <strong>{{ $errors->first('skills') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('exp_yrs') ? 'has-error' : '' }}">
                        <label for="">{{ __('Years of Experience')}}</label>
                        <input type="text" name="exp_yrs" class="form-control" id="exp_yrs" placeholder="Category">
                        @if ($errors->has('exp_yrs'))
                            <span class="help-block">
                                <strong>{{ $errors->first('exp_yrs') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('worked_loc') ? 'has-error' : '' }}">
                        <label for="">{{ __('Location worked')}}</label>
                        <textarea class="form-control" name="worked_loc" id="worked_loc" rows="4"></textarea>
                        @if ($errors->has('worked_loc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('worked_loc') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('course_name') ? 'has-error' : '' }}">
                        <label for="">{{ __('Course Name')}}</label>
                        <input type="text" class="form-control" name="course_name" id="" rows="4">
                        @if ($errors->has('course_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('course_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('course_cert_img') ? 'has-error' : '' }}">
                        <label>{{ __('Certificate Image')}}</label>
                        <input type="file" name="course_cert_img" id="course_cert_img" class="file-upload-default">
                        @if ($errors->has('course_cert_img'))
                            <span class="help-block">
                                <strong>{{ $errors->first('course_cert_img') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">
                        <label for="">{{ __('Qualification')}}</label>
                        <input type="text" class="form-control" name="qualification" id="qualification" rows="4">
                        @if ($errors->has('qualification'))
                            <span class="help-block">
                                <strong>{{ $errors->first('qualification') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!--Studio-->
                    <div class="form-group">
                        <span>Do you have Studio?</span>
                        <label for="chkYes">
                            <input type="radio" class="form-control" id="chkYesstudio" name="studio" />
                            Yes
                        </label>
                        <label for="chkNo">
                            <input type="radio" class="form-control" id="chkYesstudio" name="studio" />
                            No
                        </label>

                        <div id="dvstudio" style="display: none">
                            Studio Address:
                            <input type="text" class="form-control" name="studio_address" id="studio_address" />
                        </div>
                    </div>


                    <!--Camera-->
                    <div class="form-group">
                        <span>Do you have Camera?</span>
                        <label for="chkYescam">
                            <input type="radio" class="form-control" id="chkYescam" name="camera" />
                            Yes
                        </label>
                        <label for="chkNocam">
                            <input type="radio" class="form-control" id="chkNocam" name="camera" />
                            No
                        </label>

                        <div id="dvcamera" style="display: none">
                            Camera Description:
                            <input type="text" class="form-control" name="cam_desc" id="cam_desc" />
                        </div>
                    </div

                    <div class="form-group">
                        <span>Do you have Drone?</span>
                        <label for="chkYesdrone">
                            <input type="radio" class="form-control" id="chkYesdrone" name="drone" />
                            Yes
                        </label>
                        <label for="chkNodrone">
                            <input type="radio" class="form-control" id="chkNodrone" name="drone" />
                            No
                        </label>

                        <div id="dvdrone" style="display: none">
                            Tripod Description:
                            <input type="text" class="form-control" name="drone_desc" id="drone_desc" />
                        </div>
                    </div>

                    <div class="form-group">
                        <span>Do you have Lens?</span>
                        <label for="chkYeslens">
                            <input type="radio" class="form-control" id="chkYeslens" name="lens" />
                            Yes
                        </label>
                        <label for="chkNolens">
                            <input type="radio" class="form-control" id="chkNolens" name="lens" />
                            No
                        </label>

                        <div id="dvlens" style="display: none">
                            Gimbal Description:
                            <input type="text" class="form-control" name="lens_desc" id="lens_desc" />
                        </div>
                    </div>


                    <div class="form-group">
                        <span>Do you have Tripod?</span>
                        <label for="chkYestripod">
                            <input type="radio" class="form-control" id="chkYestripod" name="tripod" />
                            Yes
                        </label>
                        <label for="chkNotripod">
                            <input type="radio" class="form-control" id="chkNotripod" name="tripod" />
                            No
                        </label>

                        <div id="dvtripod" style="display: none">
                            Gimbal Description:
                            <input type="text" class="form-control" name="tripod_desc" id="tripod_desc" />
                        </div>
                    </div


                    <div class="form-group">
                        <span>Do you have Gimbal?</span>
                        <label for="chkYesgimbal">
                            <input type="radio" class="form-control" id="chkYesgimbal" name="gimbal" />
                            Yes
                        </label>
                        <label for="chkNogimbal">
                            <input type="radio" class="form-control" id="chkNogimbal" name="gimbal" />
                            No
                        </label>

                        <div id="dvgimbal" style="display: none">
                            Gimbal Description:
                            <input type="text" class="form-control" name="gimbal_desc" id="gimbal_desc" />
                        </div>
                    </div

                    <div class="form-group">
                        <span>Do you have Others?</span>
                        <label for="chkYesother">
                            <input type="radio" class="form-control" id="chkYesother" name="other" />
                            Yes
                        </label>
                        <label for="chkNoother">
                            <input type="radio" class="form-control" id="chkNoother" name="other" />
                            No
                        </label>

                        <div id="dvother" style="display: none">
                            Other Description:
                            <input type="text" class="form-control" name="other_desc" id="other_desc" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">{{ __('Submit')}}</button>
                    <button class="btn btn-light">{{ __('Cancel')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
<script type="text/javascript">
    $(function () {
        $("input[name='studio']").click(function () {
            if ($("#chkYesstudio").is(":checked")) {
                $("#dvstudio").show();
            } else {
                $("#dvstudio").hide();
            }
        });

        $("input[name='camera']").click(function () {
            if ($("#chkYescam").is(":checked")) {
                $("#dvcamera").show();
            } else {
                $("#dvcamera").hide();
            }
        });

        $("input[name='drone']").click(function () {
            if ($("#chkYesdrone").is(":checked")) {
                $("#dvdrone").show();
            } else {
                $("#dvdrone").hide();
            }
        });

        $("input[name='gimbal']").click(function () {
            if ($("#chkYesgimbal").is(":checked")) {
                $("#dvgimbal").show();
            } else {
                $("#dvgimbal").hide();
            }
        });

        $("input[name='lens']").click(function () {
            if ($("#chkYeslens").is(":checked")) {
                $("#dvlens").show();
            } else {
                $("#dvlens").hide();
            }
        });


        $("input[name='tripod']").click(function () {
            if ($("#chkYestripod").is(":checked")) {
                $("#dvtripod").show();
            } else {
                $("#dvtripod").hide();
            }
        });

        $("input[name='other']").click(function () {
            if ($("#chkYesother").is(":checked")) {
                $("#dvother").show();
            } else {
                $("#dvother").hide();
            }
        });

    });

</script>


<script>
    $(document).ready(function() {
        $("#form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    maxlength: 20,
                },
                username: {
                    required: true,
                    minlength: 2,
                    maxlength: 20,
                },
                mobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50,
                    uniqueEmail: true
                },
                id_type: {
                    required: true,
                },
                id_no: {
                    required: true,
                    number: true,
                    minlength: 6,
                    maxlength: 12,
                },
                gender: {
                    required: true
                },
                profile_img: {
                    required:true,
                    accept: "image/jpg,image/jpeg,image/png,image/gif",
                    filesize : 5,
                },
                exp_yrs: {
                    required: true,
                    minlength: 1,
                    maxlength: 2,
                    number: true,
                },
                worked_loc:{
                    minlength: 3,
                    maxlength: 255,
                },
                course_name: {
                    required: true,
                    maxlength: 255,
                },
                course_cert_img:{
                    required:true,
                    accept: "image/jpg,image/jpeg,image/png,image/gif",
                    filesize : 5,
                },
                qualification:{
                    required: true,
                },
                url_twitter:{
                    minlength: 5,
                    maxlength: 255
                },
                url_instagram:{
                    minlength: 5,
                    maxlength: 255
                },
                url_linkedin:{
                    minlength: 5,
                    maxlength: 255,
                },
                url_facebook:{
                    minlength: 5,
                    maxlength: 255,
                },
                studio_address: {
                    minlength: 5,
                    maxlength: 255,
                },
                skills:{
                    required: true,
                    maxlength:255,
                },
                worked_loc:{
                    required:true,
                    maxlength: 255
                },
                cam_desc: {
                    minlength: 2,
                    maxlength: 255
                },
                drone_desc: {
                    minlength: 2,
                    maxlength: 255
                },
                gimbal_desc: {
                    minlength: 2,
                    maxlength: 255
                },
                lens_desc: {
                    minlength: 2,
                    maxlength: 255
                },
                other_desc: {
                    minlength: 2,
                    maxlength: 255
                },
            },
            messages: {
                name: {
                    required:  "Name is required",
                    minlength: "Name should be more than 2 characters",
                    maxlength: "Name should be less than 20 characters",
                },
                username: {
                    required: "Username is required",
                    minlength: "Username cannot be less than 3 characters",
                    maxlength: "Username cannot be more than 20 characters",
                },
                mobile: {
                    required: "Phone number is required",
                    minlength: "Number should be more than 10",
                    maxlength: "Number should be less than 10",
                    number: "Please fill only number",
                },
                email: {
                    required: "e-Mail is required",
                    email: "e-Mail must be an email",
                    maxlength: "e-mail length should not exceed more than 20 characters",
                },
                id_no: {
                    required: "Id number is required",
                    number: "Only number is valid",
                    minlength: "id number should not be less than 6",
                    maxlength: "id number should not be less than 12",
                },
                gender: {
                    required: "Please enter gender"
                },
                profile_img: {
                    required:"Profile image is required",
                    accept: "Only image type in format jpg,jpeg,png allowed",
                    filesize : "Size should be less than 5MB",
                },
                exp_yrs: {
                    required: "Years of experience is required",
                    minlength: "Please enter valid years of experience",
                    maxlength: "Please enter valid years of experience",
                    number: "Only numbers are allowed"
                },
                worked_loc:{
                    minlength: "Please enter valid worked location",
                    maxlength: "Length should be less than 255",
                },
                course_name: {
                    //required: true,
                    minlength: "Course name should be of proper name",
                    maxlength: "Course name should not exceed more than 255",
                },
                cour_cert_img:{
                    //required:true,
                    accept: "Image should be of type jpg,jpeg,png",
                    filesize : "Size should be less than 5MB",
                },
                qualification:{
                    required: "Qualification is required",
                },
                url_twitter:{
                    minlength: "Enter proper Url length",
                },
                url_instagram:{
                    minlength: "Enter proper Url length",
                },
                url_linkedin:{
                    minlength: "Enter proper Url length",
                },
                url_facebook:{
                    minlength: "Enter proper Url length",
                },
                studio_address: {
                    minlength: "Length should be more than 2 character",
                    maxlength: "Length should be less than 255 character",
                },
                skills:{
                    minlength: "Length should be more than 2 character",
                    maxlength:"Length should be less than 255 character",
                },
                cam_desc: {
                    minlength: "Length should be more than 2 character",
                    maxlength: "Length should be less than 255 character",
                },
                drone_desc: {
                    minlength: "Length should be more than 2 character",
                    maxlength: "Length should be less than 255 character",
                },
                gimbal_desc: {
                    minlength: "Length should be more than 2 character",
                    maxlength: "Length should be less than 255 character",
                },
                lens_desc: {
                    minlength: "Length should be more than 2 character",
                    maxlength: "Length should be less than 255 character",
                },
                other_desc: {
                    minlength: "Length should be more than 2 character",
                    maxlength: "Length should be less than 255 character",
                },
            }
        });
    });
</script>

<style>
    label.error {
         color: #FF0000;
         font-size: 14px;
    }
</style>



{{-- webcamera
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#live_camera');

    function capture_web_snapshot() {
        Webcam.snap( function(site_url) {
            $(".image-tag").val(site_url);
            document.getElementById('preview').innerHTML = '<img src="'+site_url+'"/>';
        } );
    }
</script> --}}


{{-- 

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
    rel="Stylesheet" type="text/css" />

<script type="text/javascript">
    $(function () {
        $("#dob").datepicker({
            changeMonth: true,
            changeYear: true,
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: 'images/calendar.gif',
            dateFormat: 'dd/mm/yy',
            yearRange: '1900:+0',
            onSelect: function (dateString, txtDate) {
                ValidateDOB(dateString);
            }
        });
    }); 


    function ValidateDOB(dateString) {
        var lblError = $("#lblError");
        var parts = dateString.split("/");
        var dtDOB = new Date(parts[1] + "/" + parts[0] + "/" + parts[2]);
        var dtCurrent = new Date();
        lblError.html("Eligibility 18 years ONLY.")
        if (dtCurrent.getFullYear() - dtDOB.getFullYear() < 18) {
            return false;
        }

        if (dtCurrent.getFullYear() - dtDOB.getFullYear() == 18) {

            //CD: 11/06/2018 and DB: 15/07/2000. Will turned 18 on 15/07/2018.
            if (dtCurrent.getMonth() < dtDOB.getMonth()) {
                return false;
            }
            if (dtCurrent.getMonth() == dtDOB.getMonth()) {
                //CD: 11/06/2018 and DB: 15/06/2000. Will turned 18 on 15/06/2018.
                if (dtCurrent.getDate() < dtDOB.getDate()) {
                    return false;
                }
            }
        }
        lblError.html("");
        return true;
    }
</script> --}}
