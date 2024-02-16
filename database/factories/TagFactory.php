<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [];
    }

    /**
     * Create a new Tag instance.
     *
     * @param  array  $attributes
     * @return \App\Models\Tag
     */
    public function createTag($attributes = [])
    {
        // Manually specify the tag names you want to use
        $tagNames = [
            'Budgeting Tips',
            'Investment Insights',
            'Financial Freedom',
            'Frugal Living',
            'Money Psychology',
            'Money Mindfulness',
        ];

        $tags = collect($tagNames)->map(function ($tagName) {
            return Tag::create(['name' => $tagName]);
        });

        return $tags;
    }
}
