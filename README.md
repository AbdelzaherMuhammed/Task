
# Core Experts task

This repository contains a Lavavel project to implement task assignment.

## Project content

- I have made the task in 2 different ways ways.

- The first way is by doing only one filter every single time.
- while the other is by doing multiple filters at one time  
## Usage/Examples

- The link to the first way of the task is here:

```javascript
    /task
```

- The link to the second way of the task is here:

```javascript
    /simple-task
```


## API Reference

#### Get all items

- The API I used was GitHub repositories endpoint

```http
  GET /api.github.com/search/repositories
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `created` | `date` | **optional**. the sorting date of repositories |
| `language` | `string` | **optional**. the language we want to search |
| `per_page` | `string` | **optional**. numper of repositories  per page|
#### Get repositories

- In addition to the sort of stars.


## Documentation

- The first solution will be in the controllers folder called the First solution, this solution implements the logic in the App\Filters directory.

- The second solution will be in the controllers folder called the Second solution, it is more simple than the first, it implements the logic in the App\Services directory.


## Unit test

#### I've implemented 2 unit tests for both solutions with all use cases.

- The first is called FirstSolutionTest.php it tests all scenarios of the first solution.

 - The Second is called SecondSolutionTest.php it tests all scenarios of the second solution.



## Running Tests

To run tests, run the following command

```bash
  php artisan test
```

