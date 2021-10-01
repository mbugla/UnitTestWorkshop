<?php

declare(strict_types=1);

namespace App\Course\Application\Service;

use App\Course\Domain\Course;
use GuzzleHttp\Client;

class WebService
{
    public function addCourse(Course $course): void
    {
        $client = new Client();

        $client->post('https://onlinecourses-ws.com', ['body' => json_encode($course)]);
    }
}