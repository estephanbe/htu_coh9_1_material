# TODO LIST API

Response schema: JSON Object {
"success": boolean,
"message_code": string,
"body": Array
}

GET /items

- Fetches all checklist items
- Request Arguments: None
- Return: JSON Object {
  "success": boolean,
  "message_code": string,
  "body": Array
  }
- 404 will be returned if no item was found
