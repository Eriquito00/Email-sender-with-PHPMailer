# Enviador de Correos con PHPMailer

Una aplicación web simple y fácil de usar construida con PHP que permite a los usuarios enviar correos electrónicos a través de una interfaz de formulario web utilizando la librería PHPMailer.

## Qué hace el Proyecto

Este proyecto proporciona una interfaz web limpia para enviar correos electrónicos con las siguientes características:
- **Interfaz de Formulario Web**: Formulario HTML simple para redactar correos electrónicos con campos de asunto, correo del destinatario y mensaje
- **Procesamiento de Correos del Lado del Servidor**: Utiliza la librería PHPMailer para manejar el envío de correos SMTP
- **Validación de Entrada**: Valida direcciones de correo electrónico y asegura que todos los campos requeridos estén completos
- **Manejo de Errores**: Proporciona retroalimentación clara a los usuarios sobre el éxito o fallo del envío de correos
- **Diseño Responsivo**: Estilo CSS limpio con tema oscuro que funciona en diferentes tamaños de pantalla
- **Integración SMTP de Gmail**: Optimizado para la configuración del servidor SMTP de Gmail

## Dependencias

Este proyecto requiere las siguientes dependencias:

### 1. Instalación de XAMPP

**XAMPP** es requerido para ejecutar esta aplicación PHP localmente en tu computadora.

