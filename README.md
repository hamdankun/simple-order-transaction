
# SIMPLE ORDER TRANSACTION

## Platform Requirments
- PHP VERSION >= 7.2
- Lumen Framework >= 8
- Composer >= 1.9.0

## How to setup
- Clone Repo `git clone [repostory-name]`
- composer install with run command in terminal `composer install`
- run migration and seed for create table with command in terminal `php artisan migrate --seed`
- run application with command in terminal `php -S localhost:8282 -t public/`
- open http://localhost:8282 in your broweser
- 
## API SPESIFICATION
[GET]api/v1/product/list
Query Params Request
```json
{}
```

Response
```json
{
    "status_code": 200,
    "data": [
        {
            "id": 4,
            "name": "Product A",
            "description": "Product A Description",
            "price": 10000,
            "stock": 90,
            "created_at": "2021-01-25T00:33:14.000000Z",
            "updated_at": "2021-01-25T00:52:22.000000Z"
        }
    ]
}
```

[GET]api/v1/product/detail/{productId}
Query Params Request
```json
{}
```

Response
```json
{
    "status_code": 200,
    "data": {
        "id": 4,
        "name": "Product A",
        "description": "Product A Description",
        "price": 10000,
        "stock": 90,
        "created_at": "2021-01-25T00:33:14.000000Z",
        "updated_at": "2021-01-25T00:52:22.000000Z"
    }
}
```

[POST]api/v1/customer/order/checkout

Body Request
```json
{
    "order": {
        "note": "yang bener yahh",
        "shipping_fee": 1000
    },
    "customer": {
        "name": "Hamdan Hanafi",
        "phone": "081394574122",
        "email": "hamdanhanafi90@gmail.com",
        "address": "Ciparay Tengah"
    },
    "products": [
        { "product_id": 4, "qty": 10 },
        { "product_id": 5, "qty": 10 },
        { "product_id": 6, "qty": 10 }
    ]
}
```

Response
```json
{
    "status_code": 200,
    "data": {}
}
```