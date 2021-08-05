@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <div class="card">
                    <div class="card-body">

                    <!-- @if ($post->image)
                        <img src="{{ $post->get_image }}" class="card-img-top">

                    @elseif ($post->iframe)
                    <div class="embed-responsive embed-responsive-16by9">
                    {!!$post->iframe!!}
                    </div>
                    
                    @endif -->


                    <!-- Reto imagen y video -->
                    @if ($post->image && $post->iframe )
                        <img src=" {{ $post->get_image }} " class="card-img-top" alt="imagenes">
                        <div class="embed-responsive embed-responsive-16by9">
                            {!! $post->iframe !!}
                        </div>
                    @elseif ($post->image)
                        <img src=" {{ $post->get_image }} " class="card-img-top" alt="imagenes">
                    @elseif ($post->image)
                        <div class="embed-responsive embed-responsive-16by9">
                            {!! $post->iframe !!}
                        </div>
                    @endif
                    <!-- Fin reto -->




                      <h5 class="card-title">{{$post->title}}</h5>
                      <p class="card-text">
                      {{$post->body}}
                      </p>

                     
                    <p class="text-muted mb-0">
                        <em >
                            &ndash; {{$post->user->name}}
                        </em>

                        {{$post->created_at->format("d M Y")}}
                    </p>
                    </div>
                </div>
            
            
        </div>
    </div>
</div>
@endsection