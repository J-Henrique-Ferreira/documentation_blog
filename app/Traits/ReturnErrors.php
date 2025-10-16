<?php

namespace App\Traits;

trait ReturnErrors
{
    public function returnErrors(\Throwable $th, array $redirectDatas = [])
    {
        if (env('APP_ENV') == 'local') {
            return $th->getMessage();
        } else {
            return redirect($redirectDatas['route'])->with('error', $redirectDatas['message']);
        }
    }
}
