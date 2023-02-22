<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item menu-open">
      <a href="#" class="nav-link active">
        <i class="fa-brands fa-product-hunt"></i>
        <p>
          Product
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('list_product') }}" class="nav-link ">
            <i class="fa-brands fa-product-hunt"></i>
            <p class="ml-2"> Product</p>
          </a>
        </li>
        @if (Auth::check() && Auth::user()->is_admin)
            
        <li class="nav-item">
          <a href="{{ route('create_product') }}" class="nav-link ">
            <i class="fa-solid fa-address-book "></i>
            <p class="ml-2">Create Product</p>
          </a>
        </li>
       
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa-solid fa-pen-to-square"></i>
            <p class="ml-2">Update Product</p>
          </a>
        </li>
       
        
        @else 
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active bg-primary">
            <i class="fa-solid fa-cart-plus"></i>
            <p>
              Cart
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('show_cart') }}" class="nav-link ">
                <i class="fa-solid fa-cart-plus"></i>
                <p>Cart</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
      </ul>
    </li>  
   
        
   
    

    <li class="nav-item menu-open">
      <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-money-bill"></i>
        <p>
          Order
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('list_order') }}" class="nav-link ">
            <i class="nav-icon fas fa-money-bill"></i>
            <p>Order</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>

