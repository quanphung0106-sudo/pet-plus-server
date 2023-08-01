<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Answer\AnswerRepositoryInterface;
use Exception;

class AnswerService
{
    protected AnswerRepositoryInterface $answerRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function getAll($exercise_id)
    {
        return $this->answerRepository->getAll($exercise_id);
    }

    public function create($data)
    {
        try {
            return $this->answerRepository->insert($data);
        } catch (Exception) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            return $this->answerRepository->update($id, $data);
        } catch (Exception) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            return $this->answerRepository->delete($id);
        } catch (Exception) {
            return false;
        }
    }
}
