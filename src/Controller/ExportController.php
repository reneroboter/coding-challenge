<?php

declare(strict_types=1);


namespace RenéRoboter\CodingChallenge\Controller;

class ExportController extends AbstractController
{
    public function export(): string
    {
        if (isset($_POST['export_trigger_submit'])) {
            do_action('init');
        }

        return $this->twig->render('export.html.twig');
    }

    public function doExport(): void
    {
        if (isset($_POST['export_trigger_submit'])) {
            $arguments = [
                'post_type' => 'book',
                'numberposts' => -1,
                'post_status' => 'any',
            ];
            $posts = get_posts($arguments);
            $books = [];
            foreach ($posts as $post) {
                $books[] = [
                    'title' => $post->post_title,
                    'description' => $post->post_content,
                ];
            }
            $json = wp_json_encode($books);
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=books.json');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header("Content-Type: text/plain");
            echo $json;
            exit();
        }
    }
}
