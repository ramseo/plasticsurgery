<?php

namespace Modules\Cms\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('admin_sidebar', function ($menu) {

            // Cms Dropdown
            $cms_menu = $menu->add('<i class="c-sidebar-nav-icon fab fa-grav"></i> Cms', [
                'class' => 'c-sidebar-nav-dropdown',
            ])
            ->data([
                'order'         => 71,  
                'activematches' => [
                    'admin/pages*',
                ],
                'permission' => ['view_pages'],
            ]);
            $cms_menu->link->attr([
                'class' => 'c-sidebar-nav-dropdown-toggle',
                'href'  => '#',
            ]);

            // Submenu: Pages
            $cms_menu->add('<i class="c-sidebar-nav-icon fas fa-file-alt"></i> Pages', [
                'route' => 'backend.pages.index',
                'class' => 'c-sidebar-nav-item',
            ])
            ->data([
                'order'         => 72,
                'activematches' => 'admin/pages*',
                'permission'    => ['edit_pages'],
            ])
            ->link->attr([
                'class' => 'c-sidebar-nav-link',
            ]);

        })->sortBy('order');

        return $next($request);
    }
}
