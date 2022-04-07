<?php

namespace app\Helpers;

trait Render {
    public function RenderHtml(string $view, array $data)
    {
        extract($data);
        ob_start();
        require $_SERVER['DOCUMENT_ROOT'] . '/' .'views/' . $view;
        $html = ob_get_clean();

        return $html;
    }
}