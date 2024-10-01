@extends('layouts.app')

@section('content')
<h1 class="text-3xl text-center p-10">Events</h1>
<ol class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 p-4">

  @while(have_posts()) @php(the_post())
    @include('partials.event-teaser')
  @endwhile
</ol>
@endsection
