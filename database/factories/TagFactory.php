<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'PHP',
                'Laravel',
                'JavaScript',
                'Vue.js',
                'React',
                'Angular',
                'Node.js',
                'Python',
                'Django',
                'Flask',
                'Ruby',
                'Rails',
                'Java',
                'Spring',
                'Kotlin',
                'Android',
                'Swift',
                'iOS',
                'C#',
                'ASP.NET',
                'SQL',
                'NoSQL',
                'MongoDB',
                'Firebase',
                'Docker',
                'Kubernetes',
                'AWS',
                'Azure',
                'Google Cloud',
                'Heroku',
                'DigitalOcean',
                'Vagrant',
                'Ansible',
                'Terraform',
                'Jenkins',
                'CircleCI',
                'Git',
                'GitHub',
                'GitLab',
                'Bitbucket',
                'Jira',
                'Trello',
                'Slack',
                'Discord',
                'Zoom',
                'Google Meet',
                'Microsoft Teams',
                'Skype',
                'Telegram',
                'WhatsApp',
                'Facebook',
                'Twitter',
                'Instagram',
                'LinkedIn',
                'Snapchat',
                'TikTok',
                'YouTube',
                'Netflix',
                'Spotify',
                'Twitch',
                'WhatsApp',
                'Zoom',
                'Google Meet',
                'Microsoft Teams',
                'Skype',
                'Telegram',
                'WhatsApp',
                'Facebook',
                'Twitter',
                'Instagram',
                'LinkedIn',
                'Snapchat',
                'TikTok',
                'YouTube',
                'Netflix',
                'Spotify',
                'Twitch',
                'Government Jobs',
                'Bank Jobs',
                'Railway Jobs',
                'Police Jobs',
            ]),
            'slug' => $this->faker->unique()->slug,
        ];
    }
}
