<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Seed testimonials.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Rohit Mehta',
                'client_info' => 'Director, Mehta Infrastructure Pvt. Ltd.',
                'message' => 'KDC delivered exactly what we envisioned for our corporate office. The planning and execution were excellent from concept to handover.',
                'is_active' => true,
            ],
            [
                'name' => 'Neha Kapoor',
                'client_info' => 'Founder, Kapoor Lifestyle Homes',
                'message' => 'Our luxury residence was designed with elegance and practicality. The team remained highly professional and responsive throughout.',
                'is_active' => true,
            ],
            [
                'name' => 'Sanjay Verma',
                'client_info' => 'Operations Head, Verma Auto Components',
                'message' => 'The industrial facility designed by KDC improved workflow efficiency and safety. Their technical understanding and site coordination were strong.',
                'is_active' => true,
            ],
            [
                'name' => 'Priya Nair',
                'client_info' => 'Trustee, Nair Education Foundation',
                'message' => 'KDC handled our institutional campus project with commitment and creativity. Timelines were met and the final output exceeded expectations.',
                'is_active' => true,
            ],
            [
                'name' => 'Amit Khanna',
                'client_info' => 'Managing Partner, Khanna Retail Group',
                'message' => 'From early drawings to final execution, the process was transparent and well managed. We appreciated their detail-focused approach.',
                'is_active' => false,
            ],
        ];

        foreach ($testimonials as $item) {
            Testimonial::updateOrCreate(
                [
                    'name' => $item['name'],
                    'message' => $item['message'],
                ],
                $item
            );
        }
    }
}
