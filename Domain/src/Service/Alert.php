<?php

namespace Domain\Service;

class Alert
{
    private array $messages = [];

    /**
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        return isset($this->messages[$key]);
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    public function get(string $key): ?string
    {
        if (!$this->has($key)) {
            return null;
        }

        return $this->messages[$key];
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public function set(string $key, string $value): void
    {
        $this->messages[$key] = $value;
    }

}
