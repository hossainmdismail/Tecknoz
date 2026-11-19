<?php

namespace App\Console\Commands;

use Filament\Commands\MakeUserCommand;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:admin')]
class MakeAdmin extends MakeUserCommand
{
    protected $name = 'make:admin';

    protected $aliases = [];

    protected $description = 'Create a user with access to the Filament admin panel';

    protected function createUser(): Model&Authenticatable
    {
        return DB::transaction(function (): Model&Authenticatable {
            $user = parent::createUser();
            $user->forceFill(['is_admin' => true])->save();

            return $user;
        });
    }
}