#### Instalando XAMPP:
1. Descarga XAMPP desde el sitio web oficial: [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Elige la versión compatible con tu sistema operativo (Windows, macOS, o Linux)
3. Ejecuta el instalador y sigue el asistente de instalación
4. Instala XAMPP en la ubicación predeterminada (usualmente `C:\xampp` en Windows o `/Applications/XAMPP` en macOS)

#### Configurando el Proyecto en XAMPP:
1. Navega a tu directorio de instalación de XAMPP
2. Abre la carpeta `htdocs` (desde aquí XAMPP sirve los sitios web)
3. **Opcional pero Recomendado**: Crea una carpeta `projects` dentro de `htdocs` para organizar tus sitios web:
   ```
   htdocs/
   ├── projects/
   │   └── email-sender/  (tu proyecto irá aquí)
   └── (otros archivos existentes)
   ```
4. Clona este repositorio en la carpeta apropiada:
   ```bash
   cd /ruta/a/xampp/htdocs/projects/
   git clone https://github.com/Eriquito00/Email-sender-with-PHPMailer.git email-sender
   ```

### 2. Dependencias PHP

Este proyecto utiliza **Composer** para manejar las dependencias PHP:
- **PHPMailer**: Versión 6.10+ para funcionalidad de envío de correos

Para instalar las dependencias PHP:
```bash
cd /ruta/a/tu/proyecto
composer install
```

## Cómo Ejecutar el Proyecto

### Paso 1: Iniciar los Servicios de XAMPP
1. Abrir el Panel de Control de XAMPP
2. Iniciar el servicio **Apache** (requerido para PHP)
3. Opcionalmente iniciar **MySQL** si planeas extender el proyecto con funcionalidad de base de datos

### Paso 2: Configuración de la Cuenta de Gmail

**Importante**: Este proyecto está optimizado para el servidor SMTP de Gmail. Necesitarás una cuenta de Gmail para enviar correos.

#### Configurando Gmail para la Aplicación:
1. **Inicia sesión en tu cuenta de Gmail**
2. **Habilita la Verificación en 2 Pasos**:
   - Ve a la configuración de tu cuenta de Google: [https://myaccount.google.com/](https://myaccount.google.com/)
   - Navega a "Seguridad" → "Verificación en 2 pasos"
   - Sigue las instrucciones para habilitar la Verificación en 2 pasos

3. **Crea una Contraseña de Aplicación**:
   - En la misma sección de "Seguridad", busca "Contraseñas de aplicaciones"
   - Haz clic en "Generar contraseñas de aplicaciones"
   - Elige "Correo" como tipo de aplicación
   - Introduce un nombre personalizado para tu aplicación (ej., "Proyecto Enviador de Correos")
   - Google generará una contraseña de 16 caracteres - **guarda esta contraseña**, la necesitarás para la configuración

### Paso 3: Configuración del Proyecto

1. **Copia la plantilla de configuración**:
   ```bash
   cp config.example.php config.php
   ```

2. **Edita el archivo `config.php`** con tus credenciales de Gmail:
   ```php
   <?php
   
   return [
       "SMTP_HOST" => "smtp.gmail.com",              // Servidor SMTP de Gmail
       "SMTP_USER" => "tu-email@gmail.com",         // Tu dirección de Gmail
       "SMTP_PASS" => "tu-contraseña-app-16-chars", // La contraseña de aplicación del Paso 2
       "SMTP_PORT" => 587,                          // Puerto SMTP de Gmail
       "SMTP_SECURE" => "tls"                       // Protocolo de seguridad
   ];
   
   ?>
   ```

   **Ejemplo de configuración**:
   ```php
   return [
       "SMTP_HOST" => "smtp.gmail.com",
       "SMTP_USER" => "juan.perez@gmail.com",
       "SMTP_PASS" => "abcd efgh ijkl mnop",  // Tu contraseña de aplicación generada
       "SMTP_PORT" => 587,
       "SMTP_SECURE" => "tls"
   ];
   ```

### Paso 4: Acceder a la Aplicación

1. Abrir tu navegador web
2. Navegar a: `http://localhost/projects/email-sender/` (ajusta la ruta según donde hayas colocado el proyecto)
3. Deberías ver la interfaz del formulario de correo

## Uso

### Enviando un Correo:
1. **Asunto**: Introduce el asunto del correo (máximo 50 caracteres)
2. **Email**: Introduce la dirección de correo del destinatario
3. **Mensaje**: Introduce tu mensaje (máximo 150 caracteres)
4. Haz clic en **Enviar** para enviar el correo

### Validación del Formulario:
- Todos los campos son requeridos
- Las direcciones de correo electrónico son validadas para el formato apropiado
- Los límites de caracteres son aplicados
- Se muestran mensajes de error claros para entradas inválidas

### Mensajes de Éxito/Error:
- **Éxito**: "El correu s'ha enviat correctament." (El correo ha sido enviado correctamente.)
- **Errores**: Mensajes de error específicos para fallos de validación o problemas SMTP

## Estructura del Proyecto

```
Email-sender-with-PHPMailer/
├── controller/
│   ├── controller.php      # Lógica de procesamiento de formularios y validación
│   └── mailer.php         # Configuración de PHPMailer y envío de correos
├── view/
│   └── view.php           # Plantilla HTML para el formulario de correo
├── style/
│   └── style.css          # Estilos CSS para la interfaz web
├── vendor/                # Dependencias de Composer (auto-generado)
├── config.example.php     # Plantilla de configuración
├── config.php            # Tu configuración actual (crear desde el ejemplo)
├── index.php             # Punto de entrada principal
├── composer.json         # Configuración de dependencias PHP
├── composer.lock         # Archivo de bloqueo de dependencias
├── .gitignore           # Reglas de ignorar de Git
├── LICENSE              # Licencia MIT
└── README.md            # Esta documentación
```

### Componentes Clave:

- **`index.php`**: Punto de entrada que carga la vista
- **`controller/controller.php`**: Maneja el envío de formularios, validación y mensajes de error
- **`controller/mailer.php`**: Contiene la configuración de PHPMailer y la lógica de envío de correos
- **`view/view.php`**: Plantilla HTML con PHP integrado para el renderizado del formulario
- **`style/style.css`**: CSS responsivo con estilo de tema oscuro
- **`config.php`**: Archivo de configuración SMTP (lo creas desde el ejemplo)

## Notas de Seguridad

### Consideraciones Importantes de Seguridad:

1. **Protección del Archivo de Configuración**:
   - **Nunca hagas commit de `config.php` al control de versiones** - contiene credenciales sensibles
   - El archivo `.gitignore` está configurado para excluir `config.php`
   - Solo haz commit de `config.example.php` como plantilla

2. **Contraseñas de Aplicación**:
   - Usa Contraseñas de Aplicación de Gmail en lugar de tu contraseña regular de Gmail
   - Las Contraseñas de Aplicación son más seguras y pueden ser revocadas independientemente
   - Nunca compartas tu contraseña de aplicación o la incluyas en repositorios de código

3. **Validación de Entrada**:
   - Todas las entradas del formulario son validadas del lado del servidor
   - Las direcciones de correo electrónico son validadas usando patrones regex
   - Los límites de caracteres previenen posible abuso

4. **Protección XSS**:
   - Toda entrada del usuario es apropiadamente escapada usando `htmlspecialchars()` antes de mostrarla
   - Previene ataques de cross-site scripting

5. **Seguridad SMTP**:
   - Usa cifrado TLS para transmisión segura de correos
   - El servidor SMTP de Gmail proporciona capas adicionales de seguridad

6. **Permisos de Archivos**:
   - Asegúrate de que `config.php` tenga permisos de archivo restrictivos (600 o 644)
   - Previene acceso no autorizado a archivos de configuración

### Prácticas de Seguridad Recomendadas:

- Rota regularmente tus Contraseñas de Aplicación de Gmail
- Monitorea tu cuenta de Gmail para actividad inusual
- Considera implementar limitación de velocidad para el envío de correos
- Añade protección CSRF para uso en producción
- Usa variables de entorno para configuración sensible en entornos de producción

### Notas de Despliegue en Producción:

- Este proyecto está diseñado para desarrollo y pruebas locales
- Para uso en producción, considera medidas de seguridad adicionales:
  - Cifrado HTTPS
  - Registro en base de datos de correos enviados
  - Limitación de velocidad y prevención de spam
  - Autenticación y autorización de usuarios
  - Sanitización de entrada más allá de la validación básica

---

## Licencia

Este proyecto está licenciado bajo la Licencia MIT - consulta el archivo [LICENSE](LICENSE) para más detalles.

## Contribuciones

Siéntete libre de hacer fork de este proyecto y enviar pull requests para mejoras o corrección de errores.