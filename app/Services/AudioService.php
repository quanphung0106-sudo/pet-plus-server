<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Audio\AudioRepositoryInterface;
use Exception;

class AudioService
{
    protected AudioRepositoryInterface $audioRepository;

    public function __construct(AudioRepositoryInterface $audioRepository)
    {
        $this->audioRepository = $audioRepository;
    }

    public function create($data)
    {
        try {
            $audio = [
                'url' => $this->audioRepository->replaceDestinationPath($data['url']),
                'audio_name' => $data['audio_name'],
                'user_id' => $data['user_id'],
                'enterprise_id' => $data['enterprise_id'],
            ];

            return $this->audioRepository->create($audio);
        } catch (Exception) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            $audio = [
                'url' => $this->audioRepository->replaceDestinationPath($data['url']),
                'audio_name' => $data['audio_name'],
                'user_id' => $data['user_id'],
                'enterprise_id' => $data['enterprise_id'],
            ];

            return $this->audioRepository->update($id, $audio);
        } catch (Exception) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            return $this->audioRepository->delete($id);
        } catch (Exception) {
            return false;
        }
    }
}
