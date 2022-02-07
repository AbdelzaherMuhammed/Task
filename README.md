
# Core Experts task

This repository contains a Lavavel project to implement task assignment.

## Project content

- I have made the task in 2 different ways ways.

- The first way is by doing only one filter every single time.
- while the other is by doing multiple filters at one time  
## Usage/Examples

-The link to the first way of the task is here:

```javascript
    /task
```

-The link to the second way of the task is here:

```javascript
    /simple-task
```


## API Reference

#### Get all items

- The API I used was GitHub repositories endpoint

```http
  GET /github.com/search/repositoriesq=created:>2022-02-08+language=c#&sort=stars&order=desc
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `created` | `date` | **optional**. the sorting date of repositories |
| `language` | `string` | **optional**. the language we want to search |
| `per_page` | `string` | **optional**. numper of repositories  per page|
#### Get repositories

- In addition to the sort of stars.

