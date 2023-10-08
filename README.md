
# Laravel HEMIS API

HEMIS - Oliy ta’lim jarayonlarini boshqarish axborot tizimi
Ushbu axborot tizimi “Ma’muriy boshqaruv”, “O‘quv jarayoni”, “Ilmiy faoliyat” va “Moliyaviy boshqaruv” modullarini o‘z ichiga olgan.

Ushbu kutubxona orqali laravel frameworkida hemis api bilan ishlash yordamchi kutubxona




## Sozlanmalar

Kutubxonani ishlatish uchun laravel sozlanmalar faylida .env quyidagi ikki sozlanmani qo'shish talab etiladi.
```bash
  HEMISAPI_KEY="Sizning api kalitingiz"
  HEMISAPI_URL="Sizning hemis api asosiy urilingiz" // https://hemis.hemis.uz
```


## Foydalanish/Misollar

```php
 $hemisBackend = new HemisBackendApi();
 $response = $hemisBackend->getDeportmentList();
```


## Documentation

[Documentation](https://student.hemis.uz/rest/docs)
