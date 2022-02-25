<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
  <a class="my-0 mr-md-auto font-weight-bold btn btn-outline-primary" href="/">PhotoApp</a>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark {{ Request::is('/') ? 'font-weight-bold' : '' }}" href="/">Home</a>
    <a class="p-2 text-dark {{ Request::is('albums/create') ? 'font-weight-bold' : '' }}" href="/albums/create">Create Album</a>
  </nav>
</div>