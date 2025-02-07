<?php

function formatPhoneNumber($number) {
    // Remove the '+' sign for processing
    $cleanNumber = preg_replace('/[^0-9]/', '', $number);

    if (strlen($cleanNumber) == 10) {
        return substr($cleanNumber, 0, 3) . '-' . substr($cleanNumber, 3, 3) . '-' . substr($cleanNumber, 6);
    } elseif (strlen($cleanNumber) == 11) {
        return substr($cleanNumber, 0, 5) . ' ' . substr($cleanNumber, 5, 3) . ' ' . substr($cleanNumber, 8);
    } elseif (strlen($cleanNumber) == 12 && substr($cleanNumber, 0, 2) == "44") { // UK international format
        return '+44 ' . substr($cleanNumber, 2, 4) . ' ' . substr($cleanNumber, 6, 3) . ' ' . substr($cleanNumber, 9);
    }

    return $number; // Return as-is if no formatting match
}
