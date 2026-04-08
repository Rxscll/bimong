# Images Folder Structure

## Folder Organization:
- `landing/` - Gambar untuk landing page (background, hero images, dll)
- `books/` - Gambar cover buku dan assets terkait buku
- `logos/` - Logo aplikasi, logo sekolah, dll
- `icons/` - Icon dan assets kecil lainnya

## File Locations:
- Landing Background: `landing/bg-perpus.jpg`
- Book Covers: `books/[book-id]-[book-title].jpg`
- App Logo: `logos/logo-app.png`
- School Logo: `logos/logo-sekolah.png`

## Image Guidelines:
- **Format**: JPG, PNG, WebP
- **Size**: Optimized untuk web (max 500KB per image)
- **Dimensions**: 
  - Landing background: 1920x1080px (16:9)
  - Book covers: 400x600px (2:3 ratio)
  - Logos: Square atau landscape sesuai kebutuhan
- **Quality**: Balance antara kualitas dan file size

## Usage in Blade Templates:
```blade
<!-- Landing background -->
background: url('{{ asset('images/landing/bg-perpus.jpg') }}')

<!-- Book cover -->
<img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->judul }}">

<!-- App logo -->
<img src="{{ asset('images/logos/logo-app.png') }}" alt="Logo">
```
