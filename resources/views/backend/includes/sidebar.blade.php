<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

    @php $role = auth()->user()->getRoleNames()->first(); @endphp
    @if($role)
    @if($role == 'super admin')
    <div class="c-sidebar-brand">
        <a href="<?= route("backend.dashboard") ?>">
            <img class="c-sidebar-brand-full" src="<?= asset('images/plastic-surgery-footer-logo.png') ?>" height="40" alt="{{ app_name() }}">
        </a>
    </div>
    {!! $admin_sidebar->asUl( ['class' => 'c-sidebar-nav'], ['class' => 'c-sidebar-nav-dropdown-items'] ) !!}
    @endif
    @if($role == 'vendor')
    <div class="c-sidebar-brand">
        <a href="<?= route("vendor.dashboard") ?>">
            <img class="c-sidebar-brand-full" src="<?= asset('images/plastic-surgery-footer-logo.png') ?>" height="40" alt="{{ app_name() }}">
        </a>
    </div>
    {!! $vedor_sidebar->asUl( ['class' => 'c-sidebar-nav'], ['class' => 'c-sidebar-nav-dropdown-items'] ) !!}
    @endif
    @endif

    <button id="unique-id" class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>