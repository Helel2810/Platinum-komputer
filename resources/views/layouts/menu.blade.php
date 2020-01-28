<li class="treeview {{Request::is('products*', 'categories*', 'subCategories*', 'brands*') ? 'active menu-open' : ''}}">
  <a href="#"><i class="fa fa-link"></i> <span>Catalouges</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('products*') ? 'active' : '' }}">
        <a href="{!! route('products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
    </li>
    <li class="{{ Request::is('categories*') ? 'active' : '' }}">
        <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
    </li>
    <li class="{{ Request::is('subCategories*') ? 'active' : '' }}">
        <a href="{!! route('subCategories.index') !!}"><i class="fa fa-edit"></i><span>Sub Categories</span></a>
    </li>
    <li class="{{ Request::is('brands*') ? 'active' : '' }}">
        <a href="{!! route('brands.index') !!}"><i class="fa fa-edit"></i><span>Brands</span></a>
    </li>
  </ul>
</li>
<li class="treeview {{Request::is('admins*', 'customers*') ? 'active menu-open' : ''}}">
  <a href="#"><i class="fa fa-link"></i> <span>Users</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('admins*') ? 'active' : '' }}">
        <a href="{!! route('admins.index') !!}"><i class="fa fa-edit"></i><span>Admin</span></a>
    </li>
    <li class="{{ Request::is('customers*') ? 'active' : '' }}">
        <a href="{!! route('customers.index') !!}"><i class="fa fa-edit"></i><span>Customer</span></a>
    </li>
  </ul>
</li>
<li class="treeview {{Request::is('suppliers*', 'purchaseInvoices*') ? 'active menu-open' : ''}}">
  <a href="#"><i class="fa fa-link"></i> <span>Warehouse</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('suppliers*') ? 'active' : '' }}">
        <a href="{!! route('suppliers.index') !!}"><i class="fa fa-edit"></i><span>Supplier</span></a>
    </li>
    <li class="{{ Request::is('purchaseInvoices*') ? 'active' : '' }}">
        <a href="{!! route('purchaseInvoices.index') !!}"><i class="fa fa-edit"></i><span>Purchase</span></a>
    </li>

  </ul>
</li>
<li class="treeview {{Request::is('newsCategories*', 'news*') ? 'active menu-open' : ''}}">
  <a href="#"><i class="fa fa-link"></i> <span>News</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
  <ul class="treeview-menu">
    <li class="{{ Request::is('newsCategories*') ? 'active' : '' }}">
        <a href="{!! route('newsCategories.index') !!}"><i class="fa fa-edit"></i><span>News Categories</span></a>
    </li>
    <li class="{{ Request::is('news*') ? 'active' : '' }}">
        <a href="{!! route('news.index') !!}"><i class="fa fa-edit"></i><span>News</span></a>
    </li>

  </ul>
</li>
<li class="{{ Request::is('couriers*') ? 'active' : '' }}">
    <a href="{!! route('couriers.index') !!}"><i class="fa fa-edit"></i><span>Couriers</span></a>
</li>
<li class="{{ Request::is('addresses*') ? 'active' : '' }}">
    <a href="{!! route('addresses.index') !!}"><i class="fa fa-edit"></i><span>Addresses</span></a>
</li>
<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Orders</span></a>
</li>

<li class="{{ Request::is('promotions*') ? 'active' : '' }}">
    <a href="{!! route('promotions.index') !!}"><i class="fa fa-edit"></i><span>Promotions</span></a>
</li>

<li class="{{ Request::is('shipmentMethods*') ? 'active' : '' }}">
    <a href="{!! route('shipmentMethods.index') !!}"><i class="fa fa-edit"></i><span>Shipment Methods</span></a>
</li>

<li class="{{ Request::is('shippingCosts*') ? 'active' : '' }}">
    <a href="{!! route('shippingCosts.index') !!}"><i class="fa fa-edit"></i><span>Shipping Costs</span></a>
</li>

<li class="{{ Request::is('deliveryOrders*') ? 'active' : '' }}">
    <a href="{!! route('deliveryOrders.index') !!}"><i class="fa fa-edit"></i><span>Delivery Orders</span></a>
</li>

<li class="{{ Request::is('coupons*') ? 'active' : '' }}">
    <a href="{!! route('coupons.index') !!}"><i class="fa fa-edit"></i><span>Coupons</span></a>
</li>
<li class="{{ Request::is('sliders*') ? 'active' : '' }}">
    <a href="{!! route('sliders.index') !!}"><i class="fa fa-edit"></i><span>Sliders</span></a>
</li>
<li class="{{ Request::is('payments*') ? 'active' : '' }}">
    <a href="{!! route('payments.index') !!}"><i class="fa fa-edit"></i><span>Payments</span></a>
</li>

<li class="{{ Request::is('productComments*') ? 'active' : '' }}">
    <a href="{{ route('productComments.index') }}"><i class="fa fa-edit"></i><span>Product Comments</span></a>
</li>

