      <div class="app-sidebar">
          <a href="{{ route('admin.index') }} "
              class="app-sidebar-link d-none
                {{ request()->routeIs('admin.index') ? 'active' : '' }}"
              title="Dashboard">

              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-home">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                  <polyline points="9 22 9 12 15 12 15 22" />
              </svg>
          </a>
          <a href="{{ route('admin.subscriptions') }}"
              class="app-sidebar-link  d-none {{ request()->routeIs('admin.subscriptions') ? 'active' : '' }}"
              title="Subscriptions">
              <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  class="feather feather-inbox" viewBox="0 0 24 24">
                  <defs />
                  <rect width="20" height="14" x="2" y="8" rx="2" ry="2" />
                  <path d="M20 8v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8" />
                  <line x1="8" x2="16" y1="4" y2="4" />
              </svg>
          </a>

          <a href="{{ route('admin.users') }}"
              class="app-sidebar-link d-none
            {{ request()->routeIs('admin.users') ? 'active' : '' }}"
              title="Users">
              <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  class="feather feather-users" viewBox="0 0 24 24">
                  <defs />
                  <path
                      d="M17 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM7 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 21c-4.418 0-8-1.791-8-4.5 0-1.5 2.5-2.5 8-2.5s8 1 8 2.5c0 2.709-3.582 4.5-8 4.5z" />
              </svg>
          </a>

          <!-- Add admin.commonQuestions route -->
          <a href="{{ route('admin.commonQuestions') }}"
              class="app-sidebar-link d-none
                {{ request()->routeIs('admin.commonQuestions') ? 'active' : '' }}"
              title="Common Questions">
              <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  class="feather feather-help-circle" viewBox="0 0 24 24">
                  <defs />
                  <circle cx="12" cy="12" r="10" />
                  <path
                      d="M9.09 9a3 3 0 014.83 0m-4.83 6a3 3 0 004.83 0m-4.83 6a3 3 0 014.83 0m-4.83-6a3 3 0 004.83 0" />
              </svg>
          </a>


          <a href="{{ route('admin.settings') }}"
              class="app-sidebar-link
            {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
              <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  class="feather feather-settings" viewBox="0 0 24 24">
                  <defs />
                  <circle cx="12" cy="12" r=" 3" />
                  <path
                      d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z" />
              </svg>
          </a>
      </div>
