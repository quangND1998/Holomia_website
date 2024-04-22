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
            // [
            //     'title' => 'video intro',
            //     'image_template' => 'images/theme/16575304261_video-intropng.PNG',
            //     'link_code' => 'template.video-intro',
            //     'type' => 0,
            //     'created_at' => new DateTime()
            // ],
            // [
            //     'title' => 'intro',
            //     'image_template' => 'images/theme/16575304851_intropng.PNG',
            //     'link_code' => 'template.intro',
            //     'type' => 0,
            //     'created_at' => new DateTime()
            // ],
            // [
            //     'title' => 'Holomia Overview',
            //     'image_template' => 'images/theme/16575305521_holomia-overviewpng.PNG',
            //     'link_code' => 'template.overview',
            //     'type' => 0,
            //     'created_at' => new DateTime()
            // ],
            // [
            //     'title' => 'View project',
            //     'image_template' => 'images/theme/16575306151_view-projectpng.PNG',
            //     'link_code' => 'template.view-project',
            //     'type' => 0,
            //     'created_at' => new DateTime()
            // ],
            // [
            //     'title' => 'Last News',
            //     'image_template' => 'images/theme/16575307301_last-newpng.PNG',
            //     'link_code' => 'template.last-new',
            //     'type' => 0,
            //     'created_at' => new DateTime()
            // ],
            // [
            //     'title' => 'Vison',
            //     'image_template' => 'images/theme/16575307661_visionpng.PNG',
            //     'link_code' => 'template.vision-holomia',
            //     'type' => 0,
            //     'created_at' => new DateTime()
            // ],
            // [
            //     'title' => 'Our Team',
            //     'image_template' => 'images/theme/16575307991_our-teampng.PNG',
            //     'link_code' => 'template.our-team',
            //     'type' => 0,
            //     'created_at' => new DateTime()
            // ], [
            //     'title' => 'imersive_about',
            //     'image_template' => 'images/theme/16576006781_imersive-aboutpng.PNG',
            //     'link_code' => 'template.imersive_about',
            //     'type' => 0,
            //     'created_at' => new DateTime()
            // ], [
            //     'title' => 'holomia event',
            //     'image_template' => 'images/theme/16576007131_holmia-eventpng.PNG',
            //     'link_code' => 'template.holomia_event',
            //     'type' => 0,
            //     'created_at' => new DateTime()
            // ],
            // [
            //     'title' => 'about us',
            //     'image_template' => 'images/theme/16576837001_about-uspng.PNG',
            //     'link_code' => 'template.about_us',
            //     'type' => 0,
            //     'created_at' => new DateTime()
            // ],

            // [
            //     'title' => 'contact_detail',
            //     'image_template' => 'images/theme/16576837711_contact-detailpng.PNG',
            //     'link_code' => 'template.contact_detail',
            //     'type' => 0,
            //     'created_at' => new DateTime()
            // ],

            // [
            //     'title' => 'contact-form',
            //     'image_template' => 'images/theme/16581128031_contact-formpng.PNG',
            //     'link_code' => 'template.contact-form',
            //     'type' => 0,
            //     'created_at' => new DateTime()
            // ],

            // [
            //     'title' => 'holomia news',
            //     'image_template' => 'images/theme/16581131731_holomia-newspng.PNG',
            //     'link_code' => 'template.holomia-news',
            //     'type' => 0,
            //     'created_at' => new DateTime()
            // ],
            [
                'title' => 'camb banner',
                'image_template' => 'images/theme/17137670091_sectionpng.png',
                'link_code' => 'template.camb.camb_banner',
                'type' => 0,
                'created_at' => new DateTime()
            ],

            [
                'title' => 'camb about',
                'image_template' => 'images/theme/17137726041_aboutjpg.jpg',
                'link_code' => 'template.camb.camb_about',
                'type' => 0,
                'created_at' => new DateTime()
            ],

            [
                'title' => 'camb reason',
                'image_template' => 'images/theme/17137771441_lydojpg.jpg',
                'link_code' => 'template.camb.camb_reason',
                'type' => 0,
                'created_at' => new DateTime()
            ],

            [
                'title' => 'camb course',
                'image_template' => 'images/theme/17137771681_khoahocjpg.jpg',
                'link_code' => 'template.camb.camb_course',
                'type' => 0,
                'created_at' => new DateTime()
            ],



        ]);
    }
}
