<?php

namespace RenéRoboter\CodingChallenge;


use RenéRoboter\CodingChallenge\Controller\ExportController;
use RenéRoboter\CodingChallenge\Controller\ImportController;

class CodingChallenge
{
    public function __construct()
    {
        $this->registerPostType();
        $this->registerImportPage();
        $this->registerExportPage();
        $this->registerExportAction();
    }

    public function registerPostType(): void
    {
        add_action('init', function () {
            register_post_type('book', [
                'labels' => [
                    'name' => __('Books'),
                    'singular_name' => __('Book'),
                    'not_found' => __('No books found'),
                    'add_new_item' => __('Add New Book'),
                ],
                'public' => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-book',
            ]);
        });
    }

    public function registerImportPage(): void
    {
        add_action('admin_menu', function () {
            add_submenu_page('edit.php?post_type=book', __('Import'), __('Import'), 'manage_options', 'book_import', function () {
                $controller = new ImportController();
                echo $controller->import();
            });
        });
    }

    public function registerExportPage(): void
    {
        add_action('admin_menu', function () {
            add_submenu_page('edit.php?post_type=book', __('Export'), __('Export'), 'manage_options', 'book_export', function () {
                $controller = new ExportController();
                echo $controller->export();
            });
        });
    }

    public function registerExportAction(): void
    {
        add_action('init', function () {
            $controller = new ExportController();
            $controller->doExport();
        });
    }
}
