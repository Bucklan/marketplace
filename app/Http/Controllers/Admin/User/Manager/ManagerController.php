<?php

namespace App\Http\Controllers\Admin\User\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Admin\Contracts as Contracts;
use App\Services\Admin\Requests as Requests;
use App\Services\Admin\Dto as Dto;
use Termwind\Components\Dt;
use Auth;

class ManagerController extends Controller
{
    private string $url = 'admin.managers.';
    private string $route = 'admin.managers.';
    private string $message = 'Manager successfully ';

    public function index()
    {
        $this->authorize('forAdmin',Auth::user());

        $managers = app(Contracts\GetAllManagers::class)->execute();
        return view($this->url . 'index', ['managers' => $managers]);
    }

    public function create()
    {
        $this->authorize('forAdmin',Auth::user());


        return view($this->url . 'create');
    }

    public function store(Requests\Manager\StoreRequest $request)
    {
        $this->authorize('forAdmin',Auth::user());


        app(Contracts\StoreManager::class)
            ->execute(Dto\Manager\CreateDtoFactory::fromRequest($request));

        return redirect()->route($this->route . 'index')->with('message', $this->message . 'created!');
    }

    public function edit(User $manager)
    {
        $this->authorize('forAdmin',Auth::user());


        return view($this->url . 'edit', ['manager' => $manager]);
    }

    public function update(Requests\Manager\UpdateRequest $request, User $manager)
    {
        $this->authorize('forAdmin',Auth::user());


        app(Contracts\UpdateManager::class)
            ->execute($manager, Dto\Manager\UpdateDtoFactory::fromRequest($request));

        return redirect()->route($this->route . 'index')->with('message', $this->message . 'updated!');

    }

    public function block(User $manager)
    {
        $this->authorize('forAdmin',Auth::user());


        app(Contracts\BlockUser::class)->execute($manager);

        return redirect()->route($this->route . 'index')->withErrors($this->message . 'blocked!');
    }

    public function unblock(User $manager)
    {
        $this->authorize('forAdmin',Auth::user());

        app(Contracts\UnblockUser::class)->execute($manager);

        return redirect()->route($this->route . 'index')->with('message', $this->message . 'unblocked!');
    }
}
