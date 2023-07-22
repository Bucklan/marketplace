<?php

namespace App\Http\Controllers\Admin\User\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Admin\Contracts as Contracts;
use Auth;

class ClientController extends Controller
{

    private string $url = 'admin.clients.';
    private string $route = 'admin.clients.';
    private string $message = 'Client successfully ';

    public function index()
    {
        $this->authorize('forManagerAndAdmin', Auth::user());

        $clients = app(Contracts\GetAllClients::class)->execute();
        return view($this->url . 'index', ['clients' => $clients]);
    }

    public function block(User $client)
    {
        $this->authorize('forManagerAndAdmin', Auth::user());

        app(Contracts\BlockUser::class)->execute($client);

        return redirect()->route($this->route . 'index')->with('message', $this->message . 'blocked!');
    }

    public function unblock(User $client)
    {
        $this->authorize('forManagerAndAdmin', Auth::user());

        app(Contracts\UnblockUser::class)->execute($client);

        return redirect()->route($this->route . 'index')->with('message', $this->message . 'unblocked!');

    }
}
