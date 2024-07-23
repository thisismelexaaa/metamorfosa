protected $routeMiddleware = [
// Other middleware...
'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
// Existing 'guest' middleware can be replaced if needed, or alias it differently
];
