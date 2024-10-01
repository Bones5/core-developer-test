@extends('layouts.app')

@section('content')
<h1 class="text-3xl text-center p-10">Events</h1>
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
  @endwhile
@endsection
