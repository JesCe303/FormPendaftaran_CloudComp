@component('mail::message')
# Pendaftar baru masuk

Ada pendaftaran baru dengan detail berikut:

| Data | Detail |
|:--|:--|
| Nama | {{ $registration->name }} |
| Email | {{ $registration->email }} |
| Telepon | {{ $registration->phone }} |
| Institusi | {{ $registration->institution }} |
| Kategori | {{ str_replace('_', ' / ', $registration->category) }} |

**Motivasi**

{{ $registration->motivation }}
@endcomponent
