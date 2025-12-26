<?php

namespace App\Http\Controllers;

use App\Services\ConfigurationService;
use App\Services\SlackService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\JsonResponse;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class SlackController extends Controller
{

    public function __construct(
        protected SlackService $slackService
    ) {
    }
    /**
     * Display the singleton pattern demonstration
     */
    public function index()
    {
        return view('singleton.index',[
            'last_message' => $this->slackService->getLastMessage() ?? 'No messages sent yet.'
        ]);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws ConnectionException
     */
    public function store(): JsonResponse
    {
        $message = request()->get('message');

        $response = $this->slackService->send($message);

        return response()->json([
            'success' => $response,
        ]);
    }
}
