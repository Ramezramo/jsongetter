import requests
import json
import re
import uuid
import os


links_file = 'used_links.json'


def load_links():
    if os.path.exists(links_file):
        with open(links_file, 'r', encoding='utf-8') as file:
            return json.load(file)
    return []  


def store_links(links):
    with open(links_file, 'w', encoding='utf-8') as file:
        json.dump(links, file, ensure_ascii=False, indent=4)


def generate_unique_filename():
    unique_id = uuid.uuid4()
    return f"{unique_id}.json"


used_links = load_links()

while True:
   
    url = input("Enter the API URL (or type 'exit' to quit): ")
    
    if url.lower() == 'exit':
        print("Exiting the program.")
        break

    
    if url in used_links:
        print("The link has already been used.")
        continue 

    try:
        
        response = requests.get(url)
        response.raise_for_status()  
        data = response.json() 

       
        data_with_link = {"link": url, "data": data}

       
        unique_filename = generate_unique_filename()

        
        with open(unique_filename, 'w', encoding='utf-8') as json_file:
            json.dump(data_with_link, json_file, ensure_ascii=False, indent=4)

        print(f"Data successfully saved to {unique_filename}")
        
        
        used_links.append(url)
        store_links(used_links)
    
    except requests.exceptions.RequestException as e:
        print(f"An error occurred: {e}")
