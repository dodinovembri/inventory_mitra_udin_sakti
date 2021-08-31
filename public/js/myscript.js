(function($) {

  'use strict'

  var Defaults = $.fn.select2.amd.require('select2/defaults');

  $.extend(Defaults.defaults, {
    searchInputPlaceholder: ''
  });

  var SearchDropdown = $.fn.select2.amd.require('select2/dropdown/search');

  var _renderSearchDropdown = SearchDropdown.prototype.render;

  SearchDropdown.prototype.render = function(decorated) {

          // invoke parent method
          var $rendered = _renderSearchDropdown.apply(this, Array.prototype.slice.apply(arguments));

          this.$search.attr('placeholder', this.options.get('searchInputPlaceholder'));

          return $rendered;
        };

      })(window.jQuery);


      $(function(){
        'use strict'

        // Basic with search
        $('.select2').select2({
          placeholder: 'Choose one',
          searchInputPlaceholder: 'Search options'
        });

        // Disable search
        $('.select2-no-search').select2({
          minimumResultsForSearch: Infinity,
          placeholder: 'Choose one'
        });

        // Clearable selection
        $('.select2-clear').select2({
          minimumResultsForSearch: Infinity,
          placeholder: 'Choose one',
          allowClear: true
        });

        // Limit selection
        $('.select2-limit').select2({
          minimumResultsForSearch: Infinity,
          placeholder: 'Choose one',
          maximumSelectionLength: 2
        });

      });
      $(function(){
        'use strict'

        $('#examplejurnal').DataTable({

          "ordering": false,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          },
          "lengthMenu": [ 50, 75, 100, 500, 1000 ]          
          // dom: 'lBfrtip',
          // buttons: [
          //     'csv', 'excel', 'pdf', 'print'
          // ]
        });

        $('#example1').DataTable({          
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          },
          "lengthMenu": [ 50, 75, 100, 500, 1000 ]
        });

        $('#examplesales').DataTable({          
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          },
          "lengthMenu": [ 50, 75, 100, 500, 1000 ]
        });

        $('#example1_1').DataTable({          
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });                

        $('#example2').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#example3').DataTable({
          'ajax': '../assets/data/datatable-arrays.txt',
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#example4').DataTable({
          'ajax': '../assets/data/datatable-objects.txt',
          "columns": [
          { "data": "name" },
          { "data": "position" },
          { "data": "office" },
          { "data": "extn" },
          { "data": "salary" }
          ],
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

  // Select2
  $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

});

