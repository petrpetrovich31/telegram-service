<?php

namespace PetrPetrovich\Telegram\Services;

class TelegramService
{
    protected $botToken;
    protected $chatId;

    /**
     * Telegram constructor.
     * @param string $botToken
     * @param string $chatId
     */
    public function __construct(string $botToken, string $chatId)
    {
        $this->botToken = $botToken;
        $this->chatId = $chatId;
    }

    /**
     * @param string $message
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendMessage(string $message): bool
    {
        $url = "https://api.telegram.org/bot{$this->botToken}/sendMessage";
        $params = [
            'chat_id' => $this->chatId,
            'text' => $message,
            'parse_mode' => 'Markdown',
        ];

        $response = curl($url, 'POST', $params);

        return $response->ok;
    }
}
