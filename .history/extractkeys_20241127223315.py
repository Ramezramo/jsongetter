import json
import os

def extract_top_level_keys_with_types(json_data):
    """Extract top-level keys and generate Laravel migration columns."""
    columns = []
    fillable_attributes = []
    if isinstance(json_data, dict):
        for key, value in json_data.items():
            laravel_type = map_type_to_laravel(type(value).__name__)
            columns.append(f"            $table->{laravel_type}('{key}');")
            fillable_attributes.append(f"'{key}'")
    elif isinstance(json_data, list) and json_data:
        return extract_top_level_keys_with_types(json_data[0])
    return columns, fillable_attributes

def map_type_to_laravel(python_type):
    """Map Python types to Laravel migration types."""
    type_mapping = {
        "int": "integer",
        "float": "float",
        "str": "string",
        "bool": "boolean",
        "dict": "json",
        "list": "json",
        "NoneType": "nullable"
    }
    return type_mapping.get(python_type, "string")

def write_laravel_migration(table_name, columns):
    """Generate the Laravel migration file."""
    migration_filename = f"create_{table_name}_table.php"
    with open(migration_filename, 'w', encoding='utf-8') as file:
        file.write("<?php\n\n")
        file.write("use Illuminate\\Database\\Migrations\\Migration;\n")
        file.write("use Illuminate\\Database\\Schema\\Blueprint;\n")
        file.write("use Illuminate\\Support\\Facades\\Schema;\n\n")
        file.write(f"class Create{table_name.capitalize()}Table extends Migration\n")
        file.write("{\n")
        file.write("    public function up()\n")
        file.write("    {\n")
        file.write(f"        Schema::create('{table_name}', function (Blueprint $table) {{\n")
        file.write("            $table->id();\n")
        for column in columns:
            file.write(f"{column}\n")
        file.write("            $table->timestamps();\n")
        file.write("        });\n")
        file.write("    }\n\n")
        file.write("    public function down()\n")
        file.write("    {\n")
        file.write(f"        Schema::dropIfExists('{table_name}');\n")
        file.write("    }\n")
        file.write("}\n")

    print(f"Migration file '{migration_filename}' created successfully.")

def write_laravel_model(table_name, fillable_attributes):
    """Generate the Laravel model file."""
    model_name = table_name.capitalize()
    model_filename = f"{model_name}.php"
    fillable_string = ",\n        ".join(fillable_attributes)
    
    with open(model_filename, 'w', encoding='utf-8') as file:
        file.write("<?php\n\n")
        file.write("namespace App\\Models;\n\n")
        file.write("use Illuminate\\Database\\Eloquent\\Factories\\HasFactory;\n")
        file.write("use Illuminate\\Database\\Eloquent\\Model;\n\n")
        file.write(f"class {model_name} extends Model\n")
        file.write("{\n")
        file.write("    use HasFactory;\n")
        file.write(f"    protected $fillable = [\n        {fillable_string}\n    ];\n")
        file.write("}\n")

    print(f"Model file '{model_filename}' created successfully.")

def write_laravel_controller(table_name, fillable_attributes):
    """Generate the Laravel controller file."""
    controller_name = f"{table_name.capitalize()}Controller"
    controller_filename = f"{controller_name}.php"
    model_name = table_name.capitalize()
    
    # Generate controller methods for CRUD operations (index, store, show, update, destroy)
    controller_methods = [
        ("index", f"        return response()->json({model_name}::all());"),
        ("store", f"        $validated = $request->validate([\n            {',\n            '.join([f'\'{attr}\'=>\'required\'' for attr in fillable_attributes])}\n        ]);\n        return {model_name}::create($validated);"),
        ("show", f"""        return response()->json({model_name}::find($id));"),
        ("update", f"        $validated = $request->validate([\n            {',\n            '.join([f'\'{attr}\'=>\'required\'' for attr in fillable_attributes])}\n        ]);\n        $item = {model_name}::find($id);\n        $item->update($validated);\n        return response()->json($item);"),
        ("destroy", f"        $item = {model_name}::find($id);\n        $item->delete();\n        return response()->json(null, 204);")
    ]
    
    with open(controller_filename, 'w', encoding='utf-8') as file:
        file.write("<?php\n\n")
        file.write("namespace App\\Http\\Controllers;\n\n")
        file.write(f"use App\\Models\\{model_name};\n")
        file.write("use Illuminate\\Http\\Request;\n\n")
        file.write(f"class {controller_name} extends Controller\n")
        file.write("{\n")
        
        for method, body in controller_methods:
            file.write(f"    public function {method}(Request $request, $id = null)\n")
            file.write("    {\n")
            file.write(f"        {body}\n")
            file.write("    }\n\n")
        
        file.write("}\n")

    print(f"Controller file '{controller_filename}' created successfully.")

# Load JSON data
filename = "file_2.json"  # Replace with your actual filename
with open(filename, 'r', encoding='utf-8') as json_file:
    data = json.load(json_file)

# Extract top-level keys and generate columns for the migration and fillable attributes
columns, fillable_attributes = extract_top_level_keys_with_types(data)

# Define table name and write migration, model, and controller
table_name = os.path.splitext(os.path.basename(filename))[0].replace("-", "_")
write_laravel_migration(table_name, columns)
write_laravel_model(table_name, fillable_attributes)
write_laravel_controller(table_name, fillable_attributes)









