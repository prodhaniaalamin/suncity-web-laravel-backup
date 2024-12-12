
// Datatable handler
var dataTableDom;
var ClassicDataTable = function () {
    // Private functions

    var initClassic = function () {

        // Set date data order
        const table = document.querySelector('.classic-data-table');
        if(!table) {
            return false;
        }

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        dataTableDom = $(table).DataTable(dataTableOptions);

        // Filter dropdown elements
        const filterOrders = document.querySelector('[data-table-filter-column="select-option"]');
        const filterYear = document.querySelector('[data-table-filter="by-date"]');

        // Filter by order status --- official docs reference: https://datatables.net/reference/api/search()
        filterOrders && filterYear.dataset.filterColumnNo && filterOrders.addEventListener('change', function (e) {
            dataTableDom.columns(filterYear.dataset.filterColumnNo).search(e.target.value).draw();
        });

        // Filter by date --- official docs reference: https://momentjs.com/docs/
        var minDate;
        var maxDate;
        filterYear && filterYear.addEventListener('change', function (e) {
            const value = e.target.value;
            switch (value) {
                case 'thisyear': {
                    minDate = moment().startOf('year').format('x');
                    maxDate = moment().endOf('year').format('x');
                    dataTableDom.draw();
                    break;
                }
                case 'thismonth': {
                    minDate = moment().startOf('month').format('x');
                    maxDate = moment().endOf('month').format('x');
                    dataTableDom.draw();
                    break;
                }
                case 'lastmonth': {
                    minDate = moment().subtract(1, 'months').startOf('month').format('x');
                    maxDate = moment().subtract(1, 'months').endOf('month').format('x');
                    dataTableDom.draw();
                    break;
                }
                case 'last90days': {
                    minDate = moment().subtract(30, 'days').format('x');
                    maxDate = moment().format('x');
                    dataTableDom.draw();
                    break;
                }
                default: {
                    minDate = moment().subtract(100, 'years').startOf('month').format('x');
                    maxDate = moment().add(1, 'months').endOf('month').format('x');
                    dataTableDom.draw();
                    break;
                }
            }
        });

        // Date range filter --- offical docs reference: https://datatables.net/examples/plug-ins/range_filtering.html
        filterYear && $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = minDate;
                var max = maxDate;
                var date = parseFloat(moment(data[1]).format('x')) || 0; // use data for the age column

                if ((isNaN(min) && isNaN(max)) ||
                    (isNaN(min) && date <= max) ||
                    (min <= date && isNaN(max)) ||
                    (min <= date && date <= max)) {
                    return true;
                }
                return false;
            }
        );

        // Search --- official docs reference: https://datatables.net/reference/api/search()
        $(document).on('keyup', '[data-table="search"]', function() {
            dataTableDom.search(this.value).draw();
        });
    }

    // Public methods
    return {
        init: function () {
            initClassic();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    ClassicDataTable && ClassicDataTable.init();
});
