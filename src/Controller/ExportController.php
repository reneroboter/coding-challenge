<?php

declare(strict_types=1);


namespace RenéRoboter\CodingChallenge\Controller;

use WP_Query;

class ExportController
{
    public function export(): string
    {
        $args = [
            'post_type' => 'book',
            'numberposts' => -1,
            'post_status' => 'any',
        ];
        $query = new WP_Query($args);
        $books = $query->get_posts();
        if (!$books) {
            $books = [];
        }
        return \json_encode($books);
    }
}