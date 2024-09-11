@extends('layers.layer')
@section('title', $pageInfo['title'])
@section('description', $pageInfo['description'])

@section('content')
    <main>
        <div class="banner-block w-full">
            <picture>
                <source
                    srcset="assets/img/banner-mobile.webp"
                    media="(max-width: 767px)">
                <img src="assets/img/banner.webp" alt="Смк сервис - сервис по сертификации, ISO и СМК" class="w-full object-cover">
            </picture>

            <div class="banner-container">
                <div class="box-container">
                    <div class="banner-container__wrapper">
                        <h1 class="font-semibold text-white text-4xl">Сертификация - это просто.</h1>
                        <p class="text-lg text-white mt-8">Обратившись в СМК Сервис все вопросы сертификации мы возьмем на себя.</p>
                        <a href="#iso"><button class="banner-btn text-sm px-4 py-2 bg-white rounded cursor-pointer mt-8">Подробнее</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.banner-block -->

        <div class="box-container">
            <div class="adv-block py-12 flex justify-between flex-wrap">

                <div class="adv-block__item w-56 flex flex-col items-center">
                    <div class="adv-block__item-img w-28 h-28 flex justify-center items-center">
                        <img src="assets/img/advantages/1.svg" alt="Выделенный специалист с высокой квалификацией и большим стажем работы">
                    </div>
                    <p class="text-center mt-2">Выделенный специалист с высокой квалификацией и большим стажем работы</p>
                </div>
                <!--/.adv-block__item-->

                <div class="adv-block__item w-56 flex flex-col items-center">
                    <div class="adv-block__item-img w-28 h-28 flex justify-center items-center">
                        <img src="assets/img/advantages/2.svg" alt="Полный комплект документов под ключ. Берем всю волокиту на себя">
                    </div>
                    <p class="text-center mt-2">Полный комплект документов под ключ. Берем всю волокиту на себя</p>
                </div>
                <!--/.adv-block__item-->

                <div class="adv-block__item w-56 flex flex-col items-center">
                    <div class="adv-block__item-img w-28 h-28 flex justify-center items-center">
                        <img src="assets/img/advantages/3.svg" alt="Прочные связи с аккредитованными органами. Гибкий подход">
                    </div>
                    <p class="text-center mt-2">Прочные связи с аккредитованными органами. Гибкий подход</p>
                </div>
                <!--/.adv-block__item-->

                <div class="adv-block__item w-56 flex flex-col items-center">
                    <div class="adv-block__item-img w-28 h-28 flex justify-center items-center">
                        <img src="assets/img/advantages/4.svg" alt="Наша квалификация позволяет выполнять работы с высокой скоростью<">
                    </div>
                    <p class="text-center mt-2">Наша квалификация позволяет выполнять работы с высокой скоростью</p>
                </div>
                <!--/.adv-block__item-->

            </div>
            <!--/.adv-block-->
        </div>
        <!--/.adv-block-->

        @if($categories)
            @foreach($categories as $category)
                <section class="service-block {{$category['class_name']}}" id="{{$category['id_name']}}">
                    <div class="serv-block__header pt-20">
                        <div class="serv-block__header-wrapper">
                            <div class="box-container">
                                <div class="serv-block-title">
                                    <h2>{{$category['category_title']}}</h2>
                                    <div class="line"></div>
                                </div>
                                <!-- /.serv-block-title -->
                            </div>
                        </div>
                    </div>

                    <div class="service-list pb-14">
                        <div class="box-container">
                            @if($category['services'])
                                <div class="service-list__wrapper flex justify-between flex-wrap gap-y-14">
                                    @foreach($category['services'] as $service)
                                        <div class="service-item bg-white border border-gray-500">
                                            <div class="service-item__header">
                                                <div class="service-item__counter">
                                                    <span>{{$service['counter']}}</span>
                                                </div>
                                                <div class="service-item__text">
                                                    <h3>{{$service['title']}}</h3>
                                                </div>
                                            </div>
                                            <!--/.service-item__header-->

                                            <div class="service-item__body">
                                                <p>{{$service['description']}}</p>
                                            </div>

                                            <div class="service-item__footer">
                                                <h4>от {{$service['price']}}</h4>
                                                @if($service['example'])
                                                    <a href="{{$service['example']}}">
                                                        <button class="service-item__btn">Образец</button>
                                                    </a>
                                                @endif
                                                <button class="service-item__btn" data-fancybox data-src="#fancy-recall-box">Уточнить стоимость</button>
                                            </div>
                                        </div>
                                        <!--/.service-item-->
                                    @endforeach
                                </div>
                                <!-- /.service-list__wrapper -->
                            @endif
                        </div>
                    </div>
                    <!--/.service-list-->
                </section>
                <!-- /.service-block -->
            @endforeach
        @endif


        <section class="recall-block">
            <div class="box-container">
                <div class="recall-block__wrapper flex justify-between items-start">
                    <div class="recall-block__text">
                        <h2 class="text-5xl font-semibold">НЕ ЗНАЕТЕ ЧТО ИМЕННО ВАМ ТРЕБУЕТСЯ?</h2>
                        <p class="mt-8 text-2xl">Наши менеджеры свяжутся с Вами в рабочее время и предложат лучшее решение Ваших задач</p>
                    </div>
                    <!--/.recall-block__text-->

                    <div class="recall-block__input-list">
                        <div class="recall-block__input">
                            <input type="text" id="recall-block-name" placeholder="Ваше имя">
                            <p class="err-block text-white mt-2 text-xs hidden">Введите корректное имя</p>
                        </div>
                        <div class="recall-block__input">
                            <input type="text" id="recall-block-phone" placeholder="Ваш телефон">
                            <p class="err-block text-white mt-2 text-xs hidden">Введите корректный телефон</p>
                        </div>
                        <div class="recall-block__input">
                            <input type="text" id="recall-block-email" placeholder="Ваша почта">
                            <p class="err-block text-white mt-2 text-xs hidden">Введите корректную почту</p>
                        </div>
                        <div class="recall-block__input">
                            <textarea placeholder="Ваш вопрос" id="recall-block-message"></textarea>
                            <p class="err-block text-white mt-2 text-xs hidden">Длинна сообщения должна быть не менее 10 символов</p>
                        </div>
                        <button class="send-recall">Отправить</button>
                    </div>

                    <div class="recall-block-success">
                        <img src="assets/img/success-white.svg" alt="">
                        <h3>Успех!</h3>
                        <p>Сообщение успешно отправлено!<br>В ближайшее время мы Вам перезвоним</p>
                    </div>
                </div>
            </div>
        </section>
        <!--/.recall-block-->

        <div class="box-container">
            <section class="info-section about-section py-14" id="about">
                <div class="info-section__title">
                    <h2>О НАС</h2>
                    <div class="line"></div>
                </div>

                <div class="about flex justify-between items-center pt-9">
                    <div class="about__text">
                        <p>Компания СМК Сервис имеет  многолетний профессиональный опыт в оформлении разрешительной документации, оказывает широкий спектр услуг в области подтверждения соответствия продукции.</p>
                        <p class="mt-4">Длительное время на рынке сертификации, за это время налажены прочные связи с различными аккредитованными органами и лабораториями, а также государственными органами, что позволяет решать задачи разной сложности, а также находить индвидуальный подход к запросам клиентов.</p>
                        <img src="assets/img/logo.webp" alt="Смк Сервис" class="mt-10">
                        <button class="about-recall mt-10 px-5 py-2 rounded" data-fancybox data-src="#fancy-recall-box">Напишите нам</button>
                    </div>
                    <img src="assets/img/about-img.webp" class="about-img" alt="Березин Михаил Евгеньевич">
                </div>
            </section>
            <!--/.about-section-->

            <section class="info-section contacts-section py-14" id="contacts">
                <div class="info-section__title">
                    <h2>КЛИЕНТЫ</h2>
                    <div class="line"></div>
                </div>

                <div class="clients-block">
                    <div class="client-item">
                        <div class="client-item__img">
                            <img src="/assets/img/clients/1.jpg" alt="">
                        </div>
                        <p>Гренадер</p>
                    </div>

                    <div class="client-item">
                        <div class="client-item__img">
                            <img src="/assets/img/clients/2.png" alt="">
                        </div>
                        <p>Хлебный Спас</p>
                    </div>

                    <div class="client-item">
                        <div class="client-item__img">
                            <img src="/assets/img/clients/3.png" alt="">
                        </div>
                        <p>Галантус</p>
                    </div>

                    <div class="client-item">
                        <div class="client-item__img">
                            <img src="/assets/img/clients/4.jpg" alt="">
                        </div>
                        <p>И-Продакт</p>
                    </div>

                    <div class="client-item">
                        <div class="client-item__img">
                            <img src="/assets/img/clients/5.svg" alt="">
                        </div>
                        <p>Эконива</p>
                    </div>

                    <div class="client-item">
                        <div class="client-item__img">
                            <img src="/assets/img/clients/6.png" alt="">
                        </div>
                        <p>Итера</p>
                    </div>

                    <div class="client-item">
                        <div class="client-item__img">
                            <img src="/assets/img/clients/7.png" alt="">
                        </div>
                        <p>Ермолино-молоко</p>
                    </div>
                </div>
            </section>

            <section class="info-section contacts-section py-14" id="contacts">
                <div class="info-section__title">
                    <h2>КОНТАКТЫ</h2>
                    <div class="line"></div>
                </div>

                <div class="contact-line flex items-center justify-between mt-10">
                    <img src="assets/img/logo.webp" alt="Смк сервис">

                    <div class="geo-block flex items-center">
                        <img src="assets/img/contacts/geo.svg" alt="smk-geo-icon-green">
                        <p class="ml-3">г. Калуга<br>ул. Кирпичный завод МПС 15</p>
                    </div>
                    <!-- /.geo-block -->

                    <div class="contact-line-block">
                        <a href="#">
                            <div class="contact-line-block__unit flex items-center">
                                <div class="img-contact-unit-box">
                                    <img src="assets/img/contacts/email.svg" alt="smk-email-icon-green">
                                </div>
                                <p class="ml-3 text-sm">info@smk-service40.ru</p>
                            </div>
                        </a>

                        <a href="#" class="flex mt-2">
                            <div class="contact-line-block__unit flex items-center">
                                <div class="img-contact-unit-box">
                                    <img src="assets/img/contacts/phone.svg" alt="smk-phone-icon-green">
                                </div>
                                <p class="ml-3 text-sm">+7 902 932 62 44</p>
                            </div>
                        </a>
                    </div>
                    <!--/.contact-line-block-->

                    <div class="contact-line-block">
                        <a href="#">
                            <div class="contact-line-block__unit flex items-center">
                                <div class="img-contact-unit-box">
                                    <img src="assets/img/contacts/whatsapp.svg" alt="smk-whatsapp-icon-green">
                                </div>
                                <p class="ml-3 text-sm">https://wa.me/79029326244</p>
                            </div>
                        </a>

                        <a href="#" class="flex mt-2">
                            <div class="contact-line-block__unit flex items-center">
                                <div class="img-contact-unit-box">
                                    <img src="assets/img/contacts/telegram.svg" alt="smk-telegram-icon-green">
                                </div>
                                <p class="ml-3 text-sm">https://t.me/smkservice40</p>
                            </div>
                        </a>
                    </div>
                    <!--/.contact-line-block-->
                </div>
                <!-- /.contact-line -->

                <div class="map-block">
                    <script async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A18b47dc6193593b245af72d8027299df191a777c8151158ad998cb259845df98&amp;width=100%25&amp;height=350&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
            </section>
            <!--/.contacts-section-->
        </div>
    </main>
@endsection
