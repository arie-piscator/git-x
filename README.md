# Git Project API

## Description

This is a demo repository, belonging to a [blog post](https://arievisser.com/blog/binding-api-connection-interfaces-to-implementations/) I wrote, with an example of how binding interfaces to implementations in the service container can be used in Laravel when interacting with external APIs.
This project interacts with the project API from both GitHub and GitLab. 

### Features

- Binding interfaces to implementations in the `AppServiceProvider`.
- Interaction with the project API from GitHub and GitLab.
- Conversion of project data by using [DataTransferObjects](https://github.com/spatie/data-transfer-object).

## Usage

The `git/project` route shows the json result of projects from GitHub by default or GitLab. You can swap to the GitLab implementation in the `AppServiceProvider`. 

## Testing
 
 You can run the tests by executing:
 
 ```shell script
vendor/bin/phpunit
```
