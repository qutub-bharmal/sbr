<?php

$shopifyResponse = '{
  "id": 1906264834093,
  "email": "testdev301@gmail.com",
  "closed_at": "2019-12-11T05:01:24-05:00",
  "created_at": "2019-12-11T03:24:58-05:00",
  "updated_at": "2019-12-11T05:01:24-05:00",
  "number": 18,
  "note": null,
  "token": "14891dc7a9fee05f0175810a23d58bc5",
  "gateway": "bogus",
  "test": true,
  "total_price": "10.43",
  "subtotal_price": "10.00",
  "total_weight": 0,
  "total_tax": "0.00",
  "taxes_included": false,
  "currency": "INR",
  "financial_status": "paid",
  "confirmed": true,
  "total_discounts": "0.00",
  "total_line_items_price": "10.00",
  "cart_token": "",
  "buyer_accepts_marketing": false,
  "name": "#1018",
  "referring_site": "https://spbapi.myshopify.com/collections/frontpage/products/product-1",
  "landing_site": "/wallets/checkouts.json",
  "cancelled_at": null,
  "cancel_reason": null,
  "total_price_usd": "0.42",
  "checkout_token": "c7dfe7f942b3ae9db33cd7058a5a307c",
  "reference": null,
  "user_id": null,
  "location_id": null,
  "source_identifier": null,
  "source_url": null,
  "processed_at": "2019-12-11T03:24:58-05:00",
  "device_id": null,
  "phone": null,
  "customer_locale": "en",
  "app_id": 580111,
  "browser_ip": "123.201.19.193",
  "landing_site_ref": null,
  "order_number": 1018,
  "discount_applications": [],
  "discount_codes": [],
  "note_attributes": [],
  "payment_gateway_names": [
    "bogus"
  ],
  "processing_method": "direct",
  "checkout_id": 11938062729261,
  "source_name": "web",
  "fulfillment_status": "fulfilled",
  "tax_lines": [],
  "tags": "",
  "contact_email": "testdev301@gmail.com",
  "order_status_url": "https://spbapi.myshopify.com/27784577069/orders/14891dc7a9fee05f0175810a23d58bc5/authenticate?key=84dcbbd20e366c116c865073a7a81673",
  "presentment_currency": "INR",
  "total_line_items_price_set": {
    "shop_money": {
      "amount": "10.00",
      "currency_code": "INR"
    },
    "presentment_money": {
      "amount": "10.00",
      "currency_code": "INR"
    }
  },
  "total_discounts_set": {
    "shop_money": {
      "amount": "0.00",
      "currency_code": "INR"
    },
    "presentment_money": {
      "amount": "0.00",
      "currency_code": "INR"
    }
  },
  "total_shipping_price_set": {
    "shop_money": {
      "amount": "20.00",
      "currency_code": "INR"
    },
    "presentment_money": {
      "amount": "20.00",
      "currency_code": "INR"
    }
  },
  "subtotal_price_set": {
    "shop_money": {
      "amount": "10.00",
      "currency_code": "INR"
    },
    "presentment_money": {
      "amount": "10.00",
      "currency_code": "INR"
    }
  },
  "total_price_set": {
    "shop_money": {
      "amount": "30.00",
      "currency_code": "INR"
    },
    "presentment_money": {
      "amount": "30.00",
      "currency_code": "INR"
    }
  },
  "total_tax_set": {
    "shop_money": {
      "amount": "0.00",
      "currency_code": "INR"
    },
    "presentment_money": {
      "amount": "0.00",
      "currency_code": "INR"
    }
  },
  "line_items": [
    {
      "id": 4241336959021,
      "variant_id": 31419587002413,
      "title": "Product 1",
      "quantity": 1,
      "sku": "001010596-BL-M",
      "variant_title": "black / small",
      "vendor": "spbapi",
      "fulfillment_service": "manual",
      "product_id": 4401314496557,
      "requires_shipping": true,
      "taxable": true,
      "gift_card": false,
      "name": "Product 1 - black / small",
      "variant_inventory_management": "shopify",
      "properties": [],
      "product_exists": true,
      "fulfillable_quantity": 0,
      "grams": 0,
      "price": "10.00",
      "total_discount": "0.00",
      "fulfillment_status": "fulfilled",
      "price_set": {
        "shop_money": {
          "amount": "10.00",
          "currency_code": "INR"
        },
        "presentment_money": {
          "amount": "10.00",
          "currency_code": "INR"
        }
      },
      "total_discount_set": {
        "shop_money": {
          "amount": "0.00",
          "currency_code": "INR"
        },
        "presentment_money": {
          "amount": "0.00",
          "currency_code": "INR"
        }
      },
      "discount_allocations": [],
      "admin_graphql_api_id": "gid://shopify/LineItem/4241336959021",
      "tax_lines": [],
      "origin_location": {
        "id": 1680707026989,
        "country_code": "US",
        "province_code": "MA",
        "name": "spbapi",
        "address1": "Newbury Street",
        "address2": "",
        "city": "Boston",
        "zip": "02116"
      }
    }
  ],
  "fulfillments": [
    {
      "id": 1799210598445,
      "order_id": 1906264834093,
      "status": "success",
      "created_at": "2019-12-11T05:01:23-05:00",
      "service": "manual",
      "updated_at": "2019-12-11T05:01:23-05:00",
      "tracking_company": "Other",
      "shipment_status": null,
      "location_id": 35666985005,
      "line_items": [
        {
          "id": 4241336959021,
          "variant_id": 31419587002413,
          "title": "Product 1",
          "quantity": 1,
          "sku": "001010596-BL-S",
          "variant_title": "black / small",
          "vendor": "spbapi",
          "fulfillment_service": "manual",
          "product_id": 4401314496557,
          "requires_shipping": true,
          "taxable": true,
          "gift_card": false,
          "name": "Product 1 - black / small",
          "variant_inventory_management": "shopify",
          "properties": [],
          "product_exists": true,
          "fulfillable_quantity": 0,
          "grams": 0,
          "price": "10.00",
          "total_discount": "0.00",
          "fulfillment_status": "fulfilled",
          "price_set": {
            "shop_money": {
              "amount": "10.00",
              "currency_code": "INR"
            },
            "presentment_money": {
              "amount": "10.00",
              "currency_code": "INR"
            }
          },
          "total_discount_set": {
            "shop_money": {
              "amount": "0.00",
              "currency_code": "INR"
            },
            "presentment_money": {
              "amount": "0.00",
              "currency_code": "INR"
            }
          },
          "discount_allocations": [],
          "admin_graphql_api_id": "gid://shopify/LineItem/4241336959021",
          "tax_lines": [],
          "origin_location": {
            "id": 1680707026989,
            "country_code": "US",
            "province_code": "MA",
            "name": "spbapi",
            "address1": "Newbury Street",
            "address2": "",
            "city": "Boston",
            "zip": "02116"
          }
        }
      ],
      "tracking_number": "tetst",
      "tracking_numbers": [
        "tetst"
      ],
      "tracking_url": null,
      "tracking_urls": [],
      "receipt": {},
      "name": "#1018.1",
      "admin_graphql_api_id": "gid://shopify/Fulfillment/1799210598445"
    }
  ],
  "refunds": [],
  "total_tip_received": "0.0",
  "admin_graphql_api_id": "gid://shopify/Order/1906264834093",
  "shipping_lines": [
    {
      "id": 1573730451501,
      "title": "Standard",
      "price": "20.00",
      "code": "Standard",
      "source": "shopify",
      "phone": null,
      "requested_fulfillment_service_id": null,
      "delivery_category": null,
      "carrier_identifier": null,
      "discounted_price": "20.00",
      "price_set": {
        "shop_money": {
          "amount": "20.00",
          "currency_code": "INR"
        },
        "presentment_money": {
          "amount": "20.00",
          "currency_code": "INR"
        }
      },
      "discounted_price_set": {
        "shop_money": {
          "amount": "20.00",
          "currency_code": "INR"
        },
        "presentment_money": {
          "amount": "20.00",
          "currency_code": "INR"
        }
      },
      "discount_allocations": [],
      "tax_lines": []
    }
  ],
  "billing_address": {
    "first_name": "test",
    "address1": "Lorem ipsum",
    "phone": null,
    "city": "rajkot",
    "zip": "30363",
    "province": "Georgia",
    "country": "United States",
    "last_name": "dev",
    "address2": "",
    "company": null,
    "latitude": 33.7910495,
    "longitude": -84.400194,
    "name": "test dev",
    "country_code": "US",
    "province_code": "GA"
  },
  "shipping_address": {
    "first_name": "test",
    "address1": "Lorem ipsum",
    "phone": null,
    "city": "rajkot",
    "zip": "30363",
    "province": "Georgia",
    "country": "United States",
    "last_name": "dev",
    "address2": "",
    "company": null,
    "latitude": 33.7910495,
    "longitude": -84.400194,
    "name": "test dev",
    "country_code": "US",
    "province_code": "GA"
  },
  "client_details": {
    "browser_ip": "123.201.19.193",
    "accept_language": "en-US,en;q=0.9",
    "user_agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36",
    "session_hash": null,
    "browser_width": 1583,
    "browser_height": 789
  },
  "payment_details": {
    "credit_card_bin": "1",
    "avs_result_code": null,
    "cvv_result_code": null,
    "credit_card_number": "•••• •••• •••• 1",
    "credit_card_company": "Bogus"
  },
  "customer": {
    "id": 2754666922029,
    "email": "testdev301@gmail.com",
    "accepts_marketing": false,
    "created_at": "2019-12-09T01:36:47-05:00",
    "updated_at": "2019-12-11T03:27:07-05:00",
    "first_name": "test",
    "last_name": "dev",
    "orders_count": 0,
    "state": "disabled",
    "total_spent": "0.00",
    "last_order_id": null,
    "note": null,
    "verified_email": true,
    "multipass_identifier": null,
    "tax_exempt": false,
    "phone": null,
    "tags": "",
    "last_order_name": null,
    "currency": "INR",
    "accepts_marketing_updated_at": "2019-12-09T01:36:47-05:00",
    "marketing_opt_in_level": null,
    "admin_graphql_api_id": "gid://shopify/Customer/2754666922029",
    "default_address": {
      "id": 2939258961965,
      "customer_id": 2754666922029,
      "first_name": "test",
      "last_name": "dev",
      "company": null,
      "address1": "Lorem ipsum",
      "address2": "",
      "city": "rajkot",
      "province": "Georgia",
      "country": "United States",
      "zip": "30363",
      "phone": null,
      "name": "test dev",
      "province_code": "GA",
      "country_code": "US",
      "country_name": "United States",
      "default": true
    }
  }
}';