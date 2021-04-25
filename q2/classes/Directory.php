<?php

namespace CatalystQuiz;

require_once 'Node.php';
require_once 'File.php';

/**
 * Represents a filesystem directory.
 *
 * @package CatalystQuiz
 * @author Anton Sokolovskyy
 */

class Directory extends Node
{

  /**
   * A list of directory contents.
   *
   * @var array
   */

  protected $nodes = [];

  /**
   * Constructor method. Traverses directory contents and stores it as a tree-like object representation.
   * 
   * @param $path Directory path.
   * @return void
   */

  public function __construct(string $path)
  {
    $this->path = $path;

    // Scan through directory nodes
    foreach (scandir($this->path) as $node_name) {
      // Omit shortcuts
      if (!in_array($node_name, ['.', '..'])) {
        $node_path = $this->path . DIRECTORY_SEPARATOR . $node_name;
        // Add node as a directory or a file
        $this->nodes[] = (is_dir($node_path)) ? new Directory($node_path) : new File($node_path);
      }
    }
  }

  /**
   * Creates a new directory defined by the object's path.
   * 
   * @return void
   */

  public function create()
  {
    mkdir($this->path);
  }

  /**
   * Empties the directory and deletes it.
   * 
   * @return void
   */

  public function delete()
  {
    // Delete all child nodes - the directory being deleted must be empty
    foreach ($this->get_all_nodes() as $node) {
      $node->delete();
    }

    // We can now delete the directory
    rmdir($this->path);
  }

  /**
   * Returns directory's own nodes.
   * 
   * @return array Node list.
   */

  public function get_nodes(): array
  {
    return $this->nodes;
  }

  /**
   * Returns directory's child nodes.
   * 
   * @return array Node list.
   */

  public function get_child_nodes(): array
  {
    $child_nodes = [];

    // Scan through nodes
    foreach ($this->get_nodes() as $node) {
      // Directories may have child nodes
      if ($node instanceof Directory) {
        // Merge in the child nodes
        $child_nodes = array_merge($child_nodes, $node->get_all_nodes());
      }
    }

    return $child_nodes;
  }

  /**
   * Returns directory's own nodes and child nodes.
   * 
   * @return array Node list.
   */

  public function get_all_nodes(): array
  {
    return array_merge($this->get_nodes(), $this->get_child_nodes());
  }
}
