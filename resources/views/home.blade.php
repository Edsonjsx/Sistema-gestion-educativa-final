@extends('layouts.apphome')

@section('content')
<head>
    <style>
        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background-image: url("{{ asset('imagenes/fondo.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: transparent; 
            min-height: 100vh;
            display: flex;
        }

        .container-home {
            display: flex;
            width: 100%;
        }

        .menu-lateral {
            display: flex;
            flex-direction: column;
            background-color: rgba(52, 73, 94, 0.8); 
            width: 250px;
            padding: 20px;
            box-sizing: border-box;
            justify-content: flex-start;
            color: white;
            z-index: 10;
        }

        .menu-lateral h1 {
            padding: 15px 10px;
            margin-bottom: 25px;
            font-size: 2em;
            font-weight: 700;
            text-align: center;
            color: #ffc107;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .menu-item {
            padding: 12px 15px;
            margin-bottom: 15px;
            text-align: left;
            background: linear-gradient(135deg, #64b5f6, #42a5f5);
            border-radius: 30px;
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            font-size: 1.1em;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border: none;
        }

        .menu-item:hover,
        .menu-item.active {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #42a5f5, #2979ff);
        }

        .menu-item i {
            margin-right: 10px;
            font-size: 1.3em;
        }

        .btn-danger {
            background-color: #ff5722;
            color: white;
            border: none;
            padding: 12px 15px;
            text-align: center;
            font-size: 1.1em;
            border-radius: 30px;
            display: block;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-danger:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            background-color: #f4511e;
        }

        .contenido-home {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
        }

        .contenido-home h2 {
            font-size: 2.8em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .contenido-home p {
            font-size: 1.4em;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body>  
    <div class="container-home">
        <div class="menu-lateral">
            <h1>Menú Principal</h1>
            <a href="{{ route('apoderado.index') }}" class="menu-item"><i class="fas fa-users"></i> Lista de Apoderados</a>
            <a href="{{ route('estudiante.index') }}" class="menu-item"><i class="fas fa-graduation-cap"></i> Lista de Estudiantes</a>
            <a href="{{ route('matricula.index') }}" class="menu-item"><i class="fas fa-clipboard-list"></i> Lista de Matriculas</a>
            <a href="{{ route('docente.index') }}" class="menu-item"><i class="fas fa-chalkboard-teacher"></i> Lista de Docente</a>
            <a href="{{ route('curso.index') }}" class="menu-item"><i class="fas fa-book"></i> Lista de Cursos</a>
            <a href="http://127.0.0.1:8000/" class="btn-danger" style="text-decoration: none;"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
        </div>

        <div class="contenido-home">
            <h2>Bienvenido al Sistema de Gestión Educativa</h