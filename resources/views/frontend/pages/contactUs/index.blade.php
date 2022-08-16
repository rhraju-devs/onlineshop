@extends('frontend.master')

@section('frontend_content')

    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Contact</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('frontend.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Message Now Area -->
    <div class="message_now_area section_padding_100" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="popular_section_heading mb-50 text-center">
                        <h5 class="mb-3">Stay Conneted with us</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="single-contact-info mb-30">
                        @foreach($settings as $setting)
                        <i class="icofont-phone"></i>
                        <p>{{$setting->phone}}</p>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-contact-info mb-30">
                        @foreach($settings as $setting)
                        <i class="icofont-ui-email"></i>
                        <p>{{$setting->email}}</p>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="single-contact-info mb-30">
                        @foreach($settings as $setting)
                        <i class="icofont-fax"></i>
                            <p>{{$setting->tel_number}}</p>
                        @endforeach
                    </div>
                </div>

                <div class="col-12">

                </div>

                <div class="col-12">
                    <div class="contact_from mb-50">
                        <form action="{{route('send.email')}}" method="post">
                            @csrf
                            <div class="contact_input_area">
                                <div id="success_fail_info"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" value="{{ old('name') }}">
                                            @error ('name') <span class ="text-danger">{{message}}</span> @enderror   
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="subject" class="form-control" name="subject" id="subject" placeholder="Subject" required value="{{ old('subject') }}">
                                            @error ('subject') <span class ="text-danger">{{message}}</span> @enderror   
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required value="{{ old('email') }}">
                                            @error ('email') <span class ="text-danger">{{message}}</span> @enderror   
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="custom-select form-control w-100" name="issue">
                                                <option selected>Issues</option>
                                                <option value="deliveryInfo">Delivery Info</option>
                                                <option value="paymentProcess">Payment Process</option>
                                                <option value="qualityIssues">Quality Issues</option>
                                                <option value="others">Other's</option>
                                            </select>
                                            @error ('issue') <span class ="text-danger">{{message}}</span> @enderror   
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Your Message *" required value="{{ old('message') }}"></textarea>
                                            @error ('message') <span class ="text-danger">{{message}}</span> @enderror   
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary w-100">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center my-5">
                        <p>Sending SMS through Vonage Package</p>
                        <a href="" class="btn b btn-primary w-1000 my-5">
                            Send SMS
                        </a>
                    </div>
                </div>

                <div class="col-12">
                    <div class="google-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.4733933767!2d-0.24167960602552738!3d51.52855824355498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2sbd!4v1565062036569!5m2!1sen!2sbd" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Message Now Area -->

@endsection