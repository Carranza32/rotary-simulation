<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $file = lang_path( session()->get('locale', config('app.locale')) . ".json" );

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'flash' => function () use ($request) {
                return [
                    'message' => $request->session()->get('message'),
                    'data' => $request->session()->get('data'),
                ];
            },
            'locale' => session()->get('locale', config('app.locale')),
            'locales' => config( 'app.available_locales' ),
            'translations' => File::exists( $file ) ? json_decode( File::get( $file ), true ) : [],
        ]);
    }
}
