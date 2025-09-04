<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
           $response = $next($request);

        // ✅ 1) Content Security Policy (CSP)
        // Adjust sources to match your current assets (Google Fonts, Font Awesome, AOS, etc.)
        $csp = implode('; ', [
            "default-src 'self'",
            "base-uri 'self'",
            "form-action 'self'",
            "frame-ancestors 'self'",                 // modern anti-clickjacking via CSP
            "object-src 'none'",
            "connect-src 'self'",
            "script-src 'self' https://code.jquery.com https://cdn.jsdelivr.net https://maxcdn.bootstrapcdn.com",
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net https://maxcdn.bootstrapcdn.com",
            "font-src 'self' https://fonts.gstatic.com",
            "img-src 'self' data: https:",            // allow your site + data: + https images
        ]);
        $response->headers->set('Content-Security-Policy', $csp);

        // ✅ 2) Missing Anti-clickjacking Header (legacy, for older browsers)
        // Use SAMEORIGIN unless you are sure you want DENY.
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // ✅ 3) X-Content-Type-Options
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // ✅ 4) HSTS (Strict-Transport-Security)
        // Only send on HTTPS and in production to avoid local dev issues.
        if ($request->isSecure() && app()->environment('production')) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
            // NOTE: Add "; preload" only after you submit your domain to hstspreload.org
        }

        // 5) Server info: best fixed at web-server/PHP level (see Step 3).
        // (Laravel can’t reliably remove the "Server" header that the web server sets.)


        return $next($request);
    }
}
