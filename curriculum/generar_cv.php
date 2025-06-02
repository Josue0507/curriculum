<?php
// C:\xampp\htdocs\curriculum\generar_cv.php

// Recoger datos del formulario
$nombre = $_POST['nombre'] ?? 'Josue Guillermo Benito Arana';
$titulo = $_POST['titulo'] ?? 'ESTUDIANTE';
$acerca = $_POST['acerca'] ?? 'Un joven con pasión por su profesión, buena capacidad de organización y facilidad para el trabajo en equipo. Persona muy adaptable a todo tipo de entornos y clara orientación a objetivos. Desearía desarrollarme profesionalmente en una empresa con proyección de futuro.';
$telefono = $_POST['telefono'] ?? '(55) 73868962';
$direccion = $_POST['direccion'] ?? 'AV LOMAS DE SAN JUAN 8 4 LOS SAN JUAN YAUTEPEC 52768 HUIXQUILUCAN, MEX';
$curp = $_POST['curp'] ?? 'BEAJ030705HMCNRSA2';
$rfc = $_POST['rfc'] ?? 'BEAJ030705';
$primaria = $_POST['primaria'] ?? 'Escuela Primaria "Amado Nervo"';
$secundaria = $_POST['secundaria'] ?? 'Secundaria Oficial Num 32 "Santos Degollado"';
$prepa = $_POST['prepa'] ?? 'Preparatoria Regional de Huixquilucan';
$uni = $_POST['uni'] ?? 'Tecnológico de Estudios Superiores de Huixquilucan - Ingeniería en Sistemas Computacionales (2021-Presente)';
$experiencia = $_POST['experiencia'] ?? "**HAYUNTAMIENTO DE HUIXQUILUCAN**\nHuixquilucan, México\n2024-2025\n\nDiseñé y gestioné bases de datos para almacenar información clave de documentos importantes, además de desarrollar un catálogo de proveedores con sus respectivos productos. Participé en la creación de un sistema web que permite registrar las horas de entrada y salida del personal, así como justificar ausencias. Este sistema almacena la información en una base de datos y ofrece la posibilidad de generar reportes diarios en formato PDF, mostrando el registro completo del personal. Adicionalmente, colaboré en tareas administrativas, como el foliado y registro de documentos.";
$logros = $_POST['logros'] ?? "- 5to lugar en Hackathon Tecnológico 2023\n- 2do lugar en Competencia Nacional de Desarrollo 2024";
$competencias = $_POST['competencias'] ?? "Gestión de bases de datos\nDesarrollo de sistemas web\nTrabajo en equipo y colaboración\nAdaptabilidad y aprendizaje continuo\nProgramación en PHP, JavaScript\nManejo de HTML/CSS";

// Procesar datos
$lista_competencias = array_filter(explode("\n", $competencias));
$lista_logros = array_filter(explode("\n", $logros));

// Manejo de la imagen
$imagen_perfil = 'default.png';
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Verificar si es una imagen real
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        // Mover el archivo a la carpeta de uploads
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $imagen_perfil = $target_file;
        }
    }
}

