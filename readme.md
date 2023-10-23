# Commit Message Parser

This is a PHP library that provides a simple interface for parsing git commit messages according to a specific format.

## Requirements

- PHP 7.0 or higher

## Installation

1. Clone the repository or download the ZIP file.
2. Run the command `composer update` to install the required dependencies.

## Usage

```php
use CommitMessage\CommitParser;

$parser = new CommitParser();
$message = '[add] [feature] @core #123456 Integrovat Premier: export objednávek
        * Export objednávek cronem co hodinu.
        * Export probíhá v dávkách.
        * ...
        BC: Refaktorovaný BaseImporter.
        BC: ...
        Feature: Nový logger.
        TODO: Refactoring autoemail modulu';

$parsedMessage = $parse->parse($message);

        echo $parsedMessage->getTitle();
        echo $parsedMessage->getTaskId();
        var_dump($parsedMessage->getTags());
        var_dump($parsedMessage->getDetails());
        var_dump($parsedMessage->getBcBreaks());
        var_dump($parsedMessage->getTodos());
```

## Project Structure

- `src/Interface`
  - `CommitMessage.php`: Interface for the commit message.
  - `CommitMessageParser.php`: Interface for the commit message parser.
- `src/Entity`
  - `CommitMessageObject.php`: Entity class for the parsed commit message.
- `src/Service`
  - `CommitParser.php`: Service class for parsing commit messages.
- `tests/Service`
  - `CommitParserTest.php`: Unit tests for the `CommitParser` service.

## Testing

To run the tests, use the following command:

```bash
php bin/phpunit
```

## License

This library is licensed under the MIT License. See [LICENSE](LICENSE) for more information.