<?php

declare(strict_types=1);


namespace RenéRoboter\CodingChallenge\Controller;

class ImportController extends AbstractController
{
    public function import(): string
    {
        $isImported = false;
        if (isset($_FILES['import_book'])) {

            $file = $_FILES['import_book'];
            $location = $file['tmp_name'];

            try {
                if (pathinfo($file['name'], PATHINFO_EXTENSION) !== 'json') {
                    throw new \JsonException('Uploaded file is not a valid json file!');
                }
                if (file_exists($location)) {
                    $books = json_decode(file_get_contents($location), true, 512, JSON_THROW_ON_ERROR);
                }
            } catch (\JsonException $e) {
                return $this->twig->render('import.html.twig', [
                    'error' => $e,
                ]);
            }
            foreach ($books as $book) {
                wp_insert_post([
                    'post_title' => $book['title'],
                    'post_type' => 'book',
                    'post_content' => $book['description']
                ]);
            }
            $isImported = true;
        }

        return $this->twig->render('import.html.twig', [
            'isImported' => $isImported
        ]);
    }
}
