<?php

namespace App\Service;

use App\Interface\CommitMessageParser;
use App\Entity\CommitMessageObject;

class CommitParser implements CommitMessageParser
{
    public function parse(string $message): CommitMessageObject
    {
        $lines = explode("\n", $message);
        $titleAndTags = explode(' ', $lines[0]);

        $title_array = array_slice($titleAndTags, 4);
        $title = implode(" ", $title_array);
        $tags = array_slice($titleAndTags, 0, 2);
        $taskId = null;
        foreach ($titleAndTags as $tag) {
            if (strpos($tag, '#') !== false) {
                $taskId = (int) filter_var($tag, FILTER_SANITIZE_NUMBER_INT);
            }
        }

        $details = array();
        foreach ($lines as $line) {
            if (strpos($line, '*') !== false) {
                $details[] = trim($line);
            }
        }

        $bcBreaks = array();
        foreach ($lines as $line) {
            if (strpos($line, 'BC:') !== false) {
                $bcBreaks[] = trim($line);
            }

        $todos = array();
        foreach($lines as $line) {
            if(strpos($line, 'TODO:') !== false){
                $todos[] = trim($line);
            }
        }
        }

        return new CommitMessageObject($title, $taskId, $tags, $details, $bcBreaks, $todos);
    }
}