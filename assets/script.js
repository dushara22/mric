// Словарь переводов
const translations = {
    ru: {
        logo_sub: "г. Могилев",
        btn_accessible: "Для слабовидящих",
        nav_home: "Главная",
        nav_about: "Об учреждении ▾",
        nav_news: "Новости",
        nav_anticor: "Антикоррупционный уголок",
        nav_onewindow: "Одно окно",
        nav_appeal: "Электронное обращение",
        sub_history: "История",
        sub_departments: "Отделения школы",
        sub_admin: "Администрация",
        sub_coaches: "Тренеры",
        sub_pride: "Наша гордость",
        sub_media: "Медиа",
        hero_title: "Добро пожаловать на сайт СДЮШОР №4",
        hero_sub: "Развиваем олимпийские виды спорта: лыжные гонки, конькобежный спорт, горнолыжный спорт",
        date_aug4: "Декабрь 4, 2024",
        news1_title: "БУДЬТЕ ГОТОВЫ И ПРОЯВИТЕ БДИТЕЛЬНОСТЬ",
        news1_text: "Вам звонят по телефону и сообщают, что кто-то из близких попал в беду и нужна крупная сумма денег. Не спешите выполнять указания звонящего. Мошенники умело используют психологические приемы. Положите трубку и перезвоните родственнику.",
        date_aug20: "Август 20, 2024",
        news2_title: "СОВЕТЫ СВЕТОФОРА",
        news2_text: "Правила дорожного движения для юных спортсменов. Переходите дорогу только по пешеходному переходу и на зеленый свет светофора!",
        date_jan26: "Январь 26, 2021",
        news3_title: "ТЕЛЕФОНЫ ДОВЕРИЯ",
        date_nov29: "Ноябрь 29, 2020",
        news4_title: "Поддержка детей с ограниченными возможностями",
        news4_text: "Белорусский детский фонд проводит новогодний благотворительный марафон по сбору средств для помощи детям с редкими заболеваниями.",
        contacts_title: "КОНТАКТЫ",
        links_title: "ПОЛЕЗНЫЕ ССЫЛКИ",
        link1: "Министерство спорта РБ",
        link2: "Могилевский городской исполнительный комитет",
        link3: "Белорусская федерация лыжных гонок",
        link4: "Белорусский союз конькобежцев",
        link5: "Белорусская Федерация Горнолыжного Спорта",
        footer_rights: "Все права защищены.",
        
        /* Новые ключи для страницы "История" */
        page_history_title: "История",
        hist_about_title: "О школе",
        hist_about_text: "ГСУСУ \"Могилевская городская СДЮШОР № 4\" развивает три олимпийских вида спорта – горнолыжный спорт, конькобежный спорт, лыжные гонки.",
        hist_admin_title: "Администрация",
        hist_admin_text: "Государственного специализированного учебно-спортивного учреждения \"Могилевская городская специализированная детско-юношеская школа олимпийского резерва № 4\"",
        hist_school_title: "История школы",
        hist_school_text1: "Лыжный спорт в городе Могилеве славится давней традицией, однако массовости, широкого признания и высокого спортивного мастерства он достиг в послевоенный период. Большую роль в этом сыграло лыжное отделение в детско-юношеской спортивной школе при Могилевском гороне в 1946 году. Прививая с юных лет любовь к лыжным гонкам, обучая красивой экономной и самой совершенной технике, развивая общефизическую и специальную подготовку – создавалась многолетняя школа лыжного спорта.",
        hist_school_text2: "В 1976 году в Могилеве был открыт Дворец спорта с искусственным льдом, и в городе начала развиваться новая спортивная дисциплина — конькобежный спорт. В связи с этим в 1976 году в городе была открыта ДЮСШ по конькобежному спорту, которая в 1981 году была переименована в специализированную детско-юношескую школу олимпийского резерва №4.",
        btn_more: "ПОДРОБНЕЕ..."
    },
    by: {
        logo_sub: "г. Магілёў",
        btn_accessible: "Для слабабачачых",
        nav_home: "Галоўная",
        nav_about: "Аб установе ▾",
        nav_news: "Навіны",
        nav_anticor: "Антыкарупцыйны куток",
        nav_onewindow: "Адно акно",
        nav_appeal: "Электронны зварот",
        sub_history: "Гісторыя",
        sub_departments: "Аддзяленні школы",
        sub_admin: "Адміністрацыя",
        sub_coaches: "Трэнеры",
        sub_pride: "Наш гонар",
        sub_media: "Медыя",
        hero_title: "Сардэчна запрашаем на сайт СДЮШАР №4",
        hero_sub: "Развіваем алімпійскія віды спорту: лыжныя гонкі, канькабежны спорт, горналыжны спорт",
        date_aug4: "Снежань 4, 2024",
        news1_title: "БУДЗЬЦЕ ГАТОВЫЯ І ПРАЯВІЦЕ ПІЛЬНАСЦЬ",
        news1_text: "Вам тэлефануюць і паведамляюць, што хтосьці з блізкіх трапіў у бяду і патрэбна буйная сума грошай. Не спяшайцеся выконваць указанні тэлефануючага. Махляры ўмела выкарыстоўваюць псіхалагічныя прыёмы. Пакладзіце трубку і ператэлефануйце сваяку.",
        date_aug20: "Жнівень 20, 2024",
        news2_title: "САВЕТЫ СВЯТЛАФОРА",
        news2_text: "Правілы дарожнага руху для юных спартсменаў. Пераходзьце дарогу толькі па пешаходным пераходзе і на зялёнае святло святлафора!",
        date_jan26: "Студзень 26, 2021",
        news3_title: "ТЭЛЕФОНЫ ДАВЕРУ",
        date_nov29: "Лістапад 29, 2020",
        news4_title: "Падтрымка дзяцей з абмежаванымі магчымасцямі",
        news4_text: "Беларускі дзіцячы фонд праводзіць навагодні дабрачынны марафон па зборы сродкаў для дапамогі дзецям з рэдкімі захворваннямі.",
        contacts_title: "КАНТАКТЫ",
        links_title: "КАРЫСНЫЯ СПАСЫЛКІ",
        link1: "Міністэрства спорту РБ",
        link2: "Магілёўскі гарадскі выканаўчы камітэт",
        link3: "Беларуская федэрацыя лыжных гонак",
        link4: "Беларускі саюз канькабежцаў",
        link5: "Беларуская Федэрацыя Горналыжнага Спорту",
        footer_rights: "Усе правы абаронены.",
        
        /* Новые ключи для страницы "История" */
        page_history_title: "Гісторыя",
        hist_about_title: "Аб школе",
        hist_about_text: "ДСУСУ \"Магілёўская гарадская СДЮШАР № 4\" развівае тры алімпійскія віды спорту – горналыжны спорт, канькабежны спорт, лыжныя гонкі.",
        hist_admin_title: "Адміністрацыя",
        hist_admin_text: "Дзяржаўнай спецыялізаванай вучэбна-спартыўнай установы \"Магілёўская гарадская спецыялізаваная дзіцяча-юнацкая школа алімпійскага рэзерву № 4\"",
        hist_school_title: "Гісторыя школы",
        hist_school_text1: "Лыжны спорт у горадзе Магілёве славіцца даўняй традыцыяй, аднак масавасці, шырокага прызнання і высокага спартыўнага майстэрства ён дасягнуў у пасляваенны перыяд. Вялікую ролю ў гэтым адыграла лыжнае аддзяленне ў дзіцяча-юнацкай спартыўнай школе пры Магілёўскім гароне ў 1946 годзе. Прывіваючы з юных гадоў любоў да лыжных гонак, навучаючы прыгожай эканомнай і самай дасканалай тэхніцы, развіваючы агульнафізічную і спецыяльную падрыхтоўку – стваралася шматгадовая школа лыжнага спорту.",
        hist_school_text2: "У 1976 годзе ў Магілёве быў адкрыты Палац спорту з штучным лёдам, і ў горадзе пачала развівацца новая спартыўная дысцыпліна — канькабежны спорт. У сувязі з гэтым у 1976 годзе ў горадзе была адкрыта ДЮСШ па канькабежным спорце, якая ў 1981 годзе была перайменавана ў спецыялізаваную дзіцяча-юнацкую школу алімпійскага рэзерву №4.",
        btn_more: "ПАДРАБЯЗНЕЙ..."
    },
    en: {
        logo_sub: "Mogilev",
        btn_accessible: "For visually impaired",
        nav_home: "Home",
        nav_about: "About Us ▾",
        nav_news: "News",
        nav_anticor: "Anti-Corruption",
        nav_onewindow: "One Window",
        nav_appeal: "E-Appeal",
        sub_history: "History",
        sub_departments: "School Departments",
        sub_admin: "Administration",
        sub_coaches: "Coaches",
        sub_pride: "Our Pride",
        sub_media: "Media",
        hero_title: "Welcome to Sports School No. 4",
        hero_sub: "Developing Olympic sports: cross-country skiing, speed skating, alpine skiing",
        date_aug4: "December 4, 2024",
        news1_title: "BE PREPARED AND VIGILANT",
        news1_text: "You receive a call saying a relative is in trouble and needs a large sum of money. Do not rush to follow the caller's instructions. Scammers skillfully use psychological techniques. Hang up and call your relative back.",
        date_aug20: "August 20, 2024",
        news2_title: "TRAFFIC LIGHT TIPS",
        news2_text: "Traffic rules for young athletes. Cross the road only at a pedestrian crossing and on the green light!",
        date_jan26: "January 26, 2021",
        news3_title: "HELPLINES",
        date_nov29: "November 29, 2020",
        news4_title: "Support for children with disabilities",
        news4_text: "The Belarusian Children's Fund is holding a New Year charity marathon to raise funds to help children with rare diseases.",
        contacts_title: "CONTACTS",
        links_title: "USEFUL LINKS",
        link1: "Ministry of Sports of RB",
        link2: "Mogilev City Executive Committee",
        link3: "Belarusian Cross-Country Skiing Federation",
        link4: "Belarusian Skating Union",
        link5: "Belarusian Alpine Skiing Federation",
        footer_rights: "All rights reserved.",
        
        /* Новые ключи для страницы "История" */
        page_history_title: "History",
        hist_about_title: "About School",
        hist_about_text: "State specialized educational and sports institution \"Mogilev City Specialized Children and Youth School of Olympic Reserve No. 4\" develops three Olympic sports - alpine skiing, speed skating, cross-country skiing.",
        hist_admin_title: "Administration",
        hist_admin_text: "State specialized educational and sports institution \"Mogilev City Specialized Children and Youth School of Olympic Reserve No. 4\"",
        hist_school_title: "School History",
        hist_school_text1: "Cross-country skiing in Mogilev has a long tradition, but it reached mass popularity, wide recognition and high sportsmanship in the post-war period. A major role in this was played by the ski department at the children's and youth sports school at Mogilev Mountain in 1946. Instilling a love for cross-country skiing from a young age, teaching beautiful economical and the most perfect technique, developing general physical and special training - a long-term school of skiing was created.",
        hist_school_text2: "In 1976, a sports palace with artificial ice was opened in Mogilev, and a new sports discipline began to develop in the city - speed skating. In this regard, in 1976 a youth sports school for speed skating was opened in the city, which in 1981 was renamed the Specialized Children and Youth School of Olympic Reserve No. 4.",
        btn_more: "READ MORE..."
    }
};

window.setLang = function(lang, event) {
    // Меняем активный класс у кнопок
    document.querySelectorAll('.lang-btn').forEach(btn => btn.classList.remove('active'));
    if (event) {
        event.target.classList.add('active');
    }

    // Ищем все элементы с data-lang-key и меняем текст
    document.querySelectorAll('[data-lang-key]').forEach(el => {
        const key = el.getAttribute('data-lang-key');
        if (translations[lang] && translations[lang][key]) {
            // Проверяем, есть ли внутри теги (например, <strong>), чтобы не сломать их
            if (el.children.length > 0) {
                el.innerHTML = translations[lang][key];
            } else {
                el.textContent = translations[lang][key];
            }
        }
    });
}

window.toggleAccessible = function() {
    document.body.classList.toggle('accessible-mode');
}