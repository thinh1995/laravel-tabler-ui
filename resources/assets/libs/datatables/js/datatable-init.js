$.extend(true, $.fn.DataTable.Buttons.defaults, {
  dom: {
    button: {
      className: 'btn btn-sm btn-outline-primary'
    },
  }
});

$.fn.dataTable.ext.buttons.delete = {
  className: 'btn-outline-danger',
  text: function (dt) {
    return dt.i18n("buttons.delete")
  },
  extend: 'selected',
  action: function (e, dt, node, config) {
    let route = $('input[name=delete-multiple-route]').val();
    let type = $('input[name=model-type]').val();
    let selectedRows = $('.js-dataTable-buttons').DataTable().rows({selected: true}).data();
    let dataId = selectedRows.pluck('id');
    let fieldName = 'name';
    switch (type) {
      case 'article':
        fieldName = 'title';
        break;
      case 'comment':
        fieldName = 'content';
        break;
      case 'subscriber':
        fieldName = 'email';
    }
    let dataName = selectedRows.pluck(fieldName);

    if (dataId.count() > 0) {
      let ids = [];
      let title = [];
      for (let i = 0; i < dataId.count(); i++) {
        ids.push(dataId[i]);
        title.push(dataName[i])
      }

      showModalDeleteConfirm(route, type, title, {ids: ids}, 'multiple')
    }
  }
};

$.extend(true, $.fn.dataTable.defaults, {
  sWrapper: "dataTables_wrapper dt-bootstrap5",
  sFilterInput: "form-control",
  sLengthSelect: "form-select",
  columnDefs: [{
    orderable: false,
    data: 'id',
    'checkboxes': {
      'selectRow': true
    },
    targets: 0,
  }, {
    "defaultContent": "-",
    "targets": "_all"
  }],
  select: {
    style: 'multi',
    selector: 'td:first-child'
  },
  stateSave: true,
  language: {
    paginate: {
      first: '<i class="fa fa-angle-double-left"></i>',
      previous: '<i class="fa fa-angle-left"></i>',
      next: '<i class="fa fa-angle-right"></i>',
      last: '<i class="fa fa-angle-double-right"></i>'
    }
  },
  pageLength: 10,
  lengthMenu: [[10, 20, 50, -1], [10, 20, 50, 'All']],
  autoWidth: true,
  fixedHeader: {
    header: true,
    headerOffset: $('#sticky_menu').height()
  },
  buttons: ['colvis', 'copy', 'csv', 'excel', 'pdf', 'print', 'delete'],
  dom: "<'row'<'col-sm-12'Q><'col-sm-12 col-md-4'l><'col-sm-12 col-md-4 text-center'B><'col-sm-12 col-md-4'f>><'row'<'col-sm-12 my-2'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 d-flex justify-content-end'p>>"
});