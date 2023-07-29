 // Configure your options
        // const options = {
        //     /* check next step for available options */
        //     controlsSelector: '.fltr-controls',
        //     gridItemsSelector: '.filtr-item',
        //     spinner: {
        //         enabled: true,
        //     },
        // };

        // Adjust the CSS selector to match the container where
        // you set up your image gallery
        // const filterizr = new Filterizr('.filter-container', options);
        const filterizr = jQuery('.filter-container').filterizr({
            controlsSelector: '.fltr-controls',
            gridItemsSelector: '.filtr-item',
            spinner: {
                enabled: true,
            },
        });
        // document.querySelector("#shuffle").addEventListener('click', function (event) {
        //     filterizr.shuffle();
        // })
        jQuery("#shuffle").click(() => {
            filterizr.filterizr('shuffle');
        })

        const sortFilterizr = (order) => {
            // let selected_option = document.querySelector("select").options.selectedIndex;
            // let selected_val = document.querySelector("select").options[selected_option].value;
            //jQuery("#elementId :selected").val();
            filterizr.filterizr('sort',jQuery("select :selected").val(), order);
            //filterizrInstance.filterizr('sort', attribute, order);

        }
        jQuery("#asc-btn").click(() => sortFilterizr('asc'));
        jQuery("#des-btn").click(() => sortFilterizr('desc'));
        // document.querySelector("#asc-btn").addEventListener('click', () => sortFilterizr('asc'), false);
        // document.querySelector("#des-btn").addEventListener('click', () => sortFilterizr('desc'), false);