<?php
/**
 * Created by PhpStorm.
 * User: johnpaulgabule
 * Date: 2/9/2018
 * Time: 9:32 PM
 */

/**
 * Redirects to a specified location.
 *
 * @param string $location The URL to redirect to.
 */
function redirect_to($location) {
    if (!headers_sent()) {
        header("Location: {$location}");
        exit;
    }
}

/**
 * Cleans a string by removing HTML tags, trimming whitespace, and encoding special characters.
 *
 * @param string $string The string to clean.
 * @return string The cleaned string.
 */
function clean($string) {
    return htmlentities(strip_tags(trim($string)), ENT_QUOTES, 'UTF-8');
}

/**
 * Returns a human-readable time difference between the current time and the given date.
 *
 * @param string $datetime The date/time to compare to.
 * @param bool $full Whether to show full details (e.g., months, days) or just the first difference.
 * @return string The formatted time difference.
 */
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime();
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->m = floor($diff->d / 7); // weeks
    $diff->d -= $diff->m * 7; // remaining days

    $strings = [
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    ];

    foreach ($strings as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : ''); // pluralize if necessary
        } else {
            unset($strings[$k]);
        }
    }

    if (!$full) {
        $strings = array_slice($strings, 0, 1); // Return only the most recent difference
    }

    return $strings ? implode(', ', $strings) . ' ago' : 'just now';
}

/**
 * Trims a string to a specified length, breaking at word boundaries and appending an ellipsis.
 *
 * @param string $text The text to trim.
 * @param int $max_length The maximum length of the text.
 * @param string $tail The string to append (default is '...').
 * @return string The trimmed text with an optional tail.
 */
function trim_body($text, $max_length = 30, $tail = '...') {
    $tail_len = strlen($tail);

    if (strlen($text) > $max_length) {
        $tmp_text = substr($text, 0, $max_length - $tail_len);

        // If the cut point is not in the middle of a word
        if (substr($text, $max_length - $tail_len, 1) == ' ') {
            $text = $tmp_text;
        } else {
            $pos = strrpos($tmp_text, ' '); // find last space before the cut
            $text = substr($text, 0, $pos);
        }

        $text .= $tail;
    }

    return $text;
}

/**
 * Formats a size in bytes to a human-readable format (e.g., KB, MB, GB).
 *
 * @param int $size The size in bytes.
 * @param int $precision The number of decimal places to round to.
 * @return string The formatted size.
 */
function formatBytes($size, $precision = 2) {
    if ($size == 0) return '0 Bytes';

    $base = log($size, 1024);
    $suffixes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB'];

    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}
?>
