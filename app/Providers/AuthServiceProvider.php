<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Vacante;
use App\Policies\VacantePolicy;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Vacante::class => VacantePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //registra las politicas
        $this->registerPolicies();

        //configuramos el asunto del email enviado
        VerifyEmail::toMailUsing(function($notifiable,$url){
            return (new MailMessage) -> subject('Verificar cuenta')
            ->line('tu cuenta ya esta casi lista , solo debes precionar el siguiente link')
            ->action('Confirmar cuenta',$url)
            ->line('si no create esta cuenta puedes ignorar este mensaje');
        });
    }
}
