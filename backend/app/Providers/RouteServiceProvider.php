<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string
     */
    protected $web_namespace = 'App\\Http\\Controllers\\Web';

    /**
     * The Api controller namespace for the application.
     *
     * @var string
     */
    protected $api_namespace = 'App\\Http\\Controllers\\Api';

    /**
     * The v1.0 Api controller namespace for the application.
     *
     * @var string
     */
    protected $api_v1_0_namespace = 'App\\Http\\Controllers\\Api\\V1_0';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Api
            Route::prefix('api')->name('api.')->middleware('api')->namespace($this->api_namespace)->group(base_path('routes/api.php'));

            // v1.0 Api
            Route::prefix('api/v1.0')->name('api.v1.0.')->middleware('api')->namespace($this->api_v1_0_namespace.'\\Auth')->group(base_path('routes/v1_0/auth.php'));
            Route::prefix('api/v1.0')->name('api.v1.0.')->middleware('api')->namespace($this->api_v1_0_namespace.'\\Product')->group(base_path('routes/v1_0/product.php'));

            // Web
            Route::middleware('web')->namespace($this->web_namespace)->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
