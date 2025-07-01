# SIRP V.2 - Sistema de Información de Riesgos Psicosociales

## 📋 Descripción

SIRP V.2 es un sistema web desarrollado en PHP que permite la gestión y evaluación de riesgos psicosociales en el entorno laboral. El sistema está diseñado para administradores y clientes (empresas) que necesitan evaluar y gestionar los factores de riesgo psicosocial en sus organizaciones.

## 🎯 Características Principales

### Para Administradores
- **Gestión de Contabilidad**: Control de ventas, compras y clientes
- **Registro de Clientes**: Creación y gestión de cuentas de clientes
- **Sistema de Ventas**: Gestión de pines y licencias
- **Reportes Financieros**: Seguimiento de ingresos y transacciones

### Para Clientes (Empresas)
- **Gestión de Empresas**: Registro y administración de empresas
- **Evaluación de Riesgos Psicosociales**: Cuestionarios especializados
- **Gestión de Empleados**: Registro y seguimiento del personal
- **Generación de Informes**: Reportes detallados en diferentes formatos

## 🏗️ Arquitectura del Sistema

### Tecnologías Utilizadas
- **Backend**: PHP 7.x
- **Base de Datos**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework CSS**: Bootstrap 4.5.0
- **Iconos**: Font Awesome 5.13.1
- **Gráficos**: Chart.js 2.9.3
- **Tablas**: DataTables 1.10.21
- **Build Tool**: Gulp 4.0.2

### Estructura del Proyecto
```
sirp/
├── acciones/                 # Scripts de procesamiento
├── cuestionarios/           # Formularios de evaluación
├── css/                     # Estilos CSS
├── js/                      # JavaScript
├── img/                     # Imágenes
├── paginas/                 # Páginas del sistema
├── reportes/                # Generación de reportes
├── vendor/                  # Dependencias
├── administrador.php        # Panel de administrador
├── cliente.php             # Panel de cliente
├── login.php               # Autenticación
├── conexion.php            # Configuración de BD
└── README.md               # Este archivo
```

## 🚀 Instalación

### Requisitos Previos
- Servidor web (Apache/Nginx)
- PHP 7.0 o superior
- MySQL 5.7 o superior
- Composer (opcional, para dependencias)

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone [URL_DEL_REPOSITORIO]
   cd sirp
   ```

2. **Configurar la base de datos**
   - Crear una base de datos MySQL llamada `sirp`
   - Importar el esquema de la base de datos (archivo SQL)

3. **Configurar la conexión**
   - Editar `conexion.php` con los datos de tu base de datos:
   ```php
   $host_db = "localhost";
   $user_db = "tu_usuario";
   $pass_db = "tu_contraseña";
   $db_name = "sirp";
   ```

4. **Instalar dependencias (opcional)**
   ```bash
   npm install
   ```

5. **Configurar el servidor web**
   - Asegurar que el directorio sea accesible desde el servidor web
   - Configurar permisos de escritura en directorios necesarios

## 🔧 Configuración

### Variables de Entorno
El sistema utiliza las siguientes configuraciones por defecto:
- **Host de BD**: localhost
- **Usuario de BD**: root
- **Contraseña de BD**: root
- **Nombre de BD**: sirp

### Permisos de Archivos
```bash
chmod 755 -R sirp/
chmod 777 -R sirp/reportes/
chmod 777 -R sirp/img/
```

## 👥 Tipos de Usuario

### Administrador
- Acceso completo al sistema
- Gestión de clientes y ventas
- Reportes financieros
- Configuración del sistema

### Cliente
- Gestión de empresas propias
- Evaluación de riesgos psicosociales
- Generación de informes
- Gestión de empleados

## 📊 Módulos del Sistema

### 1. Gestión de Clientes
- Registro de nuevos clientes
- Actualización de información
- Control de acceso y permisos

### 2. Evaluación de Riesgos Psicosociales
- **Cuestionario Intralaboral A**: Evaluación de factores internos
- **Cuestionario Intralaboral B**: Evaluación de factores internos (versión B)
- **Cuestionario Extralaboral**: Evaluación de factores externos
- **Cuestionario de Estrés**: Evaluación específica de estrés

### 3. Gestión de Empresas
- Registro de empresas
- Configuración de parámetros
- Gestión de empleados

### 4. Generación de Reportes
- Informes individuales
- Informes por empresa
- Reportes sociodemográficos
- Exportación a PDF y Excel

## 🔐 Seguridad

### Autenticación
- Sistema de login con validación de sesiones
- Encriptación de contraseñas con MD5
- Control de acceso basado en roles

### Validación de Datos
- Sanitización de entradas
- Validación de formularios
- Protección contra inyección SQL básica

## 📈 Reportes Disponibles

1. **Informe General**: Resumen completo de evaluaciones
2. **Informe Individual**: Resultados por empleado
3. **Informe Sociodemográfico**: Análisis por características demográficas
4. **Informe Tipo Tabla**: Datos en formato tabular

## 🛠️ Desarrollo

### Scripts Disponibles
```bash
# Iniciar el servidor de desarrollo
npm start

# Compilar assets
gulp build

# Observar cambios
gulp watch
```

### Estructura de Base de Datos
Las principales tablas incluyen:
- `cliente`: Información de clientes
- `empresa`: Datos de empresas
- `empleado`: Información de empleados
- `compra`: Registro de transacciones
- `evaluacion_*`: Resultados de cuestionarios

## 🐛 Solución de Problemas

### Errores Comunes
1. **Error de conexión a BD**: Verificar configuración en `conexion.php`
2. **Permisos denegados**: Ajustar permisos de archivos y directorios
3. **Sesión expirada**: Verificar configuración de PHP session

### Logs
- Los errores se registran en `error_log`
- Revisar logs del servidor web para problemas de configuración

## 📝 Licencia

Este proyecto utiliza la licencia MIT. Ver archivo LICENSE para más detalles.

## 🤝 Contribución

1. Fork el proyecto
2. Crear una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abrir un Pull Request

## 📞 Soporte

Para soporte técnico o consultas:
- Revisar la documentación del sistema
- Consultar los logs de error
- Contactar al equipo de desarrollo

## 🔄 Versiones

- **v2.0**: Versión actual con mejoras en interfaz y funcionalidades
- **v1.0**: Versión inicial del sistema

---

**Desarrollado con ❤️ para la gestión de riesgos psicosociales**
