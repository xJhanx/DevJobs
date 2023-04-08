<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        
        $notificaciones = auth()->user()->unreadNotifications;

        //limpia las notificaciones
        auth()->user()->unreadNotifications->markAsRead();
        return view('notificaciones.index',compact('notificaciones'));
    }
}
