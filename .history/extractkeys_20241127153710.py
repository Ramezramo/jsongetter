import json

def extract_top_level_keys(json_data):
    """
    Extract only the top-level keys from the JSON data.
    
    Args:
    - json_data (dict): JSON data from which to extract keys.
    
    Returns:
    - keys_set (set): A set of all top-level keys.
    """
    if isinstance(json_data, dict):
        return set(json_data.keys())
    elif isinstance(json_data, list):
        
        return extract_top_level_keys(json_data[0]) if json_data else set()
    else:
        return set()
def extract_top_level_keys_with_types(json_data):
    """
    Extract the top-level keys from the JSON data and print each key with its associated type.
    
    Args:
    - json_data (dict): JSON data from which to extract keys and types.
    """
    if isinstance(json_data, dict):
        for key, value in json_data.items():
            print(f"Key: {key}, Type: {type(value).__name__}")
    elif isinstance(json_data, list):
        
        if json_data:
            extract_top_level_keys_with_types(json_data[0])

filename = "https___mstore_io_wp_json_api_flutter_woo_products_video_per_page_10_page_1_currency_USD.json"  # Replace with your actual filename
with open(filename, 'r', encoding='utf-8') as json_file:
    data = json.load(json_file)


# top_level_keys = extract_top_level_keys(data)
# print("Top-level keys in the JSON file:")
# for key in sorted(top_level_keys):
#     print(key)

extract_top_level_keys_with_types(data)








