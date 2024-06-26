<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request){

        
        $user = $request->user();
        
        // Obtener las notificaciones no leídas del usuario
        $notifications = $user->unreadNotifications;
        
        // Obtener el historial de notificaciones leídas del usuario paginadas
    
        // Marcar las notificaciones no leídas como leídas
        $user->unreadNotifications->markAsRead();
    
        return view('notifications', [
            'notifications' => $notifications,

        ]);

    }
    public function notificationUser(Request $request,User $user){

        
        $user = $request->user();
        
        // Obtener las notificaciones no leídas del usuario
        $notifications = $user->unreadNotifications;
        
        // Obtener el historial de notificaciones leídas del usuario paginadas
    
        // Marcar las notificaciones no leídas como leídas
        $user->unreadNotifications->markAsRead();
    
        return view('usernotifications', [
            'notifications' => $notifications,

        ]);

    }
}
