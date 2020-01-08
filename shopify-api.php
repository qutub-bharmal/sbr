<?php
/**
 * 
 */
class Shopify_API {
    private $shopify_url, $shopify_token;
    
    public function __construct() {
        $this->shopify_url = "https://spbapi.myshopify.com/admin/api/2019-07/graphql.json";
        $this->shopify_token = "c0b1f4e639ab0cc2cedd8367ec9b3aa6";
    }
    
    function call($query, $json = false) {
        $json = ($json) ? 'json' : 'graphql';

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->shopify_url,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POSTFIELDS => $query,
            CURLOPT_HTTPHEADER => array(
                "X-Shopify-Access-Token: ".$this->shopify_token,
                "Content-Type: application/".$json )
        ));
        
        return$response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if( $error ) {
            return "errors";
        } else {
            $response = json_decode($response, true);

            if (isset($response['errors'])) {
                return $response['errors'];
            }
            return $response;
        }
    }

    /**
     * 
     */
    function create_product() {
		$query = [];

		$query['operationName'] = 'CreateProduct';
		$query['variables']['media'] = NULL;
		$query['variables']['product'] = [
			'title' => "sadsad"
		];

		$query['query'] = 'mutation CreateProduct($product: ProductInput!, $media: [CreateMediaInput!]) {
			productCreate(input: $product, media: $media) {
				product {
					id
					title
					handle
					descriptionHtml
					firstVariant: variants(first: 1) {
						edges {
							node {
								id
								requiresShipping
								weight
								weightUnit
								barcode
								sku
								inventoryPolicy
								fulfillmentService {
									id
								}
								inventoryItem {
									id
									unitCost {
										amount
									}
									countryCodeOfOrigin
									provinceCodeOfOrigin
									harmonizedSystemCode
									tracked
								}
								...PricingCardVariant
							}
						}
					}
				}
				userErrors {
					field
					message
				}
			}
		}
		fragment PricingCardVariant on ProductVariant {
			id
			price
			compareAtPrice
			taxable
			taxCode
			presentmentPrices(first: 2) {
				edges {
					node {
						price {
							amount
						}
					}
				}
			}
			showUnitPrice
			unitPriceMeasurement {
				quantityValue
				quantityUnit
				referenceValue
				referenceUnit
			}
		}';

		return $result = $this->call( json_encode($query), true );
	}
}