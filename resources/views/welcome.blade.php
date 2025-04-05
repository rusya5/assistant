{{-- resources/views/welcome.blade.php --}}
    <!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добро пожаловать в StreamLab.kz</title>
    <style>
        /* Основные стили */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fa;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
            text-align: center;
        }

        /* Контейнер для всей страницы */
        .main-container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
            padding: 40px;
            margin: 20px;
        }

        /* Заголовок */
        h1 {
            font-size: 36px;
            font-weight: 700;
            color: #4CAF50;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        /* Описание */
        p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* Список услуг */
        .service-list {
            list-style: none;
            padding: 0;
            margin-bottom: 30px;
        }

        .service-list li {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
            font-weight: 500;
        }

        /* Кнопка */
        .cta-button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s, transform 0.3s;
            margin-top: 20px;
        }

        .cta-button:hover {
            background-color: #45a049;
            transform: translateY(-3px);
        }

        .cta-button:active {
            transform: translateY(1px);
        }

        /* Стиль для раздела FAQ */
        .faq-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            margin-top: 40px;
        }

        .faq-container h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .faq-container ul {
            padding-left: 20px;
            text-align: left;
        }

        .faq-container li {
            font-size: 18px;
            color: #444;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .footer {
            margin-top: 40px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>
<div class="main-container">
    <h1>Добро пожаловать в StreamLab.kz!</h1>
    <p>Компания StreamLab.kz предоставляет услуги технического сопровождения мероприятий: от крупных конференций до небольших корпоративов. Мы обеспечиваем звук, видео, освещение, синхронный перевод, трансляции и много другое.</p>

    <p>Мы обслуживаем мероприятия разных типов:</p>
    <ul class="service-list">
        <li>Конференции</li>
        <li>Форумы</li>
        <li>Конгрессы</li>
        <li>Концерты</li>
        <li>Корпоративные мероприятия</li>
    </ul>

    <p>Наши опытные специалисты обеспечат поддержку на всех этапах мероприятия. Мы гарантируем, что ваше событие пройдет на высшем уровне.</p>

    <a href="https://t.me/BusinessChatDosBot" target="_blank" class="cta-button">Оставить заявку</a>

    <!-- Раздел с часто задаваемыми вопросами -->
    <div class="faq-container">
        <h2>Часто задаваемые вопросы</h2>
        <ul>
            <li><strong>Какие услуги вы предоставляете?</strong> Мы предоставляем полный спектр технического сопровождения: оборудование для звука, видео, освещения, синхронный перевод, трансляции и технические специалисты на площадке.</li>
            <li><strong>Какой у вас опыт?</strong> Мы работаем с международными организациями и проводим мероприятия любого масштаба — от небольших встреч до крупных конференций.</li>
            <li><strong>Можно ли арендовать только оборудование?</strong> Да, мы предлагаем аренду оборудования без специалистов, но для сложных решений (например, синхронный перевод или трансляции) рекомендуем наших инженеров.</li>
            <li><strong>Как проходит процесс работы с вами?</strong> 1. Вы оставляете заявку. 2. Мы готовим предложение. 3. Заключаем договор и монтируем оборудование. 4. Обеспечиваем техническую поддержку на месте.</li>
        </ul>
    </div>

    <div class="footer">
        <p>&copy; 2025 StreamLab.kz. Все права защищены.</p>
    </div>
</div>
</body>

</html>
