<?php
 // Function responsible for downloading the radio playlist
    $playlist = 'playlist.pls';
    // Delete the previous playlist, if it exists
    if (file_exists($playlist)) {
      unlink($playlist);
    }
    // URL of the IFMT Web Radio playlist
    $playlist_url = 'https://player.hdradios.net/player/6990';
    file_put_contents($playlist, file_get_contents($playlist_url));
  
  ?>
  <!DOCTYPE html>
<html>
<head>
</head>
<body>
    <audio controls src="http://sv13.hdradios.net:6990;&type=mp3"></audio>
</body>
</html>