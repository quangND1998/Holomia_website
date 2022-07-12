<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            [
                'title' => 'video intro',
                'image_template' => 'images/theme/16575304261_video-intropng.PNG',
                'link_code' => 'template.video-intro',
                'type' => 0,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'intro',
                'image_template' => 'images/theme/16575304851_intropng.PNG',
                'link_code' => 'template.intro',
                'type' => 0,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'Holomia Overview',
                'image_template' => 'images/theme/16575305521_holomia-overviewpng.PNG',
                'link_code' => 'template.overview',
                'type' => 0,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'View project',
                'image_template' => 'images/theme/16575306151_view-projectpng.PNG',
                'link_code' => 'template.view-project',
                'type' => 0,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'Last News',
                'image_template' => 'images/theme/16575307301_last-newpng.PNG',
                'link_code' => 'template.last-new',
                'type' => 0,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'Vison',
                'image_template' => 'images/theme/16575307661_visionpng.PNG',
                'link_code' => 'template.vision-holomia',
                'type' => 0,
                'created_at' => new DateTime()
            ],
            [
                'title' => 'Our Team',
                'image_template' => 'images/theme/16575307991_our-teampng.PNG',
                'link_code' => 'template.our-team',
                'type' => 0,
                'created_at' => new DateTime()
            ], [
                'title' => 'imersive_about',
                'image_template' => 'images/theme/16576006781_imersive-aboutpng.PNG',
                'link_code' => 'template.imersive_about',
                'type' => 0,
                'created_at' => new DateTime()
            ], [
                'title' => 'holomia event',
                'image_template' => 'images/theme/16576007131_holmia-eventpng.PNG',
                'link_code' => 'template.holomia_event',
                'type' => 0,
                'created_at' => new DateTime()
            ],



        ]);
    }
}
