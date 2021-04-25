<?php

namespace CatalystQuiz;

require_once './classes/Directory.php';

/**
 * Example: Print names of all nodes in the current directory tree.
 */

// Set filesystem root directory
$filesystem = new Directory(__DIR__);

// Iterate through all nodes
foreach ($filesystem->get_all_nodes() as $node) {
  // Print node name
  echo $node->get_name() . PHP_EOL;
}
