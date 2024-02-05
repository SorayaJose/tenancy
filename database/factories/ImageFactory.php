<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /*
        // verificar si se envio una imagen
        if ($request->hasFile('image_url')) {
            // eliminar imagen anterior
            Storage::delete($task->image_url);

            // guardar la nueva iamgen
            $data['image_url'] = Storage::put('tasks', $request->file('image_url'));
        }
        */
        return [
            'url' => 'posts' .$this->facker->image('posts', 640, 480, null, false)
        ];
    }
}
