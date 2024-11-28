import requests
import json
import uuid
import os
import pyperclip
import time

links_file = 'used_links.json'
db_file = 'db.json'
mylinks_file = 'mylinks.json'
makelaravelconfigration = True
# this python script for getting api data and store it in a json file
def load_links():
    if os.path.exists(links_file):
        with open(links_file, 'r', encoding='utf-8') as file:
            return json.load(file)
    return []


def store_links(links):
    with open(links_file, 'w', encoding='utf-8') as file:
        json.dump(links, file, ensure_ascii=False, indent=4)


def load_db():
    if os.path.exists(db_file):
        with open(db_file, 'r', encoding='utf-8') as file:
            return json.load(file)
    return {"last_file_number": 0}


def update_db(db):
    with open(db_file, 'w', encoding='utf-8') as file:
        json.dump(db, file, ensure_ascii=False, indent=4)


def generate_unique_filename(db):
    db['last_file_number'] += 1
    update_db(db)
    return f"file_{db['last_file_number']}.json"

used_links = load_links()
db = load_db()
last_clipboard_content = ""  

def process_url(url):
    if url in used_links:
        print("The link has already been used.")
        return

    try:
        response = requests.get(url)
        response.raise_for_status()
        data = response.json()

        data_with_link = {"link": url, "data": data}
        unique_filename = generate_unique_filename(db)

        with open(unique_filename, 'w', encoding='utf-8') as json_file:
            json.dump(data_with_link, json_file, ensure_ascii=False, indent=4)
            if 

        print(f"Data successfully saved to {unique_filename}")

        used_links.append(url)
        store_links(used_links)

    except requests.exceptions.RequestException as e:
        print(f"An error occurred: {e}")
    except json.JSONDecodeError:
        print("Failed to parse JSON response.")

def listen_to_clipboard():
    global last_clipboard_content
    print("Listening to clipboard for URLs. Press Ctrl+C to stop.")
    try:
        while True:
            clipboard_content = pyperclip.paste().strip()
            if clipboard_content != last_clipboard_content and clipboard_content.startswith("http"):
                last_clipboard_content = clipboard_content
                print(f"Detected URL from clipboard: {clipboard_content}")
                process_url(clipboard_content)
            time.sleep(1)
    except KeyboardInterrupt:
        print("\nStopped clipboard listening.")

def process_stored_links():
    if os.path.exists(mylinks_file):
        with open(mylinks_file, 'r', encoding='utf-8') as file:
            links = json.load(file)
        for url in links:
            print(f"Processing URL: {url}")
            process_url(url)
    else:
        print(f"{mylinks_file} not found. Please ensure the file exists.")

while True:
    user_input = input("Enter the API URL (or type 'clip' to listen to the clipboard, 'stored' to use stored links, 'exit' to quit): ").strip()
    if user_input.lower() == 'exit':
        print("Exiting the program.")
        break
    elif user_input.lower() == 'clip':
        listen_to_clipboard()
    elif user_input.lower() == 'stored':
        process_stored_links()
    else:
        process_url(user_input)
