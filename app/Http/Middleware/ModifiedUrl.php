<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ModifiedUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $route = $request->route();
        $params = $route->parameters();
        foreach ($params as $param => $value) {
            // dd($value);
            try {
                $decryptedValue = Crypt::decrypt($value);
                $route->setParameter($param, $decryptedValue);
            } catch (Exception $e) {
                Log::warning("Parameter $param does not appear to be encrypted or decryption failed: " . $e->getMessage());
                toast()->flash('error', 'Error saat mendapatkan data');
                return redirect('error/403');
            }
        }

        return $next($request);
    }
}
