@extends('web.layouts.master')

@section('content')
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-headding">
                                <h3 class="title">Let's Talk About Your Idea</h3>
                                <div class="separate"></div>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('contact.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <input type="text" class="form-control" placeholder="Your name*" name="name" required>
                            </div>
                            <div class="form-group col-6">
                                <input type="text" class="form-control" placeholder="Your phone" name="phone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <input type="email" class="form-control" placeholder="Email*" name="email" required>
                            </div>
                            <div class="form-group col-6">
                                <input type="text" class="form-control" placeholder="Subject*" name="subject" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <input type="text" class="form-control message" placeholder="Your Message*" name="message" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-4 offset-1 contact-us">
                    <div class="row">
                        <div class="col-12">
                            <div class="contact-heading">
                                <h3 class="title">Get in Touch</h3>
                                <div class="separate"></div>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <i class="fa-solid fa-envelope-open"></i>
                                <span>Email:</span><br>
                                {{$setting->email_one}},{{$setting->email_two}}
                            </li>
                            <li>
                                <i class="fa-solid fa-phone-volume"></i>
                                <span>Call Us:</span><br>
                                {{$setting->phone_one}},{{$setting->phone_two}}
                            </li>
                            <li>
                                <i class="fa-regular fa-clock"></i>
                                <span>Office Time:</span><br>
                                {{$setting->office_hours}}
                            </li>
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                <span>Address:</span><br>
                                {{$setting->contact_address}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection