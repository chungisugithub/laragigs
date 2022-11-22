<x-layout>

  @include('partials._hero')
  @include('partials._search')


  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    <div>
      @if (Session::has('message'))
        <p class="alert
{{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
      @endif
    </div>
    @unless(count($listings) == 0)
      @foreach ($listings as $listing)
        <x-listing-card :listing="$listing" />
      @endforeach
    @else
      <p>No listings found</p>
    @endunless
  </div>

</x-layout>
