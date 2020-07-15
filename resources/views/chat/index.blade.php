@extends('layouts.app')

@section('title', 'Çat - '.env('APP_NAME'))

@section('content')
    <section class="contact-section section_padding">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h2 class="contact-title text-center">
                @if (auth()->user()->role=='d')
                  İstifadəçilərlə əlaqə saxlayın
                @else
                  Həkimlərlə əlaqə saxlayın
                @endif
              </h2>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body p-0">
                        <app-chat :user="{{auth()->user()}}"></app-chat>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </section>
@endsection 