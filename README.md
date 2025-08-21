# Estudio Marcos - Sitio Web

Este es el sitio web oficial del Estudio Marcos, un estudio jurídico fundado en 1977 en Bahía Blanca, Argentina.

## 📋 Guía de Actualización

Esta guía te explicará paso a paso cómo actualizar el sitio web sin necesidad de conocimientos técnicos.


---

## 👥 Cómo Actualizar el Staff (Equipo)

### Agregar una Nueva Persona

1. **Ir a la carpeta `_data`** en el repositorio
2. **Hacer clic en `staff.yml`**
3. **Hacer clic en el ícono de lápiz** (editar) en la esquina superior derecha
4. **Agregar al final del archivo** (antes de la última línea):

```yaml
- nombre: Apellido, Nombre
  archivo: Nombre Apellido.pdf
```

5. **Hacer clic en "Commit changes"** (guardar cambios)

### Subir el PDF de la Nueva Persona

1. **Ir a la carpeta `descargas/staff/`**
2. **Hacer clic en "Add file"** → "Upload files"
3. **Arrastrar el archivo PDF** o hacer clic en "choose your files"
4. **El archivo debe llamarse exactamente igual** que en el `staff.yml`
5. **Hacer clic en "Commit changes"**

### Quitar una Persona del Staff

1. **Editar `_data/staff.yml`** como se explicó arriba
2. **Eliminar las líneas** de la persona que quieres quitar
3. **Guardar los cambios**
4. **Opcional**: Eliminar el PDF de la carpeta `descargas/staff/`

### Editar Información de una Persona Existente

1. **Editar `_data/staff.yml`**
2. **Cambiar el nombre** o el nombre del archivo
3. **Si cambias el nombre del archivo**, renombrar también el PDF en `descargas/staff/`

---

## 📚 Cómo Actualizar Ponencias

### Agregar una Nueva Ponencia

1. **Ir a la carpeta `_data`**
2. **Hacer clic en `ponencias.yml`**
3. **Hacer clic en editar** (ícono de lápiz)
4. **Agregar al final** (antes de la última línea):

```yaml
- archivo: Nombre de la ponencia.pdf
  titulo: Título completo de la ponencia
  lugar: Lugar donde se presentó (opcional)
  fecha: Fecha de presentación (opcional)
```

5. **Guardar los cambios**

### Subir el PDF de la Ponencia

1. **Ir a la carpeta `descargas/ponencias/`**
2. **Hacer clic en "Add file"** → "Upload files"
3. **Subir el archivo PDF** con el nombre exacto del `archivo` en `ponencias.yml`
4. **Guardar los cambios**

### Quitar una Ponencia

1. **Editar `_data/ponencias.yml`**
2. **Eliminar las líneas** de la ponencia que quieres quitar
3. **Guardar los cambios**
4. **Opcional**: Eliminar el PDF de `descargas/ponencias/`

---

## 📖 Cómo Actualizar Trabajos Publicados

### Agregar un Nuevo Trabajo

1. **Ir a la carpeta `_data`**
2. **Hacer clic en `trabajos.yml`**
3. **Hacer clic en editar** (ícono de lápiz)
4. **Agregar al final** (antes de la última línea):

```yaml
- archivo: Nombre del trabajo.pdf
  titulo: Título completo del trabajo
  lugar: Revista o publicación donde apareció (opcional)
  fecha: Fecha de publicación (opcional)
```

5. **Guardar los cambios**

### Subir el PDF del Trabajo

1. **Ir a la carpeta `descargas/trabajos/`**
2. **Hacer clic en "Add file"** → "Upload files"
3. **Subir el archivo PDF** con el nombre exacto del `archivo` en `trabajos.yml`
4. **Guardar los cambios**

### Quitar un Trabajo

1. **Editar `_data/trabajos.yml`**
2. **Eliminar las líneas** del trabajo que quieres quitar
3. **Guardar los cambios**
4. **Opcional**: Eliminar el PDF de `descargas/trabajos/`

---

## ⚠️ Reglas Importantes

### Nombres de Archivos
- **Los nombres de los archivos PDF deben coincidir EXACTAMENTE** con lo que está en los archivos `.yml`
- **No usar espacios especiales** como `ñ`, `á`, `é`, etc. en nombres de archivos
- **Usar solo letras, números, espacios y puntos**

### Estructura de los Archivos YAML
- **Mantener la indentación** (espacios al inicio de cada línea)
- **No eliminar los guiones** (`-`) al inicio de cada entrada
- **No eliminar los dos puntos** (`:`) después de cada campo

### Orden de Operaciones
1. **Primero** actualizar el archivo `.yml` correspondiente
2. **Después** subir o eliminar el archivo PDF
3. **Siempre** guardar los cambios

---

## 🔄 Cómo se Actualiza el Sitio Web

1. **Los cambios se guardan automáticamente** en GitHub
2. **El sitio se actualiza automáticamente** en unos minutos
3. **Puedes ver tu sitio en**: `https://estudio-marcos.github.io`

---

## 🆘 Si Algo Sale Mal

### Problemas Comunes
- **El PDF no aparece**: Verificar que el nombre del archivo coincida exactamente
- **Error al guardar**: Verificar que no haya caracteres especiales en los nombres
- **La página no se actualiza**: Esperar unos minutos, GitHub tarda en procesar los cambios

### Contacto para Ayuda
Si tienes problemas técnicos, contacta al administrador del sitio web.

---

## 📝 Resumen de Archivos Importantes

- **`_data/staff.yml`** → Lista del equipo
- **`_data/ponencias.yml`** → Lista de ponencias
- **`_data/trabajos.yml`** → Lista de trabajos publicados
- **`descargas/staff/`** → PDFs del equipo
- **`descargas/ponencias/`** → PDFs de ponencias
- **`descargas/trabajos/`** → PDFs de trabajos

---

**¡Recuerda: Siempre haz clic en "Commit changes" después de cualquier modificación!**
