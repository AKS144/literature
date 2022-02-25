@if (Auth::user()->wishlist->count() )
@foreach ($wishlists as $wishlist)
{{$wishlist->product->title}}
@endforeach
@endif