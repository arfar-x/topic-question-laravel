<?php

namespace App\Services;

use App\Models\Question;
use App\Models\Topic;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Query\Builder;

class TopicService
{
    public function __construct(protected Topic $model)
    {
        //
    }

    public function list(array $request): LengthAwarePaginator
    {
        return $this->model::query()
            ->latest()
            ->paginate(
                perPage: data_get($request, 'per_page'),
                page: data_get($request, 'page'),
            );
    }

    public function show(int $id): Topic
    {
        /** @var Topic */
        return $this->model->query()->find($id);
    }

    /**
     * @param array $request
     * @param int $id
     * @return LengthAwarePaginator
     */
    public function questions(array $request, int $id): LengthAwarePaginator
    {
        return Question::query()->whereIn('topic_id', function (Builder $query) use ($id) {
            $query->from('topics')
                ->select('id')
                ->where('id', $id)
                ->orWhere('parent_id', $id);
        })->paginate(
            perPage: data_get($request, 'per_page'),
            page: data_get($request, 'page'),
        );
    }
}
