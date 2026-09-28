<?php

namespace App\Http\Services;

use App\Http\Repositories\ClassroomRepository;

class ClassroomService
{
    public function __construct(private ClassroomRepository $classroomRepository)
    {}

    public function index(array $data)
    {
        return $this->classroomRepository->index($data);
    }

    public function store(array $data)
    {
        return $this->classroomRepository->store($data);
    }

    public function show(string $id)
    {
        return $this->classroomRepository->show($id);
    }

    public function update(array $data, string $id)
    {
        return $this->classroomRepository->update($data, $id);
    }

    public function destroy(string $id)
    {
        $this->classroomRepository->destroy($id);
    }
}