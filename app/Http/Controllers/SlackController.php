<?php

namespace App\Http\Controllers;

use App\Services\ConfigurationService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\JsonResponse;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class SlackController extends Controller
{
    /**
     * Display the singleton pattern demonstration
     */
    public function index()
    {
        return view('singleton.index');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws ConnectionException
     */
    public function store(): JsonResponse
    {
        $slackService = app('Slack');
        $message = request()->get('message');

        $response = $slackService->send($message);

        return response()->json([
            'success' => $response,
        ]);
    }
}
