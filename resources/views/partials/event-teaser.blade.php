<li
  class="list-item transform transition duration-1000 opacity-0 translate-y-8"
>
  <article>
    <a href="@php(the_permalink())">
      <img
        class="w-full object-contain transform transition duration-500 hover:scale-105 py-2"
        src="@php(the_post_thumbnail_url())"
      />
      <div class="py-2 text-s text-violet-700">
        {{ $date }}
      </div>
      <h2 class="py-2 text-xl font-serif">@php(the_title())</h2>
    </a>
  </article>
</li>
