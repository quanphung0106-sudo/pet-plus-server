<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Video\VideoRepositoryInterface;
use Exception;

class VideoService
{
    protected VideoRepositoryInterface $videoRepository;

    public function __construct(VideoRepositoryInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function create($data)
    {
        try {
            $video = [
                'url' => $this->videoRepository->replaceDestinationPath($data['url']),
                'video_name' => $data['video_name'],
                'user_id' => $data['user_id'],
                'enterprise_id' => $data['enterprise_id'],
            ];

            return $this->videoRepository->create($video);
        } catch (Exception) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            $video = [
                'url' => $this->videoRepository->replaceDestinationPath($data['url']),
                'video_name' => $data['video_name'],
                'user_id' => $data['user_id'],
                'enterprise_id' => $data['enterprise_id'],
            ];

            return $this->videoRepository->update($id, $video);
        } catch (Exception) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            return $this->videoRepository->delete($id);
        } catch (Exception) {
            return false;
        }
    }
}
