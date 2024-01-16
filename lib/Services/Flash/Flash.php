<?php

namespace Plugo\Services\Flash;

class Flash
{
    const FLASH = 'FLASH_MESSAGES';

    const FLASH_ERROR = 'error';
    const FLASH_WARNING = 'warning';
    const FLASH_INFO = 'info';
    const FLASH_SUCCESS = 'success';

    public function create_flash_message(string $name, string $message, string $type): void
    {
        // remove existing message with the name
        if (isset($_SESSION[self::FLASH][$name])) {
            unset($_SESSION[self::FLASH][$name]);
        }
        // add the message to the session
        $_SESSION[self::FLASH][$name] = ['message' => $message, 'type' => $type];
    }


    private function format_flash_message(array $flash_message): string
    {
        return sprintf(
            '<div class="alert alert-%s">%s</div>',
            $flash_message['type'],
            $flash_message['message']
        );
    }

    public function display_flash_message(string $name): void
    {
        if (!isset($_SESSION['FLASH_MESSAGES'][$name])) {
            return;
        }

        // get message from the session
        $flash_message = $_SESSION['FLASH_MESSAGES'][$name];

        // delete the flash message
        unset($_SESSION['FLASH_MESSAGES'][$name]);

        // display the flash message
        echo $this->format_flash_message($flash_message);
    }

    public function display_all_flash_messages(): void
    {
        if (!isset($_SESSION['FLASH_MESSAGES'])) {
            return;
        }

        // get flash messages
        $flash_messages = $_SESSION['FLASH_MESSAGES'];

        // remove all the flash messages
        unset($_SESSION['FLASH_MESSAGES']);

        // show all flash messages
        foreach ($flash_messages as $flash_message) {
            echo $this->format_flash_message($flash_message);
        }
    }

    public function delete_flash_message(string $name): void
    {
        if (!isset($_SESSION['FLASH_MESSAGES'][$name])) {
            return;
        }

        // delete the flash message
        unset($_SESSION['FLASH_MESSAGES'][$name]);
    }

    public function flash(string $name = '', string $message = '', string $type = ''): void
    {
        if ($name !== '' && $message !== '' && $type !== '') {
            // create a flash message
            $this->create_flash_message($name, $message, $type);
        } elseif ($name !== '' && $message === '' && $type === '') {
            // display a flash message
            $this->display_flash_message($name);
        } elseif ($name === '' && $message === '' && $type === '') {
            // display all flash message
            $this->display_all_flash_messages();
        }
    }
}
