<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Seed project categories, projects, and project images.
     */
    public function run(): void
    {
        $categoryNames = [
            'Residential',
            'Commercial',
            'Hospitality',
            'Interior',
        ];

        $categories = collect($categoryNames)->mapWithKeys(function (string $name) {
            $slug = Str::slug($name);

            $category = ProjectCategory::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $name,
                    'is_active' => true,
                ]
            );

            return [$slug => $category];
        });

        $projects = [
            [
                'title' => 'Skyline Corporate Tower',
                'category' => 'commercial',
                'description' => 'A modern high-rise office project focused on flexible workspace planning, daylight optimization, and efficient circulation.',
                'clients' => 'UrbanEdge Developers',
                'completion_date' => '2025-09-12',
                'architects' => 'KDC Design Team',
                'images' => [
                    ['image_path' => 'images/projects/1-426x574.jpg', 'is_primary' => true],
                    ['image_path' => 'images/projects/1-1920x1080.jpg', 'is_primary' => false],
                ],
            ],
            [
                'title' => 'Palm Residency Villas',
                'category' => 'residential',
                'description' => 'A premium villa community balancing privacy, landscape integration, and contemporary design language.',
                'clients' => 'Asteria Homes',
                'completion_date' => '2024-12-20',
                'architects' => 'KDC + Associates',
                'images' => [
                    ['image_path' => 'images/projects/2-426x574.jpg', 'is_primary' => true],
                    ['image_path' => 'images/projects/2-1920x1080.jpg', 'is_primary' => false],
                ],
            ],
            [
                'title' => 'Azure Boutique Hotel',
                'category' => 'hospitality',
                'description' => 'A destination hospitality project with layered interiors, curated material palette, and guest-centric experience flow.',
                'clients' => 'Bluecrest Hospitality',
                'completion_date' => '2025-03-08',
                'architects' => 'KDC Hospitality Studio',
                'images' => [
                    ['image_path' => 'images/projects/3-426x574.jpg', 'is_primary' => true],
                    ['image_path' => 'images/projects/3-1920x1080.jpg', 'is_primary' => false],
                ],
            ],
            [
                'title' => 'Nova Workspace Interiors',
                'category' => 'interior',
                'description' => 'An office interior retrofit designed for hybrid collaboration, acoustic comfort, and ergonomic productivity.',
                'clients' => 'Nova Tech Labs',
                'completion_date' => '2025-11-04',
                'architects' => 'KDC Interiors',
                'images' => [
                    ['image_path' => 'images/projects/4-426x574.jpg', 'is_primary' => true],
                    ['image_path' => 'images/projects/2-1920x1080.jpg', 'is_primary' => false],
                ],
            ],
        ];

        foreach ($projects as $item) {
            $category = $categories->get($item['category']);

            if (!$category) {
                continue;
            }

            $project = Project::updateOrCreate(
                ['slug' => Str::slug($item['title'])],
                [
                    'title' => $item['title'],
                    'project_type' => $category->id,
                    'slug' => Str::slug($item['title']),
                    'description' => $item['description'],
                    'clients' => $item['clients'],
                    'completion_date' => $item['completion_date'],
                    'architects' => $item['architects'],
                ]
            );

            foreach ($item['images'] as $image) {
                ProjectImage::updateOrCreate(
                    [
                        'project_id' => $project->id,
                        'image_path' => $image['image_path'],
                    ],
                    [
                        'is_primary' => $image['is_primary'],
                    ]
                );
            }
        }
    }
}
