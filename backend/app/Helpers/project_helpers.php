<?php

if (!function_exists('getStatusBadge')) {
    function getStatusBadge($status) {
        $color = 'bg-gray-100 text-gray-600';
        $text = 'Tidak Diketahui';
        if ($status) {
            if ($status === 'ongoing') {
                $color = 'bg-green-100 text-green-600';
                $text = 'Berlangsung';
            } elseif ($status === 'pending') {
                $color = 'bg-yellow-100 text-yellow-600';
                $text = 'Menunggu Persetujuan';
            } elseif ($status === 'completed') {
                $color = 'bg-blue-100 text-blue-600';
                $text = 'Selesai';
            }
        }
        return "<span class='px-2 py-1 rounded-full $color text-xs'>$text</span>";
    }
}

if (!function_exists('getThumbnailIcon')) {
    function getThumbnailIcon($category) {
        if (!$category) return 'fas fa-question';
        if (str_contains(strtolower($category), 'development')) return 'fas fa-code';
        if (str_contains(strtolower($category), 'design')) return 'fas fa-paint-brush';
        if (str_contains(strtolower($category), 'research')) return 'fas fa-book';
        if (str_contains(strtolower($category), 'marketing')) return 'fas fa-bullhorn';
        return 'fas fa-question';
    }
}