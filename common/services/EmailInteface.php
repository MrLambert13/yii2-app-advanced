<?php

namespace common\services;


interface EmailInteface
{
    public function send(string $to, string $subject, string $viewHTML, string $viewText, array $data);

}