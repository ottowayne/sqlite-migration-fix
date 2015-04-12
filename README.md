# Laravel SQLite Migration Fix

This will fix the SQLite error *Cannot add a NOT NULL column with default value NULL* by making all columns nullable in testing environments.

**Please note that this changes the behaviour of your app and thus may alter your test results.**

## Compatibility

* Laravel 5.0

## Installation

To install via composer add the following line to your composer.json:

```
"ottowayne/sqlite-migration-fix": "dev-master"
```

I recommend using this package in local environments (require-dev) only.

Finally add the service provider to your app.php:

```
'Ottowayne\SQLiteMigrationFix\DatabaseServiceProvider',
```

## Usage

After adding the service provider you are done. The changes will only apply to the *testing*-environment.
