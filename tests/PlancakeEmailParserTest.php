<?php
declare(strict_types = 1);
use PHPUnit\Framework\TestCase;

class PlancakeEmailParserTest extends TestCase {

  public function testSubject() {
    foreach (glob(__DIR__ . '/emails/*.txt') as $testFile) {

      $answerFile = str_replace('.txt', '.yml', $testFile);
      $answers = \Symfony\Component\Yaml\Yaml::parse(
        file_get_contents($answerFile)
      );

      $email = new PlancakeEmailParser(file_get_contents($testFile));

      $this->assertEquals($answers['subject'], $email->getSubject());
    }
  }

  public function testFrom() {
    foreach (glob(__DIR__ . '/emails/*.txt') as $testFile) {

      $answerFile = str_replace('.txt', '.yml', $testFile);
      $answers = \Symfony\Component\Yaml\Yaml::parse(
        file_get_contents($answerFile)
      );

      $email = new PlancakeEmailParser(file_get_contents($testFile));

      $this->assertEquals($answers['from'], $email->getFrom());
    }
  }
}
