<?php
use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;

class PlancakeEmailParserTest extends TestCase
{

    public function testSubject()
    {
        foreach (glob(__DIR__ . '/emails/*.txt') as $testFile) {

            $answerFile = str_replace('.txt', '.yml', $testFile);
            $answers = Yaml::parse(
                file_get_contents($answerFile)
            );

            $email = new PlancakeEmailParser(file_get_contents($testFile));

            $this->assertEquals($answers['subject'], $email->getSubject());
        }
    }

    public function testFrom()
    {
        foreach (glob(__DIR__ . '/emails/*.txt') as $testFile) {

            $answerFile = str_replace('.txt', '.yml', $testFile);
            $answers = Yaml::parse(
                file_get_contents($answerFile)
            );

            $email = new PlancakeEmailParser(file_get_contents($testFile));

            $this->assertEquals($answers['from'], $email->getFrom());
        }
    }

    public function testTo()
    {
        foreach (glob(__DIR__ . '/emails/*.txt') as $testFile) {

            $answerFile = str_replace('.txt', '.yml', $testFile);
            $answers = Yaml::parse(
                file_get_contents($answerFile)
            );

            $email = new PlancakeEmailParser(file_get_contents($testFile));

            $this->assertEquals($answers['to'], $email->getTo());
        }
    }

    public function testCc()
    {
        foreach (glob(__DIR__ . '/emails/*.txt') as $testFile) {

            $answerFile = str_replace('.txt', '.yml', $testFile);
            $answers = Yaml::parse(
                file_get_contents($answerFile)
            );

            $email = new PlancakeEmailParser(file_get_contents($testFile));

            $this->assertEquals($answers['cc'], $email->getCc());
        }
    }

    public function testBcc()
    {
        foreach (glob(__DIR__ . '/emails/*.txt') as $testFile) {

            $answerFile = str_replace('.txt', '.yml', $testFile);
            $answers = Yaml::parse(
                file_get_contents($answerFile)
            );

            $email = new PlancakeEmailParser(file_get_contents($testFile));

            $this->assertEquals($answers['bcc'], $email->getBcc());
        }
    }

    public function testSender()
    {
        foreach (glob(__DIR__ . '/emails/*.txt') as $testFile) {

            $answerFile = str_replace('.txt', '.yml', $testFile);
            $answers = Yaml::parse(
                file_get_contents($answerFile)
            );

            $email = new PlancakeEmailParser(file_get_contents($testFile));

            $this->assertEquals($answers['sender'], $email->getSender());
        }
    }

    public function testPlainBody()
    {
        foreach (glob(__DIR__ . '/emails/*.txt') as $testFile) {

            $answerFile = str_replace('.txt', '.yml', $testFile);
            $answers = Yaml::parse(
                file_get_contents($answerFile)
            );

            $email = new PlancakeEmailParser(file_get_contents($testFile));

            $this->assertEquals($answers['plainbody'], $email->getPlainBody());
        }
    }
}
