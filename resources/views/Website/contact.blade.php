@extends('Website.layouts.master')

@php
    $title = "Contact Us";
    
    $info =webinfo();

@endphp
@section('title' , $title)
@section('content')
    @include('Website.layouts.includes.bradcamp')
  <section class="contact-section section_padding">
    <div class="container">

      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="{{route('website.contact-us.store')}}" method="post" >
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder = 'Enter Message'>{{old('message')}}</textarea>
                    @if($errors->has('message'))
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                    @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                <input class="form-control"  {{old('name')}}  name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder = 'Enter your name'>
                @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    
                       
                  <input class="form-control"  {{old('email')}}  name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
                  @if($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject"   {{old('subject')}} id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder = 'Enter Subject'>
                  @if($errors->has('subject'))
                  <span class="text-danger">{{ $errors->first('subject') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm btn_4 boxed-btn">Send Message</button>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>{{ $info ? $info->address : 'N/A' }}</h3>
              <p>{{ $info ? $info->city : 'N/A' }}</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>{{ $info ? $info->phone : 'N/A' }}</h3>
              {{-- <p>Mon to Fri 9am to 6pm</p> --}}
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>{{ $info ? $info->email : 'N/A' }}</h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
