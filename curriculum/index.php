<?php
// C:\xampp\htdocs\curriculum\index.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Curriculum</title>
    <link rel="stylesheet" href="css/estilo.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
        }
        
        .container {
            max-width: 800px;
            width: 100%;
            margin: 20px auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
        }
        
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #2c3e50;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: inherit;
            font-size: 16px;
        }
        
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        input[type="submit"] {
            background: #3498db;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
            display: block;
            margin: 30px auto 0;
        }
        
        input[type="submit"]:hover {
            background: #2980b9;
        }
        
        .form-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .form-section h2 {
            color: #3498db;
            margin-bottom: 20px;
        }
        
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Generador de Curriculum</h1>
        <form action="generar_cv.php" method="post" enctype="multipart/form-data">
            <div class="form-section">
                <h2>Información Personal</h2>
                <div class="form-group">
                    <label for="foto">Fotografía:</label>
                    <input type="file" id="foto" name="foto" accept="image/*">
                </div>
                
                <div class="form-group">
                    <label for="nombre">Nombre Completo:</label>
                    <input type="text" id="nombre" name="nombre" value="Josue Guillermo Benito Arana" required>
                </div>
                
                <div class="form-group">
                    <label for="titulo">Título Profesional:</label>
                    <input type="text" id="titulo" name="titulo" value="ESTUDIANTE" required>
                </div>
                
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" value="AV LOMAS DE SAN JUAN 8 4 LOS SAN JUAN YAUTEPEC 52768 HUIXQUILUCAN, MEX" required>
                </div>
                
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" value="(55) 73868962" required>
                </div>
                
                <div class="form-group">
                    <label for="curp">CURP:</label>
                    <input type="text" id="curp" name="curp" value="BEAJ030705HMCNRSA2" required>
                </div>
                
                <div class="form-group">
                    <label for="rfc">RFC:</label>
                    <input type="text" id="rfc" name="rfc" value="BEAJ030705" placeholder="Usando primeras letras de CURP" required>
                </div>
                
                <div class="form-group">
                    <label for="acerca">Acerca de ti:</label>
                    <textarea id="acerca" name="acerca" required>Un joven con pasión por su profesión, buena capacidad de organización y facilidad para el trabajo en equipo. Persona muy adaptable a todo tipo de entornos y clara orientación a objetivos. Desearía desarrollarme profesionalmente en una empresa con proyección de futuro.</textarea>
                </div>
            </div>
            
            <div class="form-section">
                <h2>Educación</h2>
                
                <div class="form-group">
                    <label for="primaria">Primaria:</label>
                    <input type="text" id="primaria" name="primaria" value="Escuela Primaria 'Amado Nervo'" required>
                </div>
                
                <div class="form-group">
                    <label for="secundaria">Secundaria:</label>
                    <input type="text" id="secundaria" name="secundaria" value="Secundaria Oficial Num 32 'Santos Degollado'" required>
                </div>
                
                <div class="form-group">
                    <label for="prepa">Preparatoria:</label>
                    <input type="text" id="prepa" name="prepa" value="Preparatoria Regional de Huixquilucan" required>
                </div>
                
                <div class="form-group">
                    <label for="uni">Universidad:</label>
                    <input type="text" id="uni" name="uni" value="Tecnológico de Estudios Superiores de Huixquilucan - Ingeniería en Sistemas Computacionales (2021-Presente)" required>
                </div>
            </div>
            
            <div class="form-section">
                <h2>Experiencia Laboral</h2>
                <div class="form-group">
                    <label for="experiencia">Experiencia:</label>
                    <textarea id="experiencia" name="experiencia" required>**HAYUNTAMIENTO DE HUIXQUILUCAN**
Huixquilucan, México
2024-2025

Diseñé y gestioné bases de datos para almacenar información clave de documentos importantes, además de desarrollar un catálogo de proveedores con sus respectivos productos. Participé en la creación de un sistema web que permite registrar las horas de entrada y salida del personal, así como justificar ausencias. Este sistema almacena la información en una base de datos y ofrece la posibilidad de generar reportes diarios en formato PDF, mostrando el registro completo del personal. Adicionalmente, colaboré en tareas administrativas, como el foliado y registro de documentos.</textarea>
                </div>
            </div>
            
            <div class="form-section">
                <h2>Logros Académicos</h2>
                <div class="form-group">
                    <label for="logros">Hackathons y Competencias:</label>
                    <textarea id="logros" name="logros" required>- 5to lugar en Hackathon Tecnológico 2023
- 2do lugar en Competencia Nacional de Desarrollo 2024</textarea>
                </div>
            </div>
            
            <div class="form-section">
                <h2>Competencias</h2>
                <div class="form-group">
                    <label for="competencias">Competencias (una por línea):</label>
                    <textarea id="competencias" name="competencias" required>Gestión de bases de datos
Desarrollo de sistemas web
Trabajo en equipo y colaboración
Adaptabilidad y aprendizaje continuo
Programación en PHP, JavaScript
Manejo de HTML/CSS</textarea>
                </div>
            </div>
            
            <input type="submit" value="Generar Curriculum">
        </form>
    </div>
</body>
</html>