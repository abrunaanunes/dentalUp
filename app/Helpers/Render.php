<?php

namespace app\Helpers;

trait Render {
    public function RenderHtml(string $view, array $data)
    {
        ob_start();
        extract($data);
        require $_SERVER['DOCUMENT_ROOT'] . '/' .'views' . '/' . $view;
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
}