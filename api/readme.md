# TODO LIST API

Response schema: JSON Object {
"success": boolean,
"message_code": string,
"body": Array
}

GET /items

- Fetches all checklist items
- Request Arguments: None
- 404 will be returned if no item was found

POST /items/create

- creates new checklist item
- Request Arguments: {"name": string}
- 422 will be returned if name param was not found

PUT /items/update

- updates the todo checklist item's completion status
- Request Arguments: {"id": integer}
- 422 will be returned if id param was not found
- 404 will be retruned if no item was found

DELETE /items/delete

- deletes checklist item
- Request Arguments: {"id": integer}
- 422 will be returned if id param was not found
