<div class="fancy-recall-box p-0 hidden" id="fancy-recall-box">
    <div class="fancy-recall-box-wrapper">
        <div class="fancy-recall-box__header">
            <div class="fancy-recall-box__header-wrapper flex items-center justify-between w-full">
                <img src="assets/img/recall/logo-w.webp" alt="Смк сервис белый">
                <h2 class="font-semibold text-white text-xl">Сертификация<br>это просто</h2>
            </div>
        </div>
        <div class="fancy-recall-box__body p-8 flex items-center flex-col">
            <h3 class="text-center text-4xl font-semibold">Онлайн заявка</h3>
            <p class="text-center mt-5 font-light text-base">Перезвоним в течении 15 минут в рабочее время</p>

            <div class="fancy-recall-box__body-input w-full">
                <div class="fancy-recall-box__body-input-unit">
                    <label for="recall-window-person">Ваше имя</label>
                    <input type="text" name="recall-window-person" id="recall-window-person" placeholder="Иванов Иван">
                    <img src="assets/img/recall/person.svg" alt="smk-person-icon">
                    <p class="err-text text-xs hidden">Введите корректное имя</p>
                </div>

                <div class="fancy-recall-box__body-input-unit">
                    <label for="recall-window-number">Ваш номер</label>
                    <input type="text" name="recall-window-number" id="recall-window-number" placeholder="+7(999)999-99-99">
                    <img src="assets/img/recall/flag.svg" alt="smk-russia-icon">
                    <p class="err-text text-xs hidden">Введите корректный номер</p>
                </div>
            </div>

            <div class="policy-block w-full">
                <label for="policy-checkbox" class="flex items-center mt-6 text-base font-light">
                    <input type="checkbox" name="policy-checkbox" id="policy-checkbox" checked class="mr-3 mt-2">
                    Я согласен с политикой конфиденциальности
                </label>
                <p class="err-text text-xs hidden">Подтвердите согласие с политикой конфиденциальности</p>
            </div>

            <button class="recall-window__btn mt-10">Перезвоните мне</button>
        </div>
    </div>
    <!--/.fancy-recall-box-wrapper-->

    <div class="fancy-recall-box-success">
        <img src="assets/img/success-green.svg" alt="">
        <h2>Успех!</h2>
        <p>Сообщение успешно отправлено!<br>
            В ближайшее время мы Вам перезвоним</p>
        <button class="recall-window__close mt-10" onclick="Fancybox.close();">Закрыть</button>
    </div>
</div>
