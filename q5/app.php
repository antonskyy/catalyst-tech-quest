<?php

namespace CatalystQuiz;

require_once '../q2/classes/Directory.php';

// Set the 'manual' directory as filesystem root
$filesystem = new Directory(__DIR__ . DIRECTORY_SEPARATOR . 'manual');
// Ask the user for search term
$search_term = readline('Search the manual for mentions of @');

// Iterate through all nodes
foreach ($filesystem->get_all_nodes() as $node) {
  // We are only interested in files, not directories
  if ($node instanceof File) {
    // Get file contents
    $file_contents = $node->read();
    // Search file content for @ mentions (case insensitive)
    if (preg_match("/@$search_term/i", $file_contents)) {
      echo "Found @$search_term in " . $node->get_name() . PHP_EOL;
    }
  }
}
