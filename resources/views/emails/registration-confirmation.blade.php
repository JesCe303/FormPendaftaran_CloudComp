@component('mail::message')
# Hai, {{ $registration->name }}!

Pendaftaran kamu sudah berhasil kami terima. Berikut detailnya:

**Institusi:** {{ $registration->institution }}  
**Kategori:** {{ str_replace('_', ' / ', $registration->category) }}  
**Email:** {{ $registration->email }}

Simpan email ini sebagai bukti pendaftaran. Tim kami akan menghubungi kamu jika ada informasi lanjutan.

Terima kasih,<br>
{{ config('mail.from.name') }}
@endcomponent
