  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
       <a href="{{route('admin.dashboard')}}" class="brand-link">
          <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Shell Mangement</span>
      </a> 
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="{{route('admin.dashboard')}}" class="d-block">{{ Auth::user()->name }}</a>
              </div>
          </div>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                    <li class="nav-item">
                      <a href="{{ route('admin.user.index')}}" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                            User
                          </p>
                      </a>
                  </li>
               
                  <li class="nav-item">
                      <a href="{{route('admin.product.index')}}" class="nav-link">
                          <i class="nav-icon fa fa-list"></i>
                          <p>
                              product
                          </p>
                      </a>
                  </li>
                     <li class="nav-item">
                      <a href="{{ route('admin.order.index')}}" class="nav-link">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                             Order
                          </p>
                      </a>
                  </li>
              
                  </li>
                     <li class="nav-item">
                      <a href="{{ route('admin.order-details.index')}}" class="nav-link">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                             OrderDetails
                          </p>
                      </a>
                  </li>
              
                  {{-- <li class="nav-item">
                      <a href="pages/kanban.html" class="nav-link">
                          <i class="nav-icon fas fa-columns"></i>
                          <p>
                             Payment
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="pages/kanban.html" class="nav-link">
                          <i class="nav-icon fas fa-columns"></i>
                          <p>
                             Delivery Details
                          </p>
                      </a>
                  </li> --}}


              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
