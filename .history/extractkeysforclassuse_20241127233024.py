import json
import os

# to get ready to make your own api like the api you found online 
# this file uses to convert the saved json files from the filedatagetter.py and then it will 
# set the model and controller and the migration  file
class LaravelGenerator:
    def __init__(self, filename):
        self.filename = filename
        filename = filename 
    
        if os.path.exists(filename):  
            with open(filename, 'r', encoding='utf-8') as json_file:
                data = json.load(json_file)

            columns, fillable_attributes = extract_top_level_keys_with_types(data)

            table_name = os.path.splitext(os.path.basename(filename))[0].replace("-", "_")
            
            # Write migration, model, and controller for each file
            self.write_laravel_migration(table_name, columns)
            self.write_laravel_model(table_name, fillable_attributes)
            self.write_laravel_controller(table_name, fillable_attributes)
        else:
            print(f"File {filename} does not exist.")
    def extract_top_level_keys_with_types(self,json_data):
        """Extract top-level keys and generate Laravel migration columns without repeating keys."""
        columns = []
        fillable_attributes = []
        seen_keys = set()  
        
        if isinstance(json_data, dict) and "data" in json_data:
            for item in json_data["data"]:
                if isinstance(item, dict):
                    for key, value in item.items():
                        if key not in seen_keys:  
                            laravel_type = map_type_to_laravel(type(value).__name__)
                            columns.append(f"            $table->{laravel_type}('{key}');")
                            fillable_attributes.append(f"'{key}'")
                            seen_keys.add(key)  
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
        migration_filename = f"{table_name}_Migration.php"
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
        model_name = table_name
        model_filename = f"{model_name}_Model.php"
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
        controller_name = f"{table_name}_Controller"
        controller_filename = f"{controller_name}.php"
        model_name = table_name.capitalize()
        
        fillable_str = ',\n            '.join([f"{attr}=>'required'" for attr in fillable_attributes])

        controller_methods = [
            ("index", f"        return response()->json({model_name}::all());"),
            ("store", f"""        $validated = $request->validate([
                {fillable_str}
            ]);\n        return {model_name}::create($validated);"""),
            ("show", f"        return response()->json({model_name}::find($id));"),
            ("update", f"""        $validated = $request->validate([
                {fillable_str}
            ]);\n        $item = {model_name}::find($id);\n        $item->update($validated);\n        return response()->json($item);"""),
            ("destroy", f"""        $item = {model_name}::find($id);
            $item->delete();
            return response()->json(null, 204);""")
        ]

        controller_content = f"""<?php

    namespace App\Http\Controllers;

    use App\Models\{model_name};
    use Illuminate\Http\Request;

    class {controller_name} extends Controller
    {{
        public function index()
        {{
            {controller_methods[0][1]}
        }}

        public function store(Request $request)
        {{
            {controller_methods[1][1]}
        }}

        public function show($id)
        {{
            {controller_methods[2][1]}
        }}

        public function update(Request $request, $id)
        {{
            {controller_methods[3][1]}
        }}

        public function destroy($id)
        {{
            {controller_methods[4][1]}
        }}
    }}
    """
        with open(controller_filename, 'w', encoding='utf-8') as file:
            file.write(controller_content)

        print(f"Controller {controller_filename} has been generated.")

# Loop through files from 'file_2.json' to 'file_21.json'
startfromfile = 2 
endatfile = 21
for i in range(startfromfile, endatfile + 1):










