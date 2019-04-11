# Changelog

## 1.0.0 - 2019-04-11

- Major overhauled of the `Base Repository` class
- Add **Route Model Binding** to the Repository for faster data query
- Add `before` hook to add query scope

### UPGRADE

```diff
- use PPSpaces\Repositories\Model as Repository;
+ use PPSpaces\Repositories\Repository;
```

### DEPRECIATED

- Drop the use of injecting **Model** from the `__construct`
- repository.model.stub: `all` method will not be part of the generated Repository class

## 0.0.9 - 2019-03-27

- Add `CHANGELOG.md`, It's better to have this

## 0.0.8 - 2019-03-27

- Add `destroy` method to base repository model and stub

### FIXED

- Update `repository.model.stub` protected variable
- Rename base repository protected variable

## 0.0.7 - 2019-03-27

- Add GitHub auto generated page
- Add `CONTRIBUTING.md` document

### FIXED

- Fix base repository model, instance variable naming

## 0.0.6 - 2019-03-26

- Improve `README.md`, make it consistance with generated repository
- `repository.model.stub`, Update model attribute name annotation

## 0.0.5 - 2019-03-26

- `repository.model.stub`, Update model attribute name annotation

## 0.0.4 - 2019-03-26

### FIXED

- `repository.model.stub`, What is `$ths`? Oops! change it to `$this`

## 0.0.3 - 2019-03-26

- Add use case diagram to `README.md`
- Package require Laravel 5.3 -> 5.8 to be installed

### FIXED

- `repository.model.stub`, constructor not inject `DummyModelClass` and `$DummyModelVariable`

## 0.0.2 - 2019-03-26

- Update package descriptions.
- Change package license from **The Unlicense** to **MIT**.

## 0.0.1 - 2019-03-26

- A working concept of **Repository Design Pattern**

### Added

- Everything, initial release
