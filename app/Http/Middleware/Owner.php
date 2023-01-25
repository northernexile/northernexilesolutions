<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Http\Request;

class Owner
{
    public function handle(Request $request,\Closure $next)
    {
        $response = null;
        $email = null;

        try {
            $user = auth('sanctum')->user();

            if (!is_null($user)) {
                $email = User::find($user->id)->email;
            }

            $allowedEmails = config('owner.emails');

            if($email && !in_array($email,$allowedEmails)){
                throw new \Exception('User is not owner');
            }

            $response = $next($request);
        } catch (\Throwable $throwable) {
            $response = response()->json(
                [
                    'error'=>'Your are not authorised to use this resource',
                    'details'=>$throwable->getMessage()
                ],401
            );
        }

        return $response;
    }
}
