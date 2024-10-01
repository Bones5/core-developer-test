<li class="list-item transform transition duration-800" >
    <article>
    <a href=@php(the_permalink()) >

    <img class="w-full object-contain transform transition duration-500 hover:scale-105 py-2" src=@php(the_post_thumbnail_url())>
    <div class="py-2 text-s text-violet-700">
      <datetime date="2024-05-08">@php(the_field('start_date_and_time'))<datetime/> - @php(the_field('end_date_and_time'))</div>
    <h2 class="py-2 text-xl font-serif">@php(the_title())</h2>
    </a>
  </article>
  </li>