// Si no se subió imagen, usar iniciales
if ($imagen_perfil === 'default.png') {
    $iniciales = implode('', array_map(function($n) { return strtoupper(substr($n, 0, 1)); }, explode(' ', $nombre)));
    $imagen_perfil = 'https://via.placeholder.com/200/3498db/ffffff?text=' . urlencode($iniciales);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum de <?php echo htmlspecialchars($nombre); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --color-primario: #3498db;
            --color-secundario: #2c3e50;
            --color-texto: #333;
            --color-fondo: #f9f9f9;
            --color-borde: #e0e0e0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--color-texto);
            background-color: var(--color-fondo);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        
        .cv-container {
            max-width: 800px;
            width: 100%;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .cv-header {
            display: flex;
            padding: 30px;
            background: linear-gradient(135deg, var(--color-secundario), var(--color-primario));
            color: white;
            text-align: center;
            flex-direction: column;
            align-items: center;
        }
        
        .cv-foto {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid white;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
            margin-bottom: 20px;
        }
        
        .cv-foto img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .cv-info-personal {
            width: 100%;
        }
        
        .cv-info-personal h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
        }
        
        .cv-titulo {
            margin: 10px 0;
            font-size: 18px;
            font-weight: 300;
            opacity: 0.9;
            text-align: center;
        }
        
        .cv-contacto {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }
        
        .cv-contacto-item {
            display: flex;
            align-items: center;
            font-size: 14px;
        }
        
        .cv-contacto-item i {
            margin-right: 8px;
            color: rgba(255,255,255,0.7);
        }
        
        .cv-section {
            padding: 25px 30px;
            border-bottom: 1px solid var(--color-borde);
        }
        
        .cv-section:last-child {
            border-bottom: none;
        }
        
        .cv-section-title {
            color: var(--color-primario);
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 22px;
            position: relative;
            padding-bottom: 10px;
            text-align: center;
        }
        
        .cv-section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--color-primario);
        }
        
        .cv-experiencia-item, 
        .cv-educacion-item {
            margin-bottom: 20px;
        }
        
        .cv-experiencia-empresa, 
        .cv-educacion-titulo {
            font-weight: 700;
            font-size: 18px;
            color: var(--color-secundario);
            margin-bottom: 5px;
        }
        
        .cv-experiencia-periodo, 
        .cv-educacion-periodo {
            font-style: italic;
            color: #666;
            margin-bottom: 10px;
            display: block;
        }
        
        .cv-section p, 
        .cv-experiencia-item p,
        .cv-educacion-item p {
            text-align: justify;
            text-justify: inter-word;
            hyphens: auto;
            margin: 0 0 10px 0;
        }
        
        .cv-competencias {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .cv-competencia {
            background: var(--color-primario);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
        }
        
        .cv-actions {
            text-align: center;
            padding: 20px;
        }
        
        .cv-print-btn {
            background: var(--color-primario);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .cv-print-btn:hover {
            background: var(--color-secundario);
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        
        .cv-datos-personales {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 20px;
        }
        
        .cv-dato-item {
            display: flex;
            flex-direction: column;
        }
        
        .cv-dato-label {
            font-weight: bold;
            color: var(--color-secundario);
            margin-bottom: 5px;
        }
        
        .cv-dato-valor {
            padding: 8px;
            background: #f5f5f5;
            border-radius: 4px;
        }
        
        .cv-logros {
            background: #f0f8ff;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
        }
        
        .cv-logros h3 {
            margin-top: 0;
            color: var(--color-primario);
        }
        
        .cv-logros ul {
            padding-left: 20px;
        }
        
        .cv-logros li {
            margin-bottom: 8px;
        }
        
        /* Estilos para impresión */
        @media print {
            body {
                background: none;
                padding: 0;
                font-size: 12pt;
            }
            
            .cv-actions {
                display: none;
            }
            
            .cv-container {
                box-shadow: none;
                max-width: 100%;
            }
            
            .cv-header {
                padding: 20px;
                background: #2c3e50 !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            .cv-section {
                padding: 15px;
                page-break-inside: avoid;
            }
            
            .cv-section p, 
            .cv-experiencia-item p,
            .cv-educacion-item p {
                text-align: justify;
                hyphens: auto;
            }
            
            a {
                text-decoration: none;
                color: #2c3e50;
            }
        }
        
        @media (max-width: 768px) {
            .cv-header {
                padding: 20px;
            }
            
            .cv-section {
                padding: 20px 15px;
            }
            
            .cv-contacto {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }
            
            .cv-datos-personales {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <script>
        function imprimirCurriculum() {
            window.print();
        }
    </script>
</head>
<body>
    <div class="cv-container">
        <header class="cv-header">
            <div class="cv-foto">
                <img src="<?php echo $imagen_perfil; ?>" alt="Foto de <?php echo htmlspecialchars($nombre); ?>">
            </div>
            <div class="cv-info-personal">
                <h1><?php echo htmlspecialchars($nombre); ?></h1>
                <div class="cv-titulo"><?php echo htmlspecialchars($titulo); ?></div>
                <div class="cv-contacto">
                    <div class="cv-contacto-item">
                        <i class="fas fa-phone"></i> <?php echo htmlspecialchars($telefono); ?>
                    </div>
                    <div class="cv-contacto-item">
                        <i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($direccion); ?>
                    </div>
                </div>
            </div>
        </header>
        
        <section class="cv-section">
            <h2 class="cv-section-title">DATOS PERSONALES</h2>
            <div class="cv-datos-personales">
                <div class="cv-dato-item">
                    <span class="cv-dato-label">CURP:</span>
                    <span class="cv-dato-valor"><?php echo htmlspecialchars($curp); ?></span>
                </div>
                <div class="cv-dato-item">
                    <span class="cv-dato-label">RFC:</span>
                    <span class="cv-dato-valor"><?php echo htmlspecialchars($rfc); ?></span>
                </div>
            </div>
        </section>
        
        <section class="cv-section">
            <h2 class="cv-section-title">ACERCA DE MÍ</h2>
            <p><?php echo nl2br(htmlspecialchars($acerca)); ?></p>
        </section>
        
        <section class="cv-section">
            <h2 class="cv-section-title">EDUCACIÓN</h2>
            <div class="cv-educacion-item">
                <div class="cv-educacion-titulo">Primaria</div>
                <p><?php echo htmlspecialchars($primaria); ?></p>
            </div>
            <div class="cv-educacion-item">
                <div class="cv-educacion-titulo">Secundaria</div>
                <p><?php echo htmlspecialchars($secundaria); ?></p>
            </div>
            <div class="cv-educacion-item">
                <div class="cv-educacion-titulo">Preparatoria</div>
                <p><?php echo htmlspecialchars($prepa); ?></p>
            </div>
            <div class="cv-educacion-item">
                <div class="cv-educacion-titulo">Universidad</div>
                <p><?php echo htmlspecialchars($uni); ?></p>
            </div>
        </section>
        
        <section class="cv-section">
            <h2 class="cv-section-title">EXPERIENCIA LABORAL</h2>
            <div class="cv-experiencia-item">
                <p><?php echo nl2br(htmlspecialchars($experiencia)); ?></p>
            </div>
        </section>
        
        <section class="cv-section">
            <h2 class="cv-section-title">LOGROS ACADÉMICOS</h2>
            <div class="cv-logros">
                <h3>Hackathons y Competencias</h3>
                <ul>
                    <?php foreach($lista_logros as $logro): ?>
                        <?php if(trim($logro) != ''): ?>
                            <li><?php echo htmlspecialchars(trim($logro)); ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
        
        <section class="cv-section">
            <h2 class="cv-section-title">COMPETENCIAS</h2>
            <div class="cv-competencias">
                <?php foreach($lista_competencias as $competencia): ?>
                    <?php if(trim($competencia) != ''): ?>
                        <div class="cv-competencia"><?php echo htmlspecialchars(trim($competencia)); ?></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </section>
        
        <div class="cv-actions">
            <button class="cv-print-btn" onclick="imprimirCurriculum()">
                <i class="fas fa-print"></i> Imprimir Curriculum
            </button>
        </div>
    </div>
</body>
</html>