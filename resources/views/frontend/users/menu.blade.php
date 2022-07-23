<style type="text/css">
    .left-icon{
            height: 30px;
    background-position: left;
    background-repeat: no-repeat;
    background-size: 28px;
    padding-left: 40px;
    padding-top: 5px;
    }

    .menu-menu-col a{
        /*padding: 15px !important;*/
        /*margin-left: 30px !important;*/
        /*font-size: 15px;*/

    }


#mainFeatures a:hover  , #mainFeatures a:active{
    filter: invert(27%) sepia(51%) saturate(2878%) hue-rotate(346deg) brightness(104%) contrast(97%);
      background-color: transparent;
        color: #eb0a3e;
}
#mainFeatures {
    padding: 0px !important;
}
#mainFeatures li {
    list-style: none;
}

#mainFeatures li a i{
    padding: 5px 0 10px 35px;
}

.menu-counter{
    padding: 5px 12px ; 
    border-radius: 20px; 
    border: 1px solid #555;
}

</style>
<div class="menu-menu-col">
    @php $types = getDataArray('types'); @endphp

        <style type="text/css">
            @if($types)
                @foreach($types as $type)
               
                        .icon-{{$type->slug}}{ 
                             background: url("{{asset('storage/type/icon/'.$type->icon)}}") no-repeat ;
                             background-size:30px 30px;
                             
                            }
                  
                @endforeach
            @endif
        </style>

        <ul class="list-unstyled" >
            <li><a href="{{ route('frontend.users.profileEdit') }}"  class="{{ Request::segment(2) == 'edit' ? 'active' : '' }}"><i class="fa fa-user"></i> My Profile</a></li>
            <!-- <li><a href="{{ route('frontend.users.quotations', auth()->user()->id) }}"><i class="far fa-file-alt"></i> Quotations</a></li> -->
            <li  data-toggle="collapse" data-target="#service" class="{{ Request::segment(1) == 'vendors' ? 'collapsed' : '' }} ">
              <a class="{{ Request::segment(1) == 'vendors' ? 'active' : '' }}" href="{{ route('frontend.vendors.slug')}}"><i class="fa fa-globe fa-lg"></i> My Vendors <span class="arrow"></span></a>
                <ul id="mainFeatures"  class="sub-menu collapse {{ Request::segment(1) == 'vendors' ? 'show' : '' }}  ">
                    @foreach($types as $type)
                        <li>
                            <a href="{{ route('frontend.vendors.slug', ['slug'=> $type->slug ])}}"  class="{{ Request::segment(2) == $type->slug ? 'active' : '' }}">
                                <i  id="menu_{{$type->slug}}" class="left-icon- icon-{{$type->slug}}">
                                    {{$type->name}} 
                                    @if(getTotalVendorUserMenu($type->id))
                                        <span class="badge badge-secondary">{{getTotalVendorUserMenu($type->id)}}</span>
                                    @endif
                                </i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>  
            <li><a href="{{ route('frontend.users.changePassword') }}"  class="{{ Request::segment(2) == 'changePassword' ? 'active' : '' }}" ><i class="fa fa-key"></i> Change Password</a></li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('account-logout-form').submit();">
                    Logout
                </a>
            </li>
            <form id="account-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
</div>
