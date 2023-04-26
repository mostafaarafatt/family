<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class StaticPagesSeeder extends Seeder
{

    public function run()
    {

        Page::create(
            [
                'en' => [
                    'title' => 'who we are',
                    'content' => 'content here',
                    'slug' => 'who we are'
                ],
                'ar' => [
                    'title' => 'من نحن',
                    'content' => 'يوضع المحتوى هنا',
                    'slug' => 'من نحن'
                ]
            ]
        );

        Page::create(
            [
                'en' => [
                    'title' => 'roles & permissions',
                    'content' => 'content here',
                    'slug' => 'roles & permissions'
                ],
                'ar' => [
                    'title' => 'الشروط والأحكام',
                    'content' => 'يوضع المحتوى هنا',
                    'slug' => 'الشروط والأحكام'
                ]
            ],

        );

        Page::create(
            [
                'en' => [
                    'title' => 'privacy policy',
                    'content' => 'content here',
                    'slug' => 'privacy policy'
                ],
                'ar' => [
                    'title' => 'سياسه الخصوصية',
                    'content' => 'يوضع المحتوى هنا',
                    'slug' => 'سياسه الخصوصية'
                ]
            ],
        );
    }
}
