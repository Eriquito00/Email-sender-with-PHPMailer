# Enviador de Correos con PHPMailer

Una aplicación web simple y fácil de usar construida con PHP que permite a los usuarios enviar correos electrónicos a través de una interfaz de formulario web utilizando la librería PHPMailer.

## Dependencias

Este proyecto requiere las siguientes dependencias:

### 1. Instalación de XAMPP

**XAMPP** es requerido para ejecutar esta aplicación PHP localmente.

#### Instalando XAMPP:
1. Descarga XAMPP desde el sitio web oficial: [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Ejecuta el instalador y sigue el asistente de instalación
3. Instala XAMPP en la ubicación predeterminada

#### Configuracion del Proyecto en XAMPP:
1. Navega a tu directorio de instalación de XAMPP `C:\xampp\htdocs`
2. **Opcional pero Recomendado**: Crea una carpeta `XamppOriginal` para introducir dentro todos los archivos de la web original de xampp:
   ```
   htdocs/
   └── XamppOriginal/ (Archivos originales de Xampp)
   ```
3. Clona este repositorio en la ruta donde xampp muestra las webs:
    ```BASH
    cd C:\xampp\htdocs
    ```

    ```bash
    git clone https://github.com/Eriquito00/Email-sender-with-PHPMailer.git email-sender
    ```

   ```
   htdocs/
   ├── email-sender/  (Este proyecto)
   └── XamppOriginal/ (Archivos originales de Xampp)
   ```

### 2. Dependencias PHP

Este proyecto utiliza **Composer** para manejar las dependencias PHP:
- **PHPMailer**: Versión 6.10+ para funcionalidad de envío de correos

Para instalar las dependencias PHP:

```bash
cd C:\xampp\htdocs\email-sender
```

```bash
composer install
```

## Cómo Ejecutar el Proyecto

### Paso 1: Comprovar el servicio Apache de XAMPP
1. Abrir el Panel de Control de XAMPP
2. Iniciar el servicio **Apache** (requerido para PHP)
3. Si funciona correctamente apaga el servicio **Apache**

### Paso 2: Configuración de la Cuenta de Gmail

**Importante**: Este proyecto está optimizado para el servidor SMTP de Gmail. Necesitarás entrar con tu correo electronico a Gmail.

#### Configurando Gmail para la Aplicación:
1. **Inicia sesión en tu cuenta de Gmail**
2. **Habilita la Verificación en 2 Pasos**:
   - Ve a la configuración de tu cuenta de Google en [https://myaccount.google.com/](https://myaccount.google.com/)
   - Navega a "Seguridad" → "Verificación en 2 pasos"
   - Sigue las instrucciones para habilitar la Verificación en 2 pasos

3. **Crea una Contraseña de Aplicación**:
   - Ve a la barra de busqueda y introduce "Contraseñas de aplicaciones"
   - Una vez la encuentre entra y introduce tu contraseña de correo
   - Introduce el nombre que quieras en "Nombre de la aplicacion" y crea
   - Una vez creada devolvera una clave con esta estructura "xxxx xxxx xxxx xxxx" guardala porque solo se muestra esa vez

### Paso 3: Configuración del Proyecto

1. **Copia la plantilla de configuración**:
   ```bash
   copy config.example.php config.php
   ```

2. **Edita el archivo `config.php`** con tus credenciales de Gmail y quita los comentarios de arriba, tiene que quedar asi (pero con tu informacion):
   ```php
   <?php
   
   return [
       "SMTP_HOST" => "smtp.gmail.com",              // Servidor SMTP de Gmail
       "SMTP_USER" => "tu-email@gmail.com",         // Tu dirección de Gmail
       "SMTP_PASS" => "xxxx xxxx xxxx xxxx",        // La contraseña que Gmail te ha dado
       "SMTP_PORT" => 587,                          // Puerto SMTP de Gmail
       "SMTP_SECURE" => "tls"                       // Protocolo de seguridad
   ];
   
   ?>
   ```

   **Ejemplo de configuración**:
   ```php
   return [
       "SMTP_HOST" => "smtp.gmail.com",
       "SMTP_USER" => "paquitochocolateslocos@gmail.com",
       "SMTP_PASS" => "abcd efgh ijkl mnop",
       "SMTP_PORT" => 587,
       "SMTP_SECURE" => "tls"
   ];
   ```

### Paso 4: Acceder a la Aplicación

1. Abre el panel de Xampp y inicia el servicio de **Apache**
2. Abrir tu navegador web y abre `http://localhost/email-sender/`
3. Deberías ver la interfaz del formulario de correo

## Uso

### Enviando un Correo:
1. **Asunto**: Introduce el asunto del correo (máximo 50 caracteres)
2. **Email**: Introduce la dirección de correo del destinatario
3. **Mensaje**: Introduce tu mensaje (máximo 150 caracteres)
4. Haz clic en **Enviar** para enviar el correo

### Historial de Correos:
Esta aplicación incluye una funcionalidad de historial que **automáticamente** guarda todos los correos enviados:

1. **Base de Datos Automática**: Al enviar tu primer correo, se crea automáticamente una base de datos SQLite (`historydb.db`)
2. **Acceso al Historial**: Haz clic en el botón **"History"** en la interfaz principal para ver todos los correos enviados
3. **Información Guardada**: Para cada correo se almacena:
   - Remitente (tu email configurado)
   - Destinatario
   - Asunto del correo
   - Mensaje completo
4. **Sin correos enviados**: Si no has enviado ningún correo aún, el historial aparecerá vacío

### Validación del Formulario:
- Todos los campos son requeridos
- Las direcciones de correo electrónico son validadas para el formato apropiado
- Los límites de caracteres son aplicados
- Se muestran mensajes de error claros para entradas inválidas

### Mensajes de Éxito/Error:
- **Éxito**: "El correu s'ha enviat correctament. Historial actualitzat correctament."
- **Errores**: Mensajes de error específicos para fallos de validación o problemas SMTP

## Estructura del Proyecto

```
Email-sender-with-PHPMailer/
├── controller/
│   ├── controller.php    # Lógica de procesamiento de formularios y validación
│   └── mailer.php        # Configuración de PHPMailer y envío de correos
├── model/
│   └── model.php         # Funciones de base de datos para historial de correos
├── view/
│   ├── view.php          # Plantilla HTML para el formulario de correo
│   └── history.php       # Plantilla HTML para mostrar el historial
├── style/
│   ├── style.css         # Estilos CSS para la interfaz web principal
│   └── history.css       # Estilos CSS para la interfaz de historial
├── vendor/               # Dependencias de Composer (auto-generado)
├── config.example.php    # Plantilla de configuración
├── config.php            # Tu configuración actual (crear desde el ejemplo)
├── historydb.db          # Base de datos SQLite (se crea automáticamente)
├── index.php             # Punto de entrada principal
├── composer.json         # Configuración de dependencias PHP
├── composer.lock         # Archivo de bloqueo de dependencias
├── .gitignore            # Reglas de ignorar de Git
├── LICENSE               # Licencia MIT
└── README.md             # Esta documentación
```

## Notas de Seguridad

### Consideraciones Importantes de Seguridad:

1. **Protección del Archivo de Configuración**:
   - **Nunca hagas commit de `config.php` al control de versiones** - contiene credenciales sensibles
   - El archivo `.gitignore` está configurado para excluir `config.php` por defecto
   - Solo haz commit de `config.example.php` como plantilla

2. **Protección de la Base de Datos de Historial**:
   - **La base de datos `historydb.db` está excluida del control de versiones** - contiene información confidencial de los correos enviados
   - El archivo `.gitignore` está configurado para excluir `historydb.db` por defecto
   - **Nunca compartas ni subas esta base de datos** a repositorios públicos

3. **Contraseñas de Aplicación**:
   - Usa Contraseñas de Aplicación de Gmail en lugar de tu contraseña regular de Gmail
   - Nunca compartas tu contraseña de aplicación o la incluyas en repositorios de código

## Licencia

Este proyecto está licenciado bajo la Licencia MIT - consulta el archivo [LICENSE](LICENSE) para más detalles.

La Licencia MIT es una licencia permisiva que permite:
- ✅ Uso comercial
- ✅ Modificación
- ✅ Distribución
- ✅ Uso privado

Con las siguientes condiciones:
- ℹ️ Incluir el aviso de copyright
- ℹ️ Incluir la licencia MIT

## Contribuciones

Siéntete libre de hacer fork de este proyecto y enviar pull requests para mejoras o corrección de errores.
