<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Http\Requests\QueryReqeust;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\TopicResource;
use App\Services\TopicService;
use Illuminate\Http\JsonResponse;

class TopicController extends Controller
{
    public function __construct(protected TopicService $service)
    {
        //
    }

    /**
     * @param QueryReqeust $request
     * @return JsonResponse
     */
    public function index(QueryReqeust $request): JsonResponse
    {
        $topics = $this->service->list($request->validated());

        return response()->json([
            'data' => TopicResource::collection($topics)
        ]);
    }

    /**
     * @param int $topicId
     * @return JsonResponse
     */
    public function show(int $topicId): JsonResponse
    {
        $topic = $this->service->show($topicId);

        return response()->json([
            'data' => TopicResource::make($topic)
        ]);
    }

    /**
     * @param QueryReqeust $request
     * @param int $topicId
     * @return JsonResponse
     */
    public function questions(QueryReqeust $request, int $topicId): JsonResponse
    {
        $questions = $this->service->questions($request->validated(), $topicId);

        return response()->json([
            'data' => QuestionResource::collection($questions)
        ]);
    }
}
