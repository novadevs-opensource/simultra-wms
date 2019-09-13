<?php

if (! function_exists('isActiveRoute'))
{
    function isActiveRoute($route, $output = 'active')
    {
        $routeArray = explode('.', $route);
        $curRouteArray = explode('.', Route::currentRouteName());
        
        if ($curRouteArray[0] == $routeArray[0]) {
            return $output;
        }
    }
}

if (! function_exists('isActiveRouteChild'))
{
    function isActiveRouteChild($route, $output = 'active')
    {
        if (Route::currentRouteName() == $route) {
            return $output;
        }
    }
}

if (! function_exists('download')) 
{
    function download( $filename = '' ) { 

    // $filename = explode('/', $filename);

    // Check if file exists in storage directory
    $file_path = storage_path() . '/app/' . $filename; 

    if ( file_exists( $file_path ) ) { 
        // Send Download 
        return \Response::download( $file_path );
    
        } else { 
        // Error exit( 'Requested file does not exist on our server!' ); 
        }
    }
}

if (! function_exists('locales')) 
{
    function locales()
    {
        $dir = resource_path('lang');
        $files = array_diff( scandir($dir), array('..', '.') );

        $langs = array();

        foreach ($files as $i) {
            $filename = explode('.', $i);
            if ( isset($filename[1]) ) {
                if ( $filename[1] == 'json' ) {
                    array_push($langs, $filename[0]);
                }
            }
        }

        return $langs;
    }
}

if (! function_exists('isActiveLocale') ) 
{
    function isActiveLocale($locale, $request)
    {
        if ($locale == session()->get('locale') || $locale == $request->cookie('locale')) {
            return "primary";
        } else {
            return "default";
        }

    }
}

if (! function_exists('unreadEmails') ) {
   function unreadEmails()
   {
        $o = Novadevs\Simultra\Base\Models\Mail::where('is_read', '=', 0)
                                               ->where('to', '=', Auth::user()->email)
                                               ->get();
        if ( count($o) == 0) {
            return false;
        } else {
            return count($o);
        }
   }
}

if (! function_exists('saveReport') ) {
    /**
     * Undocumented function
     * 
     * @uses Report::_record $t->_record()
     * 
     * @param string $s
     * @param boolean $mode
     * 
     * @return void
     */
    function saveReport($action = null, $points = null, $desc = null, $mode = null, $numberOfRecords = null)
    {   
        $t = new Novadevs\Simultra\Base\Models\Report();
        $t->_record($action, $points, $desc, $mode, $numberOfRecords);
    }
}

if (! function_exists('checkMode') ) {
    function  checkMode($request)
    {
        if ( $request->cookie('mode') ) {
            if ( $request->cookie('mode') == 2) {
                // Quest mode
                return true;
            } elseif ( $request->cookie('mode') == 1) {
                // Demo mode
                return false;
            }
        } else {
            return false;
        }
    }
}


if (! function_exists('checkRole') ) {
    function  checkRole($userRole, $role)
    {
        if ( $userRole != $role) {
            // return redirect('home');
           return false;
        } else {
            return true;
        }
    }
}