<?php

namespace App\Http\Repositories;

use App\Models\Classroom;

class ClassroomRepository
{
    public function __construct(private Classroom $model)
    {}

    public function index(array $data)
    {
        return $this->model->query()->where(function ($query) use($data) {
            if (data_get($data, 'name')) {
                $query->where('name', 'like', '%' . $data['name'] . '%');
            }
        })->get();
    }

    public function store(array $data)
    {
        return $this->model->create([
            'name' => $data['name'],
            'vacancies' => $data['vacancies']
        ]);
    }

    public function show(string $id)
    {
        return $this->model->findOrFail($id);
    }

    public function update(array $data, string $id)
    {
        $classroom = $this->show($id);

        $classroom->update($data);

        return $classroom->fresh();
    }

    public function destroy(string $id)
    {
        $classroom = $this->show($id);

        $classroom->delete();
    }
}