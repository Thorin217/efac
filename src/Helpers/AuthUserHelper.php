<?php

use Exactum\Efac\Enums\DefaultsEnum;
use App\Models\User;
use Exactum\Efac\Models\Enterprise\EmitterEntity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

if (!function_exists('authUserId')) {
    function authUserId(): int | null
    {
        return Auth::user()->id;
    }
}

if (!function_exists('authUserObject')) {
    function authUserObject(): User | null
    {
        return Auth::user();
    }
}

if (!function_exists('authCurrentEntity')) {
    function authCurrentEntity()
    {
        return Cache::get(DefaultsEnum::SessionNameKey->value . authUserId());
    }
}

if (!function_exists('authCurrentMainEntity')) {
    function authCurrentMainEntity()
    {
        return authCurrentEntity() ? EmitterEntity::find(authCurrentEntity())->entity()->first() ?? null : abort(412, 'No se ha elegido el entidad actual.');
    }
}


if (!function_exists('getRoleForAuthUser')) {
    function getRoleForAuthUser()
    {
        /** @var \App\Models\User $user */
        $user = authUserObject();
        return $user->getRoleNames()->first();
    }
}
