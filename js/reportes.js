        // Obtener todas las secciones
        const sections = document.querySelectorAll('section');

        // Función para ocultar todas las secciones excepto la que se pasa como argumento
        function hideAllSectionsExcept(sectionToShow) {
            sections.forEach(section => {
                if (section !== sectionToShow) {
                    section.style.display = 'none';
                }
            });
        }

        // Mostrar la sección "ponencia" por defecto
        hideAllSectionsExcept(document.getElementById('ponencia'));

        // Manejar los clics en los enlaces del menú
        const links = document.querySelectorAll('main a');
        links.forEach(link => {
            link.addEventListener('click', event => {
                event.preventDefault(); // Evitar el comportamiento predeterminado del enlace
                
                const targetId = link.getAttribute('href'); // Obtener el ID de la sección a mostrar
                const targetSection = document.querySelector(targetId); // Encontrar la sección correspondiente
                
                hideAllSectionsExcept(targetSection); // Ocultar todas las secciones excepto la objetivo
                targetSection.style.display = 'block'; // Mostrar la sección objetivo
            });
        });