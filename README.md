# Auction App

```
model Auction {
    id
    product_name
    product_details
    base_amount
    sold_for
    status enum(not_sold, sold)
    timestamps
}
```

```
model Bid {
    id
    auction_id FK (relates to Auction model)
    amount
    status enum(pending, confirmed)
    timestamps
}
```
