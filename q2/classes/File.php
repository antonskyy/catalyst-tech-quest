<?php

namespace CatalystQuiz;

require_once 'Node.php';

/**
 * Represents a filesystem file.
 *
 * @package CatalystQuiz
 * @author Anton Sokolovskyy
 */

class File extends Node
{

  /**
   * Constructor method.
   * 
   * @param string $path File path.
   * @return void
   */

  public function __construct(string $path)
  {
    $this->path = $path;
  }

  /**
   * Creates a new empty file defined by the object's path.
   * 
   * @return void
   */

  public function create()
  {
    $this->write();
  }

  /**
   * Deletes the file.
   * 
   * @return void
   */

  public function delete()
  {
    unlink($this->path);
  }

  /**
   * Returns file contents.
   * 
   * @return string File contents.
   */

  public function read(): string
  {
    $fh = fopen($this->path, 'r');
    $content = fread($fh, filesize($this->path));
    fclose($fh);

    return $content;
  }

  /**
   * Writes content to the file.
   * 
   * @param string $content Content to write.
   * @return void
   */

  public function write(string $content = '')
  {
    $fh = fopen($this->path, 'w');
    fwrite($fh, $content);
    fclose($fh);
  }
}
