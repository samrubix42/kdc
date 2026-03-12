<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Seed blog categories and blogs.
     */
    public function run(): void
    {
        $categoryNames = [
            'Interior Design',
            'Architecture',
            'Workspace',
            'Residential',
        ];

        $categories = collect($categoryNames)->mapWithKeys(function (string $name) {
            $category = BlogCategory::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'is_active' => true,
                ]
            );

            return [$category->slug => $category];
        });

        $blogs = [
            [
                'title' => 'How to Plan a Functional Luxury Living Room',
                'description' => 'A practical framework to balance comfort, aesthetics, and daily usability.',
                'tags' => 'living room,luxury interior,space planning',
                'category' => 'interior-design',
                'content' => '<p>Designing a living room starts with movement flow, furniture scale, and natural light. Build layout zones first, then layer textures, lighting, and decor for a refined experience.</p>',
                'meta_title' => 'Functional Luxury Living Room Design Guide',
                'meta_description' => 'Learn how to design a luxury living room that is beautiful and practical for everyday use.',
                'meta_keywords' => 'living room design,luxury interiors,space planning',
                'is_active' => true,
            ],
            [
                'title' => 'Modern Office Interiors That Improve Team Productivity',
                'description' => 'Design choices that directly support collaboration, focus, and employee wellbeing.',
                'tags' => 'office design,workspace,productivity',
                'category' => 'workspace',
                'content' => '<p>Effective office design combines collaborative zones, acoustic control, task lighting, and ergonomic furniture. Small design decisions can significantly improve output and comfort.</p>',
                'meta_title' => 'Modern Office Interior Design for Productivity',
                'meta_description' => 'Explore office interior strategies that help teams stay focused and collaborative.',
                'meta_keywords' => 'office interiors,workspace design,productivity',
                'is_active' => true,
            ],
            [
                'title' => '5 Architectural Details That Elevate Residential Projects',
                'description' => 'From facade rhythm to entry sequencing, details shape the overall experience.',
                'tags' => 'architecture,residential design,facade',
                'category' => 'architecture',
                'content' => '<p>Residential architecture becomes memorable through thoughtful proportions, material transitions, and daylight strategy. Focus on details that support both identity and function.</p>',
                'meta_title' => 'Architectural Details for Better Residential Projects',
                'meta_description' => 'Key architectural details that improve quality and character in residential design.',
                'meta_keywords' => 'residential architecture,design details,home design',
                'is_active' => true,
            ],
            [
                'title' => 'Designing Bedrooms for Better Rest and Daily Routine',
                'description' => 'Simple planning principles for calm, clutter-free, and restful bedroom spaces.',
                'tags' => 'bedroom design,residential,interior planning',
                'category' => 'residential',
                'content' => '<p>A restful bedroom depends on visual calm, proper storage, lighting layers, and soft finishes. Prioritize routine-based design over decorative excess.</p>',
                'meta_title' => 'Bedroom Design Tips for Better Rest',
                'meta_description' => 'Create a bedroom layout that supports better sleep and everyday routine.',
                'meta_keywords' => 'bedroom interiors,sleep friendly design,residential interiors',
                'is_active' => true,
            ],
        ];

        foreach ($blogs as $item) {
            $category = $categories->get($item['category']);

            if (!$category) {
                continue;
            }

            Blog::updateOrCreate(
                ['slug' => Str::slug($item['title'])],
                [
                    'title' => $item['title'],
                    'description' => $item['description'],
                    'slug' => Str::slug($item['title']),
                    'content' => $item['content'],
                    'tags' => $item['tags'],
                    'category_id' => $category->id,
                    'meta_title' => $item['meta_title'],
                    'meta_description' => $item['meta_description'],
                    'meta_keywords' => $item['meta_keywords'],
                    'image' => null,
                    'is_active' => $item['is_active'],
                ]
            );
        }
    }
}
