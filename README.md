
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
    use Dasturchiuz\Hemisapi\HemisBackendApi;
    use Dasturchiuz\Hemisapi\Models\DeportmentModel;
    use App\Models\Departments; //Custom model for departments
```


```php
    $hemisBackend = new HemisBackendApi();
    $response = $hemisBackend->getDeportmentList();
    $pagination = null;
    if($response){
        $pagination = $response->pagination;
        for ($i=1; $i <=$pagination->pageCount; $i++){
            $responseInForeach = $hemisBackend->getDeportmentList($i);
            /* @var $item DeportmentModel */
            foreach ($responseInForeach->data as $item ){
                $deportment = new Departments();
                $deportment->id = $item->id;
                $deportment->parent_id = $item->parent;
                $deportment->title = $item->name;
                $deportment->code_hemis = $item->code;
                $deportment->structure_type_code = $item->structureType->code;
                $deportment->structure_type_name = $item->structureType->name;
                $deportment->save();
            }
        }
    }
```

## Documentation

[Documentation](https://student.hemis.uz/rest/docs)

