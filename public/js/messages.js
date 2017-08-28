$( document ).ready(function() {
  $('#messages').DataTable({
    "pagingType": "full_numbers",
    "pageLength": 10,
    "columns": [

       null,
       { "width": "15%" },
       null,
       null,
       { "width": "30%" },
       null
     ]
  });
});
