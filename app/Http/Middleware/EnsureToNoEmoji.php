<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Rules\NoEmoji;
use Illuminate\Support\Facades\Validator;

class EnsureToNoEmoji
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ary_rules = [];
        foreach ($request->input() as $field => $value){
            $ary_rules[] = [$field => [new NoEmoji()]];
        }  
        //return $ary_rules;

        if(null !== $request->input('title')){
        Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255', new NoEmoji()],
            'number' => ['required', 'string', 'max:100'],
        ])->validatewithBag('saveBookmark');
        /*
        if ($validator->fails()) {
            abort(403);
        }
        */
    }
        return $next($request);
    }
}
