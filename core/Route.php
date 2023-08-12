<?php

class Route
{
    private $uri;
    private $urlOriginal;
    public function handleRoute($url)
    {
        global $routesConfig;
        unset($routesConfig['default_controller']);
        $url = trim($url, '/');
        $handleUrl = $url;
        if (!empty($routesConfig)) {
            foreach ($routesConfig as $key => $value) {
                // Check đường dẫn có khớp
                if (preg_match('~' . $key . '~is', $url)) {
                    // Thay thế
                    $handleUrl = preg_replace('~' . $key . '~is', $value, $url);
                    $this->uri = $key;
                    $this->urlOriginal = $value;
                }
            }
        }
        return $handleUrl;
    }
    public function getUri()
    {
        return $this->uri;
    }
    public function getOriginallUrl()
    {
        return $this->urlOriginal;
    }
}
