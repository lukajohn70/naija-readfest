<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');

// YouTube Channel ID
$channelId = 'UCMvu90Ta4DYCAUXFmPfadAQ';

function checkLivestreamStatus($channelId) {
    // Method 1: Try to get live stream info using YouTube's oEmbed
    $oembedUrl = "https://www.youtube.com/oembed?url=https://www.youtube.com/channel/{$channelId}/live&format=json";
    
    $context = stream_context_create([
        'http' => [
            'timeout' => 10,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
        ]
    ]);
    
    $response = @file_get_contents($oembedUrl, false, $context);
    
    if ($response !== false) {
        $data = json_decode($response, true);
        if ($data && isset($data['title'])) {
            // If oEmbed works, there's likely a live stream
            return [
                'status' => 'live',
                'embed_url' => "https://www.youtube.com/embed/live_stream?channel={$channelId}&autoplay=1&mute=0&controls=1&rel=0&modestbranding=1&enablejsapi=1",
                'title' => $data['title'],
                'message' => 'Live stream detected'
            ];
        }
    }
    
    // Method 2: Try to access the live page directly
    $livePageUrl = "https://www.youtube.com/channel/{$channelId}/live";
    
    $context = stream_context_create([
        'http' => [
            'timeout' => 10,
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
        ]
    ]);
    
    $livePageContent = @file_get_contents($livePageUrl, false, $context);
    
    if ($livePageContent !== false) {
        // Check if the page contains live stream indicators
        if (strpos($livePageContent, 'LIVE NOW') !== false || 
            strpos($livePageContent, 'live') !== false ||
            strpos($livePageContent, 'watching') !== false) {
            
            // Try to extract video ID from the page
            if (preg_match('/"videoId":"([^"]+)"/', $livePageContent, $matches)) {
                $videoId = $matches[1];
                return [
                    'status' => 'live',
                    'embed_url' => "https://www.youtube.com/embed/{$videoId}?autoplay=1&mute=0&controls=0&rel=0&modestbranding=1&showinfo=0&iv_load_policy=3&disablekb=1&fs=0&enablejsapi=1",
                    'title' => 'Live Stream',
                    'message' => 'Video ID extracted from live page'
                ];
            }
            
            // If no video ID found, try using the channel's live tab
            return [
                'status' => 'live',
                'embed_url' => "https://www.youtube.com/embed/live_stream?channel={$channelId}&autoplay=1&mute=0&controls=0&rel=0&modestbranding=1&showinfo=0&iv_load_policy=3&disablekb=1&fs=0&enablejsapi=1",
                'title' => 'Live Stream',
                'message' => 'Live stream detected via page analysis'
            ];
        }
    }
    
    // Method 3: Try using the channel's live tab directly
    return [
        'status' => 'offline',
        'embed_url' => "https://www.youtube.com/embed/live_stream?channel={$channelId}&autoplay=1&mute=0&controls=0&rel=0&modestbranding=1&showinfo=0&iv_load_policy=3&disablekb=1&fs=0&enablejsapi=1",
        'title' => 'Channel',
        'message' => 'No live stream detected, showing channel'
    ];
}

// Check livestream status
$result = checkLivestreamStatus($channelId);

// Add timestamp
$result['timestamp'] = date('Y-m-d H:i:s');
$result['channel_id'] = $channelId;

echo json_encode($result, JSON_PRETTY_PRINT);
?>
