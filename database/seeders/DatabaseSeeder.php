<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\EquipmentsServicesType::insert([
             ['name' => 'Услуги'],
             ['name' => 'Звук'],
             ['name' => 'Видео'],
             ['name' => 'Синхронный перевод'],
             ['name' => 'Трансляция и конференции'],
             ['name' => 'Освещение'],
             ['name' => 'Дополнительное оборудование'],
         ]);

         \App\Models\EventType::insert([
             ['name' => 'Конференция'],
             ['name' => 'Форум'],
             ['name' => 'Конгресс'],
             ['name' => 'Концерт'],
             ['name' => 'Корпоративные мероприятия'],
         ]);

        \App\Models\EquipmentsService::insert([
            // Звук
            ['type_id' => 2, 'title' => 'Комплект звукового оборудования', 'description' => 'Акустическая система, микшерный пульт', 'price' => 25000],
            ['type_id' => 2, 'title' => 'Настольный микрофон', 'description' => 'Проводной микрофон для размещения на столе', 'price' => 3000],
            ['type_id' => 2, 'title' => 'Радиомикрофоны', 'description' => 'Беспроводные ручные микрофоны', 'price' => 5000],
            ['type_id' => 2, 'title' => 'Гарнитурные микрофоны', 'description' => 'Микрофоны, крепящиеся на голову, для свободных рук', 'price' => 5000],
            ['type_id' => 2, 'title' => 'Петличные микрофоны', 'description' => 'Компактные микрофоны, крепящиеся на одежду', 'price' => 4000],
            ['type_id' => 2, 'title' => 'Акустические колонки', 'description' => 'Основные громкоговорители для воспроизведения звука', 'price' => 7000],
            ['type_id' => 2, 'title' => 'Сабвуферы', 'description' => 'Колонки для воспроизведения низких частот', 'price' => 10000],

            // Видео
            ['type_id' => 3, 'title' => 'Телевизоры', 'description' => 'Экраны для показа видео и презентаций', 'price' => 15000],
            ['type_id' => 3, 'title' => 'Проекторы', 'description' => 'Проекционное оборудование для отображения изображений на экран', 'price' => 20000],
            ['type_id' => 3, 'title' => 'Экраны для проектора', 'description' => 'Проекционные экраны различного размера', 'price' => 5000],
            ['type_id' => 3, 'title' => 'Светодиодные LED-экраны', 'description' => 'Яркие модули для отображения изображения в высоком качестве', 'price' => 70000],
            ['type_id' => 3, 'title' => 'Видеокамеры', 'description' => 'Статичные, PTZ, операторские камеры для записи и трансляций', 'price' => 30000],
            ['type_id' => 3, 'title' => 'Видеомикшеры', 'description' => 'Оборудование для переключения видеосигналов в реальном времени', 'price' => 15000],
            ['type_id' => 3, 'title' => 'Видео-сплиттеры и переключатели', 'description' => 'Разделение и переключение видеосигналов между источниками и экранами', 'price' => 8000],
            ['type_id' => 3, 'title' => 'Захват видео', 'description' => 'Оборудование для подключения видеосигналов к компьютеру или стриминг-платформам', 'price' => 12000],

            // Синхронный перевод
            ['type_id' => 4, 'title' => 'Оборудование для синхронного перевода', 'description' => 'Комплексная система для перевода речи в реальном времени', 'price' => 40000],
            ['type_id' => 4, 'title' => 'Приемники для слушателей', 'description' => 'Индивидуальные устройства для прослушивания перевода', 'price' => 1500],
            ['type_id' => 4, 'title' => 'Кабины для переводчиков', 'description' => 'Звукоизолированные кабины для комфортной работы переводчиков', 'price' => 20000],
            ['type_id' => 4, 'title' => 'Консоли для переводчиков', 'description' => 'Пульты управления для работы переводчиков', 'price' => 15000],

            // Трансляция и конференции
            ['type_id' => 5, 'title' => 'Сервер для трансляций', 'description' => 'Машина для хостинга видеопотоков и записи', 'price' => 25000],
            ['type_id' => 5, 'title' => 'Оборудование для онлайн-стриминга', 'description' => 'Комплекты для трансляции в Zoom, YouTube, соцсети', 'price' => 30000],
            ['type_id' => 5, 'title' => 'PTZ-камеры с управлением', 'description' => 'Поворотные камеры с дистанционным управлением', 'price' => 40000],
            ['type_id' => 5, 'title' => 'Запись видео и звука мероприятия', 'description' => 'Организация записи всей конференции или события', 'price' => 10000],

            // Освещение
            ['type_id' => 6, 'title' => 'Конференционные светильники', 'description' => 'Освещение для зала или сцены с мягким светом', 'price' => 8000],
            ['type_id' => 6, 'title' => 'Сценические светильники', 'description' => 'PAR, профили, прожекторы для акцентного света на сцене', 'price' => 12000],
            ['type_id' => 6, 'title' => 'Динамическое освещение', 'description' => 'Эффектные приборы с движущимися элементами', 'price' => 18000],
            ['type_id' => 6, 'title' => 'Пульт управления светом', 'description' => 'Контроллер освещения для управления световыми сценами', 'price' => 10000],

            // Дополнительное оборудование
            ['type_id' => 7, 'title' => 'Ноутбуки', 'description' => 'Мощные ноутбуки для презентаций, трансляций, управления', 'price' => 10000],
            ['type_id' => 7, 'title' => 'Стабилизаторы и штативы для камер', 'description' => 'Оборудование для устойчивой съёмки', 'price' => 5000],
            ['type_id' => 7, 'title' => 'HDMI/SDI сплиттеры и удлинители', 'description' => 'Устройства для разделения видеосигналов и их передачи на большие расстояния', 'price' => 4000],
            ['type_id' => 7, 'title' => 'Коммутаторы для подключения нескольких источников видео', 'description' => 'Оборудование для переключения видеовходов', 'price' => 6000],
            ['type_id' => 7, 'title' => 'Источники бесперебойного питания', 'description' => 'ИБП для защиты техники от отключений электричества', 'price' => 7000],

            // Услуги
            ['type_id' => 1, 'title' => 'Техническое сопровождение мероприятий', 'description' => 'Работа инженеров на площадке, обеспечение стабильной работы оборудования', 'price' => 30000],
            ['type_id' => 1, 'title' => 'Режиссура прямого эфира', 'description' => 'Организация плана трансляции, контроль видеопотоков, сценарий', 'price' => 20000],
            ['type_id' => 1, 'title' => 'Настройка и обслуживание оборудования', 'description' => 'Настройка, проверка и поддержка техники до и во время мероприятия', 'price' => 15000],
            ['type_id' => 1, 'title' => 'Консультации по техническим решениям', 'description' => 'Помощь в выборе оборудования и построении схемы мероприятия', 'price' => 10000],
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
