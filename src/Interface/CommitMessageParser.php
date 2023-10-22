<?php

namespace App\Interface;

use App\Interface\CommitMessage;

interface CommitMessageParser {
    public function parse(string $message): CommitMessage;
}