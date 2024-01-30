<?php

namespace Asciito\SimpleCrud;

class View
{
    protected function __construct(protected string $path, protected array $data)
    {
        //
    }

    public function render(): void
    {
        (function (string $view, array $data) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }

            require $view;
        })($this->path, $this->data);
    }

    public static function create(string $name, array $data = []): static
    {
        $path = static::getViewPath($name);

        if (! file_exists($path)) {
            throw new \Exception("The view [$name] was not found");
        }

        return new static($path, $data);
    }

    protected static function getViewPath(string $name): string
    {
        $segments = array_filter(explode(".", $name), fn($segment) => !empty($segment));
        
        $name = implode(DIRECTORY_SEPARATOR, $segments).".php";

        return VIEW_ROOT_PATH.DIRECTORY_SEPARATOR.$name;
    }
}