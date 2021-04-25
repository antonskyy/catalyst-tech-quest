<?php

namespace CatalystQuiz;

/**
 * An abstract class defining properties and methods shared by files and directories.
 *
 * @package CatalystQuiz
 * @author Anton Sokolovskyy
 */

abstract class Node
{

  /**
   * Full filesystem path of the node.
   *
   * @var string
   */

  protected $path;

  /**
   * Forces subclasses to implement create() method.
   * 
   * @return void
   */

  abstract public function create();

  /**
   * Forces subclasses to implement delete() method.
   * 
   * @return void
   */

  abstract public function delete();

  /**
   * Renames the node.
   *
   * @param string $new_name New node name.
   * @return void
   */

  public function rename(string $new_name): void
  {
    $new_path = pathinfo($this->path)['dirname'] . DIRECTORY_SEPARATOR . $new_name;
    rename($this->path, $new_path);
    $this->path = $new_path;
  }

  /**
   * Moves the node to a different directory.
   *
   * @param string $destination Destination directory.
   * @return void
   */

  public function move(string $destination)
  {
    $new_path = $destination . DIRECTORY_SEPARATOR . $this->get_name();
    rename($this->path, $new_path);
    $this->path = $new_path;
  }

  /**
   * Returns node's file path.
   *
   * @return string Node file path.
   */

  public function get_path(): string
  {
    return $this->path;
  }

  /**
   * Returns node name - i.e. file name or directory name.
   *
   * @return string Node name.
   */

  public function get_name(): string
  {
    return pathinfo($this->path)['basename'];
  }
}
