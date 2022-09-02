@extends('frontend.master')

@section('frontend_content')


    <!-- My Account Area -->
    <section class="my-account-area section_padding_100_50">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-12 col-md-12">
                @if(count($errors) > 0 )                        
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul class="p-0 m-0" style="list-style: none;">
                                    @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="my-account-content mb-50">
                        <h5 class="mb-3">Forget Password</h5>
                       

                        <form action="{{route('frontend.customer.email.check.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="currentPass">Email</label>
                                        <input type="email" class="form-control" id="currentPass" name="email">
                                        @error('email')
                                            <span class="alert alert-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Check Email</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- My Account Area -->
    @endsection