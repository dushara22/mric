/**
 * @file
 * JavaScript для модуля My Module.
 *
 * Drupal Behaviors — это способ гарантировать, что JS-код выполнится
 * как при полной загрузке страницы, так и при AJAX-обновлениях.
 */

((Drupal, once) => {
    'use strict';
  
    /**
     * Поведение для страницы модуля.
     *
     * @type {Drupal~behavior}
     */
    Drupal.behaviors.myModulePage = {
      /**
       * Функция attach вызывается при загрузке и AJAX-обновлениях.
       *
       * @param {HTMLElement} context
       *   Корневой элемент (document при первой загрузке, обновлённый элемент при AJAX).
       * @param {object} settings
       *   drupalSettings — данные, переданные из PHP.
       */
      attach(context, settings) {
        // once() гарантирует однократное выполнение для каждого элемента.
        once('my-module-greeting', '.my-module-greeting', context)
          .forEach((element) => {
            // Добавляем анимацию при появлении.
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            element.style.transition = 'opacity 0.5s, transform 0.5s';
  
            requestAnimationFrame(() => {
              element.style.opacity = '1';
              element.style.transform = 'translateY(0)';
            });
  
            console.log('My Module initialized!', settings);
          });
      },
  
      /**
       * Функция detach вызывается при удалении элемента из DOM (AJAX).
       */
      detach(context, settings, trigger) {
        if (trigger === 'unload') {
          // Очистка ресурсов при удалении элемента.
        }
      },
    };
  
  })(Drupal, once);
