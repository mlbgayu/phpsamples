<nav class="navbar navbar-expand-sm bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/dashboard">
         <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /> 
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashboard">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
            <a class="dropdown-item" href="/profile">{{ __('Profile') }}</a>
        </li>
       </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>