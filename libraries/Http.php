<?php

class Http {
    //redirect
    public static function redirect(string $url): void {
    header("Location: $url");
    exit();
    }
}