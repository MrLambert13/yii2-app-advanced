<?php

namespace common\services;


interface EmailInterface
{
    public function send(string $to, string $subject, string $viewHTML, string $viewText, array $data);

}