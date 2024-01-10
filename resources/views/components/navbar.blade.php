<!-- Navbar -->
<header class="navbar navbar-expand-md d-print-none" >
    <div class="container-xl">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
        <a href="{{ route('main') }}">
          <img src="/static/logo-no-background.png" style="width: 200px; height: auto;" alt="Qoribobo" class="navbar-brand-image">
        </a>
      </h1>
      <div class="navbar-nav flex-row order-md-last">
        @role('Superadmin')
        <div class="d-none d-md-flex">
          <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
            <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
          </a>
          <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
            <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
          </a>

          @php
            $audits = DB::table('audits')->where('status', 0, )->take(5)->get();
            $c = DB::table('audits')->where('status', 0)->count();
          @endphp

          <div class="nav-item dropdown me-3 ">
            <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
              <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
              </svg>
              <span class="badge bg-red">{{ $c }}</span>
            </a>
            
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">So'ngi o'zgarishlar</h3>
                </div>
                <div class="list-group list-group-flush list-group-hoverable">
                  <div class="list-group-item">
                    @foreach ($audits as $audit)
                      <div class="row align-items-center">
                        <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                        <div class="col text-truncate  border-bottom mt-3 mb-3">
                            <a href="{{ route('audits.show', $audit->id) }}" class="text-body d-block">
                              <h3 class="fw-normal mb-0 d-inline">Qarzdorlik {{ $audit->event_type }}</h3>
                              <small>{{ $audit->date }}</small>
                            </a>   
                        </div>
                      </div>
                    @endforeach
                    <div class="col border-top mt-3">
                      <a href="{{ route('audits.index') }}" class="d-block mt-2 py-2">Ko'proq ko'rsatish</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        @endrole
        <div class="nav-item dropdown">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <span class="avatar" style="background-image: url(/static/avatars/user.jpg)"></span>
            <div class="d-none d-xl-block ps-2">
              <div>{{ auth()->user()->name }}</div>
              <div class="mt-1 small text-muted"></div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a href="/profile" class="dropdown-item">Profile</a>
            @role('Superadmin')
              <a href="{{ route('audits.index') }}" class="dropdown-item"  tabindex="-1" aria-label="Show notifications">
                Xabarlar
                <span class="badge bg-red mx-3">3</span>
              </a>
            @endrole
            <div class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <button class="dropdown-item">Chiqish</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>
  <header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar">
        <div class="container-xl">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('main') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" fill="currentColor" class="bi bi-house-door" viewBox="4 0 15 15">
                  <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
                </svg>
                <span class="nav-link-title">
                  Bosh sahifa
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('credits.index') }}" >
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="3 0 14 14">
                  <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                  <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z"/>
                </svg>
                <span class="nav-link-title">
                  Qarzlar
                </span>
              </a>
            </li>
            @role('Superadmin')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admins.index') }}" >
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" fill="currentColor" class="bi bi-person" viewBox="3 0 14 14">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
                </svg>
                <span class="nav-link-title">
                  Adminlar
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('products.index') }}" >
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="16" fill="currentColor" class="bi bi-cart" viewBox="3 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg>
                <span class="nav-link-title">
                  Tovarlar
                </span>
              </a>
            </li>
            @endrole
          </ul>
          <form method="GET" action="{{ route('get_search') }}" class="search-form basic-flex">
            <input type="search" name="key" class="search-input border rounded-4" style="height: 35px; width: 200px; padding:10px;" placeholder="Qidirish">
            <button type="submit" class="btn btn-primary">Izlash</button>
          </form>
        </div>
      </div>
    </div>
  </header>