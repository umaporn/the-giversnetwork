<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call( [
                         PermissionSeeder::class,
                         InterestInSeeder::class,
                         // OrganizationCategorySeeder::class,
                         // OrganizationSeeder::class,
                         UserSeeder::class,
                         BannerSeeder::class,
                         // NewsSeeder::class,
                         // ShareCategorySeeder::class,
                         // ShareSeeder::class,
                         // ShareCommentSeeder::class,
                         // ShareImageSeeder::class,
                         // ShareLikeSeeder::class,
                         EventsSeeder::class,
                         LearnCategorySeeder::class,
                         LearnSeeder::class,
                         // ChallengeCategorySeeder::class,
                         // ChallengeSeeder::class,
                         // ChallengeCommentSeeder::class,
                         // ChallengeImageSeeder::class,
                         // ChallengeLikeSeeder::class,
                         GiveCategorySeeder::class,
                         // GiveSeeder::class,
                         // GiveImageSeeder::class,
                     ] );
    }
}
